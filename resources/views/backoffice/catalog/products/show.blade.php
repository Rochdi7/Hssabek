<?php $page = 'products'; ?>
@extends('backoffice.layout.mainlayout')
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
                    <h6><a href="{{ route('bo.catalog.products.index') }}"><i
                                class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Produits & Services') }}</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('bo.catalog.products.edit', $product) }}"
                        class="btn btn-primary d-flex align-items-center fs-14 fw-semibold">
                        <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}</a>
                </div>
            </div>
            <!-- End Page Header -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- start row -->
            <div class="row">
                <div class="col-xl-8">

                    <!-- Start Product Info -->
                    <div class="card bg-light customer-details-info position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="avatar avatar-xxl rounded-circle flex-shrink-0">
                                        @if ($product->getFirstMediaUrl('product_image'))
                                            <img src="{{ $product->getFirstMediaUrl('product_image') }}"
                                                class="rounded-circle" alt="{{ $product->name }}">
                                        @else
                                            <span
                                                class="avatar avatar-xxl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center border border-white border-2 fs-24 fw-bold">
                                                {{ strtoupper(substr($product->name, 0, 1)) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="">
                                        <p class="text-primary fs-14 fw-medium mb-1">
                                            @if ($product->item_type === 'service')
                                                <span class="badge badge-soft-info d-inline-flex align-items-center">
                                                    <i class="isax isax-setting-25 me-1"></i>{{ __('Service') }}</span>
                                            @else
                                                <span class="badge badge-soft-primary d-inline-flex align-items-center">
                                                    <i class="isax isax-box-15 me-1"></i>{{ __('Produit') }}</span>
                                            @endif
                                        </p>
                                        <h6 class="mb-2">{{ $product->name }}
                                            @if ($product->is_active)
                                                <span class="badge badge-soft-success ms-1">{{ __('Actif') }}</span>
                                            @else
                                                <span class="badge badge-soft-danger ms-1">{{ __('Inactif') }}</span>
                                            @endif
                                        </h6>
                                        @if ($product->code || $product->sku)
                                            <p class="fs-14 fw-regular text-muted">
                                                <i class="isax isax-barcode fs-14 me-1"></i>
                                                {{ $product->code ?? $product->sku }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('bo.catalog.products.edit', $product) }}"
                                    class="btn btn-outline-white border border-1 border-grey border-sm bg-white">
                                    <i class="isax isax-edit-2 fs-13 fw-semibold text-dark me-1"></i>{{ __('Modifier') }}</a>
                            </div>

                            <div class="card border-0 shadow shadow-none mb-0 bg-white">
                                <div class="card-body border-0 shadow shadow-none">
                                    <ul
                                        class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-0 m-0 list-unstyled">
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"><i
                                                    class="isax isax-category-2 fs-14 me-2"></i>{{ __('Catégorie') }}</h6>
                                            <p>{{ $product->category?->name ?? '—' }}</p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"><i
                                                    class="isax isax-ruler fs-14 me-2"></i>{{ __('Unité') }}</h6>
                                            <p>{{ $product->unit?->name ?? '—' }}</p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"><i
                                                    class="isax isax-money-4 fs-14 me-2"></i>{{ __('Prix de vente') }}</h6>
                                            <p>{{ number_format($product->selling_price, 2, ',', ' ') }}</p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"><i
                                                    class="isax isax-receipt-2 fs-14 me-2"></i>{{ __('Taxe') }}</h6>
                                            <p>{{ $product->taxCategory?->name ?? '—' }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <img src="{{ URL::asset('build/img/icons/elements-01.svg') }}" alt="elements-01"
                            class="img-fluid customer-details-bg">
                    </div><!-- end card -->
                    <!-- End Product Info -->

                    <!-- Start Tabs Navigation -->
                    <ul class="nav nav-tabs nav-tabs-solid nav-justified mb-3" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="invoices-tab" data-bs-toggle="tab"
                                data-bs-target="#invoices" type="button" role="tab">
                                <i class="isax isax-receipt-item me-1"></i>{{ __('Factures') }}<span
                                    class="badge bg-primary ms-1">{{ $invoices->count() }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="quotes-tab" data-bs-toggle="tab" data-bs-target="#quotes"
                                type="button" role="tab">
                                <i class="isax isax-document-text me-1"></i>{{ __('Devis') }} <span
                                    class="badge bg-primary ms-1">{{ $quotes->count() }}</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="purchases-tab" data-bs-toggle="tab" data-bs-target="#purchases"
                                type="button" role="tab">
                                <i class="isax isax-shopping-cart me-1"></i>{{ __('Commandes') }} <span
                                    class="badge bg-primary ms-1">{{ $purchaseOrders->count() }}</span>
                            </button>
                        </li>
                        @if ($product->item_type === 'product')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="stock-tab" data-bs-toggle="tab" data-bs-target="#stock"
                                    type="button" role="tab">
                                    <i class="isax isax-box me-1"></i>{{ __('Stock') }} <span
                                        class="badge bg-primary ms-1">{{ $stockMovements->count() }}</span>
                                </button>
                            </li>
                        @endif
                    </ul>
                    <!-- End Tabs Navigation -->

                    <!-- Tab Content -->
                    <div class="tab-content" id="productTabsContent">
                        <!-- Invoices Tab -->
                        <div class="tab-pane fade show active" id="invoices" role="tabpanel">
                            <div class="card table-info">
                                <div class="card-body">
                                    <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Factures contenant ce') }}
                                        {{ $product->item_type === 'service' ? __('service') : __('produit') }}</h6>
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border m-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('N°') }}</th>
                                                    <th>{{ __('Client') }}</th>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Montant') }}</th>
                                                    <th>{{ __('Statut') }}</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($invoices as $invoice)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('bo.sales.invoices.show', $invoice) }}"
                                                                class="link-primary fw-medium">
                                                                {{ $invoice->number }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $invoice->customer?->name ?? '—' }}</td>
                                                        <td>{{ $invoice->issue_date?->format('d/m/Y') ?? '—' }}</td>
                                                        <td class="fw-semibold">
                                                            {{ number_format($invoice->total, 2, ',', ' ') }}</td>
                                                        <td>
                                                            @php
                                                                $statusColors = [
                                                                    'draft' => 'secondary',
                                                                    'sent' => 'info',
                                                                    'partial' => 'warning',
                                                                    'paid' => 'success',
                                                                    'overdue' => 'danger',
                                                                    'cancelled' => 'dark',
                                                                ];
                                                                $statusLabels = [
                                                                    'draft' => __('Brouillon'),
                                                                    'sent' => __('Envoyée'),
                                                                    'partial' => __('Partielle'),
                                                                    'paid' => __('Payée'),
                                                                    'overdue' => __('En retard'),
                                                                    'cancelled' => __('Annulée'),
                                                                ];
                                                            @endphp
                                                            <span
                                                                class="badge badge-soft-{{ $statusColors[$invoice->status] ?? 'secondary' }}">
                                                                {{ $statusLabels[$invoice->status] ?? ucfirst($invoice->status) }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('bo.sales.invoices.show', $invoice) }}"
                                                                class="btn btn-sm btn-light">
                                                                <i class="isax isax-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center py-3">
                                                            <p class="text-muted mb-0">{{ __('Aucune facture contenant ce') }}
                                                                {{ $product->item_type === 'service' ? __('service') : __('produit') }}.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quotes Tab -->
                        <div class="tab-pane fade" id="quotes" role="tabpanel">
                            <div class="card table-info">
                                <div class="card-body">
                                    <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Devis contenant ce') }}
                                        {{ $product->item_type === 'service' ? __('service') : __('produit') }}</h6>
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border m-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('N°') }}</th>
                                                    <th>{{ __('Client') }}</th>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Montant') }}</th>
                                                    <th>{{ __('Statut') }}</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($quotes as $quote)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('bo.sales.quotes.show', $quote) }}"
                                                                class="link-primary fw-medium">
                                                                {{ $quote->number }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $quote->customer?->name ?? '—' }}</td>
                                                        <td>{{ $quote->issue_date?->format('d/m/Y') ?? '—' }}</td>
                                                        <td class="fw-semibold">
                                                            {{ number_format($quote->total, 2, ',', ' ') }}</td>
                                                        <td>
                                                            @php
                                                                $quoteStatusColors = [
                                                                    'draft' => 'secondary',
                                                                    'sent' => 'info',
                                                                    'accepted' => 'success',
                                                                    'declined' => 'danger',
                                                                    'expired' => 'warning',
                                                                    'converted' => 'primary',
                                                                ];
                                                                $quoteStatusLabels = [
                                                                    'draft' => __('Brouillon'),
                                                                    'sent' => __('Envoyé'),
                                                                    'accepted' => __('Accepté'),
                                                                    'declined' => __('Refusé'),
                                                                    'expired' => __('Expiré'),
                                                                    'converted' => __('Converti'),
                                                                ];
                                                            @endphp
                                                            <span
                                                                class="badge badge-soft-{{ $quoteStatusColors[$quote->status] ?? 'secondary' }}">
                                                                {{ $quoteStatusLabels[$quote->status] ?? ucfirst($quote->status) }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('bo.sales.quotes.show', $quote) }}"
                                                                class="btn btn-sm btn-light">
                                                                <i class="isax isax-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center py-3">
                                                            <p class="text-muted mb-0">{{ __('Aucun devis contenant ce') }}
                                                                {{ $product->item_type === 'service' ? __('service') : __('produit') }}.
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Delivery Challans -->
                            <div class="card table-info">
                                <div class="card-body">
                                    <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Bons de livraison') }}</h6>
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border m-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('N°') }}</th>
                                                    <th>{{ __('Client') }}</th>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Statut') }}</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($deliveryChallans as $challan)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('bo.sales.delivery-challans.show', $challan) }}"
                                                                class="link-primary fw-medium">
                                                                {{ $challan->number }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $challan->customer?->name ?? '—' }}</td>
                                                        <td>{{ $challan->challan_date?->format('d/m/Y') ?? '—' }}</td>
                                                        <td>
                                                            <span
                                                                class="badge badge-soft-info">{{ ucfirst($challan->status) }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('bo.sales.delivery-challans.show', $challan) }}"
                                                                class="btn btn-sm btn-light">
                                                                <i class="isax isax-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center py-3">
                                                            <p class="text-muted mb-0">{{ __('Aucun bon de livraison.') }}</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Purchases Tab -->
                        <div class="tab-pane fade" id="purchases" role="tabpanel">
                            <!-- Purchase Orders -->
                            <div class="card table-info">
                                <div class="card-body">
                                    <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Bons de commande fournisseur') }}
                                    </h6>
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border m-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('N°') }}</th>
                                                    <th>{{ __('Fournisseur') }}</th>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Montant') }}</th>
                                                    <th>{{ __('Statut') }}</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($purchaseOrders as $po)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('bo.purchases.purchase-orders.show', $po) }}"
                                                                class="link-primary fw-medium">
                                                                {{ $po->number }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $po->supplier?->name ?? '—' }}</td>
                                                        <td>{{ $po->order_date?->format('d/m/Y') ?? '—' }}</td>
                                                        <td class="fw-semibold">
                                                            {{ number_format($po->total, 2, ',', ' ') }}</td>
                                                        <td>
                                                            @php
                                                                $poStatusColors = [
                                                                    'draft' => 'secondary',
                                                                    'sent' => 'info',
                                                                    'confirmed' => 'primary',
                                                                    'partial' => 'warning',
                                                                    'received' => 'success',
                                                                    'cancelled' => 'danger',
                                                                ];
                                                            @endphp
                                                            <span
                                                                class="badge badge-soft-{{ $poStatusColors[$po->status] ?? 'secondary' }}">
                                                                {{ ucfirst($po->status) }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('bo.purchases.purchase-orders.show', $po) }}"
                                                                class="btn btn-sm btn-light">
                                                                <i class="isax isax-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center py-3">
                                                            <p class="text-muted mb-0">{{ __('Aucun bon de commande.') }}</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Goods Receipts -->
                            <div class="card table-info">
                                <div class="card-body">
                                    <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Bons de réception') }}</h6>
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border m-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('N°') }}</th>
                                                    <th>{{ __('Fournisseur') }}</th>
                                                    <th>{{ __('Entrepôt') }}</th>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Statut') }}</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($goodsReceipts as $gr)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('bo.purchases.goods-receipts.show', $gr) }}"
                                                                class="link-primary fw-medium">
                                                                {{ $gr->number }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $gr->purchaseOrder?->supplier?->name ?? '—' }}</td>
                                                        <td>{{ $gr->warehouse?->name ?? '—' }}</td>
                                                        <td>{{ $gr->received_at?->format('d/m/Y') ?? '—' }}</td>
                                                        <td>
                                                            <span
                                                                class="badge badge-soft-info">{{ ucfirst($gr->status) }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('bo.purchases.goods-receipts.show', $gr) }}"
                                                                class="btn btn-sm btn-light">
                                                                <i class="isax isax-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center py-3">
                                                            <p class="text-muted mb-0">{{ __('Aucun bon de réception.') }}</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Debit Notes -->
                            <div class="card table-info">
                                <div class="card-body">
                                    <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Notes de débit') }}</h6>
                                    <div class="table-responsive table-nowrap">
                                        <table class="table border m-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>{{ __('N°') }}</th>
                                                    <th>{{ __('Fournisseur') }}</th>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Montant') }}</th>
                                                    <th>{{ __('Statut') }}</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($debitNotes as $dn)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('bo.purchases.debit-notes.show', $dn) }}"
                                                                class="link-primary fw-medium">
                                                                {{ $dn->number }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $dn->supplier?->name ?? '—' }}</td>
                                                        <td>{{ $dn->debit_note_date?->format('d/m/Y') ?? '—' }}</td>
                                                        <td class="fw-semibold">
                                                            {{ number_format($dn->total ?? 0, 2, ',', ' ') }}</td>
                                                        <td>
                                                            <span
                                                                class="badge badge-soft-info">{{ ucfirst($dn->status) }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('bo.purchases.debit-notes.show', $dn) }}"
                                                                class="btn btn-sm btn-light">
                                                                <i class="isax isax-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center py-3">
                                                            <p class="text-muted mb-0">{{ __('Aucune note de débit.') }}</p>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stock Tab (only for products) -->
                        @if ($product->item_type === 'product')
                            <div class="tab-pane fade" id="stock" role="tabpanel">
                                <!-- Stock by Warehouse -->
                                <div class="card table-info">
                                    <div class="card-body">
                                        <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Stock par entrepôt') }}</h6>
                                        <div class="table-responsive table-nowrap">
                                            <table class="table border m-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>{{ __('Entrepôt') }}</th>
                                                        <th>{{ __('Quantité en stock') }}</th>
                                                        <th>{{ __('Réservée') }}</th>
                                                        <th>{{ __('Disponible') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($product->stocks as $stock)
                                                        <tr>
                                                            <td class="fw-medium">{{ $stock->warehouse?->name ?? '—' }}
                                                            </td>
                                                            <td>{{ number_format($stock->quantity ?? 0, 2, ',', ' ') }}
                                                            </td>
                                                            <td>{{ number_format($stock->reserved ?? 0, 2, ',', ' ') }}
                                                            </td>
                                                            <td class="fw-semibold text-success">
                                                                {{ number_format(($stock->quantity ?? 0) - ($stock->reserved ?? 0), 2, ',', ' ') }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4" class="text-center py-3">
                                                                <p class="text-muted mb-0">{{ __('Aucun stock enregistré.') }}</p>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Stock Movements -->
                                <div class="card table-info">
                                    <div class="card-body">
                                        <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Mouvements de stock récents') }}</h6>
                                        <div class="table-responsive table-nowrap">
                                            <table class="table border m-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>{{ __('Date') }}</th>
                                                        <th>{{ __('Type') }}</th>
                                                        <th>{{ __('Entrepôt') }}</th>
                                                        <th>{{ __('Quantité') }}</th>
                                                        <th>{{ __('Note') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($stockMovements as $movement)
                                                        <tr>
                                                            <td>{{ $movement->moved_at?->format('d/m/Y H:i') ?? '—' }}</td>
                                                            <td>
                                                                @php
                                                                    $movementTypes = [
                                                                        'stock_in' => [
                                                                            'label' => __('Entrée'),
                                                                            'color' => 'success',
                                                                        ],
                                                                        'stock_out' => [
                                                                            'label' => __('Sortie'),
                                                                            'color' => 'danger',
                                                                        ],
                                                                        'adjustment' => [
                                                                            'label' => __('Ajustement'),
                                                                            'color' => 'warning',
                                                                        ],
                                                                        'transfer_in' => [
                                                                            'label' => __('Transfert entrant'),
                                                                            'color' => 'info',
                                                                        ],
                                                                        'transfer_out' => [
                                                                            'label' => __('Transfert sortant'),
                                                                            'color' => 'primary',
                                                                        ],
                                                                        'reserve' => [
                                                                            'label' => __('Réservation'),
                                                                            'color' => 'secondary',
                                                                        ],
                                                                        'unreserve' => [
                                                                            'label' => __('Libération'),
                                                                            'color' => 'secondary',
                                                                        ],
                                                                    ];
                                                                    $type = $movementTypes[
                                                                        $movement->movement_type
                                                                    ] ?? [
                                                                        'label' => $movement->movement_type,
                                                                        'color' => 'secondary',
                                                                    ];
                                                                @endphp
                                                                <span
                                                                    class="badge badge-soft-{{ $type['color'] }}">{{ $type['label'] }}</span>
                                                            </td>
                                                            <td>{{ $movement->warehouse?->name ?? '—' }}</td>
                                                            <td
                                                                class="fw-medium {{ in_array($movement->movement_type, ['stock_in', 'transfer_in', 'unreserve']) ? 'text-success' : 'text-danger' }}">
                                                                {{ in_array($movement->movement_type, ['stock_in', 'transfer_in', 'unreserve']) ? '+' : '-' }}{{ number_format($movement->quantity, 2, ',', ' ') }}
                                                            </td>
                                                            <td>{{ $movement->note ?? '—' }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center py-3">
                                                                <p class="text-muted mb-0">{{ __('Aucun mouvement de stock.') }}</p>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div><!-- end col -->

                <div class="col-xl-4">
                    <!-- Start Description -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Description') }}</h6>
                            <p class="text-truncate line-clamb-3">{{ $product->description ?? __('Aucune description.') }}</p>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Description -->

                    <!-- Start Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Informations') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                @if ($product->item_type === 'product')
                                    <li class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-muted">{{ __('Quantité totale') }}</span>
                                        <span
                                            class="fw-semibold">{{ number_format($product->quantity ?? 0, 2, ',', ' ') }}
                                            {{ $product->unit?->abbreviation ?? '' }}</span>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-muted">{{ __('Alerte stock') }}</span>
                                        <span
                                            class="fw-semibold">{{ $product->alert_quantity ? number_format($product->alert_quantity, 2, ',', ' ') : '—' }}</span>
                                    </li>
                                @endif
                                @if ($product->item_type === 'service')
                                    <li class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-muted">{{ __('Type de facturation') }}</span>
                                        <span
                                            class="fw-semibold">{{ $product->billing_type === 'hourly' ? __('À l\'heure') : __('Forfait') }}</span>
                                    </li>
                                    @if ($product->billing_type === 'hourly')
                                        <li class="d-flex align-items-center justify-content-between mb-3">
                                            <span class="text-muted">{{ __('Tarif horaire') }}</span>
                                            <span
                                                class="fw-semibold">{{ number_format($product->hourly_rate ?? 0, 2, ',', ' ') }}</span>
                                        </li>
                                    @endif
                                @endif
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Prix d\'achat') }}</span>
                                    <span
                                        class="fw-semibold">{{ number_format($product->purchase_price ?? 0, 2, ',', ' ') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Factures') }}</span>
                                    <span class="fw-semibold">{{ $invoices->count() }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Devis') }}</span>
                                    <span class="fw-semibold">{{ $quotes->count() }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $product->created_at->format('d/m/Y') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted">{{ __('Dernière modification') }}</span>
                                    <span class="fw-semibold">{{ $product->updated_at->format('d/m/Y') }}</span>
                                </li>
                            </ul>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Info -->

                    @if ($product->barcode)
                        <!-- Start Barcode -->
                        <div class="card">
                            <div class="card-body">
                                <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Code-barres') }}</h6>
                                <p class="text-center fs-18 fw-medium font-monospace">{{ $product->barcode }}</p>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <!-- End Barcode -->
                    @endif
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
