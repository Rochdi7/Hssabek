<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Accueil') | {{ config('app.name', 'Facturation') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', config('app.name') . ' — Logiciel de facturation et gestion commerciale en ligne')">
    <meta name="author" content="{{ config('app.name', 'Facturation') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('build/img/apple-touch-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('build/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('build/css/bootstrap.min.css') }}">

    <!-- Iconsax CSS -->
    <link rel="stylesheet" href="{{ url('build/css/iconsax.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ url('build/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('build/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('build/css/style.css') }}">

    <style>
        .public-navbar {
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 12px 0;
        }
        .public-navbar .navbar-brand img {
            height: 36px;
        }
        .public-navbar .nav-link {
            color: #333;
            font-weight: 500;
            padding: 8px 16px !important;
        }
        .public-navbar .nav-link:hover,
        .public-navbar .nav-link.active {
            color: var(--bs-primary, #405189);
        }
        .public-hero {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fc 0%, #e8ecf4 100%);
        }
        .public-section {
            padding: 60px 0;
        }
        .public-footer {
            background: #1B2850;
            color: #ccc;
            padding: 40px 0 20px;
        }
        .public-footer a {
            color: #ccc;
            text-decoration: none;
        }
        .public-footer a:hover {
            color: #fff;
        }
        .public-footer h6 {
            color: #fff;
            font-size: 14px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-white">

    {{-- ===== NAVBAR ===== --}}
    <nav class="public-navbar navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ url('build/img/logo.svg') }}" alt="{{ config('app.name') }}">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="publicNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('features') ? 'active' : '' }}" href="{{ route('features') }}">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}" href="{{ route('pricing') }}">Tarification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Connexion</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Inscription gratuite</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ===== CONTENT ===== --}}
    @yield('content')

    {{-- ===== FOOTER ===== --}}
    <footer class="public-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="{{ url('build/img/logo-white.svg') }}" alt="{{ config('app.name') }}" class="mb-3" style="height: 32px;" onerror="this.style.display='none'">
                    <p class="mb-0 fs-14">{{ config('app.name') }} — Logiciel de facturation et gestion commerciale en ligne pour les entreprises de toutes tailles.</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h6>Produit</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="{{ route('features') }}">Fonctionnalités</a></li>
                        <li class="mb-2"><a href="{{ route('pricing') }}">Tarification</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h6>Entreprise</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="{{ route('contact') }}">Contact</a></li>
                        @if(Route::has('terms'))
                            <li class="mb-2"><a href="{{ route('terms') }}">CGU</a></li>
                        @endif
                        @if(Route::has('privacy'))
                            <li class="mb-2"><a href="{{ route('privacy') }}">Confidentialité</a></li>
                        @endif
                        @if(Route::has('legal'))
                            <li class="mb-2"><a href="{{ route('legal') }}">Mentions légales</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h6>Commencer</h6>
                    <p class="fs-14 mb-3">Créez votre compte gratuitement et commencez à facturer en quelques minutes.</p>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-primary">Créer un compte</a>
                </div>
            </div>
            <hr class="my-3 border-secondary">
            <div class="text-center">
                <p class="mb-0 fs-12">&copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ url('build/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ url('build/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
