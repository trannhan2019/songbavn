@extends('admin.layouts.master')
@section('title')
    Nội dung đã xóa
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Nội dung đã xóa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Nội dung</a></li>
                            <li class="breadcrumb-item active">Nội dung đã xóa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        <div class="modal" tabindex="-1" role="dialog" id="deletedContentModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa nội dung này</h5>          
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                    @csrf        
                        <div class="modal-body">
                            <h6>Bạn chắc chắn muốn xóa vĩnh viễn nội dung này ?</h6>
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
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="trash-contents">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Danh mục</th>
                                <th>Tiêu đề</th>  
                                <th>Người tạo</th>
                                <th>Thời gian tạo</th>
                                <th>Phục hồi</th>
                                <th>Xóa vĩnh viễn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($contents as $content)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $content->Menu->Parent->name}}/{{ $content->Menu->name }}</td>
                                <td>{{ $content->title }}</td>
                                <td>{{ $content->User->fullname }}</td>
                                <td>{{ $content->created_at ? $content->created_at->format('d/m/Y H:h'):'' }}</td>
                                <td><a href="admin/content/restore/{{ $content->id }}" class="btn btn-sm btn-primary"><i class="fas fa-trash-restore"></i></a></td>
                                <td><button class="btn btn-danger btn-sm btn-detete" data-id="{{ $content->id }}" data-toggle="modal" data-target="#deletedContentModal"><i class="far fa-trash-alt"></i></button></td>
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
        $(document).ready(function() {
            $('#trash-contents').DataTable({
                
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
        } );
    </script>
    <script type="text/javascript">
        $('.btn-detete').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/content/forcedelete/" + id;
            $('#deletedContentModal form').attr('action', url);
        });
    </script>
@endsection