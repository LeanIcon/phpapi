<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends ApiModel
{
    protected $table = "products";
    protected $fillable = ['name', 'photo', 'other_products_id', 'manufacturers_id', 'equipments_id', 'product_category_id'];
}
