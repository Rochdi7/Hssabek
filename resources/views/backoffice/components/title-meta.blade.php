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
        content="{{ config('app.name', 'Hssabek') }} — {{ __('Application de gestion et facturation SaaS') }}">
    <meta name="author" content="{{ config('app.name', 'Hssabek') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('backoffice.layout.partials.head')

    @stack('styles')

</head>
