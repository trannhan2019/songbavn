@extends('admin.layouts.master')
@section('title')
    {{$menu->name}}
@endsection

@section('content')
<div class="content-wrapper">
    {{-- Content Header (Page header)--}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa thông tin Cơ cấu tổ chức</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $menu->name }}</a></li>
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
                    <form action="admin/content/{{ $menu->id }}/{{ $sub_content->id }}/edit-{{ $menu->slug }}.html" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề <span class="text-danger">(*)</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Tiêu đề" value="{{ $sub_content->title }}">
                            @if ($errors->has('title'))
                                <p class="text-danger mb-0">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" id="ckeditor_sub" cols="30" rows="50">{{ $sub_content->content }}</textarea>  
                        </div>
                        <div class="form-group">
                            <label>Thời gian khởi tạo</label>
                            <div class="input-group date" id="datetimepickerEditsub" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerEditsub" name="created_at" value="{{ $sub_content->created_at ? $sub_content->created_at->format('d/m/Y H:h'):''}}"/>
                                <div class="input-group-append" data-target="#datetimepickerEditsub" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                </div>
                            </div>                                       
                        </div>
                        <div class="form-group">
                            <p class="mb-0"><label>Trạng thái</label></p>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" {{ $sub_content->status==1 ? 'checked':'' }} name="status" value="1">Cho phép hiển thị
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" {{ $sub_content->status==0 ? 'checked':'' }} name="status" value="0">Không hiển thị
                                </label>
                            </div>
                            @if ($errors->has('status'))
                                <p class="text-danger mb-0">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <a href="admin/content/{{ $menu->id }}/{{ $menu->slug }}.html" class="btn btn-default float-right">Quay về</a>
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
    CKEDITOR.replace('ckeditor_sub'); 
</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepickerEditsub').datetimepicker({
            locale: 'vi',
            format: 'DD/MM/YYYY HH:mm'
        });
    });
</script>
@endsection