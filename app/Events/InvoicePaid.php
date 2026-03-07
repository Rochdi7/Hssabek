<?php

namespace App\Events;

use App\Models\Sales\Invoice;
use Illuminate\Foundation\Events\Dispatchable;

class InvoicePaid
{
    use Dispatchable;

    public function __construct(
        public readonly Invoice $invoice,
    ) {}
}
