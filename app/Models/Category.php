<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends ApiModel
{
    protected $table = 'product_category';
    protected $fillable = ['name', 'type', 'status', 'created_at', 'updated_at'];
}
