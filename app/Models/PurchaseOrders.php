<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrders extends Model
{
    protected $table = 'purchase_orders';
    protected $fillable = ['wholesaler_id','retailer_id', 'products_id', 'description', 'product_name', 'total',
    'quantity', 'price', 'manufacturer' ,'order_type','wholesaler_visible', 'status'];


    // public $cast = [

    // ];

    public function scopeIsApproved($query)
    {
        return $query->where('status', 'approved');
    }
}
