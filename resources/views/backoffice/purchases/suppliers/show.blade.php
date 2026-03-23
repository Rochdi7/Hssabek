<?php $page = 'suppliers'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Fournisseur')
@section('description', 'Consulter les détails du fournisseur')
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
                    <h6><a href="{{ route('bo.purchases.suppliers.index') }}"><i class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Fournisseurs') }}</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('bo.purchases.suppliers.edit', $supplier) }}" class="btn btn-primary d-flex align-items-center fs-14 fw-semibold">
                        <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}</a>
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

                    <!-- Start Supplier Info -->
                    <div class="card bg-light customer-details-info position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="avatar avatar-xxl rounded-circle flex-shrink-0">
                                        <span class="avatar avatar-xxl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center border border-white border-2 fs-24 fw-bold">
                                            {{ strtoupper(substr($supplier->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div class="">
                                        <p class="text-primary fs-14 fw-medium mb-1">{{ __('Fournisseur') }}</p>
                                        <h6 class="mb-2"> {{ $supplier->name }}
                                            @if($supplier->status === 'active')
                                                <span class="badge badge-soft-success ms-1">{{ __('Actif') }}</span>
                                            @else
                                                <span class="badge badge-soft-danger ms-1">{{ __('Inactif') }}</span>
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                <a href="{{ route('bo.purchases.suppliers.edit', $supplier) }}"
                                    class="btn btn-outline-white border border-1 border-grey border-sm bg-white"><i
                                        class="isax isax-edit-2 fs-13 fw-semibold text-dark me-1"></i>{{ __('Modifier') }}</a>
                            </div>

                            <div class="card border-0 shadow shadow-none mb-0 bg-white">
                                <div class="card-body border-0 shadow shadow-none">
                                    <ul
                                        class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-0 m-0 list-unstyled">
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-sms fs-14 me-2"></i>{{ __('E-mail') }}</h6>
                                            <p> {{ $supplier->email ?? '—' }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-call fs-14 me-2"></i>{{ __('Téléphone') }}</h6>
                                            <p> {{ $supplier->phone ?? '—' }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-receipt-text fs-14 me-2"></i>{{ __('Identifiant fiscal') }}</h6>
                                            <p> {{ $supplier->tax_id ?? '—' }}</p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-dollar-circle fs-14 me-2"></i>{{ __('Devise') }}</h6>
                                            <p> {{ $supplier->currency ?? '—' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <img src="{{ URL::asset('build/img/icons/elements-01.svg') }}" alt="elements-01"
                            class="img-fluid customer-details-bg">
                    </div><!-- end card -->
                    <!-- End Supplier Info -->

                    <!-- Start Purchase Orders -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Bons de commande récents') }}</h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="no-sort">{{ __('N°') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Total') }}</th>
                                            <th class="no-sort">{{ __('Statut') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($supplier->purchaseOrders as $po)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('bo.purchases.purchase-orders.show', $po) }}" class="link-default">{{ $po->number }}</a>
                                                </td>
                                                <td>{{ $po->order_date->format('d/m/Y') }}</td>
                                                <td class="text-dark">{{ number_format($po->total, 2, ',', ' ') }} {{ $po->currency }}</td>
                                                <td>
                                                    @switch($po->status)
                                                        @case('draft')
                                                            <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span>
                                                            @break
                                                        @case('sent')
                                                            <span class="badge badge-soft-info">{{ __('Envoyé') }}</span>
                                                            @break
                                                        @case('confirmed')
                                                            <span class="badge badge-soft-primary">{{ __('Confirmé') }}</span>
                                                            @break
                                                        @case('partially_received')
                                                            <span class="badge badge-soft-warning">{{ __('Partiellement reçu') }}</span>
                                                            @break
                                                        @case('received')
                                                            <span class="badge badge-soft-success">{{ __('Reçu') }}</span>
                                                            @break
                                                        @case('cancelled')
                                                            <span class="badge badge-soft-danger">{{ __('Annulé') }}</span>
                                                            @break
                                                    @endswitch
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucun bon de commande.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Purchase Orders -->

                    <!-- Start Vendor Bills -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Factures fournisseur récentes') }}</h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="no-sort">{{ __('N°') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Total') }}</th>
                                            <th>{{ __('Restant dû') }}</th>
                                            <th class="no-sort">{{ __('Statut') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($supplier->vendorBills as $bill)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('bo.purchases.vendor-bills.show', $bill) }}" class="link-default">{{ $bill->number }}</a>
                                                </td>
                                                <td>{{ $bill->issue_date->format('d/m/Y') }}</td>
                                                <td class="text-dark">{{ number_format($bill->total, 2, ',', ' ') }} {{ $bill->currency }}</td>
                                                <td class="text-dark">{{ number_format($bill->amount_due, 2, ',', ' ') }} {{ $bill->currency }}</td>
                                                <td>
                                                    @switch($bill->status)
                                                        @case('draft')
                                                            <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span>
                                                            @break
                                                        @case('posted')
                                                            <span class="badge badge-soft-info">{{ __('Validée') }}</span>
                                                            @break
                                                        @case('paid')
                                                            <span class="badge badge-soft-success">{{ __('Payée') }}</span>
                                                            @break
                                                        @case('void')
                                                            <span class="badge badge-soft-danger">{{ __('Annulée') }}</span>
                                                            @break
                                                    @endswitch
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucune facture fournisseur.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Vendor Bills -->

                </div><!-- end col -->
                <div class="col-xl-4">
                    <!-- Start Notes -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Notes') }}</h6>
                            <p class="text-truncate line-clamb-3"> {{ $supplier->notes ?? __('Aucune note.') }} </p>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Notes -->

                    <!-- Start Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Informations') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Délai de paiement') }}</span>
                                    <span class="fw-semibold">{{ $supplier->payment_terms_days }} {{ __('jours') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Bons de commande') }}</span>
                                    <span class="fw-semibold">{{ $supplier->purchaseOrders->count() }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Factures fournisseur') }}</span>
                                    <span class="fw-semibold">{{ $supplier->vendorBills->count() }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $supplier->created_at->format('d/m/Y') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted">{{ __('Dernière modification') }}</span>
                                    <span class="fw-semibold">{{ $supplier->updated_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Info -->
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
