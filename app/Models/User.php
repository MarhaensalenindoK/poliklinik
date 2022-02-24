<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const SUPERADMIN = 'SUPERADMIN';
    const ADMIN = 'ADMIN';
    const DOCTOR = 'DOCTOR';
    const RECEPTIONIST = 'RECEPTIONIST';
    const PATIENT = 'PATIENT';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'clinic_id',
        'name',
        'nik',
        'email',
        'role',
        'username',
        'password',
        'status',
        'created_at',
        'update_at',
    ];

    public function clinic() {
        return $this->belongsTo(Clinic::class);
    }

    public function medicalHistoryPatient() {
        return $this->belongsTo(MedicalHistory::class, 'patient_id', 'id');
    }

    public function medicalHistoryExaminer() {
        return $this->hasMany(MedicalHistory::class, 'examiner_id', 'id');
    }
}
