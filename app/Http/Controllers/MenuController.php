<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Menu;

class MenuController extends Controller
{
    public function getList(){
        $menus = Menu::whereNull('parent')->with('ChildMenus')->get();
        return view('admin.pages.menu.list',compact('menus'));
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'name'=> 'required|unique:menus,name|min:3|max:255',
            'position'=>'required|integer'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'unique'=>'Tên danh mục đã tồn tại',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự',
            'integer'=>':attribute phải là số nguyên'
        ],
        [
            'name'=>'Tên danh mục',
            'position'=>'Vị trí'
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = str::slug($request->name,'-');
        $menu->status = $request->status;
        $menu->position = $request->position;
        $menu->parent = $request->parent;
        $menu->save();
        return redirect()->route('admin.menu.list')->with('thongbao','Tạo danh mục thành công !');
    }

    public function postEdit(Request $request, $id){
        $menu = Menu::find($id);
        $this->validate($request,[
            'names'=> 'required|min:3|max:32',
            'positions'=>'required|integer'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự',
            'integer'=>':attribute phải là số nguyên'
        ],
        [
            'names'=>'Tên danh mục',
            'positions'=>'Vị trí'
        ]);
        $menu->name = $request->names;
        $menu->slug = str::slug($request->names,'-');
        $menu->status = $request->status;
        $menu->position = $request->positions;
        $menu->save();
        return redirect('admin/menu/list')->with('thongbao','Sửa danh mục thành công !');
    }

    public function postDelete($id){
        $menu = Menu::find($id);
        var_dump($menu);
        if ($menu->ChildMenus) {
            foreach ($menu->ChildMenus as $child) {
                $child->delete(); 
            }  
            
        }

        $menu->delete();

        return redirect('admin/menu/list')->with('thongbao','Xóa danh mục thành công !');
    }
}
