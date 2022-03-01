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
        $with_medical_patient = $filter['with_medical_patient'] ?? false;
        $with_medical_examiner = $filter['with_medical_examiner'] ?? false;
        $with_queue = $filter['with_queue'] ?? false;
        $not_role = $filter['not_role'] ?? null;

        $query = User::orderBy('created_at', $orderBy);

        if ($clinic_id !== null) {
            $query->where('clinic_id', $clinic_id);
        }

        if ($role !== null) {
            $query->where('role', $role);
        }

        if ($not_role !== null) {
            $query->where('role', '!=', $not_role);
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

        if ($with_medical_patient) {
            $query->with('medicalHistoryPatient');
        }

        if ($with_medical_examiner) {
            $query->with('medicalHistoryExaminer');
        }

        if ($with_queue) {
            $query->with('queue');
        }

        $users = $query->paginate($per_page, ['*'], 'page', $page);

        return $users->toArray();
    }

    public function detail($userId)
    {
        $user = User::findOrFail($userId);

        if ($user->role === User::PATIENT) {
            $user = User::with('medicalHistoryPatient')->with('clinic')->findOrFail($userId);
        }

        return $user->toArray();
    }

    public function detailWithMedicalHistoryPatient($userId)
    {
        $user = User::with('medicalHistoryPatient')->findOrFail($userId);

        return $user->toArray();
    }

    public function detailWithMedicalHistoryExaminer($userId)
    {
        $user = User::with('medicalHistoryExaminer')->findOrFail($userId);

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
