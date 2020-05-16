<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = [
        'date', 'weight', 'left_triceps', 'right_triceps', 'waist', 'sides', 'ass', 'left_hip', 'right_hip', 'left_calf', 'right_calf', 'id_visitor', 'id_user'
    ];
}
