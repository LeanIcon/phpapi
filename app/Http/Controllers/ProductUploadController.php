<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\WholesalerProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductUploadController extends Controller
{
    public function __construct()
    {

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

    public function productImport()
    {
        $import  = new WholesalerProductImport() ;
        $collection = Excel::import($import, request()->file('file'));
        return redirect()->route('dashboard.index');
    }
}
