<?php

namespace App\Http\Controllers\Backoffice\Purchases;

use App\Http\Controllers\Controller;
use App\Http\Requests\Purchases\Store\StoreDebitNoteRequest;
use App\Http\Requests\Purchases\Update\UpdateDebitNoteRequest;
use App\Models\Purchases\DebitNote;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\VendorBill;
use App\Services\Purchases\DebitNoteService;
use App\Services\Sales\PdfService;
use Illuminate\Http\Request;

class DebitNoteController extends Controller
{
    public function __construct(
        private readonly DebitNoteService $debitNoteService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', DebitNote::class);

        $debitNotes = DebitNote::query()
            ->with(['supplier'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('number', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%")
                    ->orWhereHas('supplier', fn($sq) => $sq->where('name', 'like', "%{$s}%"));
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest('debit_note_date')
            ->paginate(15)
            ->withQueryString();

        return view('backoffice.purchases.debit-notes.index', compact('debitNotes'));
    }

    public function create()
    {
        $this->authorize('create', DebitNote::class);

        $suppliers = Supplier::orderBy('name')->get();
        $vendorBills = VendorBill::with('supplier')->orderBy('issue_date', 'desc')->limit(50)->get();

        return view('backoffice.purchases.debit-notes.create', compact('suppliers', 'vendorBills'));
    }

    public function store(StoreDebitNoteRequest $request)
    {
        $this->authorize('create', DebitNote::class);

        $debitNote = $this->debitNoteService->create($request->validated());

        return redirect()->route('bo.purchases.debit-notes.show', $debitNote)
            ->with('success', 'Note de débit créée avec succès.');
    }

    public function show(DebitNote $debitNote)
    {
        $this->authorize('view', $debitNote);

        $debitNote->load(['supplier', 'items', 'vendorBill', 'purchaseOrder', 'applications.vendorBill']);

        return view('backoffice.purchases.debit-notes.show', compact('debitNote'));
    }

    public function edit(DebitNote $debitNote)
    {
        $this->authorize('update', $debitNote);

        $suppliers = Supplier::orderBy('name')->get();
        $vendorBills = VendorBill::with('supplier')->orderBy('issue_date', 'desc')->limit(50)->get();

        return view('backoffice.purchases.debit-notes.edit', compact('debitNote', 'suppliers', 'vendorBills'));
    }

    public function update(UpdateDebitNoteRequest $request, DebitNote $debitNote)
    {
        $this->authorize('update', $debitNote);

        $this->debitNoteService->update($debitNote, $request->validated());

        return redirect()->route('bo.purchases.debit-notes.show', $debitNote)
            ->with('success', 'Note de débit mise à jour avec succès.');
    }

    public function apply(Request $request, DebitNote $debitNote)
    {
        $this->authorize('update', $debitNote);
        abort_unless(in_array($debitNote->status, ['draft', 'sent']), 403, 'Seules les notes de débit en brouillon ou envoyées peuvent être appliquées.');

        $validated = $request->validate([
            'allocations' => ['required', 'array', 'min:1'],
            'allocations.*.vendor_bill_id' => ['required', 'uuid', 'exists:vendor_bills,id'],
            'allocations.*.amount_applied' => ['required', 'numeric', 'min:0.01'],
        ], [
            'allocations.required' => 'Au moins une allocation est obligatoire.',
            'allocations.*.vendor_bill_id.required' => 'La facture fournisseur est obligatoire.',
            'allocations.*.amount_applied.required' => 'Le montant est obligatoire.',
        ]);

        $this->debitNoteService->apply($debitNote, $validated['allocations']);

        return redirect()->route('bo.purchases.debit-notes.show', $debitNote)
            ->with('success', 'Note de débit appliquée avec succès.');
    }

    public function destroy(DebitNote $debitNote)
    {
        $this->authorize('delete', $debitNote);

        $debitNote->items()->delete();
        $debitNote->delete();

        return redirect()->route('bo.purchases.debit-notes.index')
            ->with('success', 'Note de débit supprimée avec succès.');
    }

    public function download(DebitNote $debitNote, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('purchases.debit_notes.view'), 403);

        return $pdfService->debitNoteResponse($debitNote, 'download');
    }
}
