<?php $page = 'edit-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                                            Start Page Content
                                        ========================= -->

    @php
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';
        $paymentDays = (int) ($invoiceSettings['payment_terms_days'] ?? 30);
        $roundOff = $invoiceSettings['invoice_round_off'] ?? '0';
        $showCompany = $invoiceSettings['show_company_details'] ?? true;
        $currency = $tenant->default_currency ?? 'MAD';
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
                            <h6><a href="{{ route('bo.sales.invoices.index') }}" class="d-flex align-items-center"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Factures') }}</a></h6>
                        </div>
                        <div class="right-content">
                            <a href="{{ route('bo.sales.invoices.show', $invoice) }}"
                                class="btn btn-outline-white d-inline-flex align-items-center"><i
                                    class="isax isax-eye me-1"></i>{{ __('Aperçu') }}</a>
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
                        <form action="{{ route('bo.sales.invoices.update', $invoice) }}" method="POST" id="invoice-form">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ __('Modifier la facture') }}</h6>
                                    </div>
                                    <div>

                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('N° Facture') }}</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $invoice->number }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Référence') }}</label>
                                                                <div class="mb-2">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ref_mode" id="ref_mode_manual"
                                                                            value="manual" checked
                                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').focus();">
                                                                        <label class="form-check-label"
                                                                            for="ref_mode_manual">{{ __('Saisie manuelle') }}</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ref_mode" id="ref_mode_auto"
                                                                            value="auto"
                                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                                        <label class="form-check-label"
                                                                            for="ref_mode_auto">{{ __('Générer
                                                                            automatiquement') }}</label>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="reference_number"
                                                                    id="reference_number"
                                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                                    value="{{ old('reference_number', $invoice->reference_number) }}"
                                                                    placeholder="{{ __("Ex: FAC-00001") }}">
                                                                @error('reference_number')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date d\'émission') }}</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text" name="issue_date"
                                                                        class="form-control datetimepicker rounded-end @error('issue_date') is-invalid @enderror"
                                                                        value="{{ old('issue_date', $invoice->issue_date?->format('d-m-Y')) }}"
                                                                        placeholder="{{ now()->format('d M Y') }}">
                                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                                        <i class="isax isax-calendar-2"></i>
                                                                    </span>
                                                                    @error('issue_date')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $hasDueDate = old(
                                                                'due_date',
                                                                $invoice->due_date?->format('d-m-Y'),
                                                            );
                                                        @endphp
                                                        <div class="col-md-12 {{ $hasDueDate ? 'd-none' : '' }}"
                                                            id="due-date-link-wrapper">
                                                            <div class="mb-3">
                                                                <a href="javascript:void(0);"
                                                                    class="d-inline-flex align-items-center"
                                                                    id="add-due-date-link"><i
                                                                        class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter
                                                                    une date d\'échéance') }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 {{ $hasDueDate ? '' : 'd-none' }}"
                                                            id="due-date-field-wrapper">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date d\'échéance') }}</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text" name="due_date" id="due_date"
                                                                        class="form-control datetimepicker rounded-end @error('due_date') is-invalid @enderror"
                                                                        value="{{ old('due_date', $invoice->due_date?->format('d-m-Y')) }}"
                                                                        placeholder="{{ now()->format('d M Y') }}">
                                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                                        <i class="isax isax-calendar-2"></i>
                                                                    </span>
                                                                    @error('due_date')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            @php
                                                                $existingRecurring = $invoice->recurringInvoice;
                                                                $hasRecurrence = $existingRecurring !== null;
                                                            @endphp
                                                            @if ($hasRecurrence)
                                                                {{-- Show existing recurring info --}}
                                                                <div
                                                                    class="alert alert-info d-flex align-items-center mb-3">
                                                                    <i class="isax isax-repeat me-2"></i>
                                                                    <div class="flex-fill">
                                                                        <strong>{{ __('Récurrence active') }}</strong><br>
                                                                        <span class="small">
                                                                            {{ __('Tous les') }} {{ $existingRecurring->every }}
                                                                            {{ $existingRecurring->interval === 'month' ? __('mois') : ($existingRecurring->interval === 'week' ? __('semaines') : __('ans')) }}
                                                                            — {{ __('Prochaine exécution') }} :
                                                                            {{ $existingRecurring->next_run_at?->format('d/m/Y') }}
                                                                            @if ($existingRecurring->end_at)
                                                                                — {{ __('Fin') }} :
                                                                                {{ $existingRecurring->end_at->format('d/m/Y') }}
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                    <a href="{{ route('bo.pro.recurring-invoices.edit', $existingRecurring) }}"
                                                                        class="btn btn-sm btn-outline-primary">
                                                                        <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}</a>
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="d-flex align-items-center flex-wrap gap-2 mb-3">
                                                                    <div class="form-check form-switch me-4">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            role="switch" id="recurring_check"
                                                                            {{ old('is_recurring') ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="recurring_check">{{ __('Récurrence') }}</label>
                                                                    </div>
                                                                    <div class="d-flex align-items-center flex-fill {{ old('is_recurring') ? '' : 'd-none' }}"
                                                                        id="recurring-fields">
                                                                        <input type="hidden" name="is_recurring"
                                                                            id="is_recurring_input"
                                                                            value="{{ old('is_recurring', '0') }}">
                                                                        <div class="flex-fill me-3">
                                                                            <select class="form-select"
                                                                                name="recurring_interval"
                                                                                id="recurring_interval">
                                                                                <option value="month"
                                                                                    {{ old('recurring_interval') == 'month' ? 'selected' : '' }}>
                                                                                    {{ __('Mensuel') }}</option>
                                                                                <option value="week"
                                                                                    {{ old('recurring_interval') == 'week' ? 'selected' : '' }}>
                                                                                    {{ __('Hebdomadaire') }}</option>
                                                                                <option value="year"
                                                                                    {{ old('recurring_interval') == 'year' ? 'selected' : '' }}>
                                                                                    {{ __('Annuel') }}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="flex-fill">
                                                                            <select class="form-select"
                                                                                name="recurring_every"
                                                                                id="recurring_every">
                                                                                <option value="1"
                                                                                    {{ old('recurring_every') == '1' ? 'selected' : '' }}>
                                                                                    1</option>
                                                                                <option value="2"
                                                                                    {{ old('recurring_every') == '2' ? 'selected' : '' }}>
                                                                                    2</option>
                                                                                <option value="3"
                                                                                    {{ old('recurring_every') == '3' ? 'selected' : '' }}>
                                                                                    3</option>
                                                                                <option value="6"
                                                                                    {{ old('recurring_every') == '6' ? 'selected' : '' }}>
                                                                                    6</option>
                                                                                <option value="12"
                                                                                    {{ old('recurring_every') == '12' ? 'selected' : '' }}>
                                                                                    12</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- Recurring date fields --}}
                                                                <div class="col-md-12 {{ old('is_recurring') ? '' : 'd-none' }}"
                                                                    id="recurring-date-fields">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">{{ __('Date de première
                                                                                    exécution') }} <span class="text-danger">*</span></label>
                                                                                <div class="input-group position-relative">
                                                                                    <input type="text"
                                                                                        name="recurring_next_run_at"
                                                                                        id="recurring_next_run_at"
                                                                                        class="form-control datetimepicker rounded-end @error('recurring_next_run_at') is-invalid @enderror"
                                                                                        value="{{ old('recurring_next_run_at') }}"
                                                                                        placeholder="{{ now()->addMonth()->format('d M Y') }}">
                                                                                    <span
                                                                                        class="input-icon-addon fs-16 text-gray-9">
                                                                                        <i
                                                                                            class="isax isax-calendar-2"></i>
                                                                                    </span>
                                                                                    @error('recurring_next_run_at')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">{{ __('Date de fin
                                                                                    (optionnel)') }}</label>
                                                                                <div class="input-group position-relative">
                                                                                    <input type="text"
                                                                                        name="recurring_end_at"
                                                                                        id="recurring_end_at"
                                                                                        class="form-control datetimepicker rounded-end @error('recurring_end_at') is-invalid @enderror"
                                                                                        value="{{ old('recurring_end_at') }}"
                                                                                        placeholder="{{ __('Sans fin') }}">
                                                                                    <span
                                                                                        class="input-icon-addon fs-16 text-gray-9">
                                                                                        <i
                                                                                            class="isax isax-calendar-2"></i>
                                                                                    </span>
                                                                                    @error('recurring_end_at')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
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
                                                                    @if ($tenant->invoice_image_url)
                                                                        <img src="{{ $tenant->invoice_image_url }}"
                                                                            class="img-fluid" alt="Logo facture"
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
                                                                            role="switch" name="enable_tax"
                                                                            id="enable_tax" value="1"
                                                                            {{ old('enable_tax', $invoice->enable_tax) ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="enable_tax">{{ __('Activer
                                                                            la
                                                                            taxe') }}</label>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <a href="{{ route('bo.settings.invoice.edit') }}"><span
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
                                        @if ($showCompany)
                                            <div class="col-md-6">
                                                <div class="card box-shadow-0">
                                                    <div class="card-header border-0 pb-0">
                                                        <h6>{{ __('Facturé par') }}</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">{{ __('Entreprise') }}</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $tenant->name }}" readonly disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        @endif
                                        <div class="col-md-6">
                                            <div class="card box-shadow-0">
                                                <div class="card-header border-0 pb-0">
                                                    <h6>{{ __('Facturer à') }}</h6>
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
                                                                        {{ old('customer_id', $invoice->customer_id) == $customer->id ? 'selected' : '' }}>
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
                                                            name="item_type_filter" id="item-type-product"
                                                            value="product" checked>
                                                        <label class="form-check-label" for="item-type-product">
                                                            {{ __('Produit') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="item_type_filter" id="item-type-service"
                                                            value="service">
                                                        <label class="form-check-label" for="item-type-service">
                                                            {{ __('Service') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Produits/Services') }}</label>
                                                <select class="select" id="product-select">
                                                    <option value="">{{ __('Sélectionner') }}</option>
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
                                        <table class="table table-nowrap add-table m-0" id="items-table"
                                            style="table-layout: fixed; width: 100%;">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th style="width: 22%;">{{ __('Libellé') }}</th>
                                                    <th style="width: 9%;">{{ __('Quantité') }}</th>
                                                    <th style="width: 10%;">{{ __('Unité') }}</th>
                                                    <th style="width: 13%;">{{ __('Prix unitaire') }}</th>
                                                    <th style="width: 18%;">{{ __('Remise') }}</th>
                                                    <th style="width: 13%;" class="tax-col">{{ __('Taxe (%)') }}</th>
                                                    <th style="width: 11%;">{{ __('Montant') }}</th>
                                                    <th style="width: 4%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody">
                                                @foreach ($invoice->items as $i => $item)
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
                                                                placeholder="{{ __('Nom de l\'article') }}" required>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="items[{{ $i }}][quantity]"
                                                                class="form-control item-qty"
                                                                value="{{ old("items.{$i}.quantity", $item->quantity) }}"
                                                                min="0.001" step="0.001" required>
                                                        </td>
                                                        <td>
                                                            <select name="items[{{ $i }}][unit_id]"
                                                                class="form-select item-unit">
                                                                <option value="">{{ __('—') }}</option>
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
                                                                min="0" step="0.01" required>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-1">
                                                                <select name="items[{{ $i }}][discount_type]"
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
                                                                        {{ __('Fixe') }}</option>
                                                                </select>
                                                                <input type="number"
                                                                    name="items[{{ $i }}][discount_value]"
                                                                    class="form-control item-discount"
                                                                    value="{{ old("items.{$i}.discount_value", $item->discount_value) }}"
                                                                    min="0" step="0.01" style="width: 70px;">
                                                            </div>
                                                        </td>
                                                        <td class="tax-col">
                                                            <select name="items[{{ $i }}][tax_group_id]"
                                                                class="form-select item-tax">
                                                                <option value="" data-rate="0" data-type="">0%
                                                                </option>
                                                                @if ($taxCategories->count())
                                                                    <optgroup label="{{ __('Taux de taxes') }}">
                                                                        @foreach ($taxCategories as $tc)
                                                                            <option value="cat_{{ $tc->id }}"
                                                                                data-rate="{{ $tc->rate }}"
                                                                                data-type="category"
                                                                                {{ old("items.{$i}.tax_group_id", $item->tax_group_id) == 'cat_' . $tc->id ? 'selected' : '' }}>
                                                                                {{ $tc->name }}
                                                                                ({{ $tc->rate }}%)
                                                                            </option>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endif
                                                                @if ($taxGroups->count())
                                                                    <optgroup label="{{ __('Groupes de taxes') }}">
                                                                        @foreach ($taxGroups as $tg)
                                                                            <option value="{{ $tg->id }}"
                                                                                data-rate="{{ $tg->rates->sum('rate') }}"
                                                                                data-type="group"
                                                                                {{ old("items.{$i}.tax_group_id", $item->tax_group_id) == $tg->id ? 'selected' : '' }}>
                                                                                {{ $tg->name }}
                                                                                ({{ $tg->rates->sum('rate') }}%)
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
                                                        <li class="nav-item me-2" role="presentation">
                                                            <a class="nav-link border fs-12 fw-semibold rounded"
                                                                data-bs-toggle="tab" data-bs-target="#bank"
                                                                href="javascript:void(0);"><i
                                                                    class="isax isax-bank me-1"></i>{{ __('Coordonnées
                                                                bancaires') }}</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active show" id="notes" role="tabpanel">
                                                            <label class="form-label">{{ __('Notes additionnelles') }}</label>
                                                            <textarea name="notes" class="form-control bg-light" rows="3" readonly>{{ $defaultFooter }}</textarea>
                                                            <small class="text-muted mt-1 d-block"><i
                                                                    class="isax isax-setting-2 me-1"></i>{{ __('Modifiable depuis') }}
                                                                <a href="{{ route('bo.settings.invoice.edit') }}">{{ __('Paramètres de facturation') }}</a></small>
                                                        </div>
                                                        <div class="tab-pane fade" id="terms" role="tabpanel">
                                                            <label class="form-label">{{ __('Conditions générales') }}</label>
                                                            <textarea name="terms" class="form-control bg-light" rows="3" readonly>{{ $defaultTerms }}</textarea>
                                                            <small class="text-muted mt-1 d-block"><i
                                                                    class="isax isax-setting-2 me-1"></i>{{ __('Modifiable depuis') }}
                                                                <a href="{{ route('bo.settings.invoice.edit') }}">{{ __('Paramètres de facturation') }}</a></small>
                                                        </div>
                                                        <div class="tab-pane fade" id="bank" role="tabpanel">
                                                            <label class="form-label">{{ __('Compte bancaire') }}</label>
                                                            <select class="select" name="bank_account_id">
                                                                <option value="">{{ __('Sélectionner') }}</option>
                                                                @foreach ($bankAccounts as $ba)
                                                                    <option value="{{ $ba->id }}"
                                                                        data-balance="{{ number_format($ba->current_balance, 2, ',', ' ') }}"
                                                                        data-currency="{{ $ba->currency }}"
                                                                        {{ old('bank_account_id') == $ba->id ? 'selected' : '' }}>
                                                                        {{ $ba->account_holder_name }} -
                                                                        {{ $ba->account_number }}
                                                                        ({{ $ba->bank_name }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-muted bank-balance-info mt-1 d-block"
                                                                style="display:none;"></small>
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
                                                <li class="mb-3" id="charges-container">
                                                    {{-- Existing charges rendered by JS on init --}}
                                                </li>
                                                <li class="mb-3">
                                                    <a href="javascript:void(0);" class="d-inline-flex align-items-center"
                                                        id="add-charge-btn">
                                                        <i class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter
                                                        des frais supplémentaires') }}</a>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">{{ __('Remise') }}</p>
                                                        <input type="text" class="form-control"
                                                            id="global-discount-value" value="0%"
                                                            style="width: 106px;">
                                                    </div>
                                                </li>
                                                <li class="mb-3 pb-3 border-bottom border-gray">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="form-check form-switch me-4">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="round_off_check"
                                                                {{ $roundOff != '0' ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="round_off_check">{{ __('Arrondi') }}</label>
                                                        </div>
                                                        <h6 class="fs-14" id="display-roundoff">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3 pb-3 border-bottom border-gray">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>Total ({{ $currency }})</h6>
                                                        <h6 id="display-total">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3 pb-3 border-bottom border-gray">
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ __('Total en lettres') }}</h6>
                                                    <p id="display-total-words">—</p>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Signature') }}</label>
                                                        <select class="form-select" name="signature_id"
                                                            id="signature-select">
                                                            <option value="">{{ __('Sélectionner une signature') }}</option>
                                                            @foreach ($signatures as $sig)
                                                                <option value="{{ $sig->id }}"
                                                                    data-name="{{ $sig->name }}"
                                                                    data-url="{{ $sig->signature_url }}"
                                                                    {{ old('signature_id', $invoice->signature_id ?? $defaultSignature?->id) == $sig->id ? 'selected' : '' }}>
                                                                    {{ $sig->name }}
                                                                    @if ($sig->is_default)
                                                                        {{ __('(Par défaut)') }}
                                                                    @endif
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">{{ __('Nom du signataire') }}</label>
                                                        <input type="text" class="form-control" name="signature_name"
                                                            id="signature-name"
                                                            value="{{ old('signature_name', $invoice->signature_name ?? ($defaultSignature?->name ?? '')) }}"
                                                            placeholder="{{ __("Nom du signataire") }}">
                                                    </div>
                                                    @php
                                                        $editSigUrl = null;
                                                        if (old('signature_id', $invoice->signature_id ?? null)) {
                                                            $editSigUrl = $signatures->firstWhere(
                                                                'id',
                                                                old('signature_id', $invoice->signature_id),
                                                            )?->signature_url;
                                                        } elseif ($defaultSignature) {
                                                            $editSigUrl = $defaultSignature->signature_url;
                                                        }
                                                    @endphp
                                                    <div id="signature-preview"
                                                        class="text-center {{ $editSigUrl ? '' : 'd-none' }}">
                                                        <img id="signature-img" src="{{ $editSigUrl ?? '' }}"
                                                            alt="Signature" class="img-fluid border rounded p-2"
                                                            style="max-height: 80px;">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>
                            </div><!-- end card body -->

                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="{{ route('bo.sales.invoices.show', $invoice) }}"
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

    $taxCategoriesJson = $taxCategories
        ->map(function ($tc) {
            return [
                'id' => $tc->id,
                'name' => $tc->name,
                'rate' => $tc->rate,
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

    $existingChargesJson = $invoice->charges
        ->map(function ($c) {
            return [
                'label' => $c->label,
                'amount' => $c->amount,
                'tax_rate' => $c->tax_rate,
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
            const taxCategories = @json($taxCategoriesJson);
            const products = @json($productsJson);
            const existingCharges = @json($existingChargesJson);
            const paymentDays = {{ $paymentDays }};
            const roundOffSetting = {{ $roundOff }};
            const currency = '{{ $currency }}';

            /* =========================================================
             * Due Date link toggle
             * ========================================================= */
            const dueDateLink = document.getElementById('add-due-date-link');
            const dueDateLinkWrapper = document.getElementById('due-date-link-wrapper');
            const dueDateFieldWrapper = document.getElementById('due-date-field-wrapper');
            const dueDateInput = document.getElementById('due_date');

            dueDateLink.addEventListener('click', function() {
                dueDateLinkWrapper.classList.add('d-none');
                dueDateFieldWrapper.classList.remove('d-none');
                // Auto-calculate due date from issue date + payment terms (only if empty)
                const issueDate = document.querySelector('[name="issue_date"]').value;
                if (issueDate && paymentDays > 0 && !dueDateInput.value) {
                    const d = new Date(issueDate);
                    d.setDate(d.getDate() + paymentDays);
                    dueDateInput.value = d.toISOString().split('T')[0];
                }
                dueDateInput.focus();
            });

            /* =========================================================
             * Recurring toggle
             * ========================================================= */
            const recurringCheck = document.getElementById('recurring_check');
            const recurringFields = document.getElementById('recurring-fields');
            const recurringDateFields = document.getElementById('recurring-date-fields');
            const isRecurringInput = document.getElementById('is_recurring_input');

            if (recurringCheck && recurringFields && isRecurringInput) {
                recurringCheck.addEventListener('change', function() {
                    if (this.checked) {
                        recurringFields.classList.remove('d-none');
                        if (recurringDateFields) recurringDateFields.classList.remove('d-none');
                        isRecurringInput.value = '1';
                    } else {
                        recurringFields.classList.add('d-none');
                        if (recurringDateFields) recurringDateFields.classList.add('d-none');
                        isRecurringInput.value = '0';
                    }
                });
            }

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
                        const p = products.find(pr => pr.id === opt.value);
                        if (p) {
                            opt.style.display = (p.item_type === type || !p.item_type) ?
                                '' : 'none';
                        }
                    });
                });
            });

            productSelect.addEventListener('change', function() {
                const pid = this.value;
                if (!pid) return;
                const product = products.find(p => p.id === pid);
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
            let itemIndex = {{ $invoice->items->count() }};
            const tbody = document.querySelector('#items-table .add-tbody');
            const addBtn = document.getElementById('add-item-btn');

            addBtn.addEventListener('click', function() {
                let unitOptions = '<option value="">{{ __('—') }}</option>';
                units.forEach(u => {
                    unitOptions += `<option value="${u.id}">${u.short_name}</option>`;
                });

                let taxOptions = '<option value="" data-rate="0" data-type="">0%</option>';
                if (taxCategories.length) {
                    taxOptions += '<optgroup label="{{ __('Taux de taxes') }}">';
                    taxCategories.forEach(tc => {
                        taxOptions +=
                            `<option value="cat_${tc.id}" data-rate="${tc.rate}" data-type="category">${tc.name} (${tc.rate}%)</option>`;
                    });
                    taxOptions += '</optgroup>';
                }
                if (taxGroups.length) {
                    taxOptions += '<optgroup label="{{ __('Groupes de taxes') }}">';
                    taxGroups.forEach(tg => {
                        taxOptions +=
                            `<option value="${tg.id}" data-rate="${tg.rate}" data-type="group">${tg.name} (${tg.rate}%)</option>`;
                    });
                    taxOptions += '</optgroup>';
                }

                const row = document.createElement('tr');
                row.className = 'item-row';
                row.innerHTML = `
                    <td>
                        <input type="hidden" name="items[${itemIndex}][product_id]" class="item-product-id" value="">
                        <input type="text" name="items[${itemIndex}][label]" class="form-control item-label" placeholder="{{ __('Nom de l\'article') }}" required>
                    </td>
                    <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control item-qty" value="1" min="0.001" step="0.001" required></td>
                    <td><select name="items[${itemIndex}][unit_id]" class="form-select item-unit">${unitOptions}</select></td>
                    <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" value="0" min="0" step="0.01" required></td>
                    <td>
                        <div class="d-flex align-items-center gap-1">
                            <select name="items[${itemIndex}][discount_type]" class="form-select item-discount-type" style="width: 60px;">
                                <option value="none">{{ __('—') }}</option><option value="percentage">%</option><option value="fixed">{{ __('Fixe') }}</option>
                            </select>
                            <input type="number" name="items[${itemIndex}][discount_value]" class="form-control item-discount" value="0" min="0" step="0.01" style="width: 70px;">
                        </div>
                    </td>
                    <td class="tax-col"><select name="items[${itemIndex}][tax_group_id]" class="form-select item-tax">${taxOptions}</select></td>
                    <td><input type="text" class="form-control item-total" value="0,00" readonly></td>
                    <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
                `;
                tbody.appendChild(row);
                itemIndex++;
                bindRowEvents(row);
                if (enableTaxCheck.checked && defaultTaxGroup) {
                    row.querySelector('.item-tax').value = defaultTaxGroup.id;
                }
                row.querySelectorAll('.tax-col').forEach(el => {
                    el.style.display = enableTaxCheck.checked ? '' : 'none';
                });
            });

            tbody.addEventListener('click', function(e) {
                const removeBtn = e.target.closest('.remove-item');
                if (removeBtn) {
                    removeBtn.closest('tr').remove();
                    recalcTotals();
                }
            });

            /* =========================================================
             * Additional charges
             * ========================================================= */
            let chargeIndex = 0;
            const chargesContainer = document.getElementById('charges-container');
            const addChargeBtn = document.getElementById('add-charge-btn');

            function addChargeRow(label = '', amount = '', taxRate = '') {
                const div = document.createElement('div');
                div.className = 'd-flex align-items-center gap-2 mb-2 charge-row';
                div.innerHTML = `
                    <input type="text" name="charges[${chargeIndex}][label]" class="form-control" placeholder="{{ __('Libellé') }}" style="flex: 2;" value="${label}" required>
                    <input type="number" name="charges[${chargeIndex}][amount]" class="form-control charge-amount" placeholder="{{ __("Montant") }}" min="0" step="0.01" style="flex: 1;" value="${amount}" required>
                    <input type="number" name="charges[${chargeIndex}][tax_rate]" class="form-control charge-tax" placeholder="{{ __("Taxe %") }}" min="0" max="100" step="0.01" style="width: 70px;" value="${taxRate}">
                    <a href="javascript:void(0);" class="text-danger remove-charge"><i class="isax isax-close-circle"></i></a>
                `;
                chargesContainer.appendChild(div);
                chargeIndex++;

                div.querySelectorAll('input').forEach(inp => {
                    inp.addEventListener('input', recalcTotals);
                });
                div.querySelector('.remove-charge').addEventListener('click', function() {
                    div.remove();
                    recalcTotals();
                });
            }

            addChargeBtn.addEventListener('click', function() {
                addChargeRow();
            });

            // Populate existing charges from the invoice
            existingCharges.forEach(charge => {
                addChargeRow(charge.label, charge.amount, charge.tax_rate || '');
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
                    const taxEnabled = enableTaxCheck.checked;
                    const taxRate = taxEnabled ? (parseFloat(taxSelect?.selectedOptions[0]?.dataset.rate) ||
                        0) : 0;

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

                // Additional charges
                let chargesTotal = 0;
                document.querySelectorAll('.charge-row').forEach(row => {
                    const amount = parseFloat(row.querySelector('.charge-amount')?.value) || 0;
                    const tax = parseFloat(row.querySelector('.charge-tax')?.value) || 0;
                    chargesTotal += amount + (amount * tax / 100);
                });

                // Global discount (parsed from the text input)
                const gDiscountStr = document.getElementById('global-discount-value').value.replace(',', '.')
                    .replace(/[^0-9.]/g, '');
                const gDiscountVal = parseFloat(gDiscountStr) || 0;
                const isPercent = document.getElementById('global-discount-value').value.includes('%');
                let globalDiscount = 0;
                if (isPercent) {
                    globalDiscount = subtotal * (gDiscountVal / 100);
                } else {
                    globalDiscount = gDiscountVal;
                }

                const beforeRound = subtotal + totalTax + chargesTotal - globalDiscount;

                // Round off
                let roundOff = 0;
                if (document.getElementById('round_off_check').checked && roundOffSetting > 0) {
                    roundOff = Math.round(beforeRound / roundOffSetting) * roundOffSetting - beforeRound;
                }

                const total = Math.max(0, beforeRound + roundOff);

                document.getElementById('display-subtotal').textContent = formatNumber(subtotal);
                document.getElementById('display-tax').textContent = formatNumber(totalTax);
                document.getElementById('display-roundoff').textContent = formatNumber(roundOff);
                document.getElementById('display-total').textContent = formatNumber(total);

                // Total in words
                document.getElementById('display-total-words').textContent = numberToWordsFr(total, currency);
            }

            function formatNumber(num) {
                return num.toFixed(2).replace('.', ',').replace(/\B(?=(?:\d{3})+(?!\d))/g, ' ');
            }

            /**
             * Convert a number to French words
             */
            function numberToWordsFr(amount, cur) {
                if (amount === 0) return 'Zéro';

                const units = ['', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf',
                    'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix-sept', 'dix-huit',
                    'dix-neuf'
                ];
                const tens = ['', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante',
                    'quatre-vingt', 'quatre-vingt'
                ];

                function convertChunk(n) {
                    if (n === 0) return '';
                    if (n < 20) return units[n];
                    if (n < 100) {
                        const t = Math.floor(n / 10);
                        const u = n % 10;
                        if (t === 7 || t === 9) {
                            return tens[t] + (u === 1 && t === 7 ? ' et ' : '-') + units[10 + u];
                        }
                        if (t === 8 && u === 0) return 'quatre-vingts';
                        return tens[t] + (u === 1 && t < 8 ? ' et ' : (u ? '-' : '')) + units[u];
                    }
                    if (n < 1000) {
                        const h = Math.floor(n / 100);
                        const rest = n % 100;
                        let s = (h === 1 ? 'cent' : units[h] + ' cent') + (rest === 0 && h > 1 ? 's' : '');
                        if (rest > 0) s += ' ' + convertChunk(rest);
                        return s;
                    }
                    return '';
                }

                function convert(n) {
                    if (n === 0) return 'zéro';
                    if (n >= 1000000000) {
                        const b = Math.floor(n / 1000000000);
                        const rest = n % 1000000000;
                        return (b === 1 ? 'un milliard' : convert(b) + ' milliards') + (rest > 0 ? ' ' + convert(
                            rest) : '');
                    }
                    if (n >= 1000000) {
                        const m = Math.floor(n / 1000000);
                        const rest = n % 1000000;
                        return (m === 1 ? 'un million' : convert(m) + ' millions') + (rest > 0 ? ' ' + convert(
                            rest) : '');
                    }
                    if (n >= 1000) {
                        const k = Math.floor(n / 1000);
                        const rest = n % 1000;
                        return (k === 1 ? 'mille' : convertChunk(k) + ' mille') + (rest > 0 ? ' ' + convertChunk(
                            rest) : '');
                    }
                    return convertChunk(n);
                }

                const wholePart = Math.floor(amount);
                const centsPart = Math.round((amount - wholePart) * 100);

                const currencyNames = {
                    'MAD': ['dirham', 'dirhams', 'centime', 'centimes'],
                    'EUR': ['euro', 'euros', 'centime', 'centimes'],
                    'USD': ['dollar', 'dollars', 'cent', 'cents'],
                    'GBP': ['livre', 'livres', 'penny', 'pence'],
                    'XOF': ['franc CFA', 'francs CFA', 'centime', 'centimes'],
                    'TND': ['dinar', 'dinars', 'millime', 'millimes'],
                    'DZD': ['dinar', 'dinars', 'centime', 'centimes'],
                };
                const names = currencyNames[cur] || [cur, cur, 'centime', 'centimes'];

                let result = convert(wholePart) + ' ' + (wholePart <= 1 ? names[0] : names[1]);
                if (centsPart > 0) {
                    result += ' et ' + convert(centsPart) + ' ' + (centsPart <= 1 ? names[2] : names[3]);
                }
                return result.charAt(0).toUpperCase() + result.slice(1);
            }

            // Bind events on existing rows
            function bindRowEvents(row) {
                row.querySelectorAll('input, select').forEach(el => {
                    el.addEventListener('input', recalcTotals);
                    el.addEventListener('change', recalcTotals);
                });
            }

            // Init: bind existing rows
            document.querySelectorAll('.item-row').forEach(bindRowEvents);

            // Global discount & round off events
            document.getElementById('global-discount-value').addEventListener('input', recalcTotals);
            document.getElementById('round_off_check').addEventListener('change', recalcTotals);

            /* =========================================================
             * Tax toggle — show/hide tax column & auto-select default
             * ========================================================= */
            const enableTaxCheck = document.getElementById('enable_tax');
            const taxTotalRow = document.getElementById('tax-total-row');
            const defaultTaxGroup = taxGroups.length > 0 ? taxGroups[0] : null;

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
                recalcTotals();
            }

            enableTaxCheck.addEventListener('change', toggleTax);
            toggleTax();

            // Initial calc
            recalcTotals();

            /* =========================================================
             * Signature select → update name + preview
             * ========================================================= */
            const sigSelect = document.getElementById('signature-select');
            const sigName = document.getElementById('signature-name');
            const sigPreview = document.getElementById('signature-preview');
            const sigImg = document.getElementById('signature-img');

            sigSelect.addEventListener('change', function() {
                const opt = this.selectedOptions[0];
                if (this.value && opt) {
                    sigName.value = opt.dataset.name || '';
                    const url = opt.dataset.url || '';
                    if (url) {
                        sigImg.src = url;
                        sigPreview.classList.remove('d-none');
                    } else {
                        sigPreview.classList.add('d-none');
                    }
                } else {
                    sigName.value = '';
                    sigPreview.classList.add('d-none');
                }
            });

        });
    </script>
@endpush
