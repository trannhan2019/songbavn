<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\Content;

class ContentController extends Controller
{
    //Giới thiệu
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

    //Tin tức
    public function getAdminTintuc($menu_id)
    {
        $menu_tintuc = Menu::find($menu_id);
        $content_tintuc = $menu_tintuc->Contents()->where('status',1)->get();
        return view('admin.pages.content.tintuc.list',compact('menu_tintuc','content_tintuc'));
    }
    public function getAdminAddTintuc($menu_id)
    {
        $menu_tintuc = Menu::find($menu_id);
        return view('admin.pages.content.tintuc.add',compact('menu_tintuc'));
    }
    public function postAdminAddTintuc(Request $request, $menu_id)
    {
        $this->validate($request,
        [
            'title'=> 'required',
            'abstract'=> 'required',
            'imageorfile'=>'image',
            'author'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'image'=>':attribute không đúng định dạng'
        ],
        [
            'title'=>'Tiêu đề',
            'abstract'=>'Trích yếu',
            'imageorfile'=>'Hình minh họa',
            'author'=>'Tác giả bài viết'
        ]);
        $content = new Content;
        $content->menu_id = $menu_id;
        $content->title = $request->title;
        $content->slug = str::slug($request->title,'-');
        $content->abstract = $request->abstract;
        $content->highlights = $request->highlights;
        $content->notification = $request->notification;
        if ($request->hasFile('imageorfile')) {
            $file = $request->file('imageorfile');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists('admin_asset/images/content/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('admin_asset/images/content/',$hinh);
            $content->imageorfile = $hinh;
        } else {
            $content->imageorfile = null;
        }
        $content->author = $request->author;
        $content->source = $request->source;
        $content->status = $request->status;
        if ($request->created_at) {
            $content->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $content->created_at = null;
        }
        $content->content = $request->content;
        $content->user_id = Auth::user()->id;
        $content->save();
        return redirect('admin/content/{{$menu_id}}/tin-tuc.html')->with('thongbao','Thêm tin tức thành công !');
        
    }
}
