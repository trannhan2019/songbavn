<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $table = 'factorys';
    public $timestamps = false;
    public function THSX()
    {
        return $this->hasMany(Thsx::class,'factory_id');
    }
}
