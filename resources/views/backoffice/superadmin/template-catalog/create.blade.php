<?php $page = 'sa-template-catalog'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Nouveau modèle</h6>
                </div>
                <div>
                    <a href="{{ route('sa.template-catalog.index') }}" class="btn btn-outline-white">
                        <i class="ti ti-arrow-left me-1"></i> Retour
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
                    <h5 class="card-title">Détails du modèle</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sa.template-catalog.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required
                                           placeholder="Ex : Standard, Moderne...">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Code -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                           name="code" value="{{ old('code') }}" required
                                           placeholder="Ex : invoice-modern">
                                    <small class="text-muted">Identifiant unique (slug). Ex : invoice-classic</small>
                                    @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Document Type -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Type de document <span class="text-danger">*</span></label>
                                    <select class="form-select @error('document_type') is-invalid @enderror"
                                            name="document_type" required>
                                        <option value="">-- Choisir --</option>
                                        @foreach($documentTypeLabels as $key => $label)
                                            <option value="{{ $key }}" {{ old('document_type') === $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('document_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Catégorie</label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror"
                                           name="category" value="{{ old('category', 'general') }}"
                                           placeholder="Ex : general">
                                    @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- View Path -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Chemin de la vue <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('view_path') is-invalid @enderror"
                                           name="view_path" value="{{ old('view_path') }}" required
                                           placeholder="Ex : pdf.templates.free.invoice.model-1">
                                    <small class="text-muted">Chemin Blade complet (notation point)</small>
                                    @error('view_path')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Preview Image -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Image d'aperçu</label>
                                    <input type="text" class="form-control @error('preview_image') is-invalid @enderror"
                                           name="preview_image" value="{{ old('preview_image') }}"
                                           placeholder="Ex : build/img/invoice/general-invoice-01.svg">
                                    @error('preview_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description" rows="3"
                                              placeholder="Description du modèle...">{{ old('description') }}</textarea>
                                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Prix <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" min="0"
                                           class="form-control @error('price') is-invalid @enderror"
                                           name="price" value="{{ old('price', '0') }}" required>
                                    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Currency -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Devise</label>
                                    <input type="text" class="form-control @error('currency') is-invalid @enderror"
                                           name="currency" value="{{ old('currency', 'MAD') }}" maxlength="3">
                                    @error('currency')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <!-- Sort Order -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Ordre</label>
                                    <input type="number" min="0"
                                           class="form-control @error('sort_order') is-invalid @enderror"
                                           name="sort_order" value="{{ old('sort_order', '0') }}">
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
                                                   {{ old('is_free', true) ? 'checked' : '' }}>
                                            <label class="form-check-label">Gratuit</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                                   {{ old('is_active', true) ? 'checked' : '' }}>
                                            <label class="form-check-label">Actif</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="is_featured" value="1"
                                                   {{ old('is_featured') ? 'checked' : '' }}>
                                            <label class="form-check-label">Vedette</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="{{ route('sa.template-catalog.index') }}" class="btn btn-outline-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
