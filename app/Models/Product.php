<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Products extends ApiModel
{
    protected $table = "Product";
    protected $fillable = ['name', 'photo', 'manufacture_id', 'equipment_id', 'category_id']
}
