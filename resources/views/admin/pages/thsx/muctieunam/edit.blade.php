@extends('admin.layouts.master')
@section('title')
Mục tiêu sản xuất
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Content Header (Page header)--}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sửa: <small>Mục tiêu sản xuất năm</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.muctieu.list') }}">Mục tiêu sản xuất</a></li>
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
                              <h3 class="card-title">Sửa thông tin mục tiêu sản xuất</h3>
                            </div>
                            <form action="{{ route('admin.muctieu.edit',$muctieu->id) }}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nhà máy <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="factory_id">
                                            @foreach ($factory as $f)
                                            <option {{ $muctieu->Factory->id == $f->id ? 'selected': '' }} value="{{$f->id}}">{{ $f->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Năm <span class="text-danger">(*)</span></label>
                                        <div class="input-group date" id="datetimepickerEditmt">
                                            <input type="text" class="form-control" name="year" value="{{$muctieu->year}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('year'))
                                            <p class="text-danger mb-0">{{ $errors->first('year') }}</p>
                                        @endif                                     
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Công suất định mức (MW) <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="ratedpower" value="{{ $muctieu->ratedpower }}" min="0" max="500" step="0.1" data-decimals="2"/>
                                        @if ($errors->has('ratedpower'))
                                            <p class="text-danger mb-0">{{ $errors->first('ratedpower') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Sản lượng (triệu kWh) <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="quantity" value="{{ $muctieu->quantity }}" min="0" max="500" step="0.01" data-decimals="3"/>
                                        @if ($errors->has('quantity'))
                                            <p class="text-danger mb-0">{{ $errors->first('quantity') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Mực nước chết (m) <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="MNHlowest" value="{{ $muctieu->MNHlowest }}" min="0" max="500" step="0.01" data-decimals="2"/>
                                        @if ($errors->has('MNHlowest'))
                                            <p class="text-danger mb-0">{{ $errors->first('MNHlowest') }}</p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <p class="mb-0"><label>Mực nước dâng bình thường (m) <span class="text-danger">(*)</span></label></p>
                                        <input class="form-control-sm" type="number" name="MNHnormal" value="{{ $muctieu->MNHnormal }}" min="0" max="500" data-decimals="2" step="0.01"/>
                                        @if ($errors->has('MNHnormal'))
                                            <p class="text-danger mb-0">{{ $errors->first('MNHnormal') }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <p class="mb-0"><label>Trạng thái <span class="text-danger">(*)</span></label></p>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $muctieu->status==1 ? 'checked':'' }} name="status" value="1">Cho phép hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" {{ $muctieu->status==0 ? 'checked':'' }} name="status" value="0">Không hiển thị
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
        $('#datetimepickerEditmt').datepicker({
            format: "yyyy",
            weekStart: 1,
            minViewMode: 2,
            language: "vi",
            autoclose: true
        });
    });
</script>
@endsection
