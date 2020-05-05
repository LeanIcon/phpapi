<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrders extends Model
{
    protected $table = 'purchase_orders';
    protected $fillable = ['wholesaler_id','retailer_id', 'products_id', 'description', 'product_name',
    'quantity', 'price', 'manufacturer' ,'order_type','wholesaler_visible'];


    // public $cast = [

    // ];
}
