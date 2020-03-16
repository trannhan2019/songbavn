@extends('admin.layouts.master')
@section('title')
    Thêm người dùng
@endsection
@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm mới người dùng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
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
                              <h3 class="card-title">Thêm mới người dùng</h3>
                            </div>
                            <form action="{{ route('admin.user.them') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Họ và tên <span class="text-danger">(*)</span></label>
                                        <input type="text" name="fullname" class="form-control" placeholder="Họ và tên">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên đăng nhập <span class="text-danger">(*)</span></label>
                                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ email<span class="text-danger">(*)</span></label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">(*)</span></label>
                                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
                                        <input type="password" name="passwordAgain" class="form-control" placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh đại diện</label>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                                          </div>
                                          <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn quyền <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="role">
                                            <option value="0">Chọn quyền</option>
                                            <option value="1">Quản trị</option>
                                            <option value="2">Quyền edit THSX</option>
                                            <option value="3">Quyền cổ đông</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái</label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" checked name="active" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="active" value="0">Không hiển thị
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại </label>
                                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <textarea class="form-control" name="address" rows="3" placeholder="Nhập thông tin ..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin khác</label>
                                        <textarea class="form-control" name="info" rows="3" placeholder="Nhập thông tin khác..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian khởi tạo</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control datetimepicker-input" id="datetimepicker-day" data-toggle="datetimepicker" data-target="#datetimepicker-day"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
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
    <script type="application/javascript">
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
    <script type="text/javascript">
		$(function () {
			$('#datetimepicker-day').datetimepicker({
				locale: 'vi',
			});
        });
    </script>
@endsection