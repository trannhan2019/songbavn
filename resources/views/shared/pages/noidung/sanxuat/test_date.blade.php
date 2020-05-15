@extends('shared.layouts.master')
@section('title')
Test Bootstrap datetimepicker
@endsection
@section('content')
<form action="{{ route('sanxuatngay') }}" method="post" id="formId">
    @csrf
    {{-- <div class="input-group date" id="datetimepicker_SXday">
        <input type="text" class="form-control">
    </div> --}}
    <input type="date" name="bday" min="1000-01-01"
        max="3000-12-31" class="form-control">
    <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
</form>
{{ !empty($thsxkd_day)? $thsxkd_day->date:'' }}
@endsection

