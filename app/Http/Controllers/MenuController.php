<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Menu;

class MenuController extends Controller
{
    public function getDanhsach(){
        $menus = Menu::whereNull('parent')->with('ChildMenus')->get();
        return view('admin.pages.danhmuc.danhsach',compact('menus'));
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'name'=> 'required|unique:menus,name|min:3|max:32',
            'position'=>'required|integer'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.unique'=>'Tên danh mục đã có',
            'name.min'=>'Tên danh mục phải có ít nhất 3 ký tự',
            'name.max'=>'Tên danh mục không nhiều hơn 255 ký tự',
            'position.required'=>'Chưa chọn vị trí của danh mục',
            'position.integer'=>'Vị trí phải là số nguyên'
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = str::slug($request->name,'-');
        $menu->status = $request->status;
        $menu->position = $request->position;
        $menu->parent = $request->parent;
        $menu->save();
        return redirect()->route('admin.menu.danhsach')->with('thongbao','Tạo danh mục thành công !');
    }

    public function postSua(Request $request, $id){
        $menu = Menu::find($id);
        $this->validate($request,[
            'name'=> 'required|unique:menus,name|min:3|max:32',
            'position'=>'required|integer'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.unique'=>'Tên danh mục đã có',
            'name.min'=>'Tên danh mục phải có ít nhất 3 ký tự',
            'name.max'=>'Tên danh mục không nhiều hơn 255 ký tự',
            'position.required'=>'Chưa chọn vị trí của danh mục',
            'position.integer'=>'Vị trí phải là số nguyên'
        ]);
        $menu->name = $request->name;
        $menu->slug = str::slug($request->name,'-');
        $menu->status = $request->status;
        $menu->position = $request->position;
        $menu->save();
        return redirect('admin/menu/danhsach')->with('thongbao','Sửa danh mục thành công !');
    }

    public function postXoa($id){
        $menu = Menu::find($id);

        if ($menu->ChildMenus) {
            foreach ($menu->ChildMenus as $child) {
                if ($child->Content) {
                    foreach ($child->Content as $content) {
                        $content->menu_id = NULL;
                        $content->save();
                    }
                }
            }
            
            $menu->ChildMenu()->delete();
        }

        if ($menu->Content) {
            foreach ($menu->Content as $content) {
                $content->menu_id = NULL;
                $content->save();
            }
        }

        $menu->delete();

        return redirect()->route('admin.menu.danhsach')->with('thongbao','Xóa danh mục thành công !');
    }
}
