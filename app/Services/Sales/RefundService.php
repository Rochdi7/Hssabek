<?php

namespace App\Services\Sales;

use App\Models\Sales\Payment;
use App\Models\Sales\Refund;
use Illuminate\Support\Facades\DB;

class RefundService
{
    /**
     * Create a new refund and update the related payment status if fully refunded.
     */
    public function createRefund(array $data): Refund
    {
        return DB::transaction(function () use ($data) {
            $payment = Payment::lockForUpdate()->findOrFail($data['payment_id']);

            $totalRefunded = $payment->refunds()->where('status', '!=', 'failed')->sum('amount');
            $remaining     = $payment->amount - $totalRefunded;

            if ($data['amount'] > $remaining) {
                throw new \InvalidArgumentException(
                    "Le montant du remboursement ({$data['amount']}) dépasse le solde remboursable ({$remaining})."
                );
            }

            $data['status'] = 'pending';

            $refund = Refund::create($data);

            $this->syncPaymentStatus($payment);

            return $refund;
        });
    }

    /**
     * Mark a refund as processed (succeeded) and update the payment status.
     */
    public function processRefund(Refund $refund): Refund
    {
        return DB::transaction(function () use ($refund) {
            $refund->update([
                'status'      => 'succeeded',
                'refunded_at' => $refund->refunded_at ?? now(),
            ]);

            $this->syncPaymentStatus($refund->payment);

            return $refund->fresh();
        });
    }

    /**
     * Cancel a refund and restore the payment status.
     */
    public function cancelRefund(Refund $refund): Refund
    {
        return DB::transaction(function () use ($refund) {
            $refund->update(['status' => 'failed']);

            $this->syncPaymentStatus($refund->payment);

            return $refund->fresh();
        });
    }

    /**
     * Update a refund with validated data.
     */
    public function updateRefund(Refund $refund, array $data): Refund
    {
        return DB::transaction(function () use ($refund, $data) {
            $refund->update($data);

            $this->syncPaymentStatus($refund->payment);

            return $refund->fresh();
        });
    }

    /**
     * Delete a refund and sync the payment status.
     */
    public function deleteRefund(Refund $refund): void
    {
        DB::transaction(function () use ($refund) {
            $payment = $refund->payment;
            $refund->delete();

            $this->syncPaymentStatus($payment);
        });
    }

    /**
     * Sync the payment status based on total refunded amount.
     */
    private function syncPaymentStatus(Payment $payment): void
    {
        $totalRefunded = $payment->refunds()
            ->whereIn('status', ['pending', 'succeeded'])
            ->sum('amount');

        if ($totalRefunded >= $payment->amount) {
            $payment->update(['status' => 'refunded']);
        } elseif ($payment->status === 'refunded') {
            $payment->update(['status' => 'succeeded']);
        }
    }
}
