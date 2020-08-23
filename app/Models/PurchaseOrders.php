<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrders extends ApiModel
{
    protected $table = 'purchase_orders';
    protected $fillable = ['wholesaler_id','retailer_id', 'products_id', 'description', 'product_name', 'total', 'invoice',
    'quantity', 'price', 'manufacturer' ,'order_type','wholesaler_visible', 'status' , 'devlivery_status','reference', 'approved_total'];


    // protected $with = ['order_items'];
    // public $cast = [

    // ];

    public $appends = [
        'wholesaler_name',
        'retailer_name'
    ];

    public static function generateInvoiceCode()
    {
        $num = 1;
        $code = str_pad($num, 4, '0', STR_PAD_LEFT);
        return $code;
    }

    public function getWholesalerNameAttribute()
    {
        $maftr = User::find($this->wholesaler_id)->name;
        return $maftr ?? 'na';
    }

    public function getRetailerNameAttribute()
    {
        $maftr = User::find($this->retailer_id)->name;
        return $maftr ?? 'na';
    }

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
        return $this->hasMany(User::class);
    }


    public function get_retailer()
    {
        return $this->belongsTo(User::class, 'retailer_id', 'id');
    }

    public function get_wholesaler()
    {
        return $this->belongsTo(User::class, 'wholesaler_id', 'id');
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
