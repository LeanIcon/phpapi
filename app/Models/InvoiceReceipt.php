<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceReceipt extends Model
{
    protected $table = 'invoice_receipt';
    protected $fillable = ['receipt_no', 'invoice_id',  'devlivery_status', 'payment_status'];



    public static function generateInvoiceReceipt()
    {
        $num = 1;
        $code = str_pad($num, 4, '0', STR_PAD_LEFT);
        return $code;
    }
}
