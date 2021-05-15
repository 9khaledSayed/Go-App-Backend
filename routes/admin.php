<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('dashboard/categories/image/remove' ,'Dashboard/CategoryController@deleteImage');
Route::post('dashboard/categories/images' , 'Dashboard/CategoryController@storeImages');

Route::group( ['prefix' => 'dashboard' ,  'namespace' => 'Dashboard' , 'middleware' => ['web' ,'auth:admin']], function (){

    Route::name('dashboard.')->group( function (){

        Route::get('/' ,'DashboardController@index')->name('index');
        Route::get('/offers' ,'OfferController@index')->name('offers.index');
        Route::get('/offers/{offer}' ,'OfferController@show')->name('offers.show');
        Route::get('/categories/children' ,'CategoryController@childrenCategories');
        Route::put('notifications/mark-read' ,'NotifictionController@markAsRead');


        Route::resource('admins','AdminController');
        Route::resource('users','UserController');
        Route::resource('providers','ProviderController');
        Route::resource('services','ServiceController');
        Route::resource('orders','OrderController')->except(['create','store','edit', 'update', 'delete']);
        Route::resource('attributes','AttributeController');
        Route::resource('categories','CategoryController');
        Route::resource('payment-methods','PaymentMethodController');

        Route::get('/' ,'DashboardController@index')->name('index');

        Route::post('categories/attributes' , 'CategoryController@storeAttributes');

        Route::post('/logout' ,'AdminController@logout')->name('logout');
    });

});

Route::middleware(['web', 'auth:provider'])
    ->prefix('provider/dashboard')
    ->name('provider_dashboard.')
    ->group(function (){

    Route::get('/' ,'Dashboard\DashboardController@index')->name('index');
    Route::resource('categories', 'ProviderDashboard\CategoryController');
    Route::post('categories/attributes' , 'ProviderDashboard\CategoryController@storeAttributes');
    Route::post('/provider/logout' ,function (){
        Auth::guard('provider')->logout();
        return redirect()->route('provider.show_login');
    })->name('logout');
});

