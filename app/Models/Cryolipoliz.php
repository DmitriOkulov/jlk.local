<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cryolipoliz extends Model
{
    protected $fillable = [
        'date', 'zone', 'id_user', 'id_visitor', 'comment'
    ];
}
