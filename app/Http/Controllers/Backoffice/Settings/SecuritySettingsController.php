<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\System\DeleteAccountRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SecuritySettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        $pendingDeleteRequest = DeleteAccountRequest::where('status', 'pending')->first();

        // Get active sessions for the current user from the database
        $sessions = DB::table('sessions')
            ->where('user_id', $user->id)
            ->orderByDesc('last_activity')
            ->get()
            ->map(function ($session) {
                $agent = $session->user_agent ?? '';
                return (object) [
                    'id' => $session->id,
                    'ip_address' => $session->ip_address,
                    'user_agent' => $agent,
                    'device' => $this->parseDevice($agent),
                    'last_activity' => \Carbon\Carbon::createFromTimestamp($session->last_activity),
                    'is_current' => $session->id === session()->getId(),
                ];
            });

        return view('backoffice.settings.security', compact('user', 'settings', 'pendingDeleteRequest', 'sessions'));
    }

    /**
     * Revoke a specific session (logout from a device).
     */
    public function revokeSession(Request $request, string $sessionId): RedirectResponse
    {
        $deleted = DB::table('sessions')
            ->where('id', $sessionId)
            ->where('user_id', auth()->id())
            ->delete();

        if ($deleted) {
            return back()->with('success', __('La session a été révoquée avec succès.'));
        }

        return back()->with('error', __('Session introuvable.'));
    }

    /**
     * Deactivate the current user account.
     */
    public function deactivate(Request $request): RedirectResponse
    {
        $user = auth()->user();
        $user->update(['status' => 'blocked']);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', __('Votre compte a été désactivé. Connectez-vous pour le réactiver.'));
    }

    /**
     * Parse the user agent string to get a readable device name.
     */
    private function parseDevice(string $userAgent): string
    {
        $browser = 'Navigateur inconnu';
        $os = '';

        if (str_contains($userAgent, 'Firefox')) {
            $browser = 'Firefox';
        } elseif (str_contains($userAgent, 'Edg')) {
            $browser = 'Edge';
        } elseif (str_contains($userAgent, 'Chrome')) {
            $browser = 'Chrome';
        } elseif (str_contains($userAgent, 'Safari')) {
            $browser = 'Safari';
        } elseif (str_contains($userAgent, 'Opera') || str_contains($userAgent, 'OPR')) {
            $browser = 'Opera';
        }

        if (str_contains($userAgent, 'Windows')) {
            $os = 'Windows';
        } elseif (str_contains($userAgent, 'Macintosh') || str_contains($userAgent, 'Mac OS')) {
            $os = 'macOS';
        } elseif (str_contains($userAgent, 'Linux')) {
            $os = 'Linux';
        } elseif (str_contains($userAgent, 'Android')) {
            $os = 'Android';
        } elseif (str_contains($userAgent, 'iPhone') || str_contains($userAgent, 'iPad')) {
            $os = 'iOS';
        }

        return $os ? "$browser - $os" : $browser;
    }
}
