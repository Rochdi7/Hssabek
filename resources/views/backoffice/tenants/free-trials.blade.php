<?php $page = 'tenants'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Essais gratuits')
@section('description', 'Suivi des périodes d\'essai gratuites des locataires')
@section('content')
    <!-- ========================
                    Start Page Content
                ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <h6>{{ __('Essais gratuits') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('sa.tenants.index') }}" class="btn btn-outline-white d-flex align-items-center">
                        <i class="isax isax-buildings-25 me-1"></i>{{ __('Tous les tenants') }}
                    </a>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-soft-info">
                                        <i class="isax isax-timer-1 text-info fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Essais en cours') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $activeTrials }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-danger-subtle">
                                        <i class="isax isax-close-circle text-danger fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Essais expirés') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $expiredTrials }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-primary-subtle">
                                        <i class="isax isax-people5 text-primary fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Total en essai') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $tenants->total() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

            <!-- Table List Start -->
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('Tenant') }}</th>
                                    <th>{{ __('Utilisateurs') }}</th>
                                    <th>{{ __('Fin d\'essai') }}</th>
                                    <th>{{ __('Jours restants') }}</th>
                                    <th>{{ __('État') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tenants as $tenant)
                                    @php
                                        $expired = $tenant->trial_ends_at->isPast();
                                        $daysLeft = $expired ? 0 : (int) ceil(now()->floatDiffInDays($tenant->trial_ends_at, false));
                                    @endphp
                                    <tr>
                                        <td>
                                            <a href="{{ route('sa.tenants.show', $tenant) }}" class="fw-medium">{{ $tenant->name }}</a>
                                            <p class="mb-0 text-muted fs-12">{{ $tenant->slug }}</p>
                                        </td>
                                        <td>{{ $tenant->users_count }}</td>
                                        <td>{{ $tenant->trial_ends_at->format('d/m/Y') }}</td>
                                        <td>
                                            @if ($expired)
                                                <span class="text-danger">{{ __('Expiré') }}</span>
                                            @else
                                                <span class="fw-medium">{{ $daysLeft }} {{ __('jour(s)') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($expired)
                                                <span class="badge bg-danger-subtle text-danger">{{ __('Essai terminé') }}</span>
                                            @elseif ($daysLeft <= 3)
                                                <span class="badge bg-warning-subtle text-warning">{{ __('Bientôt expiré') }}</span>
                                            @else
                                                <span class="badge bg-success-subtle text-success">{{ __('Actif') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('sa.tenants.show', $tenant) }}" class="btn btn-sm btn-outline-white">
                                                <i class="isax isax-eye me-1"></i>{{ __('Voir') }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">{{ __('Aucun locataire en période d\'essai.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if ($tenants->hasPages())
                <div class="mt-3">
                    {{ $tenants->links() }}
                </div>
            @endif
            <!-- Table List End -->

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                    End Page Content
                ========================= -->
@endsection
