@extends('admin.layouts.master')
@section('title')
    Ban điều hành
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ban Điều hành</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="#">Nội dung</a></li>
                        <li class="breadcrumb-item"><a href="#">Giới thiệu</a></li>
                        <li class="breadcrumb-item active">{{ $menu_gioithieu->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <ul class="nav nav-tabs mb-2 px-2">
                <li class="nav-item">
                    <a class="nav-link active" href="admin/content/{{ $menu_gioithieu->id }}/{{ $menu_gioithieu->slug }}.html">Ban điều hành</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/content/{{ $menu_gioithieu->id }}/{{ $menu_gioithieu->slug }}-phongban.html">Các phòng ban</a>
                </li>
            </ul>
            <div class="card">
                <div class="card-header" style="border-top: 1px solid orange">
                    <h6 class="card-title">
                        HỘI ĐỒNG QUẢN TRỊ
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="card border-0 shadow-none">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img class="img-fluid" src="https://via.placeholder.com/200x250" alt="">
                                    </div>
                                    <div class="col-md-8 pl-4">
                                        <h6 class="card-title mt-3 mt-md-0 font-weight-bold">Ông Đinh Châu Hiếu Thiện</h6>
                                        <br>
                                        <h6 class="card-title font-weight-bold">Chủ tịch Hội đồng quản trị</h6>
                                        <p class="card-text mb-1">Sinh năm: 1966</p>
                                        <p class="card-text mb-1">Quốc tịch: Việt Nam</p>
                                        <p class="card-text mb-1">Trình độ chuyên môn: ThS QTKD, KS Điện</p>
                                        <p class="card-text mb-1">Điện thoại: 1966</p>
                                        <p class="card-text mb-1">Email: 1966</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr >
                    <div class="row my-3">
                        <div class="col-md-10 offset-md-1">
                            <div class="card border-0 shadow-none">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img class="img-fluid" src="https://via.placeholder.com/200x250" alt="">
                                    </div>
                                    <div class="col-md-8 pl-4">
                                        <h6 class="card-title mt-3 mt-md-0">Ông Thái Văn Thắng</h6>
                                        <br>
                                        <h6 class="card-title"> Phó Chủ tịch Hội đồng quản trị</h6>
                                        <p class="card-text mb-1">Sinh năm: 1966</p>
                                        <p class="card-text mb-1">Quốc tịch: Việt Nam</p>
                                        <p class="card-text mb-1">Trình độ chuyên môn: ThS QTKD, KS Điện</p>
                                        <p class="card-text mb-1">Điện thoại: 1966</p>
                                        <p class="card-text mb-1">Email: 1966</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr >
                    <div class="row my-3">
                        <div class="col-md-10 offset-md-1">
                            <div class="card border-0 shadow-none">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img class="img-fluid" src="https://via.placeholder.com/200x250" alt="">
                                    </div>
                                    <div class="col-md-8 pl-4">
                                        <h6 class="card-title mt-3 mt-md-0">Ông Phạm Phong</h6>
                                        <br>
                                        <h6 class="card-title"> Thành viên Hội đồng quản trị - TGĐ Công ty</h6>
                                        <p class="card-text mb-1">Sinh năm: 1966</p>
                                        <p class="card-text mb-1">Quốc tịch: Việt Nam</p>
                                        <p class="card-text mb-1">Trình độ chuyên môn: ThS QTKD, KS Điện</p>
                                        <p class="card-text mb-1">Điện thoại: 1966</p>
                                        <p class="card-text mb-1">Email: 1966</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection