<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Models\PurchaseOrderItems;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class RetailerPurchaseOrderController extends ApiController
{
    public $purchaseOrders, $purchaseOrderItems;
    public function __construct(PurchaseOrders $purchaseOrders, PurchaseOrderItems $purchaseOrderItems)
    {
        $this->middleware('auth:api');
        $this->middleware(['role:Retailer']);
        parent::__construct($purchaseOrders);
        $this->purchaseOrders = $purchaseOrders;
        $this->purchaseOrderItems = $purchaseOrderItems;
    }



    public function purchaseOrderCount()
    {
        $user = Auth::user();
        $purchase_orders = $user->retailer_orders;
        $data['purchase_orders'] = $purchase_orders;
        $data['purchase_orders_count'] = $purchase_orders->count();

        return response()->json($data, 200);
    }

    public function loadPurchaseOrderItems(Request $request, $id)
    {
        $order_items =  $this->purchaseOrders::find($id)->order_items;
        return response()->json($order_items, 200);
    }

    public function loadInvoiceItems(Request $request, $id)
    {
        $purchase_order =  $this->purchaseOrders::find($id);
        $invoice_items = $purchase_order->invoice_items;

        $data['invoice_items'] = $invoice_items;
        return response()->json($data, 200);
    }


    public function savePurchaseOrders(Request $request)
    {
        $user = Auth::user();
        $items = collect($request->purchaseOrders);

        $purchaseOrder = $this->purchaseOrders::create([
            'wholesaler_id' => $request->wholesaler_id,
            'retailer_id' => $user->id ,
            'status' => 'pending',
            'total' => $request->total,
            'order_type' => 'purchase_order',
            'wholesaler_visible' => 'true',
            'invoice' => 0,
            'delivery_status' => 0,
            'reference' => Str::uuid()
        ]);

        foreach ($items as $row) {
            $itemsSaved =  $this->purchaseOrderItems::create(
                [
                'purchase_order_id' => $purchaseOrder->id,
                'product_name' => $row['name'] ?? $row['product_name'],
                'products_id' => $row['products_id'],
                'description' => $row['productDescription'] ?? '',
                'quantity' => $row['quantity'] ?? 0,
                'price' => $row['price'],
                'manufacturer' => $row['manufacturer_slug'] ?? $row['manufacturer'],
                ]
            );
        }

        return response()->json($itemsSaved);
    }
}
