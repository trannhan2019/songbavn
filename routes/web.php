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
// Tắt chức năng tự đăng ký user mặc định, xác thực email và reset password

// use Illuminate\Routing\Route;

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

// Auth::routes([
//     'register' => false,
//     'verify' => false,
//     'reset' => false
//   ]);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test','TestController@index');

// Nhom Admin
Route::group(['prefix' => 'admin'], function () {
    //Menu
    Route::group(['prefix' => 'menu'], function () {
        Route::get('danhsach', 'MenuController@getDanhsach');
    });
});
