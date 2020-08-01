<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth', 'namespace' => 'API'], function () {
    Route::post('register_user', 'AuthController@createUser');

    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout');
});

Route::namespace('API')->group(function(){

    Route::group(['middleware' => 'api','prefix' => 'auth',], function () {
        Route::post('refresh','AuthController@refresh');
        Route::get('me', 'AuthController@me');
        Route::post('forgotpassword', 'AuthController@forgotPassword');
    });
});


Route::apiResource('post', 'PostController');
Route::apiResource('region', 'RegionController');
Route::apiResource('town', 'TownController');
Route::apiResource('customer','CustomerController');
Route::apiResource('category','CategoryController');

Route::get('coviddata', 'ConvidDataController@getCovidData');
