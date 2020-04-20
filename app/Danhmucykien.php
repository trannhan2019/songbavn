<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Danhmucykien extends Model
{
    use SoftDeletes;
    protected $table = 'danhmucykiens';
    //public $timestamps = false;
    public function Ykiencodong()
    {
        return $this->hasMany(Ykiencodong::class,'danhmucykien_id');
    }
}
