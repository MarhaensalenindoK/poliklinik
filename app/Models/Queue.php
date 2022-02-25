<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    const CHECKIN = 'CHECKIN';
    const CASHER = 'CASHER';
    const DONE = 'DONE';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'medical_history_id',
        'patient_id',
        'clinic_id',
        'queue',
        'date',
        'status',
        'created_at',
        'update_at',
    ];

    public function patient() {
        return $this->hasone(User::class, 'id', 'patient_id');
    }

    public function medicalHistory() {
        return $this->hasone(MedicalHistory::class, 'id', 'medical_history_id');
    }
}
