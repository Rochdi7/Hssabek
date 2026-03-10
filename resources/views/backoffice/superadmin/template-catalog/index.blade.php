<?php $page = 'sa-template-catalog'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Catalogue des modèles</h6>
                    <div class="d-flex gap-2 mt-1">
                        <span class="badge badge-soft-primary">{{ $totalTemplates }} au total</span>
                        <span class="badge badge-soft-success">{{ $activeTemplates }} actifs</span>
                        <span class="badge badge-soft-info">{{ $freeTemplates }} gratuits</span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('sa.template-catalog.create') }}" class="btn btn-primary d-flex align-items-center">
                        <i class="isax isax-add me-1"></i> Nouveau modèle
                    </a>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Search & Filters -->
            <div class="mb-3">
                <form method="GET" action="{{ route('sa.template-catalog.index') }}">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Rechercher..." class="form-control form-control-sm">
                                <a href="javascript:void(0);" class="btn-searchset">
                                    <i class="isax isax-search-normal fs-12"></i>
                                </a>
                            </div>
                        </div>
                        <select name="document_type" class="form-select form-select-sm" style="width: auto;"
                            onchange="this.form.submit()">
                            <option value="">Tous les types</option>
                            @foreach ($documentTypeLabels as $key => $label)
                                <option value="{{ $key }}"
                                    {{ request('document_type') === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if (request('search') || request('document_type'))
                            <a href="{{ route('sa.template-catalog.index') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="isax isax-close-circle me-1"></i>Réinitialiser
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom</th>
                            <th>Code</th>
                            <th>Type de document</th>
                            <th>Vue</th>
                            <th>Prix</th>
                            <th>Statut</th>
                            <th>Ordre</th>
                            <th class="no-sort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($templates as $template)
                            <tr>
                                <td>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $template->name }}</h6>
                                    @if ($template->description)
                                        <small class="text-muted">{{ Str::limit($template->description, 40) }}</small>
                                    @endif
                                </td>
                                <td><code class="fs-12">{{ $template->code }}</code></td>
                                <td>
                                    <span
                                        class="badge badge-soft-primary">{{ $documentTypeLabels[$template->document_type] ?? $template->document_type }}</span>
                                </td>
                                <td><code class="fs-11 text-muted">{{ Str::limit($template->view_path, 35) }}</code></td>
                                <td>
                                    @if ($template->is_free)
                                        <span class="badge badge-soft-success">Gratuit</span>
                                    @else
                                        <span class="fw-medium">{{ number_format($template->price, 2) }}
                                            {{ $template->currency }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($template->is_active)
                                        <span class="badge badge-soft-success">Actif</span>
                                    @else
                                        <span class="badge badge-soft-danger">Inactif</span>
                                    @endif
                                    @if ($template->is_featured)
                                        <span class="badge badge-soft-warning ms-1">Vedette</span>
                                    @endif
                                </td>
                                <td>{{ $template->sort_order }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="{{ route('sa.template-catalog.edit', $template) }}"
                                            class="btn btn-sm btn-outline-white d-inline-flex align-items-center">
                                            <i class="isax isax-edit-2 me-1"></i> Modifier
                                        </a>
                                        <a href="#"
                                            class="btn btn-sm btn-outline-white d-inline-flex align-items-center text-danger"
                                            data-bs-toggle="modal" data-bs-target="#delete_{{ $template->id }}">
                                            <i class="isax isax-trash me-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    Aucun modèle trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @include('backoffice.components.table-footer', ['paginator' => $templates])

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Delete Modals -->
    @foreach ($templates as $tpl)
        <div class="modal fade" id="delete_{{ $tpl->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                        </div>
                        <h6 class="mb-1">Supprimer le modèle</h6>
                        <p class="mb-3">Êtes-vous sûr de vouloir supprimer le modèle «
                            <strong>{{ $tpl->name }}</strong> » ?</p>
                        <form method="POST" action="{{ route('sa.template-catalog.destroy', $tpl) }}">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-center">
                                <a href="javascript:void(0);" class="btn btn-outline-white me-3"
                                    data-bs-dismiss="modal">Annuler</a>
                                <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
