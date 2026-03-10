<?php $page = 'edit-quotation'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                    Start Page Content
                ========================= -->

    @php
        $currency = $quote->currency ?? App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD';
        $tenant = App\Services\Tenancy\TenantContext::get();
    @endphp

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- Start row  -->
            <div class="row">
                <div class="col-md-11 mx-auto">

                    <!-- Start Breadcrumb -->
                    <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                        <div>
                            <h6><a href="{{ route('bo.sales.quotes.index') }}" class="d-flex align-items-center"><i
                                        class="isax isax-arrow-left me-2"></i>Devis</a></h6>
                        </div>
                        <div class="right-content">
                            <a href="{{ route('bo.sales.quotes.show', $quote) }}"
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
                        <form action="{{ route('bo.sales.quotes.update', $quote) }}" method="POST" id="quote-form">
                            @csrf @method('PUT')
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>Modifier le devis</h6>
                                    </div>
                                    <div>

                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">N° Devis</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $quote->number }}" readonly>
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
                                                                    value="{{ old('reference_number', $quote->reference_number) }}"
                                                                    placeholder="Ex: DEV-00001">
                                                                @error('reference_number')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date d'émission <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="input-group position-relative">
                                                                    <input type="date" name="issue_date"
                                                                        class="form-control rounded-end @error('issue_date') is-invalid @enderror"
                                                                        value="{{ old('issue_date', $quote->issue_date?->format('Y-m-d')) }}">
                                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                                        <i class="isax isax-calendar-2"></i>
                                                                    </span>
                                                                    @error('issue_date')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date d'expiration</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="date" name="expiry_date"
                                                                        class="form-control rounded-end @error('expiry_date') is-invalid @enderror"
                                                                        value="{{ old('expiry_date', $quote->expiry_date?->format('Y-m-d')) }}">
                                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                                        <i class="isax isax-calendar-2"></i>
                                                                    </span>
                                                                    @error('expiry_date')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
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
                                                                        <img src="{{ URL::asset('build/img/invoice-logo.svg') }}"
                                                                            class="invoice-logo-dark" alt="img">
                                                                        <img src="{{ URL::asset('build/img/invoice-logo-white-2.svg') }}"
                                                                            class="invoice-logo-white" alt="img">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Devise</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $currency }}" readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="p-2 border rounded d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="form-check form-switch me-4">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            role="switch" name="enable_tax" id="enable_tax"
                                                                            value="1"
                                                                            {{ old('enable_tax', $quote->enable_tax) ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="enable_tax">Activer la
                                                                            taxe</label>
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
                                                    <h6>Facturé par</h6>
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
                                                    <h6>Facturer à</h6>
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
                                                                        {{ old('customer_id', $quote->customer_id) == $customer->id ? 'selected' : '' }}>
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
                                                            name="item_type_filter" id="item-type-product"
                                                            value="product" checked>
                                                        <label class="form-check-label" for="item-type-product">
                                                            Produit
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="item_type_filter" id="item-type-service"
                                                            value="service">
                                                        <label class="form-check-label" for="item-type-service">
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
                                                            data-unit-id="{{ $product->unit_id }}"
                                                            data-type="{{ $product->item_type }}">
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <!-- Table List Start -->
                                    <div class="table-responsive rounded border-bottom-0 border mb-3">
                                        <table class="table table-nowrap add-table mb-0" id="items-table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Libellé</th>
                                                    <th>Quantité</th>
                                                    <th>Unité</th>
                                                    <th>Prix unitaire</th>
                                                    <th>Remise</th>
                                                    <th>Taxe (%)</th>
                                                    <th>Montant</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody">
                                                @foreach ($quote->items as $i => $item)
                                                    <tr class="item-row">
                                                        <td>
                                                            <input type="hidden"
                                                                name="items[{{ $i }}][product_id]"
                                                                class="item-product-id"
                                                                value="{{ old("items.{$i}.product_id", $item->product_id) }}">
                                                            <input type="text"
                                                                name="items[{{ $i }}][label]"
                                                                class="form-control item-label"
                                                                value="{{ old("items.{$i}.label", $item->label) }}"
                                                                placeholder="Nom de l'article" required>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="items[{{ $i }}][quantity]"
                                                                class="form-control item-qty"
                                                                value="{{ old("items.{$i}.quantity", $item->quantity) }}"
                                                                min="0.001" step="0.001"
                                                                style="min-width: 80px;" required>
                                                        </td>
                                                        <td>
                                                            <select name="items[{{ $i }}][unit_id]"
                                                                class="form-select item-unit" style="min-width: 90px;">
                                                                <option value="">—</option>
                                                                @foreach ($units as $unit)
                                                                    <option value="{{ $unit->id }}"
                                                                        {{ old("items.{$i}.unit_id", $item->unit_id) == $unit->id ? 'selected' : '' }}>
                                                                        {{ $unit->short_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="items[{{ $i }}][unit_price]"
                                                                class="form-control item-price"
                                                                value="{{ old("items.{$i}.unit_price", $item->unit_price) }}"
                                                                min="0" step="0.01"
                                                                style="min-width: 100px;" required>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-1"
                                                                style="min-width: 130px;">
                                                                <select
                                                                    name="items[{{ $i }}][discount_type]"
                                                                    class="form-select item-discount-type"
                                                                    style="width: 60px;">
                                                                    <option value="none"
                                                                        {{ old("items.{$i}.discount_type", $item->discount_type) == 'none' ? 'selected' : '' }}>
                                                                        —</option>
                                                                    <option value="percentage"
                                                                        {{ old("items.{$i}.discount_type", $item->discount_type) == 'percentage' ? 'selected' : '' }}>
                                                                        %</option>
                                                                    <option value="fixed"
                                                                        {{ old("items.{$i}.discount_type", $item->discount_type) == 'fixed' ? 'selected' : '' }}>
                                                                        Fixe</option>
                                                                </select>
                                                                <input type="number"
                                                                    name="items[{{ $i }}][discount_value]"
                                                                    class="form-control item-discount"
                                                                    value="{{ old("items.{$i}.discount_value", $item->discount_value) }}"
                                                                    min="0" step="0.01"
                                                                    style="width: 70px;">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <select name="items[{{ $i }}][tax_group_id]"
                                                                class="form-select item-tax" style="min-width: 100px;">
                                                                <option value="" data-rate="0">0%</option>
                                                                @foreach ($taxGroups as $tg)
                                                                    <option value="{{ $tg->id }}"
                                                                        data-rate="{{ $tg->rates->sum('rate') }}"
                                                                        {{ old("items.{$i}.tax_group_id", $item->tax_group_id) == $tg->id ? 'selected' : '' }}>
                                                                        {{ $tg->name }}
                                                                        ({{ $tg->rates->sum('rate') }}%)
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control item-total"
                                                                value="{{ number_format($item->line_total, 2, ',', ' ') }}"
                                                                readonly style="min-width: 90px;">
                                                        </td>
                                                        <td>
                                                            @if (!$loop->first)
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
                                                                aria-current="page" href="javascript:void(0);"><i
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
                                                            <label class="form-label">Notes additionnelles</label>
                                                            <textarea name="notes" class="form-control" rows="3">{{ old('notes', $quote->notes) }}</textarea>
                                                        </div>
                                                        <div class="tab-pane fade" id="terms" role="tabpanel">
                                                            <label class="form-label">Conditions générales</label>
                                                            <textarea name="terms" class="form-control" rows="3">{{ old('terms', $quote->terms) }}</textarea>
                                                        </div>
                                                        <div class="tab-pane fade" id="bank" role="tabpanel">
                                                            <label class="form-label">Compte bancaire</label>
                                                            <select class="select" name="bank_account_id">
                                                                <option value="">Sélectionner</option>
                                                                @foreach ($bankAccounts as $ba)
                                                                    <option value="{{ $ba->id }}"
                                                                        {{ old('bank_account_id', $quote->bank_account_id) == $ba->id ? 'selected' : '' }}>
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
                                                        <h6 class="fs-14" id="display-subtotal">{{ number_format($quote->subtotal, 2, ',', ' ') }}</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">Taxe</p>
                                                        <h6 class="fs-14" id="display-tax">{{ number_format($quote->tax_total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                </li>
                                                <li class="mt-3 pb-3 border-bottom border-gray">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>Total ({{ $currency }})</h6>
                                                        <h6 id="display-total">{{ number_format($quote->total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>
                            </div><!-- end card body -->

                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="{{ route('bo.sales.quotes.show', $quote) }}"
                                    class="btn btn-outline-white">Annuler</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
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

@php
    $taxGroupsJson = $taxGroups
        ->map(function ($tg) {
            return [
                'id' => $tg->id,
                'name' => $tg->name,
                'rate' => $tg->rates->sum('rate'),
            ];
        })
        ->values();

    $productsJson = $products
        ->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->name,
                'selling_price' => $p->selling_price,
                'unit_id' => $p->unit_id,
                'item_type' => $p->item_type,
            ];
        })
        ->values();
@endphp

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* =========================================================
             * Data from server
             * ========================================================= */
            const units = @json($units);
            const taxGroups = @json($taxGroupsJson);
            const products = @json($productsJson);
            const currency = '{{ $currency }}';

            /* =========================================================
             * Product select → populate first empty row
             * ========================================================= */
            const productSelect = document.getElementById('product-select');
            const itemTypeRadios = document.querySelectorAll('[name="item_type_filter"]');

            // Filter product options based on type
            itemTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const type = this.value;
                    const options = productSelect.querySelectorAll('option');
                    options.forEach(opt => {
                        if (!opt.value) return;
                        const optType = opt.dataset.type;
                        opt.style.display = (optType === type || !optType) ? '' : 'none';
                    });
                });
            });

            productSelect.addEventListener('change', function() {
                const pid = this.value;
                if (!pid) return;
                const product = products.find(p => p.id == pid);
                if (!product) return;

                // Find first empty row or add new one
                const lastRow = tbody.querySelector('.item-row:last-child');
                const labelInput = lastRow?.querySelector('.item-label');
                let targetRow = lastRow;

                if (labelInput && labelInput.value && labelInput.value.trim() !== '') {
                    addBtn.click();
                    targetRow = tbody.querySelector('.item-row:last-child');
                }

                if (targetRow) {
                    targetRow.querySelector('.item-product-id').value = product.id;
                    targetRow.querySelector('.item-label').value = product.name;
                    targetRow.querySelector('.item-price').value = product.selling_price;
                    if (product.unit_id) {
                        targetRow.querySelector('.item-unit').value = product.unit_id;
                    }
                }

                this.value = '';
                recalcTotals();
            });

            /* =========================================================
             * Add / Remove item rows
             * ========================================================= */
            let itemIndex = {{ $quote->items->count() }};
            const tbody = document.querySelector('#items-table .add-tbody');
            const addBtn = document.getElementById('add-item-btn');

            addBtn.addEventListener('click', function() {
                let unitOptions = '<option value="">—</option>';
                units.forEach(u => {
                    unitOptions += `<option value="${u.id}">${u.short_name}</option>`;
                });

                let taxOptions = '<option value="" data-rate="0">0%</option>';
                taxGroups.forEach(tg => {
                    taxOptions +=
                        `<option value="${tg.id}" data-rate="${tg.rate}">${tg.name} (${tg.rate}%)</option>`;
                });

                const row = document.createElement('tr');
                row.className = 'item-row';
                row.innerHTML = `
                    <td>
                        <input type="hidden" name="items[${itemIndex}][product_id]" class="item-product-id" value="">
                        <input type="text" name="items[${itemIndex}][label]" class="form-control item-label" placeholder="Nom de l'article" required>
                    </td>
                    <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control item-qty" value="1" min="0.001" step="0.001" style="min-width: 80px;" required></td>
                    <td><select name="items[${itemIndex}][unit_id]" class="form-select item-unit" style="min-width: 90px;">${unitOptions}</select></td>
                    <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" value="0" min="0" step="0.01" style="min-width: 100px;" required></td>
                    <td>
                        <div class="d-flex align-items-center gap-1" style="min-width: 130px;">
                            <select name="items[${itemIndex}][discount_type]" class="form-select item-discount-type" style="width: 60px;">
                                <option value="none">—</option><option value="percentage">%</option><option value="fixed">Fixe</option>
                            </select>
                            <input type="number" name="items[${itemIndex}][discount_value]" class="form-control item-discount" value="0" min="0" step="0.01" style="width: 70px;">
                        </div>
                    </td>
                    <td><select name="items[${itemIndex}][tax_group_id]" class="form-select item-tax" style="min-width: 100px;">${taxOptions}</select></td>
                    <td><input type="text" class="form-control item-total" value="0,00" readonly style="min-width: 90px;"></td>
                    <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
                `;
                tbody.appendChild(row);
                itemIndex++;
                bindRowEvents(row);
            });

            tbody.addEventListener('click', function(e) {
                const removeBtn = e.target.closest('.remove-item');
                if (removeBtn) {
                    removeBtn.closest('tr').remove();
                    recalcTotals();
                }
            });

            /* =========================================================
             * Real-time totals calculation
             * ========================================================= */
            function recalcTotals() {
                let subtotal = 0;
                let totalTax = 0;

                document.querySelectorAll('.item-row').forEach(row => {
                    const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
                    const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
                    const discountType = row.querySelector('.item-discount-type')?.value || 'none';
                    const discountVal = parseFloat(row.querySelector('.item-discount')?.value) || 0;
                    const taxSelect = row.querySelector('.item-tax');
                    const taxRate = parseFloat(taxSelect?.selectedOptions[0]?.dataset.rate) || 0;

                    let lineSubtotal = qty * price;
                    let lineDiscount = 0;

                    if (discountType === 'percentage') {
                        lineDiscount = lineSubtotal * (discountVal / 100);
                    } else if (discountType === 'fixed') {
                        lineDiscount = discountVal;
                    }

                    const afterDiscount = lineSubtotal - lineDiscount;
                    const lineTax = afterDiscount * (taxRate / 100);
                    const lineTotal = afterDiscount + lineTax;

                    const totalInput = row.querySelector('.item-total');
                    if (totalInput) totalInput.value = formatNumber(lineTotal);

                    subtotal += afterDiscount;
                    totalTax += lineTax;
                });

                const total = subtotal + totalTax;

                document.getElementById('display-subtotal').textContent = formatNumber(subtotal);
                document.getElementById('display-tax').textContent = formatNumber(totalTax);
                document.getElementById('display-total').textContent = formatNumber(total);
            }

            function formatNumber(num) {
                return num.toFixed(2).replace('.', ',').replace(/\B(?=(?:\d{3})+(?!\d))/g, ' ');
            }

            /* =========================================================
             * Bind row events for recalculation
             * ========================================================= */
            function bindRowEvents(row) {
                row.querySelectorAll('.item-qty, .item-price, .item-discount').forEach(inp => {
                    inp.addEventListener('input', recalcTotals);
                });
                row.querySelectorAll('.item-discount-type, .item-tax').forEach(sel => {
                    sel.addEventListener('change', recalcTotals);
                });
            }

            // Bind events on existing rows
            document.querySelectorAll('.item-row').forEach(row => bindRowEvents(row));

            // Initial calculation
            recalcTotals();
        });
    </script>
@endpush
