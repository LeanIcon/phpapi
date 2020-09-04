<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortage_list_items extends Model
{
    protected $table = 'shortage_list_items';
    protected $fillable = [ 'products_id', 'description', 'product_name', 'shortage_listx_id',
     'manufacturer'];


    public function shortage_list()
    {
        return $this->belongsTo(Shortage_listx::class);
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