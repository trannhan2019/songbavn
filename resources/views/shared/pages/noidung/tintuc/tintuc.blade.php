@extends('shared.layouts.master')
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('noidung.tintuc',$menu->Parent->id) }}">{{ $menu->Parent->name }}</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
        {{-- <!-- list tin chính --> --}}
        <div class="col-md-8">
            @foreach ($tintuc as $tt)
            <div class="card mb-2">
                <div class="row no-gutters">
                    <div class="col-md-4 py-4">
                        <a href="#" title="">
                            <img src="shared_asset/upload/images/content/{{ $tt->imageorfile }}" class="img-fluid align-self-center" alt="">
                        </a>		
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="#" title="">{{ $tt->title }}</a>
                            </h6>
                            <p class="card-text mb-0 crop_text_4">{{ $tt->abstract }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt"></i> {{ $tt->created_at ? $tt->created_at->format('d/m/Y H:h'):''}}
                                    &ensp;
                                    <i class="far fa-eye"></i> {{ $tt->views }}
                                    &ensp;
                                    <i class="far fa-comments"></i> đang update...
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <!-- phan trang --> --}}
            <div class="pagination justify-content-center">
                {{$tintuc->links()}}
            </div>

        </div>
        
        <div class="col-md-4">
            
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title text-center m-0">BÀI VIẾT XEM NHIỀU NHẤT</h6>
                </div>
                @foreach ($tintuc_view as $ttv)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#" title=""> {{ $ttv->title }}</a>
                        <p class="card-text">
                            <small class="text-muted">
                                <i class="far fa-calendar-alt"></i> {{ $tt->created_at ? $tt->created_at->format('d/m/Y H:h'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $ttv->views }}
                                &ensp;
                            </small>
                        </p>
                    </li>
                </ul>
                @endforeach
            </div> 
            
        </div>
    </div>
</div>
@endsection