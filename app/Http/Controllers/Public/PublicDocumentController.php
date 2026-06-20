<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Sales\Invoice;
use App\Models\Sales\Quote;
use App\Services\Sales\PdfService;
use App\Services\Tenancy\TenantContext;

class PublicDocumentController extends Controller
{
    public function downloadQuote(string $token, PdfService $pdfService)
    {
        $quote = Quote::withoutGlobalScopes()->where('public_token', $token)->firstOrFail();

        TenantContext::set($quote->tenant);

        return $pdfService->quoteResponse($quote, 'download');
    }

    public function downloadInvoice(string $token, PdfService $pdfService)
    {
        $invoice = Invoice::withoutGlobalScopes()->where('public_token', $token)->firstOrFail();

        TenantContext::set($invoice->tenant);

        return $pdfService->invoiceResponse($invoice, 'download');
    }
}
