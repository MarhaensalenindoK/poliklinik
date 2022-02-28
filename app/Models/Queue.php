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
        'user_id',
        'clinic_id',
        'queue',
        'date',
        'status',
        'created_at',
        'update_at',
    ];

    public function patient() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function medicalHistory() {
        return $this->belongsTo(MedicalHistory::class, 'medical_history_id', 'id');
    }
}
