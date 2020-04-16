<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Danhmucykien extends Model
{
    protected $table = 'danhmucykiens';
    public $timestamps = false;
    public function Ykiencodong()
    {
        return $this->hasMany(Ykiencodong::class,'danhmucykien_id');
    }
}
