<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Muctieunam;
use App\Factory;

class MuctieunamController extends Controller
{
    public function getAdminList()
    {
        $muctieu = Muctieunam::orderBy('year','desc')->get();
        return view('admin.pages.thsx.muctieunam.list',compact('muctieu'));
    }
    public function getAdminAdd()
    {
        $factory = Factory::all();
        return view('admin.pages.thsx.muctieunam.add',compact('factory'));
    }
    public function postAdminAdd(Request $request)
    {
        $this->validate($request,
        [
            'year'=>'required|integer',
            'ratedpower'=> 'required|numeric',
            'MNHlowest'=> 'required|numeric',
            'MNHnormal'=> 'required|numeric',
            'quantity'=> 'required|numeric'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'integer'=>':attribute chưa đúng định dạng',
            'max'=>':attribute tối đa :max ký tự',
            'numeric'=>':attribute phải là kiểu số'
        ],
        [
            'year'=>'Năm',
            'quantity'=>'Sản lượng',
            'ratedpower'=> 'Công suất',
            'MNHlowest'=> 'MNC',
            'MNHnormal'=> 'MNDBT'
        ]);
        $muctieu = new Muctieunam;
        $muctieu->factory_id = $request->factory_id;
        $muctieu->year = $request->year;
        $factory = Factory::find($request->factory_id);
        $muctieu->title = $factory->name.' năm '.$request->year;
        $muctieu->ratedpower = $request->ratedpower;
        $muctieu->quantity = $request->quantity;
        $muctieu->MNHlowest = $request->MNHlowest;
        $muctieu->MNHnormal = $request->MNHnormal;
        $muctieu->status = $request->status;
        
        $muctieu->save();
        return redirect('admin/muctieu/list')->with('thongbao','Thêm thông tin thành công !');
    }
    public function getAdminEdit($id)
    {
        $factory = Factory::all();
        $muctieu = Muctieunam::find($id);
        return view('admin.pages.thsx.muctieunam.edit',compact('muctieu','factory'));
    }
    public function postAdminEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'year'=>'required|integer',
            'ratedpower'=> 'required|numeric',
            'MNHlowest'=> 'required|numeric',
            'MNHnormal'=> 'required|numeric',
            'quantity'=> 'required|numeric'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'integer'=>':attribute chưa đúng định dạng',
            'numeric'=>':attribute phải là kiểu số'
        ],
        [
            'year'=>'Năm',
            'quantity'=>'Sản lượng',
            'ratedpower'=> 'Công suất',
            'MNHlowest'=> 'MNC',
            'MNHnormal'=> 'MNDBT'
        ]);
        $muctieu = Muctieunam::find($id);
        $muctieu->factory_id = $request->factory_id;
        $muctieu->year = $request->year;
        $factory = Factory::find($request->factory_id);
        $muctieu->title = $factory->name.' năm '.$request->year;
        $muctieu->ratedpower = $request->ratedpower;
        $muctieu->quantity = $request->quantity;
        $muctieu->MNHlowest = $request->MNHlowest;
        $muctieu->MNHnormal = $request->MNHnormal;
        $muctieu->status = $request->status;

        $muctieu->save();
        return redirect('admin/muctieu/list')->with('thongbao','Sửa thông tin thành công !');
    }
    public function postAdminDelete($id)
    {
        $muctieu = Muctieunam::find($id);
        $muctieu->delete();
        
        return redirect()->route('admin.muctieu.list')->with('thongbao','Xóa thông tin thành công !');
    }
    //Đã xóa
    public function getTrash()
    {
        $muctieu = Muctieunam::orderByDesc('year')->onlyTrashed()->get();
        return view('admin.pages.thsx.muctieunam.trash',compact('muctieu'));
    }
    public function postRestore($id)
    {
        $muctieu = Muctieunam::withTrashed()->find($id);
        $muctieu->restore();
        return redirect('admin/muctieu/trash')->with('thongbao','Khôi phục nội dung thành công !');
    }
    // public function postForcedelete($id)
    // {
    //     $muctieu = Muctieunam::withTrashed()->find($id);
    //     $muctieu->forceDelete();
        
    //     return redirect('admin/muctieu/trash')->with('thongbao','Xóa vĩnh viễn nội dung thành công !');
    // }
}
