@extends('admin.layouts.master')
@section('title')
    Quản lý danh mục
@endsection
@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
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
        {{-- content-header --}}
        <div class="content">
            <div class="container-fluid">
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                
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
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Chọn vị trí <small>(Giới hạn từ 01 - 10)</small></label></p>
                                        <input class="form-control-sm" type="number" name="position" value="" min="1" max="10" step="1"/>
                                        @if ($errors->has('position'))
                                            <p class="text-danger mb-0">{{ $errors->first('position') }}</p>
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
                <div class="modal" tabindex="-1" role="dialog" id="deletedMenuModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xóa danh mục</h5>          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST">
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
                {{--  Phan danh sach  --}}
                <div class="row">
                    <div class="col-md-8">         
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3>Danh mục</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($menus->sortBy('position') as $menu)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0">
                                                {{ $menu->name }}
                                                @if ($menu->status == 1)
                                                    <span class="right badge badge-primary">Acitve</span>
                                                @else
                                                    <span class="right badge badge-secondary">Not active</span>
                                                @endif
                                            </p>                                         
                                            <div class="button-group d-flex">
                                                <button type="button" class="btn btn-sm btn-primary mr-1 edit-menu" data-toggle="modal" data-target="#editMenuModal" data-id="{{ $menu->id }}" data-name="{{ $menu->name }}" data-position="{{ $menu->position }}">Sửa</button>

                                                <button type="submit" class="btn btn-sm btn-danger deleted-menu" data-toggle="modal" data-target="#deletedMenuModal" data-id="{{ $menu->id }}">Xóa</button>
 
                                            </div>
                                        </div>
            
                                        @if ($menu->ChildMenu)
                                        <ul class="list-group mt-2">
                                            @foreach ($menu->ChildMenus->sortBy('position') as $child)
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-0">
                                                        {{ $child->name }}
                                                        @if ($child->status == 1)
                                                            <span class="right badge badge-primary">Acitve</span>
                                                        @else
                                                            <span class="right badge badge-secondary">Not active</span>
                                                        @endif
                                                    </p>          
                                                    <div class="button-group d-flex">
                                                        <button type="button" class="btn btn-sm btn-primary mr-1 edit-menu" data-toggle="modal" data-target="#editMenuModal" data-id="{{ $child->id }}" data-name="{{ $child->name }}" data-position="{{ $child->position }}">Sửa</button>
            
                                                        <button type="submit" class="btn btn-sm btn-danger deleted-menu" data-toggle="modal" data-target="#deletedMenuModal" data-id="{{ $child->id }}">Xóa</button>
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
                    
                    <div class="col-md-4">
                        
                        <div class="card">  
                            <div class="card-header bg-info">
                                <h5>Tạo danh mục mới</h5>
                            </div>
                            <div class="card-body">
                                
                                <form action="{{ route('admin.menu.them') }}" method="POST">
                                    @csrf          
                                    <div class="form-group">
                                        <select class="form-control" name="parent">
                                            <option value="">Chọn danh mục</option>
            
                                            @foreach ($menus->where('status',1)->sortBy('position') as $menu)
                                            <option value="{{ $menu->id }}">- {{ $menu->name }}</option>
                                            @if ($menu->ChildMenus)
                                                @foreach ($menu->ChildMenus->where('status',1)->sortBy('position') as $child)
                                                <option value="{{ $child->id }}">----- {{ $child->name }}</option>
                                                @endforeach
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
            
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Điền tên danh mục">
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
                                    </div>
                                    <div class="form-group">
                                        <p class="mb-0"><label>Chọn vị trí <small>(Giới hạn từ 01 - 10)</small></label></p>
                                        <input class="form-control-sm" type="number" name="position" value="1" min="1" max="10" step="1"/>
                                        @if ($errors->has('position'))
                                            <p class="text-danger mb-0">{{ $errors->first('position') }}</p>
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
        $('.edit-menu').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var position = $(this).data('position');
            var url = "admin/menu/sua/" + id;

            $('#editMenuModal form').attr('action', url);
            $('#editMenuModal form input[name="name"]').val(name);
            $('#editMenuModal form input[name="position"]').val(position);
        });
    </script>
    <script type="text/javascript">
        $('.deleted-menu').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/menu/xoa/" + id;

            $('#deletedMenuModal form').attr('action', url);
        });
    </script>
    <script>
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
    <script>
        $("input[type='number']").inputSpinner()
    </script>
@endsection