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
        $DBuser = new UserService;

        $clinicId = Auth::user()->clinic_id;

        $queues = $DBqueue->index(Auth::user()->clinic_id);
        $doctors = $DBuser->index([
            'clinic_id' => $clinicId,
            'role' => User::DOCTOR,
        ]);

        foreach ($queues['data'] as $key => $queue) {
            $queues['data'][$key]['action'] = $DBaction->index($queue['medical_history']['id'])['data'] ?? [];
        }

        return view('receptionist.queue_management', compact('queues', 'doctors'));
    }

    public function indexQueue()
    {
        $clinicId = Auth::user()->clinic_id;
        $DBuser = new UserService;
        $users = $DBuser->index([
            'with_full_queue' => true,
            'with_full_medical_patient' => true,
            'clinic_id' => $clinicId,
            'role' => 'PATIENT',
        ]);

        $notHaveQueue = [];

        foreach ($users['data'] as $user) {
            if ($user['full_medical_history_patient'] === null || $user['full_medical_history_patient'] === []) {
                continue;
            }

            if ($user['full_queue'] === null || $user['full_queue'] === []) {
                continue;
            }

            $queueCollection = collect($user['full_queue']);
            foreach ($user['full_medical_history_patient'] as $medicalHistory) {
                $checkQueue = $queueCollection->filter(function ($queue) use ($medicalHistory) {
                    return $queue['medical_history_id'] === $medicalHistory['id'];
                })->toArray();

                if ($checkQueue === []) {
                    $data = $medicalHistory;
                    $data['patient'] = $user;
                    $notHaveQueue[] = $data;
                }
            }
        }

        $doctors = $DBuser->index([
            'clinic_id' => $clinicId,
            'role' => User::DOCTOR,
        ]);

        return view('receptionist.add_queue_management')
        ->with('doctors', $doctors)
        ->with('notHaveQueue', $notHaveQueue);
    }

    public function indexQueueDone(){
        $DBqueue = new QueueService;
        $DBaction = new ActionService;
        $DBuser = new UserService;

        $clinicId = Auth::user()->clinic_id;

        $queues = $DBqueue->index(Auth::user()->clinic_id,
        [
            'status' => Queue::DONE,
        ]);

        foreach ($queues['data'] as $key => $queue) {
            $queues['data'][$key]['action'] = $DBaction->index($queue['medical_history']['id'])['data'] ?? [];
        }

        return view('receptionist.queue_done', compact('queues'));
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

    public function createQueueExisting(Request $request) {
        $DBqueue = new QueueService;
        $DBuser = new UserService;
        $DBmedicalHistory = new MedicalHistoryService;
        $clinicId = Auth::user()->clinic_id;

        $patient = $DBuser->index([
            'nik' => $request->nik,
        ])['data'][0] ?? null;

        if ($patient === null) {
            return redirect('receptionist/queue-management')
            ->with('message', 'Pasien NIK : <strong>'. $request->nik .'</strong> tidak ditemukan, pastikan pasien sudah terdaftar !');
        }


        $allergic = $request->allergic;
        $been_diagnosed = array_filter($request->diagnosed);
        $hospitalization_surgery = array_filter($request->hospitalization_surgery);
        $anamnesis = $request->anamnesis;
        $doctorId = $request->doctor;

        $payloadMedicalHistory = [
            'patient_id' => $patient['id'],
            'date_checkup' => Carbon::now('GMT+7')->format('Y-m-d'),
            'allergic' => implode(", ", array_filter($allergic)),
            'anamnesis' => $anamnesis,
            'been_diagnosed' => [],
            'hospitalization_surgery' => [],
        ];

        if ($been_diagnosed !== []) {
            $payloadMedicalHistory['been_diagnosed'] = [];

            foreach ($been_diagnosed as $key => $item) {
                $payloadMedicalHistory['been_diagnosed'][$key] = $item;
            }
        }

        if ($hospitalization_surgery !== []) {
            $payloadMedicalHistory['hospitalization_surgery'] = [];

            foreach ($hospitalization_surgery as $key => $item) {
                $payloadMedicalHistory['hospitalization_surgery'][$key]['reason'] = $item;
            }
        }
        $createMedicalHistory = $DBmedicalHistory->create(Auth::user()->clinic_id, $doctorId, $payloadMedicalHistory);
        if ($doctorId !== null) {
            $queues = $DBqueue->index($clinicId, ['per_page' => 1]);

            $payload = [
                'clinic_id' => $clinicId,
                'queue' => intval(Carbon::now('GMT+7')->day . $queues['total'] + 1),
                'date' => Carbon::now('GMT+7')->format('Y-m-d'),
                'status' => 'CHECKIN',
            ];

            $DBqueue->create($createMedicalHistory['id'], $patient['id'], $clinicId, $payload);
        }

        if ($createMedicalHistory['id']) {
            return redirect('receptionist/queue-management')
            ->with('message', '<div class="text-left">Pasien NIK : <strong>'. $request->nik ."</strong> ditambahkan ke antrian terbaru ! <br>
            <ul>
                <li>Name : <strong>" .$patient['name']. "</strong></li>
                <li>NIK : <strong>" .$patient['nik']. "</strong></li>
                <li>Email : <strong>" .$patient['email']. "</strong></li>
                <li>Anamnesis : " .$createMedicalHistory['anamnesis']. "</li>
            </ul></div>");
        }

        return redirect('receptionist/queue-management')
            ->with('message', 'Pasien NIK : <strong>'. $request->nik .'</strong> gagal membuat antrian baru !');
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
