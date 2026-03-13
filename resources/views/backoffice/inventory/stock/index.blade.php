<?php $page = 'stock-levels'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                  Start Page Content
                 ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Niveaux de stock') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'products'])
                </div>
            </div>
            <!-- End Breadcrumb -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.inventory.stock.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un produit...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if (request('warehouse_id'))
                                    <input type="hidden" name="warehouse_id" value="{{ request('warehouse_id') }}">
                                @endif
                                @if (request('low_stock'))
                                    <input type="hidden" name="low_stock" value="{{ request('low_stock') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <!-- Warehouse Filter -->
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-building-4 me-1"></i>{{ __('Entrepôt :') }} <span
                                    class="fw-normal ms-1">{{ request('warehouse_id') ? $warehouses->firstWhere('id', request('warehouse_id'))?->name ?? 'Tous' : 'Tous' }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.inventory.stock.index', array_merge(request()->except('warehouse_id', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                @foreach ($warehouses as $warehouse)
                                    <li>
                                        <a href="{{ route('bo.inventory.stock.index', array_merge(request()->except('page'), ['warehouse_id' => $warehouse->id])) }}"
                                            class="dropdown-item">{{ $warehouse->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Low Stock Filter -->
                        <div>
                            @if (request('low_stock'))
                                <a href="{{ route('bo.inventory.stock.index', request()->except('low_stock', 'page')) }}"
                                    class="btn btn-danger d-inline-flex align-items-center">
                                    <i class="isax isax-warning-2 me-1"></i>Stock bas (actif)
                                </a>
                            @else
                                <a href="{{ route('bo.inventory.stock.index', array_merge(request()->except('page'), ['low_stock' => 1])) }}"
                                    class="btn btn-outline-white d-inline-flex align-items-center">
                                    <i class="isax isax-warning-2 me-1"></i>Stock bas
                                </a>
                            @endif
                        </div>
                        <!-- Sort -->
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>{{ __('Trier par :') }} <span class="fw-normal ms-1">{{ __('Récent') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">{{ __('Récent') }}</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">{{ __('Ancien') }}</a>
                                </li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                __('Produit'),
                                __('Code'),
                                __('Entrepôt'),
                                __('Quantité en stock'),
                                __('Quantité réservée'),
                                __('Seuil de réappro.'),
                                __('État'),
                            ],
                        ])
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List Start -->
            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="no-sort">{{ __('Produit') }}</th>
                            <th class="no-sort">{{ __('Code') }}</th>
                            <th class="no-sort">{{ __('Entrepôt') }}</th>
                            <th>{{ __('Quantité en stock') }}</th>
                            <th>{{ __('Quantité réservée') }}</th>
                            <th>{{ __('Seuil de réappro.') }}</th>
                            <th class="no-sort">{{ __('État') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a
                                                    href="javascript:void(0);">{{ $stock->product->name ?? '—' }}</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);"
                                        class="link-default">{{ $stock->product->code ?? '—' }}</a>
                                </td>
                                <td class="text-dark">{{ $stock->warehouse->name ?? '—' }}</td>
                                <td>
                                    <span
                                        class="fw-semibold">{{ number_format($stock->quantity_on_hand, 2, ',', ' ') }}</span>
                                </td>
                                <td>{{ number_format($stock->quantity_reserved, 2, ',', ' ') }}</td>
                                <td>{{ $stock->reorder_point ? number_format($stock->reorder_point, 2, ',', ' ') : '—' }}
                                </td>
                                <td>
                                    @if ($stock->reorder_point && $stock->quantity_on_hand <= $stock->reorder_point)
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Stock bas') }} <i
                                                class="isax isax-warning-2 ms-1"></i></span>
                                    @else
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">OK <i
                                                class="isax isax-tick-circle ms-1"></i></span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

            @include('backoffice.components.table-footer', ['paginator' => $stocks])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
                  End Page Content
                 ========================= -->
@endsection
