<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use Translatable;
    use HasFactory;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = [
        'insurance_code',
        'discount_percentage',
        'company_rate',
        'status',
    ];

}
