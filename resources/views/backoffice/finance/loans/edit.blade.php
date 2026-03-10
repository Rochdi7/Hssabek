<?php $page = 'loans'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.finance.loans.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Prêts</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Modifier le prêt — {{ $loan->reference_number }}</h5>

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
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">Informations du prêteur</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Type de prêteur <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('lender_type') is-invalid @enderror"
                                                    name="lender_type">
                                                    <option value="">— Sélectionner —</option>
                                                    <option value="bank"
                                                        {{ old('lender_type', $loan->lender_type) === 'bank' ? 'selected' : '' }}>
                                                        Banque</option>
                                                    <option value="institution"
                                                        {{ old('lender_type', $loan->lender_type) === 'institution' ? 'selected' : '' }}>
                                                        Institution</option>
                                                    <option value="individual"
                                                        {{ old('lender_type', $loan->lender_type) === 'individual' ? 'selected' : '' }}>
                                                        Particulier</option>
                                                </select>
                                                @error('lender_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nom du prêteur <span
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
                                                <label class="form-label">Numéro de référence</label>
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
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">Détails du prêt</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Montant principal <span
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
                                                <label class="form-label">Taux d'intérêt (%) <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0" max="100"
                                                    class="form-control @error('interest_rate') is-invalid @enderror"
                                                    name="interest_rate"
                                                    value="{{ old('interest_rate', $loan->interest_rate) }}">
                                                @error('interest_rate')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Type d'intérêt <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('interest_type') is-invalid @enderror"
                                                    name="interest_type">
                                                    <option value="fixed"
                                                        {{ old('interest_type', $loan->interest_type) === 'fixed' ? 'selected' : '' }}>
                                                        Fixe</option>
                                                    <option value="variable"
                                                        {{ old('interest_type', $loan->interest_type) === 'variable' ? 'selected' : '' }}>
                                                        Variable</option>
                                                </select>
                                                @error('interest_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Montant total</label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('total_amount') is-invalid @enderror"
                                                    name="total_amount"
                                                    value="{{ old('total_amount', $loan->total_amount) }}">
                                                @error('total_amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Solde restant</label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('remaining_balance') is-invalid @enderror"
                                                    name="remaining_balance"
                                                    value="{{ old('remaining_balance', $loan->remaining_balance) }}">
                                                @error('remaining_balance')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Fréquence de paiement</label>
                                                <select
                                                    class="form-select @error('payment_frequency') is-invalid @enderror"
                                                    name="payment_frequency">
                                                    <option value="">— Sélectionner —</option>
                                                    <option value="monthly"
                                                        {{ old('payment_frequency', $loan->payment_frequency) === 'monthly' ? 'selected' : '' }}>
                                                        Mensuel</option>
                                                    <option value="quarterly"
                                                        {{ old('payment_frequency', $loan->payment_frequency) === 'quarterly' ? 'selected' : '' }}>
                                                        Trimestriel</option>
                                                    <option value="semi_annual"
                                                        {{ old('payment_frequency', $loan->payment_frequency) === 'semi_annual' ? 'selected' : '' }}>
                                                        Semestriel</option>
                                                    <option value="annual"
                                                        {{ old('payment_frequency', $loan->payment_frequency) === 'annual' ? 'selected' : '' }}>
                                                        Annuel</option>
                                                </select>
                                                @error('payment_frequency')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">Dates & Statut</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date de début <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="date"
                                                    class="form-control @error('start_date') is-invalid @enderror"
                                                    name="start_date"
                                                    value="{{ old('start_date', $loan->start_date instanceof \Carbon\Carbon ? $loan->start_date->format('Y-m-d') : $loan->start_date) }}">
                                                @error('start_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date de fin</label>
                                                <input type="date"
                                                    class="form-control @error('end_date') is-invalid @enderror"
                                                    name="end_date"
                                                    value="{{ old('end_date', $loan->end_date instanceof \Carbon\Carbon ? $loan->end_date->format('Y-m-d') : $loan->end_date) }}">
                                                @error('end_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Statut</label>
                                                <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="active"
                                                        {{ old('status', $loan->status) === 'active' ? 'selected' : '' }}>
                                                        Actif</option>
                                                    <option value="completed"
                                                        {{ old('status', $loan->status) === 'completed' ? 'selected' : '' }}>
                                                        Terminé</option>
                                                    <option value="defaulted"
                                                        {{ old('status', $loan->status) === 'defaulted' ? 'selected' : '' }}>
                                                        Défaut</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Notes</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes', $loan->notes) }}</textarea>
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.finance.loans.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Mettre à jour le prêt</button>
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
