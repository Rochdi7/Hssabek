<?php

namespace App\Http\Controllers\Backoffice\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\Store\StoreRefundRequest;
use App\Http\Requests\Sales\Update\UpdateRefundRequest;
use App\Models\Sales\Payment;
use App\Models\Sales\Refund;
use App\Services\Sales\RefundService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function __construct(
        private readonly RefundService $service,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', Refund::class);

        $refunds = Refund::query()
            ->with(['payment', 'payment.customer'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('provider_refund_id', 'like', "%{$s}%")
                    ->orWhereHas('payment', fn($pq) => $pq->where('reference_number', 'like', "%{$s}%"));
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest('refunded_at')
            ->paginate($request->input('per_page', 15))
            ->withQueryString();

        return view('backoffice.sales.refunds.index', compact('refunds'));
    }

    public function create()
    {
        $this->authorize('create', Refund::class);

        $payments = Payment::with('customer')->orderBy('payment_date', 'desc')->limit(50)->get();

        $nextReference = app(DocumentNumberService::class)->preview('refund_ref');

        return view('backoffice.sales.refunds.create', compact('payments', 'nextReference'));
    }

    public function store(StoreRefundRequest $request)
    {
        $this->authorize('create', Refund::class);

        $this->service->createRefund($request->validated());

        return redirect()->route('bo.sales.refunds.index')
            ->with('success', 'Remboursement enregistré avec succès.');
    }

    public function show(Refund $refund)
    {
        $this->authorize('view', $refund);

        $refund->load(['payment', 'payment.customer', 'payment.paymentMethod']);

        return view('backoffice.sales.refunds.show', compact('refund'));
    }

    public function edit(Refund $refund)
    {
        $this->authorize('update', $refund);

        $refund->load(['payment', 'payment.customer']);

        $nextReference = app(DocumentNumberService::class)->preview('refund_ref');

        return view('backoffice.sales.refunds.edit', compact('refund', 'nextReference'));
    }

    public function update(UpdateRefundRequest $request, Refund $refund)
    {
        $this->authorize('update', $refund);

        $this->service->updateRefund($refund, $request->validated());

        return redirect()->route('bo.sales.refunds.index')
            ->with('success', 'Remboursement mis à jour avec succès.');
    }

    public function destroy(Refund $refund)
    {
        $this->authorize('delete', $refund);

        $this->service->deleteRefund($refund);

        return redirect()->route('bo.sales.refunds.index')
            ->with('success', 'Remboursement supprimé avec succès.');
    }
}
