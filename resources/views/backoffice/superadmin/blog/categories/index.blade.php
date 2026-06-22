<?php $page = 'sa-blog-posts'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Catégories du blog')
@section('description', 'Gérer les catégories du blog')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
            <div>
                <h6>{{ __('Catégories du blog') }}</h6>
            </div>
            <a href="{{ route('sa.blog.posts.index') }}" class="btn btn-outline-white">
                <i class="isax isax-arrow-left me-1"></i>{{ __('Retour aux articles') }}
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row g-3">
            <!-- Add Category -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header"><h5 class="card-title mb-0">{{ __('Nouvelle catégorie') }}</h5></div>
                    <div class="card-body">
                        <form action="{{ route('sa.blog.categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __('Nom') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="{{ __('Ex: Facturation, Gestion...') }}">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Couleur du badge') }}</label>
                                <select class="form-select" name="color">
                                    @foreach(['primary'=>'Bleu','success'=>'Vert','warning'=>'Orange','danger'=>'Rouge','info'=>'Cyan','dark'=>'Noir'] as $val => $label)
                                    <option value="{{ $val }}" {{ old('color','primary') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{ __('Créer la catégorie') }}</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>{{ __('Nom') }}</th>
                                        <th>{{ __('Slug') }}</th>
                                        <th>{{ __('Badge') }}</th>
                                        <th>{{ __('Articles') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $cat)
                                    <tr>
                                        <td class="fw-medium">{{ $cat->name }}</td>
                                        <td><code>{{ $cat->slug }}</code></td>
                                        <td><span class="badge badge-soft-{{ $cat->color }}">{{ $cat->name }}</span></td>
                                        <td>{{ $cat->posts_count }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-sm btn-outline-white"
                                                    data-bs-toggle="modal" data-bs-target="#editCatModal{{ $cat->id }}">
                                                    <i class="isax isax-edit fs-14"></i>
                                                </button>
                                                <form method="POST" action="{{ route('sa.blog.categories.destroy', $cat) }}"
                                                    onsubmit="return confirm('{{ __('Supprimer cette catégorie ?') }}')">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="isax isax-trash fs-14"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">{{ __('Aucune catégorie.') }}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Edit modals --}}
@foreach($categories as $cat)
<div class="modal fade" id="editCatModal{{ $cat->id }}" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Modifier la catégorie') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('sa.blog.categories.update', $cat) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">{{ __('Nom') }}</label>
                        <input type="text" class="form-control" name="name" value="{{ $cat->name }}" required>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">{{ __('Couleur') }}</label>
                        <select class="form-select" name="color">
                            @foreach(['primary'=>'Bleu','success'=>'Vert','warning'=>'Orange','danger'=>'Rouge','info'=>'Cyan','dark'=>'Noir'] as $val => $label)
                            <option value="{{ $val }}" {{ $cat->color === $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
