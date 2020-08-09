<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class RetailerPurchaseOrderController extends ApiController
{
    public function __construct(PurchaseOrders $purchaseOrders)
    {
        $this->middleware('auth:api');
        $this->middleware(['role:Retailer']);
        parent::__construct($purchaseOrders);
    }

    public function savePurchaseOrders(Request $request)
    {
        $user = Auth::user();
        $items = $request->all();
        $purchaseOrder = $this->purchaseOrders::create([
            'wholesaler_id' => $request->wholesaler_id,
            'retailer_id' => $user->id ,
            'status' => 'pending',
            'total' => $request->total,
            'order_type' => 'purchase_order',
            'wholesaler_visible' => 'true'
        ]);

        foreach ($items as $row) {
           $this->purchaseOrderItems::create(
                [
                'purchase_order_id' => $purchaseOrder->id,
                'product_name' => $row->name,
                'products_id' => $row->products_id,
                'description' => $row->productDescription(),
                'quantity' => $row->quantity,
                'price' => $row->price,
                'manufacturer' => $row->manufacturer_slug,
                ]
            );
        }
    }
}
