@extends('shared.layouts.master')
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
        </ol>
    </nav>
</div>
<div class="container">
    @if (!empty($menu->ChildMenus))
    @foreach ($menu->ChildMenus->where('status',1)->sortBy('position') as $mn)
        @if ($mn->slug == 'y-kien-tra-loi')
        <div class="col-12">
            <div class="head row">
                <div class="col-8">
                    <a href="{{ route('codongslug',$mn->slug) }}"><h4>{{ $mn->name }}</h4></a>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('codongslug',$mn->slug) }}">Xem tất cả</a>
                </div>						
            </div>
            <div class="row my-3">
                <div class="col-md-5">
                    <a href="{{ route('codongslug',$mn->slug) }}">
                        <img src="shared_asset/upload/images/content/q-a-600x400.jpg" alt="" class="w-100 img-thumbnail"> 
                    </a>
                </div>
                <div class="col-md-7 scroll">
                    @if (count($mn->Ykiens)>0)
                    @foreach ($mn->Ykiens->where('status',1)->sortByDesc('created_at')->take(3) as $ykien)
                    <div class="row">
                        <div class="col-12">
                            <div class="time mt-2 mt-md-0">
                                <i class="far fa-calendar-alt"></i>
                                <small>{{ $ykien->created_at ? $ykien->created_at->format('d/m/Y'):''}}</small>
                                &ensp;
                                <i class="fas fa-user-alt"></i>
                                <small>{{ $ykien->fullname}}</small>
                            </div>
                            <div class="crop_text_4">
                                <a href="{{ $mn->slug }}/{{ $ykien->Danhmuc->slug }}/{{ $ykien->id }}">
                                    <h6>{!! $ykien->ask_content !!}</h6>
                                </a>
                            </div>
                        </div>
                        <hr class="my-1 w-100">
                    </div>
                    @endforeach 
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="head row">
                    <div class="col-8">
                        <a href="{{ route('codongslug',$mn->slug) }}"><h4>{{ $mn->name }}</h4></a>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('codongslug',$mn->slug) }}">Xem tất cả</a>
                    </div>						
                </div>
                <div class="row my-3">
                    <div class="col-md-5">
                        <a href="{{ route('codongslug',$mn->slug) }}">
                            @if ($mn->slug =='dai-hoi-dong-co-dong')
                            <img src="shared_asset/upload/images/content/dhdcd-600x400.jpg" alt="" class="w-100 img-thumbnail">
                            @elseif ($mn->slug =='cong-bo-thong-tin')
                            <img src="shared_asset/upload/images/content/congbo-thongtin-600-400.jpg" alt="" class="w-100 img-thumbnail">
                            @elseif ($mn->slug =='bao-cao-tai-chinh')
                            <img src="shared_asset/upload/images/content/BCTC-600x400.jpg" alt="" class="w-100 img-thumbnail">
                            @elseif ($mn->slug =='bao-cao-thuong-nien')
                            <img src="shared_asset/upload/images/content/bctn-600x400.jpg" alt="" class="w-100 img-thumbnail">
                            @elseif ($mn->slug =='tinh-hinh-quan-tri')
                            <img src="shared_asset/upload/images/content/thqt-600x400.jpg" alt="" class="w-100 img-thumbnail">
                            @elseif ($mn->slug =='dieu-le-quy-che')
                            <img src="shared_asset/upload/images/content/dieu-le-quy-che.jpg" alt="" class="w-100 img-thumbnail">                              
                            @endif   
                        </a>
                    </div>
                    <div class="col-md-7 scroll">
                        @foreach ($mn->Contents->where('status',1)->sortByDesc('created_at')->take(5) as $tin)
                        <div class="row">
                            <div class="col-12">
                                <div class="time mt-2 mt-md-0">
                                    <i class="far fa-calendar-alt"></i>
                                    <small>{{ $tin->created_at ? $tin->created_at->format('d/m/Y'):''}}</small>
                                    
                                </div>
                                <div class="title">
                                    <a href="{{ $menu->slug }}/{{ $mn->slug }}/{{ $tin->id }}-{{ $tin->slug }}">
                                        <h6>{{ $tin->title }}</h6>
                                    </a>
                                </div>
                            </div>
                            <hr class="my-1 w-100">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
        @endif
    @endforeach
    @endif

</div>
@endsection
