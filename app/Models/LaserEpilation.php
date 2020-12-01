<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaserEpilation extends Model
{
    const ZONES = [
        "Стрижка женская",
        "Маникюр",
        "Голени с коленями",
        "Бедра полностью",
        "Ноги полностью",
        "Ягодицы",
        "Подмышки",
        "Руки полностью",
        "Руки до локтя",
        "Глубокое бикини",
        "Верхняя губа, подбородок",
        "Классическое бикини",
        "Лицо полностью",
        "Шея",
        "Щеки, бакенбарды",
        "Грудь полностью",
        "Ореолы",
        "Спина полностью",
        "Живот полностью",
        "Линия живота до пупка",
    ];

    protected $fillable = [
        'date', 'percent', 'comment', 'id_user', 'id_visitor', 'zone', 'ms', 'gc',
    ];
}
