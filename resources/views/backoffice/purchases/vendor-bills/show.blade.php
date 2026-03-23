<?php $page = 'vendor-bills'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails de la Facture Fournisseur')
@section('description', 'Consulter les détails de la facture fournisseur')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6><a href="{{ route('bo.purchases.vendor-bills.index') }}"><i class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Factures fournisseur') }}</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('bo.purchases.vendor-bills.download', $vendorBill) }}" target="_blank" class="btn btn-outline-white d-flex align-items-center fs-14 fw-semibold">
                        <i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                    @if($vendorBill->status === 'draft')
                        <a href="{{ route('bo.purchases.vendor-bills.edit', $vendorBill) }}" class="btn btn-primary d-flex align-items-center fs-14 fw-semibold">
                            <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}</a>
                    @endif
                    <form method="POST" action="{{ route('bo.purchases.vendor-bills.destroy', $vendorBill) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger d-flex align-items-center fs-14 fw-semibold"
                            onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette facture fournisseur ?') }}')">
                            <i class="isax isax-trash me-1"></i>{{ __('Supprimer') }}</button>
                    </form>
                </div>
            </div>
            <!-- End Page Header -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- start row -->
            <div class="row">
                <div class="col-xl-8">

                    <!-- Bill Header Info -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div>
                                    <h5 class="mb-1">{{ $vendorBill->number }}</h5>
                                    <p class="text-muted mb-0">
                                        @switch($vendorBill->status)
                                            @case('draft') <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span> @break
                                            @case('posted') <span class="badge badge-soft-info">{{ __('Validée') }}</span> @break
                                            @case('paid') <span class="badge badge-soft-success">{{ __('Payée') }}</span> @break
                                            @case('void') <span class="badge badge-soft-danger">{{ __('Annulée') }}</span> @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="fs-14 mb-2">{{ __('Fournisseur') }}</h6>
                                        <p class="mb-1 fw-semibold">{{ $vendorBill->supplier->name }}</p>
                                        <p class="mb-0 text-muted">{{ $vendorBill->supplier->email ?? '' }}</p>
                                        <p class="mb-0 text-muted">{{ $vendorBill->supplier->phone ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled m-0 p-0">
                                        <li class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">{{ __('Date d\'émission') }}</span>
                                            <span class="fw-semibold">{{ $vendorBill->issue_date->format('d/m/Y') }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">{{ __('Date d\'échéance') }}</span>
                                            <span class="fw-semibold">{{ $vendorBill->due_date?->format('d/m/Y') ?? '—' }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">{{ __('Devise') }}</span>
                                            <span class="fw-semibold">{{ $vendorBill->currency }}</span>
                                        </li>
                                        @if($vendorBill->reference_number)
                                            <li class="d-flex justify-content-between mb-2">
                                                <span class="text-muted">{{ __('Référence') }}</span>
                                                <span class="fw-semibold">{{ $vendorBill->reference_number }}</span>
                                            </li>
                                        @endif
                                        @if($vendorBill->purchaseOrder)
                                            <li class="d-flex justify-content-between mb-2">
                                                <span class="text-muted">{{ __('Bon de commande') }}</span>
                                                <a href="{{ route('bo.purchases.purchase-orders.show', $vendorBill->purchaseOrder) }}" class="fw-semibold">{{ $vendorBill->purchaseOrder->number }}</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($vendorBill->notes)
                        <div class="card">
                            <div class="card-body">
                                <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Notes') }}</h6>
                                <p>{{ $vendorBill->notes }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Payments -->
                    @if($vendorBill->payments->isNotEmpty())
                        <div class="card table-info">
                            <div class="card-body">
                                <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Paiements') }}</h6>
                                <div class="table-responsive table-nowrap">
                                    <table class="table border m-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>{{ __('Date') }}</th>
                                                <th>{{ __('Montant') }}</th>
                                                <th>{{ __('Statut') }}</th>
                                                <th>{{ __('Référence') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vendorBill->payments as $payment)
                                                <tr>
                                                    <td>{{ $payment->payment_date?->format('d/m/Y') ?? '—' }}</td>
                                                    <td class="fw-medium">{{ number_format($payment->amount, 2, ',', ' ') }} {{ $payment->currency }}</td>
                                                    <td>
                                                        @switch($payment->status)
                                                            @case('pending') <span class="badge badge-soft-warning">{{ __('En attente') }}</span> @break
                                                            @case('succeeded') <span class="badge badge-soft-success">{{ __('Réussi') }}</span> @break
                                                            @case('failed') <span class="badge badge-soft-danger">{{ __('Échoué') }}</span> @break
                                                            @case('refunded') <span class="badge badge-soft-info">{{ __('Remboursé') }}</span> @break
                                                            @case('cancelled') <span class="badge badge-soft-secondary">{{ __('Annulé') }}</span> @break
                                                        @endswitch
                                                    </td>
                                                    <td>{{ $payment->reference_number ?? '—' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                </div><!-- end col -->
                <div class="col-xl-4">
                    <!-- Totals -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Récapitulatif') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Sous-total') }}</span>
                                    <span class="fw-semibold">{{ number_format($vendorBill->subtotal, 2, ',', ' ') }} {{ $vendorBill->currency }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Taxes') }}</span>
                                    <span class="fw-semibold">{{ number_format($vendorBill->tax_total, 2, ',', ' ') }} {{ $vendorBill->currency }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between pt-3 border-top mb-3">
                                    <span class="fw-bold">{{ __('Total') }}</span>
                                    <span class="fw-bold fs-16">{{ number_format($vendorBill->total, 2, ',', ' ') }} {{ $vendorBill->currency }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Montant payé') }}</span>
                                    <span class="fw-semibold text-success">{{ number_format($vendorBill->amount_paid, 2, ',', ' ') }} {{ $vendorBill->currency }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted">{{ __('Restant dû') }}</span>
                                    <span class="fw-semibold {{ $vendorBill->amount_due > 0 ? 'text-danger' : '' }}">{{ number_format($vendorBill->amount_due, 2, ',', ' ') }} {{ $vendorBill->currency }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Informations') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $vendorBill->created_at->format('d/m/Y H:i') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted">{{ __('Dernière modification') }}</span>
                                    <span class="fw-semibold">{{ $vendorBill->updated_at->format('d/m/Y H:i') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
                End Page Content
            ========================= -->
@endsection
