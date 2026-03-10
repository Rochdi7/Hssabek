<?php

namespace App\Http\Controllers\Backoffice\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sales\Store\StoreDeliveryChallanRequest;
use App\Http\Requests\Sales\Update\UpdateDeliveryChallanRequest;
use App\Models\Catalog\Product;
use App\Models\CRM\Customer;
use App\Models\Finance\BankAccount;
use App\Models\Sales\DeliveryChallan;
use App\Models\Sales\Invoice;
use App\Services\Sales\DeliveryChallanService;
use App\Services\Sales\PdfService;
use App\Services\System\DocumentNumberService;
use Illuminate\Http\Request;

class DeliveryChallanController extends Controller
{
    public function __construct(
        private readonly DeliveryChallanService $deliveryChallanService,
    ) {}

    public function index(Request $request)
    {
        $this->authorize('viewAny', DeliveryChallan::class);

        $challans = DeliveryChallan::query()
            ->with(['customer'])
            ->when($request->search, fn($q, $s) => $q->where(function ($q) use ($s) {
                $q->where('number', 'like', "%{$s}%")
                    ->orWhere('reference_number', 'like', "%{$s}%")
                    ->orWhereHas('customer', fn($cq) => $cq->where('name', 'like', "%{$s}%"));
            }))
            ->when($request->status, fn($q, $s) => $q->where('status', $s))
            ->latest('challan_date')
            ->paginate(15)
            ->withQueryString();

        return view('backoffice.sales.delivery-challans.index', compact('challans'));
    }

    public function create()
    {
        $this->authorize('create', DeliveryChallan::class);

        $customers = Customer::orderBy('name')->get();
        $invoices = Invoice::orderBy('issue_date', 'desc')->limit(50)->get();
        $products = Product::orderBy('name')->get();

        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('challan_ref');

        return view('backoffice.sales.delivery-challans.create', compact('customers', 'invoices', 'products', 'bankAccounts', 'nextReference'));
    }

    public function store(StoreDeliveryChallanRequest $request)
    {
        $this->authorize('create', DeliveryChallan::class);

        $challan = $this->deliveryChallanService->create($request->validated());

        return redirect()->route('bo.sales.delivery-challans.show', $challan)
            ->with('success', 'Bon de livraison créé avec succès.');
    }

    public function show(DeliveryChallan $deliveryChallan)
    {
        $this->authorize('view', $deliveryChallan);

        $deliveryChallan->load(['customer', 'items', 'invoice']);

        return view('backoffice.sales.delivery-challans.show', compact('deliveryChallan'));
    }

    public function edit(DeliveryChallan $deliveryChallan)
    {
        $this->authorize('update', $deliveryChallan);

        $customers = Customer::orderBy('name')->get();
        $invoices = Invoice::orderBy('issue_date', 'desc')->limit(50)->get();
        $products = Product::orderBy('name')->get();
        $deliveryChallan->load('items');

        $bankAccounts = BankAccount::where('is_active', true)->orderBy('bank_name')->get();

        $nextReference = app(DocumentNumberService::class)->preview('challan_ref');

        return view('backoffice.sales.delivery-challans.edit', compact('deliveryChallan', 'customers', 'invoices', 'products', 'bankAccounts', 'nextReference'));
    }

    public function update(UpdateDeliveryChallanRequest $request, DeliveryChallan $deliveryChallan)
    {
        $this->authorize('update', $deliveryChallan);

        $this->deliveryChallanService->update($deliveryChallan, $request->validated());

        return redirect()->route('bo.sales.delivery-challans.show', $deliveryChallan)
            ->with('success', 'Bon de livraison mis à jour avec succès.');
    }

    public function destroy(DeliveryChallan $deliveryChallan)
    {
        $this->authorize('delete', $deliveryChallan);

        $deliveryChallan->items()->delete();
        $deliveryChallan->delete();

        return redirect()->route('bo.sales.delivery-challans.index')
            ->with('success', 'Bon de livraison supprimé avec succès.');
    }

    public function download(DeliveryChallan $deliveryChallan, PdfService $pdfService)
    {
        abort_unless(auth()->user()->can('sales.delivery_challans.view'), 403);

        return $pdfService->deliveryChallanResponse($deliveryChallan, 'download');
    }
}
