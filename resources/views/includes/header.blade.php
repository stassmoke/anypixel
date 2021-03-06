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
                        <a href="{{ route('catalog') }}">Shop</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Contact</a>
                    </li>
                    <li class="menu-item menu-login__btn">
                        <a href="#">Login</a>
                    </li>
                </ul>
            </nav>

            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <div class="wrap-nav__mob">
        <ul id="menu">
            <div class="navbar-logo__close">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="/" class="navbar-logo">
                <img class="navbar-logo__img" src="{{ asset('img/anypixel-logo__nav.png') }}" alt="anypixel">
            </a>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="{{ route('catalog') }}">Shop</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
</header>
