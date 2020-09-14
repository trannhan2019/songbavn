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
    {{--  datatable  --}}
    <link rel="stylesheet" type="text/css" href="admin_asset/plugins/DataTables/datatables.min.css"/>
    {{--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>  --}}
    {{--  <!-- datetimepicker  --}}
    {{--  <link rel="stylesheet" href="admin_asset/plugins/tempusdominus/css/tempusdominus-bootstrap-4.min.css">  --}}
	<link rel="stylesheet" href="admin_asset/plugins/bootstrapdatepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="shared_asset/css/style.css">
    {{--  Google Font: Source Sans Pro  --}}
    {{--  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  --}}
    {{-- Tạo hiệu ứng animate --}}
    <link rel="stylesheet" href="shared_asset/aos/aos.css">
    {{--  font Roboto Google  --}}
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin_asset/dist/css/fontgoogle.css">
    {{--  icon web  --}}
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
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
    {{--  Datatable js  --}}
    <script type="text/javascript" src="admin_asset/plugins/DataTables/datatables.min.js"></script>
    {{--  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>  --}}

    {{--  <script src="admin_asset/plugins/tempusdominus/js/moment.min.js" type="text/javascript" charset="utf-8" async defer></script>  --}}
	{{--  <!-- DATEPICKER-------------- -->  --}}
	<script src="admin_asset/plugins/bootstrapdatepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="admin_asset/plugins/bootstrapdatepicker/locales/bootstrap-datepicker.vi.min.js" type="text/javascript" charset="utf-8" async defer></script>
    {{--  Bootstrap input spinner  --}}
    <script src="admin_asset/plugins/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>

    {{-- nhung ckeditor --}}
    <script src="{{ asset('admin_asset/plugins/ckeditor/ckeditor.js') }}"></script>
    {{-- nhung ckfinder --}}
    {{-- <script src="{{ asset('admin_asset/plugins/ckfinder/ckfinder.js') }}"></script> --}}
    {{--  responsive image trong ckeditor  --}}
    <script src="admin_asset/plugins/ckeditor/ckeditor-responsive-images.js" type="text/javascript" charset="utf-8" async defer></script>

    {{--  Tự động đóng alert sau khoảng thời gian  --}}
    <script type="text/javascript">
        $(".alert").delay(3000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>

    {{--  Sử dụng input thêm số   --}}
    <script type="text/javascript">

        $("input[type='number']").inputSpinner()
    </script>

    {{-- Click thêm class active vào sidemenu --}}
    <script type="text/javascript">
        var url = window.location;
        const allLinks = document.querySelectorAll('.nav-item a');
        const currentLink = [...allLinks].filter(e => {
        return e.href == url;
        });

        currentLink[0].classList.add("active");
        currentLink[0].closest(".nav-treeview").style.display="block";
        currentLink[0].closest(".has-treeview").classList.add("menu-open");
    </script>
    {{-- tạo hiệu ứng animate --}}
    <script src="shared_asset/aos/aos.js"></script>
	<script>
	  	AOS.init();
	</script>
    @yield('script')
</body>
</html>
