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
        $middleware->appendToGroup('web', \App\Http\Middleware\ContentSecurityPolicy::class);

        $middleware->alias([
            'identifyTenant' => \App\Http\Middleware\IdentifyTenantByDomain::class,
            'tenantActive' => \App\Http\Middleware\EnsureTenantIsActive::class,
            'setTenantContext' => \App\Http\Middleware\SetTenantContext::class,
            'isSuperAdmin' => \App\Http\Middleware\IsSuperAdmin::class,
            'superAdminOnly' => \App\Http\Middleware\IsSuperAdmin::class,
            'permission' => \App\Http\Middleware\RequirePermission::class,
            'plan.limit' => \App\Http\Middleware\CheckPlanLimit::class,
            'subscriptionActive' => \App\Http\Middleware\EnsureActiveSubscription::class,
            'setSuperAdminLocale' => \App\Http\Middleware\SetSuperAdminLocale::class,
            'setFrontofficeLocale' => \App\Http\Middleware\SetFrontofficeLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
