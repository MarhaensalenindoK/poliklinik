<?php

namespace App\Service\Database;

use App\Models\Clinic;

class ClinicService {

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;

        $query = Clinic::orderBy('created_at', $orderBy);

        $clinics = $query->simplePaginate($per_page);

        return $clinics->toArray();
    }

    public function detail($clinicId)
    {
        $clinic = Clinic::findOrfail($clinicId);

        return $clinic->toArray();
    }

}
