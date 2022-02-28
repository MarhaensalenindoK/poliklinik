<?php

namespace Database\Factories;

use App\Models\Clinic;
use App\Models\MedicalHistory;
use App\Models\Queue;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QueueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [
            Queue::CHECKIN,
            Queue::CASHER,
            Queue::DONE,
        ];

        return [
            'id' => $this->faker->uuid(),
            'medical_history_id' => MedicalHistory::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'clinic_id' => Clinic::factory()->create()->id,
            'queue' => $this->faker->randomDigit(),
            'date' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'status' => $this->faker->randomElement($status),
        ];
    }
}
