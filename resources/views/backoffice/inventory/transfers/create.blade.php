<?php $page = 'stock-transfers'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.inventory.transfers.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Transferts de stock') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Nouveau transfert de stock') }}</h5>

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form action="{{ route('bo.inventory.transfers.store') }}" method="POST" id="transfer-form">
                                    @csrf

                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Entrepôts') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Entrepôt source') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('from_warehouse_id') is-invalid @enderror" name="from_warehouse_id" id="from_warehouse_id">
                                                    <option value="">{{ __('Sélectionner l\'entrepôt source') }}</option>
                                                    @foreach($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}" {{ old('from_warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }} {{ $warehouse->code ? '(' . $warehouse->code . ')' : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('from_warehouse_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                @if($warehouses->isEmpty())
                                                    <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Aucun entrepôt trouvé.') }} <a href="{{ route('bo.inventory.warehouses.create') }}">{{ __('Créer un entrepôt') }}</a> {{ __('avant de continuer.') }}</small>
                                                @elseif($warehouses->count() < 2)
                                                    <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Un transfert nécessite au moins 2 entrepôts.') }} <a href="{{ route('bo.inventory.warehouses.create') }}">{{ __('Créer un entrepôt') }}</a></small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Entrepôt destination') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('to_warehouse_id') is-invalid @enderror" name="to_warehouse_id">
                                                    <option value="">{{ __('Sélectionner l\'entrepôt destination') }}</option>
                                                    @foreach($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}" {{ old('to_warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }} {{ $warehouse->code ? '(' . $warehouse->code . ')' : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('to_warehouse_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Notes') }}</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="2" placeholder="{{ __('Notes supplémentaires...') }}">{{ old('notes') }}</textarea>
                                                @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Items Section -->
                                    <div class="mb-3 mt-2">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Produits à transférer') }}</h6>
                                    </div>

                                    <div class="table-responsive mb-3">
                                        <table class="table border" id="items-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 40%">{{ __('Produit') }} <span class="text-danger">*</span></th>
                                                    <th style="width: 20%">{{ __('Stock disponible') }}</th>
                                                    <th style="width: 25%">{{ __('Quantité') }} <span class="text-danger">*</span></th>
                                                    <th style="width: 15%" class="text-end"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="items-body">
                                                @if(old('items'))
                                                    @foreach(old('items') as $i => $item)
                                                        <tr class="item-row">
                                                            <td>
                                                                <select class="form-select form-select-sm product-select @error('items.'.$i.'.product_id') is-invalid @enderror" name="items[{{ $i }}][product_id]">
                                                                    <option value="">{{ __('Sélectionner') }}</option>
                                                                    @foreach($products as $product)
                                                                        <option value="{{ $product->id }}" {{ ($item['product_id'] ?? '') == $product->id ? 'selected' : '' }}>
                                                                            {{ $product->name }} {{ $product->code ? '(' . $product->code . ')' : '' }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('items.'.$i.'.product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                            </td>
                                                            <td>
                                                                <span class="stock-badge text-muted">—</span>
                                                            </td>
                                                            <td>
                                                                <input type="number" step="0.001" min="0.001" class="form-control form-control-sm @error('items.'.$i.'.quantity') is-invalid @enderror" name="items[{{ $i }}][quantity]" value="{{ $item['quantity'] ?? '' }}" placeholder="0.000">
                                                                @error('items.'.$i.'.quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                            </td>
                                                            <td class="text-end">
                                                                <button type="button" class="btn btn-sm btn-outline-danger remove-item"><i class="isax isax-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="item-row">
                                                        <td>
                                                            <select class="form-select form-select-sm product-select" name="items[0][product_id]">
                                                                <option value="">{{ __('Sélectionner') }}</option>
                                                                @foreach($products as $product)
                                                                    <option value="{{ $product->id }}">{{ $product->name }} {{ $product->code ? '(' . $product->code . ')' : '' }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span class="stock-badge text-muted">—</span>
                                                        </td>
                                                        <td>
                                                            <input type="number" step="0.001" min="0.001" class="form-control form-control-sm" name="items[0][quantity]" placeholder="0.000">
                                                        </td>
                                                        <td class="text-end">
                                                            <button type="button" class="btn btn-sm btn-outline-danger remove-item"><i class="isax isax-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        @error('items')<div class="text-danger fs-12 mb-2">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-4">
                                        <button type="button" class="btn btn-outline-primary btn-sm" id="add-item">
                                            <i class="isax isax-add-circle me-1"></i>Ajouter un produit
                                        </button>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.inventory.transfers.index') }}" class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Créer le transfert') }}</button>
                                    </div>
                                </form>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Stock map from server: { warehouseId: { productId: qty } }
        const stockMap = @json($stockMap ?? []);
        let itemIndex = document.querySelectorAll('.item-row').length;

        function getStock(warehouseId, productId) {
            if (!warehouseId || !productId || !stockMap[warehouseId]) return 0;
            return parseFloat(stockMap[warehouseId][productId] || 0);
        }

        function updateStockBadge(row) {
            const warehouseId = document.getElementById('from_warehouse_id').value;
            const productId = row.querySelector('.product-select').value;
            const badge = row.querySelector('.stock-badge');

            if (!warehouseId || !productId) {
                badge.textContent = '—';
                badge.className = 'stock-badge text-muted';
                return;
            }

            const qty = getStock(warehouseId, productId);
            badge.textContent = qty.toFixed(3);
            badge.className = qty > 0
                ? 'stock-badge badge badge-soft-success'
                : 'stock-badge badge badge-soft-danger';
        }

        function updateAllStockBadges() {
            document.querySelectorAll('.item-row').forEach(updateStockBadge);
        }

        // Update all badges when source warehouse changes
        document.getElementById('from_warehouse_id').addEventListener('change', updateAllStockBadges);

        // Update badge when product changes
        document.getElementById('items-body').addEventListener('change', function(e) {
            if (e.target.classList.contains('product-select')) {
                updateStockBadge(e.target.closest('.item-row'));
            }
        });

        // Add item
        document.getElementById('add-item').addEventListener('click', function() {
            const tbody = document.getElementById('items-body');
            const productOptions = tbody.querySelector('select[name^="items"]').innerHTML;
            const row = document.createElement('tr');
            row.className = 'item-row';
            row.innerHTML = `
                <td>
                    <select class="form-select form-select-sm product-select" name="items[${itemIndex}][product_id]">
                        ${productOptions}
                    </select>
                </td>
                <td>
                    <span class="stock-badge text-muted">—</span>
                </td>
                <td>
                    <input type="number" step="0.001" min="0.001" class="form-control form-control-sm" name="items[${itemIndex}][quantity]" placeholder="0.000">
                </td>
                <td class="text-end">
                    <button type="button" class="btn btn-sm btn-outline-danger remove-item"><i class="isax isax-trash"></i></button>
                </td>
            `;
            tbody.appendChild(row);
            row.querySelector('select').selectedIndex = 0;
            itemIndex++;
        });

        // Remove item
        document.addEventListener('click', function(e) {
            if (e.target.closest('.remove-item')) {
                const rows = document.querySelectorAll('.item-row');
                if (rows.length > 1) {
                    e.target.closest('.item-row').remove();
                }
            }
        });

        // Initial update on page load
        updateAllStockBadges();
    });
</script>
@endpush
