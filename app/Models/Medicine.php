<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'clinic_id',
        'name',
        'amount',
        'type',
        'price',
        'stock',
        'created_at',
        'update_at',
    ];
}
