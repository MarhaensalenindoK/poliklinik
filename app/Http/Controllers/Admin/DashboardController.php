<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Database\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $pw_matches = false;
        if (Hash::check(Auth::user()->username, Auth::user()->password)){
            $pw_matches = true;
        }

        return view('admin.dashboard')
        ->with('pw_matches', $pw_matches)
        ->with('users', $users)
        ->with('totalUserNonActive', $totalUserNonActive)
        ->with('totalUser', $totalUser);
    }

    public function adminManagement()
    {
        return view('admin.account_admin_management');
    }
}
