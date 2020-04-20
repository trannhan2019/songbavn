<?php

namespace App\Http\Controllers;

use App\Danhmucykien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Ykiencodong;

class YkiencodongController extends Controller
{
    //Ý kiến 
    public function getAdminYkien ($menu_id)
    {
        $menu = Menu::find($menu_id);
        $ykien = Ykiencodong::orderBy('created_at','desc')->get();
        return view('admin.pages.ykien.list',compact('menu','ykien'));
    }
    public function getAdminAddYkien($menu_id)
    {
        $menu = Menu::find($menu_id);
        $danhmucykien = Danhmucykien::all();
        return view('admin.pages.ykien.add',compact('menu','danhmucykien'));
    }
    public function postAdminAddYkien(Request $request, $menu_id)
    {
        $this->validate($request,[
            'danhmucykien_id'=> 'required',
            'fullname'=>'required|min:3|max:255',
            'email'=>'email',
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự',
            'email'=>':attribute chưa đúng đinh dạng',
        ],
        [
            'danhmucykien_id'=>'Tên chuyên mục',
            'fullname'=>'Họ và tên',
        ]);
        $ykien = new Ykiencodong();
        $ykien->menu_id = $menu_id;
    }
}
