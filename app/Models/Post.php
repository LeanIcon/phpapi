<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends ApiModel
{
    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'description', 'body', 'excerpt','author_id'];

}
