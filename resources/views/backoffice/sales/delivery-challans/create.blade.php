<?php $page = 'add-delivery-challan'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouveau Bon de Livraison')
@section('description', 'Créer un nouveau bon de livraison')
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
                            <h6><a href="{{ route('bo.sales.delivery-challans.index') }}" class="d-flex align-items-center"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Bons de livraison') }}</a></h6>
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
                        <form action="{{ route('bo.sales.delivery-challans.store') }}" method="POST"
                            id="delivery-challan-form">
                            @csrf
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ __('Détails du bon de livraison') }}</h6>
                                    </div>
                                    <div>

                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @include('backoffice.components._number-field', [
                                                                'label'        => 'N° Bon de livraison',
                                                                'fieldName'    => 'number',
                                                                'currentValue' => null,
                                                                'autoValue'    => null,
                                                            ])
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date du bon de livraison') }}</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text" name="challan_date"
                                                                        class="form-control datetimepicker rounded-end @error('challan_date') is-invalid @enderror"
                                                                        value="{{ old('challan_date', date('d-m-Y')) }}"
                                                                        placeholder="{{ now()->format('d M Y') }}">
                                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                                        <i class="isax isax-calendar-2"></i>
                                                                    </span>
                                                                    @error('challan_date')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Facture liée') }}</label>
                                                                <select name="invoice_id"
                                                                    class="select @error('invoice_id') is-invalid @enderror">
                                                                    <option value="">{{ __('Sélectionner une facture') }}</option>
                                                                    @foreach ($invoices as $invoice)
                                                                        <option value="{{ $invoice->id }}"
                                                                            {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}>
                                                                            {{ $invoice->number }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('invoice_id')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                                <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Optionnel. Pour lier ce bon à une facture,') }} <a href="{{ route('bo.sales.invoices.create') }}">{{ __('créez d\'abord une facture') }}</a>.</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-xl-4">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-lg-12">
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
                                                        <div class="col-lg-12">
                                                            <div class="row gx-3">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">{{ __('Statut') }}</label>
                                                                        <select class="select" name="status">
                                                                            <option value="draft"
                                                                                {{ old('status') === 'draft' ? 'selected' : '' }}>
                                                                                {{ __('Brouillon') }}</option>
                                                                            <option value="issued"
                                                                                {{ old('status') === 'issued' ? 'selected' : '' }}>
                                                                                {{ __('Émis') }}</option>
                                                                            <option value="delivered"
                                                                                {{ old('status') === 'delivered' ? 'selected' : '' }}>
                                                                                {{ __('Livré') }}</option>
                                                                        </select>
                                                                        @error('status')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">{{ __('Devise') }}</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $currency }}" readonly disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="p-2 border rounded d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check form-switch me-4">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            role="switch" id="enable_tax"
                                                                            {{ old('enable_tax', '1') == '1' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="enable_tax">{{ __('Activer
                                                                            la taxe') }}</label>
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
                                            </div><!-- end col -->
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
                                                    <h6>{{ __('Expédié par') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Entreprise') }}</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $tenant->name ?? '' }}" readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-6">
                                            <div class="card box-shadow-0">
                                                <div class="card-header border-0 pb-0">
                                                    <h6>{{ __('Livrer à') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <label class="form-label">{{ __('Client') }} <span class="text-danger">*</span></label>
                                                            <a href="{{ route('bo.crm.customers.create') }}"
                                                                class="d-flex align-items-center">
                                                                <i
                                                                    class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter') }}</a>
                                                        </div>
                                                        <div class="mb-3">
                                                            <select name="customer_id"
                                                                class="select @error('customer_id') is-invalid @enderror">
                                                                <option value="">{{ __('Sélectionner un client') }}</option>
                                                                @foreach ($customers as $customer)
                                                                    <option value="{{ $customer->id }}"
                                                                        {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                                        {{ $customer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('customer_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                            @if ($customers->isEmpty())
                                                                <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Aucun client trouvé.') }} <a href="{{ route('bo.crm.customers.create') }}">{{ __('Créer un client') }}</a> {{ __('avant de continuer.') }}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>

                                <div class="items-details">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ __('Articles & Détails') }}</h6>
                                    </div>

                                    <!-- Table List start -->
                                    <div class="table-responsive table-nowrap rounded border-bottom-0 border mb-3">
                                        <table class="table mb-0 add-table" id="items-table" style="min-width: 550px;">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th style="min-width: 180px;">{{ __('Produit/Service') }}</th>
                                                    <th style="min-width: 80px;">{{ __('Quantité') }}</th>
                                                    <th style="min-width: 110px;">{{ __('Prix unitaire') }}</th>
                                                    <th style="min-width: 110px;" class="tax-col">{{ __('Taxe (%)') }}</th>
                                                    <th style="min-width: 110px;">{{ __('Montant') }}</th>
                                                    <th style="min-width: 40px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody">
                                                <tr class="item-row">
                                                    <td>
                                                        <input type="hidden" name="items[0][product_id]"
                                                            class="item-product-id"
                                                            value="{{ old('items.0.product_id') }}">
                                                        <select class="form-select form-select-sm item-product-select w-100" style="margin-bottom:3px;">
                                                            <option value="">— {{ __('Rechercher un produit…') }} —</option>
                                                            @foreach ($products as $p)
                                                                <option value="{{ $p->id }}" {{ old('items.0.product_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="text" name="items[0][label]"
                                                            class="form-control form-control-sm item-label"
                                                            value="{{ old('items.0.label') }}"
                                                            placeholder="{{ __('Nom de l\'article') }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="items[0][quantity]"
                                                            class="form-control item-qty"
                                                            value="{{ old('items.0.quantity', 1) }}" min="0.001"
                                                            step="0.001" required>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="items[0][unit_price]"
                                                            class="form-control item-price"
                                                            value="{{ old('items.0.unit_price', 0) }}" min="0"
                                                            step="0.01">
                                                    </td>
                                                    <td class="tax-col">
                                                        <select name="items[0][tax_group_id]" class="form-select item-tax">
                                                            <option value="" data-rate="0" data-type="">0%</option>
                                                            @if($taxCategories->count())
                                                            <optgroup label="{{ __('Taux de taxes') }}">
                                                                @foreach ($taxCategories as $tc)
                                                                    <option value="cat_{{ $tc->id }}" data-rate="{{ $tc->rate }}" data-type="category">
                                                                        {{ $tc->name }} ({{ $tc->rate }}%)
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                            @endif
                                                            @if($taxGroups->count())
                                                            <optgroup label="{{ __('Groupes de taxes') }}">
                                                                @foreach ($taxGroups as $tg)
                                                                    <option value="{{ $tg->id }}" data-rate="{{ $tg->rates->sum('rate') }}" data-type="group">
                                                                        {{ $tg->name }} ({{ $tg->rates->sum('rate') }}%)
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control item-total"
                                                            value="0,00" readonly>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Table List end -->

                                    <div>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center"
                                            id="add-item-btn"><i
                                                class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter un
                                            article') }}</a>
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
                                                            <label class="form-label">{{ __('Notes
                                                                additionnelles') }}</label>
                                                            <textarea name="notes" class="form-control bg-light" rows="3" readonly>{{ $defaultFooter }}</textarea>
                                                            <small class="text-muted mt-1 d-block"><i
                                                                    class="isax isax-setting-2 me-1"></i>{{ __('Modifiable depuis') }}
                                                                <a href="{{ route('bo.settings.invoice.edit') }}">{{ __('Paramètres de facturation') }}</a></small>
                                                        </div>
                                                        <div class="tab-pane fade" id="terms" role="tabpanel">
                                                            <label class="form-label">{{ __('Conditions
                                                                générales') }}</label>
                                                            <textarea name="terms" class="form-control bg-light" rows="3" readonly>{{ $defaultTerms }}</textarea>
                                                            <small class="text-muted mt-1 d-block"><i
                                                                    class="isax isax-setting-2 me-1"></i>{{ __('Modifiable depuis') }}
                                                                <a href="{{ route('bo.settings.invoice.edit') }}">{{ __('Paramètres de facturation') }}</a></small>
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
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">{{ __('Taxe') }}</p>
                                                        <h6 class="fs-14" id="display-tax">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mt-3 pb-3 border-bottom border-gray">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>Total ({{ $currency }})</h6>
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
                                <a href="{{ route('bo.sales.delivery-challans.index') }}"
                                    class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                            </div><!-- end card footer -->
                        </form>
                    </div><!-- end card -->

                </div><!-- end col -->
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

            /* =========================================================
             * Item row management
             * ========================================================= */
            let itemIndex = 1;
            const tbody = document.querySelector('#items-table .add-tbody');
            const addBtn = document.getElementById('add-item-btn');
            const taxGroups = @json($taxGroups);
            const taxCategories = @json($taxCategories);
            const products = @json($products);

            const enableTaxCheck = document.getElementById('enable_tax');
            const defaultTaxGroup = taxGroups.length > 0 ? taxGroups[0] : (taxCategories.length > 0 ? taxCategories[0] : null);
            const defaultTaxValue = defaultTaxGroup ? (defaultTaxGroup.rates ? String(defaultTaxGroup.id) : 'cat_' + defaultTaxGroup.id) : '';

            function buildProductOptions() {
                let s = '<option value="">— {{ __('Rechercher un produit…') }} —</option>';
                products.forEach(p => s += `<option value="${p.id}">${p.name}</option>`);
                return s;
            }

            /* =========================================================
             * Per-row product select — apply catalogue product to row
             * ========================================================= */
            function applyProductToRow(row, product) {
                row.querySelector('.item-product-id').value = product.id;
                row.querySelector('.item-label').value = product.name;
                row.querySelector('.item-price').value = product.selling_price;
                recalcAll();
            }

            function initRowSelect2(row) {
                $(row).find('.item-product-select').select2({
                    placeholder: '— {{ __('Rechercher un produit…') }} —',
                    allowClear: true,
                    width: '100%',
                    dropdownParent: $(row).find('.item-product-select').parent()
                }).on('change', function() {
                    const pid = $(this).val();
                    if (!pid) return;
                    const product = products.find(p => p.id == pid);
                    if (product) applyProductToRow(row, product);
                    $(this).val(null).trigger('change');
                });
            }

            /* =========================================================
             * Add new item row
             * ========================================================= */
            addBtn.addEventListener('click', function() {
                const productOptions = buildProductOptions();
                let taxOpts = '<option value="" data-rate="0" data-type="">0%</option>';
                if (taxCategories.length) {
                    taxOpts += '<optgroup label="{{ __('Taux de taxes') }}">';
                    taxCategories.forEach(tc => {
                        taxOpts += `<option value="cat_${tc.id}" data-rate="${tc.rate}" data-type="category">${tc.name} (${tc.rate}%)</option>`;
                    });
                    taxOpts += '</optgroup>';
                }
                if (taxGroups.length) {
                    taxOpts += '<optgroup label="{{ __('Groupes de taxes') }}">';
                    taxGroups.forEach(tg => {
                        const rate = tg.rates ? tg.rates.reduce((sum, r) => sum + parseFloat(r.rate), 0) : 0;
                        taxOpts += `<option value="${tg.id}" data-rate="${rate}" data-type="group">${tg.name} (${rate}%)</option>`;
                    });
                    taxOpts += '</optgroup>';
                }

                const row = document.createElement('tr');
                row.className = 'item-row';
                row.innerHTML = `
                    <td>
                        <input type="hidden" name="items[${itemIndex}][product_id]" class="item-product-id" value="">
                        <select class="form-select form-select-sm item-product-select w-100" style="margin-bottom:3px;">${productOptions}</select>
                        <input type="text" name="items[${itemIndex}][label]" class="form-control form-control-sm item-label" placeholder="{{ __('Nom de l\'article') }}">
                    </td>
                    <td>
                        <input type="number" name="items[${itemIndex}][quantity]" class="form-control item-qty" value="1" min="0.001" step="0.001" required>
                    </td>
                    <td>
                        <input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" value="0" min="0" step="0.01">
                    </td>
                    <td class="tax-col">
                        <select name="items[${itemIndex}][tax_group_id]" class="form-select item-tax">${taxOpts}</select>
                    </td>
                    <td>
                        <input type="text" class="form-control item-total" value="0,00" readonly>
                    </td>
                    <td>
                        <div>
                            <a href="javascript:void(0);" class="text-danger remove-table"><i class="isax isax-close-circle"></i></a>
                        </div>
                    </td>
                `;
                tbody.appendChild(row);
                itemIndex++;
                initRowSelect2(row);
                if (enableTaxCheck.checked && defaultTaxValue) {
                    row.querySelector('.item-tax').value = defaultTaxValue;
                }
                row.querySelectorAll('.tax-col').forEach(el => {
                    el.style.display = enableTaxCheck.checked ? '' : 'none';
                });
                recalcAll();
            });

            /* =========================================================
             * Remove item row
             * ========================================================= */
            tbody.addEventListener('click', function(e) {
                const removeBtn = e.target.closest('.remove-table');
                if (removeBtn) {
                    removeBtn.closest('tr').remove();
                    recalcAll();
                }
            });

            // Init select2 on initial row(s)
            document.querySelectorAll('.item-row').forEach(row => initRowSelect2(row));

            /* =========================================================
             * Live calculation
             * ========================================================= */
            tbody.addEventListener('input', function(e) {
                if (e.target.classList.contains('item-qty') ||
                    e.target.classList.contains('item-price')) {
                    recalcAll();
                }
            });

            tbody.addEventListener('change', function(e) {
                if (e.target.classList.contains('item-tax')) {
                    recalcAll();
                }
            });

            function recalcAll() {
                let subtotal = 0;
                let taxTotal = 0;

                document.querySelectorAll('#items-table .item-row').forEach(function(row) {
                    const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
                    const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
                    const taxEnabled = enableTaxCheck.checked;
                    const taxRate = taxEnabled ? (parseFloat(row.querySelector('.item-tax')?.selectedOptions[0]?.dataset.rate) || 0) : 0;

                    const lineSubtotal = qty * price;
                    const lineTax = lineSubtotal * (taxRate / 100);
                    const lineTotal = lineSubtotal + lineTax;

                    subtotal += lineSubtotal;
                    taxTotal += lineTax;

                    const totalInput = row.querySelector('.item-total');
                    if (totalInput) {
                        totalInput.value = lineTotal.toFixed(2).replace('.', ',');
                    }
                });

                const displaySubtotal = document.getElementById('display-subtotal');
                const displayTax = document.getElementById('display-tax');
                const displayTotal = document.getElementById('display-total');

                if (displaySubtotal) displaySubtotal.textContent = subtotal.toFixed(2).replace('.', ',');
                if (displayTax) displayTax.textContent = taxTotal.toFixed(2).replace('.', ',');
                if (displayTotal) displayTotal.textContent = (subtotal + taxTotal).toFixed(2).replace('.',
                    ',');
            }

            /* =========================================================
             * Tax toggle — show/hide tax column & auto-select default
             * ========================================================= */
            const taxTotalRow = document.getElementById('tax-total-row');

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
                if (enabled && defaultTaxValue) {
                    document.querySelectorAll('.item-tax').forEach(sel => {
                        if (!sel.value) {
                            sel.value = defaultTaxValue;
                        }
                    });
                }
                recalcAll();
            }

            enableTaxCheck.addEventListener('change', toggleTax);
            toggleTax();

            // Initial calculation
            recalcAll();
        });
    </script>
@endpush
