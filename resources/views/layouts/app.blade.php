<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{asset('/images/fav_icon.png')}}">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link href="http://fonts.cdnfonts.com/css/helvetica-neue-9" rel="stylesheet" /> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400&display=swap" rel="stylesheet"> -->
    <link href="http://fonts.cdnfonts.com/css/public-sans" rel="stylesheet">
    <!-- <link href="http://fonts.cdnfonts.com/css/jost" rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">


    @yield('datatable')
    @yield('css')
    @yield('datatable_css')
    @yield('third_party_stylesheets')
    @stack('page_css')
    <style>
        html,
        body {
            /* font-family: "Helvetica 25 UltraLight", sans-serif; */
            font-family: "Public Sans", sans-serif;
            font-size: 14px;
            font-weight: 400;

            /* font-weight: 400; */
        }

        /* .loginbody {
            background-image: url("../images/05.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;            
            opacity: 0.6;
        } */

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 0px 10px;
            font-size: 14px;
            vertical-align: middle;
        }

        .fas,
        .fa-solid {
            color: #dc3545;
        }

        .btn-info {
            background: #343a40;
            border-color: #343a40;
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

        #add {
            margin-top: 5px;
        }

        .card-title {
            margin-bottom: 0px !important;
        }

        .text-decoration>a {
            text-decoration: none;
        }

        .dropdown-menu {
            height: 500px;
            width: 100% !important;
            min-width: 0px !important;
            font-size: 12px !important;
        }

        .custom_style {
            width: 280px !important;
            height: 233px;
        }

        .ui-menu {
            width: 19% !important;
            background: white !important;
        }

        .ui-autocomplete {
            height: 200px !important;
            overflow-y: hidden !important;
            overflow-x: hidden !important;
            margin: 0 !important;
        }

        table.table-uml-mushak td {
            font-size: 11px !important;
        }

        .dt-border select {
            border: 0;
        }

        #addModal {
            display: none;
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
                @auth {{--
                    <a
                        href="{{ url('/home') }}"
                class="text-sm text-gray-700 dark:text-gray-500 underline"
                >Home</a>
                --}} @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif @endauth
            </div>
            @endif
            {{-- CUSTOM END --}}
            @if (Route::has('login'))
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    @auth
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        {{--
                            <img
                                src="https://infyom.com/images/logo/blue_logo_150x150.jpg"
                                class="user-image img-circle elevation-2"
                                alt="User Image"
                            />
                            --}}
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    @endauth
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right custom_style">
                        <!-- User image -->
                        @auth
                        <li class="user-header bg-dark">
                            {{--
                                <img
                                    src="https://infyom.com/images/logo/blue_logo_150x150.jpg"
                                    class="img-circle elevation-2"
                                    alt="User Image"
                                />
                                --}}
                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since
                                    {{ Auth::user()->created_at->format('M. Y') }}</small>
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
        <div class="content-wrapper loginbody">
            <section class="content" style="overflow:hidden;">
                @yield('content')
            </section>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer no-print">
            <div class="float-right d-none d-sm-block" style="margin-right:40px;">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021
                <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
        </footer>
        <a id="back-to-top" href="#" class="btn btn-dark back-to-top no-print" role="button" aria-label="Scroll to top" style="margin-right: -11px; margin-bottom: -11px;">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js" integrity="sha512-tVYBzEItJit9HXaWTPo8vveXlkK62LbA+wez9IgzjTmFNLMBO1BEYladBw2wnM3YURZSMUyhayPCoLtjGh84NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.4/dataRender/intl.js"></script>
    <script>
        $(document).ready(function() {
            // admin lte add active class to current link start
            /** add active class and stay opened when selected */
            var url = window.location;

            // for sidebar menu entirely but not cover treeview
            $("ul.nav-sidebar a")
                .filter(function() {
                    return this.href == url;
                })
                .addClass("active");

            // for treeview
            $("ul.nav-treeview a")
                .filter(function() {
                    return this.href == url;
                })
                .parentsUntil(".nav-sidebar > .nav-treeview")
                .addClass("menu-open")
                .prev("a")
                .addClass("active");
            // admin lte add active class to current link start

        });
    </script>
    @yield('third_party_scripts') @yield('script') @stack('page_scripts')
    <script>
        setTimeout(function() {
            const user_role = "{{ Auth::user()->roles }}";
            if (user_role !== "admin") {
                $('.deleteIcon').remove();
            }
        }, 1000);
    </script>
</body>

</html>