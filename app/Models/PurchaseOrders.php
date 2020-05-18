<?php

namespace App\Models;

use App\User;
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


    public function order_items()
    {
        return $this->hasMany(PurchaseOrderItems::class,'purchase_order_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the order product's name.
     *
     * @return string
     */
    public function getWholesalerAttribute()
    {
        return  User::find($this->wholesaler_id);
    }

    public function getRetailerAttribute(){

    	return User::find($this->retailer_id);
    }
}
