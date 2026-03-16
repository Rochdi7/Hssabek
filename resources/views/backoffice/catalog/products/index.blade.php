<?php $page = 'products'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                                       Start Page Content
                                      ========================= -->

    <div class="page-wrapper">
        <!-- Start Container  -->
        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Produits & Services') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'products'])
                    <div>
                        <a href="{{ route('bo.catalog.products.create') }}"
                            class="btn btn-primary d-flex align-items-center"><i
                                class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau') }}</a>
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

            <!-- Start Table Search -->
            <div class="mb-3">

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.catalog.products.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un produit ou service...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if (request('category_id'))
                                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                                @endif
                                @if (request('status'))
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                @endif
                                @if (request('item_type'))
                                    <input type="hidden" name="item_type" value="{{ request('item_type') }}">
                                @endif
                                @if (request('warehouse_id'))
                                    <input type="hidden" name="warehouse_id" value="{{ request('warehouse_id') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-category me-1"></i>{{ __('Type :') }} <span
                                    class="fw-normal ms-1">{{ request('item_type') === 'product' ? __('Produits') : (request('item_type') === 'service' ? __('Services') : __('Tous')) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('item_type', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('page'), ['item_type' => 'product'])) }}"
                                        class="dropdown-item">{{ __('Produits') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('page'), ['item_type' => 'service'])) }}"
                                        class="dropdown-item">{{ __('Services') }}/a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Catégorie :') }} <span
                                    class="fw-normal ms-1">{{ $categories->firstWhere('id', request('category_id'))?->name ?? __('Toutes') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('category_id', 'page'))) }}"
                                        class="dropdown-item">{{ __('Toutes') }}</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('page'), ['category_id' => $category->id])) }}"
                                            class="dropdown-item">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>{{ __('Statut :') }} <span
                                    class="fw-normal ms-1">{{ request('status') === 'active' ? __('Actif') : (request('status') === 'inactive' ? __('Inactif') : __('Tous')) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('status', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('page'), ['status' => 'active'])) }}"
                                        class="dropdown-item">{{ __('Actif') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('page'), ['status' => 'inactive'])) }}"
                                        class="dropdown-item">{{ __('Inactif') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-building-4 me-1"></i>{{ __('Entrepôt :') }} <span
                                    class="fw-normal ms-1">{{ $warehouses->firstWhere('id', request('warehouse_id'))?->name ?? __('Tous') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('warehouse_id', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                @foreach ($warehouses as $wh)
                                    <li>
                                        <a href="{{ route('bo.catalog.products.index', array_merge(request()->except('page'), ['warehouse_id' => $wh->id])) }}"
                                            class="dropdown-item">{{ $wh->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                __('Produit / Service'),
                                __('Type'),
                                __('Catégorie'),
                                __('Unité'),
                                __('Quantité'),
                                __('Prix de vente'),
                                __('Statut'),
                            ],
                        ])
                    </div>
                </div>

            </div>
            <!-- End Table Search -->

            <!-- Start Table List -->
            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>{{ __('Produit / Service') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Catégorie') }}</th>
                            <th>{{ __('Unité') }}</th>
                            <th>{{ __('Quantité') }}</th>
                            <th>{{ __('Prix de vente') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);"
                                            class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            @if ($product->getFirstMediaUrl('product_image'))
                                                <img src="{{ $product->getFirstMediaUrl('product_image') }}"
                                                    class="rounded-circle" alt="{{ $product->name }}">
                                            @else
                                                <span
                                                    class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                    {{ strtoupper(substr($product->name, 0, 1)) }}
                                                </span>
                                            @endif
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a
                                                    href="{{ route('bo.catalog.products.show', $product) }}">{{ $product->name }}</a>
                                            </h6>
                                            <span
                                                class="fs-12 text-muted">{{ $product->code ?? ($product->sku ?? '—') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($product->item_type === 'service')
                                        <span class="badge badge-soft-info d-inline-flex align-items-center">
                                            <i class="isax isax-setting-25 me-1"></i>{{ __('Service') }}</span>
                                    @else
                                        <span class="badge badge-soft-primary d-inline-flex align-items-center">
                                            <i class="isax isax-box-15 me-1"></i>{{ __('Produit') }}</span>
                                    @endif
                                </td>
                                <td>{{ $product->category?->name ?? '—' }}</td>
                                <td class="text-dark">{{ $product->unit?->name ?? '—' }}</td>
                                <td>{{ $product->item_type === 'service' ? '—' : ($product->stocks_sum_quantity_on_hand ?? $product->quantity ?? 0) }}</td>
                                <td class="text-dark">{{ number_format($product->selling_price, 2, ',', ' ') }}</td>
                                <td>
                                    @if ($product->is_active)
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Actif') }}<i class="isax isax-tick-circle ms-1"></i>
                                        </span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Inactif') }}<i class="isax isax-close-circle ms-1"></i>
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($product->item_type === 'product' && $product->track_inventory)
                                        <div class="d-flex align-items-center">
                                            <a href="#"
                                                class="btn btn-sm btn-soft-primary border-0 d-inline-flex align-items-center me-1 fs-12 fw-regular btn-view-history"
                                                data-bs-toggle="modal" data-bs-target="#view_history"
                                                data-history-url="{{ route('bo.catalog.products.stock-history', $product->id) }}"
                                                data-product-name="{{ $product->name }}"
                                                data-product-code="{{ $product->code ?? '' }}"
                                                data-product-quantity="{{ number_format($product->stocks_sum_quantity_on_hand ?? $product->quantity, 2, ',', ' ') }}"
                                                data-product-unit="{{ $product->unit?->abbreviation ?? ($product->unit?->name ?? '—') }}">
                                                <i class="isax isax-document-sketch5 me-1"></i>{{ __('Historique') }}</a>
                                            <a href="#"
                                                class="btn btn-sm btn-soft-success border-0 d-inline-flex align-items-center me-1 fs-12 fw-regular btn-stockin"
                                                data-bs-toggle="modal" data-bs-target="#add_stockin"
                                                data-product-id="{{ $product->id }}"
                                                data-product-name="{{ $product->name }}"
                                                data-product-code="{{ $product->code ?? '' }}"
                                                data-unit="{{ $product->unit?->abbreviation ?? ($product->unit?->name ?? '—') }}"
                                                data-quantity="{{ $product->stocks_sum_quantity_on_hand ?? $product->quantity ?? 0 }}">
                                                <i class="isax isax-document-sketch5 me-1"></i>{{ __('Stock In') }}</a>
                                            <a href="#"
                                                class="btn btn-sm btn-soft-danger border-0 d-inline-flex align-items-center fs-12 fw-regular btn-stockout"
                                                data-bs-toggle="modal" data-bs-target="#add_stockout"
                                                data-product-id="{{ $product->id }}"
                                                data-product-name="{{ $product->name }}"
                                                data-product-code="{{ $product->code ?? '' }}"
                                                data-unit="{{ $product->unit?->abbreviation ?? ($product->unit?->name ?? '—') }}"
                                                data-quantity="{{ $product->stocks_sum_quantity_on_hand ?? $product->quantity ?? 0 }}">
                                                <i class="isax isax-document-sketch5 me-1"></i>{{ __('Stock Out') }}</a>
                                        </div>
                                    @endif
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.catalog.products.show', $product) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.catalog.products.edit', $product) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.catalog.products.destroy', $product) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer') }} {{ $product->item_type === 'service' ? __('ce service') : __('ce produit') }} ?')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">{{ __('Aucun enregistrement trouvé.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $products])

        </div>
        <!-- End Container  -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>
    <!-- ========================
                                   End Page Content
                                  ========================= -->

    <!-- Start View History Modal -->
    <div id="view_history" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Historique du stock') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa-solid fa-x"></i></button>
                </div>
                <div class="modal-body">
                    <div
                        class="bg-light d-flex align-items-center justify-content-between flex-wrap row-gap-3 p-3 rounded mb-3">
                        <div>
                            <h6 class="fs-14 fw-semibold mb-1" id="history-product-name">—</h6>
                            <span class="text-primary" id="history-product-code"></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-end me-3">
                                <span class="text-muted fs-12">{{ __('Stock actuel') }}</span>
                                <h5 class="fw-bold mb-0 text-primary" id="history-current-stock">—</h5>
                            </div>
                            <button type="button" class="btn btn-outline-white me-3"><i
                                    class="isax isax-document-like me-1"></i>{{ __('Télécharger PDF') }}</button>
                            <button type="button" class="btn btn-outline-white"><i
                                    class="isax isax-printer me-1"></i>{{ __('Imprimer') }}</button>
                        </div>
                    </div>
                    <!-- Table List -->
                    <div class="table-responsive border border-bottom-0">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Entrepôt') }}</th>
                                    <th>{{ __('Ajustement') }}</th>
                                    <th>{{ __('Stock entrepôt') }}</th>
                                    <th class="no-sort">{{ __('Raison') }}</th>
                                </tr>
                            </thead>
                            <tbody id="history-table-body">
                                <tr>
                                    <td colspan="5" class="text-center text-muted">{{ __('Chargement...') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /Table List -->
                </div>
            </div>
        </div>
    </div>
    <!-- End View History Modal -->

    <!-- Start Add Stockin Modal -->
    <div id="add_stockin" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Ajouter du stock') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa-solid fa-x"></i></button>
                </div>
                <form id="stockin-form" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Produit') }}</label>
                            <input type="text" class="form-control" id="stockin-product-name" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Code') }}</label>
                                    <input type="text" class="form-control" id="stockin-product-code" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Unité') }}</label>
                                    <input type="text" class="form-control" id="stockin-unit" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Entrepôt') }}<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="warehouse_id" id="stockin-warehouse" required>
                                        <option value="">{{ __('Sélectionner') }}</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}"
                                                {{ $warehouse->is_default ? 'selected' : '' }}>{{ $warehouse->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Stock actuel') }}</label>
                                    <input type="text" class="form-control" id="stockin-current-qty" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Quantité à ajouter') }}<span
                                            class="text-danger ms-1">*</span></label>
                                    <input type="number" step="0.001" min="0.001" class="form-control"
                                        name="quantity" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">{{ __('Notes') }}</label>
                                    <textarea class="form-control" name="note" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter la quantité') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add Stockin Modal -->

    <!-- Start Add Stockout Modal -->
    <div id="add_stockout" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Retirer du stock') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa-solid fa-x"></i></button>
                </div>
                <form id="stockout-form" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Produit') }}</label>
                            <input type="text" class="form-control" id="stockout-product-name" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Code') }}</label>
                                    <input type="text" class="form-control" id="stockout-product-code" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Unité') }}</label>
                                    <input type="text" class="form-control" id="stockout-unit" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Entrepôt') }}<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="warehouse_id" id="stockout-warehouse" required>
                                        <option value="">{{ __('Sélectionner') }}</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}"
                                                {{ $warehouse->is_default ? 'selected' : '' }}>{{ $warehouse->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Stock actuel') }}</label>
                                    <input type="text" class="form-control" id="stockout-current-qty" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Quantité à retirer') }}<span
                                            class="text-danger ms-1">*</span></label>
                                    <input type="number" step="0.001" min="0.001" class="form-control"
                                        name="quantity" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label class="form-label">{{ __('Notes') }}</label>
                                    <textarea class="form-control" name="note" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Retirer la quantité') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add Stockout Modal -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // View History Modal
            document.querySelectorAll('.btn-view-history').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var url = this.dataset.historyUrl;
                    var productName = this.dataset.productName;
                    var productCode = this.dataset.productCode;

                    var productQuantity = this.dataset.productQuantity;
                    var productUnit = this.dataset.productUnit;

                    document.getElementById('history-product-name').textContent = productName;
                    document.getElementById('history-product-code').textContent = productCode;
                    document.getElementById('history-current-stock').textContent = productQuantity + ' ' + productUnit;
                    document.getElementById('history-table-body').innerHTML =
                        '<tr><td colspan="5" class="text-center text-muted">{{ __('Chargement...') }}</td></tr>';

                    fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(data) {
                            // Update current stock from API (real value)
                            if (data.current_stock) {
                                document.getElementById('history-current-stock').textContent = data.current_stock + ' ' + productUnit;
                            }
                            var tbody = document.getElementById('history-table-body');
                            if (data.movements && data.movements.length > 0) {
                                tbody.innerHTML = '';
                                data.movements.forEach(function(m) {
                                    var colorClass = m.is_positive ? 'text-success' :
                                        'text-danger';
                                    tbody.innerHTML += '<tr>' +
                                        '<td><h6 class="fw-medium fs-14">' + m.date +
                                        '</h6></td>' +
                                        '<td class="text-dark">' + m.warehouse + '</td>' +
                                        '<td class="' + colorClass + ' fw-medium">' + m
                                        .adjustment + '</td>' +
                                        '<td>' + m.stock + '</td>' +
                                        '<td class="text-dark">' + m.reason + '</td>' +
                                        '</tr>';
                                });
                            } else {
                                tbody.innerHTML =
                                    '<tr><td colspan="5" class="text-center text-muted">{{ __('Aucun mouvement trouvé.') }}</td></tr>';
                            }
                        })
                        .catch(function() {
                            document.getElementById('history-table-body').innerHTML =
                                '<tr><td colspan="5" class="text-center text-danger">{{ __('Erreur de chargement.') }}</td></tr>';
                        });
                });
            });

            // ─── Shared: fetch warehouse stocks for a product ───
            var baseUrl = "{{ route('bo.catalog.products.index') }}";
            var warehouseStocksCache = {};

            function fetchWarehouseStocks(productId, callback) {
                if (warehouseStocksCache[productId]) {
                    callback(warehouseStocksCache[productId]);
                    return;
                }
                fetch(baseUrl + '/' + productId + '/warehouse-stock')
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        warehouseStocksCache[productId] = data.stocks || {};
                        callback(warehouseStocksCache[productId]);
                    })
                    .catch(function() { callback({}); });
            }

            function updateQtyField(qtyFieldId, stocks, warehouseId) {
                var qty = (warehouseId && stocks[warehouseId] !== undefined)
                    ? stocks[warehouseId]
                    : 0;
                document.getElementById(qtyFieldId).value = qty;
            }

            // ─── Stock In Modal ───
            var currentStockinProductId = null;
            var currentStockinStocks = {};

            document.querySelectorAll('.btn-stockin').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var productId = this.dataset.productId;
                    currentStockinProductId = productId;
                    warehouseStocksCache[productId] = null; // clear cache

                    document.getElementById('stockin-form').action = baseUrl + '/' + productId + '/stock-in';
                    document.getElementById('stockin-product-name').value = this.dataset.productName;
                    document.getElementById('stockin-product-code').value = this.dataset.productCode;
                    document.getElementById('stockin-unit').value = this.dataset.unit;
                    document.getElementById('stockin-current-qty').value = 'Chargement...';

                    fetchWarehouseStocks(productId, function(stocks) {
                        currentStockinStocks = stocks;
                        var selectedWarehouse = document.getElementById('stockin-warehouse').value;
                        updateQtyField('stockin-current-qty', stocks, selectedWarehouse);
                    });
                });
            });

            document.getElementById('stockin-warehouse').addEventListener('change', function() {
                updateQtyField('stockin-current-qty', currentStockinStocks, this.value);
            });

            // ─── Stock Out Modal ───
            var currentStockoutProductId = null;
            var currentStockoutStocks = {};

            document.querySelectorAll('.btn-stockout').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    var productId = this.dataset.productId;
                    currentStockoutProductId = productId;
                    warehouseStocksCache[productId] = null; // clear cache

                    document.getElementById('stockout-form').action = baseUrl + '/' + productId + '/stock-out';
                    document.getElementById('stockout-product-name').value = this.dataset.productName;
                    document.getElementById('stockout-product-code').value = this.dataset.productCode;
                    document.getElementById('stockout-unit').value = this.dataset.unit;
                    document.getElementById('stockout-current-qty').value = 'Chargement...';

                    fetchWarehouseStocks(productId, function(stocks) {
                        currentStockoutStocks = stocks;
                        var selectedWarehouse = document.getElementById('stockout-warehouse').value;
                        updateQtyField('stockout-current-qty', stocks, selectedWarehouse);
                    });
                });
            });

            document.getElementById('stockout-warehouse').addEventListener('change', function() {
                updateQtyField('stockout-current-qty', currentStockoutStocks, this.value);
            });
        });
    </script>
@endpush
