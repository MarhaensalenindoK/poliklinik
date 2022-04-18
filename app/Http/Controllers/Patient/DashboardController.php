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

        if ($user['latest_medical_history']['examiner_id'] !== null) {
            $user['doctor'] = $DBuser->detail($user['latest_medical_history']['examiner_id']);
        }

        $user['action'] = $DBaction->index($user['latest_medical_history']['id'])['data'];

        return view('patient.dashboard')
        ->with('user', $user);
    }
}
