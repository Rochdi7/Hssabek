<?php

namespace App\Services\Sales;

use App\Models\Purchases\DebitNote;
use App\Models\Purchases\GoodsReceipt;
use App\Models\Purchases\PurchaseOrder;
use App\Models\Purchases\SupplierPayment;
use App\Models\Purchases\VendorBill;
use App\Models\Sales\CreditNote;
use App\Models\Sales\DeliveryChallan;
use App\Models\Sales\Invoice;
use App\Models\Sales\Payment;
use App\Models\Sales\Quote;
use App\Models\Templates\TemplateCatalog;
use App\Models\Tenancy\Signature;
use App\Services\Tenancy\TenantContext;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfService
{
    /**
     * Available template styles.
     */
    public const TEMPLATES = [
        'default' => ['name' => 'Modèle 1', 'paid' => false],
        'modern'  => ['name' => 'Modèle 2', 'paid' => false],
        'classic' => ['name' => 'Modèle 3', 'paid' => false],
        'elegant' => ['name' => 'Modèle 4', 'paid' => false],
    ];

    /**
     * Document types that support template variants.
     */
    private const TEMPLATED_VIEWS = [
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

    // ─── Sales ──────────────────────────────────────────────────

    public function invoiceResponse(Invoice $invoice, string $disposition = 'inline')
    {
        $invoice->loadMissing(['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges']);

        $data = $this->buildData($invoice, 'invoice');
        $view = $this->resolveView('invoice');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'facture-' . $invoice->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function invoicePdfContent(Invoice $invoice): string
    {
        $invoice->loadMissing(['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges']);

        $data = $this->buildData($invoice, 'invoice');
        $view = $this->resolveView('invoice');

        return Pdf::loadView($view, $data)->setPaper('a4', 'portrait')->output();
    }

    public function quoteResponse(Quote $quote, string $disposition = 'inline')
    {
        $quote->loadMissing(['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges']);

        $data = $this->buildData($quote, 'quote');
        $view = $this->resolveView('quote');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'devis-' . $quote->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function quotePdfContent(Quote $quote): string
    {
        $quote->loadMissing(['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges']);

        $data = $this->buildData($quote, 'quote');
        $view = $this->resolveView('quote');

        return Pdf::loadView($view, $data)->setPaper('a4', 'portrait')->output();
    }

    public function creditNoteResponse(CreditNote $creditNote, string $disposition = 'inline')
    {
        $creditNote->loadMissing(['customer', 'items', 'invoice']);

        $data = $this->buildData($creditNote, 'credit_note');
        $view = $this->resolveView('credit_note');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'avoir-' . $creditNote->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function deliveryChallanResponse(DeliveryChallan $challan, string $disposition = 'inline')
    {
        $challan->loadMissing(['customer', 'items.product', 'items.unit', 'items.taxGroup', 'charges', 'invoice', 'quote']);

        $data = $this->buildData($challan, 'delivery_challan');
        $view = $this->resolveView('delivery_challan');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'bon-livraison-' . $challan->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function paymentReceiptResponse(Payment $payment, string $disposition = 'inline')
    {
        $payment->loadMissing(['customer', 'paymentMethod', 'allocations.invoice']);

        $data = $this->buildData($payment, 'payment_receipt');
        $view = $this->resolveView('payment_receipt');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'recu-paiement-' . ($payment->reference_number ?? $payment->id) . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    // ─── Purchases ──────────────────────────────────────────────

    public function purchaseOrderResponse(PurchaseOrder $po, string $disposition = 'inline')
    {
        $po->loadMissing(['supplier', 'items.product', 'items.taxGroup', 'warehouse']);

        $data = $this->buildData($po, 'purchase_order');
        $view = $this->resolveView('purchase_order');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'bon-commande-' . $po->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function vendorBillResponse(VendorBill $bill, string $disposition = 'inline')
    {
        $bill->loadMissing(['supplier', 'purchaseOrder', 'goodsReceipt']);

        $data = $this->buildData($bill, 'vendor_bill');
        $view = $this->resolveView('vendor_bill');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'facture-fournisseur-' . $bill->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function debitNoteResponse(DebitNote $debitNote, string $disposition = 'inline')
    {
        $debitNote->loadMissing(['supplier', 'items', 'vendorBill', 'purchaseOrder']);

        $data = $this->buildData($debitNote, 'debit_note');
        $view = $this->resolveView('debit_note');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'note-debit-' . $debitNote->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function supplierPaymentReceiptResponse(SupplierPayment $payment, string $disposition = 'inline')
    {
        $payment->loadMissing(['supplier', 'paymentMethod', 'vendorBill', 'allocations.vendorBill']);

        $data = $this->buildData($payment, 'supplier_payment_receipt');
        $view = $this->resolveView('supplier_payment_receipt');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'recu-paiement-fournisseur-' . ($payment->reference_number ?? $payment->id) . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function goodsReceiptResponse(GoodsReceipt $receipt, string $disposition = 'inline')
    {
        $receipt->loadMissing(['purchaseOrder.supplier', 'warehouse', 'items.product', 'creator']);

        $data = $this->buildData($receipt, 'goods_receipt');
        $view = $this->resolveView('goods_receipt');
        $pdf  = Pdf::loadView($view, $data)->setPaper('a4', 'portrait');

        $filename = 'bon-reception-' . $receipt->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    /**
     * Generate raw PDF content for any document type.
     */
    public function generatePdfContent($model, string $docType): string
    {
        $data = $this->buildData($model, $docType);
        $view = $this->resolveView($docType);

        return Pdf::loadView($view, $data)->setPaper('a4', 'portrait')->output();
    }

    // ─── Private ────────────────────────────────────────────────

    private function resolveView(string $docType): string
    {
        $tenant   = TenantContext::get();
        $settings = $tenant?->settings;
        $invoiceSettings = $settings?->invoice_settings ?? [];

        // Read per-document-type selection, fallback to legacy single setting, then 'default'
        // Selection can be either a style (modern/classic/...) or a catalog code (quote-modern, ...).
        $selection = (string) ($invoiceSettings['pdf_templates'][$docType]
            ?? $invoiceSettings['pdf_template']
            ?? 'default');

        // 1) If selection is a known style, resolve directly.
        if (array_key_exists($selection, self::TEMPLATES)) {
            return $this->resolveVariantOrDefault($docType, $selection);
        }

        // 2) If selection is a catalog code, resolve by catalog row and view_path.
        $catalogTemplate = TemplateCatalog::query()
            ->where('code', $selection)
            ->where('document_type', $docType)
            ->where('is_active', true)
            ->first();

        if ($catalogTemplate && is_string($catalogTemplate->view_path) && view()->exists($catalogTemplate->view_path)) {
            return $catalogTemplate->view_path;
        }

        // 3) Backward compatibility for code-like values (e.g. quote-modern) not found in catalog.
        $viewFile = self::TEMPLATED_VIEWS[$docType] ?? null;
        if ($viewFile && str_starts_with($selection, $viewFile . '-')) {
            $style = substr($selection, strlen($viewFile . '-'));
            if (array_key_exists($style, self::TEMPLATES)) {
                return $this->resolveVariantOrDefault($docType, $style);
            }
        }

        return $this->resolveVariantOrDefault($docType, 'default');
    }

    /**
     * Map style names to their folder and model number.
     */
    private const STYLE_MAP = [
        'default' => ['folder' => 'free', 'model' => 'model-1'],
        'modern'  => ['folder' => 'free', 'model' => 'model-2'],
        'classic' => ['folder' => 'free', 'model' => 'model-3'],
        'elegant' => ['folder' => 'free', 'model' => 'model-4'],
    ];

    private function resolveVariantOrDefault(string $docType, string $template): string
    {
        $viewFile = self::TEMPLATED_VIEWS[$docType] ?? null;

        if ($viewFile && isset(self::STYLE_MAP[$template])) {
            $map = self::STYLE_MAP[$template];
            $variantView = "pdf.templates.{$map['folder']}.{$viewFile}.{$map['model']}";
            if (view()->exists($variantView)) {
                return $variantView;
            }
        }

        // Fallback to default (free/model-1)
        if ($viewFile) {
            return "pdf.templates.free.{$viewFile}.model-1";
        }

        return "pdf.templates.free.{$docType}.model-1";
    }

    private function buildData($model, string $type): array
    {
        $tenant   = TenantContext::get();
        $settings = $tenant?->settings;

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

        $varName = $varNameMap[$type] ?? $type;

        return [
            'tenant'    => $tenant,
            'settings'  => $settings,
            'currency'  => $tenant?->default_currency ?? 'MAD',
            'signature' => $this->getDefaultSignature(),
            $varName    => $model,
        ];
    }

    private function getDefaultSignature(): ?Signature
    {
        return Signature::where('is_default', true)
            ->where('status', 'active')
            ->first();
    }
}
