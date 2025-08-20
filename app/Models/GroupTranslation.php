<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTranslation extends Model
{
    use HasFactory;
    protected $table = 'group_translations';
    protected $fillable = ['name','notes','discount_type'];
    public $timestamps = false;
}
