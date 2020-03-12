<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Menu;

class MenuController extends Controller
{
    public function getDanhsach(){
        $menus = Menu::whereNull('parent')->with('ChildMenu')->get();
        return view('admin.pages.danhmuc.danhsach',compact('menus'));
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'name'=> 'required|min:3|max:32',
            'position'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.min'=>'Tên danh mục phải có ít nhất 3 ký tự',
            'name.max'=>'Tên danh mục không nhiều hơn 255 ký tự',
            'position.required'=>'Chưa chọn vị trí của danh mục'
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = str::slug($request->name,'-');
        $menu->status = $request->status;
        $menu->position = $request->position;
        $menu->parent = $request->parent;
        $menu->save();
        return redirect('admin/menu/danhsach')->with('thongbao','Tạo danh mục thành công !');
    }

    public function postSua(Request $request, $id){
        $menu = Menu::find($id);
        $this->validate($request,[
            'name'=> 'required|min:3|max:32',
            'position'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.min'=>'Tên danh mục phải có ít nhất 3 ký tự',
            'name.max'=>'Tên danh mục không nhiều hơn 255 ký tự',
            'position.required'=>'Chưa chọn vị trí của danh mục'
        ]);
        $menu->name = $request->name;
        $menu->slug = str::slug($request->name,'-');
        $menu->status = $request->status;
        $menu->position = $request->position;
        $menu->save();
        return redirect('admin/menu/danhsach')->with('thongbao','Sửa danh mục thành công !');
    }
}
