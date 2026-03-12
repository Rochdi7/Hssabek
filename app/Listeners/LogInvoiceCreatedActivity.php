<?php

namespace App\Listeners;

use App\Events\InvoiceCreated;
use Illuminate\Support\Facades\Log;

class LogInvoiceCreatedActivity
{
    public function handle(InvoiceCreated $event): void
    {
        Log::info('Facture créée', [
            'invoice_id'   => $event->invoice->id,
            'invoice_number' => $event->invoice->number,
            'tenant_id'    => $event->invoice->tenant_id,
            'customer_id'  => $event->invoice->customer_id,
            'total'        => $event->invoice->total,
        ]);
    }
}
