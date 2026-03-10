<?php $page = 'delivery-challans'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
            Start Page Content
        ========================= -->

    @php
        $tenant = App\Services\Tenancy\TenantContext::get();
        $currency = $tenant->default_currency ?? 'MAD';
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
                                        class="isax isax-arrow-left me-2"></i>Bons de livraison</a></h6>
                        </div>
                        <div class="right-content">
                            <a href="{{ route('bo.sales.delivery-challans.show', $deliveryChallan) }}"
                                class="btn btn-outline-white d-inline-flex align-items-center"><i
                                    class="isax isax-eye me-1"></i>Aperçu</a>
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
                        <form action="{{ route('bo.sales.delivery-challans.update', $deliveryChallan) }}"
                            method="POST" id="delivery-challan-form">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>Modifier le bon de livraison</h6>
                                    </div>
                                    <div>

                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">N° Bon de livraison</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $deliveryChallan->number }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
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
                                                                <input type="text" name="reference_number"
                                                                    id="reference_number"
                                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                                    value="{{ old('reference_number', $deliveryChallan->reference_number) }}"
                                                                    placeholder="Ex: BLI-00001">
                                                                @error('reference_number')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date du bon de livraison</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="date" name="challan_date"
                                                                        class="form-control rounded-end @error('challan_date') is-invalid @enderror"
                                                                        value="{{ old('challan_date', $deliveryChallan->challan_date instanceof \Carbon\Carbon ? $deliveryChallan->challan_date->format('Y-m-d') : $deliveryChallan->challan_date) }}">
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
                                                                <label class="form-label">Facture liée</label>
                                                                <select name="invoice_id"
                                                                    class="select @error('invoice_id') is-invalid @enderror">
                                                                    <option value="">Sélectionner une facture</option>
                                                                    @foreach ($invoices as $invoice)
                                                                        <option value="{{ $invoice->id }}"
                                                                            {{ old('invoice_id', $deliveryChallan->invoice_id) == $invoice->id ? 'selected' : '' }}>
                                                                            {{ $invoice->number }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('invoice_id')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
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
                                                                        <img src="{{ URL::asset('build/img/invoice-logo.svg') }}"
                                                                            class="invoice-logo-dark" alt="img">
                                                                        <img src="{{ URL::asset('build/img/invoice-logo-white-2.svg') }}"
                                                                            class="invoice-logo-white" alt="img">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="row gx-3">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Statut</label>
                                                                        <select class="select" name="status">
                                                                            <option value="draft"
                                                                                {{ old('status', $deliveryChallan->status) === 'draft' ? 'selected' : '' }}>
                                                                                Brouillon</option>
                                                                            <option value="sent"
                                                                                {{ old('status', $deliveryChallan->status) === 'sent' ? 'selected' : '' }}>
                                                                                Envoyé</option>
                                                                            <option value="delivered"
                                                                                {{ old('status', $deliveryChallan->status) === 'delivered' ? 'selected' : '' }}>
                                                                                Livré</option>
                                                                        </select>
                                                                        @error('status')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Devise</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $currency }}"
                                                                            readonly disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="p-2 border rounded d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check form-switch me-4">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            role="switch" id="enabe_tax"
                                                                            {{ old('enable_tax', '1') == '1' ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="enabe_tax">Activer
                                                                            la taxe</label>
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
                                                    <h6>Expédié par</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Entreprise</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $tenant->name ?? '' }}" readonly disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-6">
                                            <div class="card box-shadow-0">
                                                <div class="card-header border-0 pb-0">
                                                    <h6>Livrer à</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <label class="form-label">Client <span
                                                                    class="text-danger">*</span></label>
                                                            <a href="{{ route('bo.crm.customers.create') }}"
                                                                class="d-flex align-items-center">
                                                                <i
                                                                    class="isax isax-add-circle5 text-primary me-1"></i>Ajouter
                                                            </a>
                                                        </div>
                                                        <div class="mb-3">
                                                            <select name="customer_id"
                                                                class="select @error('customer_id') is-invalid @enderror">
                                                                <option value="">Sélectionner un client</option>
                                                                @foreach ($customers as $customer)
                                                                    <option value="{{ $customer->id }}"
                                                                        {{ old('customer_id', $deliveryChallan->customer_id) == $customer->id ? 'selected' : '' }}>
                                                                        {{ $customer->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('customer_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
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
                                        <h6>Articles & Détails</h6>
                                    </div>

                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <h6 class="fs-14 mb-1">Type d'article</h6>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="item_type_filter" id="Radio-sm-3"
                                                            value="product" checked>
                                                        <label class="form-check-label" for="Radio-sm-3">
                                                            Produit
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="item_type_filter" id="Radio-sm-4"
                                                            value="service">
                                                        <label class="form-check-label" for="Radio-sm-4">
                                                            Service
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Produits/Services</label>
                                                <select class="select" id="product-select">
                                                    <option value="">Sélectionner</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            data-name="{{ $product->name }}"
                                                            data-price="{{ $product->selling_price }}"
                                                            data-type="{{ $product->item_type }}">
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <!-- Table List start -->
                                    <div class="table-responsive table-nowrap rounded border-bottom-0 border mb-3">
                                        <table class="table mb-0 add-table" id="items-table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Produit/Service</th>
                                                    <th>Quantité</th>
                                                    <th>Prix unitaire</th>
                                                    <th>Taxe (%)</th>
                                                    <th>Montant</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody">
                                                @foreach (old('items', $deliveryChallan->items->toArray()) as $i => $item)
                                                    <tr class="item-row">
                                                        <td>
                                                            <input type="hidden"
                                                                name="items[{{ $i }}][product_id]"
                                                                class="item-product-id"
                                                                value="{{ $item['product_id'] ?? '' }}">
                                                            <input type="text"
                                                                name="items[{{ $i }}][label]"
                                                                class="form-control item-label"
                                                                value="{{ $item['label'] ?? '' }}"
                                                                placeholder="Nom de l'article">
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="items[{{ $i }}][quantity]"
                                                                class="form-control item-qty"
                                                                value="{{ $item['quantity'] ?? 1 }}"
                                                                min="0.001" step="0.001"
                                                                style="min-width: 80px;" required>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="items[{{ $i }}][unit_price]"
                                                                class="form-control item-price"
                                                                value="{{ $item['unit_price'] ?? 0 }}"
                                                                min="0" step="0.01"
                                                                style="min-width: 100px;">
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="items[{{ $i }}][tax_rate]"
                                                                class="form-control item-tax"
                                                                value="{{ $item['tax_rate'] ?? 0 }}"
                                                                min="0" max="100" step="0.01"
                                                                style="min-width: 80px;">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control item-total"
                                                                value="{{ number_format(($item['line_total'] ?? 0), 2, ',', '') }}"
                                                                readonly style="min-width: 90px;">
                                                        </td>
                                                        <td>
                                                            @if ($i > 0 || count(old('items', $deliveryChallan->items->toArray())) > 1)
                                                                <div>
                                                                    <a href="javascript:void(0);"
                                                                        class="text-danger remove-table"><i
                                                                            class="isax isax-close-circle"></i></a>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Table List end -->

                                    <div>
                                        <a href="javascript:void(0);"
                                            class="d-inline-flex align-items-center add-invoice-data"
                                            id="add-item-btn"><i
                                                class="isax isax-add-circle5 text-primary me-1"></i>Ajouter un
                                            article</a>
                                    </div>
                                </div>

                                <div class="extra-info">

                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="mb-3">
                                                <h6 class="mb-3">Informations supplémentaires</h6>
                                                <div>
                                                    <ul class="nav nav-tabs nav-solid-primary mb-3" role="tablist">
                                                        <li class="nav-item me-2" role="presentation">
                                                            <a class="nav-link active border fs-12 fw-semibold rounded"
                                                                data-bs-toggle="tab" data-bs-target="#notes"
                                                                aria-current="page"
                                                                href="javascript:void(0);"><i
                                                                    class="isax isax-document-text me-1"></i>Notes</a>
                                                        </li>
                                                        <li class="nav-item me-2" role="presentation">
                                                            <a class="nav-link border fs-12 fw-semibold rounded"
                                                                data-bs-toggle="tab" data-bs-target="#terms"
                                                                href="javascript:void(0);"><i
                                                                    class="isax isax-document me-1"></i>Conditions</a>
                                                        </li>
                                                        <li class="nav-item me-2" role="presentation">
                                                            <a class="nav-link border fs-12 fw-semibold rounded"
                                                                data-bs-toggle="tab" data-bs-target="#bank"
                                                                href="javascript:void(0);"><i
                                                                    class="isax isax-bank me-1"></i>Coordonnées
                                                                bancaires</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active show" id="notes"
                                                            role="tabpanel">
                                                            <label class="form-label">Notes
                                                                additionnelles</label>
                                                            <textarea name="notes" class="form-control" rows="3">{{ old('notes', $deliveryChallan->notes) }}</textarea>
                                                        </div>
                                                        <div class="tab-pane fade" id="terms" role="tabpanel">
                                                            <label class="form-label">Conditions
                                                                générales</label>
                                                            <textarea name="terms" class="form-control" rows="3">{{ old('terms', $deliveryChallan->terms) }}</textarea>
                                                        </div>
                                                        <div class="tab-pane fade" id="bank" role="tabpanel">
                                                            <label class="form-label">Compte bancaire</label>
                                                            <select class="select" name="bank_account_id">
                                                                <option value="">Sélectionner</option>
                                                                @foreach ($bankAccounts as $ba)
                                                                    <option value="{{ $ba->id }}"
                                                                        {{ old('bank_account_id', $deliveryChallan->bank_account_id) == $ba->id ? 'selected' : '' }}>
                                                                        {{ $ba->account_holder_name }} -
                                                                        {{ $ba->account_number }}
                                                                        ({{ $ba->bank_name }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-md-5">
                                            <ul class="mb-0 ps-0 list-unstyled">
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">Sous-total</p>
                                                        <h6 class="fs-14" id="display-subtotal">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">Taxe</p>
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
                                    class="btn btn-outline-white">Annuler</a>
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
            let itemIndex = {{ count(old('items', $deliveryChallan->items->toArray())) }};
            const tbody = document.querySelector('#items-table .add-tbody');
            const addBtn = document.getElementById('add-item-btn');
            const productSelect = document.getElementById('product-select');

            /* =========================================================
             * Add new item row
             * ========================================================= */
            addBtn.addEventListener('click', function() {
                const row = document.createElement('tr');
                row.className = 'item-row';
                row.innerHTML = `
                    <td>
                        <input type="hidden" name="items[${itemIndex}][product_id]" class="item-product-id" value="">
                        <input type="text" name="items[${itemIndex}][label]" class="form-control item-label" placeholder="Nom de l'article">
                    </td>
                    <td>
                        <input type="number" name="items[${itemIndex}][quantity]" class="form-control item-qty" value="1" min="0.001" step="0.001" style="min-width: 80px;" required>
                    </td>
                    <td>
                        <input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" value="0" min="0" step="0.01" style="min-width: 100px;">
                    </td>
                    <td>
                        <input type="number" name="items[${itemIndex}][tax_rate]" class="form-control item-tax" value="0" min="0" max="100" step="0.01" style="min-width: 80px;">
                    </td>
                    <td>
                        <input type="text" class="form-control item-total" value="0,00" readonly style="min-width: 90px;">
                    </td>
                    <td>
                        <div>
                            <a href="javascript:void(0);" class="text-danger remove-table"><i class="isax isax-close-circle"></i></a>
                        </div>
                    </td>
                `;
                tbody.appendChild(row);
                itemIndex++;
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

            /* =========================================================
             * Product select → populate first empty row or add new
             * ========================================================= */
            if (productSelect) {
                productSelect.addEventListener('change', function() {
                    const opt = this.options[this.selectedIndex];
                    if (!opt || !opt.value) return;

                    const name = opt.dataset.name || opt.textContent.trim();
                    const price = parseFloat(opt.dataset.price) || 0;

                    // Find first empty row or add new one
                    const lastRow = tbody.querySelector('.item-row:last-child');
                    const labelInput = lastRow ? lastRow.querySelector('.item-label') : null;
                    let targetRow = lastRow;

                    if (labelInput && labelInput.value && labelInput.value.trim() !== '') {
                        addBtn.click();
                        targetRow = tbody.querySelector('.item-row:last-child');
                    }

                    if (targetRow) {
                        const pid = targetRow.querySelector('.item-product-id');
                        const lbl = targetRow.querySelector('.item-label');
                        const prc = targetRow.querySelector('.item-price');
                        if (pid) pid.value = opt.value;
                        if (lbl) lbl.value = name;
                        if (prc) prc.value = price.toFixed(2);
                        recalcAll();
                    }

                    this.value = '';
                });
            }

            /* =========================================================
             * Live calculation
             * ========================================================= */
            tbody.addEventListener('input', function(e) {
                if (e.target.classList.contains('item-qty') ||
                    e.target.classList.contains('item-price') ||
                    e.target.classList.contains('item-tax')) {
                    recalcAll();
                }
            });

            function recalcAll() {
                let subtotal = 0;
                let taxTotal = 0;

                document.querySelectorAll('#items-table .item-row').forEach(function(row) {
                    const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
                    const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
                    const taxRate = parseFloat(row.querySelector('.item-tax')?.value) || 0;

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

            // Initial calculation
            recalcAll();
        });
    </script>
@endpush
