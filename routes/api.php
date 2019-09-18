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
    Route::post('/new', 'UserController@store');
    Route::post('/login', ['uses' => 'UserController@login']);

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('index', ['uses' => 'UserController@index']);
        Route::get('logout', ['uses' => 'UserController@logout']);
        Route::get('{user}', ['uses' => 'UserController@edit']);
        Route::patch('{user}/update', ['uses' => 'UserController@update']);

        Route::get('/all/stores', ['uses' => 'UserController@allStores']);
        Route::get('getstore/{name}', ['uses' => 'UserController@getStoreName']);
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
