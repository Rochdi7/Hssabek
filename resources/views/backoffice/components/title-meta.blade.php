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
        {{ config('app.name', 'Facturation') }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="{{ config('app.name', 'Facturation') }} - Application de gestion et facturation SaaS">
    <meta name="author" content="{{ config('app.name', 'Facturation') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('backoffice.layout.partials.head')

</head>
