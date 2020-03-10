<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public $timestamps = false;

    public function Menu(){
        return $this->hasMany(Menu::class,'parent','id');
    }

    public function ChildMenu(){
        return $this->hasMany(Menu::class,'parent','id')->with('Menu');
    }
}
