<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItems extends Model
{
    protected $table = 'purchase_order_items';
    protected $fillable = [ 'product_id', 'description', 'product_name', 'purchase_order_id',
    'quantity', 'price', 'manufacturer' ,'order_type'];
}
