<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    protected $table = 'contents';
    public $timestamps = true;
    protected $dates = [
        'created_at', 
        'update_at', 
        'delete_at', 
    ];
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Menu()
    {
        return $this->belongsTo(Menu::class,'menu_id');
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class,'content_id');
    }

    public function Slide()
    {
        return $this->hasOne(Slide::class,'content_id');
    }
}
