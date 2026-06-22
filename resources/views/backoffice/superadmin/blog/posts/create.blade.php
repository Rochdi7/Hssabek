<?php $page = 'sa-blog-posts'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouvel article')
@section('description', 'Rédiger un nouvel article de blog')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
            <div>
                <h6>{{ __('Nouvel article') }}</h6>
            </div>
            <a href="{{ route('sa.blog.posts.index') }}" class="btn btn-outline-white">
                <i class="isax isax-arrow-left me-1"></i> {{ __('Retour aux articles') }}
            </a>
        </div>

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <form action="{{ route('sa.blog.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">

                <!-- Left: main content -->
                <div class="col-lg-8">

                    <!-- Basic Info -->
                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('Contenu de l\'article') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Titre') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" placeholder="{{ __('Titre de l\'article...') }}">
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Résumé') }}</label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                    name="excerpt" rows="2" placeholder="{{ __('Résumé court (affiché dans les listes)...') }}">{{ old('excerpt') }}</textarea>
                                <small class="text-muted">{{ __('Max 500 caractères') }}</small>
                                @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-0">
                                <label class="form-label">{{ __('Contenu') }} <span class="text-danger">*</span></label>
                                <textarea id="blog-content" class="form-control @error('content') is-invalid @enderror"
                                    name="content" rows="18">{{ old('content') }}</textarea>
                                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <!-- Image de couverture -->
                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('Image de couverture') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="file" class="form-control @error('cover_image') is-invalid @enderror"
                                    name="cover_image" accept="image/jpeg,image/png,image/webp">
                                <small class="text-muted">{{ __('JPG, PNG ou WebP — max 2 Mo. Taille recommandée : 1200×630px.') }}</small>
                                @error('cover_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-0">
                                <label class="form-label">{{ __('Texte alternatif (alt)') }}</label>
                                <input type="text" class="form-control" name="cover_image_alt" value="{{ old('cover_image_alt') }}"
                                    placeholder="{{ __('Description de l\'image pour l\'accessibilité et le SEO') }}">
                            </div>
                        </div>
                    </div>

                    <!-- SEO -->
                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('SEO — Référencement') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Meta titre') }} <span class="text-muted fs-12">({{ __('max 70 car.') }})</span></label>
                                <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}"
                                    placeholder="{{ __('Laissez vide pour utiliser le titre de l\'article') }}" maxlength="70">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Meta description') }} <span class="text-muted fs-12">({{ __('max 160 car.') }})</span></label>
                                <textarea class="form-control" name="meta_description" rows="2" maxlength="160"
                                    placeholder="{{ __('Résumé pour Google (160 caractères max)') }}">{{ old('meta_description') }}</textarea>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">{{ __('Mots-clés') }}</label>
                                <input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords') }}"
                                    placeholder="{{ __('facturation maroc, logiciel devis...') }}">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right: settings -->
                <div class="col-lg-4">

                    <!-- Publication -->
                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('Publication') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Statut') }} <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="draft" {{ old('status','draft') === 'draft' ? 'selected' : '' }}>{{ __('Brouillon') }}</option>
                                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>{{ __('Publié') }}</option>
                                    <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>{{ __('Archivé') }}</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Date de publication') }}</label>
                                <input type="datetime-local" class="form-control" name="published_at"
                                    value="{{ old('published_at') }}">
                                <small class="text-muted">{{ __('Vide = maintenant si publié') }}</small>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-tick-square me-1"></i>{{ __('Enregistrer l\'article') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Catégorie & Tags -->
                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('Classification') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Catégorie') }}</label>
                                <select class="form-select" name="blog_category_id">
                                    <option value="">{{ __('Sans catégorie') }}</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('blog_category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">{{ __('Tags') }}</label>
                                <input type="text" class="form-control" name="tags" value="{{ old('tags') }}"
                                    placeholder="{{ __('facturation, maroc, devis...') }}">
                                <small class="text-muted">{{ __('Séparés par des virgules') }}</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
</div>

@push('scripts')
<script>
// Simple textarea character counter for meta fields
document.querySelectorAll('textarea[maxlength]').forEach(function(el) {
    el.addEventListener('input', function() {
        var max = parseInt(el.getAttribute('maxlength'));
        var remaining = max - el.value.length;
        var hint = el.nextElementSibling;
        if (hint && hint.tagName === 'SMALL') {
            hint.textContent = remaining + ' {{ __("caractères restants") }}';
            hint.className = remaining < 20 ? 'text-danger fs-12' : 'text-muted fs-12';
        }
    });
});
</script>
@endpush
@endsection
