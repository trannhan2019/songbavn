@extends('admin.layouts.master')
@section('title')
    {{ $content->title }}
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tin tức: <small>Chi tiết thông tin</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Tin tức</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $content->menu->name }}</a></li>
                            <li class="breadcrumb-item active">Chi tiết</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <h4 class="mb-1">{{ $content->title }}</h4>
                <p>
                    <small>
                        <i class="fas fa-user-alt"></i> {{ $content->author }}
                        &ensp;
                        <i class="far fa-calendar-alt"></i> {{ $content->created_at ? $content->created_at->format('d/m/Y H:h'):''}}
                        &ensp;
                        <i class="far fa-eye"></i> {{ $content->views }}
                        &ensp;
                        <i class="far fa-comments"></i> 0
                    </small>
                </p>
                {!! $content->content !!}
            </div>
        </div>
    </div>
    
@endsection