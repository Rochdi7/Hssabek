?<?php $page = 'add-quotation'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', $documentConfig['create_title'])
@section('description', $documentConfig['create_title'])
@section('content')
    <!-- ========================
                        Start Page Content
                    ========================= -->

    @php
        $currencyCode = App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD'; $currency = $currencyCode === 'MAD' ? 'DH' : $currencyCode;
        $tenant = App\Services\Tenancy\TenantContext::get();
        $documentRouteBase = $documentConfig['route_base'];
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
                            <h6><a href="{{ route($documentRouteBase . '.index') }}" class="d-flex align-items-center"><i
                                        class="isax isax-arrow-left me-2"></i>{{ $documentConfig['plural_label'] }}</a></h6>
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
                        <form action="{{ route($documentRouteBase . '.store') }}" method="POST" id="quote-form">
                            @csrf
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ $documentConfig['details_title'] }}</h6>
                                    </div>
                                    <div>

                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ $documentConfig['number_label'] }}</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="{{ __('Généré automatiquement') }}" readonly>
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
                                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').value=''; document.getElementById('reference_number').focus();">
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
                                                                    value="{{ old('reference_number') }}"
                                                                    placeholder="{{ $documentConfig['reference_placeholder'] }}">
                                                                @error('reference_number')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date d\'émission') }} <span class="text-danger">*</span></label>
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
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date d\'expiration') }}</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text" name="expiry_date"
                                                                        class="form-control datetimepicker rounded-end @error('expiry_date') is-invalid @enderror"
                                                                        value="{{ old('expiry_date') }}"
                                                                        placeholder="{{ now()->format('d M Y') }}">
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
                                                                            role="switch" name="enable_tax"
                                                                            id="enable_tax" value="1"
                                                                            {{ old('enable_tax', '1') == '1' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="enable_tax">{{ __('Activer la
                                                                            taxe') }}</label>
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
                                                    <h6>{{ __('Facturé par') }}</h6>
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
                                                    <input class="form-check-input doc-calc-mode-radio" type="radio" name="document_calculation_mode" id="quote-create-mode-quantity" value="quantity" {{ $documentCalcMode === 'quantity' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="quote-create-mode-quantity">{{ __('Quantité') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-0">
                                                    <input class="form-check-input doc-calc-mode-radio" type="radio" name="document_calculation_mode" id="quote-create-mode-surface" value="surface" {{ $documentCalcMode === 'surface' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="quote-create-mode-surface">{{ __('Surface') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline mb-0">
                                                    <input class="form-check-input doc-calc-mode-radio" type="radio" name="document_calculation_mode" id="quote-create-mode-volume" value="volume" {{ $documentCalcMode === 'volume' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="quote-create-mode-volume">{{ __('Volume') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Table List Start -->
                                    <div class="table-responsive rounded border-bottom-0 border mb-3">
                                        <table class="table table-nowrap add-table mb-0" id="items-table" style="min-width: 900px;">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th style="min-width: 180px;">{{ __('Désignation') }}</th>
                                                    <th class="measurement-column" style="min-width: 68px; text-align:center;{{ $showMeasurementColumns ? '' : 'display:none;' }}">L</th>
                                                    <th class="measurement-column" style="min-width: 68px; text-align:center;{{ $showMeasurementColumns ? '' : 'display:none;' }}">H</th>
                                                    <th style="min-width: 75px;">{{ __('Qté') }}</th>
                                                    <th class="measurement-column" style="min-width: 90px; text-align:center;{{ $showMeasurementColumns ? '' : 'display:none;' }}">{{ __('Métrage') }}</th>
                                                    <th style="min-width: 80px;">{{ __('Unité') }}</th>
                                                    <th style="min-width: 100px;">{{ __('P.U.') }}</th>
                                                    <th style="min-width: 130px;">{{ __('Remise') }}</th>
                                                    <th style="min-width: 110px;" class="tax-col">{{ __('TVA') }}</th>
                                                    <th style="min-width: 90px;">{{ __('Montant') }}</th>
                                                    <th style="min-width: 30px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody">
                                                @php $calcMode0 = old('items.0.calculation_mode', 'quantity'); $isMeasure0 = in_array($calcMode0,['surface','volume']); @endphp
                                                <tr class="item-row" data-mode="{{ $calcMode0 }}">
                                                    <td>
                                                        <input type="hidden" name="items[0][product_id]" class="item-product-id" value="{{ old('items.0.product_id') }}">
                                                        <input type="hidden" name="items[0][calculation_mode]" class="item-calc-mode" value="{{ $calcMode0 }}">
                                                        <input type="hidden" name="items[0][measurement_unit]" class="item-measurement-unit" value="{{ old('items.0.measurement_unit') }}">
                                                        <select class="form-select form-select-sm item-product-select w-100" style="margin-bottom:3px;">
                                                            <option value="">— {{ __('Rechercher un produit…') }} —</option>
                                                            @foreach($products as $p)
                                                                <option value="{{ $p->id }}" {{ old('items.0.product_id')==$p->id?'selected':'' }}>{{ $p->name }}</option>
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
                                                        <span class="badge bg-primary-subtle text-primary item-measure-display fs-11">
                                                            {{ $isMeasure0 && old('items.0.calculated_measurement') ? number_format(old('items.0.calculated_measurement'),3,',','').' '.old('items.0.measurement_unit') : '—' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <select name="items[0][unit_id]" class="form-select item-unit" style="min-width:60px;">
                                                            <option value="">—</option>
                                                            @foreach($units as $unit)
                                                                <option value="{{ $unit->id }}" {{ old('items.0.unit_id')==$unit->id?'selected':'' }}>{{ $unit->short_name }}</option>
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
                                                            @if($taxCategories->count())
                                                            <optgroup label="{{ __('Taux de taxes') }}">
                                                                @foreach($taxCategories as $tc)
                                                                    <option value="cat_{{ $tc->id }}" data-rate="{{ $tc->rate }}" data-type="category" {{ old('items.0.tax_group_id')=='cat_'.$tc->id?'selected':'' }}>{{ $tc->name }} ({{ $tc->rate }}%)</option>
                                                                @endforeach
                                                            </optgroup>
                                                            @endif
                                                            @if($taxGroups->count())
                                                            <optgroup label="{{ __('Groupes de taxes') }}">
                                                                @foreach($taxGroups as $tg)
                                                                    <option value="{{ $tg->id }}" data-rate="{{ $tg->rates->sum('rate') }}" data-type="group" {{ old('items.0.tax_group_id')==$tg->id?'selected':'' }}>{{ $tg->name }} ({{ $tg->rates->sum('rate') }}%)</option>
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
                                <a href="{{ route($documentRouteBase . '.index') }}" class="btn btn-outline-white">{{ __('Annuler') }}</a>
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
    $taxCategoriesJson = $taxCategories
        ->map(function ($tc) {
            return [
                'id' => $tc->id,
                'name' => $tc->name,
                'rate' => $tc->rate,
            ];
        })
        ->values();

    $taxGroupsJson = $taxGroups
        ->map(function ($tg) {
            return [
                'id' => $tg->id,
                'name' => $tg->name,
                'rate' => $tg->rates->sum('rate'),
                'rates' => $tg->rates->map(fn($r) => ['rate' => $r->rate])->values()->toArray(),
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
                'default_calc_mode' => $p->default_calc_mode ?? 'quantity',
                'default_measurement_unit' => $p->default_measurement_unit,
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
            const taxCategories = @json($taxCategoriesJson);
            const taxGroups = @json($taxGroupsJson);
            const products = @json($productsJson);
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

            /* =========================================================
             * Per-row product select handler (delegated)
             * ========================================================= */
            function applyProductToRow(row, product) {
                row.querySelector('.item-product-id').value = product.id;
                row.querySelector('.item-label').value = product.name;
                row.querySelector('.item-price').value = product.selling_price;
                if (product.unit_id) row.querySelector('.item-unit').value = product.unit_id;
                setRowMode(row, getDocumentMode());
                recalcTotals();
            }

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
                        const rate = tg.rates.reduce((sum, r) => sum + parseFloat(r.rate), 0);
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
                        <input type="text" name="items[${itemIndex}][label]" class="form-control form-control-sm item-label flex-grow-1" placeholder="{{ __('Désignation') }}" required>
                    </td>
                    <td class="measurement-column dim-col dim-l" style="display:none;">
                        <input type="number" name="items[${itemIndex}][length]" class="form-control item-length" value="" min="0" step="0.001" placeholder="0" style="width:64px;">
                    </td>
                    <td class="measurement-column dim-col dim-h" style="display:none;">
                        <input type="number" name="items[${itemIndex}][height]" class="form-control item-height" value="" min="0" step="0.001" placeholder="0" style="width:64px;">
                    </td>
                    <td>
                        <input type="number" name="items[${itemIndex}][quantity]" class="form-control item-qty" value="1" min="0.001" step="0.001" required style="width:70px;">
                    </td>
                    <td class="measurement-column dim-col text-center" style="display:none;">
                        <div class="item-width-wrap mb-1" style="display:none;">
                            <input type="number" name="items[${itemIndex}][width]" class="form-control item-width" value="" min="0" step="0.001" placeholder="P" style="width:64px;">
                        </div>
                        <span class="badge bg-primary-subtle text-primary item-measure-display fs-11">—</span>
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
                    const taxRate = taxEnabled ? (parseFloat(taxSelect?.selectedOptions[0]?.dataset.rate) || 0) : 0;
                    const mode = row.querySelector('.item-calc-mode')?.value || 'quantity';
                    const l = parseFloat(row.querySelector('.item-length')?.value) || 0;
                    const h = parseFloat(row.querySelector('.item-height')?.value) || 0;
                    const w = parseFloat(row.querySelector('.item-width')?.value) || 0;
                    const { value: measurement } = resolveMeasurement(mode, l, h, w);
                    const effectiveQty = isMeasurementMode(mode)
                        ? (measurement > 0 ? measurement * baseQty : 0)
                        : baseQty;

                    let lineSubtotal = effectiveQty * price;
                    let lineDiscount = 0;
                    if (discountType === 'percentage') lineDiscount = lineSubtotal * (discountVal / 100);
                    else if (discountType === 'fixed') lineDiscount = Math.min(discountVal, lineSubtotal);

                    const afterDiscount = Math.max(0, lineSubtotal - lineDiscount);
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
             * Bind row events
             * ========================================================= */
            function bindRowEvents(row) {
                // Product selector is handled by Select2 (initRowSelect2)
                row.querySelectorAll('.item-length, .item-height, .item-width').forEach(inp => {
                    inp.addEventListener('input', function() {
                        updateRowMeasurement(row);
                        recalcTotals();
                    });
                });
                // Standard calc inputs
                row.querySelectorAll('.item-qty, .item-price, .item-discount').forEach(inp => {
                    inp.addEventListener('input', recalcTotals);
                });
                row.querySelectorAll('.item-discount-type, .item-tax').forEach(sel => {
                    sel.addEventListener('change', recalcTotals);
                });
            }

            // Bind initial rows
            document.querySelectorAll('.item-row').forEach(row => {
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

            // Initial calculation
            recalcTotals();
        });
    </script>
@endpush

