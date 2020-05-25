@extends('admin.layouts.master')
@section('title')
    Sửa ý kiến
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sửa: <small>{{ $ykien->Menu->name }}</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.content.ykien',$ykien->Menu->id) }}">{{ $ykien->Menu->name }}</a></li>
                            <li class="breadcrumb-item active">Sửa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <form action="admin/content/{{ $ykien->id }}/edit-y-kien-nha-dau-tu.html" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Nội dung hỏi</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Chọn chuyên mục ý kiến <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="danhmucykien_id">
                                            <option value="">Chọn chuyên mục</option>
                                            @foreach ($danhmucykien as $dm)
                                            <option {{ $ykien->Danhmuc->id == $dm->id ? 'selected': '' }} value="{{$dm->id}}">{{ $dm->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('danhmucykien_id'))
                                            <p class="text-danger mb-0">{{ $errors->first('danhmucykien_id') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Họ và tên <span class="text-danger">(*)</span></label>
                                        <input type="text" name="fullname" class="form-control" value="{{ $ykien->fullname }}">
                                        @if ($errors->has('fullname'))
                                            <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ email <span class="text-danger">(*)</span></label>
                                        <input type="text" name="email" class="form-control" value="{{ $ykien->email }}">
                                        @if ($errors->has('email'))
                                            <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại </label>
                                        <input type="text" name="phone" class="form-control" value="{{ $ykien->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ </label>
                                        <input type="text" name="address" class="form-control" value="{{ $ykien->address }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Nội dung hỏi <span class="text-danger">(*)</span></label>
                                        <textarea name="ask_content" rows="5" id="ckeditor_ykien">{{ $ykien->ask_content }}</textarea>
                                        @if ($errors->has('ask_content'))
                                            <p class="text-danger mb-0">{{ $errors->first('ask_content') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Thời gian khởi tạo <span class="text-danger">(*)</span></label>
                                        <div class="input-group date" id="datetimepickerEditykien" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerEditykien" name="created_at" value="{{ $ykien->created_at ? $ykien->created_at->format('d/m/Y H:i'):''}}"/>
                                            <div class="input-group-append" data-target="#datetimepickerEditykien" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                        @if ($errors->has('created_at'))
                                            <p class="text-danger mb-0">{{ $errors->first('created_at') }}</p>
                                        @endif                                
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Nội dung trả lời</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tác giả <span class="text-danger">(*)</span></label>
                                        <input type="text" name="author" class="form-control" value="{{ $ykien->Traloi != null ? $ykien->Traloi->author : ''}}">
                                        @if ($errors->has('author'))
                                            <p class="text-danger mb-0">{{ $errors->first('author') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung trả lời <span class="text-danger">(*)</span></label>
                                        <textarea name="reply_content" rows="5" id="ckeditor_traloi">{{ $ykien->Traloi != null ? $ykien->Traloi->reply_content : ''}}</textarea>
                                        @if ($errors->has('reply_content'))
                                            <p class="text-danger mb-0">{{ $errors->first('reply_content') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái <span class="text-danger">(*)</span></label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $ykien->status==1 ? 'checked':'' }} name="status" value="1">Duyệt hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $ykien->status==0 ? 'checked':'' }} name="status" value="0">Không hiển thị
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <a href="admin/content/{{ $ykien->Menu->id }}/y-kien-nha-dau-tu.html" class="btn btn-default float-right">Quay về</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
		$(function () {
			$('#datetimepickerEditykien').datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY HH:mm'
			});
        });
    </script>
    <script type="text/javascript">
        var basic = [
            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-']
        ];
        CKEDITOR.replace('ckeditor_ykien', {
            toolbar: basic
          });
        CKEDITOR.config.htmlEncodeOutput = false;
        CKEDITOR.config.entities = false;
    </script>
    <script> 
        CKEDITOR.replace('ckeditor_traloi');
        CKEDITOR.config.htmlEncodeOutput = false;
        CKEDITOR.config.entities = false; 
    </script>
@endsection