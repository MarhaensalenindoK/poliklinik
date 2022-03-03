<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Service\Database\ActionService;
use App\Service\Database\MedicalHistoryService;
use App\Service\Database\MedicineService;
use App\Service\Database\QueueService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueuesController extends Controller
{
    public function index()
    {
        $DBqueue = new QueueService;
        $DBaction = new ActionService;
        $DBmedicine = new MedicineService;
        $clinicId = Auth::user()->clinic_id;

        $queues = $DBqueue->index($clinicId);
        $medicines = $DBmedicine->index($clinicId);

        $queueCheckin = collect($queues['data'])->filter(function ($queue, $key) {
            return $queue['status'] === 'CHECKIN';
        });
        $queueCheckin = $queueCheckin->toArray();

        $queueNotCheckin = collect($queues['data'])->filter(function ($queue, $key) {
            return $queue['status'] !== 'CHECKIN';
        });

        $queueNotCheckin = $queueNotCheckin->toArray();

        foreach ($queueNotCheckin as $key => $queue) {
            $queueNotCheckin[$key]['action'] = $DBaction->index($queue['medical_history_id'])['data'];
        }

        return view('doctor.queues')
        ->with('queues', $queues)
        ->with('medicines', $medicines)
        ->with('queueNotCheckin', $queueNotCheckin)
        ->with('queueCheckin', $queueCheckin);
    }

    public function updateMedicalHistory(Request $request)
    {
        $DBmedicalHistory = new MedicalHistoryService;
        $DBaction = new ActionService;
        $DBqueue = new QueueService;
        $DBUser = new UserService;

        $patientId = $request->patient_id;
        $queueId = $request->queue_id;
        $medicalHistoryId = $request->medical_history_id;
        $diagnosis = $request->diagnosis;
        $physicalExam = $request->physicalExam;
        $vitalSign = $request->vitalSign;
        $descAction = $request->descAction;
        $medicineId = $request->medicine;
        $sigma = $request->sigma;
        $count = $request->count;

        $patient = $DBUser->detail($patientId);

        $payloadMedicalHistory = [
            'diagnosis' => $diagnosis,
            'physical_exam' => $physicalExam,
            'vital_sign' => $vitalSign,
            'description_action' => $descAction,
        ];

        $updateMedicalHistory = $DBmedicalHistory->update($medicalHistoryId, $payloadMedicalHistory);

        $message =
        "
            Anda telah mengubah laporan medical history <br>
            <ul>
                <li><b>Nama : ". $patient['name'] ."</b></li>
                <li><b>NIK : ". $patient['nik'] ."</b></li>
                <li><b>Terdiagnosa : ". $updateMedicalHistory['diagnosis'] ."</b></li>
                <li><b>Tindakan : ". $updateMedicalHistory['description_action'] ."</b></li>
            </ul>
        ";
        foreach ($medicineId as $key => $item) {
            if ($medicineId[$key] !== 'null' && $sigma[$key] !== null && $count[$key] !== null) {
                $payloadAction = [
                    'medicine_id' => $medicineId[$key],
                    'sigma' => $sigma[$key],
                    'count' => $count[$key],
                ];

                $DBaction->create($medicalHistoryId, $payloadAction);
            }
        }

        $DBqueue->update($queueId, ['status' => Queue::CASHER]);

        return redirect('doctor/medical-history/queues')
        ->with('message', $message);
    }

    public function deleteAction(Request $request) {
        $DBaction = new ActionService;

        return $DBaction->destroy($request->action_id);
    }

    public function deleteQueue(Request $request)
    {
        $DBqueue = new QueueService;
        return response()->json(
            $DBqueue->destroy($request->queue_id)
        );
    }
}
