<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Doctor extends Model
{
    use Translatable;
    use HasFactory;

    public $translatedAttributes = [
        'name',
    ];

    protected $fillable = [
        'email','email_verefied_at','password','phone','name','section_id'
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function section() {
        return $this -> belongsTo(Section::class);
    }
    public function DoctorTranslation() {
        return $this -> hasOne(DoctorTranslation::class);
    }

    public function doctorappointments() {
        return $this -> belongsToMany(Appointment::class, 'appoinment_doctor');
    }
}
