<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'uid',
        'title',
        'content',
        'likes'
    ];
}
