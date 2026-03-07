<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\Templates\TemplateCatalog;
use App\Models\Tenancy\TenantSetting;
use App\Services\Sales\PdfService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Support\Facades\DB;

class InvoiceTemplateSettingsController extends Controller
{
    /**
     * Document types that support template selection.
     */
    private const DOCUMENT_TYPES = [
        'invoice'          => 'Factures',
        'quote'            => 'Devis',
        'credit_note'      => 'Avoirs',
        'delivery_challan' => 'Bons de livraison',
        'purchase_order'   => 'Bons de commande',
    ];

    /**
     * Map document_type to its slug prefix used in catalog codes.
     * e.g. credit_note → credit-note, so code = "credit-note-modern"
     */
    private const DOC_TYPE_SLUG = [
        'invoice'          => 'invoice',
        'quote'            => 'quote',
        'credit_note'      => 'credit-note',
        'delivery_challan' => 'delivery-challan',
        'purchase_order'   => 'purchase-order',
    ];

    public function index()
    {
        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        // Per-document-type defaults: { "invoice": "modern", "quote": "default", ... }
        $pdfTemplates = $settings->invoice_settings['pdf_templates'] ?? [];

        // Backward compat: if old single pdf_template exists and no per-type map, use it for all
        if (empty($pdfTemplates) && !empty($settings->invoice_settings['pdf_template'])) {
            $legacy = $settings->invoice_settings['pdf_template'];
            // Extract style from legacy value (could be "modern" or "invoice-modern")
            $style = $this->extractStyle($legacy, 'invoice');
            foreach (array_keys(self::DOCUMENT_TYPES) as $dt) {
                $pdfTemplates[$dt] = $style;
            }
        }

        // Fill missing doc types with 'default'
        foreach (array_keys(self::DOCUMENT_TYPES) as $dt) {
            $pdfTemplates[$dt] = $pdfTemplates[$dt] ?? 'default';
        }

        $documentTypes = self::DOCUMENT_TYPES;

        // All active catalog templates grouped by document_type
        $allTemplates = TemplateCatalog::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Tenant's accessible template IDs
        $ownedTemplateIds = DB::table('tenant_templates')
            ->where('tenant_id', $tenant->id)
            ->where('status', 'active')
            ->pluck('template_id')
            ->toArray();

        $purchasedTemplateIds = DB::table('template_purchases')
            ->where('tenant_id', $tenant->id)
            ->where('status', 'paid')
            ->pluck('template_id')
            ->toArray();

        $accessibleIds = array_unique(array_merge($ownedTemplateIds, $purchasedTemplateIds));

        // Split: "Mes modèles" (free + owned) vs "Boutique" (paid, not owned)
        $myTemplates = collect();
        $storeTemplates = collect();

        foreach ($allTemplates as $tpl) {
            if ($tpl->is_free || in_array($tpl->id, $accessibleIds)) {
                $myTemplates->push($tpl);
            } else {
                $storeTemplates->push($tpl);
            }
        }

        $myTemplatesGrouped = $myTemplates->groupBy('document_type');
        $storeTemplatesGrouped = $storeTemplates->groupBy('document_type');

        // Build a map: code => style for easy lookup in blade
        // e.g. "invoice-modern" => "modern"
        $templateStyleMap = [];
        foreach ($allTemplates as $tpl) {
            $templateStyleMap[$tpl->code] = $this->extractStyle($tpl->code, $tpl->document_type);
        }

        return view('backoffice.settings.invoice-templates', compact(
            'documentTypes',
            'myTemplatesGrouped',
            'storeTemplatesGrouped',
            'pdfTemplates',
            'templateStyleMap',
            'settings',
            'tenant'
        ));
    }

    public function activate(string $template)
    {
        $catalogTemplate = TemplateCatalog::where('code', $template)
            ->where('is_active', true)
            ->first();

        if (!$catalogTemplate) {
            return redirect()->route('bo.settings.invoice-templates.index')
                ->with('error', 'Modèle invalide.');
        }

        $tenant = TenantContext::get();

        // If paid template, verify access
        if (!$catalogTemplate->is_free) {
            $hasAccess = DB::table('tenant_templates')
                ->where('tenant_id', $tenant->id)
                ->where('template_id', $catalogTemplate->id)
                ->where('status', 'active')
                ->exists();

            if (!$hasAccess) {
                $hasAccess = DB::table('template_purchases')
                    ->where('tenant_id', $tenant->id)
                    ->where('template_id', $catalogTemplate->id)
                    ->where('status', 'paid')
                    ->exists();
            }

            if (!$hasAccess) {
                return redirect()->route('bo.settings.invoice-templates.index')
                    ->with('error', 'Vous n\'avez pas accès à ce modèle.');
            }
        }

        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $invoiceSettings = $setting->invoice_settings ?? [];

        // Extract the style name and document type
        $docType = $catalogTemplate->document_type;
        $style = $this->extractStyle($catalogTemplate->code, $docType);

        // Save per-document-type default
        $pdfTemplates = $invoiceSettings['pdf_templates'] ?? [];
        $pdfTemplates[$docType] = $style;
        $invoiceSettings['pdf_templates'] = $pdfTemplates;

        $setting->invoice_settings = $invoiceSettings;
        $setting->save();

        $docLabel = self::DOCUMENT_TYPES[$docType] ?? $docType;

        return redirect()->route('bo.settings.invoice-templates.index')
            ->with('success', "Modèle \"{$catalogTemplate->name}\" activé par défaut pour les {$docLabel}.");
    }

    public function preview(string $template)
    {
        $catalogTemplate = TemplateCatalog::where('code', $template)
            ->where('is_active', true)
            ->first();

        if (!$catalogTemplate && !array_key_exists($template, PdfService::TEMPLATES)) {
            abort(404);
        }

        $tenant = TenantContext::get();
        $settings = $tenant->settings;

        // Temporarily override the template for this document type to render preview
        $docType = $catalogTemplate ? $catalogTemplate->document_type : 'invoice';
        $style = $catalogTemplate ? $this->extractStyle($catalogTemplate->code, $docType) : $template;

        $invoiceSettings = $settings->invoice_settings ?? [];
        $pdfTemplates = $invoiceSettings['pdf_templates'] ?? [];
        $pdfTemplates[$docType] = $style;
        $invoiceSettings['pdf_templates'] = $pdfTemplates;
        $settings->invoice_settings = $invoiceSettings;

        $invoice = \App\Models\Sales\Invoice::with(['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges'])
            ->latest()
            ->first();

        if ($invoice) {
            $pdfService = new PdfService();
            return $pdfService->invoiceResponse($invoice, 'inline');
        }

        return response()->view('pdf.preview-placeholder', [
            'templateName' => $catalogTemplate ? $catalogTemplate->name : PdfService::TEMPLATES[$template]['name'],
            'tenant' => $tenant,
            'settings' => $settings,
        ]);
    }

    public function purchase(string $templateId)
    {
        $tenant = TenantContext::get();

        $catalogTemplate = TemplateCatalog::where('id', $templateId)
            ->where('is_active', true)
            ->where('is_free', false)
            ->first();

        if (!$catalogTemplate) {
            return redirect()->route('bo.settings.invoice-templates.index')
                ->with('error', 'Modèle introuvable.');
        }

        // Check if already owned or purchased
        $alreadyOwned = DB::table('tenant_templates')
            ->where('tenant_id', $tenant->id)
            ->where('template_id', $catalogTemplate->id)
            ->where('status', 'active')
            ->exists();

        $alreadyPurchased = DB::table('template_purchases')
            ->where('tenant_id', $tenant->id)
            ->where('template_id', $catalogTemplate->id)
            ->whereIn('status', ['paid', 'pending'])
            ->exists();

        if ($alreadyOwned || $alreadyPurchased) {
            return redirect()->route('bo.settings.invoice-templates.index')
                ->with('error', 'Vous possédez déjà ce modèle.');
        }

        // Redirect to WhatsApp for payment
        $phone = '212632582096';
        $message = "Bonjour, je souhaite acheter le modèle de facture \"{$catalogTemplate->name}\" "
            . "(Réf: {$catalogTemplate->code}) au prix de " . number_format($catalogTemplate->price, 2) . " " . ($catalogTemplate->currency ?? 'MAD') . ". "
            . "Entreprise: {$tenant->name}. Merci.";

        $whatsappUrl = 'https://wa.me/' . $phone . '?text=' . urlencode($message);

        return redirect()->away($whatsappUrl);
    }

    /**
     * Extract the style name from a catalog code.
     * e.g. "invoice-modern" → "modern", "credit-note-classic" → "classic"
     */
    private function extractStyle(string $code, string $docType): string
    {
        $slug = self::DOC_TYPE_SLUG[$docType] ?? str_replace('_', '-', $docType);
        $prefix = $slug . '-';

        if (str_starts_with($code, $prefix)) {
            return substr($code, strlen($prefix));
        }

        // Already a style name (e.g. "modern", "default")
        return $code;
    }
}
