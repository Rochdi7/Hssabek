<?php

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('web', \App\Http\Middleware\ContentSecurityPolicy::class);
        // $middleware->appendToGroup('web', \VinkiusLabs\LaravelPageSpeed\Middleware\RemoveComments::class);
        // $middleware->appendToGroup('web', \VinkiusLabs\LaravelPageSpeed\Middleware\CollapseWhitespace::class);

        $middleware->alias([
            'identifyTenant' => \App\Http\Middleware\IdentifyTenantByDomain::class,
            'requireTenantContext' => \App\Http\Middleware\RequireTenantContext::class,
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
        $expectsJson = static function (Request $request): bool {
            return $request->expectsJson() || $request->wantsJson() || $request->ajax();
        };

        $isStateChangingRequest = static function (Request $request): bool {
            return in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'], true);
        };

        $friendlyWebHandlingEnabled = static function (Request $request) use ($isStateChangingRequest): bool {
            return ! config('app.debug') && $isStateChangingRequest($request);
        };

        $jsonErrorResponse = static function (int $status, string $message, array $errors = []) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'errors' => $errors,
            ], $status);
        };

        $redirectBackWithError = static function (Request $request, string $message) {
            $response = back()->with('error', $message);

            if ($request->method() !== 'DELETE') {
                $response->withInput();
            }

            return $response;
        };

        $safeHttpMessage = static function (Throwable $exception, int $status, string $fallback): string {
            if ($status === 422 && $exception->getMessage() !== '') {
                return $exception->getMessage();
            }

            return $fallback;
        };

        $exceptions->render(function (ValidationException $exception, Request $request) use ($expectsJson, $jsonErrorResponse) {
            $message = __('Veuillez corriger les erreurs du formulaire et reessayer.');

            if ($expectsJson($request)) {
                return $jsonErrorResponse(422, $message, $exception->errors());
            }

            return back()
                ->withInput()
                ->withErrors($exception->errors(), $exception->errorBag)
                ->with('error', $message);
        });

        $exceptions->render(function (QueryException $exception, Request $request) use (
            $expectsJson,
            $friendlyWebHandlingEnabled,
            $jsonErrorResponse,
            $redirectBackWithError
        ) {
            $message = __('Une erreur est survenue lors de l\'enregistrement des donnees. Veuillez reessayer.');

            if ($expectsJson($request)) {
                return $jsonErrorResponse(500, $message);
            }

            if ($friendlyWebHandlingEnabled($request)) {
                return $redirectBackWithError($request, $message);
            }

            return null;
        });

        $exceptions->render(function (Throwable $exception, Request $request) use (
            $expectsJson,
            $friendlyWebHandlingEnabled,
            $jsonErrorResponse,
            $redirectBackWithError,
            $safeHttpMessage
        ) {
            if ($exception instanceof ValidationException || $exception instanceof QueryException) {
                return null;
            }

            $status = $exception instanceof HttpExceptionInterface
                ? $exception->getStatusCode()
                : 500;

            if ($expectsJson($request)) {
                $message = match ($status) {
                    403 => __('Vous n\'etes pas autorise a effectuer cette action.'),
                    404 => __('La ressource demandee est introuvable.'),
                    422 => $safeHttpMessage($exception, $status, __('Impossible de traiter votre demande.')),
                    default => __('Une erreur inattendue est survenue. Veuillez reessayer plus tard.'),
                };

                return $jsonErrorResponse($status, $message);
            }

            if ($friendlyWebHandlingEnabled($request)) {
                $message = $status === 422
                    ? $safeHttpMessage($exception, $status, __('Impossible de traiter votre demande.'))
                    : __('Une erreur inattendue est survenue. Veuillez reessayer.');

                return $redirectBackWithError($request, $message);
            }

            return null;
        });
    })->create();
