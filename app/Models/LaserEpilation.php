<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaserEpilation extends Model
{
    protected $fillable = [
        'email', 'password', 'role', 'name'
    ];
}