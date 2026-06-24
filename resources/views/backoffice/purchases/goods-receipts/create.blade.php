<?php $page = 'goods-receipts'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouveau Bon de Réception')
@section('description', 'Créer un nouveau bon de réception')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.purchases.goods-receipts.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Réceptions de marchandises') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Nouvelle réception de marchandises') }}</h5>
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form action="{{ route('bo.purchases.goods-receipts.store') }}" method="POST">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Bon de commande') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('purchase_order_id') is-invalid @enderror"
                                                    name="purchase_order_id" id="purchase_order_id"
                                                    data-lines-url="{{ route('bo.purchases.goods-receipts.po-lines', ['purchaseOrder' => '__POID__']) }}">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($purchaseOrders as $po)
                                                        <option value="{{ $po->id }}"
                                                            {{ old('purchase_order_id', optional($selectedPurchaseOrder ?? null)->id) == $po->id ? 'selected' : '' }}>
                                                            {{ $po->number ?? $po->id }} — {{ $po->supplier->name ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('purchase_order_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Optionnel. Pour lier à un bon de commande,') }} <a href="{{ route('bo.purchases.purchase-orders.create') }}">{{ __('créez-en un d\'abord') }}</a>.</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Entrepôt') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('warehouse_id') is-invalid @enderror"
                                                    name="warehouse_id" id="warehouse_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}"
                                                            {{ old('warehouse_id', optional($selectedPurchaseOrder ?? null)->warehouse_id) == $warehouse->id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('warehouse_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                @if ($warehouses->isEmpty())
                                                    <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Aucun entrepôt trouvé.') }}<a href="{{ route('bo.inventory.warehouses.create') }}">{{ __('Créer un entrepôt') }}</a> avant de continuer.</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date de réception') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control datetimepicker @error('received_at') is-invalid @enderror"
                                                    name="received_at" value="{{ old('received_at', date('d-m-Y')) }}">
                                                @error('received_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Notes') }}</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes') }}</textarea>
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Articles --}}
                                    <div class="border-top pt-3 mb-3">
                                        <h6 class="mb-3">{{ __('Articles reçus') }}</h6>

                                        {{-- All-received notice (shown when a PO has no remaining quantities) --}}
                                        <div id="all-received-notice" class="alert alert-info d-none" role="alert">
                                            <i class="isax isax-info-circle me-1"></i>{{ __('Toutes les lignes de ce bon de commande ont déjà été reçues.') }}
                                        </div>

                                        {{-- No-product-lines notice (PO made only of free-text label lines) --}}
                                        <div id="no-product-lines-notice" class="alert alert-warning d-none" role="alert">
                                            <i class="isax isax-info-circle me-1"></i>{{ __('Ce bon de commande ne contient aucun produit du catalogue à réceptionner.') }}
                                        </div>

                                        {{-- PO-linked lines (ordered / received / remaining / to receive) --}}
                                        <div id="po-lines-wrap" class="d-none">
                                            <div class="table-responsive rounded border-bottom-0 border mb-3">
                                                <table class="table table-nowrap m-0" id="po-lines-table" style="min-width: 600px;">
                                                    <thead style="background-color: #1B2850; color: #fff;">
                                                        <tr>
                                                            <th style="min-width: 200px;">{{ __('Produit') }}</th>
                                                            <th class="text-end" style="min-width: 100px;">{{ __('Commandé') }}</th>
                                                            <th class="text-end" style="min-width: 100px;">{{ __('Déjà reçu') }}</th>
                                                            <th class="text-end" style="min-width: 100px;">{{ __('Restant') }}</th>
                                                            <th style="min-width: 140px;">{{ __('Quantité à recevoir') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="po-lines-body"></tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- Manual lines (no PO selected) --}}
                                        <div id="manual-lines-wrap">
                                            <div class="table-responsive rounded border-bottom-0 border mb-3">
                                                <table class="table table-nowrap add-table m-0" id="items-table" style="min-width: 400px;">
                                                    <thead style="background-color: #1B2850; color: #fff;">
                                                        <tr>
                                                            <th style="min-width: 200px;">{{ __('Produit') }}<span class="text-danger">*</span></th>
                                                            <th style="min-width: 120px;">{{ __('Quantité reçue') }}<span class="text-danger">*</span></th>
                                                            <th style="min-width: 40px;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="add-tbody">
                                                        <tr class="item-row">
                                                            <td>
                                                                <select name="items[0][product_id]" class="form-select">
                                                                    <option value="">{{ __('— Produit —') }}</option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}" {{ old('items.0.product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td><input type="number" name="items[0][quantity]" class="form-control" value="{{ old('items.0.quantity', 1) }}" min="0.001" step="0.001"></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center" id="add-item-btn"><i class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter un article') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.purchases.goods-receipts.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary" id="submit-btn">{{ __('Enregistrer') }}</button>
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
        // ---- Manual line management (used when no PO is selected) ----
        let itemIndex = 1;
        const tbody = document.querySelector('#items-table .add-tbody');
        const addBtn = document.getElementById('add-item-btn');
        const productOptions = document.querySelector('[name="items[0][product_id]"]').innerHTML;

        addBtn.addEventListener('click', function() {
            const row = document.createElement('tr');
            row.className = 'item-row';
            row.innerHTML = `
                <td><select name="items[${itemIndex}][product_id]" class="form-select">${productOptions}</select></td>
                <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control" value="1" min="0.001" step="0.001"></td>
                <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
            `;
            tbody.appendChild(row);
            itemIndex++;
        });

        tbody.addEventListener('click', function(e) {
            const removeBtn = e.target.closest('.remove-item');
            if (removeBtn) {
                removeBtn.closest('tr').remove();
            }
        });

        // ---- PO line loading (ordered / received / remaining) ----
        const poSelect = document.getElementById('purchase_order_id');
        const linesUrl = poSelect.dataset.linesUrl;
        const poWrap = document.getElementById('po-lines-wrap');
        const poBody = document.getElementById('po-lines-body');
        const manualWrap = document.getElementById('manual-lines-wrap');
        const allReceivedNotice = document.getElementById('all-received-notice');
        const noProductLinesNotice = document.getElementById('no-product-lines-notice');
        const warehouseSelect = document.getElementById('warehouse_id');
        const submitBtn = document.getElementById('submit-btn');

        const fmt = (n) => Number(n).toLocaleString('fr-FR', { maximumFractionDigits: 3 });

        function hideNotices() {
            allReceivedNotice.classList.add('d-none');
            noProductLinesNotice.classList.add('d-none');
        }

        function showManual() {
            manualWrap.classList.remove('d-none');
            poWrap.classList.add('d-none');
            hideNotices();
            poBody.innerHTML = '';
            // Re-enable manual product selects so they submit.
            manualWrap.querySelectorAll('select, input').forEach(el => el.disabled = false);
            submitBtn.disabled = false;
        }

        function showPoLines(data) {
            const lines = data.lines || [];

            // Disable manual block so its inputs do not collide with PO lines.
            manualWrap.classList.add('d-none');
            manualWrap.querySelectorAll('select, input').forEach(el => el.disabled = true);
            poWrap.classList.remove('d-none');
            hideNotices();

            // PO has no catalog-product lines at all — nothing can be received.
            if (data.has_product_lines === false) {
                poBody.innerHTML = '';
                poWrap.classList.add('d-none');
                noProductLinesNotice.classList.remove('d-none');
                submitBtn.disabled = true;
                return;
            }

            const remainingLines = lines.filter(l => l.remaining > 0.0001);

            if (remainingLines.length === 0) {
                poBody.innerHTML = '';
                poWrap.classList.add('d-none');
                allReceivedNotice.classList.remove('d-none');
                submitBtn.disabled = true;
                return;
            }

            submitBtn.disabled = false;

            poBody.innerHTML = remainingLines.map((l, i) => `
                <tr>
                    <td>
                        ${l.product_name ?? ''}
                        <input type="hidden" name="items[${i}][product_id]" value="${l.product_id}">
                        <input type="hidden" name="items[${i}][purchase_order_item_id]" value="${l.purchase_order_item_id}">
                        <input type="hidden" name="items[${i}][unit_cost]" value="${l.unit_cost}">
                        <input type="hidden" name="items[${i}][tax_rate]" value="${l.tax_rate}">
                    </td>
                    <td class="text-end">${fmt(l.ordered)}</td>
                    <td class="text-end">${fmt(l.received)}</td>
                    <td class="text-end fw-medium">${fmt(l.remaining)}</td>
                    <td>
                        <input type="number" name="items[${i}][quantity]" class="form-control po-qty"
                            value="${l.remaining}"
                            min="0.001" step="0.001" max="${l.remaining}" data-remaining="${l.remaining}">
                    </td>
                </tr>
            `).join('');
        }

        function loadPoLines(poId) {
            const url = linesUrl.replace('__POID__', encodeURIComponent(poId));
            fetch(url, { headers: { 'Accept': 'application/json' } })
                .then(r => {
                    if (!r.ok) throw new Error('lines request failed');
                    return r.json();
                })
                .then(data => {
                    if (data.warehouse_id && warehouseSelect) {
                        warehouseSelect.value = data.warehouse_id;
                    }
                    showPoLines(data);
                })
                .catch(() => showManual());
        }

        poSelect.addEventListener('change', function() {
            if (this.value) {
                loadPoLines(this.value);
            } else {
                showManual();
            }
        });

        // Clamp "to receive" to remaining quantity on input.
        poBody.addEventListener('input', function(e) {
            const input = e.target.closest('.po-qty');
            if (!input) return;
            const remaining = parseFloat(input.dataset.remaining);
            if (parseFloat(input.value) > remaining) {
                input.value = remaining;
            }
        });

        // Auto-load lines if a PO is pre-selected on page load.
        if (poSelect.value) {
            loadPoLines(poSelect.value);
        }
    });
</script>
@endpush
