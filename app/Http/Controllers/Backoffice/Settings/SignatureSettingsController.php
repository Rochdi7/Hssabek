<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreSignatureRequest;
use App\Http\Requests\Settings\UpdateSignatureRequest;
use App\Models\Tenancy\Signature;
use App\Services\Tenancy\TenantContext;

class SignatureSettingsController extends Controller
{
    public function index()
    {
        $signatures = Signature::latest()->get();

        return view('backoffice.settings.signatures', compact('signatures'));
    }

    public function store(StoreSignatureRequest $request)
    {
        $signature = Signature::create([
            'name' => $request->name,
            'is_default' => $request->boolean('is_default'),
            'status' => 'active',
        ]);

        if ($request->hasFile('signature_image')) {
            $signature->addMediaFromRequest('signature_image')->toMediaCollection('signature');
        }

        if ($signature->is_default) {
            Signature::where('id', '!=', $signature->id)->update(['is_default' => false]);
        }

        return redirect()->route('bo.settings.signatures.index')
            ->with('success', __('Signature ajoutée avec succès.'));
    }

    public function update(UpdateSignatureRequest $request, Signature $signature)
    {
        $signature->update([
            'name' => $request->name,
            'is_default' => $request->boolean('is_default'),
        ]);

        if ($request->hasFile('signature_image')) {
            $signature->addMediaFromRequest('signature_image')->toMediaCollection('signature');
        }

        if ($signature->is_default) {
            Signature::where('id', '!=', $signature->id)->update(['is_default' => false]);
        }

        return redirect()->route('bo.settings.signatures.index')
            ->with('success', __('Signature mise à jour avec succès.'));
    }

    public function toggleStatus(Signature $signature)
    {
        $signature->update([
            'status' => $signature->status === 'active' ? 'inactive' : 'active',
        ]);

        return redirect()->route('bo.settings.signatures.index')
            ->with('success', __('Statut de la signature mis à jour.'));
    }

    public function destroy(Signature $signature)
    {
        $signature->delete();

        return redirect()->route('bo.settings.signatures.index')
            ->with('success', __('Signature supprimée avec succès.'));
    }
}
