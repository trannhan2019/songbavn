@extends('shared.layouts.master')
@section('title')
{{--  {{ $menu->name }}  --}}
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('noidung.tintuc',$menu->Parent->id) }}">{{ $menu->Parent->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('noidung.tintuc',$menu->id) }}">{{ $menu->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $tintuc->title }}</li>
        </ol>
    </nav>
</div>
<div class="container">
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
                    <i class="far fa-comments"></i> đang cập nhật
                </small>
            </p>
            <div>
                {!! $tintuc->content !!}
            </div>
            <div class="card border-0 mt-3">
                <div class="card-header bg-primary text-white">
                    <h6 class="card-title mb-0">
                        THÔNG TIN PHẢN HỒI/ GÓP Ý
                    </h6>
                </div>
                <div class="card-body p-2">
                    <div class="media border">
                        <img src="img/img_avatar3.png" class="rounded-circle m-3" style="width: 60px" alt="">
                        <div class="media-body">
                            <h6 class="card-title mb-0">Trần Duy - tranduy216@gmail.com</h6>
                            <p class="card-text mb-0">Sông Ba đang được biết đến như 1 doanh nghiệp Minh bạch, sáng tạo, hài hòa lợi ích của tất cả.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="media border">
                        <img src="img/img_avatar3.png" class="rounded-circle m-3" style="width: 60px" alt="">
                        <div class="media-body">
                            <h6 class="card-title mb-0">Trần Duy - tranduy216@gmail.com</h6>
                            <p class="card-text mb-0">Sông Ba đang được biết đến như 1 doanh nghiệp Minh bạch, sáng tạo, hài hòa lợi ích của tất cả.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="media border">
                        <img src="img/img_avatar3.png" class="rounded-circle m-3" style="width: 60px" alt="">
                        <div class="media-body">
                            <h6 class="card-title mb-0">Trần Duy - tranduy216@gmail.com</h6>
                            <p class="card-text mb-0">Sông Ba đang được biết đến như 1 doanh nghiệp Minh bạch, sáng tạo, hài hòa lợi ích của tất cả.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- gửi phản hồi/ góp ý -->
            <div class="card border-0 mt-3">
                <div class="card-header bg-primary text-white">
                    <h6 class="card-title mb-0">GỬI PHẢN HỒI/ GÓP Ý</h6>							
                </div>
                <div class="card-body">
                    <form action="Tintuc_Detail-v2_submit" method="get" accept-charset="utf-8">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="uname">Họ và tên:</label>
                                <input type="text" class="form-control" id="uname" placeholder="Điền họ và tên..." name="uname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="uname">Email:</label>
                                <input type="email" class="form-control" id="uname" placeholder="Điền email..." name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment">Nội dung phản hồi:</label>
                            <textarea name="comment" class="form-control" rows="5" placeholder="Comment"></textarea>
                        </div>
                        <div>
                            Google Catcha v2
                        </div>
                        <button type="submit" class="btn btn-success">Gửi phản hồi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection