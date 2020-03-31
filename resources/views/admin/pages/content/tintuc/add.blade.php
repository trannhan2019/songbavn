@extends('admin.layouts.master')
@section('title')
    {{ $menu_tintuc->name }}
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tin tức: <small>{{ $menu_tintuc->name }}</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Tin tức</a></li>
                            <li class="breadcrumb-item active">{{ $menu_tintuc->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col offset-md-2">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Thêm tin tức mới</h3>
                            </div>
                            <form action="admin/content/{{ $menu_tintuc->id }}/add-tin-tuc.html" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Thuộc danh mục</label>
                                        <input type="text" name="menu_id" class="form-control" readonly value="{{ $menu_tintuc->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Tiêu đề <span class="text-danger">(*)</span></label>
                                        <input type="text" name="title" class="form-control" placeholder="Tiêu đề">
                                        @if ($errors->has('title'))
                                            <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Trích yếu <span class="text-danger">(*)</span></label>
                                        <textarea class="form-control" name="abstract" rows="3" placeholder="Trích yếu"></textarea>
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
                                          {{--  <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                          </div>  --}}
                                        </div>
                                        @if ($errors->has('imageorfile'))
                                            <p class="text-danger mb-0">{{ $errors->first('imageorfile') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Tác giả bài viết <span class="text-danger">(*)</span></label>
                                        <input type="text" name="author" class="form-control" placeholder="Tác giả bài viết">
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
                                        <div class="input-group date" id="datetimepickerCreattt" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerCreattt" data-toggle="datetimepicker" name="created_at"/>
                                            <div class="input-group-append" data-target="#datetimepickerCreattt" >
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Nội dung bài viết</label>
                                        <textarea name="content" id="ckeditor_tt" cols="30" rows="50"></textarea>  
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
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
			$('#datetimepickerCreattt').datetimepicker({
                locale: 'vi'
			});
        });
    </script>
    <script> 
        CKEDITOR.replace('ckeditor_tt',{
            filebrowserBrowseUrl: '{{ asset('admin_asset/plugins/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('admin_asset/plugins/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('admin_asset/plugins/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('admin_asset/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('admin_asset/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('admin_asset/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        }); 
    </script>
@endsection