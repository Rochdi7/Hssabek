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
        $currencyCode = $tenant->default_currency ?? 'MAD'; $currency = $currencyCode === 'MAD' ? 'DH' : $currencyCode;
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
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Réf. fournisseur') }}</label>
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
                                                                <input type="text" id="reference_number"
                                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                                    name="reference_number"
                                                                    value="{{ old('reference_number', $purchaseOrder->reference_number) }}"
                                                                    placeholder="{{ __('Référence fournisseur') }}">
                                                                @error('reference_number')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
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
                                                    <div class="p-3 bg-light rounded border">
                                                        <div class="d-flex">
                                                            <div class="me-3">
                                                                <span class="p-2 rounded border"><img
                                                                        src="{{ $tenant->logo_url ?? URL::asset('assets/images/logo/favicon.svg') }}"
                                                                        alt="image" class="img-fluid"></span>
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-1 fw-semibold">
                                                                    {{ $tenant->name }}</h6>
                                                                @if ($tenant->address)
                                                                    <p class="mb-0">{{ $tenant->address }}</p>
                                                                @endif
                                                                @if ($tenant->phone)
                                                                    <p class="mb-0">{{ __('Tél') }} : {{ $tenant->phone }}</p>
                                                                @endif
                                                                @if ($tenant->email)
                                                                    <p class="mb-0">{{ __('Email') }} : {{ $tenant->email }}</p>
                                                                @endif
                                                                @if ($tenant->tax_id)
                                                                    <p class="text-dark mb-0">{{ __('ICE') }} : {{ $tenant->tax_id }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
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

                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <h6 class="fs-14 mb-1">{{ __('Type d\'article') }}</h6>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="item_type_radio" id="itemTypeProduct" value="product"
                                                            checked>
                                                        <label class="form-check-label" for="itemTypeProduct">{{ __('Produit') }}</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="item_type_radio" id="itemTypeService" value="service">
                                                        <label class="form-check-label" for="itemTypeService">{{ __('Service') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Produits / Services') }}</label>
                                                <select class="select" id="product-selector">
                                                    <option value="">{{ __('Sélectionner') }}</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            data-name="{{ $product->name }}"
                                                            data-cost="{{ $product->cost_price ?? 0 }}"
                                                            data-tax="{{ $product->tax_rate ?? 20 }}"
                                                            data-type="{{ $product->item_type }}">
                                                            {{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <!-- Table List Start -->
                                    <div class="table-responsive rounded border-bottom-0 border mb-3">
                                        <table class="table table-nowrap add-table mb-0" id="items-table" style="table-layout: fixed; width: 100%;">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th style="width: 28%;">{{ __('Produit / Libellé') }}</th>
                                                    <th style="width: 13%;">{{ __('Quantité') }}</th>
                                                    <th style="width: 17%;">{{ __('Coût unitaire') }}</th>
                                                    <th class="tax-col" style="width: 15%;">{{ __('Taxe (%)') }}</th>
                                                    <th style="width: 17%;">{{ __('Total ligne') }}</th>
                                                    <th style="width: 10%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody" id="items-body">
                                                @foreach ($purchaseOrder->items as $idx => $item)
                                                    <tr class="item-row">
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="items[{{ $idx }}][label]"
                                                                value="{{ old("items.{$idx}.label", $item->label) }}"
                                                                required>
                                                            <select class="form-select form-select-sm mt-1"
                                                                name="items[{{ $idx }}][product_id]">
                                                                <option value="">{{ __('-- Produit (optionnel) --') }}</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}"
                                                                        {{ old("items.{$idx}.product_id", $item->product_id) == $product->id ? 'selected' : '' }}>
                                                                        {{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
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
                                                        <li class="nav-item me-2" role="presentation">
                                                            <a class="nav-link border fs-12 fw-semibold rounded"
                                                                data-bs-toggle="tab" data-bs-target="#bank"
                                                                href="javascript:void(0);"><i
                                                                    class="isax isax-bank me-1"></i>{{ __('Coordonnées bancaires') }}</a>
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
                                                        <div class="tab-pane fade" id="bank" role="tabpanel">
                                                            <label class="form-label">{{ __('Compte bancaire') }} <span class="text-danger">*</span></label>
                                                            <select class="select @error('bank_account_id') is-invalid @enderror" name="bank_account_id" required>
                                                                <option value="">{{ __('Sélectionner') }}</option>
                                                                @foreach ($bankAccounts as $ba)
                                                                    <option value="{{ $ba->id }}"
                                                                        data-balance="{{ number_format($ba->current_balance, 2, ',', ' ') }}"
                                                                        data-currency="{{ $ba->currency }}"
                                                                        {{ old('bank_account_id', $purchaseOrder->bank_account_id) == $ba->id ? 'selected' : '' }}>
                                                                        {{ $ba->account_holder_name }} -
                                                                        {{ $ba->account_number }}
                                                                        ({{ $ba->bank_name }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('bank_account_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                            <small class="text-muted bank-balance-info mt-1 d-block" style="display:none;"></small>
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

            // Item type filter — show/hide product options based on type
            const productSelector = document.getElementById('product-selector');
            const itemTypeRadios = document.querySelectorAll('[name="item_type_radio"]');
            itemTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const type = this.value;
                    Array.from(productSelector.options).forEach(opt => {
                        if (!opt.value) return;
                        opt.style.display = (opt.dataset.type === type) ? '' : 'none';
                        if (opt.style.display === 'none' && opt.selected) opt.selected = false;
                    });
                });
            });
            const checkedRadio = document.querySelector('[name="item_type_radio"]:checked');
            if (checkedRadio) checkedRadio.dispatchEvent(new Event('change'));

            // Product selector — adds a new row pre-filled with selected product data
            productSelector.addEventListener('change', function() {
                const sel = this;
                const opt = sel.options[sel.selectedIndex];
                if (!opt || !opt.value) return;

                const name = opt.dataset.name || '';
                const cost = opt.dataset.cost || 0;
                const tax = opt.dataset.tax || 20;

                let productOptions = '<option value="">{{ __('-- Produit (optionnel) --') }}</option>';
                productsJson.forEach(p => {
                    const selected = p.id == opt.value ? ' selected' : '';
                    productOptions += `<option value="${p.id}"${selected}>${p.name}</option>`;
                });

                const taxOpts = buildTaxOptions();
                const row = document.createElement('tr');
                row.classList.add('item-row');
                row.innerHTML = `
                    <td>
                        <input type="text" class="form-control" name="items[${itemIndex}][label]" value="${name}" required>
                        <select class="form-select form-select-sm mt-1" name="items[${itemIndex}][product_id]">${productOptions}</select>
                    </td>
                    <td><input type="number" class="form-control item-qty" name="items[${itemIndex}][quantity]" value="1" min="0.001" step="0.001" required></td>
                    <td><input type="number" class="form-control item-cost" name="items[${itemIndex}][unit_cost]" value="${cost}" min="0" step="0.01" required></td>
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
                sel.value = '';
                recalc();
            });

            document.getElementById('add-item-btn').addEventListener('click', function() {
                let productOptions = '<option value="">{{ __('-- Produit (optionnel) --') }}</option>';
                productsJson.forEach(p => {
                    productOptions += `<option value="${p.id}">${p.name}</option>`;
                });

                const taxOpts = buildTaxOptions();
                const row = document.createElement('tr');
                row.classList.add('item-row');
                row.innerHTML = `
            <td>
                <input type="text" class="form-control" name="items[${itemIndex}][label]" placeholder="{{ __('Libellé de l\'article') }}" required>
                <select class="form-select form-select-sm mt-1" name="items[${itemIndex}][product_id]">${productOptions}</select>
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

            document.getElementById('items-body').addEventListener('change', function() {
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
        });
    </script>
@endpush
