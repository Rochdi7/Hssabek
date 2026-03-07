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
use App\Models\Tenancy\Signature;
use App\Services\Tenancy\TenantContext;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfService
{
    /**
     * Available templates: default & modern are free, classic & elegant are paid.
     */
    public const TEMPLATES = [
        'default' => ['name' => 'Standard', 'paid' => false],
        'modern'  => ['name' => 'Moderne', 'paid' => false],
        'classic' => ['name' => 'Classique', 'paid' => true],
        'elegant' => ['name' => 'Élégant', 'paid' => true],
    ];

    /**
     * Document types that support template variants.
     */
    private const TEMPLATED_VIEWS = [
        'invoice'          => 'invoice',
        'quote'            => 'quote',
        'credit_note'      => 'credit-note',
        'delivery_challan' => 'delivery-challan',
        'purchase_order'   => 'purchase-order',
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

        $data = $this->buildData($payment, 'payment');
        $pdf  = Pdf::loadView('pdf.payment-receipt', $data)->setPaper('a4', 'portrait');

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
        $pdf  = Pdf::loadView('pdf.vendor-bill', $data)->setPaper('a4', 'portrait');

        $filename = 'facture-fournisseur-' . $bill->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function debitNoteResponse(DebitNote $debitNote, string $disposition = 'inline')
    {
        $debitNote->loadMissing(['supplier', 'items', 'vendorBill', 'purchaseOrder']);

        $data = $this->buildData($debitNote, 'debit_note');
        $pdf  = Pdf::loadView('pdf.debit-note', $data)->setPaper('a4', 'portrait');

        $filename = 'note-debit-' . $debitNote->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function supplierPaymentReceiptResponse(SupplierPayment $payment, string $disposition = 'inline')
    {
        $payment->loadMissing(['supplier', 'paymentMethod', 'vendorBill', 'allocations.vendorBill']);

        $data = $this->buildData($payment, 'supplier_payment');
        $pdf  = Pdf::loadView('pdf.supplier-payment-receipt', $data)->setPaper('a4', 'portrait');

        $filename = 'recu-paiement-fournisseur-' . ($payment->reference_number ?? $payment->id) . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function goodsReceiptResponse(GoodsReceipt $receipt, string $disposition = 'inline')
    {
        $receipt->loadMissing(['purchaseOrder.supplier', 'warehouse', 'items.product', 'creator']);

        $data = $this->buildData($receipt, 'goods_receipt');
        $pdf  = Pdf::loadView('pdf.goods-receipt', $data)->setPaper('a4', 'portrait');

        $filename = 'bon-reception-' . $receipt->number . '.pdf';

        return ($disposition === 'download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    // ─── Private ────────────────────────────────────────────────

    private function resolveView(string $docType): string
    {
        $tenant   = TenantContext::get();
        $settings = $tenant?->settings;
        $invoiceSettings = $settings?->invoice_settings ?? [];

        // Read per-document-type template, fallback to legacy single setting, then 'default'
        $template = $invoiceSettings['pdf_templates'][$docType]
            ?? $invoiceSettings['pdf_template']
            ?? 'default';

        // Validate template exists
        if (!array_key_exists($template, self::TEMPLATES)) {
            $template = 'default';
        }

        // Check if this doc type supports template variants
        $viewFile = self::TEMPLATED_VIEWS[$docType] ?? null;

        if ($template !== 'default' && $viewFile) {
            $variantView = "pdf.templates.{$template}.{$viewFile}";
            if (view()->exists($variantView)) {
                return $variantView;
            }
        }

        // Fallback to default
        return 'pdf.' . ($viewFile ?? $docType);
    }

    private function buildData($model, string $type): array
    {
        $tenant   = TenantContext::get();
        $settings = $tenant?->settings;

        $varNameMap = [
            'purchase_order'   => 'purchaseOrder',
            'credit_note'      => 'creditNote',
            'delivery_challan' => 'deliveryChallan',
            'debit_note'       => 'debitNote',
            'vendor_bill'      => 'vendorBill',
            'supplier_payment' => 'supplierPayment',
            'goods_receipt'    => 'goodsReceipt',
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
