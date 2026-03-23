<?php $page = 'sa-activity-logs'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Journaux d'Activité')
@section('description', 'Consulter les journaux d'activité')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __("Journal d'activité") }}</h6>
                    <div class="d-flex gap-2 mt-1">
                        <span class="badge badge-soft-primary">{{ $totalLogs }} {{ __('au total') }}</span>
                        <span class="badge badge-soft-success">{{ $todayLogs }} {{ __("aujourd'hui") }}</span>
                    </div>
                </div>
                <div>
                    <a href="#" class="btn btn-outline-white d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#clear_logs">
                        <i class="isax isax-trash me-1"></i> {{ __('Purger les anciens logs') }}
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

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Filters -->
            <div class="card mb-3">
                <div class="card-body py-3">
                    <form method="GET" action="{{ route('sa.activity-logs.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label">{{ __('Rechercher') }}</label>
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Utilisateur, action, IP...') }}"
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('Tenant') }}</label>
                                <select name="tenant_id" class="form-select">
                                    <option value="">{{ __('Tous les tenants') }}</option>
                                    @foreach ($tenants as $tenant)
                                        <option value="{{ $tenant->id }}"
                                            {{ request('tenant_id') == $tenant->id ? 'selected' : '' }}>
                                            {{ $tenant->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('Action') }}</label>
                                <select name="action" class="form-select">
                                    <option value="">{{ __('Toutes les actions') }}</option>
                                    @foreach ($actions as $action)
                                        <option value="{{ $action }}"
                                            {{ request('action') == $action ? 'selected' : '' }}>
                                            {{ $action }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('Du') }}</label>
                                <input type="date" name="date_from" class="form-control"
                                    value="{{ request('date_from') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">{{ __('Au') }}</label>
                                <input type="date" name="date_to" class="form-control"
                                    value="{{ request('date_to') }}">
                            </div>
                            <div class="col-md-1 d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-filter"></i>
                                </button>
                                <a href="{{ route('sa.activity-logs.index') }}" class="btn btn-outline-white">
                                    <i class="isax isax-refresh"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Filters -->

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn-searchset"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Date'), __('Utilisateur'), __('Tenant'), __('Action'), __('Sujet'), __('IP')],
                        ])
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>{{ __('Trier par') }} : <span class="fw-normal ms-1">{{ __('Plus récent') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="javascript:void(0);" class="dropdown-item">{{ __('Plus récent') }}</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">{{ __('Plus ancien') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List Start -->
            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Utilisateur') }}</th>
                            <th>{{ __('Tenant') }}</th>
                            <th>{{ __('Action') }}</th>
                            <th>{{ __('Sujet') }}</th>
                            <th>{{ __('IP') }}</th>
                            <th class="no-sort">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td>
                                    <span class="text-muted fs-13">{{ $log->created_at?->translatedFormat('d M Y H:i:s') }}</span>
                                </td>
                                <td>
                                    @if ($log->user)
                                        <h6 class="fs-14 fw-medium mb-0">{{ $log->user->name }}</h6>
                                        <span class="fs-12 text-muted">{{ $log->user->email }}</span>
                                    @else
                                        <span class="text-muted">{{ __('Système') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($log->tenant)
                                        <span class="badge badge-soft-primary">{{ $log->tenant->name }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $actionBadge = match(true) {
                                            str_contains($log->action ?? '', 'create') || str_contains($log->action ?? '', 'created') => 'badge-soft-success',
                                            str_contains($log->action ?? '', 'update') || str_contains($log->action ?? '', 'updated') => 'badge-soft-warning',
                                            str_contains($log->action ?? '', 'delete') || str_contains($log->action ?? '', 'deleted') => 'badge-soft-danger',
                                            str_contains($log->action ?? '', 'login') => 'badge-soft-info',
                                            default => 'badge-soft-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $actionBadge }}">{{ $log->action }}</span>
                                </td>
                                <td>
                                    @if ($log->subject_type)
                                        <span class="fs-13">{{ class_basename($log->subject_type) }}</span>
                                        @if ($log->subject_id)
                                            <br><span class="fs-12 text-muted">{{ Str::limit($log->subject_id, 8) }}</span>
                                        @endif
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="fs-13 text-muted">{{ $log->ip ?? '-' }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="{{ route('sa.activity-logs.show', $log) }}"
                                            class="btn btn-outline-white btn-sm d-inline-flex align-items-center">
                                            <i class="isax isax-eye me-1"></i> {{ __('Voir') }}
                                        </a>
                                        <a href="#"
                                            class="btn btn-outline-white btn-sm d-inline-flex align-items-center text-danger"
                                            data-bs-toggle="modal" data-bs-target="#delete_{{ $log->id }}">
                                            <i class="isax isax-trash me-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    {{ __("Aucune entrée dans le journal d'activité.") }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

            @include('backoffice.components.table-footer', ['paginator' => $logs])

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Delete Modals -->
    @foreach ($logs as $log)
        <div class="modal fade" id="delete_{{ $log->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                        </div>
                        <h6 class="mb-1">{{ __("Supprimer l'entrée") }}</h6>
                        <p class="mb-3">{{ __('Êtes-vous sûr de vouloir supprimer cette entrée du journal ?') }}</p>
                        <form method="POST" action="{{ route('sa.activity-logs.destroy', $log) }}">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-center">
                                <a href="javascript:void(0);" class="btn btn-outline-white me-3"
                                    data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                                <button type="submit" class="btn btn-danger">{{ __('Oui, supprimer') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Clear Logs Modal -->
    <div class="modal fade" id="clear_logs">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">{{ __('Purger les anciens logs') }}</h6>
                    <p class="mb-3">{{ __('Supprimer toutes les entrées antérieures à la date sélectionnée.') }}</p>
                    <form method="POST" action="{{ route('sa.activity-logs.clear') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="date" name="before_date" class="form-control" required
                                value="{{ now()->subMonth()->format('Y-m-d') }}">
                        </div>
                        @error('before_date')
                            <div class="text-danger mb-2 fs-13">{{ $message }}</div>
                        @enderror
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-outline-white me-3"
                                data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                            <button type="submit" class="btn btn-danger">{{ __('Purger') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
                       End Page Content
                      ========================= -->
@endsection
