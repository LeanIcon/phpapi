<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConvidDataController extends Controller
{
    public function __construct()
    {

    }

    public function getCovidData()
    {
        $response = Http::withHeaders([
        ])->get('https://api.covid19api.com/summary', [
        ]);

        return json_decode($response, true);
    }
}
