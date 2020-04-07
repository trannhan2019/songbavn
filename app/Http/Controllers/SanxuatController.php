<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Thsx;
use App\Muctieunam;

class SanxuatController extends Controller
{
    public function getAdminList()
    {
        return view('admin.pages.thsx.sanxuat.list');
    }
    //Ajax lấy dữ liệu cho Datatable
    public function getDatatable(){
        $sanxuat = Thsx::orderBy('date','desc')->get();
        return Datatables::of($sanxuat)
        // them cot stt
        ->addIndexColumn()
        ->addColumn('detail', function ($user) {
            return
            '<a href="' . route('admin.user.detail', $user->id) .'" class="btn btn-success btn-sm btn-detail">
            <i class="fas fa-search"></i> Chi tiết
            </a>';
        })
        ->addColumn('edit', function ($user) {
            return
            '<a href="' . route('admin.user.edit', $user->id) .'" class="btn btn-warning btn-sm btn-edit" >
            <i class="far fa-edit"></i> Sửa
            </a>';
        })
        ->addColumn('delete', function ($user) {
            return
            '<a href="' . route('admin.user.delete', $user->id) .'" class="btn btn-danger btn-sm btn-detete" >
            <i class="far fa-trash-alt"></i> Xóa
            </a>';
        })
        ->editColumn('role',function($user){
            if($user->role ==1){
                return 'admin';
            }
            elseif($user->role ==2){
                return 'editer';
            }
            elseif($user->role ==3){
                return 'cổ đông';
            }
            else
            return 'không có quyền';
        })
        ->editColumn('active',function($user){
            // return $user->active == 1 ? 'Đang hoạt động' : 'Không hoạt động'; 
            if ($user->active == 1) {
                return '<span class="text-primary">Đang hoạt động</span>';
            } else {
                return '<span class="text=secondary"> Không hoạt động </span>';
            }
             
        })
        ->rawColumns(['active','detail','edit','delete'])
        ->make(true);
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
    public function getRestore($id)
    {
        $muctieu = Muctieunam::withTrashed()->find($id);
        $muctieu->restore();
        return redirect('admin/muctieu/trash')->with('thongbao','Khôi phục nội dung thành công !');
    }
    public function postForcedelete($id)
    {
        $muctieu = Muctieunam::withTrashed()->find($id);
        $muctieu->forceDelete();
        
        return redirect('admin/muctieu/trash')->with('thongbao','Xóa vĩnh viễn nội dung thành công !');
    }
}
