<?php

namespace App\Http\Controllers;

use App\Service\Database\ClinicService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $DBclinic = new ClinicService;
        $DBuser = new UserService;

        $clinics = $DBclinic->index(['per_page' => 8]);
        $fullClinics = $DBclinic->index();
        $users = $DBuser->index([
            'role' => 'SUPERADMIN',
        ]);

        $totalUser = $DBuser->index(['per_page' => 1])['total'];
        $totalUserNonActive = $DBuser->index([
            'status' => 0,
            'per_page' => 1,
        ])['total'];

        return view('superadmin.dashboard')
        ->with('users', $users)
        ->with('fullClinics', $fullClinics)
        ->with('totalUserNonActive', $totalUserNonActive)
        ->with('totalUser', $totalUser)
        ->with('clinics', $clinics);
    }

    public function getSuperAdmin()
    {
        $DBuser = new UserService;
        $users = $DBuser->index([
            'role' => 'SUPERADMIN',
        ]);

        return response()->json($users);
    }

    public function updateAccount(Request $request)
    {
        $DBuser = new UserService;
        $payload = [
            'clinic_id' => $request->clinic_id ?? null,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'nik' => $request->nik,
            'role' => $request->role,
        ];

        $update = $DBuser->update($request->user_id, $payload);

        return response()->json($update);
    }

    public function deleteAccount(Request $request)
    {
        $DBuser = new UserService;

        $delete = $DBuser->destroy($request->user_id);

        return response()->json($delete);
    }

    public function resetPassword(Request $request)
    {
        $DBuser = new UserService;
        $user = $DBuser->detail($request->user_id);

        $payload = [
            'password' => $user['username'],
        ];

        $update = $DBuser->update($request->user_id, $payload);

        return response()->json($update);
    }

    public function clinicManagement()
    {
        return view('superadmin.clinic_management');
    }

    public function accountManagement()
    {
        $DBuser = new UserService;
        $DBclinic = new ClinicService;

        $users = $DBuser->index([
            'with_clinic' => true,
        ]);
        $fullClinics = $DBclinic->index();

        return view('superadmin.account_management')
        ->with('fullClinics', $fullClinics)
        ->with('users', $users);
    }

    public function getUser() {
        $DBuser = new UserService;
        $users = $DBuser->index([
            'with_clinic' => true,
        ]);

        return response()->json($users);
    }

    public function createAccount(Request $request) {
        $DBuser = new UserService;
        $payload = [
            'clinic_id' => $request->clinic_id,
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->username,
            'email' => $request->email,
            'nik' => $request->nik,
            'status' => true,
            'role' => $request->role,
        ];

        $create = $DBuser->create($request->clinic_id, $payload);

        return response()->json($create);
    }

    public function getClinic()
    {
        $DBclinic = new ClinicService;

        $clinics = $DBclinic->index();

        return response()->json($clinics);
    }
}
