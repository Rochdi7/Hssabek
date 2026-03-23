<?php $page = 'sa-activity-logs'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails de l'Activité')
@section('description', 'Consulter les détails de l'activité')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __("Détail de l'activité") }}</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('sa.activity-logs.index') }}">{{ __("Journal d'activité") }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Détail') }}</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('sa.activity-logs.index') }}" class="btn btn-outline-white d-flex align-items-center">
                        <i class="isax isax-arrow-left me-1"></i> {{ __('Retour') }}
                    </a>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="row">
                <!-- Main Info Card -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">{{ __("Informations de l'activité") }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">{{ __('Date & Heure') }}</p>
                                    <p class="fw-medium mb-0">{{ $activityLog->created_at?->translatedFormat('d M Y à H:i:s') }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">{{ __('Action') }}</p>
                                    @php
                                        $actionBadge = match(true) {
                                            str_contains($activityLog->action ?? '', 'create') || str_contains($activityLog->action ?? '', 'created') => 'badge-soft-success',
                                            str_contains($activityLog->action ?? '', 'update') || str_contains($activityLog->action ?? '', 'updated') => 'badge-soft-warning',
                                            str_contains($activityLog->action ?? '', 'delete') || str_contains($activityLog->action ?? '', 'deleted') => 'badge-soft-danger',
                                            str_contains($activityLog->action ?? '', 'login') => 'badge-soft-info',
                                            default => 'badge-soft-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $actionBadge }}">{{ $activityLog->action }}</span>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">{{ __('Adresse IP') }}</p>
                                    <p class="fw-medium mb-0">{{ $activityLog->ip ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">{{ __('Utilisateur') }}</p>
                                    @if ($activityLog->user)
                                        <p class="fw-medium mb-0">{{ $activityLog->user->name }}</p>
                                        <span class="fs-12 text-muted">{{ $activityLog->user->email }}</span>
                                    @else
                                        <p class="mb-0 text-muted">{{ __('Système') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">{{ __('Tenant') }}</p>
                                    @if ($activityLog->tenant)
                                        <span class="badge badge-soft-primary">{{ $activityLog->tenant->name }}</span>
                                    @else
                                        <p class="mb-0 text-muted">-</p>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <p class="text-muted mb-1">{{ __('Sujet') }}</p>
                                    @if ($activityLog->subject_type)
                                        <p class="fw-medium mb-0">{{ class_basename($activityLog->subject_type) }}</p>
                                        <span class="fs-12 text-muted">{{ $activityLog->subject_id }}</span>
                                    @else
                                        <p class="mb-0 text-muted">-</p>
                                    @endif
                                </div>
                            </div>

                            @if ($activityLog->user_agent)
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-muted mb-1">{{ __('User Agent') }}</p>
                                        <p class="fs-13 text-muted mb-0">{{ $activityLog->user_agent }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Properties Card -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">{{ __('Propriétés') }}</h6>
                        </div>
                        <div class="card-body">
                            @if ($activityLog->properties && count($activityLog->properties) > 0)
                                <div class="table-responsive">
                                    <table class="table table-sm table-borderless mb-0">
                                        <tbody>
                                            @foreach ($activityLog->properties as $key => $value)
                                                <tr>
                                                    <td class="fw-medium text-muted" style="width: 40%;">{{ $key }}</td>
                                                    <td>
                                                        @if (is_array($value) || is_object($value))
                                                            <pre class="mb-0 fs-12 bg-light p-2 rounded">{{ json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                                        @else
                                                            {{ $value }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-muted text-center mb-0">{{ __('Aucune propriété enregistrée.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                       End Page Content
                      ========================= -->
@endsection
