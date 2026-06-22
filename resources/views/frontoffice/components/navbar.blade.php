@push('styles')
<style>
@media (max-width: 991.98px) {
    .navbar-brand.logo-small img {
        height: 50px !important;
        width: auto !important;
        max-width: none !important;
        max-height: none !important;
    }
}
</style>
@endpush
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
                {{-- Desktop logo (hidden on mobile by theme) --}}
                <a href="{{ route('home') }}" class="navbar-brand logo">
                    <img src="{{ url('assets/images/logo/hssabek mobile logo.png') }}"
                        alt="{{ config('app.name') }}" style="height:50px;width:auto;">
                </a>
                {{-- Mobile logo (shown & centered on mobile by theme) --}}
                <a href="{{ route('home') }}" class="navbar-brand logo-small">
                    <img src="{{ url('assets/images/logo/hssabek mobile logo.png') }}"
                        alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('home') }}" class="menu-logo">
                        <picture>
                            <source srcset="{{ url('assets/images/logo/hssabek-logo.webp') }}" type="image/webp">
                            <img src="{{ url('assets/images/logo/hssabek mobile logo.png') }}" class="img-fluid"
                                alt="{{ config('app.name') }}" width="72" height="36" style="height:36px;width:auto;">
                        </picture>
                    </a>

                    <a id="menu_close" class="menu-close" href="#" aria-label="Fermer le menu"> <i
                            class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav navbar-nav" id="scroll-nav">
                    <li class="nav-item"><a href="{{ route('home') }}"
                            class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('Accueil') }}</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('features') }}"
                            class="nav-link {{ request()->routeIs('features') ? 'active' : '' }}">{{ __('Fonctionnalités') }}</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('pricing') }}"
                            class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}">{{ __('Tarifs') }}</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('blog.index') }}"
                            class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">{{ __('Blog') }}</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('contact') }}"
                            class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('Contact') }}</a>
                    </li>

                    {{-- Mobile-only: Language switcher --}}
                    <li class="nav-item d-lg-none mt-3">
                        <div class="d-flex align-items-center gap-2">
                            <form method="POST" action="{{ route('locale.switch') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="locale" value="fr">
                                <button type="submit" style="display:inline-flex;align-items:center;gap:6px;padding:5px 12px;font-size:13px;border-radius:8px;border:1px solid {{ app()->getLocale() === 'fr' ? '#7539ff' : '#dee2e6' }};background:{{ app()->getLocale() === 'fr' ? '#f0ebff' : '#fff' }};color:#333;font-weight:{{ app()->getLocale() === 'fr' ? '600' : '400' }};">
                                    <img src="{{ asset('build/img/flags/fr.svg') }}" alt="FR" width="20" style="border-radius:2px;">Français
                                </button>
                            </form>
                            <form method="POST" action="{{ route('locale.switch') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="locale" value="ar">
                                <button type="submit" style="display:inline-flex;align-items:center;gap:6px;padding:5px 12px;font-size:13px;border-radius:8px;border:1px solid {{ app()->getLocale() === 'ar' ? '#7539ff' : '#dee2e6' }};background:{{ app()->getLocale() === 'ar' ? '#f0ebff' : '#fff' }};color:#333;font-weight:{{ app()->getLocale() === 'ar' ? '600' : '400' }};">
                                    <img src="{{ asset('build/img/flags/ae.svg') }}" alt="AR" width="20" style="border-radius:2px;">العربية
                                </button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item d-lg-none mt-2">
                        <a style="display:inline-flex;align-items:center;gap:6px;padding:8px 20px;font-size:14px;font-weight:600;background:#7539ff;color:#fff;border-radius:8px;text-decoration:none;" href="{{ route('request-account') }}">
                            <i class="isax isax-user" style="font-size:15px;"></i>{{ __('Demander un accès') }}
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                <!-- Language Switcher -->
                <li class="nav-item dropdown me-0">
                    <a class="btn btn-lg btn-white border border-1 border-light dropdown-toggle d-flex align-items-center gap-2" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset(app()->getLocale() === 'ar' ? 'build/img/flags/ae.svg' : 'build/img/flags/fr.svg') }}" width="20" style="border-radius:2px;">
                        {{ app()->getLocale() === 'ar' ? 'العربية' : 'Français' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-2">
                        <li>
                            <form method="POST" action="{{ route('locale.switch') }}">
                                @csrf
                                <input type="hidden" name="locale" value="fr">
                                <button type="submit" class="dropdown-item d-flex align-items-center {{ app()->getLocale() === 'fr' ? 'active' : '' }}">
                                    <img src="{{ asset('build/img/flags/fr.svg') }}" alt="Français" class="me-2" width="22" style="border-radius:2px;">Français
                                </button>
                            </form>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('locale.switch') }}">
                                @csrf
                                <input type="hidden" name="locale" value="ar">
                                <button type="submit" class="dropdown-item d-flex align-items-center {{ app()->getLocale() === 'ar' ? 'active' : '' }}">
                                    <img src="{{ asset('build/img/flags/ae.svg') }}" alt="العربية" class="me-2" width="22" style="border-radius:2px;">العربية
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
