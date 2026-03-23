<?php $page = 'sa-announcements'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouvelle Annonce')
@section('description', 'Créer une nouvelle annonce')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Nouvelle annonce') }}</h6>
                </div>
                <div>
                    <a href="{{ route('sa.announcements.index') }}" class="btn btn-outline-white">
                        <i class="ti ti-arrow-left me-1"></i> {{ __('Retour') }}
                    </a>
                </div>
            </div>

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __("Détails de l'annonce") }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sa.announcements.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Titre') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                                        <option value="">{{ __('-- Choisir --') }}</option>
                                        <option value="info" {{ old('type') === 'info' ? 'selected' : '' }}>{{ __('Information') }}
                                        </option>
                                        <option value="warning" {{ old('type') === 'warning' ? 'selected' : '' }}>
                                            {{ __('Avertissement') }}</option>
                                        <option value="success" {{ old('type') === 'success' ? 'selected' : '' }}>{{ __('Succès') }}
                                        </option>
                                        <option value="danger" {{ old('type') === 'danger' ? 'selected' : '' }}>{{ __('Urgent') }}
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Contenu') }} <span class="text-danger">*</span></label>
                                    <textarea id="announcement-content" class="form-control @error('content') is-invalid @enderror" name="content">{!! old('content') !!}</textarea>
                                    @error('content')
                                        <div class="text-danger mt-1 fs-12">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Date de publication') }}</label>
                                    <input type="datetime-local"
                                        class="form-control @error('published_at') is-invalid @enderror" name="published_at"
                                        value="{{ old('published_at') }}">
                                    <small class="text-muted">{{ __('Laissez vide pour publier immédiatement.') }}</small>
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("Date d'expiration") }}</label>
                                    <input type="datetime-local"
                                        class="form-control @error('expires_at') is-invalid @enderror" name="expires_at"
                                        value="{{ old('expires_at') }}">
                                    <small class="text-muted">{{ __('Laissez vide pour ne jamais expirer.') }}</small>
                                    @error('expires_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                            {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label">{{ __('Active') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                            <a href="{{ route('sa.announcements.index') }}" class="btn btn-outline-secondary">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('backoffice.components._summernote-editor', [
    'editorId' => 'announcement-content',
    'height' => 250,
])
