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
            <li class="breadcrumb-item"><a href="{{ route('noidung.quanhecodong',$menu->Parent->id) }}">{{ $menu->Parent->name }}</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{ $menu->name }}</li>
        </ol>
    </nav>
</div>
<div class="container">
    @if (session('thongbao'))
        @include('shared.layouts.thongbao')
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{ route('noidung.ykiencodong',$menu->id) }}" class="list-group-item list-group-item-action list-group-item-info">Tất cả</a>
                @foreach ($danhmucykien as $dmyk)
                <a href="noidung/{{ $menu->id }}/{{ $dmyk->id }}/{{ $menu->slug }}.html" class="list-group-item list-group-item-info">{{ $dmyk->name }}</a>  
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
                            <i class="far fa-calendar-alt"></i>  <span >{{ $yk->created_at ? $yk->created_at->format('d/m/Y H:h'):''}}</span>
                             &ensp;  
                            <i class="fas fa-user-tie"></i>  <span >{{ $yk->fullname }}</span>
                            &ensp;  
                            <i class="far fa-eye"></i> : <span >{{ $yk->views }}</span>
                        </small>
                    </p>
                    <p class="font-weight-bold my-0">Trả lời: 
                    </p>
                    <a href="noidung/{{ $menu->id }}/{{ $yk->id }}/detail-{{ $menu->slug }}.html" class="text-primary">Xem chi tiết nội dung trả lời...</a>
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
                    <form action="noidung/{{ $menu->id }}/{{ $menu->slug }}.html" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label>Chọn chuyên mục <span class="text-danger">(*)</span></label>
                            <select class="form-control" name="danhmucykien_id">
                                @foreach ($danhmucykien as $dm)
                                <option value="{{$dm->id}}">{{ $dm->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung ý kiến:</label>
                            <textarea name="ask_content" id="ckeditor_ykien" class="form-control" rows="5" placeholder="Nội dung ý kiến..."></textarea>
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
    </script>
@endsection