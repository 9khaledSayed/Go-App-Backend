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
        return $request->user();
    });

    Route::post('/logout/user', 'Auth\ApiAuthController@logout');
    Route::post('/store-order', 'OrderController@store');
    Route::get('/orders', 'OrderController@index');
    Route::get('/in-progress-orders', 'OrderController@inProgressOrders');
    Route::get('/pending_orders', 'OrderController@pendingOrders');
    Route::get('/offers/{offer}/accept', 'OfferController@accept');
    Route::post('/profile/store-user-info', 'ProfileController@storeUserInfo');
    Route::post('/user/save-settings', 'SettingsController@saveUserSettings');

    Route::get('/user/get-conversations', 'ConversationController@index');
    Route::post('/user/conversation', 'ConversationController@store');
    Route::post('/user/send-message', 'MessageController@store');

    Route::get('user/notifications', 'NotificationsController@userNotifications');
    Route::get('user/notifications/{id}/mark_as_red', 'NotificationsController@markUserNotificationAsRead');


});

Route::group(['middleware' => 'auth:provider-api'], function(){
    Route::get('/provider', function( Request $request ){
        return $request->user();
    });

    Route::get('user/conversations', 'ConversationController@index');
    Route::post('/offers', 'OfferController@store');
    Route::post('/logout/provider', 'Auth\ApiAuthController@logout');
    Route::get('/finished-orders', 'OrderController@finishedOrders');
    Route::get('/my_in_progress_orders', 'OrderController@myInProgressOrders');
    Route::post('/profile/store-provider-info', 'ProfileController@storeProviderInfo');
    Route::post('/provider/save-settings', 'SettingsController@saveProviderSettings');

    Route::get('/provider/get-conversations', 'ConversationController@index');
    Route::post('/provider/conversation', 'ConversationController@store');
    Route::post('/provider/send-message', 'MessageController@store');


    Route::get('provider/notifications', 'NotificationsController@providerNotifications');
    Route::get('provider/notifications/{id}/mark_as_red', 'NotificationsController@markProviderNotificationAsRead');



});
