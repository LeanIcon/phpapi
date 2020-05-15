<?php

namespace App\Http\Controllers\Web;

use Cart;
use Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Models\WholesalerProduct;
use App\Models\PurchaseOrderItems;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RetailerCartController extends Controller
{
    public $product, $wholesalerProduct, $purchaseOrders, $purchaseOrderItems;
    public function __construct(Product $product, WholesalerProduct $wholesalerProduct, PurchaseOrders $purchaseOrders, PurchaseOrderItems $purchaseOrderItems )
    {
        $this->product = $product;
        $this->wholesalerProduct = $wholesalerProduct;
        $this->purchaseOrders = $purchaseOrders;
        $this->purchaseOrderItems = $purchaseOrderItems;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function createPurchaseOrder(Request $request, $wholesaler = null)
    {
        $wholesaler = session()->put('wholesaler', $wholesaler);

        $options = array();
        $product = $this->product::find($request->products_id);
        Cart::add(array('id' => $product->id, 'name' => $product->name, 'price' => $request->price, 'quantity' => $request->quantity, $options, 'associatedModel' => $product));
        
        return back();
        // return redirect()->route('cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $wholesaler = null)
    {
        $options = array();
        $product = $this->product::find($request->products_id);
        Cart::add(array('id' => $product->id, 'name' => $product->name, 'price' => $request->price, 'quantity' => $request->quantity, $options, 'associatedModel' => $product));
        
        return back();
        // return redirect()->route('cart.index');
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
         // Validation on max quantity
         $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
         }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');

        return view('admin.pages.retailers.purchase_order', compact('pageTitle'));   }

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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savePurchaseOrder(Request $request, $wholesaler = null)
    {
        $wholesaler = session()->get('wholesaler');
        $retailer = Auth::user()->id;
        $total = Cart::getTotal();
        $items = Cart::getContent();

        $purchaseOrder = $this->purchaseOrders::create([
            'wholesaler_id' => $wholesaler,
            'retailer_id' => $retailer ,
            'status' => 'pending',
            'total' => $total,
            'order_type' => 'purchase_order',
            'wholesaler_visible' => 'true'
        ]);

        foreach ($items as $row) {
           $this->purchaseOrderItems::create(
                [
                'purchase_order_id' => $purchaseOrder->id,
                'product_name' => $row->name,
                'product_id' => $row->associatedModel->id,
                'description' => $row->associatedModel->productDescription(),
                'quantity' => $row->quantity,
                'price' => $row->price,
                'manufacturer' => $row->associatedModel->manufacturers->name,
                ]
            );
        }
        Cart::clear();
        return  back();

    }
}
