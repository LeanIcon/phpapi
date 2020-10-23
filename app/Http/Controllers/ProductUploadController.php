<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WholesalerProductImport;

class ProductUploadController extends Controller
{
    public $wholesalerProducts, $product;

    public function __construct(WholesalerProduct $wholesalerProducts, Product $product)
    {
        $this->wholesalerProducts = $wholesalerProducts;
        $this->product = $product;
    }
    //

    public function productImportview()
    {
        return view('admin.pages.wholesalers.products.product_upload');
    }


    public function productImportCollection()
    {
        $import  = new WholesalerProductImport() ;
        $collection = Excel::toCollection($import, request()->file('file'));

        return response()->json($collection);
    }

    public function productCollectionImport()
    {
        // $import  = new WholesalerProductImport();
        $prod = array();
        $product = array();
        $simProduct = array();
        $productImport = new ProductImport();
        $collection = Excel::toCollection($productImport, request()->file('file'));

        foreach ($collection[0] as $key => $value) {
            $bname = Str::substr($value['brand_name'], 0, 3);
            $gname = Str::substr($value['generic_name'], 0, 3);
            $pcode = "$bname$gname";

            $prod['brand_name'] = $value['brand_name'];
            $prod['dosage_form'] = $value['dosage_form'];
            $prod['drug_legal_status'] = $value['drug_legal_status'];
            $prod['manufacturer'] = $value['manufacturer'];
            $prod['pack_size'] = $value['pack_size'];
            $prod['strength'] = $value['strength'];
            $prod['therapeutic_class'] = $value['therapeutic_class'];
            $prod['active_ingredients'] = $value['generic_name'];
            $prod['product_code'] = "$bname$gname";


            $codeCheck = $this->product->getDrugCodeProducts($prod);
            $genCodeInc = $this->product->generateDrugCodeInc($codeCheck, $pcode);
            $prod['product_code'] = $genCodeInc;

            $productIsIn =  $this->product->checkDrugCodeExist($prod, $pcode);

            if ($productIsIn) {
               continue;
            }

            $product =  $this->product::create($prod);

        }
        // return response()->json($simProduct);

        return response()->json($product);
    }

    public function productImport()
    {


        // Retrieve existing product codes
        $productImport = new ProductImport();
        $import  = new WholesalerProductImport();
        $collection = Excel::toCollection($import, request()->file('file'));

        return response()->json($collection);


        /**
         * Instantiate a new Object Collection
         */
        $dcodeer = new Collection();
        $newProduct = new Collection();
        $collectProduct = new Collection();
        $newProductUpdated = new Collection();

        $newProductUpdated = $newProductUpdated->push($collection[0]);
        $collProds = $collectProduct->push($newProductUpdated[0]);


        foreach ($collection[0] as $key => $value) {

            $dcodeer->put('brand_name', $value['brand_name']);
            $dcodeer->put('generic_name', $value['generic_name']);


            /**
             * Send generic and brand to return products
             */
            $genCode = $this->product->getDrugCodeProducts($dcodeer);
            $genCodeInc = $this->product->generateDrugCodeInc($genCode, $dcodeer);
            // $genCode = $this->wholesalerProduct->getDrugCodeProducts($dcodeer);
            // $genCodeInc = $this->wholesalerProduct->generateDrugCodeInc($genCode, $dcodeer);

            $product =  $this->product::create([
                    'name'=> $value['brand_name'],
                    'packet_size' => $value['pack_size'],
                    'product_code' => $genCodeInc,
                    'strength' =>$value['strength'] ,
                    'status' => 1,
                    'active_ingredients' => $value['generic_name'],
                    'dosage_form' => $value['dosage_form'],
                    'drug_legal_status' => $value['drug_legal_status'],
                    'manufacturer_slug' => $value['manufacturer'],
            ]);
        }

        // return redirect()->route('wholesaler_products.index')->withSuccessMessage('Products successfully added');
        return response()->json(['message' => 'Successfully']);
    }
}
