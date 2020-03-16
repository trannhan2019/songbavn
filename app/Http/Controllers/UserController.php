<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
// use
use App\User;

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

    }
    //chi tiet nguoi dung
    public function getChitiet(){
        return view('admin.pages.nguoidung.chitiet');
    }
}
