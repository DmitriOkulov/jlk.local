<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    protected $fillable = [
        'date', 'power', 'length', 'comment', 'id_user', 'id_visitor'
    ];
}
