<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends ApiModel
{
    protected $table = "product";
    protected $fillable = ['name', 'photo', 'manufacture_id', 'equipment_id', 'category_id'];
}
