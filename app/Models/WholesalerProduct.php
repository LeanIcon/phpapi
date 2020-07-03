<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class WholesalerProduct extends Model  implements Searchable
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
}
