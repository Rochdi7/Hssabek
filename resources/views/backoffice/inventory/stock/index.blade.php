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
                    <h6>Niveaux de stock</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-1">
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="isax isax-export-1 me-1"></i>Exporter
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">Télécharger en PDF</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Télécharger en Excel</a>
                            </li>
                        </ul>
                    </div>
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
                                    placeholder="Rechercher un produit..." value="{{ request('search') }}">
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
                                <i class="isax isax-building-4 me-1"></i>Entrepôt : <span
                                    class="fw-normal ms-1">{{ request('warehouse_id') ? $warehouses->firstWhere('id', request('warehouse_id'))?->name ?? 'Tous' : 'Tous' }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.inventory.stock.index', array_merge(request()->except('warehouse_id', 'page'))) }}"
                                        class="dropdown-item">Tous</a>
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
                                <i class="isax isax-sort me-1"></i>Trier par : <span class="fw-normal ms-1">Récent</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Récent</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Ancien</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Column Toggle -->
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <i class="isax isax-grid-3 me-1"></i>Colonnes
                            </a>
                            <ul class="dropdown-menu dropdown-menu">
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Produit</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Code</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Entrepôt</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Quantité en stock</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Quantité réservée</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>Seuil de réappro.</span>
                                    </label>
                                </li>
                                <li>
                                    <label class="dropdown-item d-flex align-items-center form-switch">
                                        <i class="fa-solid fa-grip-vertical me-3 text-default"></i>
                                        <input class="form-check-input m-0 me-2" type="checkbox" checked>
                                        <span>État</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List Start -->
            <div class="table-responsive">
                <table class="table table-nowrap datatable">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="no-sort">Produit</th>
                            <th class="no-sort">Code</th>
                            <th class="no-sort">Entrepôt</th>
                            <th>Quantité en stock</th>
                            <th>Quantité réservée</th>
                            <th>Seuil de réappro.</th>
                            <th class="no-sort">État</th>
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
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Stock bas <i
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

            {{ $stocks->links() }}

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
              End Page Content
             ========================= -->
@endsection
