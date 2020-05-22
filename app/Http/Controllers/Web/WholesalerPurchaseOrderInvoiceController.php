<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrders;
use Illuminate\Http\Request;

class WholesalerPurchaseOrderInvoiceController extends Controller
{
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
    public function index()
    {
        $pageTitle = 'Purchase Order Invoice';
        return view('admin.pages.wholesalers.purchaseorderinvoice');
    }

    public function invoicedetail()
    {
        $pageTitle = 'Order Invoice';
        return view('admin.pages.wholesalers.invoicedetails');
    }
    


    public function UpdatePurchaseOrderStatus(Request $request,  $purchaseId = null)
    {
        $updateStatus = $this->purchaseOrders::find($purchaseId)->update(['status' => $request->status]);
        return $updateStatus ? redirect()->route('dashboard.index') : redirect()->route('dashboard.index');
    }
}
