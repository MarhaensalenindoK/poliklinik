<?php

namespace App\Service\Database;

use App\Models\Clinic;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class ClinicService {

    public function index($filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;
        $page = $filter['page'] ?? 1;
        $with_news = $filter['with_news'] ?? false;

        $query = Clinic::orderBy('created_at', $orderBy);

        if ($with_news) {
            $query->with('news');
        }

        $clinics = $query->paginate($per_page, ['*'], 'page', $page);

        return $clinics->toArray();
    }

    public function detail($clinicId)
    {
        $clinic = Clinic::with('news')->findOrfail($clinicId);

        return $clinic->toArray();
    }

    public function create($payload)
    {
        $clinic = new Clinic();
        $clinic->id = Uuid::uuid4()->toString();
        $clinic = $this->fill($clinic, $payload);
        $clinic->save();

        return $clinic;
    }

    public function update($clinicId, $payload)
    {
        $clinic = Clinic::findOrFail($clinicId);
        $clinic = $this->fill($clinic, $payload);
        $clinic->save();

        return $clinic;
    }

    public function destroy($clinicId)
    {
        Clinic::findOrFail($clinicId)->delete();

        return true;
    }

    private function fill(Clinic $clinic, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $clinic->$key = $value;
        }

        Validator::make($clinic->toArray(), [
            'name' => 'required|string',
            'address' => 'required|string',
            'about' => 'required|string',
            'facility' => 'required',
            'service' => 'required',
            'contact' => 'nullable|numeric',
            'email' => 'nullable|email',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ])->validate();

        return $clinic;
    }

}
