<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\DetailClinic;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $clinicId = Clinic::factory(['name' => 'Tadika Mesra'])->create()->id;

        News::factory(['clinic_id' => $clinicId])->count(5)->create();

        $users = [
            [
                'name' => 'superadmin',
                'clinic_id' => $clinicId,
                'username' => 'superadmin123',
                'password' => Hash::make('superadmin123'),
                'role' => User::SUPERADMIN,
                'status' => true,
            ],
            [
                'name' => 'admin',
                'clinic_id' => $clinicId,
                'username' => 'admin123',
                'password' => Hash::make('admin123'),
                'role' => User::ADMIN,
                'status' => true,
            ],
            [
                'name' => 'doctor',
                'clinic_id' => $clinicId,
                'username' => 'doctor123',
                'password' => Hash::make('doctor123'),
                'role' => User::DOCTOR,
                'status' => true,
            ],
        ];

        foreach ($users as $user) {
            User::factory($user)->create();
        }
    }
}
