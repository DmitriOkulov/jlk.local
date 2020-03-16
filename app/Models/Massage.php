<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    protected $fillable = [
        'email', 'password', 'role', 'name'
    ];
}
