<?php

namespace App\Observers;

use App\Models\Finance\Income;
use App\Models\Sales\Payment;

class PaymentObserver
{
    /**
     * Handle the Payment "deleted" event.
     *
     * Clean up any historically auto-generated income record linked to this payment.
     * (Bank-account coupling has been removed from the system.)
     */
    public function deleted(Payment $payment): void
    {
        Income::where('reference_number', 'PAY-' . $payment->id)->delete();
    }

    /**
     * Handle the Payment "force deleted" event.
     */
    public function forceDeleted(Payment $payment): void
    {
        $this->deleted($payment);
    }
}
