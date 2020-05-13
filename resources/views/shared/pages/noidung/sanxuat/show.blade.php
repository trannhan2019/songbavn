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
    {{--  tình hình hoạt động sản xuất theo ngày  --}}
    <h6 class="text-danger">THÔNG TIN THEO NGÀY</h6>
    <form action="Tinhhinh_SX_submit" method="get" accept-charset="utf-8">
        <div class="form-inline">
            <div class="input-group date" id="datetimepicker_SXday" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker_SXday" name="created_at" value="{{ !empty($thsx_day)? date("d/m/Y", strtotime($thsx_day->date)) : "" }}"/>
                <div class="input-group-append" data-target="#datetimepicker_SXday" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                </div>
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
                    @php
                        $thsxkd_day = \App\Factory::where('alias','NMKD')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime($thsx_day->date)))->first();
                        $month_kd = date("m", strtotime($thsxkd_day->date));
                        $year_kd = date("Y", strtotime($thsxkd_day->date));
                        $muctieunam_kd = $thsxkd_day->Muctieunam->id;
                        $sum_month_kd = \App\Thsx::whereYear('created_at', $year_kd)
                        ->whereMonth('created_at', $month_kd)->where('muctieunam_id',$muctieunam_kd)
                        ->sum('quantity');
                        $sum_year_kd = \App\Thsx::whereYear('created_at', $year_kd)->where('muctieunam_id',$muctieunam_kd)
                        ->sum('quantity');
                    @endphp
                    @isset($thsxkd_day)
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td class="text-primary">Công suất (MW):</td>
                                <td class="text-right">
                                    <span class="text-danger">{{ number_format($thsxkd_day->power, 1, ',', '.') }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="text-danger">{{ number_format($thsxkd_day->Muctieunam->ratedpower,1,',','.') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">Sản lượng (MWh):</td>
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong ngày:</td>
                                <td class="text-danger text-right">{{ number_format($thsxkd_day->quantity, 3, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong tháng:</td>
                                <td class="text-danger text-right">{{ number_format($sum_month_kd, 3, ',', '.') }}</td>
                                
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong năm:</td>
                                <td class="text-right">
                                    <span class="text-danger">{{ number_format($sum_year_kd, 3, ',', '.') }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="text-danger">{{number_format($thsxkd_day->Muctieunam->quantity,3,',','.') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">Lượng mưa (mm):</td>
                                <td class="text-danger text-right">{{number_format($thsxkd_day->rain,1,',','.') }}</td>
                            </tr>
                        </tbody>
                    </table> 
                    @endisset
                    
                </div>					
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header bg-white" style="border-top: 3px solid #007bff">
                    <h6 class="card-title text-primary text-center mb-0">NMTĐ KRÔNG HNĂNG </h6>
                </div>
                <div class="card-body">
                    @php
                        $thsxkn_day = \App\Factory::where('alias','NMKN')->first()->Thsx->where('status',1)->where('date',date("Y-m-d", strtotime($thsx_day->date)))->first();
                        $month_kn = date("m", strtotime($thsxkn_day->date));
                        $year_kn = date("Y", strtotime($thsxkn_day->date));
                        $muctieunam_kn = $thsxkn_day->Muctieunam->id;
                        $sum_month_kn = \App\Thsx::whereYear('created_at', $year_kn)
                        ->whereMonth('created_at', $month_kn)->where('muctieunam_id',$muctieunam_kn)
                        ->sum('quantity');
                        $sum_year_kn = \App\Thsx::whereYear('created_at', $year_kn)->where('muctieunam_id',$muctieunam_kn)
                        ->sum('quantity');
                    @endphp
                    @isset($thsxkn_day)
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <td class="text-primary">Công suất (MW):</td>
                                <td class="text-right">
                                    <span class="text-danger">{{ number_format($thsxkn_day->power, 1, ',', '.') }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="text-danger">{{ number_format($thsxkn_day->Muctieunam->ratedpower,1,',','.') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">Sản lượng (MWh):</td>
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong ngày:</td>
                                <td class="text-danger text-right">{{ number_format($thsxkn_day->quantity, 3, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong tháng:</td>
                                <td class="text-danger text-right">{{ number_format($sum_month_kn, 3, ',', '.') }}</td>
                                
                            </tr>
                            <tr>
                                <td>Tổng sản lượng trong năm:</td>
                                <td class="text-right">
                                    <span class="text-danger">{{ number_format($sum_year_kn, 3, ',', '.') }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="text-danger">{{number_format($thsxkn_day->Muctieunam->quantity,3,',','.') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-primary">Lượng mưa (mm):</td>
                                <td class="text-danger text-right">{{number_format($thsxkn_day->rain,1,',','.') }}</td>
                            </tr>
                        </tbody>
                    </table> 
                    @endisset
                    
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h6 class="text-danger">THÔNG TIN THEO THÁNG</h6>
    <form action="Tinhhinh_SX_submit" method="get" accept-charset="utf-8">
        <div class="form-row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Chọn Nhà máy:</label>
                    <select name="" id="" class="form-control">
                        <option>Khe Diên</option>
                        <option>Krông Hnăng</option>
                    </select>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Chọn thời gian:</label>
                    <div class="form-inline">
                        <div class="input-group date" id="datetimepicker_SXmonth" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker_SXmonth" name="created_at" />
                            <div class="input-group-append" data-target="#datetimepicker_SXmonth" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary ml-sm-2 mb-sm-1">Xem thông tin</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
    {{--  bảng hiển thị thông tin  --}}
    <h6 class="card-title">Tổng sản lượng</h6>
    <p class="card-text">
        <span>Sản lượng tháng: </span>
        <span>0,987 (triệu kWh)</span>
    </p>
    <p class="card-text">
        <span>Sản lượng nắm: </span>
        <span>2,446 (triệu kWh)</span>
    </p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th>Ngày</th>
                    <th>Công suất (MW)</th>
                    <th>Sản lượng (MWh)</th>
                    <th>Lượng mưa (mm)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>21/02/2020</td>
                    <td>9,0</td>
                    <td>0,054</td>
                    <td>12,4</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker_SXday').datetimepicker({
            locale: 'vi',
            format: 'DD/MM/YYYY'
        });
    });
    
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker_SXmonth').datetimepicker({
            locale: 'vi',
            format: 'MM/YYYY'
        });
    });
</script>
@endsection