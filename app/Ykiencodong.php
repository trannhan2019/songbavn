<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Ykiencodong extends Model
{
    use SoftDeletes;
    protected $table = 'ykiencodongs';

    public function Menu()
    {
        return $this->belongsTo(Menu::class,'menu_id','id');
    }

    public function Danhmuc()
    {
        return $this->belongsTo(Danhmucykien::class,'danhmucykien_id','id');
    }

    public function Traloi(){
        return $this->hasOne(Traloicodong::class,'ykiencodong_id','id');
    }
}
