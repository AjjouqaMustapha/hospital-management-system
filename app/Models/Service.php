<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name'];
    protected $fillable = ['price', 'description','status'];


    protected $guarded = [];
    public function group()
    {
        return $this->belongsToMany(Group::class, 'service_group', 'service_id', 'group_id');
    }
    public function serviceTranslation()
    {
        return $this->hasMany(ServiceTranslation::class);
    }
    

    
}
