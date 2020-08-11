<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Models\ShortageList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RetailerShortageListController extends ApiController
{
    public $shortageList;
    public function __construct(ShortageList $shortageList)
    {
        parent::__construct($shortageList);
        $this->shortageList = $shortageList;
    }



    public function loadShortageList()
    {
        $user = Auth::user();
        

    }
}
