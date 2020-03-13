<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    
    //Quan he voi Content
    public function Contents(){
        return $this->hasMany(Content::class,'user_id');
    }
    //lay thong tin user co bao nhieu comment
    public function Comments(){
        return $this->hasMany(Comment::class,'user_id');
    }

    public function Thsxs(){
        return $this->hasMany(Thsx::class,'user_id');
    }

    public function Traloicodongs(){
        return $this->hasMany(Traloicodong::class,'user_id');
    }

    public function Ykiencodongs(){
        return $this->hasMany(Ykiencodong::class,'user_id');
    }

}
