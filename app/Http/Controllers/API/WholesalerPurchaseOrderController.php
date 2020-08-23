<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Models\POInvoiceItem;

class WholesalerPurchaseOrderController extends ApiController
{
    public $purchaseOrders, $pOInvoiceItem;
    public function __construct(PurchaseOrders $purchaseOrders, POInvoiceItem $pOInvoiceItem)
    {
        $this->middleware('auth:api');
        parent::__construct($purchaseOrders);
        $this->purchaseOrders = $purchaseOrders;
        $this->pOInvoiceItem = $pOInvoiceItem;
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


    public function UpdatePurchaseOrderStatus(Request $request,  $purchaseId = null)
    {
        $code = $this->purchaseOrders::generateInvoiceCode();
        $dvStatus = 'pending';

        $updateStatus = $this->purchaseOrders::find($purchaseId)->update(['status' => $request->status, 'invoice' => $code, 'devlivery_status' => $dvStatus]);
        if($updateStatus)
        {
            return response()->json(['message'=> 'Update Successfull']);
        }
        return response()->json(['message'=> 'Processing Unsuccessfull try again']);
    }

    public function proccessPurchaseOrder(Request $request)
    {
        $user = Auth::user();
        $request['status'] = 'processed';
        $items = collect($request->purchaseOrders);
        $code = $this->purchaseOrders::generateInvoiceCode();
        $dvStatus = 'pending';

        $purchaseOrder = $this->purchaseOrders::find($request->purchaseOrderId);
        $purchaseOrder->update(['status' => $request->status, 'invoice' => $code, 'devlivery_status' => $dvStatus, 'approved_total' => $request->total ]);

        foreach ($items as $row) {
            $itemsSaved =  $this->pOInvoiceItem::create(
                [
                'purchase_order_id' => $request->purchaseOrderId,
                'product_name' => $row['name'] ?? $row['product_name'],
                'products_id' => $row['products_id'],
                'description' => $row['productDescription'] ?? '',
                'quantity' => $row['quantity'] ?? 0,
                'price' => $row['price'],
                'line_total' => (float)$row['price'] * (int)$row['quantity'],
                'manufacturer' => $row['manufacturer_slug'] ?? $row['manufacturer'],
                ]
            );
        }

        if($itemsSaved->id) {
            return response()->json(['message'=> 'Order Proccessed Successfull']);
        }
        return response()->json(['message'=> 'Problem proccessing order try again']);
    }

}
