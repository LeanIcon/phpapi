<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RetailerinvoiceController extends Controller
{
    public $purchaseOrders;
    public function __construct(PurchaseOrders $purchaseOrders)
    {
        $this->purchaseOrders = $purchaseOrders;
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $purchaseId = null)
    {
        $user = Auth::user();
        $purchaseInvoices = $user->retailer_orders->where('invoice', '!=', '');
        $pageTitle = 'Retailer Invoice';
        return view('admin.pages.retailers.retailer_invoice', compact('purchaseInvoices'));
    }
    public function retailerinvoicedetail($purchaseOrderId = null)
    {
        $orderItems = $this->purchaseOrders::find($purchaseOrderId)->order_items;
        $pageTitle = 'Order Invoice';
        return view('admin.pages.retailers.invoicedetails', compact('orderItems'));
    }

    public function listProforma(Request $request)
    {
        $user = Auth::user();
        $pageTitle = 'Pro-forma Invoice';
        $proformaInvoice = $user->retailer_orders->where('order_type', '=', 'pro_forma');
        return view('admin.pages.retailers.invoice.pro_forma', compact('proformaInvoice', 'pageTitle'));
    }

    public function getProformaInvoice($order = null)
    {
        $user = Auth::user();
        $pageTitle = 'Pro-forma Invoice';
        $purchaseOrder = $this->purchaseOrders::find($order);
        $proformaInvoiceItems = $this->purchaseOrders::find($order)->order_items;

        return view('admin.pages.retailers.invoice.details', compact('proformaInvoiceItems', 'pageTitle','purchaseOrder'));
    }

    public function updateProformaInvoice($order = null)
    {
        $user = Auth::user();
        $pageTitle = 'Pro-forma Invoice';
        $purchaseOrder = $this->purchaseOrders::find($order)->update(['status'=> 'Approved', 'delivery_status' => 'Pending']);
        $proformaInvoiceItems = $this->purchaseOrders::find($order)->order_items;

        return view('admin.pages.retailers.invoice.details', compact('proformaInvoiceItems', 'pageTitle','purchaseOrder'));
    }

  //  public function invoicedetail()
   // {
   //     $pageTitle = 'Invoice details';
   //     return view('admin.pages.retailers.invoicedetails');
   // }
}
