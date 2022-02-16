<?php

namespace App\Service\Database;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Validation\Rule;

class UserService {
    public function index($clinicId, $filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;
        $role = $filter['role'] ?? null;
        $name = $filter['name'] ?? null;
        $with_clinic = $filter['with_clinic'] ?? false;

        Clinic::findOrFail($clinicId);

        $query = User::orderBy('created_at', $orderBy);

        $query->where('clinic_id', $clinicId);

        if ($role !== null) {
            $query->where('role', $role);
        }

        if ($name !== null) {
            $query->where('name', $name);
        }

        if ($with_clinic) {
            $query->with('clinic');
        }

        $users = $query->paginate($per_page);

        return $users->toArray();
    }

    public function detail($clinicId, $userId)
    {
        Clinic::findOrFail($clinicId);
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
