<?php

namespace App\Models;

use App\User;
use Illuminate\Support\Str;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class WholesalerProduct extends ApiModel  implements Searchable
{
    protected $table = 'wholesaler_products';
    protected $fillable = ['batch_number', 'price', 'product_code','expiry_date', 'expiry_status','wholesaler_id','packet_size','active_ingredient',
    'strength', 'manufacturer_id', 'products_id', 'type', 'status', 'product_name','dosage_form', 'drug_legal_status','manufacturer'];


    // public $appends = [
    //     'category'
    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'wholesaler_id');
    }


   public function products()
   {
        return $this->belongsToMany(Product::class, 'wholesaler_products', 'id','products_id');
   }

    public function order_items()
    {
        return $this->hasMany(PurchaseOrderItems::class);
    }


    public function getCategoryAttribute()
    {
        return $this->products->category;
    }

    public function product_cat()
    {
        $product_cat = Product::find($this->products_id)->category->pluck();
        return $product_cat;
    }

    public function formattedPrice()
    {
        $price = number_format($this->price, 2);
        return $price;
    }

    public function productDesc()
    {
        $desc = "$this->dosage_form $this->active_ingredients $this->strength";
        return $desc;
    }

    public function productDescription()
    {
        $desc = "$this->dosage_form $this->active_ingredients $this->strength";
        return $desc;
    }

    public function getSearchResult(): SearchResult
    {
        //$url = route('admin.pages.retailers.search', $this->id);

        return new SearchResult(
            $this,
            $this->product_name,
            $this->product_code
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
    public function getDrugCodeProducts($inComingProdCode)
    {
        $getLastProd =  self::where('product_code', 'like', '%'. $this->generateDrugCode($inComingProdCode) .'%')->get();

        if($getLastProd->count() > 0) {
            $getLastProd = collect($getLastProd)->last();
            return $getLastProd->product_code;
        }

        return $inComingProdCode = $this->generateDrugCode($inComingProdCode);
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
