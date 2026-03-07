<?php

namespace App\Events;

use App\Models\Sales\Payment;
use Illuminate\Foundation\Events\Dispatchable;

class PaymentReceived
{
    use Dispatchable;

    public function __construct(
        public readonly Payment $payment,
    ) {}
}
