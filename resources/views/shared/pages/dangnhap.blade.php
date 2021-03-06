@extends('shared.layouts.master')
@section('title')
    Đăng nhập
@endsection

@section('content')
<div class="py-5" style="background-color: #e9ecef; height: 400px;">
    <div class="mx-auto" style="max-width: 400px">
      @if (session('loi'))
      @include('shared.layouts.loi')
      @endif
      @if (session('thongbao'))
          @include('shared.layouts.thongbao')
      @endif 
        <div class="card">
          <div class="card-body login-card-body">
            <h5 class="text-info mb-3 text-center">Đăng nhập thông tin</h5>
      
            <form action="{{ route('dangnhap') }}" method="post">
            @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Tên đăng nhập hoặc email" name="username" value="{{ old('username') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('username'))
                    <p class="text-danger">{{ $errors->first('username') }}</p>
                @endif
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>   
              </div>
              @if ($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
              <div class="row">
                <div class="col-7">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember"
                    <label for="remember">
                      Ghi nhớ đăng nhập
                    </label>
                  </div>
                </div>
                {{--  <!-- /.col -->  --}}
                <div class="col-5">
                  <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                </div>
                {{--  <!-- /.col -->  --}}
              </div>
            </form>
      
            <p class="mb-1">
              <a href="{{ route('dangky') }}" class="text-primary">Đăng ký tài khoản</a>
            </p>
            <p class="mb-0">
              <a href="{{ route('password.request') }}" class="text-center text-danger">Quên mật khẩu?</a>
            </p>
          </div>
          {{--  <!-- /.login-card-body -->  --}}
        </div>
    </div>
</div>

@endsection