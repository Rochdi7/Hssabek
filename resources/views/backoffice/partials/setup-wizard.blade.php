{{-- Setup Wizard Modal — shown on first login for admin users --}}
<div id="setupWizardModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <div>
                    <h4 class="modal-title mb-1">
                        <i class="isax isax-magic-star me-2 text-primary"></i>{{ __('Configuration de votre entreprise') }}
                    </h4>
                    <p class="text-muted fs-13 mb-0">{{ __('Complétez ces étapes pour commencer à créer vos factures rapidement.') }}</p>
                </div>
            </div>

            <form id="setupWizardForm" method="POST" action="{{ route('bo.setup-wizard.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Progress bar --}}
                <div class="px-4 pt-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="fs-13 fw-medium text-dark" id="wizardStepLabel">{{ __('Étape 1 sur 9') }}</span>
                        <span class="fs-13 text-muted" id="wizardStepTitle">{{ __('Informations de l\'entreprise') }}</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-primary" id="wizardProgressBar" role="progressbar" style="width: 14.28%"></div>
                    </div>
                </div>

                <div class="modal-body" style="min-height: 400px;">

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 1 — Informations de l'entreprise             --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step" id="wizardStep1">
                        <h6 class="mb-3"><i class="isax isax-building-3 me-2"></i>{{ __('Informations de l\'entreprise') }}</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Nom de l\'entreprise') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_name" required placeholder="{{ __('Ex: Société ABC SARL') }}" value="{{ $prefill['company_name'] ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Forme juridique') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="forme_juridique" id="wizardFormeJuridique" required>
                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                    <optgroup label="{{ __('Sociétés') }}">
                                        <option value="sarl">{{ __('SARL — Société à Responsabilité Limitée') }}</option>
                                        <option value="sarl_au">{{ __('SARL AU — Associé Unique') }}</option>
                                        <option value="sa">{{ __('SA — Société Anonyme') }}</option>
                                        <option value="snc">{{ __('SNC — Société en Nom Collectif') }}</option>
                                        <option value="scs">{{ __('SCS — Société en Commandite Simple') }}</option>
                                        <option value="sca">{{ __('SCA — Société en Commandite par Actions') }}</option>
                                    </optgroup>
                                    <optgroup label="{{ __('Entreprises individuelles') }}">
                                        <option value="auto_entrepreneur">{{ __('Auto-Entrepreneur') }}</option>
                                        <option value="ei">{{ __('EI — Entreprise Individuelle (Personne Physique)') }}</option>
                                    </optgroup>
                                    <optgroup label="{{ __('Autres') }}">
                                        <option value="cooperative">{{ __('Coopérative') }}</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Email professionnel') }} <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="company_email" required placeholder="{{ __('contact@votreentreprise.com') }}" value="{{ $prefill['company_email'] ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Téléphone') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="company_phone" required placeholder="{{ __('Ex: +212 5XX XX XX XX') }}" value="{{ $prefill['company_phone'] ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('ICE (Identifiant Commun de l\'Entreprise)') }}</label>
                                <input type="text" class="form-control" name="ice" placeholder="{{ __('15 chiffres') }}" maxlength="15">
                                <small class="text-muted">{{ __('Obligatoire sur toutes les factures.') }}</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Logo de l\'entreprise') }}</label>
                                <input type="file" class="form-control" name="logo" accept="image/*">
                                <small class="text-muted">{{ __('Format: PNG, JPG. Max 2 Mo.') }}</small>
                            </div>

                            {{-- SARL / SARL AU specific fields --}}
                            <div class="col-12 wizard-sarl-fields d-none">
                                <hr class="my-2">
                                <p class="text-muted fs-13 mb-3"><i class="isax isax-building me-1"></i>{{ __('Informations légales de la société') }}</p>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('Identifiant Fiscal (IF)') }}</label>
                                        <input type="text" class="form-control" name="tax_id" placeholder="{{ __('Facultatif') }}" value="{{ $prefill['tax_id'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('N° Registre de Commerce (RC)') }}</label>
                                        <input type="text" class="form-control" name="registration_number" placeholder="{{ __('Tribunal + numéro') }}" value="{{ $prefill['registration_number'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('N° CNSS') }}</label>
                                        <input type="text" class="form-control" name="cnss" placeholder="{{ __('Facultatif') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('N° Patente') }}</label>
                                        <input type="text" class="form-control" name="patente" placeholder="{{ __('Facultatif') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('Capital social (DH)') }}</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="capital_social" placeholder="{{ __('Ex: 10000') }}" min="0" step="0.01">
                                            <span class="input-group-text">DH</span>
                                        </div>
                                        <small class="text-muted wizard-capital-hint"></small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('Tribunal de commerce') }}</label>
                                        <input type="text" class="form-control" name="tribunal" placeholder="{{ __('Ex: Tribunal de commerce de Casablanca') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('Assujetti à la TVA') }}</label>
                                        <select class="form-select" name="assujetti_tva" id="wizardAssujettiTva">
                                            <option value="1" selected>{{ __('Oui') }}</option>
                                            <option value="0">{{ __('Non') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3 wizard-regime-tva-field">
                                        <label class="form-label">{{ __('Régime de TVA') }}</label>
                                        <select class="form-select" name="regime_tva">
                                            <option value="encaissement" selected>{{ __('Régime d\'encaissement') }}</option>
                                            <option value="debit">{{ __('Régime de débit') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Auto-Entrepreneur specific fields --}}
                            <div class="col-12 wizard-ae-fields d-none">
                                <hr class="my-2">
                                <p class="text-muted fs-13 mb-3"><i class="isax isax-user me-1"></i>{{ __('Informations Auto-Entrepreneur') }}</p>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('N° Auto-Entrepreneur') }}</label>
                                        <input type="text" class="form-control" name="numero_ae" placeholder="{{ __('Délivré par Barid Al-Maghrib') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">{{ __('CIN du titulaire') }}</label>
                                        <input type="text" class="form-control" name="cin" placeholder="{{ __('Ex: AB123456') }}" maxlength="20">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">{{ __('Activité principale') }}</label>
                                        <input type="text" class="form-control" name="activite_principale" placeholder="{{ __('Type d\'activité déclarée') }}">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="alert alert-info fs-13 mb-0">
                                            <i class="isax isax-info-circle me-1"></i>
                                            {{ __('Auto-Entrepreneur : pas de RC, pas de patente, pas de capital social. TVA exonérée (régime simplifié). Plafond CA : 200 000 DH/an (services), 500 000 DH/an (commerce).') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 2 — Adresse de l'entreprise                  --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step d-none" id="wizardStep2">
                        <h6 class="mb-3"><i class="isax isax-location me-2"></i>{{ __('Adresse de l\'entreprise') }}</h6>
                        <div class="row">
                            @php
                                $prefillCountry = $prefill['country'] ?? 'Maroc';
                                $countries = ['Maroc', 'Algérie', 'Tunisie', 'France', 'Belgique', 'Canada', 'Suisse', "Côte d'Ivoire", 'Sénégal', 'Mauritanie', 'Arabie Saoudite', 'Émirats Arabes Unis', 'Autre'];
                            @endphp
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('Adresse') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" required placeholder="{{ __('Rue, numéro, quartier...') }}" value="{{ $prefill['address'] ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Pays') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="country" required>
                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                    @foreach($countries as $c)
                                        <option value="{{ $c }}" {{ $prefillCountry === $c ? 'selected' : '' }}>{{ __($c) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Ville') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="city" required placeholder="{{ __('Ex: Casablanca') }}" value="{{ $prefill['city'] ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Région / Province') }}</label>
                                <input type="text" class="form-control" name="state" placeholder="{{ __('Facultatif') }}" value="{{ $prefill['state'] ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Code postal') }}</label>
                                <input type="text" class="form-control" name="postal_code" placeholder="{{ __('Facultatif') }}" value="{{ $prefill['postal_code'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 3 — Devise & Localisation                    --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step d-none" id="wizardStep3">
                        <h6 class="mb-3"><i class="isax isax-money-2 me-2"></i>{{ __('Devise & Localisation') }}</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Devise principale') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="currency" required>
                                    <option value="MAD" selected>Dirham marocain (د.م. MAD)</option>
                                    <option value="EUR">Euro (€ EUR)</option>
                                    <option value="USD">Dollar américain ($ USD)</option>
                                </select>
                                <small class="text-muted">{{ __('La devise utilisée par défaut dans vos factures.') }}</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Fuseau horaire') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="timezone" required>
                                    <option value="Africa/Casablanca" selected>Africa/Casablanca (GMT+1)</option>
                                    <option value="Europe/Paris">Europe/Paris (GMT+1/+2)</option>
                                    <option value="Europe/Brussels">Europe/Brussels (GMT+1/+2)</option>
                                    <option value="America/Montreal">America/Montreal (GMT-5/-4)</option>
                                    <option value="Africa/Tunis">Africa/Tunis (GMT+1)</option>
                                    <option value="Africa/Algiers">Africa/Algiers (GMT+1)</option>
                                    <option value="Africa/Dakar">Africa/Dakar (GMT+0)</option>
                                    <option value="Africa/Abidjan">Africa/Abidjan (GMT+0)</option>
                                    <option value="Asia/Riyadh">Asia/Riyadh (GMT+3)</option>
                                    <option value="Asia/Dubai">Asia/Dubai (GMT+4)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Format de date') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="date_format" required>
                                    <option value="d/m/Y" selected>dd/mm/aaaa (31/12/2026)</option>
                                    <option value="d-m-Y">dd-mm-aaaa (31-12-2026)</option>
                                    <option value="Y-m-d">aaaa-mm-dd (2026-12-31)</option>
                                    <option value="d.m.Y">dd.mm.aaaa (31.12.2026)</option>
                                    <option value="m/d/Y">mm/dd/aaaa (12/31/2026)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Langue des documents') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="language" required>
                                    <option value="fr" selected>{{ __('Français') }}</option>
                                    <option value="ar">{{ __('العربية') }}</option>
                                    <option value="en">{{ __('English') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 4 — Taxes (TVA)                              --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step d-none" id="wizardStep4">
                        <h6 class="mb-3"><i class="isax isax-percentage-circle me-2"></i>{{ __('Taux de taxes (TVA)') }}</h6>
                        <p class="text-muted fs-13 mb-3">{{ __('Cochez les taux que vous utilisez. Vous pourrez en ajouter d\'autres plus tard dans les paramètres.') }}</p>

                        <div id="taxRatesContainer">
                            {{-- Pre-populated Moroccan TVA rates --}}
                            @php
                                $defaultTaxRates = [
                                    ['name' => 'TVA 20%', 'rate' => 20, 'checked' => true, 'default' => true],
                                    ['name' => 'TVA 14%', 'rate' => 14, 'checked' => false, 'default' => false],
                                    ['name' => 'TVA 10%', 'rate' => 10, 'checked' => false, 'default' => false],
                                    ['name' => 'TVA 7%',  'rate' => 7,  'checked' => false, 'default' => false],
                                    ['name' => 'Exonéré (0%)', 'rate' => 0, 'checked' => true, 'default' => false],
                                ];
                            @endphp
                            @foreach($defaultTaxRates as $i => $tax)
                                <div class="tax-rate-row d-flex align-items-center gap-3 mb-2 p-2 border rounded">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input tax-rate-check" id="tax_{{ $i }}" {{ $tax['checked'] ? 'checked' : '' }} data-index="{{ $i }}">
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control form-control-sm" name="tax_rates[{{ $i }}][name]" value="{{ $tax['name'] }}" {{ !$tax['checked'] ? 'disabled' : '' }}>
                                    </div>
                                    <div style="width: 100px;">
                                        <div class="input-group input-group-sm">
                                            <input type="number" class="form-control form-control-sm" name="tax_rates[{{ $i }}][rate]" value="{{ $tax['rate'] }}" step="0.01" min="0" max="100" {{ !$tax['checked'] ? 'disabled' : '' }}>
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="default_tax" value="{{ $i }}" {{ $tax['default'] ? 'checked' : '' }} {{ !$tax['checked'] ? 'disabled' : '' }}>
                                        <label class="form-check-label fs-12">{{ __('Par défaut') }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addCustomTaxBtn">
                            <i class="isax isax-add me-1"></i>{{ __('Ajouter un taux personnalisé') }}
                        </button>
                    </div>

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 5 — Unités de mesure                         --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step d-none" id="wizardStep5">
                        <h6 class="mb-3"><i class="isax isax-ruler me-2"></i>{{ __('Unités de mesure') }}</h6>
                        <p class="text-muted fs-13 mb-3">{{ __('Cochez les unités que vous utilisez pour vos produits et services.') }}</p>

                        <div id="unitsContainer">
                            @php
                                $defaultUnits = [
                                    ['name' => 'Pièce',      'short_name' => 'pc',    'checked' => true],
                                    ['name' => 'Heure',      'short_name' => 'h',     'checked' => true],
                                    ['name' => 'Jour',        'short_name' => 'j',     'checked' => false],
                                    ['name' => 'Kilogramme', 'short_name' => 'kg',    'checked' => false],
                                    ['name' => 'Litre',       'short_name' => 'L',     'checked' => false],
                                    ['name' => 'Mètre',       'short_name' => 'm',     'checked' => false],
                                    ['name' => 'Mètre carré', 'short_name' => 'm²',   'checked' => false],
                                    ['name' => 'Forfait',     'short_name' => 'forf.', 'checked' => true],
                                    ['name' => 'Service',     'short_name' => 'srv',   'checked' => true],
                                ];
                            @endphp
                            @foreach($defaultUnits as $j => $unit)
                                <div class="unit-row d-flex align-items-center gap-3 mb-2 p-2 border rounded">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input unit-check" id="unit_{{ $j }}" {{ $unit['checked'] ? 'checked' : '' }} data-index="{{ $j }}">
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control form-control-sm" name="units[{{ $j }}][name]" value="{{ $unit['name'] }}" {{ !$unit['checked'] ? 'disabled' : '' }}>
                                    </div>
                                    <div style="width: 100px;">
                                        <input type="text" class="form-control form-control-sm" name="units[{{ $j }}][short_name]" value="{{ $unit['short_name'] }}" {{ !$unit['checked'] ? 'disabled' : '' }}>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addCustomUnitBtn">
                            <i class="isax isax-add me-1"></i>{{ __('Ajouter une unité personnalisée') }}
                        </button>
                    </div>

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 6 — Méthodes de paiement                     --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step d-none" id="wizardStep6">
                        <h6 class="mb-3"><i class="isax isax-card me-2"></i>{{ __('Méthodes de paiement') }}</h6>
                        <p class="text-muted fs-13 mb-3">{{ __('Cochez les méthodes de paiement que vous acceptez de vos clients.') }}</p>

                        <div id="paymentMethodsContainer">
                            @php
                                $defaultPaymentMethods = [
                                    ['name' => 'Espèces',            'checked' => true],
                                    ['name' => 'Virement bancaire',  'checked' => true],
                                    ['name' => 'Chèque',             'checked' => true],
                                    ['name' => 'Carte bancaire',     'checked' => false],
                                    ['name' => 'Effet de commerce',  'checked' => false],
                                    ['name' => 'Prélèvement',        'checked' => false],
                                ];
                            @endphp
                            @foreach($defaultPaymentMethods as $k => $pm)
                                <div class="pm-row d-flex align-items-center gap-3 mb-2 p-2 border rounded">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input pm-check" id="pm_{{ $k }}" {{ $pm['checked'] ? 'checked' : '' }} data-index="{{ $k }}">
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control form-control-sm" name="payment_methods[{{ $k }}][name]" value="{{ $pm['name'] }}" {{ !$pm['checked'] ? 'disabled' : '' }}>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addCustomPmBtn">
                            <i class="isax isax-add me-1"></i>{{ __('Ajouter une méthode personnalisée') }}
                        </button>
                    </div>

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 7 — Compte bancaire (obligatoire)            --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step d-none" id="wizardStep7">
                        <h6 class="mb-3"><i class="isax isax-bank me-2"></i>{{ __('Compte bancaire principal') }}</h6>
                        <p class="text-muted fs-13 mb-3">{{ __('Ajoutez votre compte bancaire principal. Il sera utilisé par défaut pour enregistrer les paiements de vos ventes et achats.') }}</p>

                        <div class="alert alert-info fs-13 mb-3">
                            <i class="isax isax-info-circle me-1"></i>
                            {{ __('Ce compte est essentiel pour le suivi de vos revenus (ventes) et dépenses (achats). Vous pourrez ajouter d\'autres comptes plus tard.') }}
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Nom de la banque') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="bank_name" required placeholder="{{ __('Ex: Attijariwafa Bank') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Titulaire du compte') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="bank_account_holder" required placeholder="{{ __('Ex: Société ABC SARL') }}">
                            </div>
                            <input type="hidden" name="bank_account_number" value="-">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Type de compte') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="bank_account_type" required>
                                    <option value="current" selected>{{ __('Compte courant') }}</option>
                                    <option value="business">{{ __('Compte professionnel') }}</option>
                                    <option value="savings">{{ __('Compte épargne') }}</option>
                                    <option value="other">{{ __('Autre') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Agence / Succursale') }}</label>
                                <input type="text" class="form-control" name="bank_branch" placeholder="{{ __('Ex: Casablanca — Agence principale') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Code SWIFT / BIC') }}</label>
                                <input type="text" class="form-control" name="bank_swift" placeholder="{{ __('Facultatif') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Solde d\'ouverture') }}</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="bank_opening_balance" value="0" min="0" step="0.01" placeholder="0.00">
                                    <span class="input-group-text">DH</span>
                                </div>
                                <small class="text-muted">{{ __('Le solde actuel de votre compte au moment de la configuration.') }}</small>
                            </div>
                        </div>
                    </div>

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 8 — Entrepôt / Dépôt d'inventaire            --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step d-none" id="wizardStep8">
                        <h6 class="mb-3"><i class="isax isax-box me-2"></i>{{ __('Entrepôt principal') }}</h6>
                        <p class="text-muted fs-13 mb-3">{{ __('Configurez votre entrepôt ou dépôt principal pour la gestion de votre inventaire et stock.') }}</p>

                        <div class="alert alert-info fs-13 mb-3">
                            <i class="isax isax-info-circle me-1"></i>
                            {{ __('Cet entrepôt sera utilisé par défaut pour les réceptions de marchandises, les transferts de stock et le suivi de l\'inventaire. Vous pourrez en ajouter d\'autres plus tard.') }}
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Nom de l\'entrepôt') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="warehouse_name" required value="{{ __('Entrepôt principal') }}" placeholder="{{ __('Ex: Entrepôt principal') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Code') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="warehouse_code" required value="EP-001" placeholder="{{ __('Ex: EP-001') }}">
                                <small class="text-muted">{{ __('Code court pour identifier l\'entrepôt.') }}</small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">{{ __('Adresse de l\'entrepôt') }}</label>
                                <input type="text" class="form-control" name="warehouse_address" placeholder="{{ __('Facultatif — Adresse physique de l\'entrepôt') }}">
                                <small class="text-muted">{{ __('Laissez vide si l\'entrepôt est à la même adresse que l\'entreprise.') }}</small>
                            </div>
                        </div>
                    </div>

                    {{-- ═══════════════════════════════════════════════════ --}}
                    {{-- STEP 9 — Signature                                --}}
                    {{-- ═══════════════════════════════════════════════════ --}}
                    <div class="wizard-step d-none" id="wizardStep9">
                        <h6 class="mb-3"><i class="isax isax-edit me-2"></i>{{ __('Signature de l\'entreprise') }}</h6>
                        <p class="text-muted fs-13 mb-3">{{ __('Ajoutez la signature qui apparaîtra sur vos factures et devis. Vous pouvez passer cette étape et l\'ajouter plus tard.') }}</p>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Nom de la signature') }}</label>
                                <input type="text" class="form-control" name="signature_name" placeholder="{{ __('Ex: Signature du gérant') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Image de la signature') }}</label>
                                <input type="file" class="form-control" name="signature_image" accept="image/*" id="signatureImageInput">
                                <small class="text-muted">{{ __('Format: PNG (fond transparent recommandé). Max 2 Mo.') }}</small>
                            </div>
                            <div class="col-md-12">
                                <div id="signaturePreviewContainer" class="d-none text-center p-3 border rounded bg-light">
                                    <p class="fs-13 text-muted mb-2">{{ __('Aperçu :') }}</p>
                                    <img id="signaturePreview" src="" alt="Aperçu signature" style="max-height: 120px; max-width: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Footer with navigation buttons --}}
                <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                    <button type="button" class="btn btn-outline-white d-none" id="wizardPrevBtn">
                        <i class="isax isax-arrow-left me-1"></i>{{ __('Précédent') }}
                    </button>
                    <div class="ms-auto d-flex gap-2">
                        <button type="button" class="btn btn-primary" id="wizardNextBtn">
                            {{ __('Suivant') }} <i class="isax isax-arrow-right-2 ms-1"></i>
                        </button>
                        <button type="submit" class="btn btn-primary d-none" id="wizardSubmitBtn">
                            <i class="isax isax-tick-circle me-1"></i>{{ __('Terminer la configuration') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Hidden input template for default tax flag --}}
<template id="taxDefaultHiddenTpl">
    <input type="hidden" class="tax-default-hidden">
</template>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var currentStep = 1;
    var totalSteps = 9;
    var customTaxIndex = {{ count($defaultTaxRates) }};
    var customUnitIndex = {{ count($defaultUnits) }};
    var customPmIndex = {{ count($defaultPaymentMethods) }};

    var stepTitles = {
        1: "{{ __('Informations de l\'entreprise') }}",
        2: "{{ __('Adresse de l\'entreprise') }}",
        3: "{{ __('Devise & Localisation') }}",
        4: "{{ __('Taux de taxes (TVA)') }}",
        5: "{{ __('Unités de mesure') }}",
        6: "{{ __('Méthodes de paiement') }}",
        7: "{{ __('Compte bancaire') }}",
        8: "{{ __('Entrepôt d\'inventaire') }}",
        9: "{{ __('Signature de l\'entreprise') }}"
    };

    function updateWizardUI() {
        // Show/hide steps
        for (var s = 1; s <= totalSteps; s++) {
            var el = document.getElementById('wizardStep' + s);
            if (el) {
                el.classList.toggle('d-none', s !== currentStep);
            }
        }

        // Progress
        document.getElementById('wizardStepLabel').textContent = "{{ __('Étape') }} " + currentStep + " {{ __('sur') }} " + totalSteps;
        document.getElementById('wizardStepTitle').textContent = stepTitles[currentStep];
        document.getElementById('wizardProgressBar').style.width = ((currentStep / totalSteps) * 100) + '%';

        // Buttons
        document.getElementById('wizardPrevBtn').classList.toggle('d-none', currentStep === 1);
        document.getElementById('wizardNextBtn').classList.toggle('d-none', currentStep === totalSteps);
        document.getElementById('wizardSubmitBtn').classList.toggle('d-none', currentStep !== totalSteps);
    }

    // Validate required fields in current step
    function validateCurrentStep() {
        var stepEl = document.getElementById('wizardStep' + currentStep);
        var requiredFields = stepEl.querySelectorAll('[required]:not(:disabled)');
        var valid = true;
        requiredFields.forEach(function(field) {
            field.classList.remove('is-invalid');
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                valid = false;
            }
        });
        return valid;
    }

    // Next button
    document.getElementById('wizardNextBtn').addEventListener('click', function() {
        if (!validateCurrentStep()) return;
        if (currentStep < totalSteps) {
            currentStep++;
            updateWizardUI();
        }
    });

    // Previous button
    document.getElementById('wizardPrevBtn').addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateWizardUI();
        }
    });

    // Handle tax rate checkbox toggle
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('tax-rate-check')) {
            var row = e.target.closest('.tax-rate-row');
            var inputs = row.querySelectorAll('input[type="text"], input[type="number"], input[type="radio"]');
            inputs.forEach(function(inp) {
                inp.disabled = !e.target.checked;
            });
            if (!e.target.checked) {
                var radio = row.querySelector('input[type="radio"]');
                if (radio) radio.checked = false;
            }
        }

        if (e.target.classList.contains('unit-check')) {
            var row = e.target.closest('.unit-row');
            var inputs = row.querySelectorAll('input[type="text"]');
            inputs.forEach(function(inp) {
                inp.disabled = !e.target.checked;
            });
        }

        if (e.target.classList.contains('pm-check')) {
            var row = e.target.closest('.pm-row');
            var inputs = row.querySelectorAll('input[type="text"]');
            inputs.forEach(function(inp) {
                inp.disabled = !e.target.checked;
            });
        }
    });

    // Add custom tax rate
    document.getElementById('addCustomTaxBtn').addEventListener('click', function() {
        var idx = customTaxIndex++;
        var html = '<div class="tax-rate-row d-flex align-items-center gap-3 mb-2 p-2 border rounded">' +
            '<div class="form-check"><input type="checkbox" class="form-check-input tax-rate-check" checked data-index="' + idx + '"></div>' +
            '<div class="flex-grow-1"><input type="text" class="form-control form-control-sm" name="tax_rates[' + idx + '][name]" placeholder="{{ __("Nom du taux") }}" required></div>' +
            '<div style="width: 100px;"><div class="input-group input-group-sm"><input type="number" class="form-control form-control-sm" name="tax_rates[' + idx + '][rate]" placeholder="0" step="0.01" min="0" max="100" required><span class="input-group-text">%</span></div></div>' +
            '<div class="form-check"><input type="radio" class="form-check-input" name="default_tax" value="' + idx + '"><label class="form-check-label fs-12">{{ __("Par défaut") }}</label></div>' +
            '<button type="button" class="btn btn-sm btn-outline-danger remove-row-btn"><i class="isax isax-trash"></i></button>' +
            '</div>';
        document.getElementById('taxRatesContainer').insertAdjacentHTML('beforeend', html);
    });

    // Add custom unit
    document.getElementById('addCustomUnitBtn').addEventListener('click', function() {
        var idx = customUnitIndex++;
        var html = '<div class="unit-row d-flex align-items-center gap-3 mb-2 p-2 border rounded">' +
            '<div class="form-check"><input type="checkbox" class="form-check-input unit-check" checked data-index="' + idx + '"></div>' +
            '<div class="flex-grow-1"><input type="text" class="form-control form-control-sm" name="units[' + idx + '][name]" placeholder="{{ __("Nom de l\'unité") }}" required></div>' +
            '<div style="width: 100px;"><input type="text" class="form-control form-control-sm" name="units[' + idx + '][short_name]" placeholder="{{ __("Abrév.") }}" required></div>' +
            '<button type="button" class="btn btn-sm btn-outline-danger remove-row-btn"><i class="isax isax-trash"></i></button>' +
            '</div>';
        document.getElementById('unitsContainer').insertAdjacentHTML('beforeend', html);
    });

    // Add custom payment method
    document.getElementById('addCustomPmBtn').addEventListener('click', function() {
        var idx = customPmIndex++;
        var html = '<div class="pm-row d-flex align-items-center gap-3 mb-2 p-2 border rounded">' +
            '<div class="form-check"><input type="checkbox" class="form-check-input pm-check" checked data-index="' + idx + '"></div>' +
            '<div class="flex-grow-1"><input type="text" class="form-control form-control-sm" name="payment_methods[' + idx + '][name]" placeholder="{{ __("Nom de la méthode") }}" required></div>' +
            '<button type="button" class="btn btn-sm btn-outline-danger remove-row-btn"><i class="isax isax-trash"></i></button>' +
            '</div>';
        document.getElementById('paymentMethodsContainer').insertAdjacentHTML('beforeend', html);
    });

    // Remove custom row
    document.addEventListener('click', function(e) {
        var btn = e.target.closest('.remove-row-btn');
        if (btn) {
            btn.closest('.tax-rate-row, .unit-row, .pm-row').remove();
        }
    });

    // Before form submit: remove disabled inputs (unchecked items) and inject default flag
    document.getElementById('setupWizardForm').addEventListener('submit', function(e) {
        // Remove disabled inputs so they are not sent
        this.querySelectorAll('input:disabled').forEach(function(inp) {
            inp.removeAttribute('name');
        });

        // Set default flag on selected tax rate
        var defaultRadio = this.querySelector('input[name="default_tax"]:checked');
        if (defaultRadio) {
            var idx = defaultRadio.value;
            var hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'tax_rates[' + idx + '][default]';
            hidden.value = '1';
            this.appendChild(hidden);
        }
    });

    // Signature image preview
    var sigInput = document.getElementById('signatureImageInput');
    if (sigInput) {
        sigInput.addEventListener('change', function() {
            var container = document.getElementById('signaturePreviewContainer');
            var preview = document.getElementById('signaturePreview');
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('d-none');
                };
                reader.readAsDataURL(this.files[0]);
            } else {
                container.classList.add('d-none');
            }
        });
    }

    // ── Forme juridique conditional fields ──
    var formeSelect = document.getElementById('wizardFormeJuridique');
    var sarlFields = document.querySelectorAll('.wizard-sarl-fields');
    var aeFields = document.querySelectorAll('.wizard-ae-fields');
    var capitalHint = document.querySelector('.wizard-capital-hint');
    var assujettiSelect = document.getElementById('wizardAssujettiTva');
    var regimeTvaField = document.querySelector('.wizard-regime-tva-field');

    function updateFormeFields() {
        var val = formeSelect.value;
        var societeForms = ['sarl', 'sarl_au', 'sa', 'snc', 'scs', 'sca', 'ei', 'cooperative'];
        var isSociete = societeForms.indexOf(val) !== -1;
        var isAE = (val === 'auto_entrepreneur');

        sarlFields.forEach(function(el) { el.classList.toggle('d-none', !isSociete); });
        aeFields.forEach(function(el) { el.classList.toggle('d-none', !isAE); });

        // Capital social hint
        if (capitalHint) {
            if (val === 'sarl') {
                capitalHint.textContent = "{{ __('Minimum légal : 10 000 DH pour une SARL') }}";
            } else if (val === 'sarl_au') {
                capitalHint.textContent = "{{ __('Minimum légal : 1 DH pour une SARL AU') }}";
            } else if (val === 'sa') {
                capitalHint.textContent = "{{ __('Minimum légal : 300 000 DH pour une SA') }}";
            } else {
                capitalHint.textContent = '';
            }
        }
    }

    formeSelect.addEventListener('change', updateFormeFields);
    updateFormeFields();

    // Toggle regime TVA based on assujetti_tva
    if (assujettiSelect && regimeTvaField) {
        assujettiSelect.addEventListener('change', function() {
            regimeTvaField.classList.toggle('d-none', this.value === '0');
        });
    }

    // Show the modal
    var wizardModal = new bootstrap.Modal(document.getElementById('setupWizardModal'));
    wizardModal.show();
});
</script>
@endpush
