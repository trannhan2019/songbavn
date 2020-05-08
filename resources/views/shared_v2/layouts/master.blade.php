<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>SBA | @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{--  Define default CSS path (you will run into CSS error without this) --}}
	<base href="{{ asset('') }}">
	{{--  bảo mật cho Google Recaptcha v3  --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" href="shared_asset_v2/bootstrap4/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="shared_asset_v2/fontawesome-free/css/all.min.css">

	{{--  ICON --}}
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	{{-- <!-- tempusdominus-datepicker css> --}}
	<link rel="stylesheet" href="shared_asset_v2/tempusdominus/css/tempusdominus-bootstrap-4.min.css">
	{{--  font Roboto Google  --}}
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	{{-- <!-- CUSTOM CSS------------------------ --> --}}
	<link rel="stylesheet" href="shared_asset_v2/css/style.css">
	<link rel="stylesheet" href="shared_asset_v2/css/responsive.css">
	{{--  <link rel="stylesheet" href="{!! asset('shared_asset/css/style.css') !!}">  --}}
	{{-- <link rel="stylesheet" href="shared_asset/css/sidebar_menu.css"> --}}
	{{--  Tuy chinh khi print noi dung website  --}}
	<link rel="stylesheet" type="text/css" href="shared_asset_v2/css/print.css" media="print" />
	<script src="shared_asset_v2/js/modernizr-2.8.3.min.js"></script>
	@yield('recaptcha')
</head>
<body>
	@include('shared_v2.layouts.header')
	@yield('content')
    @include('shared_v2.layouts.footer')
    {{-- <!-- button top --> --}}
	<a class="on_top" href="#"><i class="fa-arrow-circle-up fa"></i></a>
    {{-- <!-- button top --> --}}

    {{-- <!-- -----------------------SCRIPT--------------------------- --> --}}

	<script src="shared_asset_v2/bootstrap4/dist/js/jquery-3.4.1.min.js"></script>
	{{-- <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --> --}}
	<script src="shared_asset_v2/bootstrap4/dist/js/popper.min.js"></script>
	{{-- <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></!--> --> --}}
	<script src="shared_asset_v2/bootstrap4/dist/js/bootstrap.min.js"></script>
	{{-- <!-- MOMENT----------------- --> --}}
	<script src="shared_asset_v2/tempusdominus/js/moment.min.js" type="text/javascript" charset="utf-8" async defer></script>
	{{-- <!-- DATERANGEPICKER-------------- --> --}}
	<script src="shared_asset_v2/tempusdominus/js/tempusdominus-bootstrap-4.js" type="text/javascript" charset="utf-8" async defer></script>
	{{-- nhung ckeditor --}}
    <script src="{{ asset('admin_asset_v2/plugins/ckeditor/ckeditor.js') }}"></script>
    {{-- nhung ckfinder --}}
    {{-- <script src="{{ asset('admin_asset/plugins/ckfinder/ckfinder.js') }}"></script> --}}
    {{--  responsive image trong ckeditor  --}}
	<script src="admin_asset_v2/plugins/ckeditor/ckeditor-responsive-images.js" type="text/javascript" charset="utf-8" async defer></script>
	{{--  Tự động đóng alert sau khoảng thời gian  --}}
	<script type="text/javascript">
        $(".alert").delay(5000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>
	{{-- <!-- Custom scripts for all pages--> --}}
	{{-- <!-- CUSTOM SCRIPT---------------- --> --}}
	<script type="text/javascript" src="shared_asset_v2/js/my.js"></script>

	@yield('script')
</body>
</html>