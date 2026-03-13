<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Tenancy\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TemplateAssignmentController extends Controller
{
    /**
     * List all templates grouped by document type, with assignment counts.
     */
    public function index(Request $request)
    {
        $templates = DB::table('template_catalog')
            ->orderBy('document_type')
            ->orderBy('sort_order')
            ->get();

        // Count assignments per template
        $assignmentCounts = DB::table('tenant_templates')
            ->where('status', 'active')
            ->select('template_id', DB::raw('COUNT(*) as count'))
            ->groupBy('template_id')
            ->pluck('count', 'template_id');

        $totalTemplates = $templates->count();
        $freeTemplates = $templates->where('is_free', true)->count();
        $paidTemplates = $templates->where('is_free', false)->count();
        $totalAssignments = DB::table('tenant_templates')->where('status', 'active')->count();

        $documentTypeLabels = [
            'invoice' => 'Facture',
            'quote' => 'Devis',
            'delivery_challan' => 'Bon de livraison',
            'credit_note' => 'Avoir',
            'debit_note' => 'Note de débit',
            'purchase_order' => 'Bon de commande',
            'vendor_bill' => 'Facture fournisseur',
            'receipt' => 'Reçu',
        ];

        $groupedTemplates = $templates->groupBy('document_type');

        return view('backoffice.superadmin.templates.index', compact(
            'groupedTemplates',
            'assignmentCounts',
            'documentTypeLabels',
            'totalTemplates',
            'freeTemplates',
            'paidTemplates',
            'totalAssignments'
        ));
    }

    /**
     * Show assignment page for a specific template — list all tenants with assign/unassign.
     */
    public function show(string $templateId)
    {
        $template = DB::table('template_catalog')->where('id', $templateId)->firstOrFail();

        $tenants = Tenant::where('status', 'active')
            ->orderBy('name')
            ->get();

        // Get currently assigned tenant IDs
        $assignedTenantIds = DB::table('tenant_templates')
            ->where('template_id', $templateId)
            ->where('status', 'active')
            ->pluck('tenant_id')
            ->toArray();

        $documentTypeLabels = [
            'invoice' => 'Facture',
            'quote' => 'Devis',
            'delivery_challan' => 'Bon de livraison',
            'credit_note' => 'Avoir',
            'debit_note' => 'Note de débit',
            'purchase_order' => 'Bon de commande',
            'vendor_bill' => 'Facture fournisseur',
            'receipt' => 'Reçu',
        ];

        return view('backoffice.superadmin.templates.show', compact(
            'template',
            'tenants',
            'assignedTenantIds',
            'documentTypeLabels'
        ));
    }

    /**
     * Assign template to one or multiple tenants.
     */
    public function assign(Request $request, string $templateId)
    {
        $request->validate([
            'tenant_ids' => 'required|array|min:1',
            'tenant_ids.*' => 'required|uuid|exists:tenants,id',
        ], [
            'tenant_ids.required' => 'Veuillez sélectionner au moins une agence.',
            'tenant_ids.min' => 'Veuillez sélectionner au moins une agence.',
        ]);

        $template = DB::table('template_catalog')->where('id', $templateId)->firstOrFail();

        foreach ($request->input('tenant_ids') as $tenantId) {
            $existing = DB::table('tenant_templates')
                ->where('tenant_id', $tenantId)
                ->where('template_id', $templateId)
                ->first();

            if ($existing) {
                DB::table('tenant_templates')
                    ->where('id', $existing->id)
                    ->update([
                        'status' => 'active',
                        'activated_at' => now(),
                        'activated_by' => auth()->id(),
                        'source' => 'manual',
                        'updated_at' => now(),
                    ]);
            } else {
                DB::table('tenant_templates')->insert([
                    'id' => Str::uuid()->toString(),
                    'tenant_id' => $tenantId,
                    'template_id' => $templateId,
                    'status' => 'active',
                    'activated_at' => now(),
                    'activated_by' => auth()->id(),
                    'source' => 'manual',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $count = count($request->input('tenant_ids'));

        return redirect()->route('sa.templates.show', $templateId)
            ->with('success', __("Modèle « {$template->name} » assigné à {$count} agence(s) avec succès."));
    }

    /**
     * Revoke template from a tenant.
     */
    public function revoke(Request $request, string $templateId)
    {
        $request->validate([
            'tenant_id' => 'required|uuid|exists:tenants,id',
        ]);

        $template = DB::table('template_catalog')->where('id', $templateId)->firstOrFail();
        $tenant = Tenant::findOrFail($request->input('tenant_id'));

        DB::table('tenant_templates')
            ->where('tenant_id', $tenant->id)
            ->where('template_id', $templateId)
            ->update([
                'status' => 'inactive',
                'deactivated_at' => now(),
                'updated_at' => now(),
            ]);

        return redirect()->route('sa.templates.show', $templateId)
            ->with('success', __("Modèle « {$template->name} » retiré de l'agence « {$tenant->name} »."));
    }

    /**
     * Bulk assign a template to all active tenants.
     */
    public function bulkAssign(string $templateId)
    {
        $template = DB::table('template_catalog')->where('id', $templateId)->firstOrFail();

        $tenantIds = Tenant::where('status', 'active')->pluck('id');
        $count = 0;

        foreach ($tenantIds as $tenantId) {
            $existing = DB::table('tenant_templates')
                ->where('tenant_id', $tenantId)
                ->where('template_id', $templateId)
                ->first();

            if ($existing) {
                if ($existing->status !== 'active') {
                    DB::table('tenant_templates')
                        ->where('id', $existing->id)
                        ->update([
                            'status' => 'active',
                            'activated_at' => now(),
                            'activated_by' => auth()->id(),
                            'source' => 'bulk_assign',
                            'updated_at' => now(),
                        ]);
                    $count++;
                }
            } else {
                DB::table('tenant_templates')->insert([
                    'id' => Str::uuid()->toString(),
                    'tenant_id' => $tenantId,
                    'template_id' => $templateId,
                    'status' => 'active',
                    'activated_at' => now(),
                    'activated_by' => auth()->id(),
                    'source' => 'bulk_assign',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $count++;
            }
        }

        return redirect()->route('sa.templates.show', $templateId)
            ->with('success', __("Modèle « {$template->name} » assigné à {$count} nouvelles agence(s)."));
    }

    /**
     * Toggle template active/inactive in catalog.
     */
    public function toggleStatus(string $templateId)
    {
        $template = DB::table('template_catalog')->where('id', $templateId)->first();

        if (!$template) {
            abort(404);
        }

        DB::table('template_catalog')
            ->where('id', $templateId)
            ->update([
                'is_active' => !$template->is_active,
                'updated_at' => now(),
            ]);

        $status = $template->is_active ? 'désactivé' : 'activé';

        return redirect()->route('sa.templates.index')
            ->with('success', __("Modèle « {$template->name} » {$status} avec succès."));
    }
}
