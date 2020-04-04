<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            if(count($content)>0){
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
            if(count($content)>0){
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
    public function postAdminDelete($id)
    {
        
    }
}
