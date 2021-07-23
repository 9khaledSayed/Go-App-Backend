<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login/user', 'Auth\ApiAuthController@userLogin');
    Route::post('/login/provider', 'Auth\ApiAuthController@providerLogin');
    Route::post('/register', 'Auth\ApiAuthController@register');
    Route::get('/services', 'ServiceController@index');
    Route::get('/categories', 'CategoryController@index');
    Route::get('/orders/{order}/offers', 'OrderController@offers');
    Route::get('/offers/{offer}', 'OfferController@show');
    Route::get('/orders/workshop', 'OrderController@workshop');
});


Route::group(['middleware' => ['auth:user-api']], function(){
    Route::get('/user', function( Request $request ){
        dd($request->user());
        return $request->user();
    });

    Route::post('/logout/user', 'Auth\ApiAuthController@logout');
    Route::post('/store-order', 'OrderController@store');
    Route::get('/orders', 'OrderController@index');
    Route::get('/in-progress-orders', 'OrderController@inProgressOrders');
    Route::get('/pending_orders', 'OrderController@pendingOrders');
    Route::get('/offers/{offer}/accept', 'OfferController@accept');
    Route::post('/profile/store-user-info', 'ProfileController@storeUserInfo');
});

Route::group(['middleware' => 'auth:provider-api'], function(){
    Route::get('/provider', function( Request $request ){
        dd($request->user());
        return $request->user();
    });
    Route::post('/offers', 'OfferController@store');
    Route::post('/logout/provider', 'Auth\ApiAuthController@logout');
    Route::get('/finished-orders', 'OrderController@finishedOrders');
    Route::get('/my_in_progress_orders', 'OrderController@myInProgressOrders');
    Route::post('/profile/store-provider-info', 'ProfileController@storeProviderInfo');

});
