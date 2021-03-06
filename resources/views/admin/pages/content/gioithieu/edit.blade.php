@extends('admin.layouts.master')
@section('title')
    Sửa nội dung
@endsection
@section('content')
<div class="content-wrapper">
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa nội dung {{ $menu->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.content.gioithieu',$menu->id) }}">{{ $menu->name }}</a></li>
                        <li class="breadcrumb-item active">Sửa thông tin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="admin/content/{{ $menu->id }}/{{ $content->id }}/edit-gioi-thieu.html" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Thuộc danh mục</label>
                            <input type="text" name="menu_id" class="form-control" readonly value="{{ $menu->name }}">
                        </div>

                        <div class="form-group">
                            <label>Tiêu đề <span class="text-danger">(*)</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề" value="{{ $content->title }}">
                            @if ($errors->has('title'))
                                <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="ckeditor_gt" cols="30" rows="50">{{ $content->content }}</textarea>  
                        </div>
                        <div class="form-group">
                            <p class="mb-0"><label>Trạng thái</label></p>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" {{ $content->status==1 ? 'checked':'' }} name="status" value="1">Cho phép hiển thị
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" {{ $content->status==0 ? 'checked':'' }} name="status" value="0">Không hiển thị
                                </label>
                            </div>
                            @if ($errors->has('status'))
                                <p class="text-danger mb-0">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Sửa</button>
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
    CKEDITOR.replace('ckeditor_gt');
    CKEDITOR.config.htmlEncodeOutput = false;
    CKEDITOR.config.entities = false;
</script>

@endsection