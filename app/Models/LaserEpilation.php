<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaserEpilation extends Model
{
    protected $fillable = [
        'date', 'percent', 'comment', 'id_user', 'id_visitor', 'zone', 'ms', 'gc'
    ];
}
