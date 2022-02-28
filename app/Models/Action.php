<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'medical_history_id',
        'medicine_id',
        'sigma',
        'count',
        'created_at',
        'update_at',
    ];

    public function medicine() {
        return $this->hasOne(Medicine::class, 'id', 'medicine_id');
    }
}
