<?php $page = 'sa-template-catalog'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Modifier le Modèle')
@section('description', 'Modifier les détails du modèle')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Modifier le modèle') }}</h6>
                    <small class="text-muted">{{ $template->code }}</small>
                </div>
                <div>
                    <a href="{{ route('sa.template-catalog.index') }}" class="btn btn-outline-white">
                        <i class="ti ti-arrow-left me-1"></i> {{ __('Retour') }}
                    </a>
                </div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Détails du modèle') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sa.template-catalog.update', $template) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Nom') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name', $template->name) }}" required>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Code -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Code') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                           name="code" value="{{ old('code', $template->code) }}" required>
                                    <small class="text-muted">{{ __('Identifiant unique (slug). Ex : invoice-classic') }}</small>
                                    @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Document Type -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Type de document') }} <span class="text-danger">*</span></label>
                                    <select class="form-select @error('document_type') is-invalid @enderror"
                                            name="document_type" required>
                                        <option value="">{{ __('-- Choisir --') }}</option>
                                        @foreach($documentTypeLabels as $key => $label)
                                            <option value="{{ $key }}" {{ old('document_type', $template->document_type) === $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('document_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Catégorie') }}</label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror"
                                           name="category" value="{{ old('category', $template->category) }}">
                                    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- View Path -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Chemin de la vue') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('view_path') is-invalid @enderror"
                                           name="view_path" value="{{ old('view_path', $template->view_path) }}" required>
                                    <small class="text-muted">{{ __('Chemin Blade complet (notation point)') }}</small>
                                    @error('view_path')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Preview Image -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("Image d'aperçu") }}</label>
                                    <input type="text" class="form-control @error('preview_image') is-invalid @enderror"
                                           name="preview_image" value="{{ old('preview_image', $template->preview_image) }}">
                                    @error('preview_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description" rows="3">{{ old('description', $template->description) }}</textarea>
                                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Prix') }} <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" min="0"
                                           class="form-control @error('price') is-invalid @enderror"
                                           name="price" value="{{ old('price', $template->price) }}" required>
                                    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Currency -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Devise') }}</label>
                                    <input type="text" class="form-control @error('currency') is-invalid @enderror"
                                           name="currency" value="{{ old('currency', $template->currency) }}" maxlength="3">
                                    @error('currency')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Sort Order -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Ordre') }}</label>
                                    <input type="number" min="0"
                                           class="form-control @error('sort_order') is-invalid @enderror"
                                           name="sort_order" value="{{ old('sort_order', $template->sort_order) }}">
                                    @error('sort_order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Switches -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-block">&nbsp;</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_free" value="1"
                                                   {{ old('is_free', $template->is_free) ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ __('Gratuit') }}</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                                   {{ old('is_active', $template->is_active) ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ __('Actif') }}</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_featured" value="1"
                                                   {{ old('is_featured', $template->is_featured) ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ __('Vedette') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('Mettre à jour') }}</button>
                            <a href="{{ route('sa.template-catalog.index') }}" class="btn btn-outline-secondary">{{ __('Annuler') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
