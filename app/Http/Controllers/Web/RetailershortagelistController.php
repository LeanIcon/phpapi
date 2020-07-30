<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\ShortageList;
use Illuminate\Http\Request;
use App\Models\WholesalerProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Cart;
class RetailershortagelistController extends Controller
{
    public $product, $wholesalerProduct , $shortageList;
    public function __construct(Product $product, WholesalerProduct $wholesalerProduct, ShortageList $shortageList, User $user)
    {
        $this->product = $product;
        $this->wholesalerProduct = $wholesalerProduct;
        $this->shortageList = $shortageList;
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retailer = Auth::user();
        $shortageList = $retailer->shortage;
        if(is_null($shortageList)) {
            $data = [];
        }else{
            $data = json_decode($shortageList->content, true);
        }
        $shortageListItems =  collect($data)->values();
        $pageTitle = 'Shortage List Items';
        $products = $this->wholesalerProduct::all();
        
       // return $shortageListItems;
      // return $this->updateshortagelist();
        return view('admin.pages.retailers.shortage.view', compact('products','pageTitle', 'shortageListItems'));

    }

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
        $shortlist = array();


        foreach(Cart::getContent() as $item)
        {
            $shortlist[$item->id]['id'] = $item->id;
            $shortlist[$item->id]['name'] = $item->name;
            $shortlist[$item->id]['description'] = $item->associatedModel->productDesc();
            $shortlist[$item->id]['wholesaler_id'] = $item->associatedModel->wholesaler_id;
            $shortlist[$item->id]['packet_size'] = $item->associatedModel->packet_size;
            $shortlist[$item->id]['manufacturer'] = $item->associatedModel->manufacturer;
            $shortlist[$item->id]['active_ingredients']=$item->associatedModel->active_ingredients;
            $shortlist[$item->id]['drug_legal_status']=$item->associatedModel->drug_legal_status;
        }
        $data = collect($shortlist)->values();

        $pageTitle  = ' Shortage List';
        $saveShortage = $this->shortageList::create([
                    'user_id' => Auth::user()->id,
                    'instance' => 'shortagelist',
                    'content' => $data
                ]);

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
