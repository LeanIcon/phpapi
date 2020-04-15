<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends ApiController
{
   public function __construct(Region $region)
   {
       parent:: __construct($region);
   }

  #  public function store(Request $request)
 #  {
 #    return $request;
#   }
}
