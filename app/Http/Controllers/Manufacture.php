<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manufacture extends ApiController
{
    
    public function __construct(Manufacture $manufacture){

    	parent::__construct($manufacture);
    }
}
