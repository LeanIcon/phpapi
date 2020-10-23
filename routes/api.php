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
Route::apiResource('post_category', 'PostCategoryController');

Route::group(['namespace' => 'API'], function() {
    Route::apiResource('users', 'UserController');
    Route::post('update_status', 'UserController@updateUserStatus');
    Route::get('roles', 'RolesController@getSysteRoles');
    Route::get('permissions', 'PermissionsController@getSystemPerms');
    Route::apiResource('manufacturers', 'ManufacturerController');
    Route::apiResource('category','CategoryController');
    Route::apiResource('product_category','ProductCategoryController');
    Route::apiResource('category_types','CategoryTypesController');
    Route::get('adminstats','AdminDashboardController@loadStats');

    Route::apiResource('wholesaler_products','WholesalerProductsController');
    Route::get('wholesaler_products/search','WholesalerProductsController@search');
    Route::post('wholesaler_save_single','WholesalerProductsController@saveSingleProduct');

    Route::post('save_bulk','WholesalerProductsController@bulkSave');
    Route::apiResource('purchase_orders','RetailerPurchaseOrderController');

    Route::post('retail_purchase_orders_save','RetailerPurchaseOrderController@savePurchaseOrders');
    Route::get('retailer_purchase_order','RetailerPurchaseOrderController@purchaseOrderCount');
    Route::get('retailer_dashboard_stats','RetailerDashboardStatsController@loadDashboardStats');
    Route::get('retailer_wholesaler_products','RetailerWholesalerProductController@loadWholesalerProducts');
    Route::get('retail_wholesalers_products','RetailerWholesalerProductController@loadRetailWholesalerProducts');

    Route::post('purchase_orders_save','WholesalerPurchaseOrderController@savePurchaseOrders');
    Route::get('wholesaler_purchase_order','WholesalerPurchaseOrderController@purchaseOrderCount');
    Route::get('wholesaler_dashboard_stats','WholesalerDashboardStatsController@loadDashboardStats');
    Route::post('process_purchase_order_w','WholesalerPurchaseOrderController@proccessPurchaseOrder');
    Route::get('wholesaler_purchase_order_view/{id?}','WholesalerPurchaseOrderController@loadPurchaseOrderItems');

    Route::get('load_invoice_items/{id?}','WholesalerPurchaseOrderController@loadInvoiceItems');
    // Route::get('load_invoice_items/{id?}','RetailerPurchaseOrderController@loadInvoiceItems');
    Route::get('get_invoice_items/{id?}','InvoiceItemController@loadInvoiceItems');


    Route::get('view_purchase_order_items/{id?}','RetailerPurchaseOrderController@loadPurchaseOrderItems');
    Route::post('save_shortage_list','ShortagListController@createShortageList');
    Route::get('load_shortage_list','ShortagListController@loadShortageList');

    Route::apiResource('dosage_form','DosageFormController');
    Route::apiResource('drug_class','DrugClassController');


    Route::post('app_settings','AppSettingsController@saveAppSettings');
    Route::get('app_settings','AppSettingsController@getAppSettings');




    Route::apiResource('location', 'LocationController');
    Route::get('get_locations', 'LocationController@loadLocations');

    Route::group(['prefix' => 'admin'], function() {
        Route::apiResource('user', 'WholesalerRetailerUserController');
        Route::apiResource('wholesalers','WholesalerController');
        Route::apiResource('retailers','RetailerController');
    });

});


Route::get('/wholesaler/product/upload', 'ProductUploadController@productImportview')->name('product.import');
Route::post('/wholesaler/product/collection', 'ProductUploadController@productImport')->name('product.collection');
Route::post('/product/upload', 'ProductUploadController@productCollectionImport');
Route::post('/wholesaler/product/upload', 'ProductUploadController@productImportCollection')->name('product.collections');

Route::apiResource('admin_products', 'ProductController');
Route::get('admin_products/search', 'ProductController@search');
Route::get('product/search', 'ProductController@search');
Route::apiResource('region', 'RegionController');
Route::apiResource('town', 'TownController');
Route::apiResource('customer','CustomerController');
// Route::get('app_settings','AppSettingsController@saveAppSettings');

// Route::put('app_settings','AppSettingsController');

Route::get('coviddata', 'ConvidDataController@getCovidData');

// Route::post('/wholesaler/product/upload', 'ProductUploadController@productImportCollection')->name('product.collections');
