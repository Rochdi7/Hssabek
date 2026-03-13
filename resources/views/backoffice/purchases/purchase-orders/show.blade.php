<?php $page = 'purchase-orders'; ?>
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
                    <h6><a href="{{ route('bo.purchases.purchase-orders.index') }}"><i class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Bons de commande') }}</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('bo.purchases.purchase-orders.download', $purchaseOrder) }}" target="_blank" class="btn btn-outline-white d-flex align-items-center fs-14 fw-semibold">
                        <i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                    @if(in_array($purchaseOrder->status, ['draft', 'sent', 'confirmed', 'partially_received']))
                        <form method="POST" action="{{ route('bo.purchases.purchase-orders.receive', $purchaseOrder) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success d-flex align-items-center fs-14 fw-semibold"
                                onclick="return confirm('{{ __('Confirmer la réception de toutes les marchandises ?') }}')">
                                <i class="isax isax-tick-circle me-1"></i>{{ __('Réceptionner') }}</button>
                        </form>
                    @endif
                    @if(in_array($purchaseOrder->status, ['draft', 'sent', 'confirmed']))
                        <form method="POST" action="{{ route('bo.purchases.purchase-orders.cancel', $purchaseOrder) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger d-flex align-items-center fs-14 fw-semibold"
                                onclick="return confirm('{{ __('Êtes-vous sûr de vouloir annuler ce bon de commande ?') }}')">
                                <i class="isax isax-close-circle me-1"></i>{{ __('Annuler') }}</button>
                        </form>
                    @endif
                    @if($purchaseOrder->status === 'draft')
                        <a href="{{ route('bo.purchases.purchase-orders.edit', $purchaseOrder) }}" class="btn btn-primary d-flex align-items-center fs-14 fw-semibold">
                            <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}</a>
                    @endif
                    <form method="POST" action="{{ route('bo.purchases.purchase-orders.destroy', $purchaseOrder) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger d-flex align-items-center fs-14 fw-semibold"
                            onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce bon de commande ?') }}')">
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

                    <!-- PO Header Info -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div>
                                    <h5 class="mb-1">{{ $purchaseOrder->number }}</h5>
                                    <p class="text-muted mb-0">
                                        @switch($purchaseOrder->status)
                                            @case('draft') <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span> @break
                                            @case('sent') <span class="badge badge-soft-info">{{ __('Envoyé') }}</span> @break
                                            @case('confirmed') <span class="badge badge-soft-primary">{{ __('Confirmé') }}</span> @break
                                            @case('partially_received') <span class="badge badge-soft-warning">{{ __('Partiellement reçu') }}</span> @break
                                            @case('received') <span class="badge badge-soft-success">{{ __('Reçu') }}</span> @break
                                            @case('cancelled') <span class="badge badge-soft-danger">{{ __('Annulé') }}</span> @break
                                        @endswitch
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded border">
                                        <h6 class="fs-14 mb-2">{{ __('Fournisseur') }}</h6>
                                        <p class="mb-1 fw-semibold">{{ $purchaseOrder->supplier->name }}</p>
                                        <p class="mb-0 text-muted">{{ $purchaseOrder->supplier->email ?? '' }}</p>
                                        <p class="mb-0 text-muted">{{ $purchaseOrder->supplier->phone ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled m-0 p-0">
                                        <li class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">{{ __('Date de commande') }}</span>
                                            <span class="fw-semibold">{{ $purchaseOrder->order_date->format('d/m/Y') }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">{{ __('Livraison prévue') }}</span>
                                            <span class="fw-semibold">{{ $purchaseOrder->expected_date?->format('d/m/Y') ?? '—' }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">{{ __('Devise') }}</span>
                                            <span class="fw-semibold">{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</span>
                                        </li>
                                        @if($purchaseOrder->reference_number)
                                            <li class="d-flex justify-content-between mb-2">
                                                <span class="text-muted">{{ __('Référence') }}</span>
                                                <span class="fw-semibold">{{ $purchaseOrder->reference_number }}</span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PO Items -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Articles') }}</h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Libellé') }}</th>
                                            <th>{{ __('Quantité') }}</th>
                                            <th>{{ __('Coût unitaire') }}</th>
                                            <th>{{ __('Taxe') }}</th>
                                            <th>{{ __('Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchaseOrder->items as $item)
                                            <tr>
                                                <td>{{ $item->position }}</td>
                                                <td>
                                                    <span class="fw-medium">{{ $item->label }}</span>
                                                    @if($item->product)
                                                        <br><small class="text-muted">{{ $item->product->name }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ number_format($item->quantity, 3, ',', ' ') }}</td>
                                                <td>{{ number_format($item->unit_cost, 2, ',', ' ') }}</td>
                                                <td>{{ number_format($item->tax_rate, 2) }}%</td>
                                                <td class="fw-medium">{{ number_format($item->line_total, 2, ',', ' ') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if($purchaseOrder->notes)
                        <div class="card">
                            <div class="card-body">
                                <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Notes') }}</h6>
                                <p>{{ $purchaseOrder->notes }}</p>
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
                                    <span class="fw-semibold">{{ number_format($purchaseOrder->subtotal, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</span>
                                </li>
                                @if($purchaseOrder->discount_total > 0)
                                    <li class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-muted">{{ __('Remise') }}</span>
                                        <span class="fw-semibold text-danger">-{{ number_format($purchaseOrder->discount_total, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</span>
                                    </li>
                                @endif
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Taxes') }}</span>
                                    <span class="fw-semibold">{{ number_format($purchaseOrder->tax_total, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between pt-3 border-top">
                                    <span class="fw-bold">{{ __('Total') }}</span>
                                    <span class="fw-bold fs-16">{{ number_format($purchaseOrder->total, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Goods Receipts -->
                    @if($purchaseOrder->goodsReceipts->isNotEmpty())
                        <div class="card">
                            <div class="card-body">
                                <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Réceptions') }}</h6>
                                <ul class="list-unstyled m-0 p-0">
                                    @foreach($purchaseOrder->goodsReceipts as $receipt)
                                        <li class="d-flex align-items-center justify-content-between mb-2">
                                            <span>{{ $receipt->number }}</span>
                                            <span class="text-muted">{{ $receipt->received_at?->format('d/m/Y') ?? '—' }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Informations') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $purchaseOrder->created_at->format('d/m/Y H:i') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted">{{ __('Dernière modification') }}</span>
                                    <span class="fw-semibold">{{ $purchaseOrder->updated_at->format('d/m/Y H:i') }}</span>
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
