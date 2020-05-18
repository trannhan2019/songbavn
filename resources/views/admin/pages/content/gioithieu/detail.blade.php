@extends('admin.layouts.master')
@section('title')
    {{ $menu->name }}
@endsection
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh mục <small>{{ $menu->name }}</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.content.gioithieu',$menu->id) }}">{{ $menu->name }}</a></li>
                        <li class="breadcrumb-item active">Chi tiết</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- content-header --}}
    <div class="content">
        <div class="container-fluid">
            @if (session('thongbao'))
                @include('admin.layouts.thongbao')
            @endif
            <div class="row">
                <div class="col-12">
                    @if (empty($content->content))
                        <a href="admin/content/{{ $menu->id }}/add-gioi-thieu.html" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus"></i> Tạo mới
                        </a>
                    @else
                        <a href="admin/content/{{ $menu->id }}/{{ $content->id }}/edit-gioi-thieu.html" class="btn btn-sm btn-outline-warning">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 bg-white">
                    @if (!empty($content->content))
                    {!! $content->content !!}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
