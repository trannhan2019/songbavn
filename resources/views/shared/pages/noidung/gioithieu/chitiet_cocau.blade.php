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
            <li class="breadcrumb-item"><a href="{{ route('gioithieu') }}">{{ $menu->Parent->name }}</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
            @endif
        </ol>
    </nav>
</div>
<div class="container">
    @if (Auth::check())
        @if (Auth::user()->role == 1)
        <div class="btn-group btn-group-sm mb-2">
            <a href="admin/content/{{ $menu->id }}/{{ $sub_content->id }}/edit-{{ $menu->slug }}.html" title="sửa" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
            <a href="admin/content/{{ $menu->id }}/{{ $menu->slug }}.html" title="quản lý" class="btn btn-outline-info"><i class="fas fa-cogs"></i></a>
        </div> 
        @endif
    @endif
    <div class="row">
        @include('shared.pages.noidung.gioithieu.sidebar')
        <div class="col">
            <div class="navbar-header mb-2 bg-white p-2">
                <button type="button" id="btn-toggle" class="btn btn-outline-secondary d-md-none">
                    <i class="fa fa-bars"></i>
                </button>
                <h5 class="d-inline py-3 ml-3 ml-md-0 text-uppercase">{{ $menu->name }}</h5>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <ul class="nav nav-tabs" role="tablist">
                        @if (count($content)>0)
                            @php
                            $content1 = $content->shift();
                            @endphp
                            <li class="nav-item">
                                <a class="nav-link px-2 active" href="{{ $menu->Parent->slug }}/{{ $menu->slug }}/{{ $content1['id'] }}-{{ $content1['slug'] }}">{{ $content1['title'] }}</a>
                            </li>
                            @foreach ($content->all() as $ct)
                            <li class="nav-item">
                                <a class="nav-link px-2" href="{{ $menu->Parent->slug }}/{{ $menu->slug }}/{{ $ct['id'] }}-{{ $ct['slug'] }}">{{ $ct['title'] }}</a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-12 tab-content">
                    @if (!empty($sub_content))
                        <div class="tab-pane active">
                            {!! $sub_content->content !!}
                        </div>
                    @endif
                </div>
            </div>
           
        </div>
    </div>
    
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //console.log("Hello world!");
            //$('a.nav-link').removeClass('active');
            //$('a.nav-link[href="' + this.location.pathname + '"]').addClass('active');
            let path = window.location.href;
            console.log(path);
            $('ul li a.nav-link').each(function() { 
                if (this.href === path) {
                    $('li a.active').removeClass('active');
                    $(this).addClass('active');
                } 
            });
            $('#sidebar-menu a.list-group-item').each(function(){
                if(this.href === path){
                    $('#sidebar-menu a.list-group-item.active').removeClass('active');
                    $(this).addClass('active');
                }
            });
        });
    </script>
    
@endsection