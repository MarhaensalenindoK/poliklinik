<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Database\UserService;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementAccountController extends Controller
{
    public function index()
    {
        return view('admin.account_admin_management');
    }

    public function getUsers()
    {
        $DBuser = new UserService;

        $clinicId = Auth::user()->clinic_id;

        $users = $DBuser->index([
            'clinic_id' => $clinicId,
            'not_role' => User::SUPERADMIN
        ]);

        return response()->json($users);
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

    public function deleteAccount(Request $request)
    {
        $DBuser = new UserService;

        $delete = $DBuser->destroy($request->user_id);

        return response()->json($delete);
    }

    public function createAccount(Request $request)
    {
        $DBUser = new UserService;
        $clinicId = Auth::user()->clinic_id;
        $faker = Factory::create();
        $username = strtolower($request->username . $faker->numerify('####'));
        $create = $DBUser->create($clinicId, [
            'name' => $request->name,
            'username' => $username,
            'password' => $username,
            'email' => $request->email,
            'nik' => $request->nik,
            'role' => $request->role,
            'status' => 1
        ]);

        return response()->json($create);
    }

    public function updateAccount(Request $request)
    {
        $DBuser = new UserService;

        $payload = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'nik' => $request->nik,
            'role' => $request->role,
            'status' => $request->status === 'true' ? true : false,
        ];

        $update = $DBuser->update($request->user_id, $payload);

        return response()->json($update);
    }
}
