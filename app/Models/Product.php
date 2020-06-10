<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\WholesalerProduct;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends ApiModel implements Searchable
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

    public function productDescription()
    {
        $desc = "$this->active_ingredients $this->strength $this->packet_size";
        return $desc;
    }
    
    public function prodesc()
    {
        $desc = "$this->name $this->active_ingredients $this->strength $this->packet_size";
        return $desc;
    }

    public function dosageform()
    {
        return $this->belongsTo(DosageForm::class,'dosage_form_id');
    }

     public function getSearchResult(): SearchResult
    {
        //$url = route('admin.pages.retailers.search', $this->id);
 
        return new SearchResult(
            $this,
            $this->name,
            $this->strength
            //$url
        );
    }
    

}
