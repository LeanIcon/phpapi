<?php

namespace App\Http\Controllers\API;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class ManufacturerController extends ApiController
{
    public function __construct(Manufacturer $manufacturer)
    {
        parent::__construct($manufacturer);
    }
}
