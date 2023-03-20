<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="tree-view" role="menu" data-accordion="true">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-motorcycle"></i>
                <p class="text-white">
                    Post
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('showroom.current_stock_init') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p class="text-white">Articles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('showroom.current_stock_init') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p class="text-white">Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('showroom.current_stock_init') }}" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p class="text-white">Tags</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>