<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/entregas', 'DeliveryController@index')->name('delivery')->middleware('auth');
// Route::get('/produtos', 'ProductController@index')->name('product')->middleware('auth');
Route::get('/relatorios', 'ReportController@index')->name('report')->middleware('auth');

Route::get('deliveries', 'DeliveryController@getDeliveries');

Route::middleware(['auth'])->group(function(){
    Route::prefix('produtos')->group(function(){
        // Route::get('/', 'ProductController@index')->name('product');
        Route::get('/', 'ProductController@allProducts')->name('allProducts');
        Route::get('/ativos', 'ProductController@active')->name('active');
        Route::get('/inativos', 'ProductController@inactive')->name('inactive');
        Route::get('/novos', 'ProductController@create')->name('newProduct');
        Route::post('/', 'ProductController@store')->name('newProduct.submit');
        Route::put('/{id}', 'ProductController@update')->name('updateProduct');
        Route::put('/ativar/{id}', 'ProductController@toActiveProduct')->name('toActiveProduct');
        Route::delete('/{id}', 'ProductController@destroy')->name('deleteProduct');
    });
});