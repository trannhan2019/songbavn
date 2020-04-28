@extends('shared.layouts.master')
@section('title')
{{-- {{ dd($menu) }} --}}
    {{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            @if (empty($menu->Parent))
            <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
            @else
            <li class="breadcrumb-item"><a href="{{ route('noidung.gioithieu',$menu->Parent->id) }}">{{ $menu->Parent->name }}</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
            @endif
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
        @include('shared.pages.noidung.gioithieu.sidebar')
        <div class="col">

            <div class="navbar-header mb-2 bg-white p-2">
                <button type="button" id="btn-toggle" class="btn btn-outline-secondary d-md-none">
                    <i class="fa fa-bars"></i>
                </button>
                <h5 class="d-inline py-3 ml-3 ml-md-0 text-uppercase">{{ $menu->name }}</h5>
            </div>
            <div class="card p-3">
                {!! $content->content !!}
            </div>
           
        </div>
    </div>
    
</div>
@endsection