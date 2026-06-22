<?php $page = 'sa-blog-posts'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Modifier l\'article')
@section('description', 'Modifier un article de blog')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
            <div>
                <h6>{{ __('Modifier l\'article') }}</h6>
                <div class="d-flex gap-2 mt-1">
                    @if($post->status === 'published')
                    <span class="badge badge-soft-success">{{ __('Publié') }}</span>
                    @elseif($post->status === 'draft')
                    <span class="badge badge-soft-warning">{{ __('Brouillon') }}</span>
                    @else
                    <span class="badge badge-soft-secondary">{{ __('Archivé') }}</span>
                    @endif
                </div>
            </div>
            <div class="d-flex gap-2">
                @if($post->status === 'published')
                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn btn-outline-white">
                    <i class="isax isax-eye me-1"></i>{{ __('Voir sur le site') }}
                </a>
                @endif
                <a href="{{ route('sa.blog.posts.index') }}" class="btn btn-outline-white">
                    <i class="isax isax-arrow-left me-1"></i> {{ __('Retour') }}
                </a>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <form action="{{ route('sa.blog.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row g-3">

                <!-- Left: main content -->
                <div class="col-lg-8">

                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('Contenu de l\'article') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Titre') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title', $post->title) }}">
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Résumé') }}</label>
                                <textarea class="form-control @error('excerpt') is-invalid @enderror"
                                    name="excerpt" rows="2">{{ old('excerpt', $post->excerpt) }}</textarea>
                                @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-0">
                                <label class="form-label">{{ __('Contenu') }} <span class="text-danger">*</span></label>
                                <textarea id="blog-content" class="form-control @error('content') is-invalid @enderror"
                                    name="content" rows="18">{{ old('content', $post->content) }}</textarea>
                                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('Image de couverture') }}</h5></div>
                        <div class="card-body">
                            @if($post->cover_image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $post->cover_image) }}"
                                    class="img-fluid rounded" style="max-height:200px;" alt="{{ $post->cover_image_alt }}">
                                <div class="mt-1 fs-12 text-muted">{{ __('Image actuelle') }}</div>
                            </div>
                            @endif
                            <div class="mb-3">
                                <input type="file" class="form-control @error('cover_image') is-invalid @enderror"
                                    name="cover_image" accept="image/jpeg,image/png,image/webp">
                                <small class="text-muted">{{ __('Laisser vide pour conserver l\'image actuelle') }}</small>
                                @error('cover_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-0">
                                <label class="form-label">{{ __('Texte alternatif (alt)') }}</label>
                                <input type="text" class="form-control" name="cover_image_alt"
                                    value="{{ old('cover_image_alt', $post->cover_image_alt) }}">
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('SEO — Référencement') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Meta titre') }} <span class="text-muted fs-12">(max 70)</span></label>
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ old('meta_title', $post->meta_title) }}" maxlength="70">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Meta description') }} <span class="text-muted fs-12">(max 160)</span></label>
                                <textarea class="form-control" name="meta_description" rows="2" maxlength="160">{{ old('meta_description', $post->meta_description) }}</textarea>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">{{ __('Mots-clés') }}</label>
                                <input type="text" class="form-control" name="meta_keywords"
                                    value="{{ old('meta_keywords', $post->meta_keywords) }}">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right: settings -->
                <div class="col-lg-4">

                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('Publication') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Statut') }} <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="draft" {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>{{ __('Brouillon') }}</option>
                                    <option value="published" {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>{{ __('Publié') }}</option>
                                    <option value="archived" {{ old('status', $post->status) === 'archived' ? 'selected' : '' }}>{{ __('Archivé') }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Date de publication') }}</label>
                                <input type="datetime-local" class="form-control" name="published_at"
                                    value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}">
                            </div>
                            <div class="mb-3 border-top pt-3">
                                <div class="d-flex justify-content-between text-muted fs-12 mb-1">
                                    <span>{{ __('Créé le') }}</span>
                                    <span>{{ $post->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="d-flex justify-content-between text-muted fs-12 mb-1">
                                    <span>{{ __('Temps de lecture') }}</span>
                                    <span>{{ $post->reading_time }} min</span>
                                </div>
                                <div class="d-flex justify-content-between text-muted fs-12">
                                    <span>{{ __('Vues') }}</span>
                                    <span>{{ number_format($post->views) }}</span>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-tick-square me-1"></i>{{ __('Enregistrer les modifications') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header"><h5 class="card-title mb-0">{{ __('Classification') }}</h5></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Catégorie') }}</label>
                                <select class="form-select" name="blog_category_id">
                                    <option value="">{{ __('Sans catégorie') }}</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('blog_category_id', $post->blog_category_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">{{ __('Tags') }}</label>
                                <input type="text" class="form-control" name="tags"
                                    value="{{ old('tags', $post->tags ? implode(', ', $post->tags) : '') }}">
                                <small class="text-muted">{{ __('Séparés par des virgules') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="card border-danger">
                        <div class="card-body">
                            <form method="POST" action="{{ route('sa.blog.posts.destroy', $post) }}"
                                onsubmit="return confirm('{{ __('Supprimer définitivement cet article ?') }}')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-100">
                                    <i class="isax isax-trash me-1"></i>{{ __('Supprimer l\'article') }}
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
</div>
@endsection
