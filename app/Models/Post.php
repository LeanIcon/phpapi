<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends ApiModel
{
    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'description', 'body', 'excerpt','author_id','category_post_id'];


    public function author()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_post_id');
    }

}
