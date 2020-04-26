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
        $thongtinhd = Menu::where('slug','thong-tin-hoat-dong')->where('status',1)->first();
        $dangdoanthe = Menu::where('slug','dang-doan-the')->where('status',1)->first();
        $baivietsba = Menu::where('slug','bai-viet-sba')->where('status',1)->first();

        return view('shared.pages.trangchu',compact('slide','tin_noibat','qhcd','dhdcd','cbtt','bctc','thongtinhd','dangdoanthe','baivietsba','tin_thongbao'));
    }
}
