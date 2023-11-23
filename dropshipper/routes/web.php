<?php

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
Route::group(['namespace' => 'App\Http\Controllers'], function()
{ 

    Route::get('/', 'Controller@index')->name('home.index');

        /**
         * Register Routes
         */
        Route::get('/register', 'user\RegisterController@show')->name('register.show');
        Route::post('/registerPost', 'user\RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'user\LoginController@show')->name('login.show');
        Route::post('/loginPost', 'user\LoginController@login')->name('login.perform');

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'user\LogoutController@perform')->name('logout.perform');
    });
});