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

Route::get('/confirm/{id}', ['uses' => 'Auth\RegisterController@confirm', 'as' => 'confirm']);
Route::post('/confirm/{id}', ['uses' => 'Auth\RegisterController@confirmStore', 'as' => 'confirmStore']);

Route::middleware(['auth'])->group( function() {
    Route::get('/home', 'HomeController@index');

    Route::resource('funds', 'FundController');
    Route::resource('funds.users', 'FundUserController');

    Route::resource('vehicles', 'VehicleController');

    Route::resource('operations', 'OperationController');

    Route::resource('offers', 'OfferController');

    Route::resource('bids', 'BidController');
    Route::get('/bids/{id}/decline', ['uses' => 'BidController@decline', 'as' => 'bids.decline']);

    Route::resource('users', 'UserController');
});
