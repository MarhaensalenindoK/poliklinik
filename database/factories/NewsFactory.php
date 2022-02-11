<?php

namespace Database\Factories;

use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
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
            'clinic_id' => Clinic::factory()->create()->id,
            'title' => $this->faker->name(),
            'date' => $this->faker->date(),
            'content' => $this->faker->text(100),
            'thumbnail' => 'thumbnail1.png',
        ];
    }
}
