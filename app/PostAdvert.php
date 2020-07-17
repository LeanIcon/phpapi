<?php

namespace App;

use App\Models\ApiModel;
use Illuminate\Database\Eloquent\Model;

class PostAdvert extends ApiModel
{
    protected $table = 'postadvert';
    protected $fillable = ['title', 'body','image'];

}
