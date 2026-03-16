<?php $page = 'plans'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Modifier le plan : {{ $plan->name }}</h6>
                </div>
                <div>
                    <a href="{{ route('sa.plans.index') }}" class="btn btn-outline-white">
                        <i class="ti ti-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Informations du plan') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sa.plans.update', $plan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name', $plan->name) }}" required>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                           name="code" value="{{ old('code', $plan->code) }}" required>
                                    @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Intervalle <span class="text-danger">*</span></label>
                                    <select class="form-select @error('interval') is-invalid @enderror" name="interval" required>
                                        <option value="">-- Choisir --</option>
                                        <option value="month" {{ old('interval', $plan->interval) === 'month' ? 'selected' : '' }}>Mensuel</option>
                                        <option value="year" {{ old('interval', $plan->interval) === 'year' ? 'selected' : '' }}>Annuel</option>
                                        <option value="lifetime" {{ old('interval', $plan->interval) === 'lifetime' ? 'selected' : '' }}>Vie</option>
                                    </select>
                                    @error('interval')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Prix <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                           name="price" value="{{ old('price', $plan->price) }}" required>
                                    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Devise</label>
                                    <input type="text" class="form-control @error('currency') is-invalid @enderror"
                                           name="currency" value="{{ old('currency', $plan->currency ?? 'MAD') }}" maxlength="3">
                                    @error('currency')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Jours d'essai</label>
                                    <input type="number" class="form-control @error('trial_days') is-invalid @enderror"
                                           name="trial_days" value="{{ old('trial_days', $plan->trial_days ?? 0) }}" min="0">
                                    @error('trial_days')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                               {{ old('is_active', $plan->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label">Actif</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            <a href="{{ route('sa.plans.index') }}" class="btn btn-outline-secondary">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
