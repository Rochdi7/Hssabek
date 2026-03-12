<?php $page = 'sa-newsletter'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Abonnés newsletter</h6>
                    <div class="d-flex gap-2 mt-1">
                        <span class="badge badge-soft-primary">{{ $totalCount }} au total</span>
                        <span class="badge badge-soft-success">{{ $activeCount }} actifs</span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('sa.newsletter.export') }}" class="btn btn-outline-white d-flex align-items-center">
                        <i class="isax isax-document-download me-1"></i> Exporter CSV
                    </a>
                </div>
            </div>
            <!-- End Page Header -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Filters -->
            <div class="card mb-3">
                <div class="card-body py-3">
                    <form method="GET" action="{{ route('sa.newsletter.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-5">
                                <label class="form-label">Rechercher</label>
                                <input type="text" name="search" class="form-control"
                                    placeholder="Adresse email..."
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Statut</label>
                                <select name="status" class="form-select">
                                    <option value="">Tous</option>
                                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Actif</option>
                                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Désabonné</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-filter"></i>
                                </button>
                                <a href="{{ route('sa.newsletter.index') }}" class="btn btn-outline-white">
                                    <i class="isax isax-refresh"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Filters -->

            <!-- Table List Start -->
            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Date d'inscription</th>
                            <th>IP</th>
                            <th class="no-sort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subscribers as $sub)
                            <tr>
                                <td>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $sub->email }}</h6>
                                </td>
                                <td>
                                    @if($sub->is_active)
                                        <span class="badge badge-soft-success">Actif</span>
                                    @else
                                        <span class="badge badge-soft-danger">Désabonné</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-muted fs-13">{{ $sub->created_at?->translatedFormat('d M Y H:i') }}</span>
                                </td>
                                <td>
                                    <span class="fs-13 text-muted">{{ $sub->ip_address ?? '-' }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <form method="POST" action="{{ route('sa.newsletter.toggle', $sub) }}">
                                            @csrf
                                            @method('PATCH')
                                            @if($sub->is_active)
                                                <button type="submit" class="btn btn-outline-white btn-sm d-inline-flex align-items-center text-warning" title="Désactiver">
                                                    <i class="isax isax-slash me-1"></i> Désactiver
                                                </button>
                                            @else
                                                <button type="submit" class="btn btn-outline-white btn-sm d-inline-flex align-items-center text-success" title="Réactiver">
                                                    <i class="isax isax-tick-circle me-1"></i> Réactiver
                                                </button>
                                            @endif
                                        </form>
                                        <a href="#"
                                            class="btn btn-outline-white btn-sm d-inline-flex align-items-center text-danger"
                                            data-bs-toggle="modal" data-bs-target="#delete_{{ $sub->id }}">
                                            <i class="isax isax-trash me-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Aucun abonné à la newsletter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

            @if($subscribers->hasPages())
                @include('backoffice.components.table-footer', ['paginator' => $subscribers])
            @endif

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Delete Modals -->
    @foreach ($subscribers as $sub)
        <div class="modal fade" id="delete_{{ $sub->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                        </div>
                        <h6 class="mb-1">Supprimer l'abonné</h6>
                        <p class="mb-3">Supprimer {{ $sub->email }} de la newsletter ?</p>
                        <form method="POST" action="{{ route('sa.newsletter.destroy', $sub) }}">
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

    <!-- ========================
                       End Page Content
                      ========================= -->
@endsection
