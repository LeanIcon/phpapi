<?php

namespace App\Http\Controllers\API;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class LocationController extends ApiController
{
    public function __construct(Location $location)
    {
        parent::__construct($location);
    }
}
