<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SBA | @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Define default CSS path (you will run into CSS error without this) -->
    <base href="{{ asset('') }}">
	{{-- <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --> --}}
	<link rel="stylesheet" href="admin_asset/bootstrap4/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="admin_asset/fontawesome-free/css/all.min.css">

	{{-- <!-- ICON----------------------- --> --}}
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	{{-- <!-- tempusdominus-datepicker css--------- --> --}}
	<link rel="stylesheet" href="admin_asset/tempusdominus/css/tempusdominus-bootstrap-4.min.css">

	{{-- <!-- CUSTOM CSS------------------------ --> --}}
	<link rel="stylesheet" href="admin_asset/css/style_v2.css">
</head>
<body>
    @include('admin.layout.header')
    <section>
        @include('admin.layout.breadcrumb')
        <div class="container">
            <div class="row">
                @include('admin.layout.sidebar')
                @yield('content')
            </div>       
        </div>
    </section>
    @include('admin.layout.footer')
    {{-- <!-- button top --> --}}
	<a class="on_top" href="#"><i class="fa-arrow-circle-up fa"></i></a>
    {{-- <!-- button top --> --}}

    {{-- <!-- -----------------------SCRIPT--------------------------- --> --}}

	<script src="admin_asset/bootstrap4/dist/js/jquery-3.4.1.min.js"></script>
	{{-- <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --> --}}
	<script src="admin_asset/bootstrap4/dist/js/popper.min.js"></script>
	{{-- <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></!--> --> --}}
	<script src="admin_asset/bootstrap4/dist/js/bootstrap.min.js"></script>
	{{-- <!-- MOMENT----------------- --> --}}
	<script src="admin_asset/tempusdominus/js/moment.min.js" type="text/javascript" charset="utf-8" async defer></script>
	{{-- <!-- DATERANGEPICKER-------------- --> --}}
	<script src="admin_asset/tempusdominus/js/tempusdominus-bootstrap-4.js" type="text/javascript" charset="utf-8" async defer></script>
	{{-- <!-- Custom scripts for all pages--> --}}
	{{-- <!-- CUSTOM SCRIPT---------------- --> --}}
	<script type="text/javascript" src="admin_asset/js/my.js"></script>
</body>