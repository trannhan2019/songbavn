@extends('admin.layouts.master')
@section('title')
    Sửa  thông tin người dùng
@endsection
@section('content')

    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sửa thông tin người dùng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.list') }}">Người dùng</a></li>
                            <li class="breadcrumb-item active">Sửa thông tin</li>
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
                              <h3 class="card-title">Sửa thông tin người dùng</h3>
                            </div>
                            <form action="{{ route('admin.user.edit',$user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Họ và tên <span class="text-danger">(*)</span></label>
                                        <input type="text" name="fullname" class="form-control" placeholder="Họ và tên" value="{{ $user->fullname }}">
                                        @if ($errors->has('fullname'))
                                            <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Tên đăng nhập <span class="text-danger">(*)</span></label>
                                        <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" value="{{ $user->username }}" readonly>
                                        @if ($errors->has('username'))
                                            <p class="text-danger mb-0">{{ $errors->first('username') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ email<span class="text-danger">(*)</span></label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly>
                                        @if ($errors->has('email'))
                                            <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="changePassword" id="changePassword">
                                        <label>Đổi mật khẩu</label>
                                        <input type="password" name="password" class="form-control password" placeholder="Mật khẩu" disabled>
                                        @if ($errors->has('password'))
                                            <p class="text-danger mb-0">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
                                        <input type="password" name="password_confirmation" class="form-control password" placeholder="Nhập lại mật khẩu" disabled>
                                        @if ($errors->has('password_confirmation'))
                                            <p class="text-danger mb-0">{{ $errors->first('password_confirmation') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh đại diện</label>
                                        <p class="mb-0">
                                            <img src="admin_asset/images/user/{{ $user->image }}" style="width:100px" alt="">
                                        </p>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div> 

                                        @if ($errors->has('image'))
                                            <p class="text-danger mb-0">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn quyền <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="role">
                                            <option value="0">Chọn quyền</option>
                                            <option value="1" {{ $user->role == 1 ? 'selected':'' }}>Quản trị</option>
                                            <option value="2" {{ $user->role == 2 ? 'selected':'' }}>Quyền cập nhật THSX</option>
                                            <option value="3" {{ $user->role == 3 ? 'selected':'' }}>Quyền cổ đông</option>
                                        </select>
                                        @if ($errors->has('role'))
                                            <p class="text-danger mb-0">{{ $errors->first('role') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái</label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $user->active==1 ? 'checked':'' }} name="active" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $user->active==0 ? 'checked':'' }} name="active" value="0">Không hiển thị
                                            </label>
                                        </div>
                                        @if ($errors->has('active'))
                                            <p class="text-danger mb-0">{{ $errors->first('active') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại </label>
                                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ $user->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <textarea class="form-control" name="address" rows="3" placeholder="Nhập thông tin ...">{{ $user->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Thông tin khác</label>
                                        <textarea class="form-control" name="info" rows="3" placeholder="Nhập thông tin khác...">{{ $user->info }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Thời gian khởi tạo</label>
                                        <div class="input-group date" id="datetimepickerEditu" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerEditu" name="created_at" value="{{ $user->created_at ? $user->created_at->format('d/m/Y H:i'):''}}"/>
                                            <div class="input-group-append" data-target="#datetimepickerEditu" data-toggle="datetimepicker">
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
            $('#datetimepickerEditu').datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY HH:mm'
			});
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if ($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection