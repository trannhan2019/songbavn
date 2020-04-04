<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use SoftDeletes;
    protected $table = 'slides';
    public function Content()
    {
        return $this->belongsTo(Content::class,'content_id');
    }
}
