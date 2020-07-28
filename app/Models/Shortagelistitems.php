<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortagelistitems extends Model
{
    protected $table = 'shortagelistitems';
    protected $fillable = [ 'products_id', 'description', 'product_name', 'shortagelist_id',
    'quantity','manufacturer' ,'order_type'];


    public function shortagelist()
    {
        return $this->belongsTo(Shortagelistme::class);
    }

    public function wholesaler_products()
    {
        return $this->belongsTo(WholesalerProduct::class, 'products_id');
    }


    public function getInfoAttribute()
    {
        return $this->product_name.' '.$this->description;
    }
}
