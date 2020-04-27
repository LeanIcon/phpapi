<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WholesalerRetailersController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $retailers = $this->user::isRetailer()->get();
        return view('admin.pages.wholesalers.retailers', compact('retailers'));
    }
}
