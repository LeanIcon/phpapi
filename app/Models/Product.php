<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends ApiModel
{
	use SoftDelete;
    protected $table = "products";
    protected $fillable = ['name', 'photo', 'other_products_id', 'manufacturers_id', 'equipments_id', 'product_category_id'];
}
