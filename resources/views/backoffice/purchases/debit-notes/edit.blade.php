<?php $page = 'debit-notes'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.purchases.debit-notes.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Notes de débit</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Modifier la note de débit — {{ $debitNote->number }}</h5>
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
                                <form action="{{ route('bo.purchases.debit-notes.update', $debitNote) }}" method="POST">
                                    @csrf @method('PUT')
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Fournisseur <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('supplier_id') is-invalid @enderror"
                                                    name="supplier_id">
                                                    <option value="">— Sélectionner —</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            {{ old('supplier_id', $debitNote->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                                            {{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('supplier_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control datetimepicker @error('debit_note_date') is-invalid @enderror"
                                                    name="debit_note_date"
                                                    value="{{ old('debit_note_date', $debitNote->debit_note_date instanceof \Carbon\Carbon ? $debitNote->debit_note_date->format('d-m-Y') : $debitNote->debit_note_date) }}">
                                                @error('debit_note_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Statut</label>
                                                <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="draft"
                                                        {{ old('status', $debitNote->status) === 'draft' ? 'selected' : '' }}>
                                                        Brouillon</option>
                                                    <option value="sent"
                                                        {{ old('status', $debitNote->status) === 'sent' ? 'selected' : '' }}>
                                                        Envoyée</option>
                                                    <option value="applied"
                                                        {{ old('status', $debitNote->status) === 'applied' ? 'selected' : '' }}>
                                                        Appliquée</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Référence</label>
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">Saisie manuelle</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_auto" value="auto"
                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">Générer automatiquement</label>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number" id="reference_number"
                                                    value="{{ old('reference_number', $debitNote->reference_number) }}">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Articles --}}
                                    <div class="border-top pt-3 mb-3">
                                        <h6 class="mb-3">Articles</h6>
                                        <div class="mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="enable_tax" name="enable_tax" value="1" checked>
                                                <label class="form-check-label" for="enable_tax">Activer la taxe</label>
                                            </div>
                                        </div>
                                        <div class="table-responsive rounded border-bottom-0 border mb-3">
                                            <table class="table table-nowrap add-table m-0" id="items-table" style="table-layout: fixed; width: 100%;">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th style="width: 28%;">Libellé</th>
                                                        <th style="width: 13%;">Quantité</th>
                                                        <th style="width: 17%;">Prix unitaire</th>
                                                        <th class="tax-col" style="width: 15%;">Taxe (%)</th>
                                                        <th style="width: 17%;">Montant</th>
                                                        <th style="width: 10%;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add-tbody">
                                                    @foreach(old('items', $debitNote->items->toArray()) as $i => $item)
                                                        @php
                                                            $itemTaxGroupId = $item['tax_group_id'] ?? null;
                                                            $itemTaxCategoryId = $item['tax_category_id'] ?? null;
                                                            $selectedTaxValue = '';
                                                            if ($itemTaxGroupId) {
                                                                $selectedTaxValue = $itemTaxGroupId;
                                                            } elseif ($itemTaxCategoryId) {
                                                                $selectedTaxValue = 'cat_' . $itemTaxCategoryId;
                                                            }
                                                        @endphp
                                                        <tr class="item-row">
                                                            <td><input type="text" name="items[{{ $i }}][label]" class="form-control" value="{{ $item['label'] ?? $item['product']['name'] ?? '' }}" placeholder="Libellé" required></td>
                                                            <td><input type="number" name="items[{{ $i }}][quantity]" class="form-control item-qty" value="{{ $item['quantity'] ?? 1 }}" min="0.001" step="0.001" required></td>
                                                            <td><input type="number" name="items[{{ $i }}][unit_price]" class="form-control item-price" value="{{ $item['unit_price'] ?? 0 }}" min="0" step="0.01" required></td>
                                                            <td class="tax-col">
                                                                <select name="items[{{ $i }}][tax_group_id]" class="form-select item-tax">
                                                                    <option value="" data-rate="0" data-type="">0%</option>
                                                                    @if($taxCategories->count())
                                                                    <optgroup label="Taux de taxes">
                                                                        @foreach ($taxCategories as $tc)
                                                                            <option value="cat_{{ $tc->id }}" data-rate="{{ $tc->rate }}" data-type="category"
                                                                                {{ $selectedTaxValue == 'cat_' . $tc->id ? 'selected' : '' }}>
                                                                                {{ $tc->name }} ({{ $tc->rate }}%)
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                    @endif
                                                                    @if($taxGroups->count())
                                                                    <optgroup label="Groupes de taxes">
                                                                        @foreach ($taxGroups as $tg)
                                                                            <option value="{{ $tg->id }}" data-rate="{{ $tg->rates->sum('rate') }}" data-type="group"
                                                                                {{ $selectedTaxValue == $tg->id ? 'selected' : '' }}>
                                                                                {{ $tg->name }} ({{ $tg->rates->sum('rate') }}%)
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                    @endif
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control item-total" value="{{ number_format($item['line_total'] ?? 0, 2, '.', '') }}" readonly></td>
                                                            <td>
                                                                @if($i > 0 || count(old('items', $debitNote->items->toArray())) > 1)
                                                                    <a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center" id="add-item-btn"><i class="isax isax-add-circle5 text-primary me-1"></i>Ajouter un article</a>
                                        </div>
                                    </div>

                                    {{-- Informations supplémentaires --}}
                                    <div class="border-top pt-3 mb-3">
                                        <h6 class="mb-3">Informations supplémentaires</h6>
                                        <div>
                                            <ul class="nav nav-tabs nav-solid-primary mb-3" role="tablist">
                                                <li class="nav-item me-2" role="presentation">
                                                    <a class="nav-link active border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#notes" aria-current="page" href="javascript:void(0);"><i class="isax isax-document-text me-1"></i>Notes</a>
                                                </li>
                                                <li class="nav-item me-2" role="presentation">
                                                    <a class="nav-link border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#terms" href="javascript:void(0);"><i class="isax isax-document me-1"></i>Conditions</a>
                                                </li>
                                                <li class="nav-item me-2" role="presentation">
                                                    <a class="nav-link border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#bank" href="javascript:void(0);"><i class="isax isax-bank me-1"></i>Coordonnées bancaires</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="notes" role="tabpanel">
                                                    <label class="form-label">Notes additionnelles</label>
                                                    <textarea name="notes" class="form-control bg-light" rows="3" readonly>{{ $defaultFooter }}</textarea>
                                                    <small class="text-muted mt-1 d-block"><i class="isax isax-setting-2 me-1"></i>Modifiable depuis <a href="{{ route('bo.settings.invoice.edit') }}">Paramètres de facturation</a></small>
                                                </div>
                                                <div class="tab-pane fade" id="terms" role="tabpanel">
                                                    <label class="form-label">Conditions générales</label>
                                                    <textarea name="terms" class="form-control bg-light" rows="3" readonly>{{ $defaultTerms }}</textarea>
                                                    <small class="text-muted mt-1 d-block"><i class="isax isax-setting-2 me-1"></i>Modifiable depuis <a href="{{ route('bo.settings.invoice.edit') }}">Paramètres de facturation</a></small>
                                                </div>
                                                <div class="tab-pane fade" id="bank" role="tabpanel">
                                                    <label class="form-label">Compte bancaire</label>
                                                    <select class="select" name="bank_account_id">
                                                        <option value="">Sélectionner</option>
                                                        @foreach ($bankAccounts as $ba)
                                                            <option value="{{ $ba->id }}"
                                                                data-balance="{{ number_format($ba->current_balance, 2, ',', ' ') }}"
                                                                data-currency="{{ $ba->currency }}"
                                                                {{ old('bank_account_id', $debitNote->bank_account_id ?? '') == $ba->id ? 'selected' : '' }}>
                                                                {{ $ba->account_holder_name }} - {{ $ba->account_number }} ({{ $ba->bank_name }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-muted bank-balance-info mt-1 d-block" style="display:none;"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.purchases.debit-notes.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
        const taxGroups = @json($taxGroups);
        const taxCategories = @json($taxCategories);

        let taxOpts = '<option value="" data-rate="0" data-type="">0%</option>';
        if (taxCategories.length) {
            taxOpts += '<optgroup label="Taux de taxes">';
            taxCategories.forEach(tc => {
                taxOpts += `<option value="cat_${tc.id}" data-rate="${tc.rate}" data-type="category">${tc.name} (${tc.rate}%)</option>`;
            });
            taxOpts += '</optgroup>';
        }
        if (taxGroups.length) {
            taxOpts += '<optgroup label="Groupes de taxes">';
            taxGroups.forEach(tg => {
                const rate = tg.rates ? tg.rates.reduce((sum, r) => sum + parseFloat(r.rate), 0) : 0;
                taxOpts += `<option value="${tg.id}" data-rate="${rate}" data-type="group">${tg.name} (${rate}%)</option>`;
            });
            taxOpts += '</optgroup>';
        }

        let itemIndex = {{ count(old('items', $debitNote->items->toArray())) }};
        const tbody = document.querySelector('#items-table .add-tbody');
        const addBtn = document.getElementById('add-item-btn');
        const enableTaxCheck = document.getElementById('enable_tax');
        const defaultTaxGroup = taxGroups.length > 0 ? taxGroups[0] : (taxCategories.length > 0 ? taxCategories[0] : null);

        function recalcTotals() {
            const rows = document.querySelectorAll('.item-row');
            rows.forEach(row => {
                const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
                const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
                const taxSelect = row.querySelector('.item-tax');
                let taxRate = 0;
                if (enableTaxCheck.checked && taxSelect && taxSelect.selectedOptions.length) {
                    taxRate = parseFloat(taxSelect.selectedOptions[0].dataset.rate) || 0;
                }
                const subtotal = qty * price;
                const total = subtotal + (subtotal * taxRate / 100);
                const totalField = row.querySelector('.item-total');
                if (totalField) {
                    totalField.value = total.toFixed(2);
                }
            });
        }

        function toggleTax() {
            const enabled = enableTaxCheck.checked;
            document.querySelectorAll('.tax-col').forEach(el => {
                el.style.display = enabled ? '' : 'none';
            });
            if (!enabled) {
                document.querySelectorAll('.item-tax').forEach(sel => { sel.value = ''; });
            }
            if (enabled && defaultTaxGroup) {
                document.querySelectorAll('.item-tax').forEach(sel => {
                    if (!sel.value) {
                        const val = typeof defaultTaxGroup.rate !== 'undefined' ? 'cat_' + defaultTaxGroup.id : defaultTaxGroup.id;
                        sel.value = val;
                    }
                });
            }
            recalcTotals();
        }

        enableTaxCheck.addEventListener('change', toggleTax);

        function bindRowEvents(row) {
            const qtyInput = row.querySelector('.item-qty');
            const priceInput = row.querySelector('.item-price');
            const taxSelect = row.querySelector('.item-tax');
            if (qtyInput) qtyInput.addEventListener('input', recalcTotals);
            if (priceInput) priceInput.addEventListener('input', recalcTotals);
            if (taxSelect) taxSelect.addEventListener('change', recalcTotals);
        }

        // Bind events to existing rows
        document.querySelectorAll('.item-row').forEach(bindRowEvents);

        addBtn.addEventListener('click', function() {
            const row = document.createElement('tr');
            row.className = 'item-row';
            row.innerHTML = `
                <td><input type="text" name="items[${itemIndex}][label]" class="form-control" placeholder="Libellé" required></td>
                <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control item-qty" value="1" min="0.001" step="0.001" required></td>
                <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" value="0" min="0" step="0.01" required></td>
                <td class="tax-col"><select name="items[${itemIndex}][tax_group_id]" class="form-select item-tax">${taxOpts}</select></td>
                <td><input type="text" class="form-control item-total" value="0.00" readonly></td>
                <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
            `;
            tbody.appendChild(row);
            bindRowEvents(row);

            if (enableTaxCheck.checked && defaultTaxGroup) {
                const taxSel = row.querySelector('.item-tax');
                const val = typeof defaultTaxGroup.rate !== 'undefined' ? 'cat_' + defaultTaxGroup.id : defaultTaxGroup.id;
                taxSel.value = val;
            }
            row.querySelectorAll('.tax-col').forEach(el => {
                el.style.display = enableTaxCheck.checked ? '' : 'none';
            });

            recalcTotals();
            itemIndex++;
        });

        tbody.addEventListener('click', function(e) {
            const removeBtn = e.target.closest('.remove-item');
            if (removeBtn) {
                removeBtn.closest('tr').remove();
                recalcTotals();
            }
        });

        // Initial toggle and calculation
        toggleTax();
    });
</script>
@endpush
