<?php $page = 'account-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="row settings-wrapper d-flex">

                        @component('backoffice.components.settings-sidebar')
                        @endcomponent

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Paramètres du compte</h6>
                                </div>

                                {{-- Success / Error alerts --}}
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Fermer"></button>
                                    </div>
                                @endif

                                {{-- ============================
                                     MAIN PROFILE FORM (single)
                                     ============================ --}}
                                <form action="{{ route('bo.account.settings.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    {{-- ── Avatar cropper component ── --}}
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i
                                                class="isax isax-info-circle fs-14"></i></span>
                                        <h6 class="fs-16 fw-semibold mb-0">Informations générales</h6>
                                    </div>

                                    @include('backoffice.components.avatar-cropper', [
                                        'currentUrl' => $user->avatar_url,
                                        'inputName' => 'cropped_avatar',
                                        'previewId' => 'avatar-preview',
                                        'hasImage' => $user->hasMedia('avatar'),
                                        'alt' => $user->name,
                                    ])

                                    {{-- ── Personal info fields ── --}}
                                    <div class="border-bottom mb-4 pb-2">
                                        <div class="row gx-3">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name', $user->name) }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">E-mail <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email', $user->email) }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Téléphone <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone" value="{{ old('phone', $user->phone) }}">
                                                    @error('phone')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Genre</label>
                                                    <select class="select" name="gender">
                                                        <option value="">Sélectionner</option>
                                                        <option value="male"
                                                            {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>
                                                            Homme</option>
                                                        <option value="female"
                                                            {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>
                                                            Femme</option>
                                                    </select>
                                                    @error('gender')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Date de naissance</label>
                                                    <div class="input-group position-relative mb-3">
                                                        <input type="text"
                                                            class="form-control datetimepicker rounded-end"
                                                            name="date_of_birth"
                                                            value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('d-m-Y') : '') }}"
                                                            placeholder="25-03-2025">
                                                        <span class="input-icon-addon fs-16 text-gray-9">
                                                            <i class="isax isax-calendar-2"></i>
                                                        </span>
                                                    </div>
                                                    @error('date_of_birth')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ── Address info ── --}}
                                    <div class="border-bottom mb-3">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i
                                                    class="isax isax-info-circle fs-14"></i></span>
                                            <h6 class="fs-16 fw-semibold mb-0">Informations d'adresse</h6>
                                        </div>
                                        <div class="row gx-3">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Adresse</label>
                                                    <input type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        name="address" value="{{ old('address', $user->address) }}">
                                                    @error('address')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Pays</label>
                                                    <select class="select" name="country">
                                                        <option value="">Sélectionner</option>
                                                        @foreach ($countries as $code => $name)
                                                            <option value="{{ $code }}"
                                                                {{ old('country', $user->country) === $code ? 'selected' : '' }}>
                                                                {{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('country')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Région / Province</label>
                                                    <input type="text"
                                                        class="form-control @error('state') is-invalid @enderror"
                                                        name="state" value="{{ old('state', $user->state) }}">
                                                    @error('state')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Ville<span
                                                            class="text-danger ms-1">*</span></label>
                                                    <input type="text"
                                                        class="form-control @error('city') is-invalid @enderror"
                                                        name="city" value="{{ old('city', $user->city) }}">
                                                    @error('city')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Code postal<span
                                                            class="text-danger ms-1">*</span></label>
                                                    <input type="text"
                                                        class="form-control @error('postal_code') is-invalid @enderror"
                                                        name="postal_code"
                                                        value="{{ old('postal_code', $user->postal_code) }}">
                                                    @error('postal_code')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ── Action buttons ── --}}
                                    <div class="d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn btn-outline-white"
                                            onclick="window.location.reload()">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>,
                Tous droits réservés</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
    </div>
@endsection
