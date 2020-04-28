@extends('admin.layouts.master')
@section('title')
    Cập nhật tình hình sản xuất
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sửa: <small>Thông tin sản xuất</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="#">Tình hình SX</a></li>
                            <li class="breadcrumb-item active">Sửa thông tin</li>
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
                              <h3 class="card-title">Sửa nội dung</h3>
                            </div>
                            <form action="{{ route('admin.sanxuat.edit',$sanxuat->id) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nhà máy <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="muctieunam_id">
                                            @foreach ($muctieu as $m)
                                            <option {{ $sanxuat->Muctieunam->id == $m->id ? 'selected': '' }} value="{{$m->id}}">{{ $m->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ngày <span class="text-danger">(*)</span></label>
                                        <div class="input-group date" id="datetimepickerEditsx" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerEditsx" name="date" value="{{ date("d/m/Y", strtotime($sanxuat->date))}}"/>
                                            <div class="input-group-append" data-target="#datetimepickerEditsx" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                        @if ($errors->has('date'))
                                            <p class="text-danger mb-0">{{ $errors->first('date') }}</p>
                                        @endif                                     
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Công suất (MW) <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="power" value="{{ $sanxuat->power }}" min="0" max="500" step="0.1" data-decimals="2"/>
                                        @if ($errors->has('power'))
                                            <p class="text-danger mb-0">{{ $errors->first('power') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Sản lượng (triệu kWh) <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="quantity" value="{{ $sanxuat->quantity }}" min="0" max="500" step="0.001" data-decimals="3"/>
                                        @if ($errors->has('quantity'))
                                            <p class="text-danger mb-0">{{ $errors->first('quantity') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Mực nước hồ (m) <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="MNH" value="{{ $sanxuat->MNH }}" min="0" max="500" step="0.01" data-decimals="2"/>
                                        @if ($errors->has('MNH'))
                                            <p class="text-danger mb-0">{{ $errors->first('MNH') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Lượng mưa (mm) <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="rain" value="{{ $sanxuat->rain }}" min="0" max="500" data-decimals="1" step="0.1"/>
                                        @if ($errors->has('rain'))
                                            <p class="text-danger mb-0">{{ $errors->first('rain') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tình trạng thiết bị <span class="text-danger">(*)</label>
                                        <input type="text" name="device" class="form-control" value="{{ $sanxuat->device }}">
                                        @if ($errors->has('device'))
                                            <p class="text-danger mb-0">{{ $errors->first('device') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái <span class="text-danger">(*)</span></label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $sanxuat->status==1 ? 'checked':'' }} name="status" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $sanxuat->status==0 ? 'checked':'' }} name="status" value="0">Không hiển thị
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
@section('script')
    <script type="text/javascript">
		$(function () {
			$('#datetimepickerEditsx').datetimepicker({
                
                locale: 'vi',
                format: 'DD/MM/YYYY'

			});
        });
    </script>
@endsection
