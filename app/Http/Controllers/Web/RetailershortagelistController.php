<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\ShortageList;
use Illuminate\Http\Request;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cart;
class RetailershortagelistController extends Controller
{
    public $product, $wholesalerProduct , $shortageList;
    public function __construct(Product $product, WholesalerProduct $wholesalerProduct, ShortageList $shortageList)
    {
        $this->product = $product;
        $this->wholesalerProduct = $wholesalerProduct;
        $this->shortageList = $shortageList;
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Retailer_Shortagelist';
        $products = $this->wholesalerProduct::all();
        return view('admin.pages.retailers.retailer_shortagelist', compact('pageTitle', 'products'));

    }

    public function viewShortageList()
    {
        $pageTitle  = ' Shortage List';
        return view('admin.pages.retailers.shortage.shortage_list', compact('pageTitle'));
    }

    public function saveShortageList(Request $request)
    {
        $shortlist = array();

        foreach(Cart::getContent() as $item)
        {
            $shortlist[$item->id]['id'] = $item->id;
            $shortlist[$item->id]['name'] = $item->name;
            $shortlist[$item->id]['description'] = $item->associatedModel->productDesc();
        }
        $data = collect($shortlist)->values() ;

        $pageTitle  = ' Shortage List';
        $saveShortage = $this->shortageList::create([
                    'user_id' => Auth::user()->id,
                    'instance' => 'shortagelist',
                    'content' => $data
                ]);

        Cart::clear();
        return view('admin.pages.retailers.shortage.shortage_list', compact('pageTitle'));

    }
}
