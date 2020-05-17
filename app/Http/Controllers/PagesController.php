<?php

namespace App\Http\Controllers;

use App\Content;
use App\Danhmucykien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Slide;
use App\Menu;
use App\Ykiencodong;
use App\Factory;

class PagesController extends Controller
{
    public function getDashboard()
    {
        $all_user = User::all();
        //giới thiệu
        $gioithieu = Menu::where('slug','gioi-thieu')->first();
        $all_gioithieu = Menu::find($gioithieu->id)->ParentContents;
        //tin tức
        $tintuc = Menu::where('slug','tin-tuc')->first();
        $all_tintuc = Menu::find($tintuc->id)->ParentContents;
        //dd($all_tintuc);
        return view('admin.pages.dashboard',compact('all_user','gioithieu','all_gioithieu','tintuc','all_tintuc'));
    }
    public function getTrangchu()
    {
        $slide = Slide::where('Active',1)->orderBy('location')->get();
        $tin_noibat = Content::where('highlights',1)->where('status',1)->orderBy('created_at','desc')->take(10)->get();
        //dd($tin_noibat_1->Menu->Parent->id);
        $tin_thongbao = Content::where('notification',1)->where('status',1)->orderBy('created_at','desc')->take(5)->get();
        $dhdcd = Menu::where('slug','dai-hoi-dong-co-dong')->where('status',1)->first();
        $cbtt = Menu::where('slug','cong-bo-thong-tin')->where('status',1)->first();
        $bctc = Menu::where('slug','bao-cao-tai-chinh')->where('status',1)->first();
        $bctn = Menu::where('slug','bao-cao-thuong-nien')->where('status',1)->first();
        $thqt = Menu::where('slug','tinh-hinh-quan-tri')->where('status',1)->first();
        $ykien_ndt = Menu::where('slug','y-kien-nha-dau-tu')->where('status',1)->first();
        //$tin_ykien = $ykien_ndt->Ykiens->where('status',1)->sortByDesc('created_at')->take(5);
        //dd($tin_ykien);
        $thongtinhd = Menu::where('slug','thong-tin-hoat-dong')->where('status',1)->first();
        $dangdoanthe = Menu::where('slug','dang-doan-the')->where('status',1)->first();
        $baivietsba = Menu::where('slug','bai-viet-sba')->where('status',1)->first();
        //tình hình sản xuất
        $thsxkd = Factory::where('alias','NMKD')->first()->Thsx->where('status',1)->sortByDesc('date')->first();
        $thsxkn = Factory::where('alias','NMKN')->first()->Thsx->where('status',1)->sortByDesc('date')->first();

        return view('shared.pages.trangchu',compact('slide','tin_noibat','qhcd','dhdcd','cbtt','bctc','bctn','thqt','ykien_ndt','thongtinhd','dangdoanthe','baivietsba','tin_thongbao','thsxkd','thsxkn'));
    }
    //Nội dung từng menu
    //Giới thiệu và giới thiệu chung
    public function getGioithieu($menu_id)
    {
        $menu = Menu::find($menu_id);
        if (empty($menu->Parent)) {
            $gioithieuchung = Menu::where('slug','gioi-thieu-chung')->first();
            
            $content = $gioithieuchung->Contents->where('status',1)->first();
        } else {
            $content = $menu->Contents->where('status',1)->first();
        }
        return view('shared.pages.noidung.gioithieu.chitiet',compact('menu','content'));
    }
    //Giới thiệu -> Cơ cấu tổ chức
    public function getGioithieuCocau($menu_id)
    {
        $menu = Menu::find($menu_id);
        $content = $menu->Contents()->orderBy('created_at')->get();
        $sub_content = $menu->Contents()->orderBy('created_at')->first();
        return view('shared.pages.noidung.gioithieu.chitiet_cocau',compact('menu','content','sub_content'));
    }
    public function getGioithieuSubCocau($menu_id,$content_id)
    {
        $menu = Menu::find($menu_id);
        $content = $menu->Contents()->orderBy('created_at')->get();
        $sub_content = Content::find($content_id);
        return view('shared.pages.noidung.gioithieu.chitiet_cocau',compact('menu','content','sub_content'));
    }
    //Giới thiệu -> Các nhà máy
    public function getGioithieuTab($menu_id)
    {
        $menu = Menu::find($menu_id);
        $content = $menu->Contents()->orderBy('created_at')->get();
        $sub_content = $menu->Contents()->orderBy('created_at')->first();
        return view('shared.pages.noidung.gioithieu.chitiet_tab',compact('menu','content','sub_content'));
    }

    //Tin tức
    public function getTintuc($menu_id)
    {
        $menu = Menu::find($menu_id);
        if (empty($menu->Parent)) {
            $content_view = $menu->ParentContents->where('status',1)->sortByDesc('views')->take(5);
            //$tintuc_new = $menu->ParentContents->where('status',1)->sortByDesc('created_at')->take(5);
            return view('shared.pages.noidung.tintuc.all',compact('menu','content_view'));
        } else {
            $content = Content::where('menu_id',$menu_id)->where('status',1)->orderBy('created_at', 'desc')->paginate(5);
            $content_view = Content::where('menu_id',$menu_id)->where('status',1)->orderBy('views', 'desc')->take(5)->get();
            return view('shared.pages.noidung.tintuc.list',compact('content','content_view','menu'));
        }  
    }
    public function getDetailTintuc($menu_id,$content_id)
    {
        $menu = Menu::find($menu_id);
        
        $noidungKey = 'noidung_' . $content_id;

        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($noidungKey)) {
            Content::where('id', $content_id)->increment('views');
            Session::put($noidungKey, 1);
        }

        // Sử dụng Eloquent để lấy ra sản phẩm theo id
        $tintuc = Content::find($content_id);

        //bài viết liên quan và xem nhiều
        $lienquan = $menu->Contents->where('status',1)->sortByDesc('created_at')->take(5);
        $xemnhieu = $menu->Contents->where('status',1)->sortByDesc('views')->take(5);
        // Trả về view
        return view('shared.pages.noidung.tintuc.detail',compact('menu','tintuc','lienquan','xemnhieu'));
    }
    //Quan hệ cổ đông
    public function getQuanhecodong($menu_id)
    {
        $menu = Menu::find($menu_id);
        if (empty($menu->Parent)) {
            $content_view = $menu->ParentContents->where('status',1)->sortByDesc('views')->take(5);
            //$tintuc_new = $menu->ParentContents->where('status',1)->sortByDesc('created_at')->take(5);
            return view('shared.pages.noidung.quanhecodong.all',compact('menu','content_view'));
        } else {
            $content = Content::where('menu_id',$menu_id)->where('status',1)->orderBy('created_at', 'desc')->paginate(7);
            $content_view = Content::where('menu_id',$menu_id)->where('status',1)->orderBy('views', 'desc')->take(5)->get();
            return view('shared.pages.noidung.quanhecodong.quanhecodong',compact('content','content_view','menu'));
        }  
    }
    public function getDetailQuanhecodong($menu_id,$content_id)
    {
        $menu = Menu::find($menu_id);
        
        $noidungKey = 'noidung_' . $content_id;

        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($noidungKey)) {
            Content::where('id', $content_id)->increment('views');
            Session::put($noidungKey, 1);
        }

        // Sử dụng Eloquent để lấy ra sản phẩm theo id
        $tintuc = Content::find($content_id);

        //bài viết liên quan và xem nhiều
        $lienquan = $menu->Contents->where('status',1)->sortByDesc('created_at')->take(5);
        $xemnhieu = $menu->Contents->where('status',1)->sortByDesc('views')->take(5);
        // Trả về view
        return view('shared.pages.noidung.quanhecodong.detail',compact('menu','tintuc','lienquan','xemnhieu'));
    }
    //Tuyển dụng
    public function getTuyendung($menu_id)
    {
        
        $menu = Menu::find($menu_id);
        if (empty($menu->Parent)) {
            $content_view = $menu->ParentContents->where('status',1)->sortByDesc('views')->take(5);
            //$tintuc_new = $menu->ParentContents->where('status',1)->sortByDesc('created_at')->take(5);
            return view('shared.pages.noidung.tuyendung.all',compact('menu','content_view'));
        } else {
            $content = Content::where('menu_id',$menu_id)->where('status',1)->orderBy('created_at', 'desc')->paginate(5);
            $content_view = Content::where('menu_id',$menu_id)->where('status',1)->orderBy('views', 'desc')->take(5)->get();
            return view('shared.pages.noidung.tuyendung.list',compact('content','content_view','menu'));
        }  
    }
    public function getDetailTuyendung($menu_id,$content_id)
    {
        $menu = Menu::find($menu_id);
        
        $noidungKey = 'noidung_' . $content_id;

        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($noidungKey)) {
            Content::where('id', $content_id)->increment('views');
            Session::put($noidungKey, 1);
        }

        // Sử dụng Eloquent để lấy ra sản phẩm theo id
        $tintuc = Content::find($content_id);

        //bài viết liên quan và xem nhiều
        $lienquan = $menu->Contents->where('status',1)->sortByDesc('created_at')->take(5);
        $xemnhieu = $menu->Contents->where('status',1)->sortByDesc('views')->take(5);
        // Trả về view
        return view('shared.pages.noidung.tintuc.detail',compact('menu','tintuc','lienquan','xemnhieu'));
    }
    
    //Liên hệ
    public function getLienhe($menu_id)
    {
        $menu = Menu::find($menu_id);
        $content = $menu->Contents()->where('status',1)->first();
        return view('shared.pages.noidung.lienhe',compact('menu','content'));
    }
}
