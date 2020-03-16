@extends('admin.layouts.master')
@section('title')
    Quản lý người dùng
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách người dùng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        <a href="{{ route('admin.user.them') }}" class="btn btn-primary ml-3 mb-3"><i class="fas fa-plus"></i>Thêm mới</a>
        <div class="content">
            <div class="container-fluid">
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading">Thành công!</h5>
                        <hr>
                        <p>{{ session('thongbao') }}</p>                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                @if (count($errors)>0)
                    <div class="alert alert-danger alert-dismissible fade show">
                        <h5 class="alert-heading">Lỗi!</h5>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <hr>
                        @foreach ($errors->all() as $err)
                            - {{ $err }}<br>
                        @endforeach
                    </div>
                @endif
                {{--  Ket thuc phan thong bao  --}}
            </div>
            <div class="table-responsive-sm">
                <table class="table table-hover table-sm" id="table-users">
                    <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Tên đăng nhập</th>
                            <th>Quyền</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        {{--  Ket thuc Phan noi dung  --}}
    </div>
@endsection

@section('script')
<script>
    $(function() {
        $('#table-users').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.user.datatable') }}',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'fullname', name: 'fullname' },
                { data: 'username', name: 'username' },
                { data: 'role', name: 'role' },
                { data: 'active', name: 'active' },
                { data: 'detail', name: 'detail' },
                { data: 'edit', name: 'edit' },
                { data: 'delete', name: 'delete' }
            ]
        });
        
    });
</script>
@endsection