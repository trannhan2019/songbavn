@extends('shared.layouts.master')
@section('title')
Hoạt động sản xuất
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sanxuat') }}">Tình hình hoạt động sản xuất</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa thông tin</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Sửa nội dung</h3>
                </div>
                <form action="{{ route('suasanxuat',$sanxuat->id) }}" method="post">
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
                            <div class="input-group date" id="datetimepickerEditsx">
                                <input type="text" class="form-control" name="date" value="{{ date("d/m/Y", strtotime($sanxuat->date))}}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
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
                            <input class="form-control-sm" type="number" name="quantity" value="{{ $sanxuat->quantity }}" min="0" max="500" step="0.0001" data-decimals="4"/>
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
                        <a href="{{ route('sanxuat') }}" class="btn btn-default float-right">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
		$(function () {
			$('#datetimepickerEditsx').datepicker({
                format: "dd/mm/yyyy",
                weekStart: 1,
                todayBtn: "linked",
                language: "vi",
                autoclose: true,
                todayHighlight: true
			});
        });
    </script>
@endsection