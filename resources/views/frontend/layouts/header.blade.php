<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto">
            <a href="{{ route('frontend') }}">Logo</a>
        </h1>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('frontend') }}" class="{{ setActive('frontend') }}">Home</a></li>
                <li><a href="{{ route('frontend-products') }}" class="{{ setActive('frontend-products') }}">Products</a></li>
                <li class="dropdown">
                    <a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li>
                            <a class="dropdown-item" href = "{{ route('logout') }}" onclick = "event.preventDefault();document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
