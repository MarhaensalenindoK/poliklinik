<?php

namespace App\Service\Database;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Validation\Rule;

class UserService {
    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;
        $page = $filter['page'] ?? 1;
        $role = $filter['role'] ?? null;
        $name = $filter['name'] ?? null;
        $status = $filter['status'] ?? null;
        $clinic_id = $filter['clinic_id'] ?? null;
        $with_clinic = $filter['with_clinic'] ?? false;

        $query = User::orderBy('created_at', $orderBy);

        if ($clinic_id !== null) {
            $query->where('clinic_id', $clinicId);
        }

        if ($role !== null) {
            $query->where('role', $role);
        }

        if ($name !== null) {
            $query->where('name', $name);
        }

        if ($status !== null) {
            $query->where('status', $status);
        }

        if ($with_clinic) {
            $query->with('clinic');
        }

        $users = $query->paginate($per_page, ['*'], 'page', $page);

        return $users->toArray();
    }

    public function detail($userId)
    {
        $user = User::with('clinic')->findOrFail($userId);

        return $user->toArray();
    }

    public function create($clinicId, $payload)
    {
        if ($payload['role'] !== User::SUPERADMIN) {
            Clinic::findOrFail($clinicId);
        }

        $user = new User;
        $user->id = Uuid::uuid4()->toString();
        $user->clinic_id = $payload['role'] === User::SUPERADMIN ? null : $clinicId;
        $user = $this->fill($user, $payload);
        $user->password = Hash::make($user->password);
        $user->save();

        return $user;
    }

    public function update($userId, $payload)
    {
        $user = User::findOrFail($userId);
        $user = $this->fill($user, $payload);
        $user->password = Hash::make($user->password);
        $user->save();

        return $user->toArray();
    }

    public function destroy($userId)
    {
        User::findOrFail($userId)->delete();

        return true;
    }

    private function fill(User $user, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $user->$key = $value;
        }

        Validator::make($user->toArray(), [
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'status' => 'required',
            'nik' => 'nullable|numeric',
            'email' => 'nullable|email',
            'role' => ['required', Rule::in(config('constant.user.roles'))],
        ])->validate();

        return $user;
    }
}
