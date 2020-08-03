<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\ShortageList;
use Illuminate\Http\Request;
use App\Models\WholesalerProduct;
use App\Models\Shortage_listx;
use App\Models\Shortage_list_items;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Cart;
use Illuminate\Support\Collection;

class RetailershortagelistController extends Controller
{
    public $product, $wholesalerProduct , $shortageList, $Shortage_listx, $Shortage_list_items;
    public function __construct(Product $product, Shortage_listx $shortage_listx, Shortage_list_items $shortage_list_items, WholesalerProduct $wholesalerProduct, ShortageList $shortageList, User $user)
    {
        $this->product = $product;
        $this->wholesalerProduct = $wholesalerProduct;
        $this->shortageList = $shortageList;
        $this->middleware('auth');
        $this->middleware(['role:Retailer']);
        $this->user = $user;
        $this->shortage_listx = $shortage_listx;
        $this->shortage_list_items = $shortage_list_items;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $retailer = Auth::user();
        $shortagelist = $retailer->shortagelistx;
        $products = $this->wholesalerProduct::all();
        // // foreach($dh as $d){
        //     return $d['name'];
        // }
        // dd($dh);
        
        // return view('admin.pages.retailers.shortage.view', compact('products','pageTitle', 'shortageListItems','dh'));
        return view('admin.pages.retailers.shortage.view', compact('products','shortagelist'));

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

        $retailer = Auth::user();
        $shortageList = $retailer->shortage;
        if(is_null($shortageList)) {
            $data = [];
        }else{
            
           // $data = json_decode($shortageList->content, true);
            $data = json_decode($shortageList, true);
           // $data = json_decode($shortageList->content, true);
        }
        $shortageListItems =  collect($data)->values();
        
       // return $shortageListItems;

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

           // return $data;

        Cart::clear();
        return view('admin.pages.retailers.shortage.shortage_list', compact('pageTitle'));

    }




    public function saveShortage(Request $request, $wholesaler = null)
    {
        $wholesaler = session()->get('wholesaler');
        $retailer = Auth::user()->id;
        $items = Cart::getContent();

        foreach ($items as $row) {
        $shortage_listx = $this->shortage_listx::create([
            'wholesaler_id' => $row->associatedModel->wholesaler_id,
            'retailer_id' => $retailer,
            'product_name' => $row->name,
            'products_id' => $row->associatedModel->id,
            'description' => $row->associatedModel->productDescription(),
            'manufacturer' => $row->associatedModel->manufacturer,
            'dosage_form' => $row->associatedModel->dosage_form,
            'active_ingredients' => $row->associatedModel->active_ingredient,
            'strength' => $row->associatedModel->strength,
            'packet_size' => $row->associatedModel->packet_size ?? 'NULL'
        ]);
        }
      // $idX= $shortage_listx->id;

        foreach ($items as $row) {
            $this->shortage_list_items::create(
                [
               
                'shortage_listx_id' => $shortage_listx->id,
                'product_name' => $row->name,
                'products_id' => $row->associatedModel->id,
                'description' => $row->associatedModel->productDescription(),
                'manufacturer' => $row->associatedModel->manufacturer,
                ]
            );
        }

      //  return $shortage_listx;
        Cart::clear();
        return redirect()->route('retailer.dashboard');

    }




    public function retrieveshortagelist(Request $request, $wholesaler = null){

        $retailer = Auth::user();

        $shortagelist = $retailer->shortage;
        

        $myshortage = [];

        if(!$request->session()->has('sshortage')) {
            $request->session()->put('sshortage', []);
        }

        foreach($shortagelist as $shortage){
           $data[] = json_decode($shortage['content'], true);
            
        }

        
        $sessionshortage  = $request->session()->put('sshortage', $data);
        $getdata  = $request->session()->get('sshortage');
        
        return redirect()->route('create.shortagelist');

       
    }

    public function removeshortage(Request $request, $id)
    {
        $product = $this->shortage_listx::find($id)->delete(); 
        return redirect()->route('retailer.retailer_shortagelist');
    }

     
}
