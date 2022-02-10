<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'clinic_id',
        'title',
        'date',
        'content',
        'thumbnail',
        'created_at',
        'update_at',
    ];
}
