<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SBA | @yield('title')</title>
    {{-- <!-- Define default CSS path (you will run into CSS error without this) --> --}}
    <base href="{{ asset('') }}">
    {{-- <!-- Font Awesome Icons --> --}}
    <link rel="stylesheet" href="admin_asset/plugins/fontawesome-free/css/all.min.css">
    {{-- <!-- Theme style --> --}}
    <link rel="stylesheet" href="admin_asset/dist/css/adminlte.min.css">
    {{-- <!-- Google Font: Source Sans Pro --> --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        @yield('content')
        @include('admin.layouts.footer')
    </div>

    {{-- <!-- REQUIRED SCRIPTS --> --}}

    {{-- <!-- jQuery --> --}}
    <script src="admin_asset/plugins/jquery/jquery.min.js"></script>
    {{-- <!-- Bootstrap 4 --> --}}
    <script src="admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    {{-- <!-- AdminLTE App --> --}}
    <script src="admin_asset/dist/js/adminlte.min.js"></script>
    {{--  Bootstrap input spinner  --}}
    <script src="admin_asset/plugins/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>
    @yield('script')
</body>
</html>