<?php

namespace Database\Seeders;

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
        $users = [
            [
                'name' => 'adminuser',
                'username' => 'admin123',
                'password' => Hash::make('admin123'),
                'role' => User::ADMIN,
                'status' => true,
            ],
            [
                'name' => 'user',
                'username' => 'user123',
                'password' => Hash::make('user123'),
                'role' => User::USER,
                'status' => true,
            ],
        ];

        foreach ($users as $user) {
            User::factory($user)->create();
        }
    }
}
