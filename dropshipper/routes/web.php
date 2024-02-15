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

    Route::get('/barang', 'barang\BarangController@show')->name('barang.show');
    Route::post('/barangPost', 'barang\BarangController@store')->name('barang.store');
    Route::get('/barang/edit/{id}', 'barang\BarangController@edit')->name('barang.edit');
    Route::put('/barang/update/{id}', 'barang\BarangController@update')->name('barang.update');
    Route::delete('/barang/destroy/{id}', 'barang\BarangController@destroy')->name('barang.destroy');

    Route::get('/dashboard-admin', 'admin\AdminController@show')->name('admin.show');
    Route::get('/pesanan-admin', 'admin\AdminController@pesanan')->name('admin.pesanan');
    Route::get('/pesanan-selesai', 'admin\AdminController@selesai')->name('admin.selesai');

    Route::group(['middleware' => ['web']], function() {
        Route::post('/pesananPost', 'barang\PesananController@store')->name('pesanan.store');
        Route::get('/pesananStatus', 'barang\PesananController@status')->name('pesanan.status');
        Route::post('/pesananBayar', 'barang\PesananController@bayar')->name('pesanan.bayar');
        Route::post('/pesananSelesai', 'barang\PesananController@selesai')->name('pesanan.selesai');
        Route::post('/pesananProses', 'barang\PesananController@proses')->name('pesanan.proses');
    });    
});