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
            'ask_content'=>'required',
            'created_at'=> 'required'
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
            'ask_content'=>'Nội dung hỏi',
            'created_at'=>'Thời gian khởi tạo'
        ]);
        $ykien = new Ykiencodong();
        $ykien->menu_id = $menu_id;
        $ykien->danhmucykien_id = $request->danhmucykien_id;
        $ykien->fullname = $request->fullname;
        $ykien->email = $request->email;
        $ykien->phone = $request->phone;
        $ykien->address = $request->address;
        $ykien->ask_content = $request->ask_content;
        $ykien->status = $request->status;
        if ($request->created_at) {
            $ykien->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $ykien->created_at = null;
        }
        $ykien->save();
        return redirect('admin/content/'.$menu_id.'/y-kien-nha-dau-tu.html')->with('thongbao','Thêm thông tin thành công !');
    }
    public function getAdminEditYkien($ykien_id)
    {
        $ykien = Ykiencodong::find($ykien_id);
        return view('admin.pages.ykien.edit',compact('ykien'));
    }
}
