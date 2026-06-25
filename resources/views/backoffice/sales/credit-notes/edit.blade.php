<?php $page = 'edit-credit-notes'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', "Modifier l'Avoir")
@section('description', "Modifier les détails de l'avoir")
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
                            <h6><a href="{{ route('bo.sales.credit-notes.index') }}" class="d-flex align-items-center"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Avoirs') }}</a></h6>
                        </div>
                        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                            <div class="me-1">
                                <a href="{{ route('bo.sales.credit-notes.show', $creditNote) }}"
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
                        <form action="{{ route('bo.sales.credit-notes.update', $creditNote) }}" method="POST"
                            id="credit-note-form">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>{{ __('Modifier l\'avoir') }}</h6>
                                    </div>
                                    <div>

                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('N° Avoir') }}</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $creditNote->number }}" readonly>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="reference_number"
                                                            value="{{ old('reference_number', $creditNote->reference_number) }}">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Facture liée') }}</label>
                                                                <select name="invoice_id"
                                                                    class="select @error('invoice_id') is-invalid @enderror">
                                                                    <option value="">{{ __('Sélectionner une facture') }}</option>
                                                                    @foreach ($invoices as $inv)
                                                                        <option value="{{ $inv->id }}"
                                                                            {{ old('invoice_id', $creditNote->invoice_id) == $inv->id ? 'selected' : '' }}>
                                                                            {{ $inv->number }}
                                                                            — {{ $inv->customer->name ?? '' }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('invoice_id')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                                <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Optionnel. Si vous liez cet avoir à une facture, le montant de l\'avoir sera appliqué automatiquement et réduira le reste à payer de cette facture.') }}</small>
                                                                <!-- Invoice summary panel -->
                                                                <div id="invoice-summary-panel" class="d-none mt-2 p-3 border rounded bg-light">
                                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                                        <small class="text-muted fw-semibold">{{ __('Total facture') }}</small>
                                                                        <small class="fw-semibold" id="inv-total">—</small>
                                                                    </div>
                                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                                        <small class="text-muted">{{ __('Déjà payé') }}</small>
                                                                        <small class="text-success" id="inv-paid">—</small>
                                                                    </div>
                                                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                                                        <small class="text-muted">{{ __('Déjà crédité') }}</small>
                                                                        <small class="text-info" id="inv-credited">—</small>
                                                                    </div>
                                                                    <div class="d-flex align-items-center justify-content-between border-top pt-1 mt-1">
                                                                        <small class="fw-semibold">{{ __('Reste à payer') }}</small>
                                                                        <small class="fw-semibold text-danger" id="inv-due">—</small>
                                                                    </div>
                                                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                                                        <small class="fw-semibold">{{ __('Cet avoir') }}</small>
                                                                        <small class="fw-semibold text-primary" id="inv-this-credit">0,00</small>
                                                                    </div>
                                                                    <div class="d-flex align-items-center justify-content-between border-top pt-1 mt-1">
                                                                        <small class="fw-semibold">{{ __('Reste après avoir') }}</small>
                                                                        <small class="fw-semibold" id="inv-after">—</small>
                                                                    </div>
                                                                </div>
                                                                <div id="over-credit-warning" class="d-none alert alert-warning py-1 px-2 mt-2 mb-0 fs-12">
                                                                    <i class="isax isax-warning-2 me-1"></i>{{ __('Le montant de l\'avoir dépasse le reste à payer. Veuillez réduire le montant.') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">{{ __('Date de l\'avoir') }} <span class="text-danger">*</span></label>
                                                            <div class="input-group position-relative mb-3">
                                                                <input type="text" name="issue_date"
                                                                    class="form-control datetimepicker rounded-end @error('issue_date') is-invalid @enderror"
                                                                    value="{{ old('issue_date', $creditNote->issue_date?->format('d-m-Y')) }}"
                                                                    placeholder="{{ now()->format('d M Y') }}">
                                                                <span class="input-icon-addon fs-16 text-gray-9">
                                                                    <i class="isax isax-calendar-2"></i>
                                                                </span>
                                                                @error('issue_date')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 {{ old('due_date', $creditNote->due_date) ? 'd-none' : '' }}"
                                                            id="due-date-link-wrapper">
                                                            <div class="mb-3">
                                                                <a href="javascript:void(0);"
                                                                    class="d-inline-flex align-items-center"
                                                                    id="add-due-date-link"><i
                                                                        class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter
                                                                    une date d\'échéance') }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 {{ old('due_date', $creditNote->due_date) ? '' : 'd-none' }}"
                                                            id="due-date-field-wrapper">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Date d\'échéance') }}</label>
                                                                <div class="input-group position-relative">
                                                                    <input type="text" name="due_date" id="due_date"
                                                                        class="form-control datetimepicker rounded-end @error('due_date') is-invalid @enderror"
                                                                        value="{{ old('due_date', $creditNote->due_date?->format('d-m-Y')) }}"
                                                                        placeholder="{{ now()->format('d M Y') }}">
                                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                                        <i class="isax isax-calendar-2"></i>
                                                                    </span>
                                                                    @error('due_date')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
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
                                                                    @if ($tenant->invoice_image_url)
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
                                                                            {{ old('enable_tax', $creditNote->enable_tax) ? 'checked' : '' }}>
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
                                                            value="{{ $tenant->name }}" readonly disabled>
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
                                                    <h6>{{ __('Client') }}</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <label class="form-label">{{ __('Nom du client') }} <span class="text-danger">*</span></label>
                                                            <a href="{{ route('bo.crm.customers.create') }}"
                                                                class="d-flex align-items-center"><i
                                                                    class="isax isax-add-circle5 text-primary me-1"></i>{{ __('Ajouter') }}</a>
                                                        </div>
                                                        <select name="customer_id"
                                                            class="select @error('customer_id') is-invalid @enderror">
                                                            <option value="">{{ __('Sélectionner un client') }}</option>
                                                            @foreach ($customers as $customer)
                                                                <option value="{{ $customer->id }}"
                                                                    {{ old('customer_id', $creditNote->customer_id) == $customer->id ? 'selected' : '' }}>
                                                                    {{ $customer->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('customer_id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div id="bill-to-info" class="p-3 bg-light rounded border">
                                                        @if ($creditNote->customer)
                                                            <div class="d-flex">
                                                                <div>
                                                                    <h6 class="fs-14 mb-1 fw-semibold">
                                                                        {{ $creditNote->customer->name }}</h6>
                                                                    @if ($creditNote->customer->billing_address)
                                                                        <p class="mb-0">
                                                                            {{ $creditNote->customer->billing_address }}
                                                                        </p>
                                                                    @endif
                                                                    @if ($creditNote->customer->phone)
                                                                        <p class="mb-0">{{ __('Tél') }} :
                                                                            {{ $creditNote->customer->phone }}
                                                                        </p>
                                                                    @endif
                                                                    @if ($creditNote->customer->email)
                                                                        <p class="mb-0">{{ __('Email') }} :
                                                                            {{ $creditNote->customer->email }}
                                                                        </p>
                                                                    @endif
                                                                    @if ($creditNote->customer->tax_id)
                                                                        <p class="text-dark mb-0">{{ __('ICE') }} :
                                                                            {{ $creditNote->customer->tax_id }}
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @else
                                                            <p class="mb-0 text-muted">{{ __('Sélectionnez un client pour afficher ses informations') }}</p>
                                                        @endif
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

                                    <!-- Table list start -->
                                    <div class="table-responsive rounded table-nowrap border-bottom-0 border mb-3">
                                        <table class="table mb-0 add-table" id="items-table" style="min-width: 550px;">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th style="min-width: 180px;">{{ __('Libellé') }}</th>
                                                    <th style="min-width: 80px;">{{ __('Quantité') }}</th>
                                                    <th style="min-width: 110px;">{{ __('Prix unitaire') }}</th>
                                                    <th class="tax-col" style="min-width: 110px;">{{ __('Taxe (%)') }}</th>
                                                    <th style="min-width: 110px;">{{ __('Montant') }}</th>
                                                    <th style="min-width: 40px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-tbody">
                                                @foreach ($creditNote->items as $i => $item)
                                                    <tr class="item-row">
                                                        <input type="hidden" name="items[{{ $i }}][product_id]" value="{{ old("items.{$i}.product_id", $item->product_id) }}">
                                                        <input type="hidden" name="items[{{ $i }}][invoice_item_id]" value="{{ old("items.{$i}.invoice_item_id", $item->invoice_item_id) }}">
                                                        <td>
                                                            <input type="text"
                                                                name="items[{{ $i }}][label]"
                                                                class="form-control item-label"
                                                                value="{{ old("items.{$i}.label", $item->label) }}"
                                                                placeholder="{{ __('Libellé') }}" required>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="items[{{ $i }}][quantity]"
                                                                class="form-control item-qty"
                                                                value="{{ old("items.{$i}.quantity", $item->quantity) }}"
                                                                min="0.001" step="0.001" required>
                                                        </td>
                                                        <td>
                                                            <input type="number"
                                                                name="items[{{ $i }}][unit_price]"
                                                                class="form-control item-price"
                                                                value="{{ old("items.{$i}.unit_price", $item->unit_price) }}"
                                                                min="0" step="0.01" required>
                                                        </td>
                                                        <td class="tax-col">
                                                            <select name="items[{{ $i }}][tax_group_id]" class="form-select item-tax">
                                                                <option value="" data-rate="0" data-type="">0%</option>
                                                                @if($taxCategories->count())
                                                                <optgroup label="{{ __('Taux de taxes') }}">
                                                                    @foreach ($taxCategories as $tc)
                                                                        <option value="cat_{{ $tc->id }}" data-rate="{{ $tc->rate }}" data-type="category"
                                                                            {{ old("items.{$i}.tax_group_id", $item->tax_group_id ? null : 'cat_'.$item->tax_category_id) == 'cat_'.$tc->id ? 'selected' : '' }}>
                                                                            {{ $tc->name }} ({{ $tc->rate }}%)
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                                @endif
                                                                @if($taxGroups->count())
                                                                <optgroup label="{{ __('Groupes de taxes') }}">
                                                                    @foreach ($taxGroups as $tg)
                                                                        <option value="{{ $tg->id }}" data-rate="{{ $tg->rates->sum('rate') }}" data-type="group"
                                                                            {{ old("items.{$i}.tax_group_id", $item->tax_group_id) == $tg->id ? 'selected' : '' }}>
                                                                            {{ $tg->name }} ({{ $tg->rates->sum('rate') }}%)
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                                @endif
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control item-total"
                                                                value="{{ number_format($item->line_total, 2, ',', ' ') }}"
                                                                readonly>
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
                                    <!-- Table list end -->

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
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">{{ __('Remise') }}</p>
                                                        <div>
                                                            <input type="number" name="discount" class="form-control"
                                                                id="global-discount"
                                                                value="{{ old('discount', $creditNote->discount ?? 0) }}"
                                                                min="0" step="0.01" style="width: 106px;">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mt-3 pb-3 border-bottom border-gray">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>Total ({{ $currency }})</h6>
                                                        <h6 id="display-total">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mt-3 pb-3 border-bottom border-gray">
                                                    <h6 class="fs-14 fw-semibold">{{ __('Total en lettres') }}</h6>
                                                    <p id="display-total-words">—</p>
                                                </li>
                                            </ul>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>
                            </div><!-- end card body -->

                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="{{ route('bo.sales.credit-notes.show', $creditNote) }}"
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
            let itemIndex = {{ $creditNote->items->count() }};
            const tbody = document.querySelector('#items-table .add-tbody');
            const taxGroups = @json($taxGroups);
            const taxCategories = @json($taxCategories);

            /* ---- Add item row ---- */
            document.getElementById('add-item-btn').addEventListener('click', function() {
                const row = document.createElement('tr');
                row.className = 'item-row';
                // Build tax options
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

                row.innerHTML = `
                    <input type="hidden" name="items[${itemIndex}][product_id]" value="">
                    <input type="hidden" name="items[${itemIndex}][invoice_item_id]" value="">
                    <td><input type="text" name="items[${itemIndex}][label]" class="form-control item-label" placeholder="{{ __('Libellé') }}" required></td>
                    <td><input type="number" name="items[${itemIndex}][quantity]" class="form-control item-qty" value="1" min="0.001" step="0.001" required></td>
                    <td><input type="number" name="items[${itemIndex}][unit_price]" class="form-control item-price" value="0" min="0" step="0.01" required></td>
                    <td class="tax-col"><select name="items[${itemIndex}][tax_group_id]" class="form-select item-tax">${taxOpts}</select></td>
                    <td><input type="text" class="form-control item-total" value="0,00" readonly></td>
                    <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
                `;
                tbody.appendChild(row);
                itemIndex++;
                row.querySelectorAll('.tax-col').forEach(el => {
                    el.style.display = document.getElementById('enable_tax').checked ? '' : 'none';
                });
                recalc();
            });

            /* ---- Remove item row ---- */
            tbody.addEventListener('click', function(e) {
                const removeBtn = e.target.closest('.remove-item');
                if (removeBtn) {
                    removeBtn.closest('tr').remove();
                    recalc();
                }
            });

            /* ---- Live recalculation ---- */
            tbody.addEventListener('input', function() {
                recalc();
            });
            tbody.addEventListener('change', function() {
                recalc();
            });
            document.getElementById('global-discount')?.addEventListener('input', recalc);
            document.getElementById('enable_tax')?.addEventListener('change', recalc);

            function recalc() {
                let subtotal = 0;
                let taxTotal = 0;
                const enableTax = document.getElementById('enable_tax')?.checked;

                document.querySelectorAll('#items-table .item-row').forEach(function(row) {
                    const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
                    const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
                    const taxRate = enableTax ? (parseFloat(row.querySelector('.item-tax')?.selectedOptions[0]?.dataset.rate) || 0) :
                        0;

                    const lineSubtotal = qty * price;
                    const lineTax = lineSubtotal * taxRate / 100;
                    const lineTotal = lineSubtotal + lineTax;

                    subtotal += lineSubtotal;
                    taxTotal += lineTax;

                    const totalField = row.querySelector('.item-total');
                    if (totalField) totalField.value = fmt(lineTotal);
                });

                const discount = parseFloat(document.getElementById('global-discount')?.value) || 0;
                let total = subtotal + taxTotal - discount;

                document.getElementById('display-subtotal').textContent = fmt(subtotal);
                document.getElementById('display-tax').textContent = fmt(taxTotal);
                document.getElementById('display-total').textContent = fmt(total);
            }

            function fmt(n) {
                return n.toFixed(2).replace('.', ',');
            }

            /* ---- Due date toggle ---- */
            const dueDateLink = document.getElementById('add-due-date-link');
            const dueDateLinkWrapper = document.getElementById('due-date-link-wrapper');
            const dueDateFieldWrapper = document.getElementById('due-date-field-wrapper');

            if (dueDateLink) {
                dueDateLink.addEventListener('click', function() {
                    dueDateLinkWrapper.classList.add('d-none');
                    dueDateFieldWrapper.classList.remove('d-none');
                });
            }

            /* =========================================================
             * Tax toggle — show/hide tax column & auto-select default
             * ========================================================= */
            const enableTaxCheck = document.getElementById('enable_tax');
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
                recalc();
            }

            enableTaxCheck.addEventListener('change', toggleTax);
            toggleTax();

            /* ---- Initial calc ---- */
            recalc();

            /* ================================================================
             * Invoice Summary — fetch on invoice select, live update on recalc
             * ================================================================ */
            const invoiceSelect   = document.querySelector('select[name="invoice_id"]');
            const summaryPanel    = document.getElementById('invoice-summary-panel');
            const overCreditWarn  = document.getElementById('over-credit-warning');
            const submitBtn       = document.querySelector('#credit-note-form button[type="submit"]');

            // For edit: the credit note's own application amount is added back so
            // the user can raise/lower within the original allocation space.
            const ownCreditApplication = {{ (float) optional($creditNote->applications->where('invoice_id', $creditNote->invoice_id)->first())->amount_applied ?? 0 }};

            let invoiceData = null;

            const summaryFields = {
                total:    document.getElementById('inv-total'),
                paid:     document.getElementById('inv-paid'),
                credited: document.getElementById('inv-credited'),
                due:      document.getElementById('inv-due'),
                thisCredit: document.getElementById('inv-this-credit'),
                after:    document.getElementById('inv-after'),
            };

            function fmtCur(n, currency) {
                return n.toFixed(2).replace('.', ',') + ' ' + (currency || '');
            }

            function updateSummaryPanel(creditTotal) {
                if (!invoiceData) return;
                // Effective due = server's amount_due + own prior application (restored conceptually)
                const effectiveDue = invoiceData.amount_due + ownCreditApplication;
                const after = Math.max(0, effectiveDue - creditTotal);
                const over  = creditTotal > effectiveDue + 0.01;

                summaryFields.total.textContent    = fmtCur(invoiceData.total, invoiceData.currency);
                summaryFields.paid.textContent     = fmtCur(invoiceData.amount_paid, invoiceData.currency);
                summaryFields.credited.textContent = fmtCur(invoiceData.amount_credited, invoiceData.currency);
                summaryFields.due.textContent      = fmtCur(effectiveDue, invoiceData.currency);
                summaryFields.thisCredit.textContent = fmtCur(creditTotal, invoiceData.currency);
                summaryFields.after.textContent    = fmtCur(after, invoiceData.currency);

                summaryFields.after.className = over ? 'fw-semibold text-danger' : 'fw-semibold text-success';
                overCreditWarn.classList.toggle('d-none', !over);
                if (submitBtn) submitBtn.disabled = over;
            }

            function getCurrentCreditTotal() {
                let subtotal = 0, taxTotal = 0;
                const enableTax = document.getElementById('enable_tax')?.checked;
                document.querySelectorAll('#items-table .item-row').forEach(function(row) {
                    const qty   = parseFloat(row.querySelector('.item-qty')?.value) || 0;
                    const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
                    const rate  = enableTax ? (parseFloat(row.querySelector('.item-tax')?.selectedOptions[0]?.dataset.rate) || 0) : 0;
                    const line  = qty * price;
                    subtotal += line;
                    taxTotal += line * rate / 100;
                });
                const discount = parseFloat(document.getElementById('global-discount')?.value) || 0;
                return Math.max(0, subtotal + taxTotal - discount);
            }

            function fetchInvoiceSummary(invoiceId) {
                if (!invoiceId) {
                    invoiceData = null;
                    summaryPanel.classList.add('d-none');
                    overCreditWarn.classList.add('d-none');
                    if (submitBtn) submitBtn.disabled = false;
                    return;
                }
                const url = '{{ route("bo.sales.credit-notes.invoice-summary", ":id") }}'.replace(':id', invoiceId);
                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } })
                    .then(r => r.ok ? r.json() : null)
                    .then(data => {
                        if (!data) return;
                        invoiceData = data;
                        summaryPanel.classList.remove('d-none');
                        updateSummaryPanel(getCurrentCreditTotal());
                    })
                    .catch(() => {});
            }

            // Patch recalc to also update the panel
            const origRecalc = recalc;
            function recalcWithSummary() {
                origRecalc();
                if (invoiceData) updateSummaryPanel(getCurrentCreditTotal());
            }

            tbody.removeEventListener('input', recalc);
            tbody.removeEventListener('change', recalc);
            document.getElementById('global-discount')?.removeEventListener('input', recalc);
            document.getElementById('enable_tax')?.removeEventListener('change', recalc);

            tbody.addEventListener('input', recalcWithSummary);
            tbody.addEventListener('change', recalcWithSummary);
            document.getElementById('global-discount')?.addEventListener('input', recalcWithSummary);
            document.getElementById('enable_tax')?.addEventListener('change', recalcWithSummary);

            /* ================================================================
             * Invoice Items — auto-populate lines when invoice changes
             * In edit mode we don't auto-populate on page load (items already set).
             * We only repopulate when the user changes the linked invoice.
             * ================================================================ */
            const invoiceItemsUrlTemplate = '{{ route("bo.sales.credit-notes.invoice-items", ":id") }}';
            const customerSelect = document.querySelector('select[name="customer_id"]');

            function buildTaxOptions() {
                let opts = '<option value="" data-rate="0" data-type="">0%</option>';
                if (taxCategories.length) {
                    opts += '<optgroup label="{{ __('Taux de taxes') }}">';
                    taxCategories.forEach(tc => {
                        opts += `<option value="cat_${tc.id}" data-rate="${tc.rate}" data-type="category">${tc.name} (${tc.rate}%)</option>`;
                    });
                    opts += '</optgroup>';
                }
                if (taxGroups.length) {
                    opts += '<optgroup label="{{ __('Groupes de taxes') }}">';
                    taxGroups.forEach(tg => {
                        const rate = tg.rates ? tg.rates.reduce((sum, r) => sum + parseFloat(r.rate), 0) : 0;
                        opts += `<option value="${tg.id}" data-rate="${rate}" data-type="group">${tg.name} (${rate}%)</option>`;
                    });
                    opts += '</optgroup>';
                }
                return opts;
            }

            function escHtml(str) {
                const d = document.createElement('div');
                d.textContent = str || '';
                return d.innerHTML;
            }

            function selectTaxByRate(select, rate) {
                for (const opt of select.options) {
                    if (Math.abs(parseFloat(opt.dataset.rate || 0) - rate) < 0.01) {
                        select.value = opt.value;
                        return;
                    }
                }
                select.selectedIndex = 0;
            }

            function buildInvoiceItemRow(item, idx) {
                const taxOpts = buildTaxOptions();
                const isTaxEnabled = document.getElementById('enable_tax')?.checked;
                const trackedBadge = item.is_tracked
                    ? `<span class="badge badge-soft-success ms-1" title="{{ __('Stock géré') }}"><i class="isax isax-box-1"></i></span>`
                    : '';
                const qtyInfo = item.remaining_qty <= 0
                    ? `<div class="text-danger fs-11">{{ __('Tout crédité') }}</div>`
                    : `<div class="text-muted fs-11">{{ __('Max') }}: ${item.remaining_qty}</div>`;
                return `
                <tr class="item-row">
                    <input type="hidden" name="items[${idx}][product_id]" value="${item.product_id || ''}">
                    <input type="hidden" name="items[${idx}][invoice_item_id]" value="${item.invoice_item_id || ''}">
                    <td>
                        <input type="text" name="items[${idx}][label]" class="form-control item-label"
                            value="${escHtml(item.label)}" placeholder="{{ __('Libellé') }}" required>
                        ${trackedBadge}
                        ${qtyInfo}
                    </td>
                    <td>
                        <input type="number" name="items[${idx}][quantity]"
                            class="form-control item-qty"
                            value="${item.remaining_qty > 0 ? item.remaining_qty : 0}"
                            max="${item.remaining_qty}"
                            min="0" step="0.001"
                            ${item.remaining_qty <= 0 ? 'disabled' : ''}>
                    </td>
                    <td>
                        <input type="number" name="items[${idx}][unit_price]" class="form-control item-price"
                            value="${item.unit_price}" min="0" step="0.01">
                    </td>
                    <td class="tax-col" style="${isTaxEnabled ? '' : 'display:none'}">
                        <select name="items[${idx}][tax_group_id]" class="form-select item-tax"
                            data-prefill-rate="${item.tax_rate || 0}">
                            ${taxOpts}
                        </select>
                    </td>
                    <td><input type="text" class="form-control item-total" value="0,00" readonly></td>
                    <td><a href="javascript:void(0);" class="text-danger remove-item"><i class="isax isax-close-circle"></i></a></td>
                </tr>`;
            }

            function fetchInvoiceItems(invoiceId) {
                if (!invoiceId) return;
                const url = invoiceItemsUrlTemplate.replace(':id', invoiceId);
                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } })
                    .then(r => r.ok ? r.json() : null)
                    .then(data => {
                        if (!data || !data.items || !data.items.length) return;

                        if (customerSelect && data.customer_id) {
                            if (window.jQuery) {
                                jQuery(customerSelect).val(data.customer_id).trigger('change');
                            } else {
                                customerSelect.value = data.customer_id;
                            }
                        }

                        tbody.innerHTML = '';
                        itemIndex = 0;
                        data.items.forEach(item => {
                            tbody.insertAdjacentHTML('beforeend', buildInvoiceItemRow(item, itemIndex));
                            itemIndex++;
                        });

                        tbody.querySelectorAll('.item-tax[data-prefill-rate]').forEach(sel => {
                            selectTaxByRate(sel, parseFloat(sel.dataset.prefillRate || 0));
                        });

                        const isTaxEnabled = document.getElementById('enable_tax')?.checked;
                        tbody.querySelectorAll('.tax-col').forEach(el => {
                            el.style.display = isTaxEnabled ? '' : 'none';
                        });

                        recalcWithSummary();
                    })
                    .catch(() => {});
            }

            if (invoiceSelect) {
                // Select2 does not fire native change — use jQuery select2:select + change
                if (window.jQuery) {
                    jQuery(invoiceSelect).on('select2:select select2:unselect change', function() {
                        const val = jQuery(this).val();
                        fetchInvoiceSummary(val);
                        fetchInvoiceItems(val);
                    });
                } else {
                    invoiceSelect.addEventListener('change', function() {
                        fetchInvoiceSummary(this.value);
                        fetchInvoiceItems(this.value);
                    });
                }
                // On page load: load summary for current linked invoice but NOT items (already pre-filled from DB)
                if (invoiceSelect.value) fetchInvoiceSummary(invoiceSelect.value);
            }
        });
    </script>
@endpush
