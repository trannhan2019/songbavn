@extends('admin.layout.master')
@section('title')
    Trang test
@endsection

@section('content')
    <div class="col">
        <div class="mb-2 bg-white p-2">
            <button type="button" id="btn-toggle" class="btn btn-outline-secondary d-md-none">
                <i class="fas fa-align-left"></i>
            </button>
            <h5 class="d-inline py-3">BAN ĐIỀU HÀNH</h5>
        </div>
        <div class="card mb-2">
            <div class="card-header bg-white" style="border-top: 1px solid orange">
                <h6 class="card-title text-danger">HỘI ĐỒNG QUẢN TRỊ</h6>
            </div>
            <div class="card m-auto" style="width: 15rem">
                <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="">
                <div class="card-body">
                    <h6 class="card-title">Ông Đinh Châu Hiếu Thiện</h6>
                    <h6 class="card-title">Chủ tịch Hội đồng quản trị</h6>
                    <p class="card-text">Email: </p>
                </div>
            </div>
        </div>
        {{-- <!-- --------------- --> --}}
        <div class="card">
            <div class="card-header bg-white" style="border-top: 1px solid orange">
                <h6 class="card-title text-danger">BAN KIỂM SOÁT</h6>
            </div>
            <div class="card m-auto" style="width: 15rem">
                <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="">
                <div class="card-body">
                    <h6 class="card-title">Bà Phan Thị Anh Đào</h6>
                    <h6 class="card-title">Trưởng Ban</h6>
                    <p class="card-text">Email: </p>
                </div>
            </div>
        </div>
    </div>
@endsection
