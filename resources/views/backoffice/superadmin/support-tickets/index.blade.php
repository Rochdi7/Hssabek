<?php $page = 'sa-support-tickets'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Tickets de Support')
@section('description', 'Gérer les tickets de support')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Tickets de support') }}</h6>
                    <div class="d-flex gap-2 mt-1">
                        <span class="badge badge-soft-primary">{{ $totalCount }} {{ __('au total') }}</span>
                        <span class="badge badge-soft-warning">{{ $openCount }} {{ __('ouverts') }}</span>
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
                    <form method="GET" action="{{ route('sa.support-tickets.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Rechercher') }}</label>
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Sujet, numéro...') }}"
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('Statut') }}</label>
                                <select name="status" class="form-select">
                                    <option value="">{{ __('Tous') }}</option>
                                    <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>{{ __('Ouvert') }}</option>
                                    <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>{{ __('En cours') }}</option>
                                    <option value="on_hold" {{ request('status') === 'on_hold' ? 'selected' : '' }}>{{ __('En attente') }}</option>
                                    <option value="resolved" {{ request('status') === 'resolved' ? 'selected' : '' }}>{{ __('Résolu') }}</option>
                                    <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>{{ __('Fermé') }}</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('Priorité') }}</label>
                                <select name="priority" class="form-select">
                                    <option value="">{{ __('Toutes') }}</option>
                                    <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>{{ __('Basse') }}</option>
                                    <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>{{ __('Moyenne') }}</option>
                                    <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>{{ __('Haute') }}</option>
                                    <option value="urgent" {{ request('priority') === 'urgent' ? 'selected' : '' }}>{{ __('Urgente') }}</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Tenant') }}</label>
                                <select name="tenant_id" class="form-select">
                                    <option value="">{{ __('Tous les tenants') }}</option>
                                    @foreach ($tenants as $tenant)
                                        <option value="{{ $tenant->id }}" {{ request('tenant_id') == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-filter"></i>
                                </button>
                                <a href="{{ route('sa.support-tickets.index') }}" class="btn btn-outline-white">
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
                            <th>{{ __('N° Ticket') }}</th>
                            <th>{{ __('Tenant') }}</th>
                            <th>{{ __('Utilisateur') }}</th>
                            <th>{{ __('Sujet') }}</th>
                            <th>{{ __('Catégorie') }}</th>
                            <th>{{ __('Priorité') }}</th>
                            <th>{{ __('Statut') }}</th>
                            <th>{{ __('Réponses') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th class="no-sort">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                            <tr>
                                <td>
                                    <a href="{{ route('sa.support-tickets.show', $ticket) }}" class="fw-medium text-primary">{{ $ticket->ticket_number }}</a>
                                </td>
                                <td>
                                    <span class="fs-13">{{ $ticket->tenant->name ?? '-' }}</span>
                                </td>
                                <td>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $ticket->user->name ?? '-' }}</h6>
                                    <span class="fs-12 text-muted">{{ $ticket->user->email ?? '' }}</span>
                                </td>
                                <td>
                                    <span class="fs-13">{{ Str::limit($ticket->subject, 40) }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $ticket->category_badge }}">{{ $ticket->category_label }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $ticket->priority_badge }}">{{ $ticket->priority_label }}</span>
                                </td>
                                <td>
                                    <span class="badge {{ $ticket->status_badge }}">{{ $ticket->status_label }}</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $ticket->replies_count }}</span>
                                </td>
                                <td>
                                    <span class="text-muted fs-13">{{ $ticket->created_at?->translatedFormat('d M Y H:i') }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="{{ route('sa.support-tickets.show', $ticket) }}"
                                            class="btn btn-outline-white btn-sm d-inline-flex align-items-center">
                                            <i class="isax isax-eye me-1"></i> {{ __('Voir') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-4 text-muted">
                                    {{ __('Aucun ticket de support.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

            @if($tickets->hasPages())
                @include('backoffice.components.table-footer', ['paginator' => $tickets])
            @endif

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                       End Page Content
                      ========================= -->
@endsection
