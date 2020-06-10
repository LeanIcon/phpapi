<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WholesalerRetailersController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
        $this->middleware(['role:Wholesaler']);
    }
    public function index()
    {
        $user = Auth::user();
        $data = $user->wholesaler_orders->pluck('retailer_id')->unique();
        $retailers = $this->user->orderUsers($data);
        return view('admin.pages.wholesalers.retailers', compact('retailers'));
    }
}
