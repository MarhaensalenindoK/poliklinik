<?php

namespace App\Service\Database;

use App\Models\MedicalHistory as ModelsMedicalHistory;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class MedicalHistoryService {
    public function index($patient_id, $filter = []) {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;
        $page = $filter['page'] ?? 1;
        $examiner_id = $filter['examiner_id'] ?? null;

        $query = ModelsMedicalHistory::orderBy('created_at', $orderBy);

        $query->where('patient_id', $patient_id)->with('patient');

        if ($examiner_id !== null) {
            $query->where('examiner_id', $examiner_id)->with('examiner');
        }

        $medicalHistory = $query->paginate($per_page, ['*'], 'page', $page);

        return $medicalHistory->toArray();
    }

    public function detail($medicalHistoryId)
    {
        $medicalHistory = ModelsMedicalHistory::findOrFail($medicalHistoryId);

        return $medicalHistory->toArray();
    }

    public function create($patient_id, $examiner_id = null, $payload)
    {
        $medicalHistory = new ModelsMedicalHistory();
        $medicalHistory->id = Uuid::uuid4()->toString();
        $medicalHistory->patient_id = $patient_id;
        $medicalHistory->examiner_id = $examiner_id === null ? null : $examiner_id;
        $medicalHistory = $this->fill($medicalHistory, $payload);
        $medicalHistory->save();

        return $medicalHistory;
    }

    public function update($medicalHistoryId, $payload)
    {
        $medicalHistory = ModelsMedicalHistory::findOrFail($medicalHistoryId);
        $medicalHistory = $this->fill($medicalHistory, $payload);
        $medicalHistory->save();

        return $medicalHistory->toArray();
    }

    public function destroy($medicalHistoryId)
    {
        ModelsMedicalHistory::findOrFail($medicalHistoryId)->delete();

        return true;
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
