<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="tree-view" role="menu" data-accordion="true">

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-motorcycle"></i>
                <p class="text-white">
                    Motorcycle
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('mrp.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p class="text-white">Price</p>
                    </a>
                </li>
            </ul>
        </li>
        @if(Auth::user()->roles == 'admin')
        <li class="nav-item bg-danger rounded">
            <a href="{{route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-user-cog text-white"></i>
                <p class="text-white">Showroom Dashboard</p>
            </a>
        </li>
        @endif
    </ul>
</nav>