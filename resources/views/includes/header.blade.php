<header class="menu-bar">
    <div class="container">
        <div class="menu-row">
            <a href="/" class="navbar-logo">
                <img class="navbar-logo__img" src="{{ asset('img/anypixel-logo__nav.png') }}" alt="anypixel">
            </a>
            <nav class="desktop-menu">
                <ul class="navigation">
                    <li class="menu-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">About Us</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Support</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Blog</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('catalog') }}">Shop</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Pages</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Contact</a>
                    </li>
                    <li class="menu-item menu-login__btn">
                        <a href="#">Login</a>
                    </li>
                </ul>
                <div class="menu-card">
                    <a href="#">
                        <i class="fas fa-cart-plus"></i>
                        0
                    </a>
                </div>
            </nav>
        </div>
    </div>

</header>
