<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\System\DeleteAccountRequest;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reason_type' => 'required|in:no_longer_using,privacy,notifications,poor_experience,other',
            'reason_details' => 'required_if:reason_type,other|nullable|string|max:1000',
        ], [
            'reason_type.required' => 'Veuillez sélectionner une raison.',
            'reason_details.required_if' => 'Veuillez préciser la raison de votre demande.',
        ]);

        $tenant = TenantContext::get();

        // Check if there's already a pending request
        $existing = DeleteAccountRequest::where('status', 'pending')->first();

        if ($existing) {
            return redirect()->route('bo.settings.security.index')
                ->with('error', __('Une demande de suppression est déjà en cours de traitement.'));
        }

        DeleteAccountRequest::create([
            'requested_by' => auth()->id(),
            'reason_type' => $request->input('reason_type'),
            'reason_details' => $request->input('reason_details'),
            'status' => 'pending',
        ]);

        return redirect()->route('bo.settings.security.index')
            ->with('success', __('Votre demande de suppression de compte a été envoyée. Notre équipe vous contactera sous peu.'));
    }
}
