<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ADMIN = 'ADMIN';
    const DOCTOR = 'DOCTOR';
    const RECEPTIONIST = 'RECEPTIONIST';
    const PATIENT = 'PATIENT';
    const USER = 'USER';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'subjects',
        'created_at',
        'update_at',
    ];
}
