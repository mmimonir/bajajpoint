<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="tree-view" role="menu" data-accordion="true">

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-motorcycle"></i>
                <p class="text-white">
                    Service
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('bill.create_bill') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill-1"></i>
                        <p class="text-white">Create Bill</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('service.job_card') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-id-card"></i>
                        <p class="text-white">Create Job Card</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('parts.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-id-card"></i>
                        <p class="text-white">Parts Purchage</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('parts.stock_init') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-id-card"></i>
                        <p class="text-white">Current Stock</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('parts.low_stock_init') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-id-card"></i>
                        <p class="text-white">Low Stock</p>
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