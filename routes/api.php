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


Route::group(['namespace' => 'API'], function() {
    Route::apiResource('users', 'UserController');
    Route::apiResource('manufacturers', 'ManufacturerController');
    Route::apiResource('category','CategoryController');
    Route::apiResource('product_category','ProductCategoryController');
    Route::apiResource('category_types','CategoryTypesController');

    Route::apiResource('wholesaler_products','WholesalerProductsController');
    Route::apiResource('wholesaler_products','WholesalerProductsController');

    Route::post('save_bulk','WholesalerProductsController@bulkSave');
    Route::apiResource('purchase_orders','RetailerPurchaseOrderController');
    Route::post('purchase_orders_save','RetailerPurchaseOrderController@savePurchaseOrders');
    Route::get('retailer_purchase_order','RetailerPurchaseOrderController@purchaseOrderCount');

    Route::apiResource('dosage_form','DosageFormController');
    Route::apiResource('drug_class','DrugClassController');

    Route::group(['prefix' => 'admin'], function() {
        Route::apiResource('user', 'WholesalerRetailerUserController');
        Route::apiResource('wholesalers','WholesalerController');
        Route::apiResource('retailers','RetailerController');
    });

});

Route::apiResource('admin_products', 'ProductController');
Route::apiResource('region', 'RegionController');
Route::apiResource('town', 'TownController');
Route::apiResource('customer','CustomerController');

Route::get('coviddata', 'ConvidDataController@getCovidData');
