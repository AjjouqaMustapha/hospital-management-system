<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    public $timestamps = false; // Assuming you don't want timestamps for translations
}
