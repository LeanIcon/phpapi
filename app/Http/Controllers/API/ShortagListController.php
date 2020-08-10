<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Models\ShortageList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShortagListController extends ApiController
{
    public function __construct(ShortageList $shortageList)
    {
        $this->middleware('auth:api');
        parent::__construct($shortageList);
    }


    public function createShortageList(Request $request)
    {
        return $request;
    }
}
