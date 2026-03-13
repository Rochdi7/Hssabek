<?php $page = 'incomes'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                        Start Page Content
                    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row -->
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.finance.incomes.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Revenus') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Modifier le revenu') }} — {{ $income->income_number }}</h5>

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

                                <form action="{{ route('bo.finance.incomes.update', $income) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Détails du revenu') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date du revenu') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <div class="input-group position-relative">
                                                    <input type="text"
                                                        class="form-control datetimepicker @error('income_date') is-invalid @enderror"
                                                        name="income_date"
                                                        value="{{ old('income_date', $income->income_date instanceof \Carbon\Carbon ? $income->income_date->format('d-m-Y') : $income->income_date) }}"
                                                        placeholder="{{ now()->format('d M Y') }}">
                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                        <i class="isax isax-calendar-2"></i>
                                                    </span>
                                                </div>
                                                @error('income_date')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Numéro de référence') }}</label>
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode"
                                                            id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">{{ __('Saisie manuelle') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode"
                                                            id="ref_mode_auto" value="auto"
                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">{{ __('Générer automatiquement') }}</label>
                                                    </div>
                                                </div>
                                                <input type="text" id="reference_number"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number"
                                                    value="{{ old('reference_number', $income->reference_number) }}">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Catégorie') }}</label>
                                                <select class="form-select @error('category_id') is-invalid @enderror"
                                                    name="category_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id', $income->category_id) == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Client') }}</label>
                                                <select class="form-select @error('customer_id') is-invalid @enderror"
                                                    name="customer_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}"
                                                            {{ old('customer_id', $income->customer_id) == $customer->id ? 'selected' : '' }}>
                                                            {{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Montant') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    name="amount" value="{{ old('amount', $income->amount) }}">
                                                @error('amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Devise') }}</label>
                                                <input type="text" class="form-control"
                                                    value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                    readonly disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Paiement') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mode de paiement') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('payment_mode') is-invalid @enderror"
                                                    name="payment_mode">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    <option value="cash"
                                                        {{ old('payment_mode', $income->payment_mode) === 'cash' ? 'selected' : '' }}>
                                                        {{ __('Espèces') }}</option>
                                                    <option value="bank_transfer"
                                                        {{ old('payment_mode', $income->payment_mode) === 'bank_transfer' ? 'selected' : '' }}>
                                                        {{ __('Virement bancaire') }}</option>
                                                    <option value="card"
                                                        {{ old('payment_mode', $income->payment_mode) === 'card' ? 'selected' : '' }}>
                                                        {{ __('Carte') }}</option>
                                                    <option value="cheque"
                                                        {{ old('payment_mode', $income->payment_mode) === 'cheque' ? 'selected' : '' }}>
                                                        {{ __('Chèque') }}</option>
                                                    <option value="other"
                                                        {{ old('payment_mode', $income->payment_mode) === 'other' ? 'selected' : '' }}>
                                                        {{ __('Autre') }}</option>
                                                </select>
                                                @error('payment_mode')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Compte bancaire') }}</label>
                                                <select class="form-select @error('bank_account_id') is-invalid @enderror"
                                                    name="bank_account_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($bankAccounts as $bankAccount)
                                                        <option value="{{ $bankAccount->id }}"
                                                            data-balance="{{ number_format($bankAccount->current_balance, 2, ',', ' ') }}"
                                                            data-currency="{{ $bankAccount->currency }}"
                                                            {{ old('bank_account_id', $income->bank_account_id) == $bankAccount->id ? 'selected' : '' }}>
                                                            {{ $bankAccount->bank_name }} —
                                                            {{ $bankAccount->account_number }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-muted bank-balance-info mt-1 d-block" style="display:none;"></small>
                                                @error('bank_account_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Description') }}</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description', $income->description) }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.finance.incomes.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                                    </div>
                                </form>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
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
