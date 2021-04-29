<?php
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

Route::get('test' , function (){


    broadcast(new \App\Events\NewOrderEvent('asadghsda'))->toOthers();


    dd('d');
});
