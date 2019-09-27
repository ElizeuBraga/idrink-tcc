<?php

use Illuminate\Http\Request;

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

Route::resource('adresses', 'API\AddressController');//->middleware('auth:api');
Route::resource('deliveries', 'API\DeliveryController');//->middleware('auth:api');
Route::resource('items', 'API\ItemController');//->middleware('auth:api');
Route::resource('products', 'API\ProductController');//->middleware('auth:api');
Route::resource('reports', 'API\ReportController');//->middleware('auth:api');
Route::resource('stores', 'API\StoreController');//->middleware('auth:api');


Route::post('users/logout', 'API\UserController@logout');//->middleware('auth:api');
Route::post('users/login', 'API\UserController@login');//->middleware('auth:api');
Route::resource('users', 'API\UserController');//->middleware('auth:api');


// Route::get('/allUsers', ['uses' => 'UserController@allUsers']); // Logout


