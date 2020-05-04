<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'admin', 'namespace' => 'Web'], function() {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard.index');
    Route::get('/dashboard/wholesalers', 'DashboardController@loadWholesaler')->name('dashboard.wholesalers');
    Route::get('/dashboard/retailers', 'DashboardController@loadRetailer')->name('dashboard.retailers');

    Route::resource('equipment', 'EquipmentController');
    Route::resource('product_category', 'ProductCategoryController');
    Route::resource('drug', 'DrugController');
    Route::resource('drug_class', 'DrugClassController')->only(['index','store']);
    Route::resource('dosage_form', 'DosageFormController')->only(['index','store']);
    Route::resource('product_category_types', 'ProductCategoryTypesController')->only(['index','store']);
    Route::resource('post', 'PostController');
    Route::resource('product', 'ProductController');
    Route::get('banner', 'FrontSettingsController@getBannerPage')->name('home.banner');
    Route::get('approved_users/{user?}', 'ApproveRegistrationController@approvedUsers')->name('approve.users');
    Route::post('approved_users/{user?}', 'ApproveRegistrationController@AcceptapprovedUsers')->name('approve.users');
    Route::resource('post_category', 'PostCategoryController');
    Route::resource('wholesaler.drugs', 'WholeSalerDrugsController');
    Route::get('register', 'RegisterFormController@loadRegisterForm')->name('register.form');
    Route::post('register_user', 'RegisterFormController@saveNewUserForm')->name('save.user');
    Route::post('register', 'RegisterController@register')->name('register.form');


    /****************Wholesalers*******************/
    Route::get('/retailer/dashboard', 'WholesalerDashboardController@loadDashboard')->name('wholesaler.dashboard');
    Route::get('/wholesaler/dashboard', 'RetailerDashboardController@loadDashboard')->name('retailer.dashboard');
    Route::get('/wholesaler/retailers', 'WholesalerRetailersController@index')->name('wholesaler.retailer');
    Route::get('/wholesaler/products', 'WholesalerDashboardController@loadProducts')->name('wholesaler.products');
    Route::resource('wholesaler_products', 'WholesalerProductsController');


    /****************Retailers*******************/
    Route::get('/retailer/wholesalers', 'RetailerWholesalersController@index')->name('retailer.wholesaler');
    Route::get('/retailer/wholesalers/{wholesaler?}', 'RetailerWholesalersController@show')->name('retailer.wholesaler.show');
    Route::get('/retailer/products', 'RetailerDashboardController@loadProducts')->name('retailer.products');
    Route::get('/retailer/purchase-order-list', 'RetailerDashboardController@loadPurchaseOrderList')->name('retailer.purchaselist');

    Route::group(['prefix' => 'retailer'], function () {
        Route::resource('cart', 'RetailerCartController');
    });



    Route::group(['prefix' => 'settings'], function() {
        Route::resource('manufacture', 'ManufacturerController');
        Route::resource('region', 'RegionController');
        Route::resource('town', 'TownController');
        Route::resource('profile', 'UserProfileController');
    });

});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
