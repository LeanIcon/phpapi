<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\WholesalerProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends ApiModel
{
    protected $table = "products";
    protected $fillable = ['name', 'photo', 'code','active_ingredients', 'associated_name','dosage_form_id', 'packet_size', 'dosage_class_slug',
    ' category', 'strength', 'drug_class_id', 'type', 'product_category_id', 'product_category_id', 'manufacturer_id','dosage_form_slug','product_category_slug'];



    protected $casts = [
        'active_ingredients' => Json::class
    ];

    public function wholesaler_products()
    {
        return $this->belongsTo(WholesalerProduct::class);
    }


    public function scopeProductCategory($value)
    {
        $productCat = ProductCategory::find($this->product_category_id);
        return $productCat;
    }


    public function manufacturers()
    {
        return $this->belongsTo(Manufacturer::class,'manufacturer_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }

}
