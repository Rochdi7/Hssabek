<!-- Header -->
<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="#">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('home') }}" class="navbar-brand logo">
                    <img src="{{ url('assets/images/logo/logo-wide-cropped.svg') }}" class="img-fluid"
                        alt="{{ config('app.name') }}">
                </a>
                <a href="{{ route('home') }}" class="navbar-brand logo-small">
                    <img src="{{ url('assets/images/logo/favicon.svg') }}" class="img-fluid"
                        alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('home') }}" class="menu-logo">
                        <img src="{{ url('assets/images/logo/logo-wide-cropped.svg') }}" class="img-fluid"
                            alt="{{ config('app.name') }}">
                    </a>
                    <a id="menu_close" class="menu-close" href="#"> <i class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav navbar-nav" id="scroll-nav">
                    <li class="nav-item"><a href="{{ route('home') }}"
                            class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
                    <li class="nav-item"><a href="{{ route('features') }}"
                            class="nav-link {{ request()->routeIs('features') ? 'active' : '' }}">Fonctionnalités</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('pricing') }}"
                            class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}">Tarifs</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}"
                            class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                <li class="nav-item me-0">
                    <a class="btn btn-lg btn-white border border-1 border-light" href="{{ route('login') }}"><i
                            class="isax isax-lock-15 fs-13 fw-bold me-2"></i>Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-lg btn-primary" href="{{ route('register') }}"><i
                            class="isax isax-user fs-13 fw-bold me-2"></i>Inscription</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- /Header -->
