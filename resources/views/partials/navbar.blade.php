<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">Vegefoods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (request()->routeIs('welcome')) ? 'active' : '' }}"><a href="{{ route('welcome') }}" class="nav-link">Home</a></li>
                <li class="nav-item {{ (request()->routeIs('product')) ? 'active' : '' }}"><a href="{{ route('product') }}" class="nav-link">All Product</a></li>
                <li class="nav-item {{ (request()->routeIs('wishlist')) ? 'active' : '' }}"><a href="{{ route('wishlist') }}" class="nav-link">Wishlist</a></li>
                <li class="nav-item {{ (request()->routeIs('contact')) ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Contact Us</a></li>
                <li class="nav-item">
                    @guest
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}" class="nav-link"> {{ mb_substr(Auth::user()->name, 0, 7) }}</a>
                    @endauth
                </li>
                @auth
                    @if (Auth::user()->type === 'admin')
                        <li class="nav-item"><a href="contact.html" class="nav-link">Admin Dashboard</a></li>
                    @endif
                @endauth
                <li class="nav-item {{ (request()->routeIs('cart')) ? 'cta cta-colored' : '' }}">
                    <a href="{{ route('cart') }}" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
