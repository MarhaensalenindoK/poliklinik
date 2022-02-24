<?php

namespace App\Service\Database;

use App\Models\Action;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;

class ActionService {
    public function index($medical_history_id, $filter = []) {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;
        $page = $filter['page'] ?? 1;

        $query = Action::orderBy('created_at', $orderBy);
        $query->where('medical_history_id', $medical_history_id);
        $query->with('medicine');
        $action = $query->paginate($per_page, ['*'], 'page', $page);

        return $action->toArray();
    }

    public function detail($actionId)
    {
        $action = Action::with(['medicine', 'medicalHistory'])->findOrFail($actionId);

        return $action->toArray();
    }

    public function create($medical_history_id, $payload)
    {
        $action = new Action();
        $action->id = Uuid::uuid4()->toString();
        $action->medical_history_id = $medical_history_id;
        $action = $this->fill($action, $payload);
        $action->save();

        return $action;
    }

    public function update($actionId, $payload)
    {
        $action = Action::findOrFail($actionId);
        $action = $this->fill($action, $payload);
        $action->save();

        return $action;
    }

    public function destroy($actionId)
    {
        Action::findOrFail($actionId)->delete();

        return true;
    }

    private function fill(Action $action, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $action->$key = $value;
        }

        Validator::make($action->toArray(), [
            'medical_history_id' => 'required',
        ])->validate();

        return $action;
    }
}
