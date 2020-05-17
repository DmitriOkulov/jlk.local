<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contraindication extends Model
{
    protected $fillable = [
        'date', 'value', 'id_user', 'id_visitor'
    ];
}
