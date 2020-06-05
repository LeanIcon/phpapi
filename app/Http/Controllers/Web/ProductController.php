<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Models\DosageForm;
use App\Models\DrugClass;
use App\Models\ProductCategoryTypes;

class ProductController extends Controller
{
    public $product, $manufacturer, $productCateogory, $drugClass, $dosageForm, $productCategoryTypes;
    public function __construct(Product $product, Manufacturer $manufacturer, ProductCategory $productCateogory, 
    DrugClass $drugClass, DosageForm $dosageForm, ProductCategoryTypes $productCategoryTypes)
    {
        $this->middleware('auth');
        $this->middleware(['role:Admin']);
        $this->product = $product;
        $this->manufacturer = $manufacturer;
        $this->productCateogory = $productCateogory;
        $this->dosageForm = $dosageForm;
        $this->drugClass = $drugClass;
        $this->productCategoryTypes = $productCategoryTypes;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product::all();
        
        return view('admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = $this->manufacturer::all();
        $productCategory  = $this->productCateogory::all();
        $dosageForm = $this->dosageForm::all();
        $drugClass = $this->drugClass::all();
        $productCategoryTypes = $this->productCategoryTypes::all();

        return view('admin.pages.product.add', compact('manufacturers','productCategory','dosageForm', 'drugClass', 'productCategoryTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $product =  $this->product::create($request->all());
        return redirect()->route('product.index');
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
}
