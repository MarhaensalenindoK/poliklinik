<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Service\Database\ActionService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $DBuser = new UserService;
        $DBaction = new ActionService;

        $user = $DBuser->detail(Auth::user()->id);

        if ($user['medical_history_patient']['examiner_id'] !== null) {
            $user['doctor'] = $DBuser->detail($user['medical_history_patient']['examiner_id']);
        }
        $user['action'] = $DBaction->index($user['medical_history_patient']['id'])['data'];
        return view('patient.dashboard')
        ->with('user', $user);
    }
}
