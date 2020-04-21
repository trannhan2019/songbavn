<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Danhmucykien;

class DanhmucykienController extends Controller
{
    public function getAdminDanhmucYkien()
    {
        $listdanhmuc = Danhmucykien::all();
        return view('admin.pages.ykien.danhmuc',compact('listdanhmuc'));
    }
    public function postAdminAddDanhmucYkien(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|min:3|max:255',
            'status'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'name'=>'Tên danh mục',
            'status'=>'Trạng thái'
        ]);
        $dmykien = new Danhmucykien();
        $dmykien->name = $request->name;
        $dmykien->slug = str::slug($request->name,'-');
        $dmykien->status = $request->status;
        $dmykien->save();
        return redirect('admin/content/danh-muc-y-kien.html')->with('thongbao','Tạo danh mục thành công !');
    }
    public function postAdminEditDanhmucYkien(Request $request, $dm_id)
    {
        $this->validate($request,[
            'name'=> 'required|min:3|max:255',
            'status'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'name'=>'Tên danh mục',
            'status'=>'Trạng thái'
        ]);
        $dmykien = Danhmucykien::find($dm_id);
        $dmykien->name = $request->name;
        $dmykien->slug = str::slug($request->name,'-');
        $dmykien->status = $request->status;
        $dmykien->save();
        return redirect('admin/content/danh-muc-y-kien.html')->with('thongbao','Sửa danh mục thành công !');
    }
    public function postAdminDeleteDanhmucYkien($dm_id)
    {
        $dmykien = Danhmucykien::find($dm_id);
        $dmykien->delete();
        return redirect('admin/content/danh-muc-y-kien.html')->with('thongbao','Xóa danh mục thành công !');
    }
    //Trash
    public function getTrash()
    {
        $danhmucykien = Danhmucykien::orderBy('created_at')->onlyTrashed()->get();
        return view('admin.pages.ykien.danhmuctrash',compact('danhmucykien'));
    }
    public function postRestore($id)
    {
        $danhmucykien = Danhmucykien::withTrashed()->find($id);
        $danhmucykien->restore();
        return redirect()->back()->with('thongbao','Khôi phục thông tin thành công !');
    }
}
