@extends('shared.layouts.master')
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (!empty($menu->ChildMenus))
            @foreach ($menu->ChildMenus->where('status',1)->sortBy('position') as $mn)
            <div class="row">
                <div class="col-12">
                    <div class="head row mx-0 mb-3">
                        <div class="col-8">
                            <a href="{{ route('tintucslug',$mn->slug) }}"><h4>{{ $mn->name }}</h4></a>
                        </div>
                        <div class="col-4 text-right">
                            <a class="text-primary" href="{{ route('tintucslug',$mn->slug) }}">Xem tất cả</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        @php
                            $tin_con = $mn->Contents->where('status',1)->sortByDesc('created_at')->take(7);
                            $tin1_con = $tin_con->shift();
                        @endphp
                        <div class="col-md-7 home-left h-100">
                            <div class="card">
                                <a href="{{ $menu->slug }}/{{ $mn->slug }}/{{ $tin1_con['id'] }}" title="">
                                    <img src="shared_asset/upload/images/content/{{ $tin1_con['imageorfile'] }}" class="card-img-top w-100 img-fluid" alt="">
                                </a>
                                <div class="card-body p-2">
                                    <h6 class="card-title font-weight-bold">
                                        <a href="{{ $menu->slug }}/{{ $mn->slug }}/{{ $tin1_con['id'] }}" title="">
                                            {{ $tin1_con['title'] }}
                                        </a>
                                    </h6>
                                    <p class="card-text mb-0">
                                        <small class="text-muted">
                                            <i class="far fa-calendar-alt"></i> {{ $tin1_con['created_at'] ? $tin1_con['created_at']->format('d/m/Y'):'' }}
                                             
                                            <i class="far fa-eye"></i> {{ $tin1_con['views'] }}
                                             
                                            <i class="far fa-comments"></i> {{ count($tin1_con->Comments->where('status',1)) }}
                                        </small>
                                    </p>
                                    <p class="card-text mb-0 crop_text_4">
                                        {{ $tin1_con['abstract'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 home-right overflow-auto">
                            @foreach ($tin_con->all() as $tin)
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-5 align-self-center">
                                        <a href="{{ $menu->slug }}/{{ $mn->slug }}/{{ $tin['id'] }}">
                                            <img src="shared_asset/upload/images/content/{{ $tin['imageorfile'] }}" class="w-100 img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body p-1">
                                            <h6 class="card-title mb-0 crop_text_4">
                                                <a href="{{ $menu->slug }}/{{ $mn->slug }}/{{ $tin['id ']}}">{{ $tin['title'] }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="border shadow col-12 p-0">
                    <div class="text-center py-3" style="background-color: #e9ecef;">
                        <h6 class="m-0">TIN BÀI ĐỌC NHIỀU</h6>
                    </div>
                    @foreach ($content_view as $ctv)
                    <div class="px-4 py-2 text-justify">
                        <a href="{{ $menu->slug }}/{{ $mn->slug }}/{{ $ctv->id }}">
                            <p class="m-0">
                                {{ $ctv->title }}
                            </p>
                        </a>
                        <p class="m-0">
                            <small>
                                <i class="far fa-calendar-alt"></i> {{ $ctv->created_at ? $ctv->created_at->format('d/m/Y'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $ctv->views }}
                            </small>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
