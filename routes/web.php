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
    Route::get('dashboard', 'DashboardController@loadDashboard')->name('dashboard.index');
    Route::resource('post', 'PostController');
    Route::resource('region', 'RegionController');
    Route::resource('town', 'TownController');
    Route::resource('equipment', 'EquipmentController');
    Route::resource('product_category', 'Product_CategoryController');
    Route::resource('drug', 'DrugController');
});

