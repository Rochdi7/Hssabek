<?php $page = 'debit-notes'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails de la Note de Débit')
@section('description', 'Consulter les détails de la note de débit')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                            <h6><a href="{{ route('bo.purchases.debit-notes.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Notes de débit') }}</a></h6>
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <a href="{{ route('bo.purchases.debit-notes.download', $debitNote) }}" target="_blank" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                                @if($debitNote->status === 'draft')
                                    <a href="{{ route('bo.purchases.debit-notes.edit', $debitNote) }}" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-edit me-1"></i>{{ __('Modifier') }}</a>
                                @endif
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="bg-light p-4 rounded position-relative mb-3">
                                    <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap mb-3 pb-2 position-relative z-1">
                                        <div class="mb-3">
                                            <h4 class="mb-1">{{ __('Note de débit') }}</h4>
                                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                <div class="me-4">
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ $debitNote->number }}</h6>
                                                    <p>
                                                        @switch($debitNote->status)
                                                            @case('draft') <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span> @break
                                                            @case('sent') <span class="badge badge-soft-info">{{ __('Envoyée') }}</span> @break
                                                            @case('applied') <span class="badge badge-soft-success">{{ __('Appliquée') }}</span> @break
                                                            @case('void') <span class="badge badge-soft-danger">{{ __('Annulée') }}</span> @break
                                                        @endswitch
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-3 position-relative z-1">
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Détails') }}</h6>
                                                <p class="mb-1">{{ __('N° Note :') }}<span class="text-dark">{{ $debitNote->number }}</span></p>
                                                <p class="mb-1">{{ __('Date :') }}<span class="text-dark">{{ $debitNote->debit_note_date?->format('d/m/Y') }}</span></p>
                                                @if($debitNote->vendorBill)
                                                    <p class="mb-1">{{ __('Facture fournisseur :') }}<span class="text-dark">{{ $debitNote->vendorBill->number }}</span></p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Fournisseur') }}</h6>
                                                <h6 class="fs-14 fw-semibold mb-1">{{ $debitNote->supplier->name ?? '—' }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Total') }}</h6>
                                                <p class="mb-1">{{ __('Total :') }}<span class="text-dark fw-semibold">{{ number_format($debitNote->total, 2, ',', ' ') }} {{ $debitNote->currency }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($debitNote->items && $debitNote->items->count())
                                    <div class="mb-3">
                                        <h6 class="mb-3">{{ __('Lignes') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border table-nowrap">
                                            <table class="table m-0">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('#') }}</th>
                                                        <th>{{ __('Libellé') }}</th>
                                                        <th>{{ __('Quantité') }}</th>
                                                        <th>{{ __('Prix unitaire') }}</th>
                                                        <th>{{ __('Total') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($debitNote->items as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->label ?? $item->product?->name ?? '—' }}</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>{{ number_format($item->unit_price ?? 0, 2, ',', ' ') }}</td>
                                                            <td class="fw-semibold">{{ number_format($item->line_total ?? 0, 2, ',', ' ') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                <div class="border-bottom mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @if($debitNote->notes)
                                                <div class="mb-3 p-4">
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ __('Notes') }}</h6>
                                                    <p>{{ $debitNote->notes }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3 p-4">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <h6 class="fs-14 fw-semibold">{{ __('Sous-total') }}</h6>
                                                    <h6 class="fs-14 fw-semibold">{{ number_format($debitNote->subtotal, 2, ',', ' ') }}</h6>
                                                </div>
                                                @if($debitNote->discount_total > 0)
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">{{ __('Remise') }}</h6>
                                                        <h6 class="fs-14 fw-semibold text-danger">-{{ number_format($debitNote->discount_total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                @endif
                                                @if($debitNote->tax_total > 0)
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">{{ __('Taxe') }}</h6>
                                                        <h6 class="fs-14 fw-semibold">{{ number_format($debitNote->tax_total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                @endif
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                                    <h6>{{ __('Total') }}</h6>
                                                    <h6>{{ number_format($debitNote->total, 2, ',', ' ') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($debitNote->applications->count() > 0)
                                    <div class="mb-3">
                                        <h6 class="mb-3">{{ __('Applications') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border table-nowrap">
                                            <table class="table m-0">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('Facture fournisseur') }}</th>
                                                        <th>{{ __('Montant appliqué') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($debitNote->applications as $app)
                                                        <tr>
                                                            <td>{{ $app->vendorBill->number ?? '—' }}</td>
                                                            <td class="text-success">{{ number_format($app->amount_applied, 2, ',', ' ') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if(in_array($debitNote->status, ['draft', 'sent']))
                                    <div class="border-top pt-3">
                                        <h6 class="mb-3">{{ __('Appliquer la note de débit à une facture fournisseur') }}</h6>
                                        <form action="{{ route('bo.purchases.debit-notes.apply', $debitNote) }}" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">{{ __('Facture fournisseur') }}</label>
                                                    <select name="allocations[0][vendor_bill_id]" class="form-select" required>
                                                        <option value="">{{ __('Sélectionner une facture') }}</option>
                                                        @foreach(\App\Models\Purchases\VendorBill::where('supplier_id', $debitNote->supplier_id)->where('amount_due', '>', 0)->get() as $bill)
                                                            <option value="{{ $bill->id }}">{{ $bill->number }} — {{ __('Restant') }} : {{ number_format($bill->amount_due, 2, ',', ' ') }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">{{ __('Montant à appliquer') }}</label>
                                                    <input type="number" name="allocations[0][amount_applied]" class="form-control" min="0.01" step="0.01" max="{{ $debitNote->total - $debitNote->applications->sum('amount_applied') }}" required>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-end">
                                                    <button type="submit" class="btn btn-primary w-100">{{ __('Appliquer') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
