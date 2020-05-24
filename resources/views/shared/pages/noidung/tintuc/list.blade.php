@extends('shared.layouts.master')
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 pl-0">
                        <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tintuc') }}">{{ $menu->Parent->name }}</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-4 py-2">
                <form class="float-right w-100" action="#" method="POST">
					@csrf
					<div class="input-group">
						<input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm..." aria-label="Tìm kiếm ...">
						<div class="input-group-append">
							<button class="btn btn-sm btn-outline-secondary" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        {{-- <!-- list tin chính --> --}}
        <div class="col-md-8">
            @foreach ($content as $ct)
            <div class="card mb-2">
                <div class="row no-gutters">
                    <div class="col-md-4 py-4">
                        <a href="{{ $menu->Parent->slug }}/{{ $menu->slug }}/{{ $ct->id }}" title="">
                            <img src="shared_asset/upload/images/content/{{ $ct->imageorfile }}" class="img-fluid align-self-center" alt="">
                        </a>		
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ $menu->Parent->slug }}/{{ $menu->slug }}/{{ $ct->id }}" title="">{{ $ct->title }}</a>
                            </h6>
                            <p class="card-text mb-0 crop_text_4">{{ $ct->abstract }}</p>
                            <p class="card-text">
                                <small class="text-muted">
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
                        <a href="{{ $menu->Parent->slug }}/{{ $menu->slug }}/{{ $ctv->id }}">
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