@extends('admin.layouts.master')
@section('title')
    Thêm ý kiến
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm: <small>ý kiến </small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="#">Ý kiến nhà đầu tư</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
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
                            <h3 class="card-title">Thêm ý kiến mới</h3>
                        </div>
                        <form action="admin/content/{{ $menu->id }}/add-y-kien-nha-dau-tu.html" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Chọn chuyên mục ý kiến <span class="text-danger">(*)</span></label>
                                    <select class="form-control" name="danhmucykien_id">
                                        <option value="">Xin chọn chuyên mục</option>
                                        @foreach ($danhmucykien as $dm)
                                        <option value="{{$dm->id}}">{{ $dm->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('danhmucykien_id'))
                                        <p class="text-danger mb-0">{{ $errors->first('danhmucykien_id') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Họ và tên <span class="text-danger">(*)</span></label>
                                    <input type="text" name="fullname" class="form-control">
                                    @if ($errors->has('fullname'))
                                        <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ email </label>
                                    <input type="text" name="email" class="form-control">
                                    @if ($errors->has('email'))
                                        <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại </label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ </label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea name="ask_content" id="ckeditor_askykien" cols="30" rows="50"></textarea>  
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <button type="reset" class="btn btn-default float-right">Reset</button
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
<script> 
    CKEDITOR.replace('ckeditor_askykien')
</script>
@endsection