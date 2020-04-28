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
                    <span>Toggle Sidebar</span>
                </button>
                <h5 class="d-inline py-3 ml-3 ml-md-0 text-uppercase">{{ $menu->name }}</h5>
            </div>
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="border">
                            <ul class="nav flex-column">
                                @if (count($content)>0)
                                    @foreach ($content as $ct)
                                    <li class="nav-item">
                                        <a href="noidung/{{ $menu->id }}/{{ $ct->id }}/{{ $menu->slug }}.html" class="nav-link" title="">{{ $ct->title }}</a>
                                    </li>
                                    <hr class="my-1 w-100">
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        @if (!empty($sub_content))
                            <div class="row">
                                <div class="col-12">
                                    {!! $sub_content->content !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                
            </div>
           
        </div>
    </div>
    
</div>
@endsection