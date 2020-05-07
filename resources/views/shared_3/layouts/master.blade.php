<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SBA | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{ asset('') }}">
	    {{--  bảo mật cho Google Recaptcha v3  --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{--  ICON --}}
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
        {{--  font Roboto Google  --}}
	    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        {{--  all CSS  --}}
        {{--  <link rel="stylesheet" href="shared_asset/bootstrap4/dist/css/bootstrap.min.css">  --}}
        <link rel="stylesheet" href="shared_asset/bootstrap4/dist/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="shared_asset_3/css/animate.css">
        <link rel="stylesheet" href="shared_asset_3/css/owl.carousel.min.css">
        <link rel="stylesheet" href="shared_asset_3/css/slick.css">
        <link rel="stylesheet" href="shared_asset_3/css/chosen.min.css">
        <link rel="stylesheet" href="shared_asset/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="shared_asset_3/css/simple-line-icons.css">
        <link rel="stylesheet" href="shared_asset_3/css/ionicons.min.css">
        <link rel="stylesheet" href="shared_asset_3/css/meanmenu.min.css">
        <link rel="stylesheet" href="shared_asset_3/css/style.css">
        <link rel="stylesheet" href="shared_asset_3/css/responsive.css">
        {{--  custom css  --}}
        <link rel="stylesheet" href="shared_asset/css/style.css">
        
        <script src="shared_asset_3/js/vendor/modernizr-2.8.3.min.js"></script>
        @yield('recaptcha')
    </head>
    <body>
        @include('shared_3.layouts.header')
	    @yield('content')
        @include('shared_3.layouts.footer')

        <script src="shared_asset/bootstrap4/dist/js/jquery-3.4.1.min.js"></script>
        <script src="shared_asset/bootstrap4/dist/js/popper.min.js"></script>
        <script src="shared_asset/bootstrap4/dist/js/bootstrap.min.js"></script>
        <script src="shared_asset_3/js/imagesloaded.pkgd.min.js"></script>
        <script src="shared_asset_3/js/isotope.pkgd.min.js"></script>
        <script src="shared_asset_3/js/ajax-mail.js"></script>
        <script src="shared_asset_3/js/owl.carousel.min.js"></script>
        <script src="shared_asset_3/js/plugins.js"></script>
        <script src="shared_asset_3/js/main.js"></script>

        <script type="text/javascript" src="shared_asset/js/my.js"></script>
        @yield('script')
    </body>
</html>