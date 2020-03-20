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
Route::post('/testdt','TestController@testdt');

// Nhom Admin
Route::group(['prefix' => 'admin'], function () {
    //Menu
    Route::group(['prefix' => 'menu'], function () {
        Route::get('danhsach', 'MenuController@getDanhsach')->name('admin.menu.danhsach');
        Route::post('them','MenuController@postThem')->name('admin.menu.them');
        Route::post('sua/{id}','MenuController@postSua')->name('admin.menu.sua');
        Route::post('xoa/{id}','MenuController@postXoa')->name('admin.menu.xoa');
    });

    //Users
    Route::group(['prefix' => 'user'], function () {
        Route::get('danhsach','UserController@getDanhsach')->name('admin.user.danhsach');
        //Ajax lay du lieu datatable
        Route::get('datatable','UserController@getDatatable')->name('admin.user.datatable');

        Route::get('them','UserController@getThem')->name('admin.user.them');
        Route::post('them','UserController@postThem')->name('admin.user.them');

        Route::get('detail/{id}','UserController@getChitiet')->name('admin.user.detail');

        Route::get('sua/{id}','UserController@getSua')->name('admin.user.sua');
        Route::post('sua/{id}','UserController@postSua')->name('admin.user.sua');
    });
});
