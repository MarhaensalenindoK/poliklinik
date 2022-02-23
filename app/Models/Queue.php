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
        'queue',
        'date',
        'status',
        'created_at',
        'update_at',
    ];
}
