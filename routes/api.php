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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'users'], function(){
    Route::post('/new', 'UserController@store'); // New user
    Route::post('/login', ['uses' => 'UserController@login']); // Login

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('logout', ['uses' => 'UserController@logout']); // Logout
        Route::get('{user}', ['uses' => 'UserController@edit']); // get user for edit
        Route::patch('{user}/update', ['uses' => 'UserController@update']); //edit a user

        Route::get('/all/stores', ['uses' => 'UserController@allStores']); //return all store
        Route::get('getstore/{name}', ['uses' => 'UserController@getStoreName']); //return a store by name
        Route::get('products/{user_id}', ['uses' => 'UserController@storeProducts']); //return products by store_id
        Route::get('deliveries/all', ['uses' => 'UserController@usrReportDeliveries']); // return deliveries to the usr login
    });
});

Route::group(['prefix' => 'deliveries'], function(){
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('all', ['uses' => 'DeliveryController@getDeliveriesCustomer']); //Return all deliveries of a usr login
        Route::get('/store/{id}', ['uses' => 'DeliveryController@getDeliveriesCustomerStoreId']); //return deliveries of a user log in group by store_id
    });
});

//Deploy para testar autenticação depois do debug
Route::get('deliveries', ['uses' => 'DeliveryController@deliveries'])->middleware('auth:api');;
