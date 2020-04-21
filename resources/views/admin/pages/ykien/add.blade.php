@extends('admin.layouts.master')
@section('title')
    Thêm mới ý kiến
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm: <small>Ý kiến nhà đầu tư</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Ý kiến</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
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
                              <h3 class="card-title">Thêm mới ý kiến</h3>
                            </div>
                            <form action="admin/content/{{ $menu->id }}/add-y-kien-nha-dau-tu.html" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Chọn chuyên mục ý kiến <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="danhmucykien_id">
                                            <option value="">Chọn chuyên mục</option>
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
                                        <label>Địa chỉ email <span class="text-danger">(*)</span></label>
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
                                        <label>Nội dung hỏi <span class="text-danger">(*)</span></label>
                                        <textarea name="ask_content" rows="5" id="ckeditor_ykien"></textarea>
                                        @if ($errors->has('ask_content'))
                                            <p class="text-danger mb-0">{{ $errors->first('ask_content') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Thời gian khởi tạo <span class="text-danger">(*)</span></label>
                                        <div class="input-group date" id="datetimepickerCreatykien" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerCreatykien" name="created_at"/>
                                            <div class="input-group-append" data-target="#datetimepickerCreatykien" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                        @if ($errors->has('created_at'))
                                            <p class="text-danger mb-0">{{ $errors->first('created_at') }}</p>
                                        @endif                                
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái <span class="text-danger">(*)</span></label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" checked name="status" value="0">Không hiển thị
                                            </label>
                                        </div>
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
    <script type="text/javascript">
		$(function () {
			$('#datetimepickerCreatykien').datetimepicker({
                
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
    </script>
@endsection
