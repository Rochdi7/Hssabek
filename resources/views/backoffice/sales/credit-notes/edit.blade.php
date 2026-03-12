<?php $page = 'edit-credit-notes'; ?>
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
                            <h6><a href="{{ route('bo.sales.credit-notes.index') }}" class="d-flex align-items-center"><i
                                        class="isax isax-arrow-left me-2"></i>Avoirs</a></h6>
                        </div>
                        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                            <div class="me-1">
                                <a href="{{ route('bo.sales.credit-notes.show', $creditNote) }}"
                                    class="btn btn-outline-white d-inline-flex align-items-center">
                                    <i class="isax isax-eye me-1"></i>Aperçu
                                </a>
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
                                        <h6>Modifier l'avoir</h6>
                                    </div>
                                    <div>

                                        <!-- start row -->
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">N° Avoir</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $creditNote->number }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Référence</label>
                                                                <div class="mb-2">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ref_mode" id="ref_mode_manual"
                                                                            value="manual" checked
                                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').focus();">
                                                                        <label class="form-check-label"
                                                                            for="ref_mode_manual">Saisie manuelle</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="ref_mode" id="ref_mode_auto"
                                                                            value="auto"
                                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                                        <label class="form-check-label"
                                                                            for="ref_mode_auto">Générer
                                                                            automatiquement</label>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="reference_number"
                                                                    id="reference_number"
                                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                                    value="{{ old('reference_number', $creditNote->reference_number) }}"
                                                                    placeholder="Ex: AVO-00001">
                                                                @error('reference_number')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Facture liée</label>
                                                                <select name="invoice_id"
                                                                    class="select @error('invoice_id') is-invalid @enderror">
                                                                    <option value="">Sélectionner une facture</option>
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
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Date de l'avoir <span
                                                                    class="text-danger">*</span></label>
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
                                                                        class="isax isax-add-circle5 text-primary me-1"></i>Ajouter
                                                                    une date d'échéance</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 {{ old('due_date', $creditNote->due_date) ? '' : 'd-none' }}"
                                                            id="due-date-field-wrapper">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date d'échéance</label>
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
                                                                            role="switch" name="enable_tax"
                                                                            id="enable_tax" value="1"
                                                                            {{ old('enable_tax', $creditNote->enable_tax) ? 'checked' : '' }}>
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
                                                            value="{{ $tenant->name }}" readonly disabled>
                                                    </div>
                                                    <div class="p-3 bg-light rounded border">
                                                        <div class="d-flex">
                                                            <div class="me-3">
                                                                <span class="p-2 rounded border"><img
                                                                        src="{{ $tenant->logo_url ?? URL::asset('build/img/logo-small.svg') }}"
                                                                        alt="image" class="img-fluid"></span>
                                                            </div>
                                                            <div>
                                                                <h6 class="fs-14 mb-1 fw-semibold">
                                                                    {{ $tenant->name }}</h6>
                                                                @if ($tenant->address)
                                                                    <p class="mb-0">{{ $tenant->address }}</p>
                                                                @endif
                                                                @if ($tenant->phone)
                                                                    <p class="mb-0">Tél : {{ $tenant->phone }}</p>
                                                                @endif
                                                                @if ($tenant->email)
                                                                    <p class="mb-0">Email : {{ $tenant->email }}</p>
                                                                @endif
                                                                @if ($tenant->tax_id)
                                                                    <p class="text-dark mb-0">ICE : {{ $tenant->tax_id }}
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
                                                    <h6>Client</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <label class="form-label">Nom du client <span
                                                                    class="text-danger">*</span></label>
                                                            <a href="{{ route('bo.crm.customers.create') }}"
                                                                class="d-flex align-items-center"><i
                                                                    class="isax isax-add-circle5 text-primary me-1"></i>Ajouter</a>
                                                        </div>
                                                        <select name="customer_id"
                                                            class="select @error('customer_id') is-invalid @enderror">
                                                            <option value="">Sélectionner un client</option>
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
                                                                        <p class="mb-0">Tél :
                                                                            {{ $creditNote->customer->phone }}
                                                                        </p>
                                                                    @endif
                                                                    @if ($creditNote->customer->email)
                                                                        <p class="mb-0">Email :
                                                                            {{ $creditNote->customer->email }}
                                                                        </p>
                                                                    @endif
                                                                    @if ($creditNote->customer->tax_id)
                                                                        <p class="text-dark mb-0">ICE :
                                                                            {{ $creditNote->customer->tax_id }}
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @else
                                                            <p class="mb-0 text-muted">Sélectionnez un client
                                                                pour afficher ses informations</p>
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
                                        <h6>Articles & Détails</h6>
                                    </div>

                                    <!-- Table list start -->
                                    <div class="table-responsive rounded table-nowrap border-bottom-0 border mb-3">
                                        <table class="table mb-0 add-table" id="items-table"
                                            style="table-layout: fixed; width: 100%;">
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
                                                @foreach ($creditNote->items as $i => $item)
                                                    <tr class="item-row">
                                                        <td>
                                                            <input type="text"
                                                                name="items[{{ $i }}][label]"
                                                                class="form-control item-label"
                                                                value="{{ old("items.{$i}.label", $item->label) }}"
                                                                placeholder="Libellé" required>
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
                                                                <optgroup label="Taux de taxes">
                                                                    @foreach ($taxCategories as $tc)
                                                                        <option value="cat_{{ $tc->id }}" data-rate="{{ $tc->rate }}" data-type="category"
                                                                            {{ old("items.{$i}.tax_group_id", $item->tax_group_id ? null : 'cat_'.$item->tax_category_id) == 'cat_'.$tc->id ? 'selected' : '' }}>
                                                                            {{ $tc->name }} ({{ $tc->rate }}%)
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                                @endif
                                                                @if($taxGroups->count())
                                                                <optgroup label="Groupes de taxes">
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
                                                        <div class="tab-pane active show" id="notes" role="tabpanel">
                                                            <label class="form-label">Notes additionnelles</label>
                                                            <textarea name="notes" class="form-control bg-light" rows="3" readonly>{{ $defaultFooter }}</textarea>
                                                            <small class="text-muted mt-1 d-block"><i
                                                                    class="isax isax-setting-2 me-1"></i>Modifiable depuis
                                                                <a href="{{ route('bo.settings.invoice.edit') }}">Paramètres
                                                                    de facturation</a></small>
                                                        </div>
                                                        <div class="tab-pane fade" id="terms" role="tabpanel">
                                                            <label class="form-label">Conditions générales</label>
                                                            <textarea name="terms" class="form-control bg-light" rows="3" readonly>{{ $defaultTerms }}</textarea>
                                                            <small class="text-muted mt-1 d-block"><i
                                                                    class="isax isax-setting-2 me-1"></i>Modifiable depuis
                                                                <a href="{{ route('bo.settings.invoice.edit') }}">Paramètres
                                                                    de facturation</a></small>
                                                        </div>
                                                        <div class="tab-pane fade" id="bank" role="tabpanel">
                                                            <label class="form-label">Compte bancaire</label>
                                                            <select class="select" name="bank_account_id">
                                                                <option value="">Sélectionner</option>
                                                                @foreach ($bankAccounts as $ba)
                                                                    <option value="{{ $ba->id }}"
                                                                        data-balance="{{ number_format($ba->current_balance, 2, ',', ' ') }}"
                                                                        data-currency="{{ $ba->currency }}"
                                                                        {{ old('bank_account_id', $creditNote->bank_account_id) == $ba->id ? 'selected' : '' }}>
                                                                        {{ $ba->account_holder_name }} -
                                                                        {{ $ba->account_number }}
                                                                        ({{ $ba->bank_name }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
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
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">Sous-total</p>
                                                        <h6 class="fs-14" id="display-subtotal">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3" id="tax-total-row">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">Taxe</p>
                                                        <h6 class="fs-14" id="display-tax">0,00</h6>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">Remise</p>
                                                        <div>
                                                            <input type="number" name="discount" class="form-control"
                                                                id="global-discount"
                                                                value="{{ old('discount', $creditNote->discount ?? 0) }}"
                                                                min="0" step="0.01" style="width: 106px;">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="pb-2 border-gray border-bottom">
                                                    <div class="p-2 d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <div class="form-check form-switch me-4">
                                                                <input class="form-check-input" type="checkbox"
                                                                    role="switch" id="round_off_check">
                                                                <label class="form-check-label"
                                                                    for="round_off_check">Arrondir le total</label>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h6 class="fs-14" id="display-round-off">0,00</h6>
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
                                                    <h6 class="fs-14 fw-semibold">Total en lettres</h6>
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

                row.innerHTML = `
                    <td><input type="text" name="items[${itemIndex}][label]" class="form-control item-label" placeholder="Libellé" required></td>
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
            document.getElementById('round_off_check')?.addEventListener('change', recalc);
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

                const roundOff = document.getElementById('round_off_check')?.checked;
                let roundVal = 0;
                if (roundOff) {
                    roundVal = Math.round(total) - total;
                    total = Math.round(total);
                }

                document.getElementById('display-subtotal').textContent = fmt(subtotal);
                document.getElementById('display-tax').textContent = fmt(taxTotal);
                document.getElementById('display-round-off').textContent = fmt(roundVal);
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
        });
    </script>
@endpush
