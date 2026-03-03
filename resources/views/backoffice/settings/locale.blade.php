<?php $page = 'localization-settings'; ?>
@extends('backoffice.layout.mainlayout')
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
                                    <h6 class="mb-0">Paramètres de localisation</h6>
                                </div>
                                <form action="{{ route('bo.settings.locale.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Langue <span class="text-danger">*</span></label>
                                                <select class="form-select @error('locale') is-invalid @enderror" name="locale">
                                                    <option value="fr" {{ old('locale', $settings->localization_settings['locale'] ?? 'fr') === 'fr' ? 'selected' : '' }}>Français</option>
                                                    <option value="en" {{ old('locale', $settings->localization_settings['locale'] ?? 'fr') === 'en' ? 'selected' : '' }}>English</option>
                                                    <option value="ar" {{ old('locale', $settings->localization_settings['locale'] ?? 'fr') === 'ar' ? 'selected' : '' }}>العربية</option>
                                                </select>
                                                @error('locale')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Fuseau horaire <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('timezone') is-invalid @enderror"
                                                    name="timezone"
                                                    value="{{ old('timezone', $settings->localization_settings['timezone'] ?? 'Africa/Casablanca') }}"
                                                    placeholder="Africa/Casablanca">
                                                @error('timezone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Devise</label>
                                                <input type="text" class="form-control @error('currency') is-invalid @enderror"
                                                    name="currency"
                                                    value="{{ old('currency', $settings->localization_settings['currency'] ?? 'MAD') }}"
                                                    placeholder="MAD" maxlength="3">
                                                @error('currency')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Format de date</label>
                                                <select class="form-select @error('date_format') is-invalid @enderror" name="date_format">
                                                    <option value="d/m/Y" {{ old('date_format', $settings->localization_settings['date_format'] ?? 'd/m/Y') === 'd/m/Y' ? 'selected' : '' }}>dd/mm/aaaa</option>
                                                    <option value="m/d/Y" {{ old('date_format', $settings->localization_settings['date_format'] ?? '') === 'm/d/Y' ? 'selected' : '' }}>mm/dd/aaaa</option>
                                                    <option value="Y-m-d" {{ old('date_format', $settings->localization_settings['date_format'] ?? '') === 'Y-m-d' ? 'selected' : '' }}>aaaa-mm-dd</option>
                                                    <option value="d-m-Y" {{ old('date_format', $settings->localization_settings['date_format'] ?? '') === 'd-m-Y' ? 'selected' : '' }}>dd-mm-aaaa</option>
                                                </select>
                                                @error('date_format')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Format d'heure</label>
                                                <select class="form-select @error('time_format') is-invalid @enderror" name="time_format">
                                                    <option value="24" {{ old('time_format', $settings->localization_settings['time_format'] ?? '24') === '24' ? 'selected' : '' }}>24 heures</option>
                                                    <option value="12" {{ old('time_format', $settings->localization_settings['time_format'] ?? '') === '12' ? 'selected' : '' }}>12 heures (AM/PM)</option>
                                                </select>
                                                @error('time_format')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-3">
                                        <button type="button" class="btn btn-outline-white me-2" onclick="window.location.reload()">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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

    <!-- ========================
           End Page Content
          ========================= -->
@endsection
