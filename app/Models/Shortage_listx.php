<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Shortage_listx extends Model
{
    protected $table = 'shortage_listx';
    protected $fillable = ['retailer_id', 'wholesaler_id', 'products_id', 'description', 'product_name',
     'manufacturer', 'dosage_form', 'active_ingredient', 'strength', 'packet_size'];


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
        return $this->hasMany(Shortage_list_items::class,'shortage_listx_id');
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


     public function wholesaler_products()
    {
        return $this->belongsTo(WholesalerProduct::class, 'products_id');
    }


    public function getInfoAttribute()
    {
        return $this->product_name.' '.$this->description;
    }

    public function formattedPrice()
    {
        $price = number_format($this->price, 2);
        return $price;
    }

    public function productDesc()
    {
        $desc = "$this->dosage_form $this->active_ingredient $this->strength";
        return $desc;
    }

    public function productDescription()
    {
        $desc = "$this->dosage_form $this->active_ingredients $this->strength";
        return $desc;
    }

}
