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

//Nhóm nội dung
Route::group(['prefix' => 'noidung'],function (){
    //Giới thiệu
    Route::get('{menu_id}/gioi-thieu.html','PagesController@getGioithieu')->name('noidung.gioithieu');
    Route::get('{menu_id}/co-cau-to-chuc.html', 'PagesController@getGioithieuCocau');
    Route::get('{menu_id}/{content_id}/co-cau-to-chuc.html', 'PagesController@getGioithieuSubCocau');
    Route::get('{menu_id}/cac-nha-may.html', 'PagesController@getGioithieuTab');
    Route::get('{menu_id}/cac-du-an.html', 'PagesController@getGioithieuTab');
    //Tin tức
    Route::get('{menu_id}/tin-tuc.html','PagesController@getTintuc')->name('noidung.tintuc');
    Route::get('tin-tuc/{menu_id}/{content_id}/{slug}.html','PagesController@getDetailTintuc');
    //Quan hệ cổ đông
    Route::get('{menu_id}/quan-he-co-dong.html','PagesController@getQuanhecodong')->name('noidung.quanhecodong');
    Route::get('quan-he-co-dong/{menu_id}/{content_id}/{slug}.html','PagesController@getDetailQuanhecodong');
    Route::get('{menu_id}/y-kien-nha-dau-tu.html','YkiencodongController@getYkiencodong')->name('noidung.ykiencodong');
    Route::post('{menu_id}/y-kien-nha-dau-tu.html','YkiencodongController@postYkiencodong');
    Route::get('{menu_id}/{ykien_id}/y-kien-nha-dau-tu.html','YkiencodongController@getYkiencodong')->name('noidung.ykiencodong');
    //Tuyển dụng
    Route::get('{menu_id}/tuyen-dung.html','PagesController@getTuyendung')->name('noidung.tuyendung');
    Route::get('tuyen-dung/{menu_id}/{content_id}/{slug}.html','PagesController@getDetailTuyendung');
    //Liên hệ
    Route::get('{menu_id}/lien-he.html', 'PagesController@getLienhe')->name('noidung.lienhe');
    //Comment
    Route::post('binh-luan/{content_id}/{slug}.html', 'CommentController@PostAdd')->name('noidung.binhluan');
});

// Nhom Admin
Route::group(['prefix' => 'admin','middleware'=>'CheckAdmin'], function () {
    Route::get('dashboard','PagesController@getDashboard')->name('admin.dashboard');
    //Menu
    Route::group(['prefix' => 'menu'], function () {
        Route::get('list', 'MenuController@getList')->name('admin.menu.list');
        Route::post('add','MenuController@postAdd')->name('admin.menu.add');
        Route::post('edit/{id}','MenuController@postEdit')->name('admin.menu.edit');
        Route::post('delete/{id}','MenuController@postDelete')->name('admin.menu.delete');
        //Trash
        Route::get('trash','MenuController@getTrash')->name('admin.menu.trash');
        Route::get('restore/{id}','MenuController@getRestore')->name('admin.menu.restore');
        //Route::post('forcedelete/{id}','MenuController@postForcedelete')->name('admin.menu.forcedelete');
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
        Route::get('{menu_id}/gioi-thieu.html','ContentController@getAdminGioithieu');
        Route::get('{menu_id}/add-gioi-thieu.html','ContentController@getAdminAddGioithieu');
        Route::post('{menu_id}/add-gioi-thieu.html','ContentController@postAdminAddGioithieu');
        Route::get('{menu_id}/{content_id}/edit-gioi-thieu.html','ContentController@getAdminEditGioithieu');
        Route::post('{menu_id}/{content_id}/edit-gioi-thieu.html','ContentController@postAdminEditGioithieu');
        //Giới thiệu/Cơ cấu tổ chức
        Route::get('{menu_id}/co-cau-to-chuc.html', 'ContentController@getAdminSubgioithieu');
        Route::get('{menu_id}/add-co-cau-to-chuc.html', 'ContentController@getAdminAddSubgioithieu');
        Route::post('{menu_id}/add-co-cau-to-chuc.html', 'ContentController@postAdminAddSubgioithieu');
        Route::get('{menu_id}/{content_id}/detail-co-cau-to-chuc.html', 'ContentController@getAdminDetailSubgioithieu');
        Route::get('{menu_id}/{content_id}/edit-co-cau-to-chuc.html', 'ContentController@getAdminEditSubgioithieu');
        Route::post('{menu_id}/{content_id}/edit-co-cau-to-chuc.html', 'ContentController@postAdminEditSubgioithieu');
        //Giới thiệu/Các nhà máy
        Route::get('{menu_id}/cac-nha-may.html', 'ContentController@getAdminSubgioithieu');
        Route::get('{menu_id}/add-cac-nha-may.html', 'ContentController@getAdminAddSubgioithieu');
        Route::post('{menu_id}/add-cac-nha-may.html', 'ContentController@postAdminAddSubgioithieu');
        Route::get('{menu_id}/{content_id}/detail-cac-nha-may.html', 'ContentController@getAdminDetailSubgioithieu');
        Route::get('{menu_id}/{content_id}/edit-cac-nha-may.html', 'ContentController@getAdminEditSubgioithieu');
        Route::post('{menu_id}/{content_id}/edit-cac-nha-may.html', 'ContentController@postAdminEditSubgioithieu');
        //Giới thiệu/Các dự án
        Route::get('{menu_id}/cac-du-an.html', 'ContentController@getAdminSubgioithieu');
        Route::get('{menu_id}/add-cac-du-an.html', 'ContentController@getAdminAddSubgioithieu');
        Route::post('{menu_id}/add-cac-du-an.html', 'ContentController@postAdminAddSubgioithieu');
        Route::get('{menu_id}/{content_id}/detail-cac-du-an.html', 'ContentController@getAdminDetailSubgioithieu');
        Route::get('{menu_id}/{content_id}/edit-cac-du-an.html', 'ContentController@getAdminEditSubgioithieu');
        Route::post('{menu_id}/{content_id}/edit-cac-du-an.html', 'ContentController@postAdminEditSubgioithieu');
        
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
        //Ý kiến nhà đầu tư
        Route:: get('{menu_id}/y-kien-nha-dau-tu.html','YkiencodongController@getAdminYkien');
        Route:: get('{menu_id}/add-y-kien-nha-dau-tu.html','YkiencodongController@getAdminAddYkien');
        Route:: post('{menu_id}/add-y-kien-nha-dau-tu.html','YkiencodongController@postAdminAddYkien');
        Route:: get('{ykien_id}/edit-y-kien-nha-dau-tu.html','YkiencodongController@getAdminEditYkien');
        Route:: post('{ykien_id}/edit-y-kien-nha-dau-tu.html','YkiencodongController@postAdminEditYkien');
        Route:: post('{ykien_id}/delete-y-kien-nha-dau-tu.html','YkiencodongController@postAdminDeleteYkien');
        Route::get('trash-y-kien-nha-dau-tu.html','YkiencodongController@getTrash');
        Route::post('{id}/restore-y-kien-nha-dau-tu.html','YkiencodongController@postRestore');
        Route::post('{id}/forcedelete-y-kien-nha-dau-tu.html','YkiencodongController@postForcedelete');

        //Danh mục ý kiến
        Route:: get('danh-muc-y-kien.html','DanhmucykienController@getAdminDanhmucYkien');
        Route:: post('add-danh-muc-y-kien.html','DanhmucykienController@postAdminAddDanhmucYkien');
        Route:: post('{dm_id}/edit-danh-muc-y-kien.html','DanhmucykienController@postAdminEditDanhmucYkien');
        Route:: post('{dm_id}/delete-danh-muc-y-kien.html','DanhmucykienController@postAdminDeleteDanhmucYkien');
        //Danh mục ý kiến Đã xóa
        Route::get('danh-muc-y-kien-trash.html','DanhmucykienController@getTrash');
        Route::post('{id}/danh-muc-y-kien-restore.html','DanhmucykienController@postRestore');

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
        Route:: get('{menu_id}/add-lien-he.html','ContentController@getAdminAddLienhe');
        Route:: post('{menu_id}/add-lien-he.html','ContentController@postAdminAddLienhe');
        Route:: get('{menu_id}/{content_id}/edit-lien-he.html','ContentController@getAdminEditLienhe');
        Route:: post('{menu_id}/{content_id}/edit-lien-he.html','ContentController@postAdminEditLienhe');

        //Đã xóa
        Route::get('trash','ContentController@getTrash');
        Route::get('restore/{id}','ContentController@getRestore');
        Route::post('forcedelete/{id}','ContentController@postForcedelete');
    });
    //Comment
    Route::group(['prefix' => 'comment'], function () {
        Route:: get('list','CommentController@getAdminList')->name('admin.comment.list');
        Route:: get('edit/{id}','CommentController@getAdminEdit')->name('admin.comment.edit');
        Route:: post('edit/{id}','CommentController@postAdminEdit')->name('admin.comment.edit');
        Route:: post('delete/{id}','CommentController@postAdminDelete')->name('admin.comment.delete');
        //Đã xóa
        Route::get('trash','CommentController@getTrash')->name('admin.comment.trash');
        Route::post('restore/{id}','CommentController@postRestore')->name('admin.comment.restore');
        Route::post('forcedelete/{id}','CommentController@postForcedelete')->name('admin.comment.forcedelete');
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
        Route::post('restore/{id}','SlideController@postRestore')->name('admin.slide.restore');
        Route::post('forcedelete/{id}','SlideController@postForcedelete')->name('admin.slide.forcedelete');
    });
    //Nhà máy
    Route::group(['prefix' => 'factory'], function () {
        Route:: get('list','FactoryController@getAdminList')->name('admin.factory.list');
        Route:: post('add','FactoryController@postAdminAdd')->name('admin.factory.add');
        Route:: get('edit/{id}','FactoryController@getAdminEdit')->name('admin.factory.edit');
        Route:: post('edit/{id}','FactoryController@postAdminEdit')->name('admin.factory.edit');
        Route:: post('delete/{id}','FactoryController@postAdminDelete')->name('admin.factory.delete');
        //Đã xóa
        Route::get('trash','FactoryController@getTrash')->name('admin.factory.trash');
        Route::post('restore/{id}','FactoryController@postRestore')->name('admin.factory.restore');
    });
    //Mục tiêu SX năm
    Route::group(['prefix' => 'muctieu'], function () {
        Route:: get('list','MuctieunamController@getAdminList')->name('admin.muctieu.list');
        Route:: get('add','MuctieunamController@getAdminAdd')->name('admin.muctieu.add');
        Route:: post('add','MuctieunamController@postAdminAdd')->name('admin.muctieu.add');
        Route:: get('edit/{id}','MuctieunamController@getAdminEdit')->name('admin.muctieu.edit');
        Route:: post('edit/{id}','MuctieunamController@postAdminEdit')->name('admin.muctieu.edit');
        Route:: post('delete/{id}','MuctieunamController@postAdminDelete')->name('admin.muctieu.delete');
        //Đã xóa
        Route::get('trash','MuctieunamController@getTrash')->name('admin.muctieu.trash');
        Route::post('restore/{id}','MuctieunamController@postRestore')->name('admin.muctieu.restore');
        //Route::post('forcedelete/{id}','MuctieunamController@postForcedelete')->name('admin.muctieu.forcedelete');
    });
    //Tình hình sản xuất
    Route::group(['prefix' => 'sanxuat'], function () {
        Route:: get('list','SanxuatController@getAdminList')->name('admin.sanxuat.list');
        //Ajax lay du lieu datatable
        Route::get('datatable','SanxuatController@getDatatable')->name('admin.sanxuat.datatable');
        Route:: get('add','SanxuatController@getAdminAdd')->name('admin.sanxuat.add');
        Route:: post('add','SanxuatController@postAdminAdd')->name('admin.sanxuat.add');
        Route:: get('edit/{id}','SanxuatController@getAdminEdit')->name('admin.sanxuat.edit');
        Route:: post('edit/{id}','SanxuatController@postAdminEdit')->name('admin.sanxuat.edit');
        Route:: get('delete/{id}','SanxuatController@getAdminDelete')->name('admin.sanxuat.delete');
        //Đã xóa
        Route::get('trash','SanxuatController@getTrash')->name('admin.sanxuat.trash');
        Route::post('restore/{id}','SanxuatController@postRestore')->name('admin.sanxuat.restore');
        Route::post('forcedelete/{id}','SanxuatController@postForcedelete')->name('admin.sanxuat.forcedelete');
    });

});
