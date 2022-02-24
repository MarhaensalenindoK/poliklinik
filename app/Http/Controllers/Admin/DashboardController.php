<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Database\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $DBuser = new UserService;
        $clinicId = Auth::user()->clinic_id;
        $users = $DBuser->index();

        $users = $DBuser->index([
            'role' => 'ADMIN',
            'clinic_id' => $clinicId,
        ]);
        $totalUser = $DBuser->index([
            'per_page' => 1,
            'clinic_id' => $clinicId,
        ])['total'];
        $totalUserNonActive = $DBuser->index([
            'status' => 0,
            'per_page' => 1,
        ])['total'];
        return view('admin.dashboard')
        ->with('users', $users)
        ->with('totalUserNonActive', $totalUserNonActive)
        ->with('totalUser', $totalUser);
    }

    public function adminManagement()
    {
        return view('admin.account_admin_management');
    }
}
