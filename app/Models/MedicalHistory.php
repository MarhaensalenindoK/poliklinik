<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $casts = [
        'been_diagnosed' => 'array',
        'hospitalization_surgery' => 'array',
    ];

    protected $fillable = [
        'id',
        'examiner_id',
        'patient_id',
        'date_checkup',
        'allergic',
        'been_diagnosed',
        'hospitalization_surgery',
        'anamnesis',
        'diagnosis',
        'physical_exam',
        'vital_sign',
        'description_action',
        'created_at',
        'update_at',
    ];
}
