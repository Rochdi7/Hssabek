<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'identifyTenant' => \App\Http\Middleware\IdentifyTenantByDomain::class,
            'tenantActive' => \App\Http\Middleware\EnsureTenantIsActive::class,
            'setTenantContext' => \App\Http\Middleware\SetTenantContext::class,
            'isSuperAdmin' => \App\Http\Middleware\IsSuperAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
