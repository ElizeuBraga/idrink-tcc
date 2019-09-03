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

Auth::routes();
// Route::get('/', function () { return view('welcome');});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ajuda', function () { return view('help'); })->name('help');

Route::middleware(['auth'])->group(function(){

    // Routes for PRODUCTS ----------------------------------------------------------------------
    Route::prefix('produtos')->group(function(){
        Route::get('/', 'ProductController@allProducts')->name('allProducts');
        Route::get('/ativos', 'ProductController@active')->name('active');
        Route::get('/inativos', 'ProductController@inactive')->name('inactive');
        Route::get('/novos', 'ProductController@create')->name('newProduct');
        Route::post('/', 'ProductController@store')->name('newProduct.submit');
        Route::put('/{id}', 'ProductController@update')->name('updateProduct');
        Route::put('/ativar/{id}', 'ProductController@toActiveProduct')->name('toActiveProduct');
        Route::delete('/{id}', 'ProductController@destroy')->name('deleteProduct');
    });

    // Routes for DELIVERIES ----------------------------------------------------------------------
    Route::prefix('entregas')->group(function(){
        Route::get('/', 'DeliveryController@index')->name('delivery');
        Route::post('/editar/{delivery_id}', 'DeliveryController@store')->name('cancel');
    });

    // Routes for REPORTS ----------------------------------------------------------------------
    Route::prefix('relatorios')->group(function(){
        Route::get('/', 'ReportController@index')->name('report');
    });
});