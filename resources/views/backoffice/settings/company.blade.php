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
                                <h6 class="fw-bold mb-0">Paramètres de l'entreprise</h6>
                            </div>
                            <form action="{{ route('bo.settings.company.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="border-bottom mb-4">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-info-circle"></i></span>
                                            Informations générales
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Nom de l'entreprise <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                                    name="company_name"
                                                    value="{{ old('company_name', $settings->company_settings['company_name'] ?? '') }}">
                                                @error('company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Adresse e-mail
                                                </label>
                                                <input type="email" class="form-control @error('company_email') is-invalid @enderror"
                                                    name="company_email"
                                                    value="{{ old('company_email', $settings->company_settings['company_email'] ?? '') }}">
                                                @error('company_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Téléphone
                                                </label>
                                                <input type="text" class="form-control @error('company_phone') is-invalid @enderror"
                                                    name="company_phone"
                                                    value="{{ old('company_phone', $settings->company_settings['company_phone'] ?? '') }}">
                                                @error('company_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Fax
                                                </label>
                                                <input type="text" class="form-control @error('company_fax') is-invalid @enderror"
                                                    name="company_fax"
                                                    value="{{ old('company_fax', $settings->company_settings['company_fax'] ?? '') }}">
                                                @error('company_fax')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Site web
                                                </label>
                                                <input type="url" class="form-control @error('company_website') is-invalid @enderror"
                                                    name="company_website"
                                                    value="{{ old('company_website', $settings->company_settings['company_website'] ?? '') }}">
                                                @error('company_website')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    N° d'identification fiscale
                                                </label>
                                                <input type="text" class="form-control @error('tax_id') is-invalid @enderror"
                                                    name="tax_id"
                                                    value="{{ old('tax_id', $settings->company_settings['tax_id'] ?? '') }}">
                                                @error('tax_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    N° registre de commerce
                                                </label>
                                                <input type="text" class="form-control @error('registration_number') is-invalid @enderror"
                                                    name="registration_number"
                                                    value="{{ old('registration_number', $settings->company_settings['registration_number'] ?? '') }}">
                                                @error('registration_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Company Logo --}}
                                <div class="border-bottom mb-4 pb-3">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-image"></i></span>
                                            Logo de l'entreprise
                                        </h6>
                                    </div>
                                    @include('backoffice.components.avatar-cropper', [
                                        'currentUrl'  => $tenant->logo_url,
                                        'defaultUrl'  => asset('build/img/icons/company-logo-01.svg'),
                                        'inputName'   => 'cropped_logo',
                                        'previewId'   => 'company-logo-preview',
                                        'hasImage'    => $tenant->hasMedia('logo'),
                                        'alt'         => $settings->company_settings['company_name'] ?? 'Logo',
                                        'label'       => 'Logo',
                                        'required'    => false,
                                    ])
                                </div>

                                <div class="company-address pb-2 mb-4 border-bottom">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-bold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-map"></i></span>
                                            Adresse
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Adresse
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
                                                    Pays
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
                                                    Région / Province
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
                                                    Ville
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
                                                    Code postal
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
                                    <button type="button" class="btn btn-outline-white me-2" onclick="window.location.reload()">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
