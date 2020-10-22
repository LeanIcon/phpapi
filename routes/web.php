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

// Route::get('/', function () {
//     return view('auth.login');
// })->middleware('guest');



Route::get('/{vue?}', function () {
    return view('app');
})->where('vue', '[\/\w\.-]*')->name('home');



Route::get('/wholesaler/product/upload', 'ProductUploadController@productImportview')->name('product.import');
Route::post('/wholesaler/product/collection', 'ProductUploadController@productImport')->name('product.collection');
Route::post('/wholesaler/product/upload', 'ProductUploadController@productImportCollection')->name('product.collections');
