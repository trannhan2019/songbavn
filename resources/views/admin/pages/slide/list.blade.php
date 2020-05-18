@extends('admin.layouts.master')
@section('title')
    Slide
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách: <small>Slides</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.slide.list') }}">Slide</a></li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        {{--  modal xóa  --}}
        <div class="modal" tabindex="-1" role="dialog" id="deletedSlideModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa thông tin</h5>          
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                    @csrf        
                        <div class="modal-body">
                            <h6>Bạn chắc chắn muốn xóa thông tin này ?</h6>
                        </div>
                        <div class="modal-footer">                                
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--  Them moi  --}}
        <a href="{{ route('admin.slide.add') }}" class="btn btn-primary ml-3 mb-3"><i class="fas fa-plus"></i> Thêm mới</a>
        <div class="content">
            <div class="container-fluid">
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                @if (session('loi'))
                    @include('admin.layouts.loi')
                @endif
                {{--  Ket thuc phan thong bao  --}}
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="table-slides">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Vị trí</th>                          
                                <th>Trạng thái</th>
                                <th>Liên kết</th>
                                <th>Thời gian tạo</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($slide as $sl)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>
                                    <img src="shared_asset/upload/images/slide/{{ $sl->image }}" alt="" style="width: 150px" class="img-fluid">
                                </td>
                                <td class="text-center">{{ $sl->location }}</td>
                                <td>
                                    {!! $sl->Active==1 ? '<span class="badge badge-primary">Hoạt động</span>':'<span class="badge badge-secondary">Không hoạt động</span>' !!} 
                               </td>      
                                <td>{{ $sl->Content ?  $sl->Content->title : '' }}</td>
                                <td>{{ $sl->created_at ? $sl->created_at->format('d/m/Y H:i'):'' }}</td>
                                <td><a href="{{ route('admin.slide.edit',$sl->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                                <td><button class="btn btn-danger btn-sm btn-detete" data-id="{{ $sl->id }}" data-toggle="modal" data-target="#deletedSlideModal"><i class="far fa-trash-alt"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        {{--  Ket thuc Phan noi dung  --}}
       
    </div>
    
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $('#table-slides').DataTable({
                
                "language": {
                    "sProcessing":   "Đang xử lý...",
                    "sLengthMenu":   "Xem _MENU_ mục",
                    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                    "sInfoPostFix":  "",
                    "sSearch":       "Tìm:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Đầu",
                        "sPrevious": "Trước",
                        "sNext":     "Tiếp",
                        "sLast":     "Cuối"
                    }
                }
            });
            
        });
    </script>
    <script type="text/javascript">
        $('.btn-detete').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/slide/delete/"+ id;
            $('#deletedSlideModal form').attr('action', url);
        });
    </script>
@endsection