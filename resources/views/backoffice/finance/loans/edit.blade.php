<?php $page = 'loans'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Modifier le Prêt')
@section('description', 'Modifier les détails du prêt')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.finance.loans.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Prêts') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Modifier le prêt') }} — {{ $loan->reference_number }}</h5>

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

                                <form action="{{ route('bo.finance.loans.update', $loan) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row gx-3 mb-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Type de prêt') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('loan_type') is-invalid @enderror"
                                                    name="loan_type" id="loan_type"
                                                    onchange="updateLoanTypeLabels()">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    <option value="received"
                                                        {{ old('loan_type', $loan->loan_type) === 'received' ? 'selected' : '' }}>
                                                        {{ __("Reçu (j'ai emprunté)") }}</option>
                                                    <option value="given"
                                                        {{ old('loan_type', $loan->loan_type) === 'given' ? 'selected' : '' }}>
                                                        {{ __("Donné (j'ai prêté)") }}</option>
                                                </select>
                                                @error('loan_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex" id="lender_section_title">{{ __('Informations du prêteur') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" id="lender_type_label">{{ __('Type de prêteur') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('lender_type') is-invalid @enderror"
                                                    name="lender_type">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    <option value="bank"
                                                        {{ old('lender_type', $loan->lender_type) === 'bank' ? 'selected' : '' }}>
                                                        {{ __('Banque') }}</option>
                                                    <option value="personal"
                                                        {{ old('lender_type', $loan->lender_type) === 'personal' ? 'selected' : '' }}>
                                                        {{ __('Particulier') }}</option>
                                                    <option value="other"
                                                        {{ old('lender_type', $loan->lender_type) === 'other' ? 'selected' : '' }}>
                                                        {{ __('Autre') }}</option>
                                                </select>
                                                @error('lender_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" id="lender_name_label">{{ __('Nom du prêteur') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('lender_name') is-invalid @enderror"
                                                    name="lender_name" value="{{ old('lender_name', $loan->lender_name) }}">
                                                @error('lender_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Numéro de référence') }}</label>
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
                                                    value="{{ old('reference_number', $loan->reference_number) }}">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Détails du prêt') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Montant principal') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('principal_amount') is-invalid @enderror"
                                                    name="principal_amount"
                                                    value="{{ old('principal_amount', $loan->principal_amount) }}">
                                                @error('principal_amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Fréquence de paiement') }}</label>
                                                <select
                                                    class="form-select @error('payment_frequency') is-invalid @enderror"
                                                    name="payment_frequency">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    <option value="monthly"
                                                        {{ old('payment_frequency', $loan->payment_frequency) === 'monthly' ? 'selected' : '' }}>
                                                        {{ __('Mensuel') }}</option>
                                                    <option value="quarterly"
                                                        {{ old('payment_frequency', $loan->payment_frequency) === 'quarterly' ? 'selected' : '' }}>
                                                        {{ __('Trimestriel') }}</option>
                                                    <option value="yearly"
                                                        {{ old('payment_frequency', $loan->payment_frequency) === 'yearly' ? 'selected' : '' }}>
                                                        {{ __('Annuel') }}</option>
                                                </select>
                                                @error('payment_frequency')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Dates & Statut') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date de début') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control datetimepicker @error('start_date') is-invalid @enderror"
                                                    name="start_date"
                                                    value="{{ old('start_date', $loan->start_date instanceof \Carbon\Carbon ? $loan->start_date->format('d-m-Y') : $loan->start_date) }}">
                                                @error('start_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date de fin') }}</label>
                                                <input type="text"
                                                    class="form-control datetimepicker @error('end_date') is-invalid @enderror"
                                                    name="end_date"
                                                    value="{{ old('end_date', $loan->end_date instanceof \Carbon\Carbon ? $loan->end_date->format('d-m-Y') : $loan->end_date) }}">
                                                @error('end_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Statut') }}</label>
                                                <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="active"
                                                        {{ old('status', $loan->status) === 'active' ? 'selected' : '' }}>
                                                        {{ __('Actif') }}</option>
                                                    <option value="closed"
                                                        {{ old('status', $loan->status) === 'closed' ? 'selected' : '' }}>
                                                        {{ __('Terminé') }}</option>
                                                    <option value="defaulted"
                                                        {{ old('status', $loan->status) === 'defaulted' ? 'selected' : '' }}>
                                                        {{ __('Défaut') }}</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Notes') }}</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes', $loan->notes) }}</textarea>
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.finance.loans.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Mettre à jour le prêt') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function updateLoanTypeLabels() {
            var type = document.getElementById('loan_type').value;
            var isGiven = type === 'given';
            document.getElementById('lender_section_title').textContent = isGiven ? "{{ __("Informations de l'emprunteur") }}" : "{{ __('Informations du prêteur') }}";
            document.getElementById('lender_type_label').innerHTML = (isGiven ? "{{ __("Type d'emprunteur") }}" : "{{ __('Type de prêteur') }}") + ' <span class="text-danger ms-1">*</span>';
            document.getElementById('lender_name_label').innerHTML = (isGiven ? "{{ __("Nom de l'emprunteur") }}" : "{{ __('Nom du prêteur') }}") + ' <span class="text-danger ms-1">*</span>';
        }
        document.addEventListener('DOMContentLoaded', updateLoanTypeLabels);
    </script>
@endpush
