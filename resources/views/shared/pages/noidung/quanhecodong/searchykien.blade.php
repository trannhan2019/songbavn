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
                <p class="mb-0"> Hiển thị <strong>{{ count($ykien) }}</strong> kết quả trên tổng số <strong>{{ $ykien->total() }}</strong> kết quả được tìm thấy</p>
            </div>
            @foreach ($ykien as $yk)
            <div class="row">
                <div class="col-12">
                    <p class="font-weight-bold my-1">Câu hỏi: </p>
                    <p class="my-0 text-justify">{!! $yk->ask_content !!}</p>
                    <p>
                        <small>
                            <i class="far fa-calendar-alt"></i>  <span >{{ $yk->created_at ? $yk->created_at->format('d/m/Y'):''}}</span>
                             &ensp;  
                            <i class="fas fa-user-tie"></i>  <span >{{ $yk->fullname }}</span>
                            &ensp;  
                            <i class="far fa-eye"></i> : <span >{{ $yk->views }}</span>
                        </small>
                    </p>
                    <p class="font-weight-bold my-0">Trả lời: 
                    </p>
                    <a href="{{ $menu->slug }}/{{ $yk->Danhmuc->slug }}/{{ $yk->id }}" class="text-primary">Xem chi tiết nội dung trả lời...</a>
                </div>
            </div>
            <hr class="w-100 border-secondary my-2">  
            @endforeach
            {{-- <!-- phan trang --> --}}
            <div class="pagination justify-content-center">
                {{$ykien->links()}}
            </div>

        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="border shadow col-12 p-0 my-2">
                    <div class="text-center py-3" style="background-color: #e9ecef;">
                        <h6 class="m-0">Ý KIẾN MỚI NHẤT</h6>
                    </div>
                    @foreach ($ykien_new as $ykn)
                    <div class="px-4 py-2 text-justify">
                        <a href="{{ $menu->slug }}/{{ $ykn->Danhmuc->slug }}/{{ $ykn->id }}">
                            <div class="m-0 crop_text_4">
                                {!! $ykn->ask_content !!}
                            </div>
                        </a>
                        <p class="m-0 mt-1">
                            <small>
                                <i class="fas fa-user-tie"></i>  <span >{{ $ykn->fullname }}</span>
                                &ensp;
                                <i class="far fa-calendar-alt"></i> {{ $ykn->created_at ? $ykn->created_at->format('d/m/Y'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $ykn->views }}
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