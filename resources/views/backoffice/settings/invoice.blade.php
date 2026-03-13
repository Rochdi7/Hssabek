<?php $page = 'invoice-settings'; ?>
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
                                    <h6 class="mb-0">{{ __('Paramètres de facturation') }}</h6>
                                </div>
                                <form action="{{ route('bo.settings.invoice.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('backoffice.components.avatar-cropper', [
                                                'currentUrl'  => $tenant->invoice_image_url ?? asset('build/img/icons/company-logo-01.svg'),
                                                'defaultUrl'  => asset('build/img/icons/company-logo-01.svg'),
                                                'inputName'   => 'cropped_invoice_image',
                                                'previewId'   => 'invoice-image-preview',
                                                'hasImage'    => $tenant->hasMedia('invoice_image'),
                                                'label'       => __('Image de facture'),
                                                'required'    => false,
                                            ])
                                        </div>
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-8 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Modèle PDF') }}</label>
                                            <p class="text-muted fs-12 mb-0">{{ __('Le modèle utilisé pour générer les PDF de vos documents.') }}</p>
                                        </div>
                                        <div class="col-md-4 col-sm-12 text-end">
                                            @php
                                                $currentTemplate = $settings->invoice_settings['pdf_template'] ?? 'default';
                                                $templates = \App\Services\Sales\PdfService::TEMPLATES;
                                                $currentName = $templates[$currentTemplate]['name'] ?? 'Standard';
                                            @endphp
                                            <span class="badge bg-primary-transparent text-primary fs-12 me-2">{{ $currentName }}</span>
                                            <a href="{{ route('bo.settings.invoice-templates.index') }}" class="btn btn-sm btn-outline-primary">
                                                <i class="isax isax-document-text me-1"></i>{{ __('Gérer les modèles') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-8 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Préfixe de facture') }}</label>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="mb-3">
                                                <input type="text" class="form-control @error('invoice_prefix') is-invalid @enderror"
                                                    name="invoice_prefix"
                                                    value="{{ old('invoice_prefix', $settings->invoice_settings['invoice_prefix'] ?? 'FAC-') }}"
                                                    placeholder="FAC-">
                                                @error('invoice_prefix')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-8 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Arrondi de facture') }}</label>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="mb-3 d-flex align-items-center">
                                                <select class="form-select @error('invoice_round_off') is-invalid @enderror" name="invoice_round_off">
                                                    <option value="0" {{ old('invoice_round_off', $settings->invoice_settings['invoice_round_off'] ?? '') == '0' ? 'selected' : '' }}>{{ __('Aucun') }}</option>
                                                    <option value="5" {{ old('invoice_round_off', $settings->invoice_settings['invoice_round_off'] ?? '') == '5' ? 'selected' : '' }}>5</option>
                                                    <option value="10" {{ old('invoice_round_off', $settings->invoice_settings['invoice_round_off'] ?? '') == '10' ? 'selected' : '' }}>10</option>
                                                </select>
                                                @error('invoice_round_off')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-8 col-sm-12">
                                            <label class="form-label fw-medium">{{ __("Afficher les détails de l'entreprise") }}</label>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-check form-check-sm form-switch text-end">
                                                <label class="form-check-label form-label m-0">
                                                    <input class="form-check-input form-label" type="checkbox"
                                                        role="switch" name="show_company_details" value="1"
                                                        {{ old('show_company_details', $settings->invoice_settings['show_company_details'] ?? true) ? 'checked' : '' }}>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-md-8 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Délai de paiement (jours)') }}</label>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="mb-3">
                                                <input type="number" class="form-control @error('payment_terms_days') is-invalid @enderror"
                                                    name="payment_terms_days"
                                                    value="{{ old('payment_terms_days', $settings->invoice_settings['payment_terms_days'] ?? '30') }}"
                                                    min="0" max="365">
                                                @error('payment_terms_days')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Conditions de facturation') }}</label>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="mb-3">
                                                <textarea class="form-control @error('invoice_terms') is-invalid @enderror"
                                                    name="invoice_terms" rows="4">{{ old('invoice_terms', $settings->invoice_settings['invoice_terms'] ?? '') }}</textarea>
                                                @error('invoice_terms')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Pied de page de facture') }}</label>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="mb-3">
                                                <textarea class="form-control @error('invoice_footer') is-invalid @enderror"
                                                    name="invoice_footer" rows="3">{{ old('invoice_footer', $settings->invoice_settings['invoice_footer'] ?? '') }}</textarea>
                                                @error('invoice_footer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-3">
                                        <button type="button" class="btn btn-outline-white me-2" onclick="window.location.reload()">{{ __('Annuler') }}</button>
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

    <!-- ========================
           End Page Content
          ========================= -->
@endsection
