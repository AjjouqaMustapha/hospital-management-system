<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    protected $fillable =[
        'name','appointments',
    ];
    use HasFactory;

    public $timestamps = false;
}
