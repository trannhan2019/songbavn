@extends('admin.layouts.master')
@section('title')
    Tạo mới nội dung
@endsection
@section('content')
<div class="content-wrapper">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tạo nội dung {{ $menu_gioithieu->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="#">Nội dung</a></li>
                        <li class="breadcrumb-item active">Giới thiệu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="admin/content/{{ $menu_gioithieu->id }}/add-gioi-thieu.html" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Thuộc danh mục</label>
                            <input type="text" name="menu_id" class="form-control" readonly value="{{ $menu_gioithieu->name }}">
                        </div>

                        <div class="form-group">
                            <label>Tiêu đề <span class="text-danger">(*)</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề">
                            @if ($errors->has('title'))
                                <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="ckeditor_gt" cols="30" rows="50"></textarea>  
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
                            @if ($errors->has('status'))
                                <p class="text-danger mb-0">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <button type="reset" class="btn btn-default float-right">Reset</button>
                        </div>
                        
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script> 
    CKEDITOR.replace('ckeditor_gt',{
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