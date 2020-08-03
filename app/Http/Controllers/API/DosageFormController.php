<?php

namespace App\Http\Controllers\API;

use App\Models\DosageForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class DosageFormController extends ApiController
{
    public function __construct(DosageForm $dosageForm)
    {
        parent::__construct($dosageForm);
    }
}
