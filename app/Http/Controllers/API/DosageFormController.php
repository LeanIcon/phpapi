<?php

namespace App\Http\Controllers\API;

use App\Models\DosageForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class DosageFormController extends ApiController
{
    public $dosageForm;
    public function __construct(DosageForm $dosageForm)
    {
        $this->middleware('auth:api');
        parent::__construct($dosageForm);
        $this->$dosageForm = $dosageForm;
    }

    public function store(Request $request)
    {
        $dosageForm = $this->dosageForm::create($request->all());
        return response()->json([
            'dosageForm'    => $dosageForm,
            'message' => 'Success'
        ], 200);
    }

}
