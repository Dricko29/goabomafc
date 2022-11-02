<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
data-layout="horizontal" 
data-topbar="light" 
data-sidebar="dark" 
data-sidebar-size="sm-hover" 
data-sidebar-image="none" 
data-layout-mode="light" 
data-layout-width="boxed" 
data-layout-position="fixed" 
data-layout-style="default">

<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Football') }} &#8211; Official | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}backend/assets/images/favicon.ico">

    @stack('css')

    <!-- Layout config Js -->
    <script src="{{ asset('') }}backend/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('') }}backend/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('') }}backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('') }}backend/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('') }}backend/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                @include('layouts.backend.partials.headers')
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('') }}backend/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('') }}backend/assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('') }}backend/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('') }}backend/assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    @include('layouts.backend.partials.menu')
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('content')
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                @include('layouts.backend.partials.footer')
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        @include('layouts.backend.partials.theme')
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('') }}backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}backend/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('') }}backend/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('') }}backend/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('') }}backend/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    {{-- <script src="{{ asset('') }}backend/assets/js/plugins.js"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript" src="{{ asset('') }}backend/assets/libs/choices.js/choices.min.js"></script>
    <script type="text/javascript" src="{{ asset('') }}backend/assets/libs/flatpickr/flatpickr.min.js"></script>

    @stack('js')

    <!-- App js -->
    <script src="{{ asset('') }}backend/assets/js/app.js"></script>
</body>

</html>