<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
    <title>@yield('page_title', 'VoltCart Admin - ' . setting('admin.description'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="assets-path" content="{{ route('voyager.voyager_assets') }}"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    @if($admin_favicon == '')
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/png">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
    @endif

    <!-- App CSS -->
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">

    @yield('css')
    @if(__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif

    <!-- VoltCart Admin Styles -->
    <style type="text/css">
        /* ========== VOLTCART VARIABLES ========== */
        :root {
            --volt-blue: #44ACFF;
            --volt-blue-light: #89D4FF;
            --volt-yellow: #F9F6C4;
            --volt-pink: #FE9EC7;
            --volt-dark: #1a1a2e;
            --volt-darker: #0f0f1f;
            --volt-gray: #6c757d;
            --volt-gradient: linear-gradient(135deg, #44ACFF, #89D4FF);
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body.voyager {
            background: #f5f7fb;
        }

        /* ========== SIDEBAR ========== */
        .voyager .side-menu {
            background: linear-gradient(180deg, #0f0f1f 0%, #1a1a2e 100%) !important;
            box-shadow: 2px 0 15px rgba(0,0,0,0.08);
        }

        .voyager .side-menu .navbar-header {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
            border-color: transparent !important;
            padding: 18px 0 !important;
        }

        .voyager .side-menu .navbar-brand {
            color: white !important;
            font-weight: 800;
            font-size: 1.4rem;
            letter-spacing: -0.5px;
        }

        .voyager .side-menu .navbar-brand i {
            color: #F9F6C4;
            font-size: 1.5rem;
        }

        .voyager .side-menu .nav li a {
            color: #e2e8f0 !important;
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 4px 12px;
            font-weight: 500;
        }

        .voyager .side-menu .nav li a i {
            color: #89D4FF;
        }

        .voyager .side-menu .nav li a:hover {
            background: rgba(68, 172, 255, 0.15) !important;
            color: white !important;
            transform: translateX(5px);
        }

        .voyager .side-menu .nav li a:hover i {
            color: white;
        }

        .voyager .side-menu .nav li.active a {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
            color: white !important;
            box-shadow: 0 4px 12px rgba(68, 172, 255, 0.3);
        }

        .voyager .side-menu .nav li.active a i {
            color: white !important;
        }

        /* ========== TOP NAVBAR ========== */
        .navbar.navbar-top {
            background: white !important;
            border-bottom: 1px solid #e9ecef !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
            padding: 12px 20px !important;
        }

        .navbar.navbar-top .navbar-nav > li > a {
            color: #2c3e50 !important;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .navbar.navbar-top .navbar-nav > li > a:hover {
            color: #44ACFF !important;
            background: rgba(68, 172, 255, 0.05) !important;
            border-radius: 8px;
        }

        .navbar.navbar-top .navbar-nav > .open > a {
            background: rgba(68, 172, 255, 0.1) !important;
            color: #44ACFF !important;
        }

        /* ========== PAGE TITLE ========== */
        .page-title {
            color: #1a1a2e !important;
            font-weight: 800 !important;
            font-size: 1.8rem !important;
            margin-bottom: 25px !important;
        }

        .page-title i {
            color: #44ACFF;
            background: rgba(68, 172, 255, 0.1);
            padding: 10px;
            border-radius: 12px;
            margin-right: 12px;
        }

        /* ========== BUTTONS ========== */
        .btn-primary {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
            border: none !important;
            transition: all 0.3s ease !important;
            border-radius: 10px !important;
            padding: 8px 20px !important;
            font-weight: 600 !important;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(68, 172, 255, 0.4);
        }

        .btn-danger {
            background: #FE9EC7 !important;
            border: none !important;
            transition: all 0.3s ease !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
        }

        .btn-danger:hover {
            background: #ff85b3 !important;
            transform: translateY(-2px);
        }

        .btn-success {
            background: #44ACFF !important;
            border: none !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
        }

        .btn-success:hover {
            background: #2c9eff !important;
            transform: translateY(-2px);
        }

        .btn-warning {
            background: #F9F6C4 !important;
            color: #2c3e50 !important;
            border: none !important;
            border-radius: 10px !important;
            font-weight: 600 !important;
        }

        /* ========== CARDS & PANELS ========== */
        .panel-bordered {
            border: none !important;
            border-radius: 20px !important;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .panel-bordered:hover {
            box-shadow: 0 8px 25px rgba(68, 172, 255, 0.1);
        }

        .panel-heading {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
            color: white !important;
            border: none !important;
            padding: 18px 24px !important;
            border-radius: 20px 20px 0 0 !important;
        }

        .panel-heading .panel-title {
            color: white !important;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .panel-body {
            padding: 24px !important;
        }

        /* ========== TABLES ========== */
        .table > thead > tr > th {
            background: #f8fafc;
            color: #1a1a2e;
            font-weight: 700;
            border-bottom: 2px solid #44ACFF;
            padding: 14px 12px;
        }

        .table > tbody > tr > td {
            padding: 12px;
            vertical-align: middle;
        }

        .table > tbody > tr:hover {
            background: rgba(68, 172, 255, 0.04);
            cursor: pointer;
        }

        /* ========== DROPDOWN ========== */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 8px 0;
        }

        .dropdown-menu > li > a {
            padding: 8px 20px;
            transition: all 0.2s;
        }

        .dropdown-menu > li > a:hover {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
            color: white !important;
        }

        /* ========== MODALS ========== */
        .modal-header {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
            color: white !important;
            border: none !important;
            border-radius: 16px 16px 0 0 !important;
            padding: 18px 24px !important;
        }

        .modal-header .close {
            color: white !important;
            opacity: 0.8;
        }

        .modal-header .close:hover {
            opacity: 1;
        }

        .modal-content {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        /* ========== ALERTS ========== */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 14px 20px;
        }

        .alert-info {
            background: rgba(68, 172, 255, 0.1) !important;
            border-left: 4px solid #44ACFF !important;
            color: #1a1a2e !important;
        }

        .alert-success {
            background: rgba(68, 172, 255, 0.1) !important;
            border-left: 4px solid #44ACFF !important;
        }

        .alert-danger {
            background: rgba(254, 158, 199, 0.1) !important;
            border-left: 4px solid #FE9EC7 !important;
        }

        /* ========== BREADCRUMB ========== */
        .voyager .breadcrumb {
            background: transparent;
            padding: 15px 0;
            margin: 0;
        }

        .voyager .breadcrumb a {
            color: #44ACFF !important;
            font-weight: 500;
        }

        .voyager .breadcrumb a:hover {
            color: #89D4FF !important;
        }

        .voyager .breadcrumb > li + li:before {
            color: #cbd5e0;
        }

        /* ========== LOADER ========== */
        #voyager-loader {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
        }

        /* ========== SCROLLBAR ========== */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #44ACFF;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #89D4FF;
        }

        /* ========== BADGES ========== */
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.7rem;
        }

        .badge-primary {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
        }

        .badge-success {
            background: #44ACFF !important;
        }

        .badge-warning {
            background: #F9F6C4 !important;
            color: #1a1a2e !important;
        }

        .badge-danger {
            background: #FE9EC7 !important;
        }

        /* ========== FORM CONTROLS ========== */
        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px 14px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #44ACFF;
            box-shadow: 0 0 0 3px rgba(68, 172, 255, 0.1);
        }

        /* ========== WIDGETS ========== */
        .widget {
            border-radius: 20px;
            overflow: hidden;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .page-title {
                font-size: 1.3rem !important;
            }

            .page-title i {
                padding: 6px;
                font-size: 1rem;
            }

            .voyager .side-menu .nav li a {
                margin: 2px 8px;
                padding: 10px 12px;
            }

            .panel-heading {
                padding: 14px 18px !important;
            }

            .panel-body {
                padding: 18px !important;
            }
        }

        /* ========== ANIMATIONS ========== */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .panel-bordered {
            animation: fadeIn 0.4s ease;
        }

        /* ========== HAMBURGER MENU ========== */
        .hamburger.is-active .hamburger-inner,
        .hamburger.is-active .hamburger-inner::before,
        .hamburger.is-active .hamburger-inner::after {
            background-color: #44ACFF !important;
        }

        /* ========== CUSTOM SIDEBAR USER PANEL ========== */
        .side-menu .panel.widget.center.bgimage {
            background: linear-gradient(135deg, #44ACFF, #89D4FF) !important;
            border-radius: 16px;
            margin: 15px;
        }

        .side-menu .avatar {
            border: 3px solid #F9F6C4;
        }
    </style>

    @if(!empty(config('voyager.additional_css')))<!-- Additional CSS -->
        @foreach(config('voyager.additional_css') as $css)<link rel="stylesheet" type="text/css" href="{{ asset($css) }}">@endforeach
    @endif

    @yield('head')
</head>

<body class="voyager @if(isset($dataType) && isset($dataType->slug)){{ $dataType->slug }}@endif">

<div id="voyager-loader">
    <?php $admin_loader_img = Voyager::setting('admin.loader', ''); ?>
    @if($admin_loader_img == '')
        <i class="fas fa-bolt" style="font-size: 40px; color: white;"></i>
        <div style="color: white; margin-top: 10px; font-weight: 600;">VoltCart Admin</div>
    @else
        <img src="{{ Voyager::image($admin_loader_img) }}" alt="VoltCart Loader">
    @endif
</div>

<?php
if (\Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'http://') || \Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'https://')) {
    $user_avatar = Auth::user()->avatar;
} else {
    $user_avatar = Voyager::image(Auth::user()->avatar);
}
?>

<div class="app-container">
    <div class="fadetoblack visible-xs"></div>
    <div class="row content-container">
        @include('voyager::dashboard.navbar')
        @include('voyager::dashboard.sidebar')
        <script>
            (function(){
                    var appContainer = document.querySelector('.app-container'),
                        sidebar = appContainer.querySelector('.side-menu'),
                        navbar = appContainer.querySelector('nav.navbar.navbar-top'),
                        loader = document.getElementById('voyager-loader'),
                        hamburgerMenu = document.querySelector('.hamburger'),
                        sidebarTransition = sidebar.style.transition,
                        navbarTransition = navbar.style.transition,
                        containerTransition = appContainer.style.transition;

                    sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition =
                    appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                    navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = 'none';

                    if (window.innerWidth > 768 && window.localStorage && window.localStorage['voyager.stickySidebar'] == 'true') {
                        appContainer.className += ' expanded no-animation';
                        loader.style.left = (sidebar.clientWidth/2)+'px';
                        hamburgerMenu.className += ' is-active no-animation';
                    }

                   navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = navbarTransition;
                   sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = sidebarTransition;
                   appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition = containerTransition;
            })();
        </script>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                @yield('page_header')
                <div id="voyager-notifications"></div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('voyager::partials.app-footer')

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Javascript Libs -->
<script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>

<script>
    @if(Session::has('alerts'))
        let alerts = {!! json_encode(Session::get('alerts')) !!};
        helpers.displayAlerts(alerts, toastr);
    @endif

    @if(Session::has('message'))

    // TODO: change Controllers to use AlertsMessages trait... then remove this
    var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
    var alertMessage = {!! json_encode(Session::get('message')) !!};
    var alerter = toastr[alertType];

    if (alerter) {
        alerter(alertMessage);
    } else {
        toastr.error("toastr alert-type " + alertType + " is unknown");
    }
    @endif
</script>

<script>
    // Update cart count from localStorage for admin (if needed)
    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        const cartCount = document.getElementById('cart-count');
        if (cartCount) {
            if (totalItems > 0) {
                cartCount.textContent = totalItems;
                cartCount.style.display = 'inline-block';
            } else {
                cartCount.style.display = 'none';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateCartCount();

        // Add VoltCart class to body for custom styling
        document.body.classList.add('voltcart-admin');
    });
</script>

@include('voyager::media.manager')
@yield('javascript')
@stack('javascript')
@if(!empty(config('voyager.additional_js')))<!-- Additional Javascript -->
    @foreach(config('voyager.additional_js') as $js)<script type="text/javascript" src="{{ asset($js) }}"></script>@endforeach
@endif

</body>
</html>
