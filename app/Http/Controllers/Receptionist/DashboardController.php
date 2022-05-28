<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Service\Database\QueueService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        $DBuser = new UserService;
        $DBqueue = new QueueService;

        $clinicId = Auth::user()->clinic_id;
        $users = $DBuser->index([
            'with_queue' => true,
            'with_full_queue' => true,
            'clinic_id' => $clinicId,
            'role' => 'PATIENT',
        ]);

        $totalPatient = count($users['data']);

        $totalQueueCasher = $DBqueue->index($clinicId, [
            'status' => Queue::CASHER,
            'per_page' => 1,
        ])['total'];

        $totalQueueCheckin = $DBqueue->index($clinicId, [
            'status' => Queue::CHECKIN,
            'per_page' => 1,
        ])['total'];

        $totalQueueDone = $DBqueue->index($clinicId, [
            'status' => Queue::DONE,
            'per_page' => 1,
        ])['total'];

        $pw_matches = false;
        if (Hash::check(Auth::user()->username, Auth::user()->password)){
            $pw_matches = true;
        }
        // dd($users);
        return view('receptionist.dashboard')
        ->with('users', $users)
        ->with('totalPatient', $totalPatient)
        ->with('totalQueueCasher', $totalQueueCasher)
        ->with('totalQueueCheckin', $totalQueueCheckin)
        ->with('totalQueueDone', $totalQueueDone)
        ->with('pw_matches', $pw_matches);
    }
}
