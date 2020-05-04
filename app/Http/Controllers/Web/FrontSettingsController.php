<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontSettingsController extends Controller
{
    //

    public function getBannerPage() 
    {
        return view('admin.pages.settings.banner');
    }
}
