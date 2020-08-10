<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class WholesalerPurchaseOrderController extends ApiController
{
    public $purchaseOrders;
    public function __construct(PurchaseOrders $purchaseOrders)
    {
        $this->middleware('auth:api');
        parent::__construct($purchaseOrders);
        $this->purchaseOrders = $purchaseOrders;
    }


    public function purchaseOrderCount()
    {
        $user = Auth::user();
        $purchase_orders = $user->wholesaler_orders;
        $data['purchase_orders'] = $purchase_orders;
        $data['purchase_orders_count'] = $purchase_orders->count();

        return response()->json($data, 200);
    }

    public function loadPurchaseOrderItems(Request $request, $id)
    {
        $purchase_order =  $this->purchaseOrders::find($id);
        $order_items = $purchase_order->order_items;

        $data['purchase_order'] = $purchase_order;
        // $data['order_items'] = $order_items;
        return response()->json($data, 200);
    }

    public function savePurchaseOrders(Request $request)
    {

    }

}
