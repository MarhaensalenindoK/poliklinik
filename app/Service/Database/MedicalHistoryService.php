<?php

namespace App\Service\Database;

use App\Models\MedicalHistory as ModelsMedicalHistory;

class MedicalHistory {
    public function index($filter) {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;
        $page = $filter['page'] ?? 1;
        $patient_id = $filter['patient_id'] ?? null;
        $examiner_id = $filter['examiner_id'] ?? null;

        $query = ModelsMedicalHistory::orderBy('created_at', $orderBy);

        if ($patient_id !== null) {
            $query->where('patient_id', $patient_id);
        }

        if ($examiner_id !== null) {
            $query->where('examiner_id', $examiner_id);
        }

        $medicalHistory = $query->paginate($per_page, ['*'], 'page', $page);

        return $medicalHistory->toArray();
    }

    public function detail($medicalHistoryId)
    {
        $medicalHistory = ModelsMedicalHistory::findOrFail($medicalHistoryId);

        return $medicalHistory->toArray();
    }

    public function create($patient_id, $payload)
    {
        $medicalHistory = new ModelsMedicalHistory();
        $medicalHistory->id = Uuid::uuid4()->toString();
        $user->clinic_id = $payload['role'] === User::SUPERADMIN ? null : $clinicId;
        $user = $this->fill($user, $payload);
        $user->password = Hash::make($user->password);
        $user->save();

        return $user;
    }

    private function fill(ModelsMedicalHistory $medicalHistory, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $medicalHistory->$key = $value;
        }

        Validator::make($medicalHistory->toArray(), [
            'patient_id' => 'required',
            'date_checkup' => 'required',
            'allergic' => 'nullable',
            'anamnesis' => 'required',
        ])->validate();

        return $medicalHistory;
    }
}
