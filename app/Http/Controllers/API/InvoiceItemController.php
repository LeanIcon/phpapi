<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;

class InvoiceItemController extends Controller
{
    public $purchaseOrders;
    public function __construct(PurchaseOrders $purchaseOrders)
    {
        $this->middleware('auth:api');
        $this->purchaseOrders = $purchaseOrders;
    }
    //


    public function loadInvoiceItems(Request $request, $id)
    {
        $purchase_order =  $this->purchaseOrders::find($id);
        $invoice_items = $purchase_order->invoice_items;

        $data['invoice_items'] = $invoice_items;
        return response()->json($data, 200);
    }
}
