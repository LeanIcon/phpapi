<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Spatie\Searchable\Search;
use Illuminate\Http\Request;
use App\Models\WholesalerProduct;
use App\User;

class SearchController extends Controller
{
    public function __construct(User $user){
        $this->user = $user;

    }
    public function index()
    {
        return view('admin.pages.retailers.search');
    }
 
    /**
     * search records in database and display  results
     * @param  Request $request [description]
     * @return view      [description]
     */
    public function search( Request $request, User $user)
    {
 
        $this->user = $user;

        $searchterm = $request->input('query');
 
        $searchResults = (new Search())
                    ->registerModel(WholesalerProduct::class, 'product_name', 'active_ingredient')
                    //->registerModel(Users::class, 'id')
                    ->perform($searchterm);

        $wholesalers = $this->user::isWholeSaler()->get();

        $sor = $searchResults->sortBy('packet_size');

       //$sor;
 
        return view('admin.pages.retailers.search', compact('sor', 'searchterm', 'wholesalers', 'user'));
    }
}
