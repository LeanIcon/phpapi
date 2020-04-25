<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WholesalerRetailersController extends Controller
{
    public function index()
    {
        return view('admin.pages.wholesalers.retailers');
    }
}
