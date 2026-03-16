<?php

namespace App\Http\Controllers\Backoffice\Settings;

use App\Http\Controllers\Controller;
use App\Models\Templates\TemplateCatalog;
use App\Models\Tenancy\TenantSetting;
use App\Services\Sales\PdfService;
use App\Services\Tenancy\TenantContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceTemplateSettingsController extends Controller
{
    /**
     * Document types that support template selection.
     */
    private const DOCUMENT_TYPES = [
        'invoice'                  => 'Factures',
        'quote'                    => 'Devis',
        'credit_note'              => 'Avoirs',
        'delivery_challan'         => 'Bons de livraison',
        'purchase_order'           => 'Bons de commande',
        'vendor_bill'              => 'Factures fournisseur',
        'debit_note'               => 'Notes de débit',
        'payment_receipt'          => 'Reçus de paiement',
        'supplier_payment_receipt' => 'Reçus paiement fournisseur',
        'goods_receipt'            => 'Bons de réception',
    ];

    /**
     * Map document_type to its slug prefix used in catalog codes.
     * e.g. credit_note → credit-note, so code = "credit-note-modern"
     */
    private const DOC_TYPE_SLUG = [
        'invoice'                  => 'invoice',
        'quote'                    => 'quote',
        'credit_note'              => 'credit-note',
        'delivery_challan'         => 'delivery-challan',
        'purchase_order'           => 'purchase-order',
        'vendor_bill'              => 'vendor-bill',
        'debit_note'               => 'debit-note',
        'payment_receipt'          => 'payment-receipt',
        'supplier_payment_receipt' => 'supplier-payment-receipt',
        'goods_receipt'            => 'goods-receipt',
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
            $pdfTemplates[$dt] = $this->extractStyle((string) ($pdfTemplates[$dt] ?? 'default'), $dt);
        }

        $documentTypes = self::DOCUMENT_TYPES;

        // All active catalog templates grouped by document_type
        $allTemplates = TemplateCatalog::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Tenant's accessible template IDs (purchased/premium templates only)
        // Note: Free templates (is_free=true) are accessible to all tenants by default
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
                ->with('error', __('Modèle invalide.'));
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
                    ->with('error', __('Vous n\'avez pas accès à ce modèle.'));
            }
        }

        $setting = $tenant->settings ?? TenantSetting::create(['tenant_id' => $tenant->id]);

        $invoiceSettings = $setting->invoice_settings ?? [];

        // Extract document type from the selected catalog template.
        $docType = $catalogTemplate->document_type;

        // Save per-document-type default
        $pdfTemplates = $invoiceSettings['pdf_templates'] ?? [];
        // Store full catalog code for robust resolution (style-only remains backward compatible).
        $pdfTemplates[$docType] = $catalogTemplate->code;
        $invoiceSettings['pdf_templates'] = $pdfTemplates;

        $setting->invoice_settings = $invoiceSettings;
        $setting->save();

        $docLabel = self::DOCUMENT_TYPES[$docType] ?? $docType;

        return redirect()->route('bo.settings.invoice-templates.index')
            ->with('success', __("Modèle \"{$catalogTemplate->name}\" activé par défaut pour les {$docLabel}."));
    }

    public function preview(Request $request, string $template)
    {
        $catalogTemplate = TemplateCatalog::where('code', $template)
            ->where('is_active', true)
            ->first();

        if (!$catalogTemplate && !array_key_exists($template, PdfService::TEMPLATES)) {
            abort(404);
        }

        $tenant = TenantContext::get();
        $settings = $tenant->settings;
        $originalInvoiceSettings = $settings->invoice_settings ?? [];

        // Temporarily override the template for this document type to render preview
        $docType = $catalogTemplate ? $catalogTemplate->document_type : 'invoice';

        // In-memory override only for preview (must not persist default template).
        // Use the full catalog code so PdfService::resolveView() can find it in the catalog.
        $invoiceSettings = $originalInvoiceSettings;
        $pdfTemplates = $invoiceSettings['pdf_templates'] ?? [];
        $pdfTemplates[$docType] = $catalogTemplate ? $catalogTemplate->code : $template;
        $invoiceSettings['pdf_templates'] = $pdfTemplates;
        $settings->invoice_settings = $invoiceSettings;
        // Temporarily save so PdfService::resolveView() (which re-reads from DB) sees the override
        $settings->saveQuietly();

        try {
            $pdfService = new PdfService();
            $pdfContent = $this->generatePreviewPdf($pdfService, $docType);

            if ($pdfContent) {
                // For AJAX requests, return base64 JSON to avoid download manager interception
                if ($request->ajax()) {
                    return response()->json([
                        'pdf' => base64_encode($pdfContent),
                    ]);
                }

                // Direct browser access — return raw PDF
                return response($pdfContent, 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="apercu-' . $template . '.pdf"',
                    'Content-Security-Policy' => "frame-ancestors 'self'",
                    'X-Frame-Options' => 'SAMEORIGIN',
                    'Cache-Control' => 'no-store, no-cache, must-revalidate',
                ]);
            }

            if ($request->ajax()) {
                return response()->json(['error' => 'Aucun document disponible pour l\'aperçu.'], 404);
            }

            return response()->view('pdf.preview-placeholder', [
                'templateName' => $catalogTemplate ? $catalogTemplate->name : PdfService::TEMPLATES[$template]['name'],
                'tenant' => $tenant,
                'settings' => $settings,
            ]);
        } catch (\Throwable $e) {
            throw $e;
        } finally {
            // Ensure preview override never leaks — restore original settings
            $settings->invoice_settings = $originalInvoiceSettings;
            $settings->saveQuietly();
        }
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
                ->with('error', __('Modèle introuvable.'));
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
                ->with('error', __('Vous possédez déjà ce modèle.'));
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

    /**
     * Generate a preview PDF for the given document type using the latest available document.
     * Falls back to a sample document when no real data exists.
     */
    private function generatePreviewPdf(PdfService $pdfService, string $docType): ?string
    {
        $eagerLoads = [
            'invoice'                  => ['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges'],
            'quote'                    => ['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges'],
            'credit_note'              => ['customer', 'items', 'invoice'],
            'delivery_challan'         => ['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges', 'invoice', 'quote'],
            'purchase_order'           => ['supplier', 'items.product', 'items.taxGroup', 'warehouse'],
            'vendor_bill'              => ['supplier', 'purchaseOrder', 'goodsReceipt'],
            'debit_note'               => ['supplier', 'items', 'vendorBill', 'purchaseOrder'],
            'payment_receipt'          => ['customer', 'paymentMethod', 'allocations.invoice'],
            'supplier_payment_receipt' => ['supplier', 'paymentMethod', 'vendorBill', 'allocations.vendorBill'],
            'goods_receipt'            => ['purchaseOrder.supplier', 'warehouse', 'items.product', 'creator'],
        ];

        $modelClasses = [
            'invoice'                  => \App\Models\Sales\Invoice::class,
            'quote'                    => \App\Models\Sales\Quote::class,
            'credit_note'              => \App\Models\Sales\CreditNote::class,
            'delivery_challan'         => \App\Models\Sales\DeliveryChallan::class,
            'purchase_order'           => \App\Models\Purchases\PurchaseOrder::class,
            'vendor_bill'              => \App\Models\Purchases\VendorBill::class,
            'debit_note'               => \App\Models\Purchases\DebitNote::class,
            'payment_receipt'          => \App\Models\Sales\Payment::class,
            'supplier_payment_receipt' => \App\Models\Purchases\SupplierPayment::class,
            'goods_receipt'            => \App\Models\Purchases\GoodsReceipt::class,
        ];

        $modelClass = $modelClasses[$docType] ?? $modelClasses['invoice'];
        $relations = $eagerLoads[$docType] ?? $eagerLoads['invoice'];
        $resolvedDocType = array_key_exists($docType, $modelClasses) ? $docType : 'invoice';

        $doc = $modelClass::with($relations)->latest()->first();

        if ($doc) {
            return $pdfService->generatePdfContent($doc, $resolvedDocType);
        }

        // No real document exists — render with a sample object
        return $this->generateSamplePreviewPdf($pdfService, $resolvedDocType);
    }

    /**
     * Build a sample (in-memory) document for template preview when no real data exists.
     */
    private function generateSamplePreviewPdf(PdfService $pdfService, string $docType): string
    {
        $tenant = TenantContext::get();
        $settings = $tenant?->settings;
        $currency = $tenant?->default_currency ?? 'MAD';

        $view = $this->callResolveView($pdfService, $docType);

        // Build sample items collection
        $sampleItems = collect([
            (object) [
                'label'        => 'Produit exemple A',
                'description'  => 'Description du produit',
                'quantity'     => 2,
                'unit_price'   => 150.00,
                'tax_rate'     => 20.00,
                'line_subtotal'=> 300.00,
                'line_tax'     => 60.00,
                'line_total'   => 360.00,
                'discount'     => 0,
                'position'     => 1,
                'product'      => null,
                'unit'         => null,
                'taxGroup'     => null,
            ],
            (object) [
                'label'        => 'Service exemple B',
                'description'  => null,
                'quantity'     => 1,
                'unit_price'   => 500.00,
                'tax_rate'     => 20.00,
                'line_subtotal'=> 500.00,
                'line_tax'     => 100.00,
                'line_total'   => 600.00,
                'discount'     => 0,
                'position'     => 2,
                'product'      => null,
                'unit'         => null,
                'taxGroup'     => null,
            ],
        ]);

        $sampleCustomer = (object) [
            'name'  => 'Client Exemple SARL',
            'email' => 'contact@exemple.ma',
            'phone' => '+212 600 000 000',
        ];

        $sampleSupplier = (object) [
            'name'  => 'Fournisseur Exemple SARL',
            'email' => 'fournisseur@exemple.ma',
            'phone' => '+212 600 000 000',
        ];

        $now = now();

        // Common fields shared by most document types
        $base = [
            'number'             => 'APERÇU-0001',
            'reference_number'   => null,
            'issue_date'         => $now,
            'date'               => $now,
            'due_date'           => $now->copy()->addDays(30),
            'status'             => 'draft',
            'subtotal'           => 800.00,
            'discount_total'     => 0,
            'tax_total'          => 160.00,
            'total'              => 960.00,
            'round_off'          => 0,
            'enable_tax'         => true,
            'amount_paid'        => 0,
            'amount_due'         => 960.00,
            'total_in_words'     => 'Neuf cent soixante dirhams',
            'notes'              => 'Ceci est un aperçu du modèle avec des données fictives.',
            'terms'              => 'Paiement à 30 jours.',
            'bill_to_snapshot'   => ['name' => 'Client Exemple SARL', 'address' => '123 Rue Exemple', 'city' => 'Casablanca', 'postal_code' => '20000', 'country' => 'Maroc'],
            'bank_details_snapshot' => [],
            'items'              => $sampleItems,
            'charges'            => collect(),
            'customer'           => $sampleCustomer,
            'supplier'           => $sampleSupplier,
            'invoice'            => null,
            'quote'              => null,
            'vendorBill'         => null,
            'purchaseOrder'      => null,
            'goodsReceipt'       => null,
            'paymentMethod'      => null,
            'allocations'        => collect(),
            'warehouse'          => null,
            'creator'            => null,
        ];

        $doc = (object) $base;

        // Map document type to the variable name expected by PdfService::buildData()
        $varNameMap = [
            'purchase_order'           => 'purchaseOrder',
            'credit_note'              => 'creditNote',
            'delivery_challan'         => 'deliveryChallan',
            'debit_note'               => 'debitNote',
            'vendor_bill'              => 'vendorBill',
            'supplier_payment'         => 'supplierPayment',
            'supplier_payment_receipt' => 'supplierPayment',
            'payment_receipt'          => 'payment',
            'goods_receipt'            => 'goodsReceipt',
        ];
        $varName = $varNameMap[$docType] ?? $docType;

        $data = [
            'tenant'    => $tenant,
            'settings'  => $settings,
            'currency'  => $currency,
            'signature' => null,
            $varName    => $doc,
        ];

        return \Barryvdh\DomPDF\Facade\Pdf::loadView($view, $data)->setPaper('a4', 'portrait')->output();
    }

    /**
     * Call PdfService::resolveView() via reflection (private method).
     */
    private function callResolveView(PdfService $pdfService, string $docType): string
    {
        $ref = new \ReflectionMethod($pdfService, 'resolveView');
        $ref->setAccessible(true);

        return $ref->invoke($pdfService, $docType);
    }
}
