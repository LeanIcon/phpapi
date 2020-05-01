<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetailerProduct extends Model
{
    protected $table = 'retailer_products';
    protected $fillable = ['batch_number', 'price', 'expiry_date', 'expiry_status','retailer_id','products_id', 'type', 'status'];
}
