<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class POInvoiceItem extends Model
{
    protected $table = 'po_invoice_items';

    protected $fillable = [ 'product_id', 'description', 'product_name', 'purchase_order_id', 'line_total',
    'quantity', 'price', 'manufacturer' ,'order_type'];


    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrders::class);
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
