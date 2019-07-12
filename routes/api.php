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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'users'], function(){
    Route::post('', 'UserController@store');
    Route::post('login', ['uses' => 'UserController@login']);
    
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('index', ['uses' => 'UserController@index']);
        Route::get('logout', ['uses' => 'UserController@logout']);
    });
});


Route::get('deliveries', ['uses' => 'DeliveryController@index'])->middleware('auth:api');

Route::get('deliveries', 'DeliveryController@getDeliveries');
