@extends('shared.layouts.master')
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('codong') }}">{{ $menu->Parent->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('codongslug',$menu->slug) }}">{{ $menu->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết ý kiến</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (Auth::check())
                @if (Auth::user()->role == 1)
                <div class="btn-group btn-group-sm mb-2">
                    <a href="admin/content/{{ $ykien->id }}/edit-{{ $menu->slug }}.html" title="sửa" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                    <a href="admin/content/{{ $menu->id }}/{{ $menu->slug }}.html" title="quản lý" class="btn btn-outline-info"><i class="fas fa-cogs"></i></a>
                </div> 
                @endif
            @endif
            <div class="ykien-q">
                <h5 class="font-weight-bold">Thông tin chi tiết</h5>
                <p class="m-0">Người đăng: &ensp; {{ $ykien->fullname }}</p>
                <p class="m-0">Email: &ensp; {{ $ykien->email }}</p>
                <p class="m-0">Thời gian: &ensp;{{ $ykien->created_at ? $ykien->created_at->format('d/m/Y H:i'):''}}</p>
                <p>Lượt xem: &ensp; {{ $ykien->views }}</p>
                <h5 class="font-weight-bold">Nội dung câu hỏi:</h5>
                <p class="font-weight-bold">Thuộc chuyên mục: &ensp; {{ $ykien->Danhmuc->name }}</p>
                <div class="text-justify">
                    {!! $ykien->ask_content !!}
                </div>
            </div>
            <hr>
            <div class="ykien-a">
                <h5 class="font-weight-bold">Nội dung trả lời:</h5>
                <div class="text-justify"> {!! $ykien->Traloi->reply_content !!}</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row pl-md-3">
                <div class="border shadow col-12 p-0">
                    <div class="text-center py-3" style="background-color: #e9ecef;">
                        <h6 class="m-0">CÁC Ý KIẾN MỚI</h6>
                    </div>
                    @foreach ($menu->Ykiens->where('status',1)->sortByDesc('created_at')->take(5) as $yv)
                    <div class="px-4 py-2 text-justify">
                        <div class="crop_text_3">
                            <a href="{{ $menu->slug }}/{{ $yv->Danhmuc->slug }}/{{ $yv->id }}">{!! $yv->ask_content !!}</a>
                        </div>
                        <p class="m-0">
                            <small>
                                <i class="fas fa-user-tie"></i> {{ $yv->fullname}}
                                &ensp;
                                <i class="far fa-calendar-alt"></i> {{ $yv->created_at ? $yv->created_at->format('d/m/Y H:i'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $yv->views }}
                            </small>
                        </p>
                    </div>
                    @endforeach
                </div>

                <div class="border shadow col-12 p-0 mt-3">
                    <div class="text-center py-3" style="background-color: #e9ecef;">
                        <h6 class="m-0">CÁC Ý KIẾN XEM NHIỀU</h6>
                    </div>
                    @foreach ($menu->Ykiens->where('status',1)->sortByDesc('views')->take(5) as $yv)
                    <div class="px-4 py-2 text-justify">
                        <div class="crop_text_3">
                            <a href="{{ $menu->slug }}/{{ $yv->Danhmuc->slug }}/{{ $yv->id }}">{!! $yv->ask_content !!}</a>
                        </div>
                        <p class="m-0">
                            <small>
                                <i class="fas fa-user-tie"></i> {{ $yv->fullname}}
                                &ensp;
                                <i class="far fa-calendar-alt"></i> {{ $yv->created_at ? $yv->created_at->format('d/m/Y H:i'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $yv->views }}
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