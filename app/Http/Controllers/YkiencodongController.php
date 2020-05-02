<?php

namespace App\Http\Controllers;

use App\Danhmucykien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Menu;
use App\Ykiencodong;
use App\Traloicodong;

class YkiencodongController extends Controller
{
    //Ý kiến 
    public function getAdminYkien ($menu_id)
    {
        $menu = Menu::find($menu_id);
        $ykien = Ykiencodong::orderBy('created_at','desc')->get();
        return view('admin.pages.ykien.list',compact('menu','ykien'));
    }
    public function getAdminAddYkien($menu_id)
    {
        $menu = Menu::find($menu_id);
        $danhmucykien = Danhmucykien::all();
        return view('admin.pages.ykien.add',compact('menu','danhmucykien'));
    }
    public function postAdminAddYkien(Request $request, $menu_id)
    {
        $this->validate($request,[
            'danhmucykien_id'=> 'required',
            'fullname'=>'required|min:3|max:255',
            'email'=>'email|required',
            'ask_content'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự',
            'email'=>':attribute chưa đúng đinh dạng',
        ],
        [
            'danhmucykien_id'=>'Tên chuyên mục',
            'fullname'=>'Họ và tên',
            'email'=>'Địa chỉ email',
            'ask_content'=>'Nội dung hỏi'
        ]);
        $ykien = new Ykiencodong();
        $ykien->menu_id = $menu_id;
        $ykien->danhmucykien_id = $request->danhmucykien_id;
        $ykien->fullname = $request->fullname;
        $ykien->email = $request->email;
        $ykien->phone = $request->phone;
        $ykien->address = $request->address;
        $ykien->ask_content = $request->ask_content;
        $ykien->status = $request->status;
        if ($request->created_at) {
            $ykien->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $ykien->created_at = Carbon::now();
        }
        $ykien->save();
        return redirect('admin/content/'.$menu_id.'/y-kien-nha-dau-tu.html')->with('thongbao','Thêm thông tin thành công !');
    }
    public function getAdminEditYkien($ykien_id)
    {
        $ykien = Ykiencodong::find($ykien_id);
        $danhmucykien = Danhmucykien::all();
        return view('admin.pages.ykien.edit',compact('ykien','danhmucykien'));
    }
    public function postAdminEditYkien(Request $request, $ykien_id)
    {
        //Phần sửa ý kiến
        $this->validate($request,[
            'danhmucykien_id'=> 'required',
            'fullname'=>'required|min:3|max:255',
            'email'=>'email|required',
            'ask_content'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự',
            'email'=>':attribute chưa đúng đinh dạng',
        ],
        [
            'danhmucykien_id'=>'Tên chuyên mục',
            'fullname'=>'Họ và tên',
            'email'=>'Địa chỉ email',
            'ask_content'=>'Nội dung hỏi'
        ]);
        $ykien = Ykiencodong::find($ykien_id);
        $ykien->danhmucykien_id = $request->danhmucykien_id;
        $ykien->fullname = $request->fullname;
        $ykien->email = $request->email;
        $ykien->phone = $request->phone;
        $ykien->address = $request->address;
        $ykien->ask_content = $request->ask_content;
        
        if ($request->created_at) {
            $ykien->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $ykien->created_at = Carbon::now();
        }
        $ykien->status = $request->status;
        $ykien->save();
        //Phần thêm trả lời
        if (empty($ykien->Traloi)) {
            if (!empty($request->author) || !empty($request->reply_content)) {
                $this->validate($request,[
                    'author'=>'required'
                ],
                [
                    'required'=>'Bạn chưa nhập :attribute'
                ],
                [
                    'author'=>'Tác giả'
                ]);
                $traloi = new Traloicodong();
                $traloi->user_id = Auth::user()->id;
                $traloi->ykiencodong_id = $ykien_id;
                $traloi->author = $request->author;
                $traloi->reply_content = $request->reply_content;
                $traloi->save();
            } 
            
        } else {
            $this->validate($request,[
                'author'=>'required',
                'reply_content'=>'required'
            ],
            [
                'required'=>'Bạn chưa nhập :attribute'
            ],
            [
                'author'=>'Tác giả',
                'reply_content'=>'Nội dung trả lời'
            ]);
            $traloi = Traloicodong::find($ykien->Traloi->id);
            $traloi->user_id = Auth::user()->id;
            $traloi->author = $request->author;
            $traloi->reply_content = $request->reply_content;
            $traloi->save();
        }
        
        return redirect('admin/content/'.$ykien->Menu->id.'/y-kien-nha-dau-tu.html')->with('thongbao','Sửa thông tin thành công !');
    }
    public function postAdminDeleteYkien($ykien_id)
    {
        $ykien = Ykiencodong::find($ykien_id);
        if(!empty($ykien->Traloi)){
            $Traloi = Traloicodong::find($ykien->Traloi->id);
            $Traloi->delete();
        }
        $ykien->delete();
        
        return redirect()->back()->with('thongbao','Xóa thông tin thành công !');
    }
    //Đã xóa
    public function getTrash()
    {
        $ykien = Ykiencodong::orderByDesc('created_at')->onlyTrashed()->get();
        return view('admin.pages.ykien.trash',compact('ykien'));
    }
    public function postRestore($id)
    {
        $ykien = Ykiencodong::withTrashed()->find($id);
        if(!empty($ykien->Traloi_trash)){
            $traloi = Traloicodong::withTrashed()->find($ykien->Traloi_trash->id);
            $traloi->restore();
        }
        $ykien->restore();
        return redirect()->back()->with('thongbao','Khôi phục nội dung thành công !');
    }
    public function postForcedelete($id)
    {
        $ykien = Ykiencodong::withTrashed()->find($id);
        if(!empty($ykien->Traloi_trash)){
            $traloi = Traloicodong::withTrashed()->find($ykien->Traloi_trash->id);
            $traloi->forceDelete();
        }
        $ykien->forceDelete();
        
        return redirect()->back()->with('thongbao','Xóa vĩnh viễn nội dung thành công !');
    }
    //phần shared
    public function getYkiencodong($id)
    {
        $menu = Menu::find($id);
        $ykien = Ykiencodong::where('menu_id',$id)->where('status',1)->orderBy('created_at', 'desc')->paginate(5);
        $ykien_view = Ykiencodong::where('menu_id',$id)->where('status',1)->orderBy('views', 'desc')->take(5)->get();
        $danhmucykien = Danhmucykien::where('status',1)->get();
        return view('shared.pages.noidung.quanhecodong.ykiencodong',compact('menu','ykien','ykien_view','danhmucykien'));
    }
    public function postYkiencodong(Request $request,$menu_id)
    {
        $this->validate($request,[
            'ask_content'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute'
        ],
        [
            'ask_content'=>'Nội dung ý kiến'
        ]);
        $ykien = new Ykiencodong();
        $ykien->menu_id = $menu_id;
        $ykien->danhmucykien_id = $request->danhmucykien_id;
        $ykien->fullname = Auth::user()->fullname;
        $ykien->email = Auth::user()->email;
        $ykien->phone = Auth::user()->phone;
        $ykien->address = Auth::user()->address;
        $ykien->ask_content = $request->ask_content;
        $ykien->status = 0;
        $ykien->save();
        return redirect()->back()->with('thongbao','Gửi ý kiến thành công ! Nội dung đang được kiểm duyệt. ');
    }
}
