<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thsx extends Model
{
    use SoftDeletes;
    protected $table = 'thsxs';
    public function Factory()
    {
        return $this->belongsTo(Factory::class,'factory_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
