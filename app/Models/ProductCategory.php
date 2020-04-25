<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends ApiModel
{
    protected $table ='product_category';
    protected $fillable = ['name','type'];
}
