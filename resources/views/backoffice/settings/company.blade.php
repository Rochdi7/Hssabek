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
                            <form action="{{ route('bo.settings.company.update') }}" method="POST" enctype="multipart/form-data">
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
                                                <div class="input-group">
                                                    <input type="text" id="tax_id"
                                                        class="form-control @error('tax_id') is-invalid @enderror"
                                                        name="tax_id"
                                                        value="{{ old('tax_id', $settings->company_settings['tax_id'] ?? '') }}">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        onclick="document.getElementById('tax_id').value = 'IF' + Math.floor(100000 + Math.random() * 900000)"
                                                        title="Générer automatiquement">
                                                        <i class="isax isax-refresh"></i>
                                                    </button>
                                                    @error('tax_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
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

                                {{-- Company Images --}}
                                <div class="border-bottom mb-4 pb-3">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span
                                                class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i
                                                    class="isax isax-image"></i></span>
                                            Images de l'entreprise
                                        </h6>
                                    </div>

                                    {{-- Logo --}}
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Logo</h6>
                                                        <p class="fs-12">Téléchargez le logo de votre entreprise</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file" name="logo" accept="image/*">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Changer la photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Taille recommandée : 250 px × 100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                <img src="{{ $tenant->logo_url }}" alt="Logo">
                                                @if($tenant->hasMedia('logo'))
                                                    <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"
                                                        onclick="document.getElementById('delete_logo').value='1'"><i class="isax isax-trash"></i></a>
                                                    <input type="hidden" name="delete_logo" id="delete_logo" value="0">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Dark Logo --}}
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Logo sombre</h6>
                                                        <p class="fs-12">Téléchargez le logo sombre de votre entreprise</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file" name="dark_logo" accept="image/*">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Changer la photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Taille recommandée : 250 px × 100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-dark border">
                                                @if($tenant->dark_logo_url)
                                                    <img src="{{ $tenant->dark_logo_url }}" alt="Logo sombre">
                                                    <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"
                                                        onclick="document.getElementById('delete_dark_logo').value='1'"><i class="isax isax-trash"></i></a>
                                                    <input type="hidden" name="delete_dark_logo" id="delete_dark_logo" value="0">
                                                @else
                                                    <img src="{{ asset('build/img/settings/company-setting-2.svg') }}" alt="Logo sombre">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Mini Logo --}}
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Mini Logo</h6>
                                                        <p class="fs-12">Téléchargez le mini logo de votre entreprise</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file" name="mini_logo" accept="image/*">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Changer la photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Taille recommandée : 250 px × 100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                @if($tenant->mini_logo_url)
                                                    <img src="{{ $tenant->mini_logo_url }}" alt="Mini Logo">
                                                    <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"
                                                        onclick="document.getElementById('delete_mini_logo').value='1'"><i class="isax isax-trash"></i></a>
                                                    <input type="hidden" name="delete_mini_logo" id="delete_mini_logo" value="0">
                                                @else
                                                    <img src="{{ asset('build/img/settings/company-setting-1.svg') }}" alt="Mini Logo">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Dark Mini Logo --}}
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Mini Logo sombre</h6>
                                                        <p class="fs-12">Téléchargez le mini logo sombre de votre entreprise</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file" name="dark_mini_logo" accept="image/*">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Changer la photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Taille recommandée : 250 px × 100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-dark border">
                                                @if($tenant->dark_mini_logo_url)
                                                    <img src="{{ $tenant->dark_mini_logo_url }}" alt="Mini Logo sombre">
                                                    <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"
                                                        onclick="document.getElementById('delete_dark_mini_logo').value='1'"><i class="isax isax-trash"></i></a>
                                                    <input type="hidden" name="delete_dark_mini_logo" id="delete_dark_mini_logo" value="0">
                                                @else
                                                    <img src="{{ asset('build/img/settings/company-setting-4.svg') }}" alt="Mini Logo sombre">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Favicon --}}
                                    <div class="row align-items-center pb-3 mb-3 border-bottom">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Favicon</h6>
                                                        <p class="fs-12">Téléchargez le favicon de votre entreprise</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file" name="favicon" accept="image/*">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Changer la photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Taille recommandée : 250 px × 100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                @if($tenant->favicon_url)
                                                    <img src="{{ $tenant->favicon_url }}" alt="Favicon">
                                                    <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"
                                                        onclick="document.getElementById('delete_favicon').value='1'"><i class="isax isax-trash"></i></a>
                                                    <input type="hidden" name="delete_favicon" id="delete_favicon" value="0">
                                                @else
                                                    <img src="{{ asset('build/img/settings/company-setting-3.svg') }}" alt="Favicon">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Apple Icon --}}
                                    <div class="row align-items-center">
                                        <div class="col-xl-9">
                                            <div class="row gy-3 align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="logo-info">
                                                        <h6 class="fs-14 fw-medium mb-1">Icône Apple</h6>
                                                        <p class="fs-12">Téléchargez l'icône Apple de votre entreprise</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                        <div class="new-employee-field">
                                                            <div class="mb-0">
                                                                <div class="image-upload mb-1">
                                                                    <input type="file" name="apple_icon" accept="image/*">
                                                                    <div class="image-uploads">
                                                                        <h4><i class="ti ti-upload me-1"></i>Changer la photo</h4>
                                                                    </div>
                                                                </div>
                                                                <span class="fs-12">Taille recommandée : 250 px × 100 px</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="new-logo ms-xl-auto bg-light border">
                                                @if($tenant->apple_icon_url)
                                                    <img src="{{ $tenant->apple_icon_url }}" alt="Icône Apple">
                                                    <a href="javascript:void(0);" class="logo-trash bg-white text-danger me-1 mt-1"
                                                        onclick="document.getElementById('delete_apple_icon').value='1'"><i class="isax isax-trash"></i></a>
                                                    <input type="hidden" name="delete_apple_icon" id="delete_apple_icon" value="0">
                                                @else
                                                    <img src="{{ asset('build/img/settings/company-setting-3.svg') }}" alt="Icône Apple">
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Live preview for all company image uploads
            var imageFields = ['logo', 'dark_logo', 'mini_logo', 'dark_mini_logo', 'favicon', 'apple_icon'];
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
                        alert("L'image ne doit pas dépasser 5 Mo.");
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
