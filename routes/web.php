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
use Illuminate\Support\Facades\Auth;

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false
  ]);

Route::get('/', 'PagesController@getTrangchu')->name('trangchu');

Route::get('dangnhap', 'UserController@getDangnhap')->name('dangnhap');
Route::post('dangnhap', 'UserController@postDangnhap')->name('dangnhap');
Route::get('dangxuat', 'UserController@getDangxuat')->name('dangxuat');

// Nhom Admin
Route::group(['prefix' => 'admin','middleware'=>'CheckAdmin'], function () {
    //Menu
    Route::group(['prefix' => 'menu'], function () {
        Route::get('list', 'MenuController@getList')->name('admin.menu.list');
        Route::post('add','MenuController@postAdd')->name('admin.menu.add');
        Route::post('edit/{id}','MenuController@postEdit')->name('admin.menu.edit');
        Route::post('delete/{id}','MenuController@postDelete')->name('admin.menu.delete');
    });

    //Users
    Route::group(['prefix' => 'user'], function () {
        Route::get('list','UserController@getList')->name('admin.user.list');
        //Ajax lay du lieu datatable
        Route::get('datatable','UserController@getDatatable')->name('admin.user.datatable');

        Route::get('add','UserController@getAdd')->name('admin.user.add');
        Route::post('add','UserController@postAdd')->name('admin.user.add');

        Route::get('detail/{id}','UserController@getDetail')->name('admin.user.detail');

        Route::get('edit/{id}','UserController@getEdit')->name('admin.user.edit');
        Route::post('edit/{id}','UserController@postEdit')->name('admin.user.edit');
        //Xoa
        Route::get('delete/{id}','UserController@getDelete')->name('admin.user.delete');
        //thùng rác
        Route::get('trash','UserController@getTrash')->name('admin.user.trash');
        //Ajax lay du lieu datatable
        //Route::get('trashlist','UserController@getTrashlist')->name('admin.user.trashlist');
        //Restore
        Route::get('restore/{id}','UserController@getRestore')->name('admin.user.restore');
        Route::post('forcedelete/{id}','UserController@postForcedelete')->name('admin.user.forcedelete');
    });
    //Content
    Route::group(['prefix' => 'content'], function () {
        //giới thiệu
        Route::get('{id}/gioi-thieu.html','ContentController@getAdminGioithieu');
        Route::get('{menu_id}/add-gioi-thieu.html','ContentController@getAdminAddGioithieu');
        Route::post('{menu_id}/add-gioi-thieu.html','ContentController@postAdminAddGioithieu');
        Route::get('{menu_id}/{content_id}/edit-gioi-thieu.html','ContentController@getAdminEditGioithieu');
        Route::post('{menu_id}/{content_id}/edit-gioi-thieu.html','ContentController@postAdminEditGioithieu');
        Route::get('{menu_id}/co-cau-to-chuc.html', 'ContentController@getAdminCocautochuc');
        Route::get('{menu_id}/co-cau-to-chuc-phongban.html', 'ContentController@getAdminCocautochuc_phongban');
        //Tin tức
        Route:: get('{menu_id}/tin-tuc.html','ContentController@getAdminTintuc');
        Route:: get('{menu_id}/add-tin-tuc.html','ContentController@getAdminAddTintuc');
        Route:: post('{menu_id}/add-tin-tuc.html','ContentController@postAdminAddTintuc');
        Route:: get('{tintuc_id}/detail-tin-tuc.html','ContentController@getAdminDetailTintuc');
        Route:: get('{tintuc_id}/edit-tin-tuc.html','ContentController@getAdminEditTintuc');
        Route:: post('{tintuc_id}/edit-tin-tuc.html','ContentController@postAdminEditTintuc');
    });
});
