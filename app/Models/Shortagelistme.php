<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Shortagelistme extends Model
{
    protected $table = 'shortagelist';
    protected $fillable = ['wholesaler_id','retailer_id', 'products_id', 'description', 'product_name', 
    'quantity', 'price', 'manufacturer' ,'order_type','wholesaler_visible'];


    // public $cast = [

    // ];

    public static function generateInvoiceCode()
    {
        $num = 1;
        $code = str_pad($num, 4, '0', STR_PAD_LEFT);
        return $code;
    }

    public function scopeIsApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function order_items()
    {
        return $this->hasMany(Shortagelistitems::class,'shortagelist_id');
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
