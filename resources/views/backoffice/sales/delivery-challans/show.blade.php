<?php $page = 'delivery-challans'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Bon de Livraison')
@section('description', 'Consulter les détails du bon de livraison')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.sales.delivery-challans.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Bons de livraison') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5>{{ __('Bon de livraison') }} — {{ $deliveryChallan->number }}</h5>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('bo.sales.delivery-challans.download', $deliveryChallan) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                                        <a href="{{ route('bo.sales.delivery-challans.edit', $deliveryChallan) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="isax isax-edit me-1"></i>{{ __('Modifier') }}</a>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-4">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Client') }}</label>
                                        <p class="fw-medium mb-0">{{ $deliveryChallan->customer->name ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Date') }}</label>
                                        <p class="fw-medium mb-0">
                                            {{ \Carbon\Carbon::parse($deliveryChallan->challan_date)->format('d/m/Y') }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Référence') }}</label>
                                        <p class="fw-medium mb-0">{{ $deliveryChallan->reference_number ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Facture liée') }}</label>
                                        <p class="fw-medium mb-0">{{ $deliveryChallan->invoice->number ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Statut') }}</label>
                                        <p class="mb-0">
                                            @switch($deliveryChallan->status)
                                                @case('draft')
                                                    <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span>
                                                @break

                                                @case('sent')
                                                    <span class="badge badge-soft-info">{{ __('Envoyé') }}</span>
                                                @break

                                                @case('delivered')
                                                    <span class="badge badge-soft-success">{{ __('Livré') }}</span>
                                                @break
                                            @endswitch
                                        </p>
                                    </div>
                                </div>

                                @if ($deliveryChallan->items && $deliveryChallan->items->count())
                                    <h6 class="mb-3">{{ __('Articles') }}</h6>
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>{{ __('Produit') }}</th>
                                                    <th>{{ __('Quantité') }}</th>
                                                    <th>{{ __('Description') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deliveryChallan->items as $item)
                                                    <tr>
                                                        <td>{{ $item->product->name ?? ($item->description ?? '—') }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->description ?? '—' }}</td>
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
