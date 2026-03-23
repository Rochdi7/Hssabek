<?php $page = 'goods-receipts'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Modifier le Bon de Réception')
@section('description', 'Modifier les détails du bon de réception')
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
                                <h5 class="mb-3">{{ __('Modifier la réception') }} — {{ $goodsReceipt->number }}</h5>
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

                                <form action="{{ route('bo.purchases.goods-receipts.update', $goodsReceipt) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Bon de commande') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('purchase_order_id') is-invalid @enderror"
                                                    name="purchase_order_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($purchaseOrders as $po)
                                                        <option value="{{ $po->id }}"
                                                            {{ old('purchase_order_id', $goodsReceipt->purchase_order_id) == $po->id ? 'selected' : '' }}>
                                                            {{ $po->number ?? $po->id }} — {{ $po->supplier->name ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('purchase_order_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Entrepôt') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('warehouse_id') is-invalid @enderror"
                                                    name="warehouse_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}"
                                                            {{ old('warehouse_id', $goodsReceipt->warehouse_id) == $warehouse->id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('warehouse_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date de réception') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control datetimepicker @error('received_at') is-invalid @enderror"
                                                    name="received_at"
                                                    value="{{ old('received_at', $goodsReceipt->received_at instanceof \Carbon\Carbon ? $goodsReceipt->received_at->format('d-m-Y') : $goodsReceipt->received_at) }}">
                                                @error('received_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Référence') }}</label>
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">{{ __('Saisie manuelle') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_auto" value="auto"
                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">{{ __('Générer automatiquement') }}</label>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number" id="reference_number"
                                                    value="{{ old('reference_number', $goodsReceipt->reference_number) }}">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Statut') }}</label>
                                                <p class="form-control-plaintext">
                                                    @if($goodsReceipt->status === 'draft')
                                                        <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span>
                                                    @elseif($goodsReceipt->status === 'received')
                                                        <span class="badge badge-soft-success">{{ __('Reçue') }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Notes') }}</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes', $goodsReceipt->notes) }}</textarea>
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Articles --}}
                                    <div class="border-top pt-3 mb-3">
                                        <h6 class="mb-3">{{ __('Articles reçus') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border mb-3">
                                            <table class="table table-nowrap add-table m-0" id="items-table" style="table-layout: fixed; width: 100%;">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th style="width: 50%;">{{ __('Produit') }}<span class="text-danger">*</span></th>
                                                        <th style="width: 35%;">{{ __('Quantité reçue') }}<span class="text-danger">*</span></th>
                                                        <th style="width: 15%;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add-tbody">
                                                    @foreach(old('items', $goodsReceipt->items->toArray()) as $i => $item)
                                                        <tr class="item-row">
                                                            <td>
                                                                <select name="items[{{ $i }}][product_id]" class="form-select" required>
                                                                    <option value="">{{ __('— Produit —') }}</option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}" {{ ($item['product_id'] ?? '') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td><input type="number" name="items[{{ $i }}][quantity]" class="form-control" value="{{ $item['quantity'] ?? 1 }}" min="0.001" step="0.001" required></td>
                                                            <td>
                                                                @if($i > 0 || count(old('items', $goodsReceipt->items->toArray())) > 1)
                                                                    <a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" id="add-item-btn"><i class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter un article') }}</a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.purchases.goods-receipts.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Mettre à jour') }}</button>
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
        let itemIndex = {{ count(old('items', $goodsReceipt->items->toArray())) }};
        const tbody = document.querySelector('#items-table .add-tbody');
        const addBtn = document.getElementById('add-item-btn');
        const productOptions = document.querySelector('[name="items[0][product_id]"]').innerHTML;

        addBtn.addEventListener('click', function() {
            const row = document.createElement('tr');
            row.className = 'item-row';
            row.innerHTML = `
                <td><select name="items[${itemIndex}][product_id]" class="form-select" required>${productOptions}</select></td>
                <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control" value="1" min="0.001" step="0.001" required></td>
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
    });
</script>
@endpush
