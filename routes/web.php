<?php

use App\Events\NewOrderEvent;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/' ,'login/admin');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.show-login');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin.login');

Route::get('/login/provider', 'Auth\LoginController@showProviderLoginForm')->name('provider.show_login');
Route::post('/login/provider', 'Auth\LoginController@providerLogin')->name('provider.login');

Route::get('test' , function ()
{

//        sendFirebaseNotification("User","this the body");
//      \App\Order::create([
//         'category_id' => 1,
//         'user_id' => 1,
//         'notes' => 'a',
//         'details' => 'a',
//         'status' => 'in_progress',
//
//      ]);
//    Artisan::call('passport:install');
//    Artisan::call('migrate');
    dd("done");
});

Route::get('/path', function (){
    setting(['color' => 'red']);
    setting()->save();
});
Route::get('/alterTables', function (){
    Artisan::call('migrate');
    dd('done');
});
