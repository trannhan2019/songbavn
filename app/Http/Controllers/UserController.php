<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Datatables;
// use
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function getDanhsach(){
        return view('admin.pages.nguoidung.danhsach');
    }
    // lay du lieu do ra datatable
    public function getDatatable(){
        $users = User::orderBy('id','desc')->get();
        return Datatables::of($users)
        // them cot stt
        ->addIndexColumn()
        ->addColumn('detail', function ($user) {
            return
            '<a href="admin/user/detail" class="btn btn-success btn-sm btn-detail">
            <i class="fas fa-search"></i> Chi tiết
            </a>';
        })
        ->addColumn('edit', function ($user) {
            return
            '<button type="button" class="btn btn-warning btn-sm btn-edit" >
            <i class="far fa-edit"></i> Sửa
            </button>';
        })
        ->addColumn('delete', function ($user) {
            return
            '<button type="button" class="btn btn-danger btn-sm btn-delete">
            <i class="far fa-trash-alt"></i>
            Xóa
            </button>';
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
            return $user->active == 1 ? 'Đang hoạt động' : 'Không hoạt động'; 
        })
        ->rawColumns(['detail','edit','delete'])
        ->make(true);
    }
    //Thêm
    public function getThem(){
        return view('admin.pages.nguoidung.them');
    }
    public function postThem(Request $request){

        $this->validate($request,
        [
            'fullname'=> 'required|min:3|max:255',
            'username'=> 'required|unique:users,username|min:3|max:32',
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
            $hinh = $name;
            while(file_exists('admin_asset/images/user/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('admin_asset/images/user/',$hinh);
            $user->image = $hinh;
        } else {
            $user->image = 'img_avatar.png';
        }
        $user->active = $request->active;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->info = $request->info;
        $user->timestamps = false;
        if ($request->created_at) {
            $r = str_replace('/','-',$request->created_at);
            $ThoigianTao = strtotime($r);
            $user->created_at = date('Y-m-d H:i:s',$ThoigianTao);
        } else {
            $user->created_at = null;
        }
        
        $user->save();
        return redirect('admin/user/danhsach')->with('thongbao','Tạo tài khoản thành công !');
    }
    //chi tiet nguoi dung
    public function getChitiet(){
        return view('admin.pages.nguoidung.chitiet');
    }
}
