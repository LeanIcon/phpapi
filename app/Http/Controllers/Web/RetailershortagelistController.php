<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\ShortageList;
use Illuminate\Http\Request;
use App\Models\WholesalerProduct;
use App\Models\Shortagelistme;
use App\Models\Shortagelistitems;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Cart;
class RetailershortagelistController extends Controller
{
    public $product, $wholesalerProduct , $shortageList, $shortagelistme, $shortagelistitems;
    public function __construct(Product $product, WholesalerProduct $wholesalerProduct, ShortageList $shortageList, Shortagelist $shortagelistme, Shortagelistitems $shortagelistitems, User $user)
    {
        $this->product = $product;
        $this->wholesalerProduct = $wholesalerProduct;
        $this->shortageList = $shortageList;
        $this->shortagelistme = $shortagelistme;
        $this->shortagelistitems = $shortagelistitems;
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $retailer = Auth::user();
    //     $shortageList = $retailer->shortage::all();
    //     if(is_null($shortageList)) {
    //         $data = [];
    //     }else{
    //         $data = json_decode($shortageList->content, true);
    //     }
    //     $shortageListItems =  collect($data);
    //     $pageTitle = 'Shortage List Items';
    //     $products = $this->wholesalerProduct::all();
    //     return $shortageList;
    //   // return $this->updateshortagelist();
    //     return view('admin.pages.retailers.shortage.view', compact('products','pageTitle', 'shortageListItems'));

    // }

    /**
     * Return new view to create shortage list
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Retailer_Shortagelist';
        $products = $this->wholesalerProduct::all();
        $wholesalers = $this->user::isWholeSaler()->get();
        //return $wholesalers;
        return view('admin.pages.retailers.retailer_shortagelist', compact('pageTitle', 'products','wholesalers'));

    }

    public function viewShortageList()
    {
        $pageTitle  = ' Shortage List';
        return view('admin.pages.retailers.shortage.shortage_list', compact('pageTitle'));
    }


    /**
     * Rebuild Shortagelist Items with only Specific Content
     *
     * @param Request $request
     * @return void
     */
    public function saveShortageList(Request $request)
    {
        $wholesalers = $this->user::isWholeSaler()->get('id');
        $retailer = Auth::user()->id;
        $items = Cart::getContent();

        $shortagelistme = $this->shortage::create([
            'wholesaler_id' => $wholesalers,
            'retailer_id' => $retailer,
            'order_type' => 'shortagelist',
            'wholesaler_visible' => 'true'
        ]);

        foreach ($items as $row) {
            $this->shortagelistitems ::create(
                [
                'shortagelist_id' => $shortagelistme->id,
                'product_name' => $row->name,
                'description' => $row->associatedModel->productDescription(),
                'manufacturer' => $row->associatedModel->manufacturer,
                ]
            );
        }

        dd($shortagelistme);
        Cart::clear();
        return view('admin.pages.retailers.shortage.shortage_list', compact('pageTitle'));

    }


     
    //     $updateshort = array();

    //     $retailer = Auth::user();
    //     $shortageList = $retailer->shortage;

        

    //     $options = array();
    //     //$product = $this->wholesalerProduct::find($request->id);

        

        
    //     foreach($shortageList as $shortge){
    //         Cart::add(array());
            
    //     }

        

    //    // Cart::add(array('id' => $product->id, 'name' => $product->product_name, 'price' => $request->price ?? 0, 'quantity' => $request->quantity, $options, 'associatedModel' => $product));
        
    //     return $options;
    // }
}
