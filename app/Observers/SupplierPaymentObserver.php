<?php

namespace App\Observers;

use App\Models\Finance\Expense;
use App\Models\Purchases\SupplierPayment;

class SupplierPaymentObserver
{
    /**
     * Handle the SupplierPayment "deleted" event.
     *
     * Clean up any historically auto-generated expense record linked to this payment.
     * (Bank-account coupling has been removed from the system.)
     */
    public function deleted(SupplierPayment $supplierPayment): void
    {
        Expense::where('reference_number', 'SUPPAY-' . $supplierPayment->id)->delete();
    }

    /**
     * Handle the SupplierPayment "force deleted" event.
     */
    public function forceDeleted(SupplierPayment $supplierPayment): void
    {
        $this->deleted($supplierPayment);
    }
}
