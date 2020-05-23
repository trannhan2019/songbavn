@extends('shared.layouts.master')
@section('recaptcha')
    {!! htmlScriptTagJsApi([
        'action' => 'homepage'
]) !!}
@endsection
@section('title')
{{ $menu->name }}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tuyendung',$menu->id) }}">{{ $menu->name }}</a></li>
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
            @if (Auth::check())
                @if (Auth::user()->role == 1)
                <div class="btn-group btn-group-sm mb-2">
                    <a href="admin/content/{{ $menu->id }}/add-{{ $menu->slug }}.html" title="thêm" class="btn btn-outline-success"><i class="fas fa-plus"></i></a>
                    <a href="admin/content/{{ $tintuc->id }}/edit-{{ $menu->slug }}.html" title="sửa" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                    <a href="admin/content/{{ $menu->id }}/{{ $menu->slug }}.html" title="quản lý" class="btn btn-outline-info"><i class="fas fa-cogs"></i></a>
                </div> 
                @endif
            @endif
            <h4 class="mb-1">{{ $tintuc->title }}</h4>
            <p>
                <small>
                    <i class="fas fa-user-alt"></i> {{ $tintuc->author }}
                    &ensp;
                    <i class="far fa-calendar-alt"></i> {{ $tintuc->created_at ? $tintuc->created_at->format('d/m/Y H:i'):''}}
                    &ensp;
                    <i class="far fa-eye"></i> {{ $tintuc->views }}
                    &ensp;
                    <i class="far fa-comments"></i> {{ count($tintuc->Comments->where('status',1)) }}
                </small>
            </p>
            <div>
                {!! $tintuc->content !!}
            </div>
            <hr>
            @if (count($tintuc->Comments->where('status',1))>0)
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    <h6 class="card-title mb-0">
                        THÔNG TIN GÓP Ý / BÌNH LUẬN
                    </h6>
                </div>
                <div class="card-body p-2">
                    @foreach ($tintuc->Comments->where('status',1)->sortByDesc('created_at') as $cm)
                        @if (!empty($cm->user_id))
                            @if ($cm->User->role==1)
                            <div class="media pl-3">
                                <div class="media-body">
                                    <h6 class="card-title">{{ $cm->User->fullname }} - {{ $cm->User->email }}</h6>
                                    <p class="card-text mb-0">{!! $cm->content !!}</p>
                                    <p class="card-text"><small class="text-muted">{{ $cm->created_at ? $cm->created_at->format('d/m/Y H:i'):''}}</small></p>
                                </div>
                                <img src="admin_asset/images/user/{{ $cm->User->image }}" class="rounded-circle m-3" style="width: 60px" alt="">
                            </div>
                            <hr>
                            @else
                            <div class="media">
                                <img src="shared_asset/upload/images/comment/img_avatar3.png" class="rounded-circle m-3" style="width: 60px" alt="">
                                <div class="media-body">
                                    <h6 class="card-title">{{ $cm->User->fullname }} - {{ $cm->User->email }}</h6>
                                    <p class="card-text mb-0">{!! $cm->content !!}</p>
                                    <p class="card-text"><small class="text-muted">{{ $cm->created_at ? $cm->created_at->format('d/m/Y H:i'):''}}</small></p>
                                </div>
                            </div>
                            <hr>
                            @endif
                        @else
                        <div class="media">
                            <img src="shared_asset/upload/images/comment/img_avatar3.png" class="rounded-circle m-3" style="width: 60px" alt="">
                            <div class="media-body">
                                <h6 class="card-title">{{ $cm->sendername }} - {{ $cm->senderemail }}</h6>
                                <div class="card-text mb-0">{!! $cm->content !!}</div>
                                <p class="card-text"><small class="text-muted">{{ $cm->created_at ? $cm->created_at->format('d/m/Y H:i'):''}}</small></p>
                            </div>
                        </div>
                        <hr>
                        @endif
                    @endforeach
                </div>
            </div>
            @endif
            {{--  <!-- gửi phản hồi/ góp ý -->  --}}
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    <h6 class="card-title mb-0">GỬI GÓP Ý / BÌNH LUẬN</h6>
                </div>
                <div class="card-body">
                    <form action="binh-luan/{{ $tintuc->id }}/{{ $tintuc->slug }}.html" method="post" accept-charset="utf-8">
                        @csrf
                        @if (!Auth::check())
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Họ và tên:</label>
                                <input type="text" class="form-control" placeholder="Điền họ và tên..." name="sendername" value="{{old('sendername')}}">
                                @if ($errors->has('sendername'))
                                <p class="text-danger mb-0">{{ $errors->first('sendername') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="uname">Email:</label>
                                <input type="email" class="form-control" placeholder="Điền email..." name="senderemail" value="{{old('email')}}">
                                @if ($errors->has('senderemail'))
                                <p class="text-danger mb-0">{{ $errors->first('senderemail') }}</p>
                                @endif
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="content">Nội dung bình luận:</label>
                            <textarea name="content" class="form-control" rows="5" placeholder="Nội dung bình luận...">{{old('content')}}</textarea>
                            @if ($errors->has('content'))
                                <p class="text-danger mb-0">{{ $errors->first('content') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success">Gửi phản hồi</button>
                    </form>
                </div>
            </div>
        </div>
        {{--  Tin liên quan  --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: #e9ecef;">
                    <h6 class="card-title text-center m-0">BÀI VIẾT LIÊN QUAN</h6>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($lienquan as $lq)
                    <li class="list-group-item">
                        <a href="{{ $menu->slug }}/{{ $lq->id }}" title="" class="text-dark"> {{ $lq->title }}</a>
                        <p class="card-text">
                            <small class="text-muted">
                                <i class="far fa-calendar-alt"></i> {{ $lq->created_at ? $lq->created_at->format('d/m/Y H:i'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $lq->views }}
                                &ensp;
                                <i class="far fa-comments"></i> {{ count($lq->Comments->where('status',1)) }}
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
                        <a href="{{ $menu->slug }}/{{ $xn->id }}" title="" class="text-dark"> {{ $xn->title }}</a>
                        <p class="card-text">
                            <small class="text-muted">
                                <i class="far fa-calendar-alt"></i> {{ $xn->created_at ? $xn->created_at->format('d/m/Y H:i'):''}}
                                &ensp;
                                <i class="far fa-eye"></i> {{ $xn->views }}
                                &ensp;
                                <i class="far fa-comments"></i> {{ count($xn->Comments->where('status',1)) }}
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
