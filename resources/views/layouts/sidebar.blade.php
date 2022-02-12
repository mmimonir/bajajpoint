<aside class="main-sidebar bg-dark elevation-4">
    <a href="{{ url('/home') }}" class="brand-link" style="text-decoration:none; margin-top:15px;">
        <img src="{{URL('/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold text-uppercase">{{ config('app.name')
            }}</span>
    </a>
    <!-- <a href="{{ url('/home') }}" class="brand-link d-flex justify-content-center" style="text-decoration:none;">
        {{-- <img src="https://infyom.com/images/logo/blue_logo_150x150.jpg" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"> --}}
        <span class="brand-text font-weight-bold d-flex justify-content-center">{{ config('app.name')
            }}</span>
    </a> -->

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>