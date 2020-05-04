<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends ApiController
{
    
    public function __construct(Manufacture $manufacture){

    	parent::__construct($manufacture);
    }
}
