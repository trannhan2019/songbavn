@extends('admin.layouts.master')
@section('title')
    Danh mục ý kiến
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách: <small>danh mục ý kiến đã xóa</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Nội dung đã xóa</a></li>
                            <li class="breadcrumb-item active">Danh mục ý kiến đã xóa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}

        
        <div class="content">
            <div class="container-fluid">
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                {{--  Ket thuc phan thong bao  --}}
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="table-trashdanhmucykien">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Tên danh mục</th>
                                <th>Slug</th>
                                <th>Phục hồi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($danhmucykien as $d)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->slug }}</td>
                                <td><a href="admin/content/{{ $d->id }}/danh-muc-y-kien-restore.html" class="btn btn-sm btn-primary">Phục hồi <i class="fas fa-trash-restore"></i></a></td>
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
            $('#table-trashdanhmucykien').DataTable({
                
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