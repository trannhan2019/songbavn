<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\Thsx;
use App\Muctieunam;
use App\Factory;

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
        $muctieu = Muctieunam::all();
        $sanxuat = Thsx::find($id);
        return view('admin.pages.thsx.sanxuat.edit',compact('muctieu','sanxuat'));
    }
    public function postAdminEdit(Request $request, $id)
    {
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
        $sanxuat = Thsx::find($id);
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
        return redirect('admin/sanxuat/list')->with('thongbao','Sửa thông tin thành công !');
    }
    public function getAdminDelete($id)
    {
        $sanxuat = Thsx::find($id);
        $sanxuat->delete();
        
        return redirect()->route('admin.sanxuat.list')->with('thongbao','Xóa thông tin thành công !');
    }
    //Đã xóa
    public function getTrash()
    {
        $sanxuat = Thsx::orderByDesc('date')->onlyTrashed()->get();
        return view('admin.pages.thsx.sanxuat.trash',compact('sanxuat'));
    }
    public function postRestore($id)
    {
        $sanxuat = Thsx::withTrashed()->find($id);
        $sanxuat->restore();
        return redirect('admin/sanxuat/trash')->with('thongbao','Khôi phục nội dung thành công !');
    }
    public function postForcedelete($id)
    {
        $sanxuat = Thsx::withTrashed()->find($id);
        $sanxuat->forceDelete();
        
        return redirect('admin/sanxuat/trash')->with('thongbao','Xóa vĩnh viễn nội dung thành công !');
    }
    //shared
    public function getSanxuat()
    {
        $thsx_day = Thsx::where('status',1)->orderBy('date','desc')->first();
        //$thsxkn = Factory::where('alias','NMKN')->first()->Thsx->where('status',1)->sortByDesc('date')->first();
        return view('shared.pages.noidung.sanxuat.show',compact('thsx_day'));
    }
}
