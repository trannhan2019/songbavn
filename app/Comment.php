<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $table = 'comments';
    public $timestamps = true;

    public function Content()
    {
    	return $this->belongsTo(Content::class,'content_id');
    }
    public function ContentTrash()
    {
    	return $this->belongsTo(Content::class,'content_id')->withTrashed();
    }
    public function User()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
}
