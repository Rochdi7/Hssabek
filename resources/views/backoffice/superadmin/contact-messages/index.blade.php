<?php $page = 'sa-contact-messages'; ?>
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
                    <h6>Messages de contact</h6>
                    <div class="d-flex gap-2 mt-1">
                        <span class="badge badge-soft-primary">{{ $totalCount }} au total</span>
                        <span class="badge badge-soft-warning">{{ $newCount }} nouveaux</span>
                    </div>
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
                    <form method="GET" action="{{ route('sa.contact-messages.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label">Rechercher</label>
                                <input type="text" name="search" class="form-control"
                                    placeholder="Nom, email, message..."
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Statut</label>
                                <select name="status" class="form-select">
                                    <option value="">Tous les statuts</option>
                                    <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>Nouveau</option>
                                    <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Lu</option>
                                    <option value="replied" {{ request('status') === 'replied' ? 'selected' : '' }}>Répondu</option>
                                    <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Archivé</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Sujet</label>
                                <select name="subject" class="form-select">
                                    <option value="">Tous les sujets</option>
                                    <option value="question" {{ request('subject') === 'question' ? 'selected' : '' }}>Question générale</option>
                                    <option value="support" {{ request('subject') === 'support' ? 'selected' : '' }}>Support technique</option>
                                    <option value="billing" {{ request('subject') === 'billing' ? 'selected' : '' }}>Facturation</option>
                                    <option value="partnership" {{ request('subject') === 'partnership' ? 'selected' : '' }}>Partenariat</option>
                                    <option value="other" {{ request('subject') === 'other' ? 'selected' : '' }}>Autre</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-filter"></i>
                                </button>
                                <a href="{{ route('sa.contact-messages.index') }}" class="btn btn-outline-white">
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
                            <th>Date</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Sujet</th>
                            <th>Statut</th>
                            <th>IP</th>
                            <th class="no-sort">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                            <tr>
                                <td>
                                    <span class="text-muted fs-13">{{ $msg->created_at?->translatedFormat('d M Y H:i') }}</span>
                                </td>
                                <td>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $msg->name }}</h6>
                                </td>
                                <td>
                                    <span class="fs-13">{{ $msg->email }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-soft-info">{{ $msg->subject_label }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $msg->status_badge }}">{{ $msg->status_label }}</span>
                                </td>
                                <td>
                                    <span class="fs-13 text-muted">{{ $msg->ip_address ?? '-' }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="{{ route('sa.contact-messages.show', $msg) }}"
                                            class="btn btn-outline-white btn-sm d-inline-flex align-items-center">
                                            <i class="isax isax-eye me-1"></i> Voir
                                        </a>
                                        <a href="#"
                                            class="btn btn-outline-white btn-sm d-inline-flex align-items-center text-danger"
                                            data-bs-toggle="modal" data-bs-target="#delete_{{ $msg->id }}">
                                            <i class="isax isax-trash me-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    Aucun message de contact.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

            @if($messages->hasPages())
                @include('backoffice.components.table-footer', ['paginator' => $messages])
            @endif

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Delete Modals -->
    @foreach ($messages as $msg)
        <div class="modal fade" id="delete_{{ $msg->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                        </div>
                        <h6 class="mb-1">Supprimer le message</h6>
                        <p class="mb-3">Êtes-vous sûr de vouloir supprimer ce message de {{ $msg->name }} ?</p>
                        <form method="POST" action="{{ route('sa.contact-messages.destroy', $msg) }}">
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
