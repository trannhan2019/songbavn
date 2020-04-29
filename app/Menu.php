<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $table = 'menus';
    // public $timestamps = false;

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

    public function ParentTrash()
    {
        return $this->belongsTo(Menu::class,'parent','id')->withTrashed();
    }

    public function Contents(){
        return $this->hasMany(Content::class,'menu_id','id');
    }

    public function ParentContents(){
        return $this->hasManyThrough(Content::class,Menu::class,'parent','menu_id');
    }

    public function Ykiens(){
        return $this->hasMany(Ykiencodong::class,'menu_id','id');
    }
}
