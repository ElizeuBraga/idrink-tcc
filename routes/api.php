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

//Adresses
Route::resource('adresses', 'API\AddressController');

//deliveries
Route::get('deliveries/canceled-delivered', 'API\DeliveryController@deliveriesCanceledDelivered');
Route::get('deliveries/open', 'API\DeliveryController@deliveriesOpen');
Route::get('deliveries/open/items/{delivery_id}', 'API\DeliveryController@deliverieItems');
Route::resource('deliveries', 'API\DeliveryController');

//Items
Route::get('items/{delivery_id}', 'API\ItemController@items');
Route::resource('items', 'API\ItemController');

//Reports
Route::resource('reports', 'API\ReportController');

//Stores
Route::get('stores/products/{store_id}', 'API\StoreController@products');
Route::resource('stores', 'API\StoreController');

//Users
Route::put('users/pwdReset', 'API\UserController@pwdReset');
Route::post('users/logout', 'API\UserController@logout');
Route::post('users/login', 'API\UserController@login');
Route::resource('users', 'API\UserController');
