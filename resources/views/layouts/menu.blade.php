<!-- Search Bar -->
<!-- <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
        <input required class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-search-results">
        <div class="list-group"><a href="#" class="list-group-item">
                <div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div>
                <div class="search-path"></div>
            </a></div>
    </div>
</div> -->
<!-- need to remove -->


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="tree-view" role="menu" data-accordion="true">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p class="text-white">
                    Customer
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ url('/customerSearch') }}" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p class="text-white">Search</p>
                    </a>
                </li>
            </ul>
        </li>

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
                <li class="nav-item">
                    <a href="{{ route('vehicle.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-info"></i>
                        <p class="text-white">Details</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-parachute-box"></i>
                        <p class="text-white">Supplier</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('color_code.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tint"></i>
                        <p class="text-white">Color Code</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('purchage.purchage_entry') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p class="text-white">Purchage</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p class="text-white">Sale</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-hand-holding-dollar"></i>
                <p class="text-white">
                    Quotation
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('quotation.create') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-circle-plus"></i>
                        <p class="text-white">Create New</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('quotation.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p class="text-white">Quotation List</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('print.print_dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-print"></i>
                <p class="text-white">Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('excel.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p class="text-white">Report Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('vat.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-percent"></i>
                <p class="text-white">VAT Dashboard</p>
            </a>
        </li>
    </ul>
</nav>