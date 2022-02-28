<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Service\Database\UserService;
use Illuminate\Support\Facades\Auth;
use App\Service\Database\QueueService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $DBuser = new UserService;
        $clinicId = Auth::user()->clinic_id;
        $users = $DBuser->index([
            'with_queue' => true,
            'with_medical_patient' => true,
            'clinic_id' => Auth::user()->clinic_id,
            'role' => 'PATIENT',
        ]);
        $users['data'] = collect($users['data'])->filter(function ($user, $key) {
            return $user['queue'] === null;
        });
        $totalUser = $DBuser->index([
            'per_page' => 1,
            'clinic_id' => $clinicId,
        ])['total'];
        return view('doctor.dashboard')
        ->with('users', $users)
        ->with('totalUser', $totalUser);
        
    }
    public function createQueue(Request $request) {
        $DBqueue = new QueueService;
        $clinicId = Auth::user()->clinic_id;
        $queues = $DBqueue->index($clinicId, ['per_page' => 1]);
        $payload = [
            'clinic_id' => $clinicId,
            'queue' => $queues['total'] + 1,
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'status' => 'CHECKIN',
        ];
    
        $create = $DBqueue->create($request->medical_history_id, $request->patient_id, $clinicId, $payload);
    
        return response()->json($create);
    }
}
