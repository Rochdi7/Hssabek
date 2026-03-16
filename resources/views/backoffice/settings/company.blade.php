<?php $page = 'company-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- Start Row -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-12">
                    <div class=" row settings-wrapper d-flex">
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-4 pb-4 border-bottom">
                                <h6 class="fw-bold mb-0">{{ __("Paramètres de l'entreprise") }}</h6>
                            </div>
                            <form action="{{ route('bo.settings.company.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="border-bottom mb-4">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-info-circle"></i></span>
                                            {{ __('Informations générales') }}
                                        </h6>
                                    </div>
                                    @php
                                        $cs = $settings->company_settings ?? [];
                                        $currentForme = old('forme_juridique', $tenant->forme_juridique ?? '');
                                        $isSociete = in_array($currentForme, ['sarl', 'sarl_au', 'sa', 'snc', 'scs', 'sca', 'ei', 'cooperative']);
                                        $isAE = ($currentForme === 'auto_entrepreneur');
                                    @endphp
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __("Nom de l'entreprise") }} <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                                    name="company_name"
                                                    value="{{ old('company_name', $cs['company_name'] ?? '') }}">
                                                @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Forme juridique') }} <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-select @error('forme_juridique') is-invalid @enderror"
                                                    name="forme_juridique" id="settingsFormeJuridique">
                                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                                    <optgroup label="{{ __('Sociétés') }}">
                                                        <option value="sarl" {{ $currentForme === 'sarl' ? 'selected' : '' }}>{{ __('SARL — Société à Responsabilité Limitée') }}</option>
                                                        <option value="sarl_au" {{ $currentForme === 'sarl_au' ? 'selected' : '' }}>{{ __('SARL AU — Associé Unique') }}</option>
                                                        <option value="sa" {{ $currentForme === 'sa' ? 'selected' : '' }}>{{ __('SA — Société Anonyme') }}</option>
                                                        <option value="snc" {{ $currentForme === 'snc' ? 'selected' : '' }}>{{ __('SNC — Société en Nom Collectif') }}</option>
                                                        <option value="scs" {{ $currentForme === 'scs' ? 'selected' : '' }}>{{ __('SCS — Société en Commandite Simple') }}</option>
                                                        <option value="sca" {{ $currentForme === 'sca' ? 'selected' : '' }}>{{ __('SCA — Société en Commandite par Actions') }}</option>
                                                    </optgroup>
                                                    <optgroup label="{{ __('Entreprises individuelles') }}">
                                                        <option value="auto_entrepreneur" {{ $currentForme === 'auto_entrepreneur' ? 'selected' : '' }}>{{ __('Auto-Entrepreneur') }}</option>
                                                        <option value="ei" {{ $currentForme === 'ei' ? 'selected' : '' }}>{{ __('EI — Entreprise Individuelle (Personne Physique)') }}</option>
                                                    </optgroup>
                                                    <optgroup label="{{ __('Autres') }}">
                                                        <option value="cooperative" {{ $currentForme === 'cooperative' ? 'selected' : '' }}>{{ __('Coopérative') }}</option>
                                                    </optgroup>
                                                </select>
                                                @error('forme_juridique')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Adresse e-mail') }}
                                                </label>
                                                <input type="email" class="form-control @error('company_email') is-invalid @enderror"
                                                    name="company_email"
                                                    value="{{ old('company_email', $cs['company_email'] ?? '') }}">
                                                @error('company_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Téléphone') }}
                                                </label>
                                                <input type="text" class="form-control @error('company_phone') is-invalid @enderror"
                                                    name="company_phone"
                                                    value="{{ old('company_phone', $cs['company_phone'] ?? '') }}">
                                                @error('company_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Fax') }}
                                                </label>
                                                <input type="text" class="form-control @error('company_fax') is-invalid @enderror"
                                                    name="company_fax"
                                                    value="{{ old('company_fax', $cs['company_fax'] ?? '') }}">
                                                @error('company_fax')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Site web') }}
                                                </label>
                                                <input type="url" class="form-control @error('company_website') is-invalid @enderror"
                                                    name="company_website"
                                                    value="{{ old('company_website', $cs['company_website'] ?? '') }}">
                                                @error('company_website')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('ICE (Identifiant Commun de l\'Entreprise)') }}
                                                </label>
                                                <input type="text" class="form-control @error('ice') is-invalid @enderror"
                                                    name="ice" maxlength="15"
                                                    value="{{ old('ice', $cs['ice'] ?? '') }}">
                                                <small class="text-muted">{{ __('15 chiffres — obligatoire sur toutes les factures.') }}</small>
                                                @error('ice')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ═══ SARL / SARL AU legal fields ═══ --}}
                                    <div id="settingsSarlFields" class="{{ $isSociete ? '' : 'd-none' }}">
                                        <div class="card-title-head mt-3">
                                            <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                                <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-building"></i></span>
                                                {{ __('Informations légales de la société') }}
                                            </h6>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __("Identifiant Fiscal (IF)") }}</label>
                                                    <div class="input-group">
                                                        <input type="text" id="tax_id"
                                                            class="form-control @error('tax_id') is-invalid @enderror"
                                                            name="tax_id"
                                                            value="{{ old('tax_id', $cs['tax_id'] ?? '') }}">
                                                        <button class="btn btn-outline-primary" type="button"
                                                            onclick="document.getElementById('tax_id').value = 'IF' + Math.floor(100000 + Math.random() * 900000)"
                                                            title="{{ __('Générer automatiquement') }}">
                                                            <i class="isax isax-refresh"></i>
                                                        </button>
                                                        @error('tax_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('N° Registre de Commerce (RC)') }}</label>
                                                    <input type="text" class="form-control @error('registration_number') is-invalid @enderror"
                                                        name="registration_number"
                                                        value="{{ old('registration_number', $cs['registration_number'] ?? '') }}">
                                                    @error('registration_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('N° CNSS') }}</label>
                                                    <input type="text" class="form-control @error('cnss') is-invalid @enderror"
                                                        name="cnss"
                                                        value="{{ old('cnss', $cs['cnss'] ?? '') }}">
                                                    @error('cnss')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('N° Patente') }}</label>
                                                    <input type="text" class="form-control @error('patente') is-invalid @enderror"
                                                        name="patente"
                                                        value="{{ old('patente', $cs['patente'] ?? '') }}">
                                                    @error('patente')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Capital social (DH)') }}</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control @error('capital_social') is-invalid @enderror"
                                                            name="capital_social" min="0" step="0.01"
                                                            value="{{ old('capital_social', $cs['capital_social'] ?? '') }}">
                                                        <span class="input-group-text">DH</span>
                                                        @error('capital_social')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                    <small class="text-muted" id="settingsCapitalHint">
                                                        @if($currentForme === 'sarl')
                                                            {{ __('Minimum légal : 10 000 DH pour une SARL') }}
                                                        @elseif($currentForme === 'sarl_au')
                                                            {{ __('Minimum légal : 1 DH pour une SARL AU') }}
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Tribunal de commerce') }}</label>
                                                    <input type="text" class="form-control @error('tribunal') is-invalid @enderror"
                                                        name="tribunal"
                                                        value="{{ old('tribunal', $cs['tribunal'] ?? '') }}"
                                                        placeholder="{{ __('Ex: Tribunal de commerce de Casablanca') }}">
                                                    @error('tribunal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Assujetti à la TVA') }}</label>
                                                    <select class="form-select @error('assujetti_tva') is-invalid @enderror"
                                                        name="assujetti_tva" id="settingsAssujettiTva">
                                                        <option value="1" {{ old('assujetti_tva', $cs['assujetti_tva'] ?? true) ? 'selected' : '' }}>{{ __('Oui') }}</option>
                                                        <option value="0" {{ !old('assujetti_tva', $cs['assujetti_tva'] ?? true) ? 'selected' : '' }}>{{ __('Non') }}</option>
                                                    </select>
                                                    @error('assujetti_tva')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 {{ !old('assujetti_tva', $cs['assujetti_tva'] ?? true) ? 'd-none' : '' }}" id="settingsRegimeTvaField">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Régime de TVA') }}</label>
                                                    <select class="form-select @error('regime_tva') is-invalid @enderror" name="regime_tva">
                                                        <option value="encaissement" {{ old('regime_tva', $cs['regime_tva'] ?? '') === 'encaissement' ? 'selected' : '' }}>{{ __('Régime d\'encaissement') }}</option>
                                                        <option value="debit" {{ old('regime_tva', $cs['regime_tva'] ?? '') === 'debit' ? 'selected' : '' }}>{{ __('Régime de débit') }}</option>
                                                    </select>
                                                    @error('regime_tva')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ═══ Auto-Entrepreneur fields ═══ --}}
                                    <div id="settingsAeFields" class="{{ $isAE ? '' : 'd-none' }}">
                                        <div class="card-title-head mt-3">
                                            <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                                <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-user"></i></span>
                                                {{ __('Informations Auto-Entrepreneur') }}
                                            </h6>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('N° Auto-Entrepreneur') }}</label>
                                                    <input type="text" class="form-control @error('numero_ae') is-invalid @enderror"
                                                        name="numero_ae"
                                                        value="{{ old('numero_ae', $cs['numero_ae'] ?? '') }}"
                                                        placeholder="{{ __('Délivré par Barid Al-Maghrib') }}">
                                                    @error('numero_ae')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('CIN du titulaire') }}</label>
                                                    <input type="text" class="form-control @error('cin') is-invalid @enderror"
                                                        name="cin" maxlength="20"
                                                        value="{{ old('cin', $cs['cin'] ?? '') }}"
                                                        placeholder="{{ __('Ex: AB123456') }}">
                                                    @error('cin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Activité principale') }}</label>
                                                    <input type="text" class="form-control @error('activite_principale') is-invalid @enderror"
                                                        name="activite_principale"
                                                        value="{{ old('activite_principale', $cs['activite_principale'] ?? '') }}"
                                                        placeholder="{{ __('Type d\'activité déclarée') }}">
                                                    @error('activite_principale')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="alert alert-info fs-13 mb-3">
                                                    <i class="isax isax-info-circle me-1"></i>
                                                    {{ __('Auto-Entrepreneur : pas de RC, pas de patente, pas de capital social. TVA exonérée (régime simplifié). Plafond CA : 200 000 DH/an (services), 500 000 DH/an (commerce).') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Company Images --}}
                                <div class="border-bottom mb-4 pb-3">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-image"></i></span>
                                            {{ __("Images de l'entreprise") }}
                                        </h6>
                                    </div>

                                    {{-- Logo --}}
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">{{ __('Logo') }}</h6>
                                                        <p class="fs-12">{{ __('Téléchargez le logo de votre entreprise') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file" name="logo" accept="image/*">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>{{ __('Changer la photo') }}</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">{{ __('Taille recommandée : 250 px × 100 px') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                <img src="{{ $tenant->logo_url }}" alt="{{ __('Logo') }}">
                                                @if($tenant->hasMedia('logo'))
                                                    <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"
                                                        onclick="document.getElementById('delete_logo').value='1'"><i class="isax isax-trash"></i></a>
                                                    <input type="hidden" name="delete_logo" id="delete_logo" value="0">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="company-address pb-2 mb-4 border-bottom">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-bold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-map"></i></span>
                                            {{ __('Adresse') }}
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Adresse') }}
                                                </label>
                                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                                    name="address"
                                                    value="{{ old('address', $settings->company_settings['address'] ?? '') }}">
                                                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Pays') }}
                                                </label>
                                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                                    name="country"
                                                    value="{{ old('country', $settings->company_settings['country'] ?? '') }}">
                                                @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Région / Province') }}
                                                </label>
                                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                                    name="state"
                                                    value="{{ old('state', $settings->company_settings['state'] ?? '') }}">
                                                @error('state')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Ville') }}
                                                </label>
                                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                    name="city"
                                                    value="{{ old('city', $settings->company_settings['city'] ?? '') }}">
                                                @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('Code postal') }}
                                                </label>
                                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                                    name="postal_code"
                                                    value="{{ old('postal_code', $settings->company_settings['postal_code'] ?? '') }}">
                                                @error('postal_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-0">
                                    <button type="button" class="btn btn-outline-white me-2" onclick="window.location.reload()">{{ __('Annuler') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>

    <!-- ========================
                End Page Content
            ========================= -->
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ── Forme juridique conditional fields ──
            var formeSelect = document.getElementById('settingsFormeJuridique');
            var sarlFields = document.getElementById('settingsSarlFields');
            var aeFields = document.getElementById('settingsAeFields');
            var capitalHint = document.getElementById('settingsCapitalHint');
            var assujettiSelect = document.getElementById('settingsAssujettiTva');
            var regimeTvaField = document.getElementById('settingsRegimeTvaField');

            function updateSettingsFormeFields() {
                var val = formeSelect.value;
                var societeForms = ['sarl', 'sarl_au', 'sa', 'snc', 'scs', 'sca', 'ei', 'cooperative'];
                var isSociete = societeForms.indexOf(val) !== -1;
                var isAE = (val === 'auto_entrepreneur');

                if (sarlFields) sarlFields.classList.toggle('d-none', !isSociete);
                if (aeFields) aeFields.classList.toggle('d-none', !isAE);

                if (capitalHint) {
                    if (val === 'sarl') {
                        capitalHint.textContent = {!! json_encode(__('Minimum légal : 10 000 DH pour une SARL')) !!};
                    } else if (val === 'sarl_au') {
                        capitalHint.textContent = {!! json_encode(__('Minimum légal : 1 DH pour une SARL AU')) !!};
                    } else if (val === 'sa') {
                        capitalHint.textContent = {!! json_encode(__('Minimum légal : 300 000 DH pour une SA')) !!};
                    } else {
                        capitalHint.textContent = '';
                    }
                }
            }

            if (formeSelect) {
                formeSelect.addEventListener('change', updateSettingsFormeFields);
            }

            // Toggle regime TVA based on assujetti_tva
            if (assujettiSelect && regimeTvaField) {
                assujettiSelect.addEventListener('change', function() {
                    regimeTvaField.classList.toggle('d-none', this.value === '0');
                });
            }

            // Live preview for all company image uploads
            var imageFields = ['logo'];
            imageFields.forEach(function(fieldName) {
                var input = document.querySelector('input[name="' + fieldName + '"]');
                if (!input) return;

                var previewContainer = input.closest('.row.align-items-center');
                if (!previewContainer) return;

                var previewImg = previewContainer.querySelector('.new-logo img');
                if (!previewImg) return;

                input.addEventListener('change', function() {
                    var file = this.files[0];
                    if (!file) return;
                    if (file.size > 5 * 1024 * 1024) {
                        alert({!! json_encode(__("L'image ne doit pas dépasser 5 Mo.")) !!});
                        this.value = '';
                        return;
                    }
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                });
            });
        });
    </script>
@endpush
