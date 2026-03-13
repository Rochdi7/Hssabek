<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\System\DeleteAccountRequest;
use App\Models\Tenancy\Tenant;
use Illuminate\Http\Request;

class DeleteAccountRequestController extends Controller
{
    public function index()
    {
        $requests = DeleteAccountRequest::with(['requester', 'tenant', 'handler'])
            ->latest()
            ->paginate(20);

        $pendingCount = DeleteAccountRequest::where('status', 'pending')->count();

        return view('backoffice.superadmin.delete-requests.index', compact('requests', 'pendingCount'));
    }

    public function confirm(Request $request, DeleteAccountRequest $deleteRequest)
    {
        $deleteRequest->update([
            'status' => 'confirmed',
            'handled_by' => auth()->id(),
            'handled_at' => now(),
            'admin_notes' => $request->input('admin_notes'),
        ]);

        // Suspend the tenant
        $tenant = $deleteRequest->tenant;
        if ($tenant) {
            $tenant->update(['status' => 'cancelled']);
        }

        return redirect()->route('sa.delete-requests.index')
            ->with('success', __("Demande confirmée. Le compte « {$tenant->name} » a été désactivé."));
    }

    public function cancel(Request $request, DeleteAccountRequest $deleteRequest)
    {
        $deleteRequest->update([
            'status' => 'cancelled',
            'handled_by' => auth()->id(),
            'handled_at' => now(),
            'admin_notes' => $request->input('admin_notes'),
        ]);

        return redirect()->route('sa.delete-requests.index')
            ->with('success', __('Demande de suppression annulée.'));
    }
}
