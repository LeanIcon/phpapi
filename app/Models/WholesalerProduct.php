<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class WholesalerProduct extends Model
{
    protected $table = 'wholesaler_products';
    protected $fillable = ['batch_number', 'price', 'expiry_date', 'expiry_status','wholesaler_id','products_id', 'type', 'status'];


    public $appends = [
        'category'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function products()
    {
        return $this->belongsTo(Product::class);
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



}
