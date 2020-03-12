@extends('admin.layouts.master')
@section('title')
    Quản lý danh mục
@endsection
@section('content')
    <div class="content-wrapper">
        {{-- <!-- Content Header (Page header) --> --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Quản lý danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản trị</a></li>
                            <li class="breadcrumb-item active">Danh mục</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- <!-- /.content-header --> --}}
        <div class="content">
            <div class="container-fluid">
                {{--  Phan modal sửa thông tin  --}}
                <div class="modal" tabindex="-1" role="dialog" id="editMenuModal">
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
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </div>
                            </form>
                        </div>                      
                    </div>
                </div>
                {{--  Kết thúc phần modal  --}}
                
                <div class="row">
                    <div class="col-md-8">         
                        <div class="card">
                            <div class="card-header">
                                <h3>Danh mục</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($menus->sortBy('position') as $menu)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            {{ $menu->name }}      
                                            <div class="button-group d-flex">
                                                <button type="button" class="btn btn-sm btn-primary mr-1 edit-menu" data-toggle="modal" data-target="#editMenuModal" data-id="{{ $menu->id }}" data-name="{{ $menu->name }}" data-status="{{ $menu->status }}">Sửa</button>
            
                                                <form action="" method="POST">
                                                    @csrf   
                                                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
            
                                        @if ($menu->ChildMenu)
                                        <ul class="list-group mt-2">
                                            @foreach ($menu->ChildMenu->sortBy('position') as $child)
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    {{ $child->name }}
            
                                                    <div class="button-group d-flex">
                                                        <button type="button" class="btn btn-sm btn-primary mr-1 edit-menu" data-toggle="modal" data-target="#editMenuModal" data-id="{{ $child->id }}" data-name="{{ $child->name }}" data-status="{{ $child->status }}">Sửa</button>
            
                                                        <form action="" method="POST">
                                                            @csrf          
                                                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
            {{--  PHẦN TẠO MỚI DANH MỤC  --}}
                    <div class="col-md-4">
                    @if (session('thongbao'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('thongbao') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                     @endif
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3>Tạo danh mục mới</h3>
                            </div>
            
                            <div class="card-body">
                                <form action="admin/menu/them" method="POST">
                                    @csrf          
                                    <div class="form-group">
                                        <select class="form-control" name="parent">
                                            <option value="">Chọn danh mục</option>
            
                                            @foreach ($menus->sortBy('position') as $menu)
                                            <option value="{{ $menu->id }}">- {{ $menu->name }}</option>
                                            @if ($menu->ChildMenu)
                                                @foreach ($menu->ChildMenu->sortBy('position') as $child)
                                                <option value="{{ $child->id }}">----- {{ $child->name }}</option>
                                                @endforeach
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
            
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Điền tên danh mục">
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
                                    </div>
                                    <div class="form-group">
                                        <p class="mb-0"><label>Chọn vị trí <small>(Giới hạn từ 01 - 10)</small></label></p>
                                        <input class="form-control-sm" type="number" name="position" value="1" min="1" max="10" step="1"/>
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
        $('.edit-menu').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');
        var url = "admin/menu/sua/" + id;

        $('#editMenuModal form').attr('action', url);
        $('#editMenuModal form input[name="name"]').val(name);
        });
    </script>
    <script>
        $("input[type='number']").inputSpinner()
    </script>
@endsection