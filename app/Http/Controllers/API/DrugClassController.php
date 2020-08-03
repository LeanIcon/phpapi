<?php

namespace App\Http\Controllers\API;

use App\Models\DrugClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class DrugClassController extends ApiController
{
    public function __construct(DrugClass $drugClass)
    {
        parent::__construct($drugClass);
    }
}
