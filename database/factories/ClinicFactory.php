<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
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
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'about' => $this->faker->text(200),
            'facility' => [
                [
                    'name' => $this->faker->name(),
                    'description' => $this->faker->text(100),
                ],
                [
                    'name' => $this->faker->name(),
                    'description' => $this->faker->text(100),
                ],
            ],
            'service' => [
                $this->faker->name(),
                $this->faker->name(),
            ],
            'email' => $this->faker->email(),
            'contact' => $this->faker->phoneNumber(),
            'profile_image' => 'profile_image1.png',
        ];
    }
}
