<?php

namespace Database\Factories;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->firstName();
        $username = $name.$this->faker->numerify('###');

        $roles = [
            User::SUPERADMIN,
            User::ADMIN,
            User::DOCTOR,
            User::RECEPTIONIST,
            User::PATIENT,
        ];

        return [
            'id' => $this->faker->uuid(),
            'clinic_id' => Clinic::factory()->create()->id,
            'name' => $name,
            'username' => $username,
            'password' => Hash::make($username),
            'role' => $this->faker->randomElement($roles),
            'status' => true,
            'email' => $this->faker->email(),
        ];
    }
}
