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
Route::get('/', function () { return view('welcome');});
Route::get('/home', 'Web\HomeController@index')->name('home');


Route::resource('users', 'Web\UserController');
Route::resource('products', 'Web\ProductController')->middleware('auth');
Route::resource('reports', 'Web\ReportController');
Route::resource('deliveries', 'Web\DeliveryController');
