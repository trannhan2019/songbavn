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
                        <h1 class="m-0 text-dark">Thêm: <small>Thông số nhà máy</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Tình hình SX</a></li>
                            <li class="breadcrumb-item active">Thêm thông tin</li>
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
                              <h3 class="card-title">Thêm nội dung mới</h3>
                            </div>
                            <form action="{{ route('admin.factory.add') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên nhà máy <span class="text-danger">(*)</label>
                                        <input type="text" name="name" class="form-control">
                                        @if ($errors->has('name'))
                                            <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Ký hiệu <span class="text-danger">(*)</label>
                                        <input type="text" name="alias" class="form-control">
                                        @if ($errors->has('alias'))
                                            <p class="text-danger mb-0">{{ $errors->first('alias') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Công suất định mức <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="ratedpower" value="" min="0" max="100" step="0.1" data-decimals="1"/>
                                        @if ($errors->has('ratedpower'))
                                            <p class="text-danger mb-0">{{ $errors->first('ratedpower') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Mực nước chết <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="MNHlowest" value="" min="0" max="500" step="0.01" data-decimals="2"/>
                                        @if ($errors->has('MNHlowest'))
                                            <p class="text-danger mb-0">{{ $errors->first('MNHlowest') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Mực nước dâng bình thường <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="MNHnormal" value="" min="0" max="500" data-decimals="2" step="0.01"/>
                                        @if ($errors->has('MNHnormal'))
                                            <p class="text-danger mb-0">{{ $errors->first('MNHnormal') }}</p>
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

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
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
@section('script')
    <script type="text/javascript">
		$(function () {
			$('#datetimepickerCreatsl').datetimepicker({
                locale: 'vi',
                format: 'DD/MM/YYYY HH:mm'
			});
        });
    </script>
@endsection