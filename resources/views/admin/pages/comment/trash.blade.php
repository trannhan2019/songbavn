@extends('admin.layouts.master')
@section('title')
    Bình luận đã xóa
@endsection

@section('content')
<div class="content-wrapper">
    {{-- Content Header (Page header)--}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh sách: <small>Bình luận đã xóa</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                        <li class="breadcrumb-item"><a href="#">Bình luận</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- content-header --}}
    {{--  Phan noi dung  --}}
    <div class="modal" tabindex="-1" role="dialog" id="restoreTrashCommentModal">
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
    <div class="modal" tabindex="-1" role="dialog" id="deletedTrashCommentModal">
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
    <div class="container-fluid">
        {{--  Phan thong bao  --}}
        @if (session('thongbao'))
            @include('admin.layouts.thongbao')
        @endif
        {{--  Ket thuc phan thong bao  --}}
        <div class="table-responsive-sm">
            <table class="table table-hover table-sm" id="table-trashcomments">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Thuộc bài viết</th>
                        <th>Nội dung</th>
                        <th>Họ và tên</th>                      
                        <th>Thời gian tạo</th>
                        <th>Khôi phục</th>
                        <th>Xóa vĩnh viễn</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($comment as $cm)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td> {{ $cm->ContentTrash->title }} </td>
                        <td>{{ $cm->content }}</td>
                        <td>{{ $cm->sendername }}</td>

                        <td>{{ $cm->created_at ? $cm->created_at->format('d/m/Y H:h'):'' }}</td>

                        <td><button class="btn btn-primary btn-sm btn-restore" data-id="{{ $cm->id }}" data-toggle="modal" data-target="#restoreTrashCommentModal"><i class="fas fa-trash-restore"></i></button></td>
                        <td><button class="btn btn-danger btn-sm btn-detete" data-id="{{ $cm->id }}" data-toggle="modal" data-target="#deletedTrashCommentModal"><i class="far fa-trash-alt"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>      
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $('#table-trashcomments').DataTable({
                
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
            var url = "admin/comment/forcedelete/"+ id;
            $('#deletedTrashCommentModal form').attr('action', url);
        });
    </script>
    <script type="text/javascript">
        $('.btn-restore').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/comment/restore/"+ id;
            $('#restoreTrashCommentModal form').attr('action', url);
        });
    </script>
@endsection