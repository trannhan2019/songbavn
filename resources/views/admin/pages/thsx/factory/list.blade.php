@extends('admin.layouts.master')
@section('title')
    Thông số Nhà máy
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Danh sách: <small>Thông số nhà máy</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Tình hình SX</a></li>
                            <li class="breadcrumb-item active">Danh sách Nhà máy</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- content-header --}}
        {{--  Phan noi dung  --}}
        {{--  modal xóa  --}}
        <div class="modal" tabindex="-1" role="dialog" id="deletedFactoryModal">
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
        
        <div class="content">
            <div class="container-fluid">
                {{--  Phan thong bao  --}}
                @if (session('thongbao'))
                    @include('admin.layouts.thongbao')
                @endif
                {{--  Ket thuc phan thong bao  --}}
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5>Danh sách</h5>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-hover table-sm" id="table-factorys">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên nhà máy</th>
                                            <th>Ký hiệu</th>                          
                                            <th>Trạng thái</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
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
                                            <td >{{ $f->alias }}</td>
                                            <td>
                                                {!! $f->status==1 ? '<span class="badge badge-primary">Hoạt động</span>':'<span class="badge badge-secondary">Không hoạt động</span>' !!} 
                                           </td>
                                            <td><a href="{{ route('admin.factory.edit',$f->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>
                                            <td><button class="btn btn-danger btn-sm btn-detete" data-id="{{ $f->id }}" data-toggle="modal" data-target="#deletedFactoryModal"><i class="far fa-trash-alt"></i></button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">  
                            <div class="card-header bg-info">
                                <h5>Tạo thông tin mới</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.factory.add') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên nhà máy <span class="text-danger">(*)</label>
                                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Ký hiệu <span class="text-danger">(*)</label>
                                        <input type="text" name="alias" class="form-control" value="{{old('alias')}}">
                                        @if ($errors->has('alias'))
                                            <p class="text-danger mb-0">{{ $errors->first('alias') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái <span class="text-danger">(*)</span></label></p>
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
        {{--  Ket thuc Phan noi dung  --}}
       
    </div>
    
@endsection

@section('script')
    <script type="text/javascript">
        $('.btn-detete').on('click', function() {
            var id = $(this).data('id');
            var url = "admin/factory/delete/"+ id;
            $('#deletedFactoryModal form').attr('action', url);
        });
    </script>
@endsection