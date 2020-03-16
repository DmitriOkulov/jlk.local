<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miostimulation extends Model
{
    protected $fillable = [
        'email', 'password', 'role', 'name'
    ];
}
