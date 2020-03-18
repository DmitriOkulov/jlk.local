<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miostimulation extends Model
{
    protected $fillable = [
        'date', 'power', 'comment', 'id_user', 'id_visitor', 'zone', 'program'
    ];
}
