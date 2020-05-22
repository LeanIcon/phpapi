<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WholesalerPurchaseOrderInvoiceController extends Controller
{
    public $purchaseOrders;
    public function __construct(PurchaseOrders $purchaseOrders)
    {
        $this->purchaseOrders = $purchaseOrders;
        $this->middleware('auth');
        $this->middleware(['role:Wholesaler']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($purchaseId = null)
    {
        $user = Auth::user();
        $purchaseInvoices = $user->wholesaler_orders->where('invoice', '!=', '');
        $pageTitle = 'Purchase Order Invoice';
        return view('admin.pages.wholesalers.purchaseorderinvoice', compact('purchaseInvoices'));
    }

    public function invoicedetail($purchaseOrderId = null)
    {
        $orderItems = $this->purchaseOrders::find($purchaseOrderId)->order_items;
        $pageTitle = 'Order Invoice';
        return view('admin.pages.wholesalers.invoicedetails', compact('orderItems'));
    }

    public function UpdatePurchaseOrderStatus(Request $request,  $purchaseId = null)
    {
        $code = $this->purchaseOrders::generateInvoiceCode();
        $dvStatus = 'pending';

        $updateStatus = $this->purchaseOrders::find($purchaseId)->update(['status' => $request->status, 'invoice' => $code, 'devlivery_status' => $dvStatus]);
        return $updateStatus ? redirect()->route('dashboard.index') : redirect()->route('dashboard.index');
    }
}
