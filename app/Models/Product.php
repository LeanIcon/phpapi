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
    protected $fillable = ['name', 'image_url', 'code','active_ingredients', 'associated_name','dosage_form_id', 'packet_size', 'dosage_class_slug', 'product_code',
    'associated_name', 'brand_name', 'generic_name','therapeutic_class', 'drug_legal_status',
    ' category', 'strength', 'drug_class_id', 'type', 'product_category_id', 'manufacturer_id','dosage_form_slug','product_category_slug'];



    protected $casts = [
        'active_ingredients' => Json::class
    ];


    public $appends = [
        'manufacturer'
    ];

    public function wholesalers()
    {
        return $this->belongsToMany(WholesalerProduct::class);
    }


    public function getManufacturerAttribute()
    {
        $maftr = Manufacturer::find($this->manufacturer_id);
        return $maftr ?? 'na';
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
