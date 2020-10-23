<?php

namespace App\Models;

use App\User;
use App\Casts\Json;
use Illuminate\Support\Str;
use App\Models\WholesalerProduct;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class Product extends ApiModel implements Searchable
{
    protected $table = "products";
    protected $fillable = ['name', 'image_url', 'code','active_ingredients', 'associated_name','dosage_form_id', 'packet_size', 'dosage_class_slug', 'product_code',
    'associated_name', 'brand_name', 'generic_name','therapeutic_class', 'drug_legal_status',
    ' category', 'dosage_form','strength', 'drug_class_id', 'type', 'product_category_id', 'manufacturer_id','dosage_form_slug','product_category_slug'];



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



    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    // public function setProductCodeAttribute()
    // {
    //     $brand_name = Str::substr($data['brand_name'], 0, 3);
    //     $generic_name = Str::substr($data['generic_name'], 0, 3);
    //     $drugCode = "$brand_name$generic_name";

    //     $this->attributes['product_code'] =  $drugCode;
    //     return $drugCode;
    // }


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


    /**
     * Pick first 3 letters from brand name and generic name
     *
     * @param [type] $data
     * @return String
     */
    public function generateDrugCode($data)
    {
        $brand_name = Str::substr($data['brand_name'], 0, 3);
        $generic_name = Str::substr($data['generic_name'], 0, 3);
        $drugCode = "$brand_name$generic_name";

        return $drugCode;
    }

    /**
     * Get last product from Collection
     * Generic Code Increment
     * @param [type] $data
     * @return String
     */
    public function getDrugCodeProducts($product)
    {

        $getLastProd =  self::where('product_code', 'like', '%'. $product['product_code'] .'%')
                            ->where('strength', '=' , $product['strength'])
                            ->where('dosage_form', '=' , $product['dosage_form'])
                            ->get();


        if($getLastProd->count() > 0) {
            $getLastProd = collect($getLastProd);
            return $getLastProd;
        }

        return $product;

        // return $inComingProdCode = $this->generateDrugCode($inComingProdCode);
    }

    /**
     * Pick first 3 letters from brand name and generic name
     * Generic Code Increment
     * @param [type] $data
     * @return String
     */
    public function generateDrugCodeInc($productIn, $codeComb)
    {
        $idxCode = 0;
        $code = $this->generateDrugCode($codeComb);
        if(Str::of($productIn)->exactly($code)) {
            $genCode = $idxCode+=1;
            return  "$productIn$genCode";
        }
        $getLastDig = Str::after($productIn, $code);
        $getLastDig+=1;

        return "$code$getLastDig";

    }


}
