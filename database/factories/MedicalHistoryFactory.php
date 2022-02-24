<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'examiner_id' => User::factory()->create()->id,
            'patient_id' => User::factory()->create()->id,
            'date_checkup' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'allergic' => $this->faker->name(),
            'been_diagnosed' => [
                $this->faker->name(),
                $this->faker->name(),
            ],
            'hospitalization_surgery' => [
                [
                    'reason' => $this->faker->name(),
                ],
                [
                    'reason' => $this->faker->name(),
                ],
            ],
            'anamnesis' => $this->faker->text(),
            'diagnosis' => $this->faker->text(),
            'physical_exam' => $this->faker->text(),
            'vital_sign' => $this->faker->text(),
            'description_action' => $this->faker->text(),
        ];
    }
}
