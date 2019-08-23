<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('/admin/assets/images/icon/logo.png') }}" alt="logo">
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ Nav::hasSegment('categories',2) }}">
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="ti-bookmark-alt"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="{{ Nav::hasSegment('homepage-reviews',2) }}">
                        <a href="{{ route('admin.homepage-reviews.index') }}">
                            <i class="ti-comment-alt"></i>
                            <span>Reviews on the main</span>
                        </a>
                    </li>
                    <li class="{{ Nav::hasSegment('products',2) }}">
                        <a href="{{ route('admin.products.index') }}">
                            <i class="ti-video-clapper"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li class="{{ Nav::hasSegment('counters',2) }}">
                        <a href="{{ route('admin.counters.index') }}">
                            <i class="ti-pulse"></i>
                            <span>Counters</span>
                        </a>
                    </li>
                    <li class="{{ Nav::hasSegment('subscribers',2) }}">
                        <a href="{{ route('admin.subscribers.index') }}">
                            <i class="ti-email"></i>
                            <span>Subscribers</span>
                        </a>
                    </li>
                    <li class="{{ Nav::hasSegment('homepage-info',2) }}">
                        <a href="{{ route('admin.homepage-info.index') }}">
                            <i class="ti-info"></i>
                            <span>Homepage info</span>
                        </a>
                    </li>
                    <li class="{{ Nav::hasSegment('socials',2) }}">
                        <a href="{{ route('admin.socials.index') }}">
                            <i class="ti-apple"></i>
                            <span>Socials</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
