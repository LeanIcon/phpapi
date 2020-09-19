<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class WholesalerProduct extends ApiModel
{
    protected $table = 'wholesaler_products';
    protected $fillable = ['batch_number', 'price', 'product_code','expiry_date', 'expiry_status','wholesaler_id','packet_size',
    'strength', 'manufacturer_id', 'product_id', 'type', 'status', 'product_name','dosage_form', 'drug_legal_status','manufacturer'];

    public $with = ['product'];

    public $appends = [
        'wholesaler_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getWholesalerNameAttribute()
    {
        $maftr = User::find($this->wholesaler_id)->name;
        return $maftr ?? 'na';
    }


   public function products()
   {
        return $this->belongsToMany(Product::class, 'wholesaler_products', 'id','product_id');
   }

   public function product()
   {
        return $this->belongsTo(Product::class, 'id');
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

}
