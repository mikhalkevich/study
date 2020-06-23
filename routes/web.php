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
Route::group(['middleware'=>['lang']], function(){
    Route::get('lang','LangController@getIndex');
});
Route::get('/', 'ProductController@getAll');
Auth::routes();
Route::get('/parse/onliner_catalog', 'ParseController@getCatalog');
Route::get('/parse/amd', 'ParseController@getAllAmd');
Route::get('/parse/amdProduct', 'ParseController@getProductAmd');
Route::get('parse/ozCatalog','ParseController@getCatalogOz');
Route::get('parse/ozProducts', 'ParseController@getParse');
Route::group(['middleware'=>['auth']], function(){
    Route::get('parse','ParseController@getIndex');
    Route::get('/parse/onliner_product', 'ParseController@getProduct');
    Route::post('/ajax/parse/onliner_product', 'ParseController@postProduct');
    //Route::post('/ajax/parse/onliner_catalog', 'ParseController@postCatalog');

});

Route::get('catalog/{id}', 'ProductController@getCatalog');
Route::get('product/{id}', 'ProductController@getOne');

Route::get('/home', 'HomeController@index')->name('home')->middleware('cookie');
Route::get('basket','BasketController@getIndex');
Route::get('basket/delete/{id}','BasketController@getDelete');
Route::post('basket/order', 'OrderController@postAll');
Route::get('home/delete/{id}', 'HomeController@getDelete');
Route::get('/best','BestController@getAll');
Route::post('ajax/modal', 'Ajax\ModalController@postIndex');
Route::post('home', 'HomeController@postIndex');
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
