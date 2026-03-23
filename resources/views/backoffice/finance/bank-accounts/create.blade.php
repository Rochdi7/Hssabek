<?php $page = 'bank-accounts'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouveau Compte Bancaire')
@section('description', 'Ajouter un nouveau compte bancaire')
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
                            <h6><a href="{{ route('bo.finance.bank-accounts.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Comptes bancaires') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Nouveau compte bancaire') }}</h5>

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form action="{{ route('bo.finance.bank-accounts.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Informations du compte') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Titulaire du compte') }} <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('account_holder_name') is-invalid @enderror" name="account_holder_name" value="{{ old('account_holder_name') }}">
                                                @error('account_holder_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Numéro de compte') }} <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}">
                                                @error('account_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Nom de la banque') }} <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}">
                                                @error('bank_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Code IFSC / SWIFT') }}</label>
                                                <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" name="ifsc_code" value="{{ old('ifsc_code') }}">
                                                @error('ifsc_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Agence') }}</label>
                                                <input type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch') }}">
                                                @error('branch')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Type de compte') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('account_type') is-invalid @enderror" name="account_type">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    <option value="current" {{ old('account_type') === 'current' ? 'selected' : '' }}>{{ __('Courant') }}</option>
                                                    <option value="savings" {{ old('account_type') === 'savings' ? 'selected' : '' }}>{{ __('Épargne') }}</option>
                                                    <option value="business" {{ old('account_type') === 'business' ? 'selected' : '' }}>{{ __('Professionnel') }}</option>
                                                    <option value="other" {{ old('account_type') === 'other' ? 'selected' : '' }}>{{ __('Autre') }}</option>
                                                </select>
                                                @error('account_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Solde & devise') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Devise') }}</label>
                                                <input type="text" class="form-control"
                                                    value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                    readonly disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __("Solde d'ouverture") }} <span class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" class="form-control @error('opening_balance') is-invalid @enderror" name="opening_balance" value="{{ old('opening_balance', '0.00') }}">
                                                @error('opening_balance')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                <small class="text-warning d-block mt-1"><i class="isax isax-warning-2 me-1"></i>{{ __('Ce montant ne pourra plus être modifié après la création.') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Statut') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('is_active') is-invalid @enderror" name="is_active">
                                                    <option value="1" {{ old('is_active', '1') === '1' ? 'selected' : '' }}>{{ __('Actif') }}</option>
                                                    <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>{{ __('Inactif') }}</option>
                                                </select>
                                                @error('is_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Notes') }}</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes') }}</textarea>
                                                @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.finance.bank-accounts.index') }}" class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="button" class="btn btn-primary" id="btnSubmitAccount">{{ __('Créer le compte') }}</button>
                                    </div>
                                </form>

                                <!-- Modal confirmation solde d'ouverture -->
                                <div class="modal fade" id="confirmOpeningBalanceModal" tabindex="-1" aria-labelledby="confirmOpeningBalanceLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-0 pb-0">
                                                <h5 class="modal-title" id="confirmOpeningBalanceLabel">{{ __("Confirmation du solde d'ouverture") }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <i class="isax isax-warning-2 text-warning" style="font-size: 48px;"></i>
                                                </div>
                                                <div class="alert alert-warning mb-3">
                                                    <strong>{{ __('Attention !') }}</strong> {{ __("Le solde d'ouverture ne pourra plus être modifié après la création du compte.") }}
                                                </div>
                                                <p class="mb-1">{{ __('Veuillez vérifier que le montant suivant est correct :') }}</p>
                                                <p class="text-center fs-4 fw-bold text-primary" id="displayOpeningBalance">0.00</p>
                                                <p class="text-muted text-center mb-0">{{ __('Assurez-vous que ce montant est exact à 100% avant de confirmer.') }}</p>
                                            </div>
                                            <div class="modal-footer border-0 pt-0">
                                                <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Vérifier à nouveau') }}</button>
                                                <button type="button" class="btn btn-primary" id="btnConfirmCreate">{{ __('Confirmer et créer') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form[action*="bank-accounts"]');
    var btnSubmit = document.getElementById('btnSubmitAccount');
    var btnConfirm = document.getElementById('btnConfirmCreate');
    var modal = new bootstrap.Modal(document.getElementById('confirmOpeningBalanceModal'));
    var displayAmount = document.getElementById('displayOpeningBalance');

    btnSubmit.addEventListener('click', function() {
        var openingBalance = form.querySelector('input[name="opening_balance"]').value || '0.00';
        var formatted = parseFloat(openingBalance).toFixed(2);
        var currency = '{{ $currency }}';
        displayAmount.textContent = formatted + ' ' + currency;
        modal.show();
    });

    btnConfirm.addEventListener('click', function() {
        modal.hide();
        form.submit();
    });
});
</script>
@endpush
@endsection
