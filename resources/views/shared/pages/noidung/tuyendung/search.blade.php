@extends('shared.layouts.master')
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 pl-0">
                <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tuyendung') }}">{{ $menu->name }}</a></li> 
                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm thông tin</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container">
    <div class="row">
        {{-- <!-- list tin chính --> --}}
        <div class="col-md-8">
            <div class="card-header my-2">
                <h6><b>Tìm kiếm với từ khóa: "{{ $tukhoa }}"</b></h6>
                <p class="mb-0"> Hiển thị <strong>{{ count($content) }}</strong> kết quả trên tổng số <strong>{{ $content->total() }}</strong> kết quả được tìm thấy</p>
            </div>
            @foreach ($content as $ct)
            <div class="card mb-2">
                <div class="row no-gutters">
                    <div class="col-md-4 py-4">
                        <a href="{{ $menu->slug }}/{{ $ct->id }}" title="">
                            <img src="shared_asset/upload/images/content/{{ $ct->imageorfile }}" class="img-fluid align-self-center" alt="">
                        </a>		
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ $menu->slug }}/{{ $ct->id }}" title="">{{ $ct->title }}</a>
                            </h6>
                            <p class="card-text mb-0 crop_text_4">{{$ct->abstract }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="fas fa-user-alt"></i> {{ $ct->author }}
                                    &ensp;
                                    <i class="far fa-calendar-alt"></i> {{ $ct->created_at ? $ct->created_at->format('d/m/Y H:i'):''}}
                                    &ensp;
                                    <i class="far fa-eye"></i> {{ $ct->views }}
                                    &ensp;
                                    <i class="far fa-comments"></i> {{ count($ct->Comments->where('status',1)) }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <!-- phan trang --> --}}
            <div class="pagination justify-content-center">
                {{$content->links()}}
                {{-- {{ $content->appends(Request::except('page','__token'))->links() }} --}}
            </div>

        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="border shadow col-12 p-0 my-2">
                    <div class="text-center py-3" style="background-color: #e9ecef;">
                        <h6 class="m-0">TIN BÀI MỚI NHẤT</h6>
                    </div>
                    @foreach ($content_new as $ctn)
                    <div class="px-4 py-2 text-justify">
                        <a href="{{ $menu->slug }}/{{ $ctn->id }}">
                            <p class="m-0">
                                {{ $ctn->title }}
                            </p>
                        </a>
                        <p class="m-0">
                            <small>
                                <i class="far fa-calendar-alt"></i> {{ $ctn->created_at ? $ctn->created_at->format('d/m/Y H:i'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $ctn->views }}
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