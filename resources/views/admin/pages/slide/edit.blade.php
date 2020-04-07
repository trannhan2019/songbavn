@extends('admin.layouts.master')
@section('title')
    Slide
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sửa: <small>Slide</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Slide</a></li>
                            <li class="breadcrumb-item active">Sửa slide</li>
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
                              <h3 class="card-title">Sửa slide</h3>
                            </div>
                            <form action="{{ route('admin.slide.edit',$slide->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tiêu đề hiển thị <span class="text-danger">(*)</label>
                                        <input type="text" name="title" class="form-control" value="{{ $slide->title }}">
                                        @if ($errors->has('title'))
                                            <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Hình ảnh <span class="text-danger">(*)</span></label>
                                        <img src="shared_asset/upload/images/slide/{{ $slide->image }}" alt="" style="width: 150px" class="img-fluid">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                                            </div>
                                        </div>
                                        @if ($errors->has('image'))
                                            <p class="text-danger mb-0">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Chọn vị trí <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="location" value="{{ $slide->location }}" min="1" max="100" step="1"/>
                                        @if ($errors->has('location'))
                                            <p class="text-danger mb-0">{{ $errors->first('location') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái <span class="text-danger">(*)</span></label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" checked name="status" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" value="0">Không hiển thị
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Liên kết đến bài viết <small>(Dán tiêu đề bài viết)</small></label>
                                        <input type="text" name="content_id" class="form-control" value="{{ $slide->Content ? $slide->Content->title : '' }}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Thời gian khởi tạo</label>
                                        <div class="input-group date" id="datetimepickerCreatsl" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerCreatsl" name="created_at" value="{{ $slide->created_at ? $slide->created_at->format('d/m/Y H:h'):''}}"/>
                                            <div class="input-group-append" data-target="#datetimepickerCreatsl" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>                                       
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <button type="reset" class="btn btn-default float-right">Reset</button>
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
    <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
    <script type="text/javascript">
		$(function () {
			$('#datetimepickerCreatsl').datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY HH:mm'
			});
        });
    </script>
@endsection