<?php $page = 'add-invoice'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouvelle Facture')
@section('description', 'Créer une nouvelle facture de vente')
@section('content')
    <!-- ========================
                                        Start Page Content
                                    ========================= -->

    @php
        $defaultTerms = $invoiceSettings['invoice_terms'] ?? '';
        $defaultFooter = $invoiceSettings['invoice_footer'] ?? '';
        $paymentDays = (int) ($invoiceSettings['payment_terms_days'] ?? 30);
        $showCompany = $invoiceSettings['show_company_details'] ?? true;
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
                        <form action="{{ route('bo.sales.invoices.store') }}" method="POST" id="invoice-form">
                            @csrf
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ __('Détails de la facture') }}</h6>
                                    </div>
                                    <div>

                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-12 col-md-7">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('N° Facture') }}</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="{{ __('Généré automatiquement') }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date d\'émission') }}</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text" name="issue_date"
                                                                        class="form-control datetimepicker rounded-end @error('issue_date') is-invalid @enderror"
                                                                        value="{{ old('issue_date', date('d-m-Y')) }}"
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
                                                        <div class="col-md-12" id="due-date-link-wrapper">
                                                            <div class="mb-3">
                                                                <a href="javascript:void(0);"
                                                                    class="d-inline-flex align-items-center"
                                                                    id="add-due-date-link"><i
                                                                        class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter
                                                                    une date d\'échéance') }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 d-none" id="due-date-field-wrapper">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date d\'échéance') }}</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text" name="due_date" id="due_date"
                                                                        class="form-control datetimepicker rounded-end @error('due_date') is-invalid @enderror"
                                                                        value="{{ old('due_date') }}"
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
                                                        <div class="col-md-12" style="display:none">
                                                            <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
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
                                                                        <select class="form-select" name="recurring_every"
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
                                                        </div>
                                                        {{-- Recurring date fields --}}
                                                        <div class="col-md-12 d-none"
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
                                                                                <i class="isax isax-calendar-2"></i>
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
                                                                            <input type="text" name="recurring_end_at"
                                                                                id="recurring_end_at"
                                                                                class="form-control datetimepicker rounded-end @error('recurring_end_at') is-invalid @enderror"
                                                                                value="{{ old('recurring_end_at') }}"
                                                                                placeholder="{{ __('Sans fin') }}">
                                                                            <span
                                                                                class="input-icon-addon fs-16 text-gray-9">
                                                                                <i class="isax isax-calendar-2"></i>
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
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-md-5 mt-3 mt-md-0">
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
                                                                            {{ old('enable_tax', '1') == '1' ? 'checked' : '' }}>
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

                                @php
                                    $itemModes = collect(old('items', []))->pluck('calculation_mode')->filter();
                                    $documentCalcMode = old('document_calculation_mode')
                                        ?? ($itemModes->contains('volume') ? 'volume' : ($itemModes->contains('surface') ? 'surface' : 'quantity'));
                                    $showMeasurementColumns = in_array($documentCalcMode, ['surface', 'volume']);
                                @endphp
                                <div class="items-details">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ __('Articles & Détails') }}</h6>
                                        <div class="d-flex flex-wrap align-items-center gap-3 mt-2">
                                            <span class="text-muted fs-13">{{ __('Mode de calcul') }}</span>
                                            <div class="d-flex flex-wrap gap-3">
                                                <div class="form-check form-check-inline mb-0">
                                                    <input class="form-check-input doc-calc-mode-radio" type="radio" name="document_calculation_mode" id="invoice-create-mode-quantity" value="quantity" {{ $documentCalcMode === 'quantity' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="invoice-create-mode-quantity">{{ __('Quantité') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-0">
                                                    <input class="form-check-input doc-calc-mode-radio" type="radio" name="document_calculation_mode" id="invoice-create-mode-surface" value="surface" {{ $documentCalcMode === 'surface' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="invoice-create-mode-surface">{{ __('Surface') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-0">
                                                    <input class="form-check-input doc-calc-mode-radio" type="radio" name="document_calculation_mode" id="invoice-create-mode-volume" value="volume" {{ $documentCalcMode === 'volume' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="invoice-create-mode-volume">{{ __('Volume') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Table List Start -->
                                    <div class="table-responsive rounded border-bottom-0 border mb-3">
                                        <table class="table table-nowrap add-table m-0" id="items-table" style="min-width: 820px;">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th style="color:#fff; min-width:160px;">{{ __('Désignation') }}</th>
                                                    <th class="measurement-column" style="color:#fff; min-width:64px;{{ $showMeasurementColumns ? '' : 'display:none;' }}">L</th>
                                                    <th class="measurement-column" style="color:#fff; min-width:64px;{{ $showMeasurementColumns ? '' : 'display:none;' }}">H</th>
                                                    <th style="color:#fff; min-width:70px;">{{ __('Qté') }}</th>
                                                    <th class="measurement-column" style="color:#fff; min-width:80px;{{ $showMeasurementColumns ? '' : 'display:none;' }}">{{ __('Métrage') }}</th>
                                                    <th style="color:#fff; min-width:70px;">{{ __('Unité') }}</th>
                                                    <th style="color:#fff; min-width:100px;">{{ __('P.U.') }}</th>
                                                    <th style="color:#fff; min-width:130px;">{{ __('Remise') }}</th>
                                                    <th style="color:#fff; min-width:110px;" class="tax-col">{{ __('TVA') }}</th>
                                                    <th style="color:#fff; min-width:90px;">{{ __('Montant') }}</th>
                                                    <th style="color:#fff; min-width:30px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody">
                                                @php
                                                    $calcMode0inv = old('items.0.calculation_mode', 'quantity');
                                                    $isMeasure0inv = in_array($calcMode0inv, ['surface', 'volume']);
                                                @endphp
                                                <tr class="item-row" data-mode="{{ $calcMode0inv }}">
                                                    <td>
                                                        <input type="hidden" name="items[0][product_id]" class="item-product-id" value="{{ old('items.0.product_id') }}">
                                                        <input type="hidden" name="items[0][calculation_mode]" class="item-calc-mode" value="{{ $calcMode0inv }}">
                                                        <input type="hidden" name="items[0][measurement_unit]" class="item-measurement-unit" value="{{ old('items.0.measurement_unit') }}">
                                                        <select class="form-select form-select-sm item-product-select w-100" style="margin-bottom:3px;">
                                                            <option value="">— {{ __('Rechercher un produit…') }} —</option>
                                                            @foreach($products as $p)
                                                                <option value="{{ $p->id }}" {{ old('items.0.product_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="text" name="items[0][label]" class="form-control form-control-sm item-label flex-grow-1" value="{{ old('items.0.label') }}" placeholder="{{ __('Désignation') }}" required>
                                                    </td>
                                                    <td class="measurement-column dim-col dim-l" style="{{ $showMeasurementColumns ? '' : 'display:none;' }}">
                                                        <input type="number" name="items[0][length]" class="form-control item-length" value="{{ old('items.0.length') }}" min="0" step="0.001" placeholder="0" style="width:64px;">
                                                    </td>
                                                    <td class="measurement-column dim-col dim-h" style="{{ $showMeasurementColumns ? '' : 'display:none;' }}">
                                                        <input type="number" name="items[0][height]" class="form-control item-height" value="{{ old('items.0.height') }}" min="0" step="0.001" placeholder="0" style="width:64px;">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="items[0][quantity]" class="form-control item-qty" value="{{ old('items.0.quantity', 1) }}" min="0.001" step="0.001" required style="width:70px;">
                                                    </td>
                                                    <td class="measurement-column dim-col text-center" style="{{ $showMeasurementColumns ? '' : 'display:none;' }}">
                                                        <div class="item-width-wrap mb-1" style="{{ $documentCalcMode === 'volume' ? '' : 'display:none;' }}">
                                                            <input type="number" name="items[0][width]" class="form-control item-width" value="{{ old('items.0.width') }}" min="0" step="0.001" placeholder="P" style="width:64px;">
                                                        </div>
                                                        <span class="badge bg-primary-subtle text-primary item-measure-display fs-11">—</span>
                                                    </td>
                                                    <td>
                                                        <select name="items[0][unit_id]" class="form-select item-unit" style="min-width:60px;">
                                                            <option value="">—</option>
                                                            @foreach ($units as $unit)
                                                                <option value="{{ $unit->id }}" {{ old('items.0.unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->short_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="items[0][unit_price]" class="form-control item-price" value="{{ old('items.0.unit_price', 0) }}" min="0" step="0.01" required>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <select name="items[0][discount_type]" class="form-select item-discount-type" style="width:55px;">
                                                                <option value="none">—</option>
                                                                <option value="percentage">%</option>
                                                                <option value="fixed">{{ __('Fixe') }}</option>
                                                            </select>
                                                            <input type="number" name="items[0][discount_value]" class="form-control item-discount" value="{{ old('items.0.discount_value', 0) }}" min="0" step="0.01" style="width:65px;">
                                                        </div>
                                                    </td>
                                                    <td class="tax-col">
                                                        <select name="items[0][tax_group_id]" class="form-select item-tax">
                                                            <option value="" data-rate="0" data-type="">0%</option>
                                                            @if ($taxCategories->count())
                                                                <optgroup label="{{ __('Taux de taxes') }}">
                                                                    @foreach ($taxCategories as $tc)
                                                                        <option value="cat_{{ $tc->id }}" data-rate="{{ $tc->rate }}" data-type="category" {{ old('items.0.tax_group_id') == 'cat_'.$tc->id ? 'selected' : '' }}>{{ $tc->name }} ({{ $tc->rate }}%)</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endif
                                                            @if ($taxGroups->count())
                                                                <optgroup label="{{ __('Groupes de taxes') }}">
                                                                    @foreach ($taxGroups as $tg)
                                                                        <option value="{{ $tg->id }}" data-rate="{{ $tg->rates->sum('rate') }}" data-type="group" {{ old('items.0.tax_group_id') == $tg->id ? 'selected' : '' }}>{{ $tg->name }} ({{ $tg->rates->sum('rate') }}%)</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control item-total" value="0,00" readonly>
                                                    </td>
                                                    <td></td>
                                                </tr>
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
                                        <div class="col-12 col-md-7">
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
                                                                data-bs-toggle="tab" data-bs-target="#addition-tab"
                                                                href="javascript:void(0);"><i
                                                                    class="isax isax-building me-1"></i>{{ __('Addition') }}</a>
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
                                                        <div class="tab-pane fade" id="addition-tab" role="tabpanel">
                                                            <label class="form-label">{{ __('Addition') }} <small class="text-muted fw-normal">({{ __('Chantier, référence projet...') }})</small></label>
                                                            <input type="text" class="form-control" name="addition" value="{{ old('addition') }}" placeholder="{{ __('ex: Chantier villa riad al menzeh meknes') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-12 col-md-5">
                                            <ul class="mb-0 ps-0 list-unstyled">
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">{{ __('Sous-total') }}</p>
                                                        <h6 class="fs-14" id="display-subtotal">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3 d-none" id="tax-total-row">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">{{ __('Taxe') }}</p>
                                                        <h6 class="fs-14" id="display-tax">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3 d-none" id="charges-container">
                                                    {{-- Additional charges injected by JS --}}
                                                </li>
                                                <li class="mb-3 d-none">
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
                                                                    {{ old('signature_id', $defaultSignature?->id) == $sig->id ? 'selected' : '' }}>
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
                                                            value="{{ old('signature_name', $defaultSignature?->name ?? '') }}"
                                                            placeholder="{{ __("Nom du signataire") }}">
                                                    </div>
                                                    <div id="signature-preview"
                                                        class="text-center {{ $defaultSignature?->signature_url ? '' : 'd-none' }}">
                                                        <img id="signature-img"
                                                            src="{{ $defaultSignature?->signature_url ?? '' }}"
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
                                <a href="{{ route('bo.sales.invoices.index') }}"
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
            const paymentDays = {{ $paymentDays }};
            const currency = '{{ $currency }}';
            const documentModeRadios = document.querySelectorAll('.doc-calc-mode-radio');

            function isMeasurementMode(mode) {
                return mode === 'surface' || mode === 'volume';
            }

            function getDocumentMode() {
                return document.querySelector('.doc-calc-mode-radio:checked')?.value || 'quantity';
            }

            function toggleMeasurementColumns(mode) {
                const show = isMeasurementMode(mode);
                document.querySelectorAll('.measurement-column').forEach(el => {
                    el.style.display = show ? '' : 'none';
                });
            }

            function resolveMeasurement(mode, length, height, width) {
                if (mode === 'surface') {
                    return {
                        value: (length > 0 && height > 0) ? length * height : 0,
                        unit: 'm²',
                    };
                }

                if (mode === 'volume') {
                    return {
                        value: (length > 0 && height > 0 && width > 0) ? length * height * width : 0,
                        unit: 'm³',
                    };
                }

                return {
                    value: 0,
                    unit: '',
                };
            }

            function ensureMeasurementRowUi(row) {
                row.querySelectorAll('.mode-btn').forEach(btn => btn.remove());

                const lengthCell = row.querySelector('.item-length')?.closest('td');
                if (lengthCell) {
                    lengthCell.classList.add('measurement-column');
                    lengthCell.style.visibility = '';
                }

                const heightCell = row.querySelector('.item-height')?.closest('td');
                if (heightCell) {
                    heightCell.classList.add('measurement-column');
                    heightCell.style.visibility = '';
                }

                const measureDisplay = row.querySelector('.item-measure-display');
                const measureCell = measureDisplay?.closest('td');
                if (measureCell) {
                    measureCell.classList.add('measurement-column');
                    measureCell.style.visibility = '';
                }

                const existingWidthField = row.querySelector('.item-width');
                if (existingWidthField) {
                    let widthInput = existingWidthField;

                    if (existingWidthField.type === 'hidden') {
                        widthInput = document.createElement('input');
                        widthInput.type = 'number';
                        widthInput.name = existingWidthField.name;
                        widthInput.className = existingWidthField.className;
                        widthInput.value = existingWidthField.value || '';
                        widthInput.min = '0';
                        widthInput.step = '0.001';
                        widthInput.placeholder = 'P';
                        widthInput.style.width = '64px';
                        existingWidthField.replaceWith(widthInput);
                    }

                    if (!widthInput.closest('.item-width-wrap') && measureCell) {
                        const widthWrap = document.createElement('div');
                        widthWrap.className = 'item-width-wrap mb-1';
                        widthWrap.style.display = 'none';
                        measureCell.insertBefore(widthWrap, measureCell.firstChild);
                        widthWrap.appendChild(widthInput);
                    }
                }
            }

            /* =========================================================
             * Due Date link toggle
             * ========================================================= */
            const dueDateLink = document.getElementById('add-due-date-link');
            const dueDateLinkWrapper = document.getElementById('due-date-link-wrapper');
            const dueDateFieldWrapper = document.getElementById('due-date-field-wrapper');
            const dueDateInput = document.getElementById('due_date');

            @if (old('due_date'))
                dueDateLinkWrapper.classList.add('d-none');
                dueDateFieldWrapper.classList.remove('d-none');
            @endif

            dueDateLink.addEventListener('click', function() {
                dueDateLinkWrapper.classList.add('d-none');
                dueDateFieldWrapper.classList.remove('d-none');
                // Auto-calculate due date from issue date + payment terms
                const issueDate = document.querySelector('[name="issue_date"]').value;
                if (issueDate && paymentDays > 0) {
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

            recurringCheck.addEventListener('change', function() {
                if (this.checked) {
                    recurringFields.classList.remove('d-none');
                    recurringDateFields.classList.remove('d-none');
                    isRecurringInput.value = '1';
                } else {
                    recurringFields.classList.add('d-none');
                    recurringDateFields.classList.add('d-none');
                    isRecurringInput.value = '0';
                }
            });


            /* =========================================================
             * Add / Remove item rows
             * ========================================================= */
            let itemIndex = 1;
            const tbody = document.querySelector('#items-table .add-tbody');
            const addBtn = document.getElementById('add-item-btn');

            function buildUnitOptions() {
                let s = '<option value="">—</option>';
                units.forEach(u => s += `<option value="${u.id}">${u.short_name}</option>`);
                return s;
            }
            function buildTaxOptions() {
                let s = '<option value="" data-rate="0" data-type="">0%</option>';
                if (taxCategories.length) {
                    s += '<optgroup label="{{ __('Taux de taxes') }}">';
                    taxCategories.forEach(tc => s += `<option value="cat_${tc.id}" data-rate="${tc.rate}" data-type="category">${tc.name} (${tc.rate}%)</option>`);
                    s += '</optgroup>';
                }
                if (taxGroups.length) {
                    s += '<optgroup label="{{ __('Groupes de taxes') }}">';
                    taxGroups.forEach(tg => {
                        const rate = tg.rates ? tg.rates.reduce((sum, r) => sum + parseFloat(r.rate), 0) : (tg.rate ?? 0);
                        s += `<option value="${tg.id}" data-rate="${rate}" data-type="group">${tg.name} (${rate}%)</option>`;
                    });
                    s += '</optgroup>';
                }
                return s;
            }
            function buildProductOptions() {
                let s = '<option value="">— {{ __('Catalogue') }} —</option>';
                products.forEach(p => s += `<option value="${p.id}">${p.name}</option>`);
                return s;
            }
            function applyProductToRow(row, product) {
                row.querySelector('.item-product-id').value = product.id;
                row.querySelector('.item-label').value = product.name;
                row.querySelector('.item-price').value = product.selling_price;
                if (product.unit_id) row.querySelector('.item-unit').value = product.unit_id;
                setRowMode(row, getDocumentMode());
                recalcTotals();
            }

            addBtn.addEventListener('click', function() {
                const unitOptions = buildUnitOptions();
                const taxOptions = buildTaxOptions();
                const productOptions = buildProductOptions();

                const row = document.createElement('tr');
                row.className = 'item-row';
                row.dataset.mode = 'quantity';
                row.innerHTML = `
                    <td>
                        <input type="hidden" name="items[${itemIndex}][product_id]" class="item-product-id" value="">
                        <input type="hidden" name="items[${itemIndex}][calculation_mode]" class="item-calc-mode" value="quantity">
                        <input type="hidden" name="items[${itemIndex}][measurement_unit]" class="item-measurement-unit" value="">
                        <select class="form-select form-select-sm item-product-select w-100" style="margin-bottom:3px;">${productOptions}</select>
                        <div class="d-flex gap-1 align-items-center">
                            <input type="text" name="items[${itemIndex}][label]" class="form-control form-control-sm item-label flex-grow-1" placeholder="{{ __('Désignation') }}" required>
                            <button type="button" class="btn btn-xs mode-btn btn-primary" data-mode="quantity" title="{{ __('Quantité') }}" style="padding:2px 6px;font-size:10px;white-space:nowrap;">Q</button>
                            <button type="button" class="btn btn-xs mode-btn btn-outline-secondary" data-mode="surface" title="{{ __('Surface m²') }}" style="padding:2px 6px;font-size:10px;white-space:nowrap;">S</button>
                            <button type="button" class="btn btn-xs mode-btn btn-outline-secondary" data-mode="volume" title="{{ __('Volume m³') }}" style="padding:2px 6px;font-size:10px;white-space:nowrap;">V</button>
                        </div>
                    </td>
                    <td class="dim-col dim-l" style="visibility:hidden;">
                        <input type="number" name="items[${itemIndex}][length]" class="form-control item-length" value="" min="0" step="0.001" placeholder="0" style="width:64px;">
                    </td>
                    <td class="dim-col dim-h" style="visibility:hidden;">
                        <input type="number" name="items[${itemIndex}][height]" class="form-control item-height" value="" min="0" step="0.001" placeholder="0" style="width:64px;">
                    </td>
                    <td>
                        <input type="number" name="items[${itemIndex}][quantity]" class="form-control item-qty" value="1" min="0.001" step="0.001" required style="width:70px;">
                    </td>
                    <td class="dim-col text-center" style="visibility:hidden;">
                        <span class="badge bg-primary-subtle text-primary item-measure-display fs-11">—</span>
                        <input type="hidden" name="items[${itemIndex}][width]" class="item-width" value="">
                    </td>
                    <td><select name="items[${itemIndex}][unit_id]" class="form-select item-unit" style="min-width:60px;">${unitOptions}</select></td>
                    <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" value="0" min="0" step="0.01" required></td>
                    <td>
                        <div class="d-flex align-items-center gap-1">
                            <select name="items[${itemIndex}][discount_type]" class="form-select item-discount-type" style="width:55px;">
                                <option value="none">—</option><option value="percentage">%</option><option value="fixed">{{ __('Fixe') }}</option>
                            </select>
                            <input type="number" name="items[${itemIndex}][discount_value]" class="form-control item-discount" value="0" min="0" step="0.01" style="width:65px;">
                        </div>
                    </td>
                    <td class="tax-col"><select name="items[${itemIndex}][tax_group_id]" class="form-select item-tax">${taxOptions}</select></td>
                    <td><input type="text" class="form-control item-total" value="0,00" readonly></td>
                    <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
                `;

                tbody.appendChild(row);
                itemIndex++;
                ensureMeasurementRowUi(row);
                bindRowEvents(row);
                initRowSelect2(row);
                setRowMode(row, getDocumentMode());
                toggleMeasurementColumns(getDocumentMode());
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

            addChargeBtn.addEventListener('click', function() {
                const div = document.createElement('div');
                div.className = 'd-flex align-items-center gap-2 mb-2 charge-row';
                div.innerHTML = `
                    <input type="text" name="charges[${chargeIndex}][label]" class="form-control" placeholder="{{ __('Libellé') }}" style="flex: 2;" required>
                    <input type="number" name="charges[${chargeIndex}][amount]" class="form-control charge-amount" placeholder="{{ __("Montant") }}" min="0" step="0.01" style="flex: 1;" required>
                    <input type="number" name="charges[${chargeIndex}][tax_rate]" class="form-control charge-tax" placeholder="{{ __("Taxe %") }}" min="0" max="100" step="0.01" style="width: 70px;">
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
            });

            /* =========================================================
             * Mode helpers — single row, inline columns
             * ========================================================= */
            function setRowMode(row, mode) {
                row.dataset.mode = mode;
                row.querySelector('.item-calc-mode').value = mode;
                const widthWrap = row.querySelector('.item-width-wrap');
                if (widthWrap) {
                    widthWrap.style.display = mode === 'volume' ? '' : 'none';
                }
                updateRowMeasurement(row);
            }

            function updateRowMeasurement(row) {
                const mode = row.querySelector('.item-calc-mode')?.value || 'quantity';
                const l = parseFloat(row.querySelector('.item-length')?.value) || 0;
                const h = parseFloat(row.querySelector('.item-height')?.value) || 0;
                const w = parseFloat(row.querySelector('.item-width')?.value) || 0;
                const unitInput = row.querySelector('.item-measurement-unit');
                const display = row.querySelector('.item-measure-display');
                const { value: measurement, unit } = resolveMeasurement(mode, l, h, w);
                if (unitInput) unitInput.value = unit;
                if (display) display.textContent = measurement > 0 ? `${formatNumber(measurement)} ${unit}` : '—';
            }


            /* =========================================================
             * Real-time totals calculation
             * ========================================================= */
            function recalcTotals() {
                let subtotal = 0;
                let totalTax = 0;

                document.querySelectorAll('.item-row').forEach(row => {
                    const baseQty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
                    const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
                    const discountType = row.querySelector('.item-discount-type')?.value || 'none';
                    const discountVal = parseFloat(row.querySelector('.item-discount')?.value) || 0;
                    const taxSelect = row.querySelector('.item-tax');
                    const taxEnabled = enableTaxCheck.checked;
                    const taxRate = taxEnabled ? (parseFloat(taxSelect?.selectedOptions[0]?.dataset.rate) ||
                        0) : 0;
                    const mode = row.querySelector('.item-calc-mode')?.value || 'quantity';

                    const l = parseFloat(row.querySelector('.item-length')?.value) || 0;
                    const h = parseFloat(row.querySelector('.item-height')?.value) || 0;
                    const w = parseFloat(row.querySelector('.item-width')?.value) || 0;
                    const { value: measurement } = resolveMeasurement(mode, l, h, w);
                    const qty = isMeasurementMode(mode)
                        ? (measurement > 0 ? measurement * baseQty : 0)
                        : baseQty;

                    let lineSubtotal = qty * price;
                    let lineDiscount = 0;

                    if (discountType === 'percentage') {
                        lineDiscount = lineSubtotal * (discountVal / 100);
                    } else if (discountType === 'fixed') {
                        lineDiscount = Math.min(discountVal, lineSubtotal);
                    }

                    const afterDiscount = Math.max(0, lineSubtotal - lineDiscount);
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

                const total = Math.max(0, subtotal + totalTax + chargesTotal - globalDiscount);

                document.getElementById('display-subtotal').textContent = formatNumber(subtotal);
                document.getElementById('display-tax').textContent = formatNumber(totalTax);
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

            function bindRowEvents(row) {
                // Product selector handled by initRowSelect2
                row.querySelectorAll('.item-length, .item-height, .item-width').forEach(inp => {
                    inp.addEventListener('input', function() {
                        updateRowMeasurement(row);
                        recalcTotals();
                    });
                });
                row.querySelectorAll('.item-qty, .item-price, .item-discount').forEach(inp => {
                    inp.addEventListener('input', recalcTotals);
                });
                row.querySelectorAll('.item-discount-type, .item-tax').forEach(sel => {
                    sel.addEventListener('change', recalcTotals);
                });
            }

            // Init: bind existing rows
            document.querySelectorAll('.item-row').forEach(row => {
                ensureMeasurementRowUi(row);
                bindRowEvents(row);
                updateRowMeasurement(row);
                initRowSelect2(row);
            });

            documentModeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const mode = this.value;
                    toggleMeasurementColumns(mode);
                    document.querySelectorAll('.item-row').forEach(row => {
                        setRowMode(row, mode);
                    });
                    recalcTotals();
                });
            });

            toggleMeasurementColumns(getDocumentMode());
            document.querySelectorAll('.item-row').forEach(row => {
                setRowMode(row, getDocumentMode());
            });

            // Global discount events
            document.getElementById('global-discount-value').addEventListener('input', recalcTotals);

            /* =========================================================
             * Tax toggle — show/hide tax column & auto-select default
             * ========================================================= */
            const enableTaxCheck = document.getElementById('enable_tax');
            const taxTotalRow = document.getElementById('tax-total-row');
            const defaultTaxGroup = taxGroups.length > 0 ? taxGroups[0] : null;

            function toggleTax() {
                const enabled = enableTaxCheck.checked;
                // Show/hide tax column header + cells
                document.querySelectorAll('.tax-col').forEach(el => {
                    el.style.display = enabled ? '' : 'none';
                });
                // Show/hide tax total line
                if (taxTotalRow) taxTotalRow.style.display = enabled ? '' : 'none';

                // When disabled: reset all tax selects to 0
                if (!enabled) {
                    document.querySelectorAll('.item-tax').forEach(sel => {
                        sel.value = '';
                    });
                }
                // When enabled: auto-select default tax group if current is empty
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
            // Apply initial state
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
