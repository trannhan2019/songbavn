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

    </div>

@endsection