@extends('admin.layouts.master')
@section('title')
    Mục tiêu sản xuất
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách: <small>Mục tiêu sản xuất đã xóa</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Tình hình SX</a></li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        {{--  modal xóa  --}}
        <div class="modal" tabindex="-1" role="dialog" id="deletedMuctieuModal">
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
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                
                {{--  Ket thuc phan thong bao  --}}
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="table-muctieus">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Công suất (MW)</th>
                                <th>Sản lượng (triệu kWh)</th>
                                <th>MNC (m)</th>
                                <th>MNDBT (m)</th>
                                <th>Phục hồi</th>
                                <th>Xóa vĩnh viễn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($muctieu as $m)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $m->title }}</td>
                                <td>{{ number_format($m->ratedpower, 1, ',', '.')}}</td>
                                <td>{{ number_format($m->quantity, 3, ',', '.')}}</td>
                                <td>{{ number_format($m->MNHlowest, 2, ',', '.')}}</td>
                                <td>{{ number_format($m->MNHnormal, 2, ',', '.')}}</td>
                                <td><a href="{{ route('admin.muctieu.restore',$m->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-trash-restore"></i></a></td>
                                <td><button class="btn btn-danger btn-sm btn-detete" data-id="{{ $m->id }}" data-toggle="modal" data-target="#deletedMuctieuModal"><i class="far fa-trash-alt"></i></button></td>
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
            $('#table-muctieus').DataTable({
                
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
            var url = "admin/muctieu/forcedelete/"+ id;
            $('#deletedMuctieuModal form').attr('action', url);
        });
    </script>
@endsection