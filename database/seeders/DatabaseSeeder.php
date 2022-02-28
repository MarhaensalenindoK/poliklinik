<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\MedicalHistory;
use App\Models\Medicine;
use App\Models\News;
use App\Models\Queue;
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
        Medicine::factory(['clinic_id' => $clinicId])->count(5)->create();

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
            [
                'name' => 'receptionist',
                'clinic_id' => $clinicId,
                'username' => 'receptionist123',
                'password' => Hash::make('receptionist123'),
                'role' => User::RECEPTIONIST,
                'status' => true,
            ],
        ];

        foreach ($users as $user) {
            User::factory($user)->create();
        }

        $patient = [
            'name' => 'patient',
            'clinic_id' => $clinicId,
            'username' => 'patienta123',
            'password' => Hash::make('patienta123'),
            'role' => User::PATIENT,
            'status' => true,
        ];

        $patient2 = [
            'name' => 'patient',
            'clinic_id' => $clinicId,
            'username' => 'patient123',
            'password' => Hash::make('patient123'),
            'role' => User::PATIENT,
            'status' => true,
        ];

        $doctor = [
            'name' => 'doctor',
            'clinic_id' => $clinicId,
            'username' => 'doctora123',
            'password' => Hash::make('doctora123'),
            'role' => User::DOCTOR,
            'status' => true,
        ];

        $createPatientActive = User::factory($patient)->create()->id;
        $createPatientActive2 = User::factory($patient2)->create()->id;
        $createDoctorActive = User::factory($doctor)->create()->id;

        $medicalHistory = MedicalHistory::factory([
            'examiner_id' => $createDoctorActive,
            'patient_id' => $createPatientActive,
        ])->create();

        $medicalHistory2 = MedicalHistory::factory([
            'examiner_id' => $createDoctorActive,
            'patient_id' => $createPatientActive2,
        ])->create();

        Queue::factory([
            'medical_history_id' => $medicalHistory->id,
            'user_id' => $createPatientActive,
            'clinic_id' => $clinicId,
        ])->create();

        Queue::factory([
            'medical_history_id' => $medicalHistory2->id,
            'user_id' => $createPatientActive2,
            'clinic_id' => $clinicId,
        ])->create();
    }
}
