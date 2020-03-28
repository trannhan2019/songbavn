<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public $timestamps = false;

    public function Menus(){
        return $this->hasMany(Menu::class,'parent','id');
    }

    public function ChildMenus(){
        return $this->hasMany(Menu::class,'parent','id')->with('Menus');
    }

    public function Parent()
    {
        return $this->belongsTo(Menu::class,'parent','id');
    }

    public function Contents(){
        return $this->hasMany(Content::class,'menu_id','id');
    }
}
