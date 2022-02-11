<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
    <link href="http://fonts.cdnfonts.com/css/helvetica-neue-9" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('datatable')
    @yield('datatable_css')
    @yield('third_party_stylesheets')
    @stack('page_css')
    <style>
        html,
        body {
            font-family: 'Helvetica 25 UltraLight', sans-serif;
            /* font-weight: 400; */
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 0px 10px;
            font-size: 12px;
            vertical-align: middle;
        }

        .fas {
            color: #DC3545;
        }

        .btn-info {
            background: #343A40;
            border-color: #343A40;
        }

        .padd>a {
            margin-right: 2px;
        }

        .dropdown {
            width: 100% !important;
        }

        .dropdown-menu[data-bs-popper] {
            left: -146px !important;
        }

        h3 {
            margin-bottom: 0px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            {{-- CUSTOM --}}
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                {{-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                --}}
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
            {{-- CUSTOM END --}}
            @if (Route::has('login'))
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    @auth
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        {{-- <img src="https://infyom.com/images/logo/blue_logo_150x150.jpg"
                            class="user-image img-circle elevation-2" alt="User Image"> --}}
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    @endauth
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        @auth
                        <li class="user-header bg-primary">
                            {{-- <img src="https://infyom.com/images/logo/blue_logo_150x150.jpg"
                                class="img-circle elevation-2" alt="User Image"> --}}
                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                            </p>
                        </li>
                        @endauth
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right signout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif

        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content container-fluid">
                @yield('content')
            </section>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <script src="https://cdn.datatables.net/plug-ins/1.11.4/dataRender/intl.js"></script>
    <script>
        $(document).ready(function() {
            console.log('jquery is working');
        });
    </script>

    @yield('third_party_scripts')
    @yield('script')

    @stack('page_scripts')
</body>

</html>