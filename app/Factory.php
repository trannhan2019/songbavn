<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $table = 'factorys';
    public $timestamps = false;
    public function Muctieunam()
    {
        return $this->hasMany(Muctieunam::class,'factory_id');
    }
}
