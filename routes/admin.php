<?php

use Illuminate\Support\Facades\Route;

Route::group( ['prefix' => 'dashboard' ,  'namespace' => 'Dashboard' , 'middleware' => ['web' ,'auth:admin']], function (){

    Route::name('dashboard.')->group( function (){

        Route::get('/' ,'DashboardController@index')->name('index');

        Route::resource('admins','AdminController');
        Route::resource('users','UserController');
        Route::resource('providers','ProviderController');
        Route::resource('services','ServiceController');
        Route::resource('orders','OrderController')->except(['create','store','edit', 'update', 'delete']);
        Route::resource('attributes','AttributeController');
        Route::resource('categories','CategoryController');
        Route::resource('payment-methods','PaymentMethodController');

        Route::post('/logout' ,'AdminController@logout')->name('logout');
    });

});

