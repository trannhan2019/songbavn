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
        {{--  all CSS  --}}
        {{--  <link rel="stylesheet" href="shared_asset/bootstrap4/dist/css/bootstrap.min.css">  --}}
        <link rel="stylesheet" href="shared_asset/bootstrap4/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="shared_asset_2/css/meanmenu.css">
        <link rel="stylesheet" href="shared_asset_2/css/animate.css">
        {{--  font Roboto Google  --}}
	    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="shared_asset_2/css/magnific-popup.css">
        <link rel="stylesheet" href="shared_asset_2/css/owl.carousel.min.css">
        <link rel="stylesheet" href="shared_asset_2/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="shared_asset/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="shared_asset_2/css/style.css">
        <link rel="stylesheet" href="shared_asset_2/css/responsive.css">
        {{--  custom css  --}}
        <link rel="stylesheet" href="shared_asset/css/style.css">
        
        <script src="shared_asset_2/js/vendor/modernizr-2.8.3.min.js"></script>
        @yield('recaptcha')
    </head>
    <body>
        @include('shared_2.layouts.header')
	    @yield('content')
        @include('shared_2.layouts.footer')

        <script src="shared_asset/bootstrap4/dist/js/jquery-3.4.1.min.js"></script>
        <script src="shared_asset/bootstrap4/dist/js/popper.min.js"></script>
        <script src="shared_asset/bootstrap4/dist/js/bootstrap.min.js"></script>
        <script src="shared_asset_2/js/jquery.meanmenu.js"></script>
        <script src="shared_asset_2/js/jquery.magnific-popup.js"></script>
        <script src="shared_asset_2/js/jquery.countdown.min.js"></script>
        <script src="shared_asset_2/js/ajax-mail.js"></script>
        <script src="shared_asset_2/js/owl.carousel.min.js"></script>
        <script src="shared_asset_2/js/plugins.js"></script>
        <script src="shared_asset_2/js/main.js"></script>

        <script type="text/javascript" src="shared_asset/js/my.js"></script>
        @yield('script')
    </body>
</html>