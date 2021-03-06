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
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 pl-0">
                        <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('codong') }}">{{ $menu->Parent->name }}</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-4 py-2">
                <form class="float-right w-100" action="{{ route('ykientimkiem',$menu->slug) }}" method="POST">
					@csrf
					<div class="input-group">
						<input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm..." aria-label="Tìm kiếm ..." name="tukhoa">
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
    @if (session('thongbao'))
        @include('shared.layouts.thongbao')
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{ route('codongslug',$menu->slug) }}" class="list-group-item list-group-item-action list-group-item-info">Tất cả</a>
                @foreach ($listdanhmucykien as $dmyk)
                <a href="{{ $menu->slug }}/{{ $dmyk->slug }}" class="list-group-item list-group-item-info">{{ $dmyk->name }}</a>  
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
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
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    <h6 class="card-title mb-0">GỬI Ý KIẾN</h6>
                </div>
                <div class="card-body">
                    <form action="{{ $menu->Parent->slug }}/{{ $menu->slug }}" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label>Chọn chuyên mục <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="danhmucykien_id">
                                @foreach ($listdanhmucykien as $dm)
                                <option value="{{$dm->id}}">{{ $dm->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (!Auth::check())
                        <div class="form-group">
                            <label>Họ và tên <span class="text-danger">(*)</span></label>
                            <input type="text" name="fullname" class="form-control" value="{{old('fullname')}}">
                            @if ($errors->has('fullname'))
                                <p class="text-danger mb-0">{{ $errors->first('fullname') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ email <span class="text-danger">(*)</span></label>
                            <input type="text" name="email" class="form-control" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại <span class="text-danger">(*)</span></label>
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                            @if ($errors->has('phone'))
                                <p class="text-danger mb-0">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ </label>
                            <input type="text" name="address" class="form-control" value="{{old('address')}}">
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="content">Nội dung ý kiến <span class="text-danger">(*)</span></label>
                            <textarea name="ask_content" id="ckeditor_ykien" class="form-control" rows="5" placeholder="Nội dung ý kiến...">{{old('ask_content')}}</textarea>
                            @if ($errors->has('ask_content'))
                                <p class="text-danger mb-0">{{ $errors->first('ask_content') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success">Gửi ý kiến</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        var basic = [
            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-']
        ];
        
        CKEDITOR.replace('ckeditor_ykien', {
            toolbar: basic,
            height: 200
          });
        CKEDITOR.config.htmlEncodeOutput = false;
        CKEDITOR.config.entities = false;
    </script>
    <script type="text/javascript">
        var url = window.location;
        // Will only work if string in href matches with location
        $('a[href="'+ url +'"]').addClass('active');

        // Will also work for relative and absolute hrefs
        $('a').filter(function() {
            return this.href == url;
        }).addClass('active');
    </script>
@endsection