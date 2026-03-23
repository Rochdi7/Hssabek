<?php $page = 'supplier-payments'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Paiement Fournisseur')
@section('description', 'Consulter les détails du paiement fournisseur')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.purchases.supplier-payments.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Paiements fournisseurs') }}</a></h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('bo.purchases.supplier-payments.download', $supplierPayment) }}"
                                    target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                                <a href="{{ route('bo.purchases.supplier-payments.edit', $supplierPayment) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}</a>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-3">{{ __('Détails du paiement fournisseur') }}</h6>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-muted fw-medium" style="width: 40%;">{{ __('Référence') }}</td>
                                                <td>{{ $supplierPayment->reference_number ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Fournisseur') }}</td>
                                                <td>{{ $supplierPayment->supplier->name ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Méthode') }}</td>
                                                <td>{{ $supplierPayment->paymentMethod->name ?? '—' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-muted fw-medium" style="width: 40%;">{{ __('Montant') }}</td>
                                                <td class="fw-bold">{{ number_format($supplierPayment->amount, 2, ',', ' ') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Date') }}</td>
                                                <td>{{ $supplierPayment->payment_date?->format('d/m/Y') ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Statut') }}</td>
                                                <td>
                                                    @switch($supplierPayment->status)
                                                        @case('succeeded')
                                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Réussi') }}</span>
                                                        @break
                                                        @case('pending')
                                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('En attente') }}</span>
                                                        @break
                                                        @case('failed')
                                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Échoué') }}</span>
                                                        @break
                                                        @case('refunded')
                                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('Remboursé') }}</span>
                                                        @break
                                                        @case('cancelled')
                                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Annulé') }}</span>
                                                        @break
                                                    @endswitch
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                @if ($supplierPayment->notes)
                                    <div class="mb-3">
                                        <label class="form-label text-muted fw-medium">{{ __('Notes') }}</label>
                                        <p>{{ $supplierPayment->notes }}</p>
                                    </div>
                                @endif

                                @if ($supplierPayment->allocations && $supplierPayment->allocations->count())
                                    <h6 class="mb-3 mt-4">{{ __('Allocations aux factures fournisseur') }}</h6>
                                    <div class="table-responsive rounded border mb-3">
                                        <table class="table table-nowrap m-0">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th>{{ __('Facture fournisseur') }}</th>
                                                    <th>{{ __('Montant alloué') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($supplierPayment->allocations as $allocation)
                                                    <tr>
                                                        <td>
                                                            @if ($allocation->vendorBill)
                                                                <a href="{{ route('bo.purchases.vendor-bills.show', $allocation->vendorBill) }}">{{ $allocation->vendorBill->number ?? $allocation->vendorBill->id }}</a>
                                                            @else
                                                                —
                                                            @endif
                                                        </td>
                                                        <td>{{ number_format($allocation->amount_applied, 2, ',', ' ') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
