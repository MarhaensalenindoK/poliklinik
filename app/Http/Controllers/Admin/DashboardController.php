<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Database\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $DBuser = new UserService;
        $users = $DBuser->index();

        $users = $DBuser->index([
            'role' => 'ADMIN',
        ]);
        $totalUser = $DBuser->index(['per_page' => 1])['total'];
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
