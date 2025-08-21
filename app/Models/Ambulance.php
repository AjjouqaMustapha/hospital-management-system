<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'car_number',
        'car_model',
        'car_year_manufactured',
        'driver_license_number',
        'driver_phone',
        'status'
    ];
    public $translatedAttributes = [
        'driver_name',
        'description',
        'ambulance_type',
    ];
}
