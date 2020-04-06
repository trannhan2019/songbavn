<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Muctieunam extends Model
{
    use SoftDeletes;
    protected $table = 'muctieunams';
    public function Factory()
    {
        return $this->belongsTo(Factory::class,'factory_id');
    }
    public function Thsx()
    {
        return $this->hasMany(Thsx::class,'muctieunam_id');
    }
}
