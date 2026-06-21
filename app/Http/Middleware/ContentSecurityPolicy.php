<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        $contentType = $response->headers->get('Content-Type', '');

        // Skip CSP if the response already has its own Content-Security-Policy (e.g. PDF preview)
        if (str_contains($contentType, 'text/html') && !$response->headers->has('Content-Security-Policy')) {
            $response->headers->set(
                'Content-Security-Policy',
                "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; style-src-elem 'self' 'unsafe-inline' https://fonts.googleapis.com; img-src 'self' data: blob:; font-src 'self' https://fonts.gstatic.com; connect-src 'self'; object-src 'none'; frame-src blob: data:; frame-ancestors 'self'; base-uri 'self'; form-action 'self'"
            );
        }

        return $response;
    }
}
