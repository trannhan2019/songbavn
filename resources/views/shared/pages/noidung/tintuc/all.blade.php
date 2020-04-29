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
    @if (!empty($menu->ChildMenus))
    @foreach ($menu->ChildMenus as $mn)
    <div class="row">
        <div class="col-12">
            <div class="head row mx-0">
                <div class="col-8">
                    <h4>{{ $mn->name }}</h4>
                </div>
                <div class="col-4 text-right">
                    <a class="text-primary" href="#">Xem tất cả</a>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-4 my-3">
                @if (!empty($mn->Contents))
                @foreach ($mn->Contents as $ct)
                <div class="col mb-2">
                    <div class="card border-0">
                        <a href="#" title="">
                            <img class="img-fluid" src="shared_asset/upload/images/content/{{ $ct->imageorfile }}" alt="">
                        </a>								
                        <div class="card-body px-1 py-2">
                            <h6 class="card-title mb-0">
                                <p class="card-text mb-0">
                                    <small class="text-muted">
                                        <i class="far fa-calendar-alt"></i> 10/02/2020
                                    </small>
                                </p>
                                <a href="#" title="">
                                    {{ $ct->title }}
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
        </div>
    </div>
    @endforeach 
    @endif
</div>
@endsection