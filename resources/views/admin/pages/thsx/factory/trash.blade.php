@extends('admin.layouts.master')
@section('title')
    Thông số nhà máy
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách: <small>Thông số nhà máy đã xóa</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.factory.list') }}">Thông tin Nhà máy</a></li>
                            <li class="breadcrumb-item active">Danh sách đã xóa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  modal phục hồi  --}}
        <div class="modal" tabindex="-1" role="dialog" id="restoreFactoryModal">
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
        {{--  Phan noi dung  --}}

        
        <div class="content">
            <div class="container-fluid">
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                {{--  Ket thuc phan thong bao  --}}
                
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="table-trashfactorys">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Tên nhà máy</th>
                                <th>Ký hiệu</th>
                                <th>Phục hồi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($factory as $f)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $f->name }}</td>
                                <td>{{ $f->alias }}</td>
                                <td><button class="btn btn-primary btn-sm btn-restore" data-id="{{ $f->id }}" data-toggle="modal" data-target="#restoreFactoryModal"><i class="fas fa-trash-restore"></i></button></td>
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
            $('#table-trashfactorys').DataTable({
                
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
        $('.btn-restore').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/factory/restore/"+ id;
            $('#restoreFactoryModal form').attr('action', url);
        });
    </script>
@endsection