<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SBA | @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --> --}}
	<link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.min.css">

	<link rel="stylesheet" href="fontawesome-free/css/all.min.css">

	{{-- <!-- ICON----------------------- --> --}}
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	{{-- <!-- tempusdominus-datepicker css--------- --> --}}
	<link rel="stylesheet" href="tempusdominus/css/tempusdominus-bootstrap-4.min.css">

	{{-- <!-- CUSTOM CSS------------------------ --> --}}
	<link rel="stylesheet" href="css/style_v2.css">
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
{{-- <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --> --}}
	<script src="bootstrap4/dist/js/jquery-3.4.1.min.js"></script>
	{{-- <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --> --}}
	<script src="bootstrap4/dist/js/popper.min.js"></script>
	{{-- <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></!--> --> --}}
	<script src="bootstrap4/dist/js/bootstrap.min.js"></script>
	{{-- <!-- MOMENT----------------- --> --}}
	<script src="tempusdominus/js/moment.min.js" type="text/javascript" charset="utf-8" async defer></script>
	{{-- <!-- DATERANGEPICKER-------------- --> --}}
	<script src="tempusdominus/js/tempusdominus-bootstrap-4.js" type="text/javascript" charset="utf-8" async defer></script>
	{{-- <!-- Custom scripts for all pages--> --}}
	{{-- <!-- CUSTOM SCRIPT---------------- --> --}}
	<script type="text/javascript" src="js/my.js"></script>
</body>