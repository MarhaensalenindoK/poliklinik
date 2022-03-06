<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Service\Database\MedicalHistoryService;
use App\Service\Database\UserService;
use App\Service\Database\QueueService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $DBuser = new UserService;
        $DBqueue = new QueueService;

        $clinicId = Auth::user()->clinic_id;
        $users = $DBuser->index([
            'with_queue' => true,
            'with_medical_patient' => true,
            'clinic_id' => $clinicId,
            'role' => 'PATIENT',
        ]);

        $users['data'] = collect($users['data'])->filter(function ($user, $key) {
            return $user['queue'] === null;
        })->toArray();

        $users['data'] = array_values($users['data']);

        $totalQueueNoCheckin = count($users['data']);

        $totalQueueCasher = $DBqueue->index($clinicId, [
            'status' => Queue::CASHER,
            'per_page' => 1,
        ])['total'];

        $totalQueueCheckin = $DBqueue->index($clinicId, [
            'status' => Queue::CHECKIN,
            'per_page' => 1,
        ])['total'];

        $pw_matches = false;
        if (Hash::check(Auth::user()->username, Auth::user()->password)){
            $pw_matches = true;
        }

        return view('doctor.dashboard')
        ->with('pw_matches', $pw_matches)
        ->with('users', $users)
        ->with('totalQueueCasher', $totalQueueCasher)
        ->with('totalQueueCheckin', $totalQueueCheckin)
        ->with('totalQueueNoCheckin', $totalQueueNoCheckin);
    }

    public function createQueue(Request $request) {
        $DBqueue = new QueueService;
        $DBmedicalHistory = new MedicalHistoryService;
        $clinicId = Auth::user()->clinic_id;
        $queues = $DBqueue->index($clinicId, ['per_page' => 1]);

        $payloadMedicalHistory = [
            'examiner_id' => Auth::user()->id,
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
}
