<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Tenancy\Tenant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CampaignEmailController extends Controller
{
    public function compose(): View
    {
        // Collect one email per tenant: owner > admin > first user
        $tenantEmails = $this->collectTenantEmails();

        return view('backoffice.superadmin.campaign.compose', compact('tenantEmails'));
    }

    public function send(Request $request): RedirectResponse
    {
        $request->validate([
            'subject'    => ['required', 'string', 'max:255'],
            'body'       => ['required', 'string'],
            'recipients' => ['required', 'array', 'min:1'],
            'recipients.*' => ['email'],
        ], [
            'subject.required'    => 'Le sujet est obligatoire.',
            'body.required'       => 'Le contenu du message est obligatoire.',
            'recipients.required' => 'Sélectionnez au moins un destinataire.',
            'recipients.min'      => 'Sélectionnez au moins un destinataire.',
        ]);

        $subject    = $request->input('subject');
        $body       = $request->input('body');
        $recipients = $request->input('recipients');

        $sent   = 0;
        $failed = 0;

        foreach ($recipients as $email) {
            try {
                Mail::html($body, function ($message) use ($email, $subject) {
                    $message->to($email)->subject($subject);
                });
                $sent++;
            } catch (\Throwable $e) {
                $failed++;
                \Log::warning("Campaign email failed to {$email}: {$e->getMessage()}");
            }
        }

        $message = "Campagne envoyée : {$sent} email(s) envoyé(s)";
        if ($failed > 0) {
            $message .= ", {$failed} échec(s).";
        }

        return redirect()->route('sa.campaign.compose')->with('success', $message);
    }

    public function exportEmails(): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $emails = $this->collectTenantEmails()->values();

        $filename = 'tenant-emails-' . date('Y-m-d') . '.csv';

        return response()->streamDownload(function () use ($emails) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['tenant', 'email', 'name', 'role']);
            foreach ($emails as $row) {
                fputcsv($handle, [$row['tenant'], $row['email'], $row['name'], $row['role']]);
            }
            fclose($handle);
        }, $filename, ['Content-Type' => 'text/csv']);
    }

    private function collectTenantEmails(): \Illuminate\Support\Collection
    {
        return Tenant::with(['users' => function ($q) {
            $q->with('roles')->whereNotNull('email')->where('status', 'active');
        }])->get()->map(function (Tenant $tenant) {
            $users = $tenant->users;

            // Priority: owner role → admin role → first user
            $target = $users->first(fn ($u) => $u->hasRole('owner'))
                ?? $users->first(fn ($u) => $u->hasRole('admin'))
                ?? $users->first();

            if (! $target) {
                return null;
            }

            $role = $target->hasRole('owner') ? 'owner'
                : ($target->hasRole('admin') ? 'admin' : 'user');

            return [
                'tenant' => $tenant->name,
                'email'  => $target->email,
                'name'   => $target->name,
                'role'   => $role,
            ];
        })->filter()->keyBy('email');
    }
}
