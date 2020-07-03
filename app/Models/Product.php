<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\WholesalerProduct;
use Illuminate\Database\Eloquent\Model;


class Product extends ApiModel 
{
    protected $table = "products";
    protected $fillable = ['name', 'image_url', 'code','active_ingredients', 'associated_name','dosage_form_id', 'packet_size', 'dosage_class_slug','product_code',
    ' category', 'strength', 'drug_class_id', 'type', 'product_category_id', 'product_category_id', 'manufacturer_id','dosage_form_slug','product_category_slug'];



    protected $casts = [
        'active_ingredients' => Json::class
    ];

    
    public function wholesalers()
    {
        return $this->belongsToMany(WholesalerProduct::class);
    }
    


    public function scopeProductCategory($value)
    {
        $productCat = ProductCategory::find($this->product_category_id);
        return $productCat;
    }

    
    public function scopeIsDrug($query, $wholesalerId = null)
    {
        return $query->where('product_category_slug', 'drugs');
    }

    public function scopeIsMedicalDevice($query, $wholesalerId = null)
    {
        return $query->where('product_category_slug', 'device');
    }


    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }

    public function productDescription()
    {
        $desc = "$this->active_ingredients $this->strength";
        return $desc;
    }

    public function productDesc()
    {
        $desc = "$this->name $this->active_ingredients $this->strength";
        return $desc;
    }

    public function dosageform(){
        return $this->belongsTo(DosageForm::class,'dosage_form_id');
        
    }
    

     
    


}
