<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Public routes (landing, pricing, etc.)
| Backoffice (tenant)
| SuperAdmin (SaaS owner)
|
*/


/*
|--------------------------------------------------------------------------
| 🌍 PUBLIC WEBSITE (FRONTOFFICE)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/frontoffice.php';


/*
|--------------------------------------------------------------------------
| 📊 DASHBOARD (POST-LOGIN REDIRECT)
|--------------------------------------------------------------------------
|
| Central dashboard route that intelligently routes to:
| - /backoffice for tenant users
| - /admin for superadmin users
|
*/

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', function (Illuminate\Http\Request $request) {
        $user = $request->user();

        // Superadmin user (no tenant or has super_admin role)
        if ($user->tenant_id === null || $user->hasRole('super_admin')) {
            return redirect()->route('sa.dashboard');
        }

        // Tenant user
        return redirect()->route('bo.dashboard');
    })->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| 🔐 AUTHENTICATION (PUBLIC)
|--------------------------------------------------------------------------
|
| URL: /login, /register, /forgot-password, etc.
| Accessible without prefix
|
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| 🏢 BACKOFFICE (TENANT AREA)
|--------------------------------------------------------------------------
|
| URL: /backoffice/*
| Names: bo.*
|
*/

Route::prefix('backoffice')
    ->as('bo.')
    ->middleware([
        'web',
        'identifyTenant',
        'tenantActive',
        'setTenantContext',
    ])
    ->group(function () {

        // Auth routes
        require __DIR__ . '/backoffice/auth.php';

        // Public invitation accept (no auth required)
        Route::get('/accept-invitation/{token}', [\App\Http\Controllers\Backoffice\Users\UserInvitationController::class, 'accept'])
            ->name('invitation.accept');
        Route::post('/accept-invitation/{token}', [\App\Http\Controllers\Backoffice\Users\UserInvitationController::class, 'acceptStore'])
            ->name('invitation.accept.store');

        // Protected routes
        Route::middleware(['auth', 'subscriptionActive'])->group(function () {

            // Quick language switch from header
            Route::post('/locale/switch', \App\Http\Controllers\Backoffice\LocaleSwitchController::class)->name('locale.switch');

            require __DIR__ . '/backoffice/dashboard.php';
            require __DIR__ . '/backoffice/settings.php';
            require __DIR__ . '/backoffice/users.php';
            require __DIR__ . '/backoffice/access.php';
            require __DIR__ . '/backoffice/crm.php';
            require __DIR__ . '/backoffice/catalog.php';
            require __DIR__ . '/backoffice/inventory.php';
            require __DIR__ . '/backoffice/sales.php';
            require __DIR__ . '/backoffice/purchases.php';
            require __DIR__ . '/backoffice/finance.php';
            require __DIR__ . '/backoffice/pro.php';
            require __DIR__ . '/backoffice/reports.php';
            require __DIR__ . '/backoffice/notifications.php';
            require __DIR__ . '/backoffice/trash.php';
            require __DIR__ . '/backoffice/export.php';
            require __DIR__ . '/backoffice/documentation.php';
        });
    });



/*
|--------------------------------------------------------------------------
| 👑 SUPERADMIN (SaaS OWNER PANEL)
|--------------------------------------------------------------------------
|
| URL: /admin/*
| Names: sa.*
|
*/

Route::prefix('admin')
    ->as('sa.')
    ->middleware([
        'web',
        'auth',
        'isSuperAdmin'
    ])
    ->group(function () {

        require __DIR__ . '/superadmin/dashboard.php';
        require __DIR__ . '/superadmin/tenants.php';
        require __DIR__ . '/superadmin/plans.php';
        require __DIR__ . '/superadmin/subscriptions.php';
        require __DIR__ . '/superadmin/templates.php';
        require __DIR__ . '/superadmin/settings.php';
        require __DIR__ . '/superadmin/access.php';
        require __DIR__ . '/superadmin/announcements.php';
        require __DIR__ . '/superadmin/activity-logs.php';
        require __DIR__ . '/superadmin/contact-messages.php';
    });

// this route for testing the theming system, can be removed later
// require __DIR__.'/themeroutes.php';

/*
|--------------------------------------------------------------------------
| ❌ Fallback (404)
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    abort(404);
});
