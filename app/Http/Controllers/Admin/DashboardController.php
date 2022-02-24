<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Database\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $DBuser = new UserService;
        $users = $DBuser->index();

        $users = $DBuser->index([
            'role' => 'ADMIN',
            'clinic_id' => Auth::user()->clinic_id,
        ]);
        $totalUser = $DBuser->index([
            'per_page' => 1,
            'clinic_id' => Auth::user()->clinic_id,
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
