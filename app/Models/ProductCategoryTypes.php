<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryTypes extends Model
{
    protected $table = 'product_category_types';
    protected $fillable = ['product_category_id','name', 'status'];

    public $timestamps = false;
}
