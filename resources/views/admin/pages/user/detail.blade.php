@extends('admin.layouts.master')
@section('title')
    Chi tiết người dùng
@endsection
@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Chi tiết người dùng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.list') }}">Người dùng</a></li>
                            <li class="breadcrumb-item active">Chi tiết</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col offset-md-2 d-flex align-items-stretch">
                        <div class="card bg-light w-100">
                            <div class="card-header border-bottom-0 bg-gradient-info">
                                <h5 class="card-title">Thông tin chi tiết</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h4 class="mb-0 mt-2"><b>{{ $user->fullname }}</b></h4>
                                        <p class="card-text">
                                            <b>{{ $user->role ==1 ? 'Quản trị':''}} </b>
                                            <b>{{ $user->role ==2 ? 'Quyền cập nhật THSX':''}}</b>
                                            <b>{{ $user->role ==3 ? 'Quyền cổ đông':''}}</b>
                                            <b>{{ $user->role ==0 ? 'Không có quyền':''}}</b>                                
                                        </p>
                                        <p class="card-text mb-1">Trạng thái: <span>{{ $user->active==1?'Đang hoạt động':'Không hoạt động' }}</span></p>
                                        <p class="card-text mb-1">Tên đăng nhập: <span>{{ $user->username }}</span></p>
                                        <p class="card-text mb-1">Email: <span>{{ $user->email }}</span></p>
                                        <p class="card-text mb-1">Điện thoại: <span>{{ $user->phone }}</span></p>
                                        <p class="card-text mb-1">Địa chỉ: <span>{{ $user->address }}</span></p>
                                        <p class="card-text mb-1">Ngày khởi tạo: 
                                            <span>
                                                @if ($user->created_at)
                                                {{ $user->created_at->format('d/m/Y') }}
                                                @else
                                                    {{ '' }}
                                                @endif
                                            </span>
                                        </p>
                                        <p class="card-text mb-1">Thông tin khác: <span>{{ $user->info }}</span></p>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="admin_asset/images/user/{{ $user->image }}" alt="" class=" img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                <a href="{{ route('admin.user.list') }}" class="btn btn-primary">
                                    <i class="fas fa-long-arrow-alt-left"></i> Quay lại
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endsection