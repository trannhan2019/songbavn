<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traloicodong extends Model
{
    use SoftDeletes;
    protected $table = 'traloicodongs';
    public function Ykien()
    {
        return $this->belongsTo(Ykiencodong::class,'ykiencodong_id','id');
    }
}
