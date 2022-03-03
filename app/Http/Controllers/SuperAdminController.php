<?php

namespace App\Http\Controllers;

use App\Service\Database\ClinicService;
use App\Service\Database\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

        $pw_matches = false;
        if (Hash::check(Auth::user()->username, Auth::user()->password)){
            $pw_matches = true;
        }

        return view('superadmin.dashboard')
        ->with('users', $users)
        ->with('fullClinics', $fullClinics)
        ->with('totalUserNonActive', $totalUserNonActive)
        ->with('totalUser', $totalUser)
        ->with('pw_matches', $pw_matches)
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

    public function deleteClinic(Request $request)
    {
        $DBclinic = new ClinicService;

        $clinic = $DBclinic->detail($request->clinic_id);

        if ($clinic['profile_image'] !== null) {
            Storage::disk('public')->delete($clinic['profile_image']);
        }

        $delete = $DBclinic->destroy($request->clinic_id);

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
        $DBclinic = new ClinicService;
        $fullClinics = $DBclinic->index();

        return view('superadmin.account_management')
        ->with('fullClinics', $fullClinics);
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
            'clinic_id' => $request->clinic_id ?? null,
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

    public function createClinic(Request $request)
    {
        $DBclinic = new ClinicService;
        $countFacility = count($request->nameFacility);
        $countService = count($request->nameService);

        $payload = [
            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'about' => $request->about,
            'email' => $request->email ?? null,
        ];

        $nameFacility = $request->nameFacility;
        $descriptionFacility = $request->descriptionFacility;
        for ($index = 0; $index < $countFacility; $index++) {
            $payload['facility'][$index] = [
                'name' => $nameFacility[$index],
                'description' => $descriptionFacility[$index],
            ];
        }

        $nameService = $request->nameService;
        for ($index = 0; $index < $countService; $index++) {
            $payload['service'][$index] = $nameService[$index];
        }

        if ($request->file('image') !== null) {
            $uploadImage = Storage::disk('public')->put('profile_image', $request->file('image'));
            $payload['profile_image'] = $uploadImage;
        }

        $createClinic = $DBclinic->create($payload);

        if (isset($createClinic['id'])) {
            return redirect('clinic-management')->with('success', true);
        }

        return redirect('clinic-management')->with('error', true);
    }

    public function updateClinic(Request $request)
    {
        $DBclinic = new ClinicService;
        $countFacility = count($request->nameFacility);
        $countService = count($request->nameService);
        $clinicId = $request->clinic_id;
        $clinic = $DBclinic->detail($clinicId);
        $payload = [
            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'about' => $request->about,
            'email' => $request->email ?? null,
        ];

        $nameFacility = $request->nameFacility;
        $descriptionFacility = $request->descriptionFacility;
        for ($index = 0; $index < $countFacility; $index++) {
            $payload['facility'][$index] = [
                'name' => $nameFacility[$index],
                'description' => $descriptionFacility[$index],
            ];
        }

        $nameService = $request->nameService;
        for ($index = 0; $index < $countService; $index++) {
            $payload['service'][$index] = $nameService[$index];
        }

        if ($request->file('image') !== null) {
            if ($clinic['profile_image'] !== null) {
                Storage::disk('public')->delete($clinic['profile_image']);
            }
            $uploadImage = Storage::disk('public')->put('profile_image', $request->file('image'));

            $payload['profile_image'] = $uploadImage;
        }

        $updateClinic = $DBclinic->update($clinicId, $payload);

        if (isset($updateClinic['id'])) {
            return redirect('clinic-management')->with('success-update', true);
        }

        return redirect('clinic-management')->with('error-update', true);
    }
}
