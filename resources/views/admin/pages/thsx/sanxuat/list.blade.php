@extends('admin.layouts.master')
@section('title')
    Tình hình sản xuất
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách: <small>Tình hình sản xuất</small></h1>
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
        
        {{--  Them moi  --}}
        <a href="{{ route('admin.sanxuat.add') }}" class="btn btn-primary ml-3 mb-3"><i class="fas fa-plus"></i> Thêm mới</a>
        <div class="content">
            <div class="container-fluid">
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                
                {{--  Ket thuc phan thong bao  --}}
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="table-sanxuats">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Nhà máy</th>
                                <th>Ngày</th>
                                <th>Công suất (MW)</th>
                                <th>Sản lượng (triệu kWh)</th>
                                <th>Mực nước hồ (m)</th>
                                <th>Lượng mưa (mm)</th>
                                <th>Trạng thái</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
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
            $('#table-sanxuats').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.sanxuat.datatable') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'muctieunam_id', name: 'muctieunam_id' },
                    { data: 'date', name: 'date'},
                    { data: 'power', name: 'power' },
                    { data: 'quantity', name: 'quantity' },
                    { data: 'MNH', name: 'MNH' },
                    { data: 'rain', name: 'rain' },
                    { data: 'status', name: 'status' },
                    { data: 'edit', name: 'edit', orderable: false, searchable: false },
                    { data: 'delete', name: 'delete', orderable: false, searchable: false }
                ],
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
    
@endsection