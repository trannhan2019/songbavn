<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Comment;
use App\Notifications\NewBinhluanNotification;
use App\User;

class CommentController extends Controller
{
    public function PostAdd(Request $request, $content_id)
    {
        if (Auth::check()) {
            $this->validate($request,
            [
                'content'=>'required'
            ],
            [
                'required'=>'Bạn chưa nhập :attribute'
            ],
            [
                'content'=>'Nội dung bình luận'
            ]);
            $comment = new Comment();
            $comment->content_id = $content_id;
            $comment->user_id = Auth::user()->id;
            $comment->sendername = Auth::user()->fullname;
            $comment->senderemail = Auth::user()->email;
            $comment->content = $request->content;
            $comment->save();
            $admin = User::where('role', 1)->get();
            Notification::send($admin, new NewBinhluanNotification($comment));
        } else {
            $this->validate($request,
            [
                'sendername'=> 'required|min:3|max:255',
                'senderemail'=> 'required|email',
                'content'=>'required'
            ],
            [
                'required'=>'Bạn chưa nhập :attribute',
                'min'=>':attribute phải có ít nhất :min ký tự',
                'max'=>':attribute tối đa :max ký tự',
                'email'=>':attribute chưa đúng đinh dạng'
            ],
            [
                'content'=>'Nội dung bình luận',
                'sendername'=>'Họ và tên',
                'senderemail'=>'Email'
            ]);
            $comment = new Comment();
            $comment->content_id = $content_id;
            $comment->sendername = $request->sendername;
            $comment->senderemail = $request->senderemail;
            $comment->content = $request->content;
            $comment->save();
            $admin = User::where('role', 1)->get();
            Notification::send($admin, new NewBinhluanNotification($comment));
        }
        return redirect()->back()->with('thongbao','Xin cảm ơn, nội dung bình luận đang trong trạng thái kiểm duyệt!');
        
    }
    public function getAdminList()
    {
       $comment = Comment::all();
        return view('admin.pages.comment.list',compact('comment'));
    }
    public function getAdminEdit($id)
    {
        $comment = Comment::find($id);
        return view('admin.pages.comment.edit',compact('comment'));
    }
    public function postAdminEdit(Request $request,$id)
    {
        $this->validate($request,
            [
                'sendername'=> 'required|min:3|max:255',
                'senderemail'=> 'required|email',
                'content'=>'required'
            ],
            [
                'required'=>'Bạn chưa nhập :attribute',
                'min'=>':attribute phải có ít nhất :min ký tự',
                'max'=>':attribute tối đa :max ký tự',
                'email'=>':attribute chưa đúng đinh dạng'
            ],
            [
                'content'=>'Nội dung bình luận',
                'sendername'=>'Họ và tên',
                'senderemail'=>'Email'
            ]);
            $comment = Comment::find($id);
            $comment->sendername = $request->sendername;
            $comment->senderemail = $request->senderemail;
            $comment->content = $request->content;
            $comment->status = $request->status;
            if ($request->created_at) {
                $comment->created_at = date('Y-m-d',strtotime(str_replace('/','-',$request->created_at)));
            } else {
                $comment->created_at = Carbon::now();
            }
            $comment->save();
            return redirect()->route('admin.comment.list')->with('thongbao','Sửa thông tin thành công !');
    }
    public function postAdminDelete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('admin.comment.list')->with('thongbao','Xóa thông tin thành công !');
    }
    public function getTrash()
    {
        $comment = Comment::orderByDesc('created_at')->onlyTrashed()->get();
        return view('admin.pages.comment.trash',compact('comment'));
    }
    public function postRestore($id)
    {
        $comment = Comment::withTrashed()->find($id);
        $comment->restore();
        return redirect('admin/comment/trash')->with('thongbao','Khôi phục nội dung thành công !');
    }
    public function postForcedelete($id)
    {
        $comment = Comment::withTrashed()->find($id);
        $comment->forceDelete();
        return redirect('admin/comment/trash')->with('thongbao','Xóa vĩnh viễn nội dung thành công !');
    }
    public function getThongbao($id)
    {
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
       
        return redirect()->route('admin.comment.list');
    }
}
