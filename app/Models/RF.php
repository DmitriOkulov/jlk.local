<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RF extends Model
{
    protected $fillable = [
        'date', 'stomach', 'ass', 'hips', 'id_user', 'id_visitor', 'comment'
    ];
}
