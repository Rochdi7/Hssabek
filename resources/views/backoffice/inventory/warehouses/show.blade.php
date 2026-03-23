<?php $page = 'warehouses'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', "Détails de l'Entrepôt")
@section('description', "Consulter les détails de l'entrepôt")
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
                    <h6><a href="{{ route('bo.inventory.warehouses.index') }}"><i class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Entrepôts') }}</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('bo.inventory.warehouses.edit', $warehouse) }}" class="btn btn-primary d-flex align-items-center fs-14 fw-semibold">
                        <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}
                    </a>
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

                    <!-- Start Warehouse Info -->
                    <div class="card bg-light customer-details-info position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="avatar avatar-xxl rounded-circle flex-shrink-0">
                                        <span class="avatar avatar-xxl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center border border-white border-2 fs-24 fw-bold">
                                            <i class="isax isax-building-4"></i>
                                        </span>
                                    </div>
                                    <div class="">
                                        <p class="text-primary fs-14 fw-medium mb-1">
                                            {{ $warehouse->code ?? __('Sans code') }}
                                        </p>
                                        <h6 class="mb-2"> {{ $warehouse->name }}
                                            @if($warehouse->is_active)
                                                <span class="badge badge-soft-success ms-1">{{ __('Actif') }}</span>
                                            @else
                                                <span class="badge badge-soft-danger ms-1">{{ __('Inactif') }}</span>
                                            @endif
                                        </h6>
                                        @if($warehouse->address)
                                            <p class="fs-14 fw-regular"><i class="isax isax-location fs-14 me-1 text-gray-9"></i>
                                                {{ $warehouse->address }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('bo.inventory.warehouses.edit', $warehouse) }}"
                                    class="btn btn-outline-white border border-1 border-grey border-sm bg-white"><i
                                        class="isax isax-edit-2 fs-13 fw-semibold text-dark me-1"></i> {{ __('Modifier') }} </a>
                            </div>

                            <div class="card border-0 shadow shadow-none mb-0 bg-white">
                                <div class="card-body border-0 shadow shadow-none">
                                    <ul
                                        class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-0 m-0 list-unstyled">
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-box-1 fs-14 me-2"></i>{{ __('Produits en stock') }}</h6>
                                            <p> {{ $warehouse->productStocks->count() }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-tick-circle fs-14 me-2"></i>{{ __('Par défaut') }}</h6>
                                            <p> {{ $warehouse->is_default ? __('Oui') : __('Non') }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-calendar-1 fs-14 me-2"></i>{{ __('Créé le') }}</h6>
                                            <p> {{ $warehouse->created_at->format('d/m/Y') }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <img src="{{ URL::asset('build/img/icons/elements-01.svg') }}" alt="elements-01"
                            class="img-fluid customer-details-bg">
                    </div><!-- end card -->
                    <!-- End Warehouse Info -->

                    <!-- Start Stock Levels -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Niveaux de stock') }}</h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('Produit') }}</th>
                                            <th>{{ __('Quantité en stock') }}</th>
                                            <th>{{ __('Quantité réservée') }}</th>
                                            <th>{{ __('Seuil de réapprovisionnement') }}</th>
                                            <th class="no-sort">{{ __('État') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($warehouse->productStocks as $stock)
                                            <tr>
                                                <td>
                                                    <h6 class="fs-14 fw-medium mb-0">{{ $stock->product->name ?? '—' }}</h6>
                                                    <span class="fs-12 text-muted">{{ $stock->product->code ?? '' }}</span>
                                                </td>
                                                <td>{{ number_format($stock->quantity_on_hand, 2, ',', ' ') }}</td>
                                                <td>{{ number_format($stock->quantity_reserved, 2, ',', ' ') }}</td>
                                                <td>{{ $stock->reorder_point ? number_format($stock->reorder_point, 2, ',', ' ') : '—' }}</td>
                                                <td>
                                                    @if($stock->reorder_point && $stock->quantity_on_hand <= $stock->reorder_point)
                                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Stock bas') }}</span>
                                                    @else
                                                        <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('OK') }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucun stock dans cet entrepôt.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Stock Levels -->

                </div><!-- end col -->
                <div class="col-xl-4">
                    <!-- Start Recent Movements -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Mouvements récents') }}</h6>
                            @forelse($warehouse->stockMovements->take(10) as $movement)
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div>
                                        <h6 class="fs-13 fw-medium mb-1">{{ $movement->product->name ?? '—' }}</h6>
                                        <span class="fs-12 text-muted">{{ $movement->moved_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div>
                                        @if(str_contains($movement->movement_type, 'in'))
                                            <span class="badge badge-soft-success">+{{ number_format($movement->quantity, 2, ',', ' ') }}</span>
                                        @else
                                            <span class="badge badge-soft-danger">-{{ number_format($movement->quantity, 2, ',', ' ') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted mb-0">{{ __('Aucun mouvement récent.') }}</p>
                            @endforelse
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Recent Movements -->

                    <!-- Start Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Informations') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Produits en stock') }}</span>
                                    <span class="fw-semibold">{{ $warehouse->productStocks->count() }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Par défaut') }}</span>
                                    <span class="fw-semibold">{{ $warehouse->is_default ? __('Oui') : __('Non') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $warehouse->created_at->format('d/m/Y') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted">{{ __('Dernière modification') }}</span>
                                    <span class="fw-semibold">{{ $warehouse->updated_at->format('d/m/Y') }}</span>
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
