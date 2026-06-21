<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de votre e-mail</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f6f9; padding: 40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="520" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); overflow: hidden;">
                    <!-- Header -->
                    <tr>
                        <td align="center" style="padding: 32px 40px 16px;">
                            <img src="{{ asset('build/img/logo.svg') }}" alt="Logo" style="max-height: 40px;">
                        </td>
                    </tr>
                    <!-- Icon -->
                    <tr>
                        <td align="center" style="padding: 16px 40px 8px;">
                            <div style="width: 64px; height: 64px; border-radius: 50%; background-color: #e6f9ee; display: inline-flex; align-items: center; justify-content: center;">
                                <span style="font-size: 32px; color: #159F46;">&#10003;</span>
                            </div>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td align="center" style="padding: 16px 40px;">
                            <h2 style="margin: 0 0 8px; font-size: 20px; color: #1a1a2e;">Vérifiez votre adresse e-mail</h2>
                            <p style="margin: 0 0 24px; font-size: 14px; color: #6c757d; line-height: 1.6;">
                                Bonjour {{ $user->name }},<br>
                                Cliquez sur le bouton ci-dessous pour vérifier votre adresse e-mail et activer votre compte.
                            </p>
                            <a href="{{ $verificationUrl }}" style="display: inline-block; padding: 12px 32px; background: linear-gradient(135deg, #7366ff, #6355ee); color: #ffffff; text-decoration: none; border-radius: 8px; font-size: 15px; font-weight: 600;">
                                Vérifier mon e-mail
                            </a>
                        </td>
                    </tr>
                    <!-- Expiration notice -->
                    <tr>
                        <td align="center" style="padding: 24px 40px 8px;">
                            <p style="margin: 0; font-size: 13px; color: #999;">
                                Ce lien expire dans <strong>1 heure</strong>. Si vous n'avez pas demandé cette vérification, ignorez cet e-mail.
                            </p>
                        </td>
                    </tr>
                    <!-- Fallback URL -->
                    <tr>
                        <td align="center" style="padding: 16px 40px;">
                            <p style="margin: 0; font-size: 12px; color: #aaa; word-break: break-all;">
                                Si le bouton ne fonctionne pas, copiez ce lien :<br>
                                <a href="{{ $verificationUrl }}" style="color: #7366ff;">{{ $verificationUrl }}</a>
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td align="center" style="padding: 24px 40px 32px; border-top: 1px solid #f0f0f0;">
                            <p style="margin: 0; font-size: 12px; color: #aaa;">
                                &copy; {{ date('Y') }} {{ config('app.name', 'Hssabek') }}. Tous droits réservés.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
