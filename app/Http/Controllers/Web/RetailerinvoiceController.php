<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Http\Controllers\Controller;
use App\Models\InvoiceReceipt;
use Illuminate\Support\Facades\Auth;

class RetailerinvoiceController extends Controller
{
    public $purchaseOrders, $invoiceReceipt;
    public function __construct(PurchaseOrders $purchaseOrders, InvoiceReceipt $invoiceReceipt)
    {
        $this->purchaseOrders = $purchaseOrders;
        $this->invoiceReceipt = $invoiceReceipt;
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

        return view('admin.pages.retailers.invoice.details', compact('proformaInvoiceItems', 'pageTitle','purchaseOrder','order'));
    }

    public function updateProformaInvoice(Request $request, $order = null)
    {

        $receiptCode = $this->invoiceReceipt::generateInvoiceReceipt();
        $code = $this->purchaseOrders::generateInvoiceCode();
        $dvStatus = 'pending';
        $orderType = 'invoice';

        $updateStatus = $this->purchaseOrders::find($request->profomId)->update(['status' => $request->status, 'invoice' => $code, 'devlivery_status' => $dvStatus, 'order_type' => $orderType]);

        $updateStats = $this->invoiceReceipt::create([
            'invoice_id' => $request->profomId,
            'receipt_no' => $receiptCode
        ]);
        // return $updateStatus ? redirect()->route('dashboard.index') : redirect()->route('dashboard.index');
        return response()->json($updateStats, 200);

    }

}
