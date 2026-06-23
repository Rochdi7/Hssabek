<?php

namespace App\Services\Purchases;

use App\Models\Purchases\VendorBill;
use App\Services\Sales\InvoiceService;

class VendorBillService
{
    /**
     * Whether a vendor bill may still be edited: unpaid, not void, no money applied.
     */
    public function isEditable(VendorBill $vendorBill): bool
    {
        if (in_array($vendorBill->normalizedStatus(), [VendorBill::STATUS_PAID, VendorBill::STATUS_VOID], true)) {
            return false;
        }

        return (float) $vendorBill->amount_paid <= 0.0;
    }

    /**
     * Manually cancel a vendor bill. Void is the only manual status change allowed.
     */
    public function void(VendorBill $vendorBill): void
    {
        if ($vendorBill->status === VendorBill::STATUS_VOID) {
            return;
        }

        $vendorBill->update(['status' => VendorBill::STATUS_VOID]);
    }

    /**
     * Recalculate amount_paid / amount_due from SupplierPaymentAllocations + DebitNoteApplications,
     * then auto-resolve the status. Payment data is the single source of truth.
     */
    public function updatePaymentTotals(VendorBill $vendorBill): void
    {
        $totalPaid = (float) $vendorBill->supplierPaymentAllocations()->sum('amount_applied');
        $totalDebits = (float) $vendorBill->debitNoteApplications()->sum('amount_applied');
        $amountPaid = round($totalPaid + $totalDebits, 2);
        $amountDue = round((float) $vendorBill->total - $amountPaid, 2);

        $resolved = InvoiceService::resolvePaymentStatus(
            $vendorBill->normalizedStatus(),
            $amountPaid,
            $amountDue,
            $vendorBill->due_date,
            VendorBill::STATUS_UNPAID
        );

        $vendorBill->update([
            'amount_paid' => $amountPaid,
            'amount_due' => max(0, $amountDue),
            'status' => $resolved,
        ]);
    }
}
