<?php $page = 'warehouses'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouvel Entrepôt')
@section('description', 'Ajouter un nouvel entrepôt')
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
                            <h6><a href="{{ route('bo.inventory.warehouses.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Entrepôts') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Nouvel entrepôt') }}</h5>

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

                                <form action="{{ route('bo.inventory.warehouses.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Informations de l\'entrepôt') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Nom') }} <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Code') }}</label>
                                                <div class="input-group">
                                                    <input type="text" id="warehouse-code" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" placeholder="{{ __('Ex: WH-001') }}">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        onclick="document.getElementById('warehouse-code').value = 'WH-' + String(Math.floor(Math.random() * 9000 + 1000))"
                                                        title="{{ __('Générer automatiquement') }}">
                                                        <i class="isax isax-refresh"></i>
                                                    </button>
                                                    @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Adresse') }}</label>
                                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
                                                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3 pt-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_default" value="1" id="is_default" {{ old('is_default') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="is_default">{{ __('Entrepôt par défaut') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.inventory.warehouses.index') }}" class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Créer l\'entrepôt') }}</button>
                                    </div>
                                </form>
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
@endsection
