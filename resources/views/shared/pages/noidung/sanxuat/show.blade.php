@extends('shared.layouts.master')
@section('title')
Hoạt động sản xuất
@endsection
@section('content')
<div style="background-color: #e9ecef;">
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb row">
            <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tình hình hoạt động sản xuất</li>
        </ol>
    </nav>
</div>
<div class="container">
    @if (session('thongbao'))
        @include('shared.layouts.thongbao')
    @endif
    @if (Auth::check())
        @if (Auth::user()->role == 1)
        <div class="btn-group btn-group-sm mb-2">
            <a href="{{ route('themsanxuat') }}" title="thêm" class="btn btn-outline-success"><i class="fas fa-plus"></i> Thêm</a>

            <a href="{{ route('admin.sanxuat.list') }}" title="quản lý" class="btn btn-outline-info"><i class="fas fa-cogs"></i> Quản lý</a>
        </div>
        @elseif (Auth::user()->role == 2 )
        <div class="btn-group btn-group-sm mb-2">    
            <a href="{{ route('themsanxuat') }}" title="thêm" class="btn btn-outline-success"><i class="fas fa-plus"></i> Thêm</a>
        </div>
        @endif
    @endif
    {{--  tình hình hoạt động sản xuất theo ngày  --}}
    <h5 class="text-danger">THÔNG TIN THEO NGÀY</h5>
    <form action="{{ route('sanxuatngay')}}" method="post" accept-charset="utf-8">
        @csrf
        <div class="form-inline">
            <div class="input-group date" id="datetimepicker_SXday">
                <input type="text" class="form-control">
                {{-- <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                </div> --}}
                <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>		
    <div class="row mt-3">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header bg-white" style="border-top: 3px solid #007bff">
                    <h6 class="card-title text-primary text-center mb-0">NMTĐ KHE DIÊN</h6>
                </div>
                <div class="card-body"> 
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td class="text-primary">Công suất (MW):</td>
                                <td class="text-right">
                                    <span class="text-danger">{{!empty($thsxkd_day)? number_format($thsxkd_day->power, 1, ',', '.'):'' }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="text-danger">{{!empty($thsxkd_day)? number_format($thsxkd_day->Muctieunam->ratedpower,1,',','.'):'' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">Sản lượng (MWh):</td>
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong ngày:</td>
                                <td class="text-danger text-right">{{!empty($thsxkd_day)? number_format($thsxkd_day->quantity, 3, ',', '.'):'' }}</td>
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong tháng:</td>
                                <td class="text-danger text-right">{{!empty($thsxkd_day)? number_format($sum_month_kd, 3, ',', '.'):'' }}</td>
                                
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong năm:</td>
                                <td class="text-right">
                                    <span class="text-danger">{{!empty($thsxkd_day)? number_format($sum_year_kd, 3, ',', '.'):'' }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="text-danger">{{!empty($thsxkd_day)? number_format($thsxkd_day->Muctieunam->quantity,3,',','.'):'' }}</span>
                                </td>
                            </tr>
                            @if (Auth::check())
                                @if (Auth::user()->role == 1 ||Auth::user()->role == 2)
                                <tr>
                                    <td class="text-primary">Mực nước hồ (m):</td>
                                    <td class="text-danger text-right">{{!empty($thsxkd_day)? number_format($thsxkd_day->MNH,2,',','.'):'' }}</td>
                                </tr>
                                @endif
                            @endif
                            <tr>
                                <td class="text-primary">Lượng mưa (mm):</td>
                                <td class="text-danger text-right">{{!empty($thsxkd_day)? number_format($thsxkd_day->rain,1,',','.'):'' }}</td>
                            </tr>
                        </tbody>
                        
                    </table> 
                    @if (Auth::check())
                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                            <span class="float-right"><a href="{{ !empty($thsxkd_day)? route('suasanxuat',$thsxkd_day->id): route('themsanxuat') }}" title="sửa" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i> Sửa</a></span>
                        @endif
                    @endif
                    
                </div>					
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header bg-white" style="border-top: 3px solid #007bff">
                    <h6 class="card-title text-primary text-center mb-0">NMTĐ KRÔNG HNĂNG </h6>
                </div>
                <div class="card-body">
                    
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td class="text-primary">Công suất (MW):</td>
                                <td class="text-right">
                                    <span class="text-danger">{{!empty($thsxkn_day)? number_format($thsxkn_day->power, 1, ',', '.'):'' }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="text-danger">{{!empty($thsxkn_day)? number_format($thsxkn_day->Muctieunam->ratedpower,1,',','.'):'' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">Sản lượng (MWh):</td>
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong ngày:</td>
                                <td class="text-danger text-right">{{!empty($thsxkn_day)? number_format($thsxkn_day->quantity, 3, ',', '.'):'' }}</td>
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong tháng:</td>
                                <td class="text-danger text-right">{{!empty($thsxkn_day)? number_format($sum_month_kn, 3, ',', '.'):'' }}</td>
                                
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong năm:</td>
                                <td class="text-right">
                                    <span class="text-danger">{{!empty($thsxkn_day)? number_format($sum_year_kn, 3, ',', '.'):'' }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="text-danger">{{!empty($thsxkn_day)? number_format($thsxkn_day->Muctieunam->quantity,3,',','.'):'' }}</span>
                                </td>
                            </tr>
                            @if (Auth::check())
                                @if (Auth::user()->role == 1 ||Auth::user()->role == 2)
                                <tr>
                                    <td class="text-primary">Mực nước hồ (m):</td>
                                    <td class="text-danger text-right">{{!empty($thsxkn_day)? number_format($thsxkn_day->MNH,2,',','.'):'' }}</td>
                                </tr>
                                @endif
                            @endif
                            <tr>
                                <td class="text-primary">Lượng mưa (mm):</td>
                                <td class="text-danger text-right">{{!empty($thsxkn_day)? number_format($thsxkn_day->rain,1,',','.'):'' }}</td>
                            </tr>
                        </tbody>
                    </table> 
                    @if (Auth::check())
                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                            <span class="float-right"><a href="{{ !empty($thsxkn_day)? route('suasanxuat',$thsxkn_day->id): route('themsanxuat') }}" title="sửa" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i> Sửa</a></span>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h5 class="text-danger">THÔNG TIN THEO THÁNG</h5>
    <form action="{{ route('sanxuatthang') }}" method="post" accept-charset="utf-8">
        @csrf
        <div class="form-row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Chọn Nhà máy:</label>
                    {{-- {{ dd($thsx_month->first()->Muctieunam->Factory->id) }} --}}
                    <select name="factory_id" class="form-control">
                        @if (empty($thsx_month))
                            @foreach ($factory as $f)
                            <option value="{{$f->id}}">{{ $f->name }}</option>
                            @endforeach
                        @else
                            @foreach ($factory as $f)
                            <option {{ $muctieunam->Factory->id == $f->id ? 'selected': '' }} value="{{$f->id}}">{{ $f->name }}</option>
                            @endforeach
                        @endif
                        
                    </select>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Chọn thời gian:</label>
                    <div class="input-group date" id="datetimepicker_SXmonth">
                        <input type="text" class="form-control">
                    </div>
                    
                </div>
            </div>
            @if ($errors->has('date'))
                <p class="text-danger mb-0">{{ $errors->first('date') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary ml-2">Xem thông tin</button>
    </form>
    {{--  bảng hiển thị thông tin  --}}
    @isset($thsx_month)
    <div class="card">
        <div class="card-header">
            <h6 class="card-title text-primary">Tổng sản lượng</h6>
            <p class="card-text">
                <span>Sản lượng tháng: </span>
                <span class="text-danger">{{!empty($thsx_month)? number_format($sum_month,3,',','.'):'' }} </span> <span>(triệu kWh)</span>
            </p>
            <p class="card-text">
                <span>Sản lượng năm: </span>
                <span class="text-danger">{{!empty($thsx_month)? number_format($sum_year,3,',','.'):'' }}</span> 
                <span> / </span>
                <span class="text-danger">{{$thsx_month->first()->Muctieunam->quantity }}</span> 
                <span>(triệu kWh)</span>
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm">
                    <thead class="text-center">
                        <tr>
                            <th>Ngày</th>
                            <th>Công suất (MW)</th>
                            <th>Sản lượng (MWh)</th>
                            <th>Lượng mưa (mm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thsx_month as $m)
                        <tr>
                            <td class="text-center">{{ !empty($thsx_month)? date("d/m/Y", strtotime($m->date)) : "" }}</td>
                            <td class="text-right">{{!empty($thsx_month)? number_format($m->power,1,',','.'):'' }}</td>
                            <td class="text-right">{{!empty($thsx_month)? number_format($m->quantity,3,',','.'):'' }}</td>
                            <td class="text-right">{{!empty($thsx_month)? number_format($m->rain,1,',','.'):'' }}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
    @endisset

</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker_SXday').datepicker({
            format: "dd/mm/yyyy"
        });
    });
    
</script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker_SXmonth').datepicker({
            format: "mm/yyyy",
            minViewMode: 1
        });
    });
</script>
@endsection
