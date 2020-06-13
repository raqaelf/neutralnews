<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.png') }}">

    <title>Dashboard - @yield('title')</title>

    <!-- vendor css -->
    <link href="{{ asset('admin/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashforge.dashboard.css') }}">
    <link id="dfMode" rel="stylesheet" href="{{ asset('admin/assets/css/skin.light.css') }}">

    @yield('style')

    <script src="{{ asset('admin/lib/jquery/jquery.min.js') }}"></script>

</head>
<body>

    @include('Authors.layouts.aside')
    <div class="content ht-100v pd-0">
        @include('Authors.layouts.header')
        <div class="content-body">
            <div class="container pd-x-0">
                <div class="d-sm-flex align-items-center justify-content-between mg-xl-b-20">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                            </ol>
                        </nav>
                        <h4 class="mg-b-0 tx-spacing--1">@yield('title')</h4>
                    </div>
                </div>
                @yield('content')
            </div><!-- container -->
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/dashforge.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashforge.aside.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @yield('javascript')
</body>
</html>
