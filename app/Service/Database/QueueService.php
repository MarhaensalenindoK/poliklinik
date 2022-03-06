<?php

namespace App\Service\Database;

use App\Models\Clinic;
use App\Models\Queue as ModelsQueue;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Validation\Rule;

class QueueService {
    public function index($clinicId, $filter = [])
    {
        $orderBy = $filter['order_by'] ?? 'DESC';
        $per_page = $filter['per_page'] ?? 999;
        $page = $filter['page'] ?? 1;
        $status = $filter['status'] ?? null;

        Clinic::findOrFail($clinicId);

        $query = ModelsQueue::orderBy('created_at', $orderBy);

        $query->where('clinic_id', $clinicId);

        if ($status !== null) {
            $query->where('status', $status);
        }

        $query->with('patient');

        $query->with('medicalHistory');

        $clinics = $query->paginate($per_page, ['*'], 'page', $page);

        return $clinics->toArray();
    }

    public function detail($clinicId, $queueId)
    {
        Clinic::findOrFail($clinicId);

        $queue = ModelsQueue::with('patient')->with('medicalHistory')->findOrFail($queueId);

        return $queue->toArray();
    }

    public function create($medical_history_id, $patient_id, $clinic_id, $payload)
    {
        $queue = new ModelsQueue();
        $queue->id = Uuid::uuid4()->toString();
        $queue->medical_history_id = $medical_history_id;
        $queue->user_id = $patient_id;
        $queue->clinic_id = $clinic_id;
        $queue = $this->fill($queue, $payload);
        $queue->save();

        return $queue;
    }

    public function update($queueId, $payload)
    {
        $queue = ModelsQueue::findOrFail($queueId);
        $queue = $this->fill($queue, $payload);
        $queue->save();

        return $queue->toArray();
    }

    public function destroy($queueId)
    {
        ModelsQueue::findOrFail($queueId)->delete();

        return true;
    }

    private function fill(ModelsQueue $queue, array $attributes)
    {

        foreach ($attributes as $key => $value) {
            $queue->$key = $value;
        }

        Validator::make($queue->toArray(), [
            'medical_history_id' => 'required',
            'user_id' => 'required',
            'clinic_id' => 'required',
            'queue' => 'required',
            'date' => 'required',
            'status' => ['required', Rule::in(config('constant.queue.status'))],
        ])->validate();

        return $queue;
    }
}
