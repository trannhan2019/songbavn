@extends('shared.layouts.master')
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('quanhecodong',$menu->Parent->id) }}">{{ $menu->Parent->name }}</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
        {{-- <!-- list tin chính --> --}}
        <div class="col-md-8">
            @foreach ($content as $ct)
            <div class="row">
                <div class="col-12">
                    <a href="{{ $menu->Parent->slug }}/{{ $menu->id }}/{{ $ct->id }}/{{ $ct->slug }}.html">
                        <p class="font-weight-bold m-0">{{ $ct->title }}</p>
                    </a>
                    <small>
                        <p class="d-inline-block m-0">
                            <i class="far fa-calendar-alt"></i>: {{ $ct->created_at ? $ct->created_at->format('d/m/Y H:i'):''}}
                        </p>
                        <p class="d-inline-block m-0 pl-4">
                            <i class="fas fa-user-tie"></i>: {{ $ct->author }}
                        </p>
                    </small>
                    <small class="d-block">
                        <p class="d-inline-block m-0">
                            <i class="far fa-eye"></i>: {{ $ct->views }}
                        </p>
                        <p class="d-inline-block m-0 pl-4">
                            <i class="far fa-comments"></i>: {{ $ct->views }}
                        </p>
                    </small>
                </div>
                <hr class="my-2 w-100 border">
            </div>
            @endforeach
            {{-- <!-- phan trang --> --}}
            <div class="pagination justify-content-center">
                {{$content->links()}}
            </div>

        </div>
        
        <div class="col-md-4">
            <div class="row">
                <div class="border shadow col-12 p-0">
                    <div class="text-center py-3" style="background-color: #e9ecef;">
                        <h6 class="m-0">TIN BÀI ĐỌC NHIỀU</h6>
                    </div>
                    @foreach ($content_view as $ctv)
                    <div class="px-4 py-2 text-justify">
                        <a href="{{ $menu->Parent->slug }}/{{ $menu->id }}/{{ $ctv->id }}/{{ $ctv->slug }}.html">
                            <p class="m-0">
                                {{ $ctv->title }}
                            </p>
                        </a>
                        <p class="m-0">
                            <small>
                                <i class="far fa-calendar-alt"></i> {{ $ctv->created_at ? $ctv->created_at->format('d/m/Y H:i'):''}}
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