@extends('admin.layouts.master')
@section('title')
    Sửa thông tin
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sửa thông tin: <small>{{ $content->Menu->name }}</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Nội dung</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $content->Menu->Parent->name }}</a></li>
                            <li class="breadcrumb-item active">{{ $content->Menu->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Sửa nội dung</h3>
                            </div>
                            <form action="admin/content/{{ $content->id }}/edit-tuyen-dung.html" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Thuộc danh mục</label>
                                        <input type="text" name="menu_id" class="form-control" readonly value="{{ $content->Menu->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Tiêu đề <span class="text-danger">(*)</span></label>
                                        <input type="text" name="title" class="form-control" placeholder="Tiêu đề" value="{{ $content->title }}">
                                        @if ($errors->has('title'))
                                            <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Trích yếu <span class="text-danger">(*)</span></label>
                                        <textarea class="form-control" name="abstract" rows="4" placeholder="Trích yếu">{{ $content->abstract}}</textarea>
                                        @if ($errors->has('abstract'))
                                            <p class="text-danger mb-0">{{ $errors->first('abstract') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Hiển thị tại trang chủ</label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="highlights" value="1">Nổi bật đầu trang chủ
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" checked name="highlights" value="0">Hiển thị tại danh mục
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Hiển thị tại trang Thông báo</label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="notification" value="1">Có hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" checked name="notification" value="0">Không hiển thị
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh minh họa</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="imageorfile" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                                            </div>

                                        </div>
                                        @if ($errors->has('imageorfile'))
                                            <p class="text-danger mb-0">{{ $errors->first('imageorfile') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Tác giả bài viết <span class="text-danger">(*)</span></label>
                                        <input type="text" name="author" class="form-control" placeholder="Tác giả bài viết" value="{{ $content->author }}">
                                        @if ($errors->has('author'))
                                            <p class="text-danger mb-0">{{ $errors->first('author') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Nguồn bài viết </label>
                                        <select class="form-control" name="source">
                                            <option>Tự biên soạn</option>
                                            <option>Trích từ nguồn khác</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái</label></p>
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
                                        <label>Thời gian khởi tạo</label>
                                        <div class="input-group date" id="datetimepickerCreattd" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerCreattd" name="created_at" value="{{ $content->created_at ? $content->created_at->format('d/m/Y H:h'):''}}"/>
                                            <div class="input-group-append" data-target="#datetimepickerCreattd" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>                                      
                                    </div>

                                    <div class="form-group">
                                        <label>Nội dung bài viết</label>
                                        <textarea name="content" id="ckeditor_td" cols="30" rows="50">{{ $content->content }}</textarea>  
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
			$('#datetimepickerCreattd').datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY HH:mm'
			});
        });
    </script>
    <script> 
        CKEDITOR.replace('ckeditor_td',{
            filebrowserBrowseUrl: '{{ asset('admin_asset/plugins/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('admin_asset/plugins/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('admin_asset/plugins/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('admin_asset/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('admin_asset/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('admin_asset/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
            height: '600px'
        }); 
    </script>
@endsection