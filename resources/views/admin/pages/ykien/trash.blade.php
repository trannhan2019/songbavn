@extends('admin.layouts.master')
@section('title')
    Ý kiến đã xóa
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách: <small>Ý kiến đã xóa</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item active">Ý kiến cổ đông đã xóa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        <div class="modal" tabindex="-1" role="dialog" id="restoreYkienModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Phục hồi thông tin</h5>          
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                    @csrf        
                        <div class="modal-body">
                            <h6>Khôi phục thông tin này ?</h6>
                        </div>
                        <div class="modal-footer">                                
                            <button type="submit" class="btn btn-primary">Khôi phục</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--  modal xóa  --}}
        <div class="modal" tabindex="-1" role="dialog" id="deletedYkienModal">
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
        
        
        <div class="content">
            <div class="container-fluid">
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                
                {{--  Ket thuc phan thong bao  --}}
                <div class="table-responsive-sm mt-3">
                    <table class="table table-hover table-sm" id="table_trashykien">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">STT</th>
                                <th style="width: 300px !important;">Nội dung hỏi</th>
                                <th>Thuộc danh mục</th>
                                <th>Người gửi</th>
                                <th>Ngày gửi</th>
                                <th>Trả lời</th>
                                <th>Phục hồi</th>
                                <th>Xóa vĩnh viễn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($ykien as $y)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td style="-webkit-line-clamp: 4;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-box-orient: vertical;
                                ">{!! $y->ask_content !!}</td>
                                <td >{{ $y->Danhmuc->name}}</td>
                                <td>{{ $y->fullname}}</td>
                                <td>{{ date("d/m/Y", strtotime( $y->created_at))}}</td>

                               <td>
                                    {!! $y->Traloi_trash == null ? '<span href="#" class="badge badge-secondary">Chưa trả lời</span>':'<span class="badge badge-primary">Đã trả lời</span>' !!} 
                                </td>
                                <td><button class="btn btn-primary btn-sm btn-restore" data-id="{{ $y->id }}" data-toggle="modal" data-target="#restoreYkienModal"><i class="fas fa-trash-restore"></i></button></td>
                                <td><button class="btn btn-danger btn-sm btn-detete" data-id="{{ $y->id }}" data-toggle="modal" data-target="#deletedYkienModal"><i class="far fa-trash-alt"></i></button></td>
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
            $('#table-ykiens').DataTable({
                
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
            var url = "admin/content/"+ id +"/forcedelete-y-kien-tra-loi.html";
            $('#deletedYkienModal form').attr('action', url);
        });
    </script>
    <script type="text/javascript">
        $('.btn-restore').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/content/"+ id + "/restore-y-kien-tra-loi.html";
            $('#restoreYkienModal form').attr('action', url);
        });
    </script>
@endsection