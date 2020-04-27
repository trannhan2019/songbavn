@extends('admin.layouts.master')
@section('title')
{{ $menu->name }}
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thông tin liên hệ</h1>
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
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                <div class="row">
                    <div class="col-12">
                        @if (empty($content->content))
                            <a href="admin/content/{{ $menu->id }}/add-{{ $menu->slug }}.html" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-plus"></i> Tạo mới
                            </a>
                        @else
                            <a href="admin/content/{{ $menu->id }}/{{ $content->id }}/edit-{{ $menu->slug }}.html" class="btn btn-sm btn-outline-warning">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                        @endif
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 ">
                        @if (!empty($content->content))
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h6 class="card-title mb-0">Thông tin liên hệ</h6>
                            </div>				
                            <div class="card-body">
                                {!! $content->content !!}
                            </div>
                        </div>
                        @endif
    
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection