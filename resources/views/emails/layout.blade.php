<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f6f9; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
        .email-wrapper { max-width: 600px; margin: 0 auto; padding: 20px; }
        .email-header { background-color: #1B2850; padding: 24px; text-align: center; border-radius: 8px 8px 0 0; }
        .email-header img { height: 32px; }
        .email-header h2 { color: #ffffff; margin: 12px 0 0; font-size: 18px; }
        .email-body { background-color: #ffffff; padding: 32px; border-left: 1px solid #e9ecef; border-right: 1px solid #e9ecef; }
        .email-body h3 { color: #1B2850; margin-top: 0; }
        .email-body p { color: #555; line-height: 1.6; margin: 0 0 16px; }
        .email-body .highlight { background-color: #f8f9fc; padding: 16px; border-radius: 6px; border-left: 4px solid #405189; margin: 16px 0; }
        .email-body .highlight p { margin: 4px 0; }
        .email-body .btn { display: inline-block; padding: 12px 24px; background-color: #405189; color: #ffffff !important; text-decoration: none; border-radius: 6px; font-weight: 600; }
        .email-footer { background-color: #f8f9fc; padding: 20px; text-align: center; border-radius: 0 0 8px 8px; border: 1px solid #e9ecef; border-top: none; }
        .email-footer p { color: #999; font-size: 12px; margin: 0; }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            <h2>{{ $tenantName ?? config('app.name') }}</h2>
        </div>
        <div class="email-body">
            @yield('body')
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} {{ $tenantName ?? config('app.name') }}. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
