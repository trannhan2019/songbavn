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
                <li class="breadcrumb-item"><a href="{{ route('codong') }}">{{ $menu->Parent->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('codongslug',$menu->slug) }}">{{ $menu->name }}</a></li> 
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
            <div class="row">
                <div class="col-12">
                    <a href="{{ $menu->Parent->slug }}/{{ $menu->slug }}/{{ $ct->id }}">
                        <p class="font-weight-bold m-0">{{ $ct->title }}</p>
                    </a>
                    <small>
                        <p class="d-inline-block m-0">
                            <i class="far fa-calendar-alt"></i> &nbsp; {{ $ct->created_at ? $ct->created_at->format('d/m/Y'):''}}
                        </p>
                        &ensp;
                        <p class="d-inline-block m-0">
                            <i class="fas fa-user-tie"></i>&nbsp; {{ $ct->author }}
                        </p>
                        &ensp;
                        <p class="d-inline-block m-0">
                            <i class="far fa-eye"></i>&nbsp; {{ $ct->views }}
                        </p>
                    </small>
                </div>
                <hr class="my-2 w-100 border">
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
                        <a href="{{ $menu->Parent->slug }}/{{ $menu->slug }}/{{ $ctn->id }}">
                            <p class="m-0">
                                {{ $ctn->title }}
                            </p>
                        </a>
                        <p class="m-0">
                            <small>
                                <i class="far fa-calendar-alt"></i> {{ $ctn->created_at ? $ctn->created_at->format('d/m/Y'):''}}
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