<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    use Translatable;

    protected $table = 'groups';

    public $translatedAttributes = ['name','notes','discount_type'];
    public $fillable = ['total_befor_discount','discount_value','total_after_discount','tax_rate','total_with_tax'];

    public $guarded = [];

    public function service_group()
    {
        return $this->belongsToMany(Service::class, 'service_group', 'group_id', 'service_id')->withPivot('quantity');
    }

    

}
