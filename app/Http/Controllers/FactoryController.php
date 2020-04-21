<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factory;

class FactoryController extends Controller
{
    public function getAdminList()
    {
        $factory = Factory::all();
        return view('admin.pages.thsx.factory.list',compact('factory'));
    }
    public function postAdminAdd(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|min:3|max:255',
            'alias'=>'required|min:3|max:255'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'name'=>'Tên nhà máy',
            'alias'=>'Ký hiệu'
        ]);
        $factory = new Factory;
        $factory->name = $request->name;
        $factory->alias = $request->alias;
        $factory->status = $request->status;
        
        $factory->save();
        return redirect('admin/factory/list')->with('thongbao','Thêm thông tin thành công !');
    }
    public function getAdminEdit($id)
    {
        $factory = Factory::find($id);
        return view('admin.pages.thsx.factory.edit',compact('factory'));
    }
    public function postAdminEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'name'=>'required|min:3|max:255',
            'alias'=>'required|min:3|max:255'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'name'=>'Tên nhà máy',
            'alias'=>'Ký hiệu'
        ]);
        $factory = Factory::find($id);
        $factory->name = $request->name;
        $factory->alias = $request->alias;
        $factory->status = $request->status;
        $factory->save();
        return redirect('admin/factory/list')->with('thongbao','Sửa thông tin thành công !');
    }
    public function postAdminDelete($id)
    {
        $factory = Factory::find($id);
        $factory->delete();
        
        return redirect()->route('admin.factory.list')->with('thongbao','Xóa thông tin thành công !');
    }
    //Đã xóa
    public function getTrash()
    {
        $factory = Factory::orderBy('name')->onlyTrashed()->get();
        return view('admin.pages.thsx.factory.trash',compact('factory'));
    }
    public function postRestore($id)
    {
        $factory = Factory::withTrashed()->find($id);
        $factory->restore();
        return redirect('admin/factory/trash')->with('thongbao','Khôi phục thông tin thành công !');
    }
}
