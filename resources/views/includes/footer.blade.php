<footer>
    <div class="site-footer">
        <div class="container">
            <div class="social-list">
                @foreach($socials as $social)
                    <a href="{{ $social->varLink }}" target="_blank">
                        <i class="fab {{ $social->varIcon }}"></i>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="site-copyright">
            <div>
                Copyright © {{ date('Y') }} All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
