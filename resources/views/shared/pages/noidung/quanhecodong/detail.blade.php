@extends('shared.layouts.master')
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('noidung.quanhecodong',$menu->Parent->id) }}">{{ $menu->Parent->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('noidung.quanhecodong',$menu->id) }}">{{ $menu->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $tintuc->title }}</li>
        </ol>
    </nav>
</div>
<div class="container">
    @if (session('thongbao'))
        @include('shared.layouts.thongbao')
    @endif
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-1">{{ $tintuc->title }}</h4>
            <p>
                <small>
                    <i class="fas fa-user-alt"></i> {{ $tintuc->author }}
                    &ensp;
                    <i class="far fa-calendar-alt"></i> {{ $tintuc->created_at ? $tintuc->created_at->format('d/m/Y H:h'):''}}
                    &ensp;
                    <i class="far fa-eye"></i> {{ $tintuc->views }}
                    &ensp;
                </small>
            </p>
            <div>
                {!! $tintuc->content !!}
            </div>
        </div>
        <div class="col-md-4 my-2">
            <div class="card">
                <div class="card-header" style="background-color: #e9ecef;">
                    <h6 class="card-title text-center m-0">BÀI VIẾT LIÊN QUAN</h6>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($lienquan as $lq)
                    <li class="list-group-item">
                        <a href="noidung/{{ $menu->Parent->slug }}/{{ $menu->id }}/{{ $lq->id }}/{{ $lq->slug }}.html" title="" class="text-dark"> {{ $lq->title }}</a>
                        <p class="card-text">
                            <small class="text-muted">
                                <i class="fas fa-user-tie"></i> {{ $lq->author }}
                                &ensp;
                                <i class="far fa-calendar-alt"></i> {{ $lq->created_at ? $lq->created_at->format('d/m/Y H:h'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $lq->views }}
                            </small>
                        </p>									
                    </li>
                    @endforeach
                </ul>
            </div>
            {{--  <!-- BÀI VIẾT XEM NHIỀU -->  --}}
            <div class="card mt-3">
                <div class="card-header" style="background-color: #e9ecef;">
                    <h6 class="card-title text-center m-0">BÀI VIẾT XEM NHIỀU</h6>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($xemnhieu as $xn)
                    <li class="list-group-item">
                        <a href="noidung/{{ $menu->Parent->slug }}/{{ $menu->id }}/{{ $xn->id }}/{{ $xn->slug }}.html" title="" class="text-dark"> {{ $xn->title }}</a>
                        <p class="card-text">
                            <small class="text-muted">
                                <i class="fas fa-user-tie"></i> {{ $lq->author }}
                                &ensp;
                                <i class="far fa-calendar-alt"></i> {{ $xn->created_at ? $xn->created_at->format('d/m/Y H:h'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $xn->views }}
                            </small>
                        </p>									
                    </li> 
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection