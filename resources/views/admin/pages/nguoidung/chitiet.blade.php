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
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
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
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <a href="#" title="">
                                <img src="img/bantuvisu.png" class="img-fluid align-self-center" alt="">
                            </a>		
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <a href="#" title="">Bán tự vi sư.</a>
                                </h6>
                                <p class="card-text mb-0">Câu: “Nhất tự vi sư, bán tự vi sư” chắc chắn ai cũng đã nghe, nhưng không chắc ai cũng hiểu rõ.</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="far fa-calendar-alt"></i> 10/02/2020
                                        &ensp;
                                        <i class="far fa-eye"></i> 100
                                        &ensp;
                                        <i class="far fa-comments"></i> 5
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection