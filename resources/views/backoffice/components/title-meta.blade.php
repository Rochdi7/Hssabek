<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @hasSection('title')
            @yield('title') |
        @else
            {{ ucwords(str_replace(['-', '_', '.'], ' ', $page ?? 'Dashboard')) }} |
        @endif
        {{ config('app.name', 'Hssabek') }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="@hasSection('description')@yield('description')@else{{ config('app.name', 'Hssabek') }} — {{ __('Application de gestion et facturation SaaS') }}@endif">
    <meta name="author" content="{{ config('app.name', 'Hssabek') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PWA -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4361ee">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name', 'Hssabek') }}">
    <link rel="apple-touch-icon" href="/favicon.ico">

    @include('backoffice.layout.partials.head')

    @stack('styles')

</head>
