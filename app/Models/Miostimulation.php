<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miostimulation extends Model
{
    protected $fillable = [
        'date', 'power', 'comment', 'id_user', 'id_visitor', 'zone', 'program'
    ];

    public static $program = [
        'limfodrenazh' => 'Лимфодренаж',
        'lifting' => 'Лифтинг',
        'miostimulation' => 'Миостимуляция',
        'lipoliz' => 'Липолиз',
        'relax' => 'Релакс',
    ];

    public static $zone = [
        'vntr_bedro' => 'Внутр. часть бедра',
        'vnsh_bedro' => 'Внешн. часть бедра',
        'boka' => 'Бока',
        'jivot' => 'Живот',
        'ass' => 'Ягодицы',
        'arms' => 'Руки',

    ];
}
