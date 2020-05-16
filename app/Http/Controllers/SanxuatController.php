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
        $factory = Factory::where('status',1)->get();

        $thsxkd_day = Factory::where('alias','NMKD')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime($thsx_day->date)))->first();
        if (!empty($thsxkd_day)) {
            $month_kd = date("m", strtotime($thsxkd_day->date));
            $year_kd = date("Y", strtotime($thsxkd_day->date));
            $muctieunam_kd = $thsxkd_day->Muctieunam->id;
            $sum_month_kd = Thsx::whereYear('date', $year_kd)
            ->whereMonth('date', $month_kd)->where('muctieunam_id',$muctieunam_kd)
            ->sum('quantity');
            $sum_year_kd = Thsx::whereYear('date', $year_kd)->where('muctieunam_id',$muctieunam_kd)
            ->sum('quantity');
        }

        $thsxkn_day = Factory::where('alias','NMKN')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime($thsx_day->date)))->first();
        if (!empty($thsxkn_day)) {
            $month_kn = date("m", strtotime($thsxkn_day->date));
            $year_kn = date("Y", strtotime($thsxkn_day->date));
            $muctieunam_kn = $thsxkn_day->Muctieunam->id;
            $sum_month_kn = Thsx::whereYear('date', $year_kn)
            ->whereMonth('date', $month_kn)->where('muctieunam_id',$muctieunam_kn)
            ->sum('quantity');
            $sum_year_kn = Thsx::whereYear('date', $year_kn)->where('muctieunam_id',$muctieunam_kn)
            ->sum('quantity');
        }

        return view('shared.pages.noidung.sanxuat.show',compact('thsx_day','factory','thsxkd_day','sum_month_kd','sum_year_kd','thsxkn_day','sum_month_kn','sum_year_kn'));
    }
    public function postSanxuatNgay(Request $request)
    {
        switch ($request->input('thsx')) {
            case 'day':
                $this->validate($request,
                    [
                        'date_day'=>'required'
                    ],
                    [
                        'required'=>'Bạn chưa chọn :attribute'
                    ],
                    [
                        'date_day'=>'thời gian'
                    ]);
                    $thsx_day = Thsx::where('status',1)->where('date',date('Y-m-d',strtotime(str_replace('/','-',$request->date_day))))->first();
                    $factory = Factory::where('status',1)->get();
                    $date = $request->date_day;

                    $thsxkd_day = Factory::where('alias','NMKD')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime(str_replace('/','-',$request->date_day))))->first();
                    if (!empty($thsxkd_day)) {
                        $month_kd = date("m", strtotime($thsxkd_day->date));
                        $year_kd = date("Y", strtotime($thsxkd_day->date));
                        $muctieunam_kd = $thsxkd_day->Muctieunam->id;
                        $sum_month_kd = Thsx::whereYear('date', $year_kd)
                        ->whereMonth('date', $month_kd)->where('muctieunam_id',$muctieunam_kd)
                        ->sum('quantity');
                        $sum_year_kd = Thsx::whereYear('date', $year_kd)->where('muctieunam_id',$muctieunam_kd)
                        ->sum('quantity');
                    }

                    $thsxkn_day = Factory::where('alias','NMKN')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime(str_replace('/','-',$request->date_day))))->first();
                    if (!empty($thsxkn_day)) {
                        $month_kn = date("m", strtotime($thsxkn_day->date));
                        $year_kn = date("Y", strtotime($thsxkn_day->date));
                        $muctieunam_kn = $thsxkn_day->Muctieunam->id;
                        $sum_month_kn = Thsx::whereYear('date', $year_kn)
                        ->whereMonth('date', $month_kn)->where('muctieunam_id',$muctieunam_kn)
                        ->sum('quantity');
                        $sum_year_kn = Thsx::whereYear('date', $year_kn)->where('muctieunam_id',$muctieunam_kn)
                        ->sum('quantity');
                    }
                    return view('shared.pages.noidung.sanxuat.show',compact('thsx_day','factory','thsxkd_day','sum_month_kd','sum_year_kd','thsxkn_day','sum_month_kn','sum_year_kn','date'));
                break;
    
            case 'month':
                $this->validate($request,
                    [
                        'date_month'=>'required',
                        'factory_id' => 'required'
                    ],
                    [
                        'required'=>'Bạn chưa chọn :attribute'
                    ],
                    [
                        'date_month'=>'thời gian',
                        'factory_id'=>'Nhà máy'
                    ]);
                    $thsx_day = Thsx::where('status',1)->latest()->first();
                    $factory = Factory::where('status',1)->get();

                    $thsxkd_day = Factory::where('alias','NMKD')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime($thsx_day->date)))->first();
                    if (!empty($thsxkd_day)) {
                        $month_kd = date("m", strtotime($thsxkd_day->date));
                        $year_kd = date("Y", strtotime($thsxkd_day->date));
                        $muctieunam_kd = $thsxkd_day->Muctieunam->id;
                        $sum_month_kd = Thsx::whereYear('date', $year_kd)
                        ->whereMonth('date', $month_kd)->where('muctieunam_id',$muctieunam_kd)
                        ->sum('quantity');
                        $sum_year_kd = Thsx::whereYear('date', $year_kd)->where('muctieunam_id',$muctieunam_kd)
                        ->sum('quantity');
                    }
                    $thsxkn_day = Factory::where('alias','NMKN')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime($thsx_day->date)))->first();
                    if (!empty($thsxkn_day)) {
                        $month_kn = date("m", strtotime($thsxkn_day->date));
                        $year_kn = date("Y", strtotime($thsxkn_day->date));
                        $muctieunam_kn = $thsxkn_day->Muctieunam->id;
                        $sum_month_kn = Thsx::whereYear('date', $year_kn)
                        ->whereMonth('date', $month_kn)->where('muctieunam_id',$muctieunam_kn)
                        ->sum('quantity');
                        $sum_year_kn = Thsx::whereYear('date', $year_kn)->where('muctieunam_id',$muctieunam_kn)
                        ->sum('quantity');
                    }

                    $mix = "01/".$request->date_month;
                    $date = date("Y-m-d",strtotime(str_replace('/','-',$mix)));
                    //dd($date);
                    $month = date("m", strtotime($date));
                    $year = date("Y", strtotime($date));
                    $muctieunam = Factory::find($request->factory_id)->Muctieunam->sortByDesc('year')->first();
                    $sum_year = Thsx::whereYear('date', $year)->where('muctieunam_id',$muctieunam->id)->sum('quantity');
                    $sum_month = Thsx::whereYear('date', $year)->whereMonth('date', $month)->where('muctieunam_id',$muctieunam->id)->sum('quantity');
                    $thsx_month = Thsx::where('muctieunam_id',$muctieunam->id)->whereYear('date', $year)->whereMonth('date', $month)->where('status',1)->get();

                    return view('shared.pages.noidung.sanxuat.show',compact('thsx_day','factory','thsx_month','sum_year','sum_month','thsxkd_day','sum_month_kd','sum_year_kd','thsxkn_day','sum_month_kn','sum_year_kn','muctieunam'));
                break;
        }
        
    }
    public function postSanxuatThang(Request $request)
    {
        $this->validate($request,
        [
            'date_month'=>'required',
            'factory_id' => 'required'
        ],
        [
            'required'=>'Bạn chưa chọn :attribute'
        ],
        [
            'date_month'=>'thời gian',
            'factory_id'=>'Nhà máy'
        ]);
        $thsx_day = Thsx::where('status',1)->latest()->first();
        $factory = Factory::where('status',1)->get();

        $thsxkd_day = Factory::where('alias','NMKD')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime($thsx_day->date)))->first();
        if (!empty($thsxkd_day)) {
            $month_kd = date("m", strtotime($thsxkd_day->date));
            $year_kd = date("Y", strtotime($thsxkd_day->date));
            $muctieunam_kd = $thsxkd_day->Muctieunam->id;
            $sum_month_kd = Thsx::whereYear('date', $year_kd)
            ->whereMonth('date', $month_kd)->where('muctieunam_id',$muctieunam_kd)
            ->sum('quantity');
            $sum_year_kd = Thsx::whereYear('date', $year_kd)->where('muctieunam_id',$muctieunam_kd)
            ->sum('quantity');
        }
        $thsxkn_day = Factory::where('alias','NMKN')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime($thsx_day->date)))->first();
        if (!empty($thsxkn_day)) {
            $month_kn = date("m", strtotime($thsxkn_day->date));
            $year_kn = date("Y", strtotime($thsxkn_day->date));
            $muctieunam_kn = $thsxkn_day->Muctieunam->id;
            $sum_month_kn = Thsx::whereYear('date', $year_kn)
            ->whereMonth('date', $month_kn)->where('muctieunam_id',$muctieunam_kn)
            ->sum('quantity');
            $sum_year_kn = Thsx::whereYear('date', $year_kn)->where('muctieunam_id',$muctieunam_kn)
            ->sum('quantity');
        }

        $mix = "01/".$request->date_month;
        $date = date("Y-m-d",strtotime(str_replace('/','-',$mix)));
        //dd($date);
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));
        $muctieunam = Factory::find($request->factory_id)->Muctieunam->sortByDesc('year')->first();
        $sum_year = Thsx::whereYear('date', $year)->where('muctieunam_id',$muctieunam->id)->sum('quantity');
        $sum_month = Thsx::whereYear('date', $year)->whereMonth('date', $month)->where('muctieunam_id',$muctieunam->id)->sum('quantity');
        $thsx_month = Thsx::where('muctieunam_id',$muctieunam->id)->whereYear('date', $year)->whereMonth('date', $month)->where('status',1)->get();

        return view('shared.pages.noidung.sanxuat.show',compact('thsx_day','factory','thsx_month','sum_year','sum_month','thsxkd_day','sum_month_kd','sum_year_kd','thsxkn_day','sum_month_kn','sum_year_kn','muctieunam'));
    }
    public function getAddSanxuat()
    {
        $muctieu = Muctieunam::orderBy('year','desc')->where('status',1)->get();
        return view('shared.pages.noidung.sanxuat.add',compact('muctieu'));
    }
    public function postAddSanxuat(Request $request)
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
        return redirect()->route('sanxuat')->with('thongbao','Thêm thông tin thành công !');
    }
    public function getEditSanxuat ($id)
    {
        $muctieu = Muctieunam::orderBy('year','desc')->where('status',1)->get();
        $sanxuat = Thsx::find($id);
        return view('shared.pages.noidung.sanxuat.edit',compact('muctieu','sanxuat'));
    }
    public function postEditSanxuat(Request $request, $id)
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
        return redirect()->route('sanxuat')->with('thongbao','Sửa thông tin thành công !');
    }
 
}
