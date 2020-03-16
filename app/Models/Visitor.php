<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'surname', 'name', 'patronymic', 'birthday', 'skin_color', 'hair_color', 'gormons', 'contraindication', 'phone'
    ];
}
