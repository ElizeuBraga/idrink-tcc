<?php
use App\Events\SendMessage;
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

Route::get('teste','Web\ReportController@grafics');
Route::get('reports/dates', 'Web\ReportController@report')->name('reports.dates');
Route::resource('reports', 'Web\ReportController');

Route::resource('deliveries', 'Web\DeliveryController');

Route::post('adresses/getcep', 'Web\AddressController@getCep')->name('adresses.getcep');
Route::resource('adresses', 'Web\AddressController');



Route::get('/teste', function(){
    return view('teste');
});

Route::post('/teste', function(){
    $message  = request()->all();
    event(new SendMessage($message));
    return $message;
});
Route::get('send', 'Web\MessageController@messageGet');
// Route::get('messages', 'Web\MessageController@messageGet')->middleware('auth');
Route::post('message', 'Web\MessageController@messageSend')->middleware('auth');

