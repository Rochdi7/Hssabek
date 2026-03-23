<?php $page = 'localization-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Langue et Région')
@section('description', 'Configurer la langue et la région')
@section('content')
    <!-- ========================
               Start Page Content
              ========================= -->

    <div class="page-wrapper">
        <div class="content">

            <!-- start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class=" row settings-wrapper d-flex">

                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">{{ __('Paramètres de localisation') }}</h6>
                                </div>
                                <form action="{{ route('bo.settings.locale.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Langue') }} <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select @error('locale') is-invalid @enderror"
                                                    name="locale">
                                                    <option value="fr"
                                                        {{ old('locale', $settings->localization_settings['language'] ?? 'fr') === 'fr' ? 'selected' : '' }}>
                                                        {{ __('Français') }}</option>
                                                    <option value="en"
                                                        {{ old('locale', $settings->localization_settings['language'] ?? 'fr') === 'en' ? 'selected' : '' }}>
                                                        {{ __('Anglais') }}</option>
                                                    <option value="ar"
                                                        {{ old('locale', $settings->localization_settings['language'] ?? 'fr') === 'ar' ? 'selected' : '' }}>
                                                        {{ __('Arabe') }}</option>
                                                </select>
                                                @error('locale')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Fuseau horaire') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('timezone') is-invalid @enderror"
                                                    name="timezone"
                                                    value="{{ old('timezone', $settings->localization_settings['timezone'] ?? 'Africa/Casablanca') }}"
                                                    placeholder="Africa/Casablanca">
                                                @error('timezone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Devise') }}</label>
                                                <select class="form-select @error('currency') is-invalid @enderror"
                                                    name="currency">
                                                    @foreach ($currencies as $currency)
                                                        <option value="{{ $currency->code }}"
                                                            {{ old('currency', $settings->localization_settings['currency'] ?? 'MAD') === $currency->code ? 'selected' : '' }}>
                                                            {{ $currency->code }} - {{ $currency->name }}
                                                            ({{ $currency->symbol }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('currency')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Format de date') }}</label>
                                                <select class="form-select @error('date_format') is-invalid @enderror"
                                                    name="date_format">
                                                    <option value="d/m/Y"
                                                        {{ old('date_format', $settings->localization_settings['date_format'] ?? 'd/m/Y') === 'd/m/Y' ? 'selected' : '' }}>
                                                        dd/mm/aaaa</option>
                                                    <option value="m/d/Y"
                                                        {{ old('date_format', $settings->localization_settings['date_format'] ?? '') === 'm/d/Y' ? 'selected' : '' }}>
                                                        mm/dd/aaaa</option>
                                                    <option value="Y-m-d"
                                                        {{ old('date_format', $settings->localization_settings['date_format'] ?? '') === 'Y-m-d' ? 'selected' : '' }}>
                                                        aaaa-mm-dd</option>
                                                    <option value="d-m-Y"
                                                        {{ old('date_format', $settings->localization_settings['date_format'] ?? '') === 'd-m-Y' ? 'selected' : '' }}>
                                                        dd-mm-aaaa</option>
                                                </select>
                                                @error('date_format')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __("Format d'heure") }}</label>
                                                <select class="form-select @error('time_format') is-invalid @enderror"
                                                    name="time_format">
                                                    <option value="24"
                                                        {{ old('time_format', $settings->localization_settings['time_format'] ?? '24') === '24' ? 'selected' : '' }}>
                                                        {{ __('24 heures') }}</option>
                                                    <option value="12"
                                                        {{ old('time_format', $settings->localization_settings['time_format'] ?? '') === '12' ? 'selected' : '' }}>
                                                        {{ __('12 heures (AM/PM)') }}</option>
                                                </select>
                                                @error('time_format')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-3">
                                        <button type="button" class="btn btn-outline-white me-2"
                                            onclick="window.location.reload()">{{ __('Annuler') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    <!-- Arabic Warning Modal -->
    <div class="modal fade" id="arabicWarningModal" tabindex="-1" aria-labelledby="arabicWarningModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" id="arabicWarningModalLabel">
                        <i class="isax isax-warning-2 text-warning me-2"></i>{{ __('Avertissement') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning mb-0">
                        <p class="mb-2"><strong>{{ __('La version arabe n\'est pas encore complète.') }}</strong></p>
                        <p class="mb-0 text-muted">
                            {{ __('Certaines parties de l\'interface peuvent encore s\'afficher en français. Nous travaillons activement à compléter la traduction.') }}
                        </p>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        id="cancelArabicBtn">{{ __('Annuler') }}</button>
                    <button type="button" class="btn btn-primary"
                        id="confirmArabicBtn">{{ __('Continuer quand même') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
               End Page Content
              ========================= -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const localeSelect = document.querySelector('select[name="locale"]');
            const arabicWarningModal = new bootstrap.Modal(document.getElementById('arabicWarningModal'));
            let previousValue = localeSelect.value;

            localeSelect.addEventListener('change', function() {
                if (this.value === 'ar') {
                    arabicWarningModal.show();
                } else {
                    previousValue = this.value;
                }
            });

            // Cancel button - revert to previous value
            document.getElementById('cancelArabicBtn').addEventListener('click', function() {
                localeSelect.value = previousValue;
                arabicWarningModal.hide();
            });

            // Confirm button - keep Arabic selected
            document.getElementById('confirmArabicBtn').addEventListener('click', function() {
                previousValue = 'ar';
                arabicWarningModal.hide();
            });

            // Also revert if modal is closed via X button or clicking outside
            document.getElementById('arabicWarningModal').addEventListener('hidden.bs.modal', function() {
                if (localeSelect.value === 'ar' && previousValue !== 'ar') {
                    localeSelect.value = previousValue;
                }
            });
        });
    </script>
@endpush
