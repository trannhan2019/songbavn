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
                    <h1 class="m-0 text-dark">Cơ cấu tổ chức</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $menu->Parent->name }}</a></li>
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
            <div class="row p-2 mb-3">
                <div class="col">
                    <a href="admin/content/{{ $menu->id }}/add-{{ $menu->slug }}.html" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-plus"></i> Tạo mới
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <ul class="nav flex-column border">
                        @if (count($content)>0)
                            @foreach ($content as $ct)
                            <li class="nav-item">
                                <a href="admin/content/{{ $menu->id }}/{{ $ct->id }}/detail-{{ $menu->slug }}.html" class="nav-link" title="">{{ $ct->title }}</a>
                            </li>
                            <hr class="my-1 w-100">
                            @endforeach
                        @endif
                        
                    </ul>
                </div>
                <div class="col-md-9">
                    @include('admin.pages.content.gioithieu.subdetail')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection