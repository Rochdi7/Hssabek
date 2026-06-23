<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Hssabek') }}</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f6f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
        .email-wrapper { max-width: 600px; margin: 0 auto; padding: 20px; }
        .email-header { background-color: #1B2850; padding: 28px 24px; text-align: center; border-radius: 8px 8px 0 0; }
        .email-header img { height: 42px; width: auto; }
        .email-header-tagline { color: #a8b8d8; margin: 10px 0 0; font-size: 12px; letter-spacing: 0.3px; }
        .email-body { background-color: #ffffff; padding: 36px 40px; border-left: 1px solid #e9ecef; border-right: 1px solid #e9ecef; }
        .email-body h1 { color: #1B2850; margin: 0 0 20px; font-size: 20px; font-weight: 700; }
        .email-body p { color: #555; line-height: 1.7; margin: 0 0 16px; font-size: 15px; }
        .btn-wrap { text-align: center; margin: 28px 0; }
        .btn { display: inline-block; padding: 14px 32px; background-color: #5C5FE9; color: #ffffff !important; text-decoration: none; border-radius: 8px; font-weight: 700; font-size: 15px; }
        .divider { border: none; border-top: 1px solid #eee; margin: 24px 0; }
        .fallback { font-size: 12px; color: #999; word-break: break-all; }
        .fallback a { color: #5C5FE9; }
        .email-footer { background-color: #f8f9fc; padding: 20px 24px; text-align: center; border-radius: 0 0 8px 8px; border: 1px solid #e9ecef; border-top: none; }
        .email-footer p { color: #999; font-size: 12px; margin: 0; }
        .email-footer a { color: #5C5FE9; text-decoration: none; }
    </style>
</head>
<body>
<div class="email-wrapper">

    {{-- Header --}}
    <div class="email-header">
        <img src="{{ asset('assets/images/logo/logo-wide-white.png') }}" alt="Hssabek">
        <p class="email-header-tagline">Gestion &amp; Facturation</p>
    </div>

    {{-- Body --}}
    <div class="email-body">

        {{-- Greeting --}}
        @if (!empty($greeting))
            <h1>{{ $greeting }}</h1>
        @else
            @if ($level === 'error')
                <h1>Oups !</h1>
            @else
                <h1>Bonjour !</h1>
            @endif
        @endif

        {{-- Intro Lines --}}
        @foreach ($introLines as $line)
            <p>{{ $line }}</p>
        @endforeach

        {{-- Action Button --}}
        @isset($actionText)
            @php
                $btnColor = match ($level) {
                    'success' => '#28a745',
                    'error'   => '#dc3545',
                    default   => '#5C5FE9',
                };
            @endphp
            <div class="btn-wrap">
                <a href="{{ $actionUrl }}" class="btn" style="background-color: {{ $btnColor }};">
                    {{ $actionText }}
                </a>
            </div>
        @endisset

        {{-- Outro Lines --}}
        @foreach ($outroLines as $line)
            <p>{{ $line }}</p>
        @endforeach

        {{-- Salutation --}}
        @if (!empty($salutation))
            <p>{{ $salutation }}</p>
        @else
            <p>Cordialement,<br><strong>L'équipe Hssabek</strong></p>
        @endif

        {{-- Subcopy / fallback URL --}}
        @isset($actionText)
            <hr class="divider">
            <p class="fallback">
                Si le bouton « {{ $actionText }} » ne fonctionne pas, copiez et collez ce lien dans votre navigateur :<br>
                <a href="{{ $actionUrl }}">{{ $displayableActionUrl }}</a>
            </p>
        @endisset

    </div>

    {{-- Footer --}}
    <div class="email-footer">
        <p>&copy; {{ date('Y') }} Hssabek — Gestion &amp; Facturation. Tous droits réservés.</p>
    </div>

</div>
</body>
</html>
