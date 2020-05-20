@extends('admin.layouts.master')
@section('title')
    Bình luận
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sửa: <small>Bình luận</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.comment.list') }}">Bình luận</a></li>
                            <li class="breadcrumb-item active">Sửa bình luận</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Sửa bình luận</h3>
                            </div>
                            <form action="{{ route('admin.comment.edit',$comment->id) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Người bình luận <span class="text-danger">(*)</label>
                                        <input type="text" name="sendername" class="form-control" value="{{ $comment->sendername }}">
                                        @if ($errors->has('sendername'))
                                            <p class="text-danger mb-0">{{ $errors->first('sendername') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Địa chỉ email <span class="text-danger">(*)</span></label>
                                        <input type="email" name="senderemail" class="form-control" value="{{ $comment->senderemail }}">
                                        @if ($errors->has('senderemail'))
                                            <p class="text-danger mb-0">{{ $errors->first('senderemail') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Nội dung bình luận <span class="text-danger">(*)</span></label>
                                        <textarea name="content" class="form-control" rows="5">{{ $comment->content }}</textarea>
                                        @if ($errors->has('content'))
                                            <p class="text-danger mb-0">{{ $errors->first('content') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái hiển thị <span class="text-danger">(*)</span></label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $comment->status==1 ? 'checked':'' }} name="status" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $comment->status==0 ? 'checked':'' }} name="status" value="0">Không hiển thị
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Thời gian khởi tạo</label>
                                        <div class="input-group date" id="datetimepickerEditcm" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerEditcm" name="created_at" value="{{ $comment->created_at ? $comment->created_at->format('d/m/Y H:i'):''}}"/>
                                            <div class="input-group-append" data-target="#datetimepickerEditcm" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>                                       
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <a href="{{ route('admin.comment.list') }}" class="btn btn-default float-right">Quay lại</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
		$(function () {
			$('#datetimepickerEditcm').datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY HH:mm'
			});
        });
    </script>
@endsection
