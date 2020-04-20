@extends('admin.layouts.master')
@section('title')
    Danh mục ý kiến
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Quản lý danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Quan hệ cổ đông</a></li>
                            <li class="breadcrumb-item active">Danh mục ý kiến</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                {{--  Phan modal sửa thông tin  --}}
                <div class="modal" tabindex="-1" role="dialog" id="editDanhmucYkienModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Sửa thông tin danh mục</h5>          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
            
                            <form action="" method="POST">
                                @csrf        
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="" placeholder="Tên danh mục">
                                        @if ($errors->has('name'))
                                            <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <p class="mb-0"><label>Cho phép hiển thị</label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" checked name="status" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" value="0">Không hiển thị
                                            </label>
                                        </div>
                                        @if ($errors->has('status'))
                                            <p class="text-danger mb-0">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>

                                </div>
                                <div class="modal-footer">                                
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>                      
                    </div>
                </div>
                {{--  Kết thúc phần modal  --}}
                {{--  Phan modal Xóa thong tin  --}}
                <div class="modal" tabindex="-1" role="dialog" id="deletedDanhmucYkienModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xóa danh mục</h5>          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="post">
                            @csrf        
                                <div class="modal-body">
                                    <h6>Bạn chắc chắn muốn xóa danh mục này ?</h6>
                                </div>
                                <div class="modal-footer">                                
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">         
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3>Danh mục</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($listdanhmuc as $ld)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0">
                                                {{ $ld->name }}
                                                @if ($ld->status == 1)
                                                    <span class="right badge badge-primary">Acitve</span>
                                                @else
                                                    <span class="right badge badge-secondary">Not active</span>
                                                @endif
                                            </p>                                         
                                            <div class="button-group d-flex">
                                                <button type="button" class="btn btn-sm btn-primary mr-1 edit-listdm" data-toggle="modal" data-target="#editDanhmucYkienModal" data-id="{{ $ld->id }}" data-name="{{ $ld->name }}">Sửa</button>

                                                <button type="button" class="btn btn-sm btn-danger deleted-listdm" data-toggle="modal" data-target="#deletedDanhmucYkienModal" data-id="{{ $ld->id }}">Xóa</button>
 
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        
                        <div class="card">  
                            <div class="card-header bg-info">
                                <h5>Tạo danh mục mới</h5>
                            </div>
                            <div class="card-body">
                                
                                <form action="admin/content/add-danh-muc-y-kien.html" method="POST">
                                    @csrf          
           
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Điền tên danh mục">
                                        @if ($errors->has('name'))
                                            <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <p class="mb-0"><label>Cho phép hiển thị</label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" checked name="status" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status" value="0">Không hiển thị
                                            </label>
                                        </div>
                                        @if ($errors->has('status'))
                                            <p class="text-danger mb-0">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>
                                                                      
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $('.edit-listdm').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var url = "admin/content/" + id + "/edit-danh-muc-y-kien.html";

            $('#editDanhmucYkienModal form').attr('action', url);
            $('#editDanhmucYkienModal form input[name="name"]').val(name);
        });
    </script>
    <script type="text/javascript">
        $('.deleted-listdm').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/content/" + id + "/delete-danh-muc-y-kien.html";
            $('#deletedDanhmucYkienModal form').attr('action', url);
        });
    </script>
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#editDanhmucYkienModal').modal('show');
        @endif
    </script>
@endsection