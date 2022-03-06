<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\User;
use App\Service\Database\ActionService;
use App\Service\Database\MedicalHistoryService;
use App\Service\Database\MedicineService;
use App\Service\Database\QueueService;
use App\Service\Database\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueueManagementController extends Controller
{
    public function indexManagement(){
        $DBqueue = new QueueService;
        $DBaction = new ActionService;

        $queues = $DBqueue->index(Auth::user()->clinic_id);

        foreach ($queues['data'] as $key => $queue) {
            $queues['data'][$key]['action'] = $DBaction->index($queue['medical_history']['id'])['data'] ?? [];
        }

        return view('receptionist.queue_management', compact('queues'));
    }

    public function indexQueue()
    {
        $DBuser = new UserService;

        $clinicId = Auth::user()->clinic_id;
        $users = $DBuser->index([
            'with_queue' => true,
            'with_medical_patient' => true,
            'clinic_id' => $clinicId,
            'role' => 'PATIENT',
        ]);

        $doctors = $DBuser->index([
            'clinic_id' => $clinicId,
            'role' => User::DOCTOR,
        ]);

        $users['data'] = collect($users['data'])->filter(function ($user, $key) {
            return $user['queue'] === null;
        })->toArray();

        $users['data'] = array_values($users['data']);

        return view('receptionist.add_queue_management')
        ->with('doctors', $doctors)
        ->with('users', $users);
    }

    public function createQueue(Request $request) {
        $DBqueue = new QueueService;
        $DBmedicalHistory = new MedicalHistoryService;
        $clinicId = Auth::user()->clinic_id;
        $doctorId = $request->doctor_id;
        $queues = $DBqueue->index($clinicId, ['per_page' => 1]);

        $payloadMedicalHistory = [
            'examiner_id' => $doctorId,
        ];

        $updateMedicalHistory = $DBmedicalHistory->update($request->medical_history_id, $payloadMedicalHistory);

        $payload = [
            'clinic_id' => $clinicId,
            'queue' => intval(Carbon::now('GMT+7')->day . $queues['total'] + 1),
            'date' => Carbon::now('GMT+7')->format('Y-m-d'),
            'status' => 'CHECKIN',
        ];

        $create = $DBqueue->create($updateMedicalHistory['id'], $request->patient_id, $clinicId, $payload);

        return response()->json($create);
    }

    public function updateQueue(Request $request) {
        $DBqueue = new QueueService;
        $DBaction = new ActionService;
        $DBmedicine = new MedicineService;

        if (strtoupper($request->status) !== Queue::DONE) {
            $DBqueue->update($request->queue_id, [
                'status' => strtoupper($request->status),
            ]);

            return redirect('receptionist/queue-management')
            ->with('message', 'Berhasil mengubah antrean');
        }

        $queueId = $request->queue_id;

        $queue = $DBqueue->detail(Auth::user()->clinic_id, $queueId);
        $actions = $DBaction->index($queue['medical_history']['id']);

        $update = $DBqueue->update($request->queue_id, [
            'status' => strtoupper($request->status),
        ]);
        $totalPayment = 0;
        if (isset($update['id'])) {
            foreach ($actions['data'] as $key => $action) {
                $totalPayment += ($action['count'] * $action['medicine']['price']);
                $DBmedicine->update($action['medicine_id'], [
                    'stock' => ($action['medicine']['stock'] - $action['count'])
                ]);
            }

            return redirect('receptionist/queue-management')
            ->with('message', 'Berhasil mengubah antrean, konfirmasi bahwa pasien telah membayar <b>'. $totalPayment . '</b> !');
        }

        return redirect('receptionist/queue-management')
            ->with('message', 'Gagal mengubah antrean');
    }

    public function deleteQueue(Request $request)
    {
        $DBqueue = new QueueService;

        return response()->json(
            $DBqueue->destroy($request->queue_id)
        );
    }
}
