<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Slide;
use App\Content;

class SlideController extends Controller
{
    public function getAdminList()
    {
        $slide = Slide::all();
        return view('admin.pages.slide.list',compact('slide'));
    }
    public function getAdminAdd()
    {
        return view('admin.pages.slide.add');
    }
    public function postAdminAdd(Request $request)
    {
        $this->validate($request,
        [
            'title'=>'required',
            'image'=> 'required|image',
            'location'=> 'required|integer'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'image'=>':attribute không đúng định dạng',
            'integer'=>':attribute không phải kiểu số nguyên'
        ],
        [
            'title'=>'Tiêu đề',
            'location'=>'Vị trí',
            'image'=>'Hình ảnh'
        ]);
        $slide = new Slide;
        $slide->title = $request->title;

        $slide->location = $request->location;
        $slide->Active = $request->status;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists('shared_asset/upload/images/slide/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/slide/',$hinh);
            $slide->image = $hinh;
        } else {
            $slide->image = null;
        }

        if($request->content_id){
            $content_slug = str::slug($request->content_id,'-');
            $content = Content::where('slug',$content_slug)->first();
            if($content){
                $slide->content_id = $content->id;
            }
            else{
                return redirect('admin/slide/list')->with('loi','Nội dung liên kết không có, xin chọn liên kết khác.');
            }
        }
        else{
            $slide->content_id = null;
        }

        if ($request->created_at) {
            $slide->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $slide->created_at = null;
        }
        $slide->save();
        return redirect('admin/slide/list')->with('thongbao','Thêm thông tin thành công !');
    }
    public function getAdminEdit($id)
    {
        $slide = Slide::find($id);
        return view('admin.pages.slide.edit',compact('slide'));
    }
    public function postAdminEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'title'=>'required',
            'location'=> 'required|integer'
        ],
        [
            'required'=>'Bạn chưa nhập :attribute',
            'integer'=>':attribute không phải kiểu số nguyên'
        ],
        [
            'title'=>'Tiêu đề',
            'location'=>'Vị trí'
        ]);
        $slide = Slide::find($id);
        $slide->title = $request->title;

        $slide->location = $request->location;
        $slide->Active = $request->status;

        if ($request->hasFile('image')) {
            $this->validate($request,
            [
                'image'=>'image'
            ],
            [
                'image'=>':attribute không đúng định dạng'
            ],
            [
                'image'=>'Hình ảnh'

            ]);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists('shared_asset/upload/images/slide/'.$hinh))
            {
                $hinh = Str::random(4)."_".$name;
            }
            $file->move('shared_asset/upload/images/slide/',$hinh);
            if($slide->image){
                unlink('shared_asset/upload/images/slide/'.$slide->image);
            }
            $slide->image = $hinh;
        }

        if($request->content_id){
            $content_slug = str::slug($request->content_id,'-');
            $content = Content::where('slug',$content_slug)->first();
            if($content){
                $slide->content_id = $content->id;
            }
            else{
                return redirect('admin/slide/list')->with('loi','Nội dung liên kết không có, xin chọn liên kết khác.');
            }
        }
        else{
            $slide->content_id = null;
        }

        if ($request->created_at) {
            $slide->created_at = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$request->created_at)));
        } else {
            $slide->created_at = Carbon::now();
        }
        $slide->save();
        return redirect('admin/slide/list')->with('thongbao','Sửa thông tin thành công !');
    }
    public function postAdminDelete($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return redirect()->route('admin.slide.list')->with('thongbao','Xóa thông tin thành công !');
    }
    //Đã xóa
    public function getTrash()
    {
        $slide = Slide::orderByDesc('created_at')->onlyTrashed()->get();
        return view('admin.pages.slide.trash',compact('slide'));
    }
    public function postRestore($id)
    {
        $slide = Slide::withTrashed()->find($id);
        $slide->restore();
        return redirect('admin/slide/trash')->with('thongbao','Khôi phục nội dung thành công !');
    }
    public function postForcedelete($id)
    {
        $slide = Slide::withTrashed()->find($id);
        $slide->forceDelete();
        if($slide->image){
            unlink('shared_asset/upload/images/slide/'.$slide->image);
        }
        return redirect('admin/slide/trash')->with('thongbao','Xóa vĩnh viễn nội dung thành công !');
    }
}
