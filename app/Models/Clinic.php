<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $casts = [
        'facility' => 'array',
        'service' => 'array',
    ];

    protected $fillable = [
        'id',
        'name',
        'address',
        'about',
        'facility',
        'service',
        'news',
        'contact',
        'email',
        'profile_image',
        'created_at',
        'update_at',
    ];
}
