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

            <form action="{{ route('sa.announcements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ── Row 1: Type + Dates + Active ── --}}
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __("Paramètres de l'annonce") }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                                    <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                                        <option value="">{{ __('-- Choisir --') }}</option>
                                        <option value="info"    {{ old('type') === 'info'    ? 'selected' : '' }}>{{ __('Information') }}</option>
                                        <option value="warning" {{ old('type') === 'warning' ? 'selected' : '' }}>{{ __('Avertissement') }}</option>
                                        <option value="success" {{ old('type') === 'success' ? 'selected' : '' }}>{{ __('Succès') }}</option>
                                        <option value="danger"  {{ old('type') === 'danger'  ? 'selected' : '' }}>{{ __('Urgent') }}</option>
                                    </select>
                                    @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Date de publication') }}</label>
                                    <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                                        name="published_at" value="{{ old('published_at') }}">
                                    <small class="text-muted">{{ __('Laissez vide pour publier immédiatement.') }}</small>
                                    @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("Date d'expiration") }}</label>
                                    <input type="datetime-local" class="form-control @error('expires_at') is-invalid @enderror"
                                        name="expires_at" value="{{ old('expires_at') }}">
                                    <small class="text-muted">{{ __('Laissez vide pour ne jamais expirer.') }}</small>
                                    @error('expires_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <div class="mb-3 mt-2">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                            {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-medium">{{ __('Active') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Row 2: Trilingual content tabs ── --}}
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Contenu multilingue') }}</h5>
                    </div>
                    <div class="card-body">
                        {{-- Language tabs --}}
                        <ul class="nav nav-tabs mb-3" id="langTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active d-flex align-items-center gap-1" id="tab-fr" data-bs-toggle="tab"
                                    data-bs-target="#pane-fr" type="button" role="tab">
                                    🇫🇷 <span>{{ __('Français') }}</span>
                                    <span class="badge bg-danger ms-1" style="font-size:9px;">{{ __('Requis') }}</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center gap-1" id="tab-ar" data-bs-toggle="tab"
                                    data-bs-target="#pane-ar" type="button" role="tab">
                                    🇲🇦 <span>{{ __('Arabe') }}</span>
                                    <span class="badge bg-secondary ms-1" style="font-size:9px;">{{ __('Optionnel') }}</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center gap-1" id="tab-en" data-bs-toggle="tab"
                                    data-bs-target="#pane-en" type="button" role="tab">
                                    🇬🇧 <span>{{ __('Anglais') }}</span>
                                    <span class="badge bg-secondary ms-1" style="font-size:9px;">{{ __('Optionnel') }}</span>
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="langTabsContent">
                            {{-- French --}}
                            <div class="tab-pane fade show active" id="pane-fr" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Titre') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title_fr') is-invalid @enderror"
                                        name="title_fr" value="{{ old('title_fr') }}" required
                                        placeholder="{{ __('Titre de l\'annonce en français') }}">
                                    @error('title_fr')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">{{ __('Contenu') }} <span class="text-danger">*</span></label>
                                    <textarea id="content-fr" class="form-control @error('content_fr') is-invalid @enderror"
                                        name="content_fr">{!! old('content_fr') !!}</textarea>
                                    @error('content_fr')<div class="text-danger mt-1 fs-12">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- Arabic --}}
                            <div class="tab-pane fade" id="pane-ar" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Titre') }} <small class="text-muted">({{ __('optionnel') }})</small></label>
                                    <input type="text" class="form-control @error('title_ar') is-invalid @enderror"
                                        name="title_ar" value="{{ old('title_ar') }}" dir="rtl"
                                        placeholder="عنوان الإعلان بالعربية">
                                    @error('title_ar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">{{ __('Contenu') }} <small class="text-muted">({{ __('optionnel') }})</small></label>
                                    <textarea id="content-ar" class="form-control @error('content_ar') is-invalid @enderror"
                                        name="content_ar" dir="rtl">{!! old('content_ar') !!}</textarea>
                                    @error('content_ar')<div class="text-danger mt-1 fs-12">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            {{-- English --}}
                            <div class="tab-pane fade" id="pane-en" role="tabpanel">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Titre') }} <small class="text-muted">({{ __('optionnel') }})</small></label>
                                    <input type="text" class="form-control @error('title_en') is-invalid @enderror"
                                        name="title_en" value="{{ old('title_en') }}"
                                        placeholder="Announcement title in English">
                                    @error('title_en')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">{{ __('Contenu') }} <small class="text-muted">({{ __('optionnel') }})</small></label>
                                    <textarea id="content-en" class="form-control @error('content_en') is-invalid @enderror"
                                        name="content_en">{!! old('content_en') !!}</textarea>
                                    @error('content_en')<div class="text-danger mt-1 fs-12">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ── Row 3: Attachment ── --}}
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            {{ __('Pièce jointe') }}
                            <small class="text-muted fw-normal ms-1">({{ __('optionnel') }})</small>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-0">
                            <label class="form-label">{{ __('Fichier') }}</label>
                            <input type="file" class="form-control @error('attachment') is-invalid @enderror"
                                name="attachment" accept=".pdf,.jpg,.jpeg,.png,.webp,.doc,.docx">
                            <small class="text-muted">{{ __('PDF, image ou Word — max 5 Mo.') }}</small>
                            @error('attachment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="isax isax-send me-1"></i> {{ __('Publier l\'annonce') }}
                    </button>
                    <a href="{{ route('sa.announcements.index') }}" class="btn btn-outline-secondary">{{ __('Annuler') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('backoffice.components._summernote-editor', ['editorId' => 'content-fr', 'height' => 220])
@include('backoffice.components._summernote-editor', ['editorId' => 'content-ar', 'height' => 220])
@include('backoffice.components._summernote-editor', ['editorId' => 'content-en', 'height' => 220])
