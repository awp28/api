<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'passport',
        'passport_given_date',
        'tin',
        'pin',
        's_name',
        'f_name',
        'm_name',
        'gender',
        'birth_date',
        'region_id',
        'city_id',
        'street',
        'deported_country_id',
        'arriving_country_id',
        'arriving_country_is_forbidden',
        'profession_sector_id',
        'profession_id',
        'user_id',
        'data',
        'citizenship',
        'one_id_status',
        'sync',
        'additional_passport',
        'is_reestr'
    ];
}
