<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Resources\ProductCollection;

class ProductController extends ApiController
{
    private $product;
    public  function __construct(Product $product)
    {
        parent::__construct($product);
        $this->product=  $product;
    }

    // public function index(Request $request)
    // {
    //     $limit = $request->limit ?? 15;
    //     $product = new ProductCollection(Product::paginate($limit));
    //     return $product;
    // }

    public function store(Request $request)
    {
        $product = $this->product->create($request->all());
        return  response()->json($product);
    }

    public function search(Request $request)
    {
        $products = $this->product::where('name', $request->keywords)->get();
        return response()->json($products);

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
}
