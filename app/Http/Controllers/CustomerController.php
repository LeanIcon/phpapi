<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends ApiController
{
    public function __construct(Customer $customer)
    {
        parent::__construct($customer);
    }


    public function store(Request $request)
    {
        return $request;
    }
}
