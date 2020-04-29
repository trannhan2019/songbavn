<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Slide;
use App\Menu;

class PagesController extends Controller
{
    public function getDashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function getTrangchu()
    {
        $slide = Slide::where('Active',1)->orderBy('location')->get();
        $tin_noibat = Content::where('highlights',1)->where('status',1)->orderBy('created_at','desc')->take(10)->get();
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

        return view('shared.pages.trangchu',compact('slide','tin_noibat','qhcd','dhdcd','cbtt','bctc','bctn','thqt','ykien_ndt','thongtinhd','dangdoanthe','baivietsba','tin_thongbao'));
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
            $tintuc_view = $menu->ParentContents->where('status',1)->sortByDesc('views')->take(5);
            // dd($tintuc_view);
            return view('shared.pages.noidung.tintuc.all',compact('menu','tintuc_view'));
        } else {
            $tintuc = Content::where('menu_id',$menu_id)->where('status',1)->orderBy('created_at', 'desc')->paginate(5);
            $tintuc_view = Content::where('menu_id',$menu_id)->where('status',1)->orderBy('views', 'desc')->take(5)->get();
            //dd($tintuc_view);
            return view('shared.pages.noidung.tintuc.tintuc',compact('tintuc','tintuc_view','menu'));
        }
        
    }
    //Liên hệ
    public function getLienhe($menu_id)
    {
        $menu = Menu::find($menu_id);
        $content = $menu->Contents()->where('status',1)->first();
        return view('shared.pages.noidung.lienhe',compact('menu','content'));
    }
}
