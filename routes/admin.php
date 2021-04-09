<?php

use Illuminate\Support\Facades\Route;

Route::group( ['prefix' => 'dashboard' ,  'namespace' => 'Dashboard' , 'middleware' => ['web' ,'auth:admin']], function (){

    Route::name('dashboard.')->group( function (){

        Route::get('/' ,'DashboardController@index')->name('index');

        Route::resource('admins','AdminController');
        Route::resource('users','UserController');
        Route::resource('providers','ProviderController');

        Route::post('/logout' ,'AdminController@logout')->name('logout');



    });

});

