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
    return view('auth.login');
})->middleware('guest');



Route::group(['prefix' => 'admin', 'namespace' => 'Web'], function() {
    Route::get('/loaddashboard', 'DashboardController@dashboard')->name('dashboard.index');
    Route::get('/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');
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
    Route::get('register', 'RegisterFormController@loadRegisterForm')->name('register.form')->middleware('guest');
    Route::post('register_user', 'RegisterFormController@saveNewUserForm')->name('save.user');
    Route::post('register', 'RegisterController@register')->name('register.form');

    Route::post('update_user/{user}', 'UserDetailsController@updateUserDetails')->name('user.update');


    /****************Wholesalers*******************/
    Route::get('/wholesaler/dashboard', 'WholesalerDashboardController@loadDashboard')->name('wholesaler.dashboard');
    Route::get('/wholesaler/retailers', 'WholesalerRetailersController@index')->name('wholesaler.retailer');
    Route::get('/wholesaler/products', 'WholesalerDashboardController@loadProducts')->name('wholesaler.products');
   // Route::get('wholesalers/purchaseorder/{order_id?}', 'WholesalerDashboardController@retailerpurchasedetails')->name('wholesaler.purchaseorder');
    Route::resource('wholesaler_products', 'WholesalerProductsController');
    Route::get('wholesaler_expiryproducts', 'WholesalerProductsController@loadExpiryProducts')->name('wholesaler_expiryproducts');
    Route::get('/wholesaler/purchaseorder', 'WholesalerPurchaseOrdersController@index')->name('wholesaler.purchaseorder');
    Route::get('/wholesaler/approvepurchaseorder', 'WholesalerPurchaseOrdersController@approve')->name('wholesaler.approvepurchaseorder');
    Route::get('/wholesaler/pendingpurchaseorder', 'WholesalerPurchaseOrdersController@pending')->name('wholesaler.pendingpurchaseorder');
    Route::get('/wholesaler/purchaseorderlist', 'WholesalerDashboardController@loadpurchasereceived')->name('wholesaler.purchaseorderlist');
    Route::get('/wholesaler/purchaseorderinvoice', 'WholesalerPurchaseOrderInvoiceController@index')->name('wholesaler.purchaseorderinvoice');
    Route::get('/wholesaler/invoicedetails/{id?}', 'WholesalerPurchaseOrderInvoiceController@invoicedetail')->name('wholesaler.orderinvoicedetails');
    Route::post('/wholesaler/purchase-order/{id?}', 'WholesalerPurchaseOrderInvoiceController@UpdatePurchaseOrderStatus')->name('update.purchase.status');
    
    
    /****************Retailers*******************/
    Route::get('/retailer/dashboard', 'RetailerDashboardController@loadDashboard')->name('retailer.dashboard');
    Route::get('/retailer/wholesalers', 'RetailerWholesalersController@index')->name('retailer.wholesaler');
    Route::get('/retailer/wholesalers/{wholesaler?}', 'RetailerWholesalersController@show')->name('retailer.wholesaler.show');
    Route::get('/retailer/products', 'RetailerDashboardController@loadProducts')->name('retailer.products');
    Route::get('/retailer/purchase-order-list', 'RetailerDashboardController@loadPurchaseOrderList')->name('retailer.purchaselist');
    Route::put('cart/update/{id}', 'RetailerCartController@update')->name('cart.update');
    Route::get('/retailer/purchase_order', 'RetailerDashboardController@displayPurchaseOrders')->name('retailer.purchase_order');
    Route::get('retailer/order_details/{order_id?}', 'RetailerDashboardController@purchaseOrderDetails')->name('retailer.order_details');
    Route::get('/retailer/dashboard/{order_id?}', 'RetailerDashboardController@WholesalerpurchaseOrderDetails')->name('wholesaler.order_details');
    Route::get('retailer/search', 'SearchController@index')->name('retailer.search.index');
    Route::get('retailer/search-results', 'SearchController@search')->name('retailer.search.result');
    Route::get('retailer/retailer_invoice', 'RetailerinvoiceController@index')->name('retailer.retailer_invoice');
    Route::get('retailer/invoicedetails/{id?}', 'RetailerinvoiceController@retailerinvoicedetail')->name('retailer.orderinvoicedetails');
    Route::get('retailer/retailer_shortagelist', 'RetailerShortagelistController@index')->name('retailer.retailer_shortagelist');
    Route::get('retailer/orders', 'RetailerOrdersController@index')->name('retailer.orders');
    Route::post('po/proforma/{porder?}', 'ProformaController@updateInvoiceToProforma')->name('proforma.update');


    Route::group(['prefix' => 'retailer'], function () {
        Route::resource('cart', 'RetailerCartController');
        Route::post('retailercart/{wholesaler?}', 'RetailerCartController@createPurchaseOrder')->name('create.purchase.order');
        Route::post('retailerpo/{wholesaler?}', 'RetailerCartController@savePurchaseOrder')->name('save.purchase.order');
        Route::get('shortagelist', 'RetailerShortagelistController@viewShortageList')->name('shortagelist.view');
        Route::get('savedshortagelist', 'RetailerShortagelistController@viewShortageList')->name('saved.shortagelist');
        Route::get('shortagelist/create', 'RetailerShortagelistController@create')->name('create.shortagelist');
        Route::post('shortagelist', 'RetailerShortagelistController@saveShortageList')->name('shortagelist.save');
    });



    Route::group(['prefix' => 'settings'], function() {
        Route::resource('manufacture', 'ManufacturerController');
        Route::resource('region', 'RegionController');
        Route::resource('town', 'TownController');
        Route::resource('profile', 'UserProfileController');
        Route::resource('location', 'LocationController');
    });

});

Route::get('verify', 'Web\VerifyPinPageController@loadpage')->name('loadpin');
Route::post('verify', 'Web\ConfirmPinController');
// Route::get('verify', 'Web\VerifyPinPageController@sendVerify');


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/location/getLocations/{regID}','Web\LocationController@getLocations')->name('location.get');