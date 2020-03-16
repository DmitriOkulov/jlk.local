<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    protected $fillable = [
        'date', 'value', 'measure', 'id_visitor', 'id_user'
    ];
}
