<?php $page = 'sa-blog-posts'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Articles du blog')
@section('description', 'Gérer les articles du blog Hssabek')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
            <div>
                <h6>{{ __('Blog — Articles') }}</h6>
                <div class="d-flex gap-2 mt-1">
                    <span class="badge badge-soft-primary">{{ $totalPosts }} {{ __('au total') }}</span>
                    <span class="badge badge-soft-success">{{ $published }} {{ __('publiés') }}</span>
                    <span class="badge badge-soft-warning">{{ $drafts }} {{ __('brouillons') }}</span>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('sa.blog.categories.index') }}" class="btn btn-outline-white d-flex align-items-center">
                    <i class="isax isax-category me-1"></i> {{ __('Catégories') }}
                </a>
                <a href="{{ route('sa.blog.posts.create') }}" class="btn btn-primary d-flex align-items-center">
                    <i class="isax isax-add me-1"></i> {{ __('Nouvel article') }}
                </a>
            </div>
        </div>
        <!-- End Page Header -->

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Filters -->
        <form method="GET" class="mb-3">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <div class="table-search d-flex align-items-center">
                    <input type="text" class="form-control" name="q" placeholder="{{ __('Rechercher un article...') }}" value="{{ request('q') }}">
                </div>
                <select name="status" class="form-select" style="width:auto;">
                    <option value="">{{ __('Tous les statuts') }}</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>{{ __('Publiés') }}</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>{{ __('Brouillons') }}</option>
                    <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>{{ __('Archivés') }}</option>
                </select>
                <select name="category" class="form-select" style="width:auto;">
                    <option value="">{{ __('Toutes catégories') }}</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-white"><i class="isax isax-search-normal me-1"></i>{{ __('Filtrer') }}</button>
                @if(request()->hasAny(['q','status','category']))
                <a href="{{ route('sa.blog.posts.index') }}" class="btn btn-outline-white">{{ __('Réinitialiser') }}</a>
                @endif
            </div>
        </form>
        <!-- End Filters -->

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('Titre') }}</th>
                        <th>{{ __('Catégorie') }}</th>
                        <th>{{ __('Statut') }}</th>
                        <th>{{ __('Auteur') }}</th>
                        <th>{{ __('Publié le') }}</th>
                        <th>{{ __('Vues') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                @if($post->cover_image)
                                <img src="{{ asset('storage/' . $post->cover_image) }}" class="avatar avatar-sm rounded" alt="{{ $post->cover_image_alt }}">
                                @else
                                <span class="avatar avatar-sm bg-light rounded d-flex align-items-center justify-content-center">
                                    <i class="isax isax-document-text text-muted fs-16"></i>
                                </span>
                                @endif
                                <div>
                                    <span class="fw-medium">{{ Str::limit($post->title, 55) }}</span>
                                    <div class="fs-12 text-muted">{{ $post->reading_time }} min {{ __('de lecture') }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($post->category)
                            <span class="badge badge-soft-{{ $post->category->color }}">{{ $post->category->name }}</span>
                            @else
                            <span class="text-muted fs-12">—</span>
                            @endif
                        </td>
                        <td>
                            @if($post->status === 'published')
                            <span class="badge badge-soft-success">{{ __('Publié') }}</span>
                            @elseif($post->status === 'draft')
                            <span class="badge badge-soft-warning">{{ __('Brouillon') }}</span>
                            @else
                            <span class="badge badge-soft-secondary">{{ __('Archivé') }}</span>
                            @endif
                        </td>
                        <td>{{ $post->author?->name ?? '—' }}</td>
                        <td>{{ $post->published_at?->format('d/m/Y') ?? '—' }}</td>
                        <td>{{ number_format($post->views) }}</td>
                        <td>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="action-icon dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="isax isax-more"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a href="{{ route('sa.blog.posts.edit', $post) }}" class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-edit me-2"></i>{{ __('Modifier') }}
                                        </a>
                                    </li>
                                    @if($post->status === 'published')
                                    <li>
                                        <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="dropdown-item d-flex align-items-center">
                                            <i class="isax isax-eye me-2"></i>{{ __('Voir sur le site') }}
                                        </a>
                                    </li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('sa.blog.posts.destroy', $post) }}"
                                            onsubmit="return confirm('{{ __('Supprimer cet article ?') }}')">
                                            @csrf @method('DELETE')
                                            <button class="dropdown-item text-danger d-flex align-items-center">
                                                <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="isax isax-document-text fs-32 text-muted d-block mb-2"></i>
                            {{ __('Aucun article trouvé.') }}
                            <div class="mt-2">
                                <a href="{{ route('sa.blog.posts.create') }}" class="btn btn-primary btn-sm">{{ __('Créer le premier article') }}</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- End Table -->

        <div class="mt-3">
            {{ $posts->links() }}
        </div>

    </div>
</div>
@endsection
