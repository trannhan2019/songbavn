@extends('admin.layouts.master')
@section('title')
    Người dùng đã xóa
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Người dùng đã xóa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Thùng rác</a></li>
                            <li class="breadcrumb-item active">Người dùng đã xóa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        <div class="modal" tabindex="-1" role="dialog" id="deletedUserModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa người dùng</h5>          
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="POST">
                    @csrf        
                        <div class="modal-body">
                            <h6>Bạn chắc chắn muốn xóa người dùng này ?</h6>
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
                    <table class="table table-hover table-sm" id="trash-users">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Tên đăng nhập</th>  
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Phục hồi</th>
                                <th>Xóa vĩnh viễn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->role==0?'Không có quyền':'' }}
                                    {{ $user->role==1?'Quyền quản trị':'' }}
                                    {{ $user->role==2?'Quyền chỉnh sửa THSX':'' }}
                                    {{ $user->role==3?'Quyền cổ đông':'' }}
                                </td>
                                <td><a href="{{ route('admin.user.restore', $user->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-trash-restore"></i> Phục hồi</a></td>
                                <td><button class="btn btn-danger btn-sm btn-detete" data-id="{{ $user->id }}" data-toggle="modal" data-target="#deletedUserModal"><i class="far fa-trash-alt"></i> Delete</button></td>
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
            $('#trash-users').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $('.btn-detete').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/user/forcedelete/" + id;
            $('#deletedUserModal form').attr('action', url);
        });
    </script>
@endsection