<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Menu;
use App\Content;
use App\Danhmucykien;
use App\Ykiencodong;

class ContentController extends Controller
{
    //Giới thiệu
    public function getAdminGioithieu($menu_id)
    {
        $menu_gioithieu = Menu::find($menu_id);
        if (empty($menu_gioithieu->Parent)) {
            $gioithieuchung = Menu::where('slug','gioi-thieu-chung')->first();
            
            $content_gioithieu = $gioithieuchung->Contents->where('status',1)->first();
        } else {
            $content_gioithieu = $menu_gioithieu->Contents->where('status',1)->first();
        }
        // $content_gioithieu = $menu_gioithieu->Contents()->where('status',1)->first();
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
    //Giới thiệu ->sub
    public function getAdminSubgioithieu($menu_id)
    {
        $menu = Menu::find($menu_id);
        $content = $menu->Contents()->orderBy('created_at')->get();
        $sub_content = $menu->Contents()->orderBy('created_at')->first();
        return view('admin.pages.content.gioithieu.sub',compact('menu','content','sub_content'));
    }
    public function getAdminAddSubgioithieu($menu_id)
    {
        $menu = Menu::find($menu_id);
        return view('admin.pages.content.gioithieu.addsub',compact('menu'));
    }
    public function postAdminAddSubgioithieu(Request $request, $menu_id)
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
        $menu = Menu::find($menu_id);
        $content->menu_id = $menu_id;
        $content->title = $request->title;
        $content->slug = str::slug($request->title,'-');
        $content->content = $request->content;
        $content->status = $request->status;
        if ($request->created_at) {
            $content->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $content->created_at = Carbon::now();
        }
        $content->user_id = Auth::user()->id;
        $content->save();
        return redirect('admin/content/'.$menu_id. '/'.$menu->slug.'.html')->with('thongbao','Tạo thông tin thành công !');
    }
    public function getAdminDetailSubgioithieu($menu_id,$content_id)
    {
        $menu = Menu::find($menu_id);
        $content = $menu->Contents()->orderBy('created_at')->get();
        $sub_content = Content::find($content_id);
        return view('admin.pages.content.gioithieu.sub',compact('menu','content','sub_content'));
    }

    public function getAdminEditSubgioithieu($menu_id,$content_id)
    {
        $menu = Menu::find($menu_id);
        $sub_content = Content::find($content_id);
        return view('admin.pages.content.gioithieu.editsub',compact('menu','sub_content'));
    }
    public function postAdminEditSubgioithieu(Request $request,$menu_id,$content_id)
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
        $menu = Menu::find($menu_id);
        $content->title = $request->title;
        $content->slug = str::slug($request->title,'-');
        $content->content = $request->content;
        $content->status = $request->status;
        if ($request->created_at) {
            $content->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $content->created_at = Carbon::now();
        }
        $content->user_id = Auth::user()->id;
        $content->save();
        return redirect('admin/content/'.$menu_id. '/'.$menu->slug.'.html')->with('thongbao','Sửa thông tin thành công !');
    }


    //Tin tức
    public function getAdminTintuc($menu_id)
    {
        $menu_tintuc = Menu::find($menu_id);
        if (empty($menu_tintuc->Parent)) {
            $menu_content = Menu::where('slug','thong-tin-hoat-dong')->first();
            $content_tintuc = $menu_content->Contents->sortByDesc('created_at');
            
        } else {
            $content_tintuc = $menu_tintuc->Contents->sortByDesc('created_at');
        }
        
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
            while(file_exists('shared_asset/upload/images/content/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/',$hinh);
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
            $content->created_at = Carbon::now();
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
            while(file_exists('shared_asset/upload/images/content/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/',$hinh);
            if($tintuc->imageorfile){
                unlink('shared_asset/upload/images/content/'.$tintuc->imageorfile);
            }
            
            $tintuc->imageorfile = $hinh;
            
        }
        $tintuc->author = $request->author;
        $tintuc->source = $request->source;
        $tintuc->status = $request->status;
        if ($request->created_at) {
            $tintuc->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $tintuc->created_at = Carbon::now();
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
            while(file_exists('shared_asset/upload/images/content/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/',$hinh);
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
            $content->created_at = Carbon::now();
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
            while(file_exists('shared_asset/upload/images/content/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/',$hinh);
            if($content->imageorfile){
                unlink('shared_asset/upload/images/content/'.$content->imageorfile);
            }
            
            $content->imageorfile = $hinh;
            
        }
        $content->author = $request->author;
        $content->source = $request->source;
        $content->status = $request->status;
        if ($request->created_at) {
            $content->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $content->created_at = Carbon::now();
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
    
    

    //Tuyển dụng
    public function getAdminTuyendung($menu_id)
    {
        $menu = Menu::find($menu_id);
        if (empty($menu->Parent)) {
            $menu_content = Menu::where('slug','tin-tuyen-dung')->first();
            $content = $menu_content->Contents->sortByDesc('created_at');
            
        } else {
            $content = $menu->Contents->sortByDesc('created_at');
        }
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
            while(file_exists('shared_asset/upload/images/content/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/',$hinh);
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
            $content->created_at = Carbon::now();
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
            while(file_exists('shared_asset/upload/images/content/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/content/',$hinh);
            if($content->imageorfile){
                unlink('shared_asset/upload/images/content/'.$content->imageorfile);
            }
            
            $content->imageorfile = $hinh;
            
        }
        $content->author = $request->author;
        $content->source = $request->source;
        $content->status = $request->status;
        if ($request->created_at) {
            $content->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $content->created_at = Carbon::now();
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
        $content = $menu->Contents()->where('status',1)->first();
        return view('admin.pages.content.lienhe.detail',compact('menu','content'));
    }
    public function getAdminAddLienhe($menu_id)
    {
        $menu = Menu::find($menu_id);
        return view('admin.pages.content.lienhe.add',compact('menu'));
    }
    public function postAdminAddLienhe(Request $request, $menu_id)
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
        return redirect('admin/content/'.$menu_id. '/lien-he.html')->with('thongbao','Tạo thông tin thành công !');
    }
    public function getAdminEditLienhe($menu_id,$content_id)
    {
        $menu = Menu::find($menu_id);
        $content = Content::find($content_id);
        return view('admin.pages.content.lienhe.edit',compact('menu','content'));
    }
    
    public function postAdminEditLienhe(Request $request,$menu_id,$content_id)
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
        return redirect('admin/content/'.$menu_id. '/lien-he.html')->with('thongbao','Sửa thông tin thành công !');
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
