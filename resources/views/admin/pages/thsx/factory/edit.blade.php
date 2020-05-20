@extends('admin.layouts.master')
@section('title')
    Sửa thông tin nhà máy
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sửa: <small>thông tin nhà máy</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.factory.list') }}">Thông tin Nhà máy</a></li>
                            <li class="breadcrumb-item active">Sửa thông tin nhà máy</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Sửa thông tin nhà máy</h3>
                            </div>
                            <form action="{{ route('admin.factory.edit',$factory->id) }}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên nhà máy <span class="text-danger">(*)</label>
                                        <input type="text" name="name" class="form-control" value="{{ $factory->name }}">
                                        @if ($errors->has('name'))
                                            <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Ký hiệu <span class="text-danger">(*)</label>
                                        <input type="text" name="alias" class="form-control" value="{{ $factory->alias }}">
                                        @if ($errors->has('alias'))
                                            <p class="text-danger mb-0">{{ $errors->first('alias') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái <span class="text-danger">(*)</span></label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $factory->status==1 ? 'checked':'' }} name="status" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $factory->status==0 ? 'checked':'' }} name="status" value="0">Không hiển thị
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <button type="reset" class="btn btn-default float-right">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
