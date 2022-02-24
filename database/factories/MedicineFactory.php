<?php

namespace Database\Factories;

use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amount = [
            'TABLET',
            'STRIP',
            'KAPSUL'
        ];

        $type = [
            'GENERIK TABLET',
            'GENERIK KAPSUL',
        ];

        return [
            'id' => $this->faker->uuid(),
            'clinic_id' => Clinic::factory()->create()->id,
            'name' => $this->faker->name(),
            'amount' => $this->faker->randomElement($amount),
            'type' => $this->faker->randomElement($type),
            'price' => $this->faker->numberBetween($min = 10000, $max = 100000),
            'stock' => $this->faker->numberBetween($min = 1, $max = 100),
        ];
    }
}
