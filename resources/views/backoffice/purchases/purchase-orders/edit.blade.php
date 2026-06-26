<?php $page = 'edit-purchases'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Modifier le Bon de Commande')
@section('description', 'Modifier les détails du bon de commande')
@section('content')
    <!-- ========================
                        Start Page Content
                    ========================= -->

    @php
        $tenant = App\Services\Tenancy\TenantContext::get();
    @endphp

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row -->
            <div class="row">
                <div class="col-md-11 mx-auto">

                    <!-- Start Breadcrumb -->
                    <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                        <div>
                            <h6><a href="{{ route('bo.purchases.purchase-orders.index') }}"
                                    class="d-flex align-items-center"><i class="isax isax-arrow-left me-2"></i>{{ __('Bons de commande') }}</a></h6>
                        </div>
                        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                            <div class="me-1">
                                <a href="{{ route('bo.purchases.purchase-orders.show', $purchaseOrder) }}"
                                    class="btn btn-outline-white d-inline-flex align-items-center">
                                    <i class="isax isax-eye me-1"></i>{{ __('Aperçu') }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Breadcrumb -->

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

                    <div class="card">
                        <form action="{{ route('bo.purchases.purchase-orders.update', $purchaseOrder) }}" method="POST"
                            id="poForm">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ __('Modifier le bon de commande') }} — {{ $purchaseOrder->number }}</h6>
                                    </div>
                                    <div>
                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @include('backoffice.components._number-field', [
                                                                'label'        => 'N° Bon de commande',
                                                                'fieldName'    => 'number',
                                                                'currentValue' => $purchaseOrder->number,
                                                                'autoValue'    => null,
                                                            ])
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Fournisseur') }}<span
                                                                        class="text-danger">*</span></label>
                                                                <select name="supplier_id"
                                                                    class="select @error('supplier_id') is-invalid @enderror"
                                                                    required>
                                                                    <option value="">{{ __('Sélectionner un fournisseur') }}
                                                                    </option>
                                                                    @foreach ($suppliers as $supplier)
                                                                        <option value="{{ $supplier->id }}"
                                                                            {{ old('supplier_id', $purchaseOrder->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                                                            {{ $supplier->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('supplier_id')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="reference_number"
                                                            value="{{ old('reference_number', $purchaseOrder->reference_number) }}">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date de commande') }}<span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker rounded-end @error('order_date') is-invalid @enderror"
                                                                        name="order_date"
                                                                        value="{{ old('order_date', $purchaseOrder->order_date->format('d-m-Y')) }}"
                                                                        required>
                                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                                        <i class="isax isax-calendar-2"></i>
                                                                    </span>
                                                                    @error('order_date')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date de livraison prévue') }}</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker rounded-end @error('expected_date') is-invalid @enderror"
                                                                        name="expected_date"
                                                                        value="{{ old('expected_date', $purchaseOrder->expected_date?->format('d-m-Y')) }}">
                                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                                        <i class="isax isax-calendar-2"></i>
                                                                    </span>
                                                                    @error('expected_date')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-xl-4">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <div class="logo-image">
                                                                    @if ($tenant && $tenant->invoice_image_url)
                                                                        <img src="{{ $tenant->invoice_image_url }}"
                                                                            class="img-fluid" alt="Logo"
                                                                            style="max-height: 60px;">
                                                                    @else
                                                                        <img src="{{ $tenant->logo_url }}"
                                                                            class="img-fluid" alt="Logo entreprise"
                                                                            style="max-height: 60px;">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Devise') }}</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $currency }}" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="p-2 border rounded d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check form-switch me-4">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            role="switch" id="enable_tax" checked>
                                                                        <label class="form-check-label"
                                                                            for="enable_tax">{{ __('Activer la taxe') }}</label>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);"><span
                                                                            class="bg-primary-subtle p-1 rounded"><i
                                                                                class="isax isax-setting-2 text-primary"></i></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>

                                <div class="bill-content pb-0">

                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card box-shadow-0">
                                                <div class="card-header border-0 pb-0">
                                                    <h6>{{ __('Commandé par') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Entreprise') }}</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $tenant->name ?? '' }}" readonly disabled>
                                                    </div>
                                                    <div class="p-3 bg-light rounded border text-center">
                                                        <img src="{{ $tenant->logo_url ?? URL::asset('assets/images/logo/favicon.svg') }}"
                                                            alt="image" class="img-fluid" style="max-height: 100px; width: auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-6">
                                            <div class="card box-shadow-0">
                                                <div class="card-header border-0 pb-0">
                                                    <h6>{{ __('Fournisseur') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div id="bill-to-info" class="p-3 bg-light rounded border text-muted">
                                                        <p class="mb-0">{{ __('Informations du fournisseur sélectionné') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Entrepôt') }}<span class="text-danger">*</span></label>
                                                <select name="warehouse_id"
                                                    class="form-select @error('warehouse_id') is-invalid @enderror" required>
                                                    @foreach ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}"
                                                            {{ old('warehouse_id', $purchaseOrder->warehouse_id) == $warehouse->id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }}{{ $warehouse->code ? ' (' . $warehouse->code . ')' : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('warehouse_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="items-details">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ __('Articles & Détails') }}</h6>
                                    </div>

                                    <!-- Table List Start -->
                                    <div class="table-responsive rounded border-bottom-0 border mb-3">
                                        <table class="table table-nowrap add-table mb-0" id="items-table" style="min-width: 550px;">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th style="min-width: 180px;">{{ __('Produit / Libellé') }}</th>
                                                    <th style="min-width: 80px;">{{ __('Quantité') }}</th>
                                                    <th style="min-width: 110px;">{{ __('Coût unitaire') }}</th>
                                                    <th class="tax-col" style="min-width: 110px;">{{ __('Taxe (%)') }}</th>
                                                    <th style="min-width: 110px;">{{ __('Total ligne') }}</th>
                                                    <th style="min-width: 40px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody" id="items-body">
                                                @foreach ($purchaseOrder->items as $idx => $item)
                                                    <tr class="item-row">
                                                        <td>
                                                            <select class="form-select form-select-sm mb-1 item-product-select"
                                                                name="items[{{ $idx }}][product_id]">
                                                                <option value="">{{ __('-- Produit (optionnel) --') }}</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}"
                                                                        data-name="{{ $product->name }}"
                                                                        data-cost="{{ $product->purchase_price ?? 0 }}"
                                                                        {{ old("items.{$idx}.product_id", $item->product_id) == $product->id ? 'selected' : '' }}>
                                                                        {{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="text" class="form-control item-label"
                                                                name="items[{{ $idx }}][label]"
                                                                value="{{ old("items.{$idx}.label", $item->label) }}"
                                                                required
                                                                @if(old("items.{$idx}.product_id", $item->product_id)) readonly @endif>
                                                        </td>
                                                        <td><input type="number" class="form-control item-qty"
                                                                name="items[{{ $idx }}][quantity]"
                                                                value="{{ old("items.{$idx}.quantity", $item->quantity) }}"
                                                                min="0.001" step="0.001" required
                                                               ></td>
                                                        <td><input type="number" class="form-control item-cost"
                                                                name="items[{{ $idx }}][unit_cost]"
                                                                value="{{ old("items.{$idx}.unit_cost", $item->unit_cost) }}"
                                                                min="0" step="0.01" required
                                                               ></td>
                                                        <td class="tax-col">
                                                            <select name="items[{{ $idx }}][tax_group_id]" class="form-select item-tax">
                                                                <option value="" data-rate="0" data-type="">0%</option>
                                                                @if($taxCategories->count())
                                                                <optgroup label="{{ __('Taux de taxes') }}">
                                                                    @foreach ($taxCategories as $tc)
                                                                        <option value="cat_{{ $tc->id }}" data-rate="{{ $tc->rate }}" data-type="category"
                                                                            {{ old("items.{$idx}.tax_group_id", $item->tax_group_id) == 'cat_'.$tc->id ? 'selected' : '' }}>
                                                                            {{ $tc->name }} ({{ $tc->rate }}%)
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                                @endif
                                                                @if($taxGroups->count())
                                                                <optgroup label="{{ __('Groupes de taxes') }}">
                                                                    @foreach ($taxGroups as $tg)
                                                                        <option value="{{ $tg->id }}" data-rate="{{ $tg->rates->sum('rate') }}" data-type="group"
                                                                            {{ old("items.{$idx}.tax_group_id", $item->tax_group_id) == $tg->id ? 'selected' : '' }}>
                                                                            {{ $tg->name }} ({{ $tg->rates->sum('rate') }}%)
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td><span class="item-total fw-medium">0,00</span></td>
                                                        <td>
                                                            @if ($idx > 0)
                                                                <a href="javascript:void(0);"
                                                                    class="text-danger remove-item"><i
                                                                        class="isax isax-close-circle"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Table List End -->

                                    <div>
                                        <a href="javascript:void(0);"
                                            class="d-inline-flex align-items-center"
                                            id="add-item-btn"><i
                                                class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter un article') }}</a>
                                    </div>
                                </div>

                                <div class="extra-info">
                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <h6 class="mb-3">{{ __('Informations supplémentaires') }}</h6>
                                                <div>
                                                    <ul class="nav nav-tabs nav-solid-primary mb-3" role="tablist">
                                                        <li class="nav-item me-2" role="presentation">
                                                            <a class="nav-link active border fs-12 fw-semibold rounded"
                                                                data-bs-toggle="tab" data-bs-target="#notes"
                                                                aria-current="page" href="javascript:void(0);"><i
                                                                    class="isax isax-document-text me-1"></i>{{ __('Notes') }}</a>
                                                        </li>
                                                        <li class="nav-item me-2" role="presentation">
                                                            <a class="nav-link border fs-12 fw-semibold rounded"
                                                                data-bs-toggle="tab" data-bs-target="#terms"
                                                                href="javascript:void(0);"><i
                                                                    class="isax isax-document me-1"></i>{{ __('Conditions') }}</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active show" id="notes" role="tabpanel">
                                                            <label class="form-label">{{ __('Notes supplémentaires') }}</label>
                                                            <textarea class="form-control bg-light" name="notes" rows="3" readonly>{{ $defaultFooter }}</textarea>
                                                            <small class="text-muted mt-1 d-block"><i class="isax isax-setting-2 me-1"></i>{{ __('Modifiable depuis') }} <a href="{{ route('bo.settings.invoice.edit') }}">{{ __('Paramètres de facturation') }}</a></small>
                                                        </div>
                                                        <div class="tab-pane fade" id="terms" role="tabpanel">
                                                            <label class="form-label">{{ __('Conditions générales') }}</label>
                                                            <textarea class="form-control bg-light" name="terms" rows="3" readonly>{{ $defaultTerms }}</textarea>
                                                            <small class="text-muted mt-1 d-block"><i class="isax isax-setting-2 me-1"></i>{{ __('Modifiable depuis') }} <a href="{{ route('bo.settings.invoice.edit') }}">{{ __('Paramètres de facturation') }}</a></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-5">
                                            <ul class="mb-0 ps-0 list-unstyled">
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">{{ __('Sous-total') }}</p>
                                                        <h6 class="fs-14" id="display-subtotal">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3" id="tax-total-row">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">{{ __('Taxes') }}</p>
                                                        <h6 class="fs-14" id="display-tax">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mt-3 pb-3 border-bottom border-gray">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>{{ __('Total') }} ({{ $currency }})</h6>
                                                        <h6 id="display-total">0,00</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div><!-- end card body -->

                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="{{ route('bo.purchases.purchase-orders.show', $purchaseOrder) }}"
                                    class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                            </div><!-- end card footer -->
                        </form>
                    </div><!-- end card -->
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let itemIndex = {{ $purchaseOrder->items->count() }};
            const productsJson = @json($products);
            const taxCategories = @json($taxCategories);
            const taxGroups = @json($taxGroups);
            const enableTaxCheck = document.getElementById('enable_tax');
            const taxTotalRow = document.getElementById('tax-total-row');
            const defaultTaxGroup = null;

            // Build tax select options
            function buildTaxOptions() {
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
                return taxOpts;
            }

            document.getElementById('add-item-btn').addEventListener('click', function() {
                let productOptions = '<option value="">{{ __('-- Produit (optionnel) --') }}</option>';
                productsJson.forEach(p => {
                    productOptions += `<option value="${p.id}" data-name="${p.name}" data-cost="${p.purchase_price ?? 0}">${p.name}</option>`;
                });

                const taxOpts = buildTaxOptions();
                const row = document.createElement('tr');
                row.classList.add('item-row');
                row.innerHTML = `
            <td>
                <select class="form-select form-select-sm mb-1 item-product-select" name="items[${itemIndex}][product_id]">${productOptions}</select>
                <input type="text" class="form-control item-label" name="items[${itemIndex}][label]" placeholder="{{ __('Libellé de l\'article') }}" required>
            </td>
            <td><input type="number" class="form-control item-qty" name="items[${itemIndex}][quantity]" value="1" min="0.001" step="0.001" required></td>
            <td><input type="number" class="form-control item-cost" name="items[${itemIndex}][unit_cost]" value="0" min="0" step="0.01" required></td>
            <td class="tax-col"><select name="items[${itemIndex}][tax_group_id]" class="form-select item-tax">${taxOpts}</select></td>
            <td><span class="item-total fw-medium">0,00</span></td>
            <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
        `;
                document.getElementById('items-body').appendChild(row);
                itemIndex++;
                if (enableTaxCheck.checked && defaultTaxGroup) {
                    row.querySelector('.item-tax').value = defaultTaxGroup.id;
                }
                row.querySelectorAll('.tax-col').forEach(el => {
                    el.style.display = enableTaxCheck.checked ? '' : 'none';
                });
                recalc();
            });

            document.getElementById('items-body').addEventListener('click', function(e) {
                if (e.target.closest('.remove-item')) {
                    e.target.closest('.item-row').remove();
                    recalc();
                }
            });

            document.getElementById('items-body').addEventListener('input', function() {
                recalc();
            });

            document.getElementById('items-body').addEventListener('change', function(e) {
                const sel = e.target.closest('.item-product-select');
                if (sel) applyProductToRow(sel.closest('.item-row'));
                recalc();
            });

            /* =========================================================
             * Tax toggle — show/hide tax column & auto-select default
             * ========================================================= */
            function toggleTax() {
                const enabled = enableTaxCheck.checked;
                document.querySelectorAll('.tax-col').forEach(el => {
                    el.style.display = enabled ? '' : 'none';
                });
                if (taxTotalRow) taxTotalRow.style.display = enabled ? '' : 'none';
                if (!enabled) {
                    document.querySelectorAll('.item-tax').forEach(sel => {
                        sel.value = '';
                    });
                }
                if (enabled && defaultTaxGroup) {
                    document.querySelectorAll('.item-tax').forEach(sel => {
                        if (!sel.value) {
                            sel.value = defaultTaxGroup.id;
                        }
                    });
                }
                recalc();
            }

            enableTaxCheck.addEventListener('change', toggleTax);
            toggleTax();

            function recalc() {
                let subtotal = 0,
                    taxTotal = 0;
                document.querySelectorAll('.item-row').forEach(row => {
                    const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
                    const cost = parseFloat(row.querySelector('.item-cost')?.value) || 0;
                    const taxEnabled = enableTaxCheck.checked;
                    const taxSel = row.querySelector('.item-tax');
                    const taxRate = taxEnabled ? (parseFloat(taxSel?.options[taxSel.selectedIndex]?.dataset.rate) || 0) : 0;
                    const lineSub = qty * cost;
                    const lineTax = lineSub * taxRate / 100;
                    const lineTotal = lineSub + lineTax;
                    subtotal += lineSub;
                    taxTotal += lineTax;
                    const totalEl = row.querySelector('.item-total');
                    if (totalEl) totalEl.textContent = fmt(lineTotal);
                });
                document.getElementById('display-subtotal').textContent = fmt(subtotal);
                document.getElementById('display-tax').textContent = fmt(taxTotal);
                document.getElementById('display-total').textContent = fmt(subtotal + taxTotal);
            }

            function fmt(n) {
                return n.toFixed(2).replace('.', ',');
            }

            recalc();

            // Auto-fill label + cost when a product is selected; clear readonly when deselected.
            function applyProductToRow(row) {
                const sel = row.querySelector('.item-product-select');
                const labelInput = row.querySelector('.item-label');
                const costInput = row.querySelector('.item-cost');
                const opt = sel.options[sel.selectedIndex];
                if (sel.value && opt) {
                    labelInput.value = opt.dataset.name || '';
                    labelInput.setAttribute('readonly', 'readonly');
                    labelInput.classList.add('bg-light');
                    if (costInput && (!costInput.value || parseFloat(costInput.value) === 0)) {
                        costInput.value = opt.dataset.cost || 0;
                    }
                } else {
                    labelInput.removeAttribute('readonly');
                    labelInput.classList.remove('bg-light');
                }
                recalc();
            }

            // Apply to existing rows on load (product already selected).
            document.querySelectorAll('.item-row').forEach(row => {
                const sel = row.querySelector('.item-product-select');
                if (sel && sel.value) {
                    const labelInput = row.querySelector('.item-label');
                    if (labelInput) {
                        labelInput.setAttribute('readonly', 'readonly');
                        labelInput.classList.add('bg-light');
                    }
                }
            });
        });
    </script>
@endpush
