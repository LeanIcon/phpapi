<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WholesalerProductImport;
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

    public function productImport()
    {
        $import  = new WholesalerProductImport() ;
        $collection = Excel::toCollection($import, request()->file('file'));

        foreach ($collection[0] as $key => $value) {
            $product =  $this->product::create([
                    'name'=> $value['brand_name'],
                    'product_code' => $value['product_code'],
                    'packet_size' => $value['pack_size'],
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
                    'products_id' => $product->id,
                    'product_code' => $value['product_code'],
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
