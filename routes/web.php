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
Route::get('/produtos', 'ProductController@index')->name('product')->middleware('auth');
Route::get('/relatorios', 'ReportController@index')->name('report')->middleware('auth');
