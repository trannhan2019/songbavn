<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\Content;

class ContentController extends Controller
{
    public function getAdminGioithieu($id)
    {
        $menu_gioithieu = Menu::find($id);
        $content_gioithieu = $menu_gioithieu->Contents()->where('status',1)->first();
        return view('admin.pages.content.gioithieu.detail',compact('menu_gioithieu','content_gioithieu'));
    }

    public function getAdminEditGioithieu($menu_id,$content_id)
    {
        $menu_gioithieu = Menu::find($menu_id);
        $content = Content::find($content_id);
        return view('admin.pages.content.gioithieu.edit',compact('menu_gioithieu','content'));
    }
    public function postAdminEditGioithieu(Request $request, $menu_id,$content_id)
    {
        $this->validate($request,
        [
            'title'=> 'required|min:3|max:32',
            'status'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'title'=>'Tiêu đề',
            'status'=>'Trạng thái'
            
        ]);
        $content = Content::find($content_id);
        $content->title = $request->title;
        $content->slug = str::slug($request->title,'-');
        $content->content = $request->content;
        $content->status = $request->status;
        $content->user_id = Auth::user()->id;
        $content->save();
        return redirect('admin/content/'.$menu_id. '/gioi-thieu.html')->with('thongbao','Sửa thông tin thành công !');
    }


    public function getAdminAddGioithieu($menu_id)
    {
        $menu_gioithieu = Menu::find($menu_id);
        return view('admin.pages.content.gioithieu.add',compact('menu_gioithieu'));
    }
    public function postAdminAddGioithieu(Request $request,$menu_id)
    {
        $this->validate($request,
        [
            'title'=> 'required|min:3|max:32',
            'status'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'title'=>'Tiêu đề',
            'status'=>'Trạng thái'
            
        ]);
        $content = new Content;
        $content->menu_id = $menu_id;
        $content->title = $request->title;
        $content->slug = str::slug($request->title,'-');
        $content->content = $request->content;
        $content->status = $request->status;
        $content->user_id = Auth::user()->id;
        $content->save();
        return redirect('admin/content/'.$menu_id. '/gioi-thieu.html')->with('thongbao','Tạo thông tin thành công !');
    }

    public function getAdminCocautochuc($menu_id)
    {
        $menu_gioithieu = Menu::find($menu_id);
        return view('admin.pages.content.gioithieu.cocau_dieuhanh',compact('menu_gioithieu'));
    }
    public function getAdminCocautochuc_phongban($menu_id)
    {
        $menu_gioithieu = Menu::find($menu_id);
        return view('admin.pages.content.gioithieu.cocau_phongban',compact('menu_gioithieu'));
    }
}
