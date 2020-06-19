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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

  //  public function invoicedetail()
   // {
   //     $pageTitle = 'Invoice details';
   //     return view('admin.pages.retailers.invoicedetails');
   // }
}
