@extends('shared.layouts.master')
@section('title')
    Thay đổi thông tin
@endsection

@section('content')
    <div class="container" style="background-color: #e9ecef">
        <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="card my-4">
                <form action="{{ route('thongtin') }}" method="post">
                  @csrf
                  <div class="card-header">
                    <h4 class="card-title text-center mb-0">Thay đổi thông tin người dùng</h4>
                  </div>
                  <div class="card-body login-card-body">
  
                    <div class="form-group">
                      <label>Tên đăng nhập</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" value="{{ $user->username }}" readonly>
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="fas fa-user"></i>
                            </div>
                        </div>
                      </div>
                      @if ($errors->has('username'))
                          <p class="text-danger">{{ $errors->first('username') }}</p>
                      @endif
                    </div>

                    <div class="form-group">
                        <label>Địa chỉ email</label>
                        <div class="input-group">
                          <input type="email" class="form-control" placeholder="Địa chỉ email" name="email" value="{{ $user->email }}" readonly>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="far fa-envelope"></i>
                            </div>
                          </div>
                        </div>
                        @if ($errors->has('email'))
                          <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
              
                    <div class="form-group">
                        <label>Họ và tên <span class="text-danger">(*)</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Họ và tên" name="fullname" value="{{ $user->fullname }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                  <i class="far fa-id-card"></i>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('fullname'))
                              <p class="text-danger">{{ $errors->first('fullname') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="changePassword" id="changePassword">
                        <label>Đổi mật khẩu</label>
                        
                        <div class="input-group">
                            <input type="password" class="form-control password" placeholder="Nhập mật khẩu" name="password" disabled>
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                            </div>
                      </div>
                      @if ($errors->has('password'))
                      <p class="text-danger">{{ $errors->first('password') }}</p>
                      @endif
                    </div> 
                    
                    <div class="form-group">
                      <label>Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
                      <div class="input-group">
                        <input type="password" class="form-control password" placeholder="Nhập lại mật khẩu" name="password_confirmation" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      @if ($errors->has('password_confirmation'))
                      <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                      @endif
                    </div>
  
                    <div class="form-group">
                      <label>Số điện thoại <span class="text-danger">(*)</span></label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" value="{{ $user->phone }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="fas fa-mobile-alt"></i>
                          </div>
                        </div>
                      </div>
                      @if ($errors->has('phone'))
                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                      @endif
                    </div>
  
                    <div class="form-group">
                      <label>Địa chỉ <span class="text-danger">(*)</span></label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Địa chỉ" name="address" value="{{ $user->address }}">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                          </div>
                        </div>
                      </div>
                      @if ($errors->has('address'))
                      <p class="text-danger">{{ $errors->first('address') }}</p>
                      @endif
                    </div>
                      
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                    <button type="reset" class="btn btn-info float-right">Reset</button>
                  </div>
                </form>
              </div>
                
          </div>
      </div>
  </div>
@endsection
@section('script')
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