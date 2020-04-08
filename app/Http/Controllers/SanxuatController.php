<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        ->editColumn('muctieunam_id',function($sanxuat){
            return $sanxuat->Muctieunam->title;
        })
        
        ->editColumn('date',function($sanxuat){
            return date('d/m/Y', strtotime($sanxuat->date));

        })
        
        ->editColumn('power',function($sanxuat){
            return number_format($sanxuat->power, 1, ',', '.');
        })
        ->editColumn('quantity',function($sanxuat){
            return number_format($sanxuat->quantity, 3, ',', '.');
        })
        ->editColumn('MNH',function($sanxuat){
            return number_format($sanxuat->MNH, 2, ',', '.');
        })
        ->editColumn('rain',function($sanxuat){
            return number_format($sanxuat->rain, 1, ',', '.');
        })
        
        ->editColumn('status',function($sanxuat){

            if ($sanxuat->status == 1) {
                return '<span class="badge badge-primary">Hoạt động</span>';
            } else {
                return '<span class="badge badge-secondary"> Không hoạt động </span>';
            }
             
        })
        
        ->addColumn('edit', function ($sanxuat) {
            return
            '<a href="' . route('admin.sanxuat.edit', $sanxuat->id) .'" class="btn btn-warning btn-sm btn-edit" >
            <i class="far fa-edit"></i>
            </a>';
        })
        ->addColumn('delete', function ($sanxuat) {
            return
            '<a href="' . route('admin.sanxuat.delete', $sanxuat->id) .'" class="btn btn-danger btn-sm btn-detete" >
            <i class="far fa-trash-alt"></i>
            </a>';
        })
        
        ->rawColumns(['status','edit','delete'])
        ->make(true);
    }
    public function getAdminAdd()
    {
        $muctieu = Muctieunam::orderBy('year','desc')->get();
        return view('admin.pages.thsx.sanxuat.add',compact('muctieu'));
    }
    public function postAdminAdd(Request $request)
    {
        // dd($request);
        $this->validate($request,
        [
            'date'=>'required',
            'power'=> 'required|numeric',
            'quantity'=> 'required|numeric',
            'MNH'=> 'required|numeric',
            'rain'=> 'required|numeric',
            'device'=> 'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'numeric'=>':attribute phải là kiểu số'
        ],
        [
            'date'=>'Ngày',
            'quantity'=>'Sản lượng',
            'power'=> 'Công suất',
            'MNH'=> 'Mực nước hồ',
            'rain'=> 'Lượng mưa',
            'device'=>'Tình trạng thiết bị'
        ]);
        $sanxuat = new Thsx;
        $sanxuat->muctieunam_id = $request->muctieunam_id;
        $sanxuat->date = date('Y-m-d',strtotime(str_replace('/','-',$request->date)));
        $sanxuat->power = $request->power;
        $sanxuat->quantity = $request->quantity;
        $sanxuat->MNH = $request->MNH;
        $sanxuat->rain = $request->rain;
        $sanxuat->device = $request->device;
        $sanxuat->status = $request->status;
        $sanxuat->user_id = Auth::user()->id;
        
        $sanxuat->save();
        return redirect('admin/sanxuat/list')->with('thongbao','Thêm thông tin thành công !');
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
