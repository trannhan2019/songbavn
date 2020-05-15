<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SBA | @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{--  Define default CSS path (you will run into CSS error without this) --}}
	<base href="{{ asset('') }}">
	{{--  bảo mật cho Google Recaptcha v3  --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" href="shared_asset/bootstrap4/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="shared_asset/fontawesome-free/css/all.min.css">

	{{--  ICON --}}
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	{{-- <!-- tempusdominus-datepicker css> --}}
	{{-- <link rel="stylesheet" href="shared_asset/tempusdominus/css/tempusdominus-bootstrap-4.min.css"> --}}
	{{-- bootstrap-datepicker --}}
	{{-- <link rel="stylesheet" href="shared_asset/bootstrapdatepicker/css/bootstrap-datepicker.css"> --}}
	{{--  font Roboto Google  --}}
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	{{-- <!-- CUSTOM CSS------------------------ --> --}}
	<link rel="stylesheet" href="shared_asset/css/style.css">
	<link rel="stylesheet" href="shared_asset/css/responsive.css">
	{{--  <link rel="stylesheet" href="{!! asset('shared_asset/css/style.css') !!}">  --}}
	{{-- <link rel="stylesheet" href="shared_asset/css/sidebar_menu.css"> --}}
	{{--  Tuy chinh khi print noi dung website  --}}
	<link rel="stylesheet" type="text/css" href="shared_asset/css/print.css" media="print" />
	@yield('recaptcha')
</head>
<body>
	@include('shared.layouts.header')
	@yield('content')
    @include('shared.layouts.footer')
    {{-- <!-- button top --> --}}
	<a class="on_top" href="#"><i class="fa-arrow-circle-up fa"></i></a>
    {{-- <!-- button top --> --}}

    {{-- <!-- -----------------------SCRIPT--------------------------- --> --}}

	<script src="shared_asset/bootstrap4/dist/js/jquery-3.4.1.min.js"></script>
	{{-- <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --> --}}
	<script src="shared_asset/bootstrap4/dist/js/popper.min.js"></script>
	{{-- <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></!--> --> --}}
	<script src="shared_asset/bootstrap4/dist/js/bootstrap.min.js"></script>
	{{-- <!-- MOMENT----------------- --> --}}
	{{-- <script src="shared_asset/bootstrapdatepicker/js/moment.min.js" type="text/javascript" charset="utf-8" async defer></script> --}}
	{{-- <!-- DATERANGEPICKER-------------- --> --}}
	{{-- <script src="shared_asset/tempusdominus/js/tempusdominus-bootstrap-4.js" type="text/javascript" charset="utf-8" async defer></script> --}}
	{{-- bootstrap-datepicker --}}
	{{-- <script src="shared_asset/bootstrapdatepicker/js/bootstrap-datepicker.js" type="text/javascript" charset="utf-8" async defer></script> --}}
	{{-- <script src="shared_asset/bootstrapdatepicker/locales/bootstrap-datepicker.vi.min.js" type="text/javascript" charset="utf-8" async defer></script> --}}
	
	{{-- nhung ckeditor --}}
    <script src="{{ asset('admin_asset/plugins/ckeditor/ckeditor.js') }}"></script>
    {{-- nhung ckfinder --}}
    {{-- <script src="{{ asset('admin_asset/plugins/ckfinder/ckfinder.js') }}"></script> --}}
	{{--  responsive image trong ckeditor  --}}
	{{-- Them input number --}}
	<script src="admin_asset/plugins/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>
	<script type="text/javascript">
        $("input[type='number']").inputSpinner()
    </script>

	<script src="admin_asset/plugins/ckeditor/ckeditor-responsive-images.js" type="text/javascript" charset="utf-8" async defer></script>
	{{--  Tự động đóng alert sau khoảng thời gian  --}}
	<script type="text/javascript">
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
	{{-- Hiển thời gian trên header --}}
	<script>
		var dt = new Date();
		var weekday = new Array(7);
		weekday[0] = "Chủ nhật";
		weekday[1] = "Thứ hai";
		weekday[2] = "Thứ ba";
		weekday[3] = "Thứ tư";
		weekday[4] = "Thứ năm";
		weekday[5] = "Thứ sáu";
		weekday[6] = "Thứ bảy";
		var n = weekday[dt.getDay()];
		//document.getElementById("head_datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2)) +"/"+ (dt.getFullYear());
		document.getElementById("head_datetime").innerHTML = n +", "+(("0"+dt.getDate()).slice(-2)) +"/"+ (("0"+(dt.getMonth()+1)).slice(-2)) +"/"+ (dt.getFullYear()) ;
	</script>
	{{-- <!-- CUSTOM SCRIPT---------------- --> --}}
	<script type="text/javascript" src="shared_asset/js/my.js"></script>

	@yield('script')
</body>
</html>