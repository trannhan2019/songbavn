@extends('shared.layouts.master')
@section('title')
    {{ $menu->name }}
@endsection

@section('content')
@include('shared.layouts.breadcrumb')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 >THÔNG TIN LIÊN HỆ</h4>
        </div>
        <div class="col-lg-5">
            <div class="media">
                <span class="text-primary pr-2" style="font-size: 2rem;"> <i class="fas fa-hotel"></i></span>
                <div class="media-body p-1">
                    <p>Số 573, đường Núi Thành, phường Hòa Cường Nam, quận Hải Châu, TP. Đà Nẵng</p>
                </div>
            </div>
            <div class="media">
                <span class="text-primary pr-3" style="font-size: 2rem;"> <i class="fas fa-phone"></i></span>
                <div class="media-body">
                    <p>Điện thoại: 0236. 3 653 592, 2 215 592 - Fax: 0236. 3 653 593</p>
                </div>
            </div>
            <div class="media">
                <span class="text-primary pr-2" style="font-size: 2rem;"> <i class="far fa-envelope"></i></span>
                <div class="media-body p-1">
                    <p>sba2007@songba.vn</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-lg-1">
            <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Họ và tên">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Địa chỉ email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" name="subject" id="subject" type="text"placeholder="Tiêu đề">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100" name="message" id="message" cols="30" rows="5" placeholder=" Thông tin ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Gửi ý kiến</button>
                </div>
            </form>
        </div>
        <div class="col-12">
            <h4>BẢN ĐỒ</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.6664243390273!2d108.2227403!3d16.0308711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b1228ede61%3A0xb7dac5fa9b8e1086!2zQ8O0bmcgdHkgQ-G7lSBwaOG6p24gU8O0bmcgQmE!5e0!3m2!1svi!2s!4v1581670381973!5m2!1svi!2s" width="100%" height="550" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</div>
@endsection