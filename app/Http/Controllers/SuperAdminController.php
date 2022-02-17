<?php

namespace App\Http\Controllers;

use App\Service\Database\ClinicService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index(Request $request)
    {
        $DBclinic = new ClinicService;
        $DBuser = new UserService;

        $clinics = $DBclinic->index(['per_page' => 8]);
        $users = $DBuser->index([
            'role' => 'SUPERADMIN',
        ]);

        $totalUser = $DBuser->index(['per_page' => 1])['total'];
        $totalUserNonActive = $DBuser->index([
            'status' => 0,
            'per_page' => 1,
        ])['total'];

        // dd($users);

        return view('superadmin.dashboard')
        ->with('users', $users)
        ->with('totalUserNonActive', $totalUserNonActive)
        ->with('totalUser', $totalUser)
        ->with('clinics', $clinics);
    }
}
