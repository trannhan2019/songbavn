@extends('admin.layouts.master')
@section('title')
    Liên hệ
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Liên hệ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Nội dung</a></li>
                            <li class="breadcrumb-item active">{{ $menu->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h6 class="card-title mb-0">Thông tin liên hệ</h6>
                    </div>				
                    <div class="card-body">
                        <h6 class="card-title text-primary">CÔNG TY CỔ PHẦN SÔNG BA</h6>
                        <p class="card-text text-danger">Địa chỉ: số 573 đường Núi Thành, Phường Hòa Cường Nam, Quận Hải Châu, Tp. Đà Nẵng</p>
                        <p class="card-text">Điện thoại: 0236. 3 653 592, 2 215 592 - Fax: 0236. 3 653 593</p>
                        <p class="card-text">Email: sba2007@songba.vn</p>
                    </div>
                    <img src="shared_asset/upload/images/content/lienhe/CBSBA.jpg" class="img-fluid" alt="">
                    <div class="card-footer p-0 mt-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.6664243390273!2d108.2227403!3d16.0308711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b1228ede61%3A0xb7dac5fa9b8e1086!2zQ8O0bmcgdHkgQ-G7lSBwaOG6p24gU8O0bmcgQmE!5e0!3m2!1svi!2s!4v1581670381973!5m2!1svi!2s" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection