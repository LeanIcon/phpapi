<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\DrugClass;
use App\Models\DosageForm;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;
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
        $product = $this->product::all();
      //  return $dosageForm;
        return view('admin.pages.product.add', compact('manufacturers','productCategory','dosageForm', 'drugClass', 'productCategoryTypes','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->has('product_image')) {
            $img = $this->uploadImage($request);
            $request['image_url'] =  $img['image_url'];
        }
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
        $product = $this->product::find($id);
        $manufacturers = $this->manufacturer::all();
        $productCategory  = $this->productCateogory::all();
        $dosageForm = $this->dosageForm::all();
        $drugClass = $this->drugClass::all();
        $productCategoryTypes = $this->productCategoryTypes::all();
        return view('admin.pages.product.show', compact('product', 'manufacturers', 'productCategory', 'dosageForm', 'drugClass','productCategoryTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product::find($id);
        $manufacturers = $this->manufacturer::all();
        $productCategory  = $this->productCateogory::all();
        $dosageForm = $this->dosageForm::all();
        $drugClass = $this->drugClass::all();
        $productCategoryTypes = $this->productCategoryTypes::all();
        return view('admin.pages.product.edit', compact('product', 'manufacturers', 'productCategory', 'dosageForm', 'drugClass','productCategoryTypes')); 
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
        $product = $this->product::find($id)->update($request->all());
        
        
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = $this->product::find($id)->delete($request->all());
        
        
        return redirect()->route('product.index');
    }

    public function uploadImage(Request $request)
    {
            $image = $request->file('product_image');
            $name = time()."_".$request->file('product_image')->getClientOriginalName();
            $image_name = $request->file('product_image')->getRealPath();

            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);

            $uploaded = $image->move(\public_path("uploads"), $name);

            return [
                'status' => 200,
                'response' => 'Image Uploaded Successfully',
                'image_url' => $image_url,
                'image_path' => "public\uploads",
                'name' => $name
            ];
    }

    public function getDetails($prodID)
    {
         $products=Product::where('id',$prodID)->get();
        return response()->json($products); 
    }
}
