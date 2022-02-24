<?php

namespace App\Service\Database;

use App\Models\Medicine;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;

class MedicineService {
    public function index($clinic_id, $filter = []) {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;
        $page = $filter['page'] ?? 1;

        $query = Medicine::orderBy('created_at', $orderBy);
        $query->where('clinic_id', $clinic_id);

        $medicine = $query->paginate($per_page, ['*'], 'page', $page);

        return $medicine->toArray();
    }

    public function detail($medicineId)
    {
        $medicine = Medicine::findOrFail($medicineId);

        return $medicine->toArray();
    }

    public function create($clinic_id, $payload)
    {
        $medicine = new Medicine();
        $medicine->id = Uuid::uuid4()->toString();
        $medicine->clinic_id = $clinic_id;
        $medicine = $this->fill($medicine, $payload);
        $medicine->save();

        return $medicine;
    }

    public function update($medicineId, $payload)
    {
        $medicine = Medicine::findOrFail($medicineId);
        $medicine = $this->fill($medicine, $payload);
        $medicine->save();

        return $medicine;
    }

    public function destroy($medicineId)
    {
        Medicine::findOrFail($medicineId)->delete();

        return true;
    }

    private function fill(Medicine $medicine, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $medicine->$key = $value;
        }

        Validator::make($medicine->toArray(), [
            'name' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'price' => 'required|integer',
            'stock' => 'nullable',
        ])->validate();

        return $medicine;
    }
}
