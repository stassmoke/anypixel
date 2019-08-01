<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html">
                <img src="/admin/assets/images/icon/logo.png" alt="logo">
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Nav::hasSegment('categories',2) }}">
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="ti-map-alt"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
