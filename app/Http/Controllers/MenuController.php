<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Menu;

class MenuController extends Controller
{
    public function getDanhsach(){
        $menus = Menu::whereNull('parent')->where('status',1)->with('ChildMenu')->get();
        return view('admin.pages.danhmuc.danhsach',compact('menus'));
    }
    public function postThem(Request $request){
        $this->validate($request,[
            'name'=> 'required|min:3|max:32'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.min'=>'tên danh mục phải có ít nhất 3 ký tự',
            'name.max'=>'tên danh mục không nhiều hơn 255 ký tự'
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = str::slug($request->name,'-');
        $menu->status = $request->status;
        $menu->parent = $request->parent;
        $menu->save();
        return redirect('admin/menu/danhsach');
    }
}
