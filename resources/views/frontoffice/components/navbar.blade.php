<!-- Header -->
<header class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="#" aria-label="Menu">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('home') }}" class="navbar-brand logo">
                    <img src="{{ url('assets/images/logo/logo-wide-cropped.svg') }}" class="img-fluid logo-light"
                        alt="{{ config('app.name') }}">
                    <img src="{{ url('assets/images/logo/logo-wide-cropped.svg') }}" class="img-fluid logo-dark"
                        alt="{{ config('app.name') }}">
                </a>
                <a href="{{ route('home') }}" class="navbar-brand logo-small">
                    <img src="{{ url('assets/images/logo/logo-wide-cropped.svg') }}" class="img-fluid logo-light"
                        alt="{{ config('app.name') }}">
                    <img src="{{ url('assets/images/logo/logo-wide-cropped.svg') }}" class="img-fluid logo-dark"
                        alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('home') }}" class="menu-logo">
                        <img src="{{ url('assets/images/logo/logo-wide-cropped.svg') }}" class="img-fluid"
                            alt="{{ config('app.name') }}">
                    </a>

                    <a id="menu_close" class="menu-close" href="#" aria-label="Fermer le menu"> <i class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav navbar-nav" id="scroll-nav">
                    <li class="nav-item"><a href="{{ route('home') }}"
                            class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('Accueil') }}</a></li>
                    <li class="nav-item"><a href="{{ route('features') }}"
                            class="nav-link {{ request()->routeIs('features') ? 'active' : '' }}">{{ __('Fonctionnalités') }}</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('pricing') }}"
                            class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}">{{ __('Tarifs') }}</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}"
                            class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('Contact') }}</a></li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                <!-- Language Switcher -->
                <li class="nav-item dropdown me-0">
                    <a class="btn btn-lg btn-white border border-1 border-light dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe me-1"></i>
                        {{ app()->getLocale() === 'ar' ? 'العربية' : 'Français' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form method="POST" action="{{ route('locale.switch') }}">
                                @csrf
                                <input type="hidden" name="locale" value="fr">
                                <button type="submit" class="dropdown-item {{ app()->getLocale() === 'fr' ? 'active' : '' }}">
                                    🇫🇷 Français
                                </button>
                            </form>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('locale.switch') }}">
                                @csrf
                                <input type="hidden" name="locale" value="ar">
                                <button type="submit" class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}">
                                    🇸🇦 العربية
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn btn-lg btn-primary" href="{{ route('request-account') }}"><i
                            class="isax isax-user fs-13 fw-bold me-2"></i>{{ __('Demander un accès') }}</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- /Header -->
