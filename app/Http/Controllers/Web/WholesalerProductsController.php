<?php

namespace App\Http\Controllers\Web;

use App\User;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use App\Models\ProductCategoryTypes;
use Illuminate\Support\Facades\Auth;

class WholesalerProductsController extends Controller
{
    public $manufacturer, $productCategory;
    public function __construct(Manufacturer $manufacturer, ProductCategory $productCategory, Product $products, ProductCategoryTypes $productCategoryTypes,
    WholesalerProduct $wholesalerProducts, User $user)
    {
        $this->middleware('auth');
        $this->middleware(['role:Wholesaler']);
        $this->manufacturer = $manufacturer;
        $this->productCategory = $productCategory;
        $this->products = $products;
        $this->wholesalerProducts = $wholesalerProducts;
        $this->carbon = new Carbon();
        $this->productCategoryTypes = $productCategoryTypes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$wholesalerProducts = $this->wholesalerProducts::all();
        $wholesaler = Auth::user()->id;
        $wholesalerProducts = $this->wholesalerProducts::where('wholesaler_id', $wholesaler)->get();
        return view('admin.pages.wholesalers.products', compact('wholesalerProducts'));
    }
    public function loadExpiryProducts()
    {
        //$wholesalerProducts = $this->wholesalerProducts::all();
        $wholesaler = Auth::user()->id;
        $wholesalerProducts = $this->wholesalerProducts::where('wholesaler_id', $wholesaler)->get();
        return view('admin.pages.wholesalers.expiryproducts', compact('wholesalerProducts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->products::all();
        $manufacturers  = $this->manufacturer::all();
        $productCategoryTypes = $this->productCategoryTypes::all();
        return view('admin.pages.wholesalers.products.add', compact('manufacturers', 'products', 'productCategoryTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $date = $this->carbon::createFromDate($request->expiry_year, $request->expiry_month, 01)->toDateTimeString();
        $request['expiry_date'] = $date;
        $request['expiry_status'] = 'active';
        $wholesalerProduct = $user->wholesaler_products()->create($request->all());
        return redirect()->route('wholesaler_products.index');
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

        
        $products = $this->products::all();
        $product = $this->wholesalerProducts::find($id);
        $manufacturers  = $this->manufacturer::all();
        $productCategoryTypes = $this->productCategoryTypes::all();
        return view('admin.pages.wholesalers.products.edit', compact('manufacturers','products', 'product', 'productCategoryTypes'));
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
        
        $wholesalerProduct = $this->wholesaler_products::find($id)->update($request->all());
        //$wholesalerProduct = $user->wholesaler_products()->update($request->all());
        return redirect()->route('wholesaler_products.index');
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
}
