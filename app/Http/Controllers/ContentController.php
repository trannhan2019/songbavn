<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\Content;
use App\Danhmucykien;
use App\Ykiencodong;

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
        $content_tintuc = $menu_tintuc->Contents->sortByDesc('created_at');
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
            while(file_exists('shared_asset/upload/images/content/tintuc/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/tintuc/',$hinh);
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
        return redirect('admin/content/'.$menu_id.'/tin-tuc.html')->with('thongbao','Thêm tin tức thành công !');
    }
    public function getAdminDetailTintuc($tintuc_id)
    {
        $content = Content::find($tintuc_id);
        return view('admin.pages.content.tintuc.detail',compact('content'));
    }

    public function getAdminEditTintuc($tintuc_id)
    {
        $tintuc = Content::find($tintuc_id);
        return view('admin.pages.content.tintuc.edit',compact('tintuc'));
    }
    public function postAdminEditTintuc(Request $request,$tintuc_id)
    {
        $this->validate($request,
        [
            'title'=> 'required',
            'abstract'=> 'required',
            'author'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute'
        ],
        [
            'title'=>'Tiêu đề',
            'abstract'=>'Trích yếu',
            'author'=>'Tác giả bài viết'
        ]);
        $tintuc = Content::find($tintuc_id);
        $tintuc->title = $request->title;
        $tintuc->slug = str::slug($request->title,'-');
        $tintuc->abstract = $request->abstract;
        $tintuc->highlights = $request->highlights;
        $tintuc->notification = $request->notification;
        if($request->hasFile('imageorfile')){
            $this->validate($request,
            [
                'imageorfile'=>'image'
            ],
            [
                'imageorfile'=>':attribute không đúng định dạng'
            ],
            [
                'imageorfile'=>'Ảnh minh họa'
                
            ]);
            $file = $request->file('imageorfile');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists('shared_asset/upload/images/content/tintuc/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/tintu/c',$hinh);
            if($tintuc->imageorfile){
                unlink('shared_asset/upload/images/content/tintuc/'.$tintuc->imageorfile);
            }
            
            $tintuc->imageorfile = $hinh;
            
        }
        $tintuc->author = $request->author;
        $tintuc->source = $request->source;
        $tintuc->status = $request->status;
        if ($request->created_at) {
            $tintuc->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $tintuc->created_at = null;
        }
        $tintuc->content = $request->content;
        $tintuc->user_id = Auth::user()->id;
        $tintuc->save();
        return redirect('admin/content/'.$tintuc->menu_id.'/tin-tuc.html')->with('thongbao','Sửa tin tức thành công !');
    }
    public function postAdminDeleteTintuc($tintuc_id)
    {
        $tintuc = Content::find($tintuc_id);
        $tintuc->delete();
        
        return redirect('admin/content/'.$tintuc->menu_id.'/tin-tuc.html')->with('thongbao','Xóa tin tức thành công !');
    }

    //Quan hệ cổ đông
    public function getAdminCodong($menu_id)
    {
        $menu = Menu::find($menu_id);
        $codong = $menu->Contents->sortByDesc('created_at');
        return view('admin.pages.content.codong.list',compact('menu','codong'));
    }
    public function getAdminAddCodong($menu_id)
    {
        $menu = Menu::find($menu_id);
        return view('admin.pages.content.codong.add',compact('menu'));
    }
    public function postAdminAddCodong(Request $request, $menu_id)
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
            while(file_exists('shared_asset/upload/images/content/codong/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/codong/',$hinh);
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
        return redirect('admin/content/'.$menu_id.'/quan-he-co-dong.html')->with('thongbao','Thêm thông tin thành công !');
    }
    public function getAdminDetailCodong($content_id)
    {
        $content = Content::find($content_id);
        return view('admin.pages.content.codong.detail',compact('content'));
    }
    public function getAdminEditCodong($content_id)
    {
        $content = Content::find($content_id);
        return view('admin.pages.content.codong.edit',compact('content'));
    }
    public function postAdminEditCodong(Request $request,$content_id)
    {
        $this->validate($request,
        [
            'title'=> 'required',
            'abstract'=> 'required',
            'author'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute'
        ],
        [
            'title'=>'Tiêu đề',
            'abstract'=>'Trích yếu',
            'author'=>'Tác giả bài viết'
        ]);
        $content = Content::find($content_id);
        $content->title = $request->title;
        $content->slug = str::slug($request->title,'-');
        $content->abstract = $request->abstract;
        $content->highlights = $request->highlights;
        $content->notification = $request->notification;
        if($request->hasFile('imageorfile')){
            $this->validate($request,
            [
                'imageorfile'=>'image'
            ],
            [
                'imageorfile'=>':attribute không đúng định dạng'
            ],
            [
                'imageorfile'=>'Ảnh minh họa'
                
            ]);
            $file = $request->file('imageorfile');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists('shared_asset/upload/images/content/codong/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/codong/',$hinh);
            if($content->imageorfile){
                unlink('shared_asset/upload/images/content/codong/'.$content->imageorfile);
            }
            
            $content->imageorfile = $hinh;
            
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
        return redirect('admin/content/'.$content->menu_id.'/quan-he-co-dong.html')->with('thongbao','Sửa thông tin thành công !');
    }
    public function postAdminDeleteCodong($content_id)
    {
        $content = Content::find($content_id);
        $content->delete();
        
        return redirect('admin/content/'.$content->menu_id.'/quan-he-co-dong.html')->with('thongbao','Xóa thông tin thành công !');
    }
    //Ý kiến 
    public function getAdminYkien ($menu_id)
    {
        $menu = Menu::find($menu_id);
        $ykien = Ykiencodong::orderBy('created_at','desc')->get();
        return view('admin.pages.content.codong.list_ykien',compact('menu','ykien'));
    }
    public function getAdminDanhmucYkien()
    {
        $listdanhmuc = Danhmucykien::all();
        return view('admin.pages.content.codong.danhmuc',compact('listdanhmuc'));
    }
    public function postAdminAddDanhmucYkien(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|min:3|max:255',
            'status'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'name'=>'Tên danh mục',
            'status'=>'Trạng thái'
        ]);
        $dmykien = new Danhmucykien();
        $dmykien->name = $request->name;
        $dmykien->slug = str::slug($request->name,'-');
        $dmykien->status = $request->status;
        $dmykien->save();
        return redirect('admin/content/danh-muc-y-kien.html')->with('thongbao','Tạo danh mục thành công !');
    }
    public function postAdminEditDanhmucYkien(Request $request, $dm_id)
    {
        $this->validate($request,[
            'name'=> 'required|min:3|max:255',
            'status'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'min'=>':attribute phải có ít nhất :min ký tự',
            'max'=>':attribute tối đa :max ký tự'
        ],
        [
            'name'=>'Tên danh mục',
            'status'=>'Trạng thái'
        ]);
        $dmykien = Danhmucykien::find($dm_id);
        $dmykien->name = $request->name;
        $dmykien->slug = str::slug($request->name,'-');
        $dmykien->status = $request->status;
        $dmykien->save();
        return redirect('admin/content/danh-muc-y-kien.html')->with('thongbao','Sửa danh mục thành công !');
    }
    public function postAdminDeleteDanhmucYkien($dm_id)
    {
        $dmykien = Danhmucykien::find($dm_id);
        $dmykien->delete();
        return redirect('admin/content/danh-muc-y-kien.html')->with('thongbao','Xóa danh mục thành công !');
    }

    //Tuyển dụng
    public function getAdminTuyendung($menu_id)
    {
        $menu = Menu::find($menu_id);
        $content = $menu->Contents->sortByDesc('created_at');
        return view('admin.pages.content.tuyendung.list',compact('menu','content'));
    }
    public function getAdminAddTuyendung($menu_id)
    {
        $menu = Menu::find($menu_id);
        return view('admin.pages.content.tuyendung.add',compact('menu'));
    }
    public function postAdminAddTuyendung(Request $request, $menu_id)
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
            while(file_exists('shared_asset/upload/images/content/tuyendung/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/tuyendung/',$hinh);
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
        return redirect('admin/content/'.$menu_id.'/tuyen-dung.html')->with('thongbao','Thêm thông tin thành công !');
    }
    public function getAdminDetailTuyendung($content_id)
    {
        $content = Content::find($content_id);
        return view('admin.pages.content.tuyendung.detail',compact('content'));
    }
    public function getAdminEditTuyendung($content_id)
    {
        $content = Content::find($content_id);
        return view('admin.pages.content.tuyendung.edit',compact('content'));
    }
    public function postAdminEditTuyendung(Request $request,$content_id)
    {
        $this->validate($request,
        [
            'title'=> 'required',
            'abstract'=> 'required',
            'author'=>'required'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute'
        ],
        [
            'title'=>'Tiêu đề',
            'abstract'=>'Trích yếu',
            'author'=>'Tác giả bài viết'
        ]);
        $content = Content::find($content_id);
        $content->title = $request->title;
        $content->slug = str::slug($request->title,'-');
        $content->abstract = $request->abstract;
        $content->highlights = $request->highlights;
        $content->notification = $request->notification;
        if($request->hasFile('imageorfile')){
            $this->validate($request,
            [
                'imageorfile'=>'image'
            ],
            [
                'imageorfile'=>':attribute không đúng định dạng'
            ],
            [
                'imageorfile'=>'Ảnh minh họa'
                
            ]);
            $file = $request->file('imageorfile');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists('shared_asset/upload/images/content/tuyendung/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/tuyendung/',$hinh);
            if($content->imageorfile){
                unlink('shared_asset/upload/images/content/tuyendung/'.$content->imageorfile);
            }
            
            $content->imageorfile = $hinh;
            
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
        return redirect('admin/content/'.$content->menu_id.'/tuyen-dung.html')->with('thongbao','Sửa thông tin thành công !');
    }
    public function postAdminDeleteTuyendung($content_id)
    {
        $content = Content::find($content_id);
        $content->delete();
        
        return redirect('admin/content/'.$content->menu_id.'/tuyen-dung.html')->with('thongbao','Xóa thông tin thành công !');
    }

    //LIÊN HỆ
    public function getAdminLienhe($menu_id)
    {
        $menu = Menu::find($menu_id);
        return view('admin.pages.content.lienhe',compact('menu'));
    }

    //Đã xóa
    public function getTrash()
    {
        $contents = Content::orderByDesc('created_at')->onlyTrashed()->get();
        return view('admin.pages.content.trash',compact('contents'));
    }
    public function getRestore($id)
    {
        $content = Content::withTrashed()->find($id);
        $content->restore();
        return redirect('admin/content/trash')->with('thongbao','Khôi phục nội dung thành công !');
    }
    public function postForcedelete($id)
    {
        $content = Content::withTrashed()->find($id);
        $content->forceDelete();
        if($content->imageorfile){
            unlink('admin_asset/images/user/'.$content->imageorfile);
        }
        return redirect('admin/content/trash')->with('thongbao','Xóa vĩnh viễn nội dung thành công !');
    }
}
