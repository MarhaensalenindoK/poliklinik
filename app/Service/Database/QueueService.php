<?php

namespace App\Service\Database;

use App\Models\Queue as ModelsQueue;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Validation\Rule;

class QueueService {
    public function detail($queueId)
    {
        $queue = ModelsQueue::with('patient')->with('medicalHistory')->findOrFail($queueId);

        return $queue->toArray();
    }

    public function create($medical_history_id, $patient_id, $payload)
    {
        $queue = new ModelsQueue();
        $queue->id = Uuid::uuid4()->toString();
        $queue->medical_history_id = $medical_history_id;
        $queue->patient_id = $patient_id;
        $queue = $this->fill($queue, $payload);
        $queue->save();

        return $queue;
    }

    public function update($queueId, $payload)
    {
        $queue = ModelsQueue::findOrFail($queueId);
        $queue = $this->fill($queue, $payload);
        $queue->save();

        return $queue;
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
            'patient_id' => 'required',
            'queue' => 'required',
            'date' => 'required',
            'status' => ['required', Rule::in(config('constant.queue.status'))],
        ])->validate();

        return $queue;
    }
}
