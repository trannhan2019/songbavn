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
    Route::get('dashboard','PagesController@getDashboard')->name('admin.dashboard');
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
        Route:: post('{tintuc_id}/delete-tin-tuc.html','ContentController@postAdminDeleteTintuc');
        //Quan hệ cổ đông
        Route:: get('{menu_id}/quan-he-co-dong.html','ContentController@getAdminCodong');
        Route:: get('{menu_id}/add-quan-he-co-dong.html','ContentController@getAdminAddCodong');
        Route:: post('{menu_id}/add-quan-he-co-dong.html','ContentController@postAdminAddCodong');
        Route:: get('{content_id}/detail-quan-he-co-dong.html','ContentController@getAdminDetailCodong');
        Route:: get('{content_id}/edit-quan-he-co-dong.html','ContentController@getAdminEditCodong');
        Route:: post('{content_id}/edit-quan-he-co-dong.html','ContentController@postAdminEditCodong');
        Route:: post('{content_id}/delete-quan-he-co-dong.html','ContentController@postAdminDeleteCodong');
        //Tuyển dụng
        Route:: get('{menu_id}/tuyen-dung.html','ContentController@getAdminTuyendung');
        Route:: get('{menu_id}/add-tuyen-dung.html','ContentController@getAdminAddTuyendung');
        Route:: post('{menu_id}/add-tuyen-dung.html','ContentController@postAdminAddTuyendung');
        Route:: get('{content_id}/detail-tuyen-dung.html','ContentController@getAdminDetailTuyendung');
        Route:: get('{content_id}/edit-tuyen-dung.html','ContentController@getAdminEditTuyendung');
        Route:: post('{content_id}/edit-tuyen-dung.html','ContentController@postAdminEditTuyendung');
        Route:: post('{content_id}/delete-tuyen-dung.html','ContentController@postAdminDeleteTuyendung');
        //Liên hệ
        Route:: get('{menu_id}/lien-he.html','ContentController@getAdminLienhe');

        //Đã xóa
        Route::get('trash','ContentController@getTrash');
        Route::get('restore/{id}','ContentController@getRestore');
        Route::post('forcedelete/{id}','ContentController@postForcedelete');
    });
    //Slide
    Route::group(['prefix' => 'slide'], function () {
        Route:: get('list','SlideController@getAdminList')->name('admin.slide.list');
        Route:: get('add','SlideController@getAdminAdd')->name('admin.slide.add');
        Route:: post('add','SlideController@postAdminAdd')->name('admin.slide.add');
        Route:: get('edit/{id}','SlideController@getAdminEdit')->name('admin.slide.edit');
        Route:: post('edit/{id}','SlideController@postAdminEdit')->name('admin.slide.edit');
        Route:: post('delete/{id}','SlideController@postAdminDelete')->name('admin.slide.delete');
        //Đã xóa
        Route::get('trash','SlideController@getTrash')->name('admin.slide.trash');
        Route::get('restore/{id}','SlideController@getRestore')->name('admin.slide.restore');
        Route::post('forcedelete/{id}','SlideController@postForcedelete')->name('admin.slide.forcedelete');
    });
    //Nhà máy
    Route::group(['prefix' => 'factory'], function () {
        Route:: get('list','FactoryController@getAdminList')->name('admin.factory.list');
        Route:: post('add','FactoryController@postAdminAdd')->name('admin.factory.add');
        Route:: get('edit/{id}','FactoryController@getAdminEdit')->name('admin.factory.edit');
        Route:: post('edit/{id}','FactoryController@postAdminEdit')->name('admin.factory.edit');
        Route:: post('delete/{id}','FactoryController@postAdminDelete')->name('admin.factory.delete');
    });
    //Mục tiêu SX năm
    Route::group(['prefix' => 'muctieu'], function () {
        Route:: get('list','MuctieunamController@getAdminList')->name('admin.muctieu.list');
        Route:: get('add','MuctieunamController@getAdminAdd')->name('admin.muctieu.add');
        Route:: post('add','MuctieunamController@postAdminAdd')->name('admin.muctieu.add');
        Route:: get('edit/{id}','MuctieunamController@getAdminEdit')->name('admin.muctieu.edit');
        Route:: post('edit/{id}','MuctieunamController@postAdminEdit')->name('admin.muctieu.edit');
        Route:: post('delete/{id}','MuctieunamController@postAdminDelete')->name('admin.muctieu.delete');
    });
    //Tình hình sản xuất
    Route::group(['prefix' => 'thsx'], function () {

    });

});
