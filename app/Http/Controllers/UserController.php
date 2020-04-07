<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Datatables;
// use
use App\User;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getList(){
        return view('admin.pages.user.list');
    }
    // lay du lieu do ra datatable
    public function getDatatable(){
        $users = User::orderBy('id','desc')->get();
        return Datatables::of($users)
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
                return '<span class="badge badge-primary">Đang hoạt động</span>';
            } else {
                return '<span class="badge badge-secondary"> Không hoạt động </span>';
            }
             
        })
        ->rawColumns(['active','detail','edit','delete'])
        ->make(true);
    }
    //Thêm
    public function getAdd(){
        return view('admin.pages.user.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
        [
            'fullname'=> 'required|min:3|max:255',
            'username'=> 'required|unique:users,username|min:3|max:255',
            'email'=> 'required|unique:users,email|email',
            'password'=>'required|min:6|max:255',
            'password_confirmation'=>'required|same:password|min:6|max:255',
            'image'=>'image',
            'role'=>'required',
            'active'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự',
            'unique'=>':attribute này đã tồn tại',
            'email'=>':attribute chưa đúng đinh dạng',
            'same'=>':attribute chưa khớp',
            'image'=>':attribute không đúng định dạng'
        ],
        [
            'fullname'=>'Họ và tên',
            'username'=>'Tên đăng nhập',
            'password'=>'Mật khẩu',
            'password_confirmation'=>'Mật khẩu nhập lại',
            'image'=>'Ảnh đại diện',
            'role'=>'Quyền',
            'active'=>'Trạng thái'
            
        ]);
        $user = new User;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists('admin_asset/images/user/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('admin_asset/images/user/',$hinh);
            $user->image = $hinh;
        } else {
            $user->image = null;
        }
        $user->active = $request->active;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->info = $request->info;
        // $user->timestamps = false;
        if ($request->created_at) {
            // $r = str_replace('/','-',$request->created_at);
            // $ThoigianTao = strtotime($r);
            // $user->created_at = date('Y-m-d H:i:s',$ThoigianTao);
            $user->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $user->created_at = null;
        }
        
        $user->save();
        return redirect('admin/user/list')->with('thongbao','Tạo tài khoản thành công !');
    }
    //chi tiet nguoi dung
    public function getDetail($id){
        $user = User::find($id);
        return view('admin.pages.user.detail',compact('user'));
    }
    //sua
    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.pages.user.edit',compact('user'));
    }
    public function postEdit(Request $request,$id)
    {
        // dd($request->all());
        $this->validate($request,
        [
            'fullname'=> 'required|min:3|max:255'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'fullname'=>'Họ và tên'
        ]);
        $user = User::find($id);
        $user->fullname = $request->fullname;
        if ($request->changePassword == "on") {
            $this->validate($request,
            [
                'password'=>'required|min:6|max:255',
                'password_confirmation'=>'required|same:password|min:6|max:255'
            ],
            [
                'required'=>'Bạn chưa nhập :attribute',
                'min'=>':attribute phải có ít nhất :min ký tự',
                'max'=>':attribute tối đa :max ký tự',
                'same'=>':attribute chưa khớp'
            ],
            [
                'password'=>'Mật khẩu',
                'password_confirmation'=>'Mật khẩu nhập lại'
            ]);
            $user->password = bcrypt($request->password);
        }
        if($request->hasFile('image')){
            $this->validate($request,
            [
                'image'=>'image'
            ],
            [
                'image'=>':attribute không đúng định dạng'
            ],
            [
                'image'=>'Ảnh đại diện'
                
            ]);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists('admin_asset/images/user/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('admin_asset/images/user/',$hinh);
            if($user->image){
                unlink('admin_asset/images/user/'.$user->image);
            }
            
            $user->image = $hinh;
            
        }
        $user->role = $request->role;
        $user->active = $request->active;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->info = $request->info;
        if ($request->created_at) {
            $user->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        }
        $user->save();
        return redirect('admin/user/list')->with('thongbao','Sửa tài khoản thành công !');
    }
    //xoa
    public function getDelete( $id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect()->route('admin.user.list')->with('thongbao','Xóa người dùng thành công !');
    }
    //TRASH
    public function getTrash(){
        $users = User::orderBy('id','desc')->onlyTrashed()->get();
        return view('admin.pages.user.trash',compact('users'));
    }
    
    public function getRestore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect()->route('admin.user.trash')->with('thongbao','Khôi phục người dùng thành công !');
    }
    public function postForcedelete($id)
    {       
        $user = User::withTrashed()->find($id);
        $user->forceDelete();
        if($user->image){
            unlink('admin_asset/images/user/'.$user->image);
        }
        return redirect()->route('admin.user.trash')->with('thongbao','Xóa vĩnh viễn người dùng thành công !');
    }
    //Đăng nhập
    public function getDangnhap()
    {
        return view('shared.pages.dangnhap');
    }
    public function postDangnhap(Request $request)
    {
        $this->validate($request,
        [
            'username'=> 'required|min:3|max:32',
            'password'=>'required|min:6|max:255',
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'username'=>'Tên đăng nhập',
            'password'=>'Mật khẩu'
            
        ]);
        $username = $request->username;
        $password = $request->password;
        $remember = $request->has('remember')? true:false;
        if(Auth::attempt(['username' => $username, 'password' => $password, 'active' => 1],$remember))
        {
            return redirect()->route('trangchu');
        }
        else
        {
            return redirect('dangnhap')->with('loi','Đăng nhập không thành công');
        }
    }
    public function getDangxuat()
    { 
        Auth::logout();
        return redirect()->route('trangchu');
    }
}
