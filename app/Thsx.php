<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thsx extends Model
{
    use SoftDeletes;
    protected $table = 'thsxs';
    public function Muctieunam()
    {
        return $this->belongsTo(Muctieunam::class,'muctieunam_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
