<?php

namespace App\Http\Controllers\Web;

use Cart;
use Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PurchaseOrders;
use App\Models\WholesalerProduct;
use App\Models\PurchaseOrderItems;
use App\Models\Shortage_listx;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Location;
use App\Models\Region;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RetailerCartController extends Controller
{
    public $product, $wholesalerProduct, $purchaseOrders, $purchaseOrderItems, $shortage_listx;
    public function __construct(Product $product, WholesalerProduct $wholesalerProduct, PurchaseOrders $purchaseOrders, PurchaseOrderItems $purchaseOrderItems, Shortage_listx $shortage_listx, User $user,Location $locations,UserDetails $userDetails )
    {
        $this->product = $product;
        $this->wholesalerProduct = $wholesalerProduct;
        $this->purchaseOrders = $purchaseOrders;
        $this->purchaseOrderItems = $purchaseOrderItems;
        $this->shortage_listx = $shortage_listx;
        $this->user = $user;
        $this->locations  = $locations;
        $this->userDetails = $userDetails;
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
        $userId = Auth::user()->id;
        $wholesaler = session()->put('wholesaler', $wholesaler);

        $options = array();
        $product = $this->wholesalerProduct::find($request->id);
        //return $product;
       // Alert::success('Success',$product->product_name.' added to Purchase Order sucessfully');

         Cart::add(array('id' => $product->id, 'name' => $product->product_name, 'price' => $request->price ?? 0, 'quantity' => $request->quantity, $options, 'associatedModel' => $product));
        
        return back();
        // return redirect()->route('cart.index');
    }

    public function createpofromshortage(Request $request, $whole)
    {
        //$userId = Auth::user()->id;
        $wholesaler = $this->user::find($whole);
        $whole = $wholesaler->id;
        // $request->session()->put('po_wholesaler_id', $whole);

      //  return $wholesaler;
        //$wholesalerone = $this->user::find($wholesaler);
        $options = array();
        $shortage_listx = $this->shortage_listx::find($request->id);
        
        $details = $wholesaler->details;

        $regions = $this->locations::find($details->town_id)->region;
        $locations = $this->locations::find($details->town_id);
        $products = $wholesaler->products;

        $regions =Region::all();
       $selectedRegion=Region::where('id','=',$details->town_id)->get();
        $locations=Location::where('region_id','=',$details->town_id)->get();
       //return $wholesaler;
        Alert::success('Success',$shortage_listx->product_name.' has been added to '.$wholesaler->name."'s Purchase Order");

         Cart::add(array('id' => $shortage_listx->products_id, 'name' => $shortage_listx->product_name, 'price' => $request->price ?? 0, 'quantity' => $request->quantity, $options, 'associatedModel' => $shortage_listx));

        

        //return back();
         return view('admin.pages.retailers.wholesaler_details', compact('wholesaler','products', 'details','locations','selectedRegion','regions'));
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
        $product = $this->wholesalerProduct::find($request->id);
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
            'quantity' => 'required|numeric|between:1,500'
        ]);

         if ($validator->fails()) {
             return $validator->errors();
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
         }

        Cart::update($id, array(
            'quantity'=> array( 
                'relative' => false,
                'value' => $request->quantity,
            )
        ));
        session()->flash('success_message', 'Quantity was updated successfully!');

        return back();

        return view('admin.pages.retailers.purchase_order', compact('pageTitle'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back();
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
                'products_id' => $row->associatedModel->id,
                'description' => $row->associatedModel->productDescription(),
                'quantity' => $row->quantity,
                'price' => $row->price,
                'manufacturer' => $row->associatedModel->manufacturer,
                ]
            );
        }
        Cart::clear();
        return redirect()->route('retailer.dashboard');

    }
}
