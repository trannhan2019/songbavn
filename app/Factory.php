<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factory extends Model
{
    use SoftDeletes;
    protected $table = 'factorys';
    //public $timestamps = false;
    public function Muctieunam()
    {
        return $this->hasMany(Muctieunam::class,'factory_id');
    }
}
