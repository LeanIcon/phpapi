<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WholesalerProductImport;
use App\Models\DrugCode;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
class ProductUploadController extends Controller
{
    public $wholesalerProduct, $product;
    public function __construct(WholesalerProduct $wholesalerProduct, Product $product)
    {
        $this->wholesalerProduct = $wholesalerProduct;
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
    }

    public function productImport(Request $request)
    {
        $user = Auth::user();

        // Retrieve existing product codes
        $import  = new WholesalerProductImport() ;
        $collection = Excel::toCollection($import, request()->file('file'));

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
            $genCode = $this->wholesalerProduct->getDrugCodeProducts($dcodeer);
            $genCodeInc = $this->wholesalerProduct->generateDrugCodeInc($genCode, $dcodeer);

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

            $this->wholesalerProduct::create([
                    'product_name'=> $value['brand_name'],
                    'price' => $value['price'],
                    'product_code' => $genCodeInc,
                    'products_id' => $product->id,
                    'wholesaler_id' => Auth::user()->id,
                    'packet_size' => $value['pack_size'],
                    'strength' =>$value['strength'] ,
                    'status' => 1,
                    'active_ingredient' => $value['generic_name'],
                    'dosage_form' => $value['dosage_form'],
                    'drug_legal_status' => $value['drug_legal_status'],
                    'manufacturer' => $value['manufacturer'],
            ]);
        }

        return redirect()->route('wholesaler_products.index')->withSuccessMessage('Products successfully added');
    }
}
