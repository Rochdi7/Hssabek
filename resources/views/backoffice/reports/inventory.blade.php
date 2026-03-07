<?php $page = 'inventory-report'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- Based on inventory-report.blade.php layout -->

    <div class="page-wrapper">

        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6 class="mb-0">Rapport d'inventaire</h6>
                </div>
                <div class="my-xl-auto">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="isax isax-export-1 me-1"></i>Exporter
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form method="POST" action="{{ route('bo.reports.inventory.export') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Télécharger en CSV</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- start row -->
            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div>
                                    <p class="mb-1">Valeur totale</p>
                                    <h6 class="fs-16 fw-semibold mb-0">{{ number_format($totalValue, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-primary rounded">
                                        <i class="isax isax-dollar-circle fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">
                                <span class="text-muted">Inventaire actif</span>
                            </p>
                            <span class="position-absolute start-0 top-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-12.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div>
                                    <p class="mb-1">Stock faible</p>
                                    <h6 class="fs-16 fw-semibold mb-0">{{ $lowStockCount }} produits</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-success rounded">
                                        <i class="isax isax-bag-2 fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">
                                <span class="text-warning">Sous le seuil de réapprovisionnement</span>
                            </p>
                            <span class="position-absolute start-0 top-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-11.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div>
                                    <p class="mb-1">Rupture de stock</p>
                                    <h6 class="fs-16 fw-semibold mb-0">{{ $outOfStockCount }} produits</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-warning rounded">
                                        <i class="isax isax-bag-timer fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">
                                <span class="text-danger">Quantité à zéro</span>
                            </p>
                            <span class="position-absolute start-0 top-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-10.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div>
                                    <p class="mb-1">À réapprovisionner</p>
                                    <h6 class="fs-16 fw-semibold mb-0">{{ $pendingReorders }} produits</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-info rounded">
                                        <i class="isax isax-timer fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">
                                <span class="text-info">Commandes nécessaires</span>
                            </p>
                            <span class="position-absolute start-0 top-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-09.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Low Stock Alert -->
            @if($lowStockItems->count() > 0)
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="mb-0">Alertes stock faible</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Entrepôt</th>
                                    <th>Quantité</th>
                                    <th>Seuil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowStockItems as $item)
                                <tr>
                                    <td>{{ $item->product?->name ?? '-' }} ({{ $item->product?->sku ?? $item->product?->code ?? '-' }})</td>
                                    <td>{{ $item->warehouse?->name ?? '-' }}</td>
                                    <td class="{{ $item->quantity_on_hand <= 0 ? 'text-danger fw-semibold' : 'text-warning' }}">{{ number_format($item->quantity_on_hand, 0) }}</td>
                                    <td>{{ number_format($item->reorder_point, 0) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            <!-- Product Table -->
            <div class="table-responsive">
                <table class="table table-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>Code</th>
                            <th>Produit</th>
                            <th>Catégorie</th>
                            <th>Unité</th>
                            <th class="no-sort">Quantité</th>
                            <th class="no-sort">Prix de vente</th>
                            <th class="no-sort">Prix d'achat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="text-default">{{ $product->code ?? $product->sku }}</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $product->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->category?->name ?? '-' }}</td>
                                <td class="text-dark">{{ $product->unit?->short_name ?? $product->unit?->name ?? '-' }}</td>
                                <td>{{ number_format($product->quantity, 0) }}</td>
                                <td class="text-dark">{{ number_format($product->selling_price, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td class="text-dark">{{ number_format($product->purchase_price, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Aucun produit trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($products->hasPages())
                <div class="mt-3">
                    {{ $products->links() }}
                </div>
            @endif

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
