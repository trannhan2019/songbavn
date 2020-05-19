@extends('admin.layouts.master')
@section('title')
    {{ $menu->name }}
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ $menu->Parent->name }}: <small>{{ $menu->name }}</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.content.tuyendung',$menu->id)}}">{{ $menu->name}}</a></li>
                            <li class="breadcrumb-item active">Danh sách</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        {{--  modal xóa  --}}
        <div class="modal" tabindex="-1" role="dialog" id="deletedTuyendungModal">
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
        <a href="admin/content/{{ $menu->id }}/add-tuyen-dung.html" class="btn btn-primary ml-3 mb-3"><i class="fas fa-plus"></i> Thêm mới</a>
        <div class="content">
            <div class="container-fluid">
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                {{--  Ket thuc phan thong bao  --}}
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="table-tuyendungs">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Danh mục</th>
                                <th>Tiêu đề</th>  
                                <th>Trạng thái</th>
                                <th>Lượt xem</th>
                                <th>Nổi bật</th>
                                <th>Người tạo</th>
                                <th>Thời gian tạo</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($content as $ct)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>
                                    <a href="admin/content/{{ $ct->id }}/detail-tuyen-dung.html">{{ $ct->title }}</a>
                                </td>
                                <td>
                                     {!! $ct->status==1 ? '<span class="badge badge-primary">Hoạt động</span>':'<span class="badge badge-secondary">Không hoạt động</span>' !!} 
                                </td>
                                <td class="text-center">{{ $ct->views }}</td>
                                <td>{{ $ct->highlights==1 ? 'Có':'Không' }}</td>
                                <td>{{ $ct->User->fullname }}</td>
                                <td>{{ $ct->created_at ? $ct->created_at->format('d/m/Y H:i'):'' }}</td>
                                <td><a href="admin/content/{{ $ct->id }}/edit-tuyen-dung.html" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                                <td><button class="btn btn-danger btn-sm btn-detete" data-id="{{ $ct->id }}" data-toggle="modal" data-target="#deletedTuyendungModal"><i class="far fa-trash-alt"></i></button></td>
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
            $('#table-tuyendungs').DataTable({
                
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
            var url = "admin/content/"+ id +"/delete-tuyen-dung.html";
            $('#deletedTuyendungModal form').attr('action', url);
        });
    </script>
@endsection