<?php $page = 'plans-billings'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
           Start Page Content
          ========================= -->

    <div class="page-wrapper">

        <!-- Start Conatiner  -->
        <div class="content">

            <!-- start row -->
            <div class="row justify-content-center">

                <div class="col-xl-12">

                    <!-- start row -->
                    <div class=" row settings-wrapper d-flex">

                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Plans et facturation</h6>
                                </div>

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <div class="d-flex align-items-center mb-3">
                                    <span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i
                                            class="isax isax-info-circle fs-14"></i></span>
                                    <h6 class="fs-16 fw-semibold mb-0">Informations sur le plan actuel</h6>
                                </div>
                                <div class="mb-3 border-bottom">
                                    <div class="card shadow-none bg-light">
                                        <div class="card-body">
                                            <div class="mb-0">
                                                @if($currentSubscription && $currentSubscription->plan)
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="">
                                                            <h6 class="fw-bold mb-2 fs-14">{{ $currentSubscription->plan->name }}</h6>
                                                            <div class="progress-container">
                                                                @php
                                                                    $daysLeft = $currentSubscription->ends_at
                                                                        ? now()->diffInDays($currentSubscription->ends_at, false)
                                                                        : 0;
                                                                    $daysLeft = max(0, (int) $daysLeft);

                                                                    $totalDays = $currentSubscription->starts_at && $currentSubscription->ends_at
                                                                        ? $currentSubscription->starts_at->diffInDays($currentSubscription->ends_at)
                                                                        : 1;
                                                                    $totalDays = max(1, $totalDays);

                                                                    $progressPercent = round(($daysLeft / $totalDays) * 100);
                                                                    $progressPercent = min(100, max(0, $progressPercent));

                                                                    $circumference = 2 * 3.14159 * 16;
                                                                    $dashOffset = $circumference - ($circumference * $progressPercent / 100);
                                                                @endphp
                                                                <svg class="progress-circle me-2" viewBox="0 0 36 36">
                                                                    <circle class="progress-bar" cx="18"
                                                                        cy="18" r="16"></circle>
                                                                    <circle class="progress-bar-fill" cx="18"
                                                                        cy="18" r="16"
                                                                        style="stroke-dasharray: {{ $circumference }}; stroke-dashoffset: {{ $dashOffset }};"></circle>
                                                                </svg>
                                                                <span class="fs-14">{{ $daysLeft }} {{ $daysLeft > 1 ? 'jours restants' : 'jour restant' }}</span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span class="badge badge-md badge-soft-info">
                                                                {{ number_format($currentSubscription->plan->price, 2) }} {{ $currentSubscription->plan->currency ?? 'MAD' }}
                                                                / {{ $currentSubscription->plan->interval === 'yearly' ? 'an' : ($currentSubscription->plan->interval === 'monthly' ? 'mois' : $currentSubscription->plan->interval) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="text-center py-3">
                                                        <p class="text-muted mb-0">Aucun abonnement actif</p>
                                                    </div>
                                                @endif
                                            </div>

                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div>
                                <div class="mb-3 border-top pt-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i
                                                class="isax isax-transaction-minus fs-14"></i></span>
                                        <h6 class="fs-16 fw-semibold mb-0">Historique des transactions</h6>
                                    </div>
                                    <div>
                                        <!-- Table List -->
                                        <div class="table-responsive table-nowrap">
                                            <table class="table border mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Nom du plan</th>
                                                        <th>Montant</th>
                                                        <th>Date d'achat</th>
                                                        <th>Date de fin</th>
                                                        <th>Statut</th>
                                                        <th class="no-sort"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($subscriptionHistory as $subscription)
                                                        <tr>
                                                            <td>
                                                                <p class="text-dark">{{ $subscription->plan->name ?? '-' }}</p>
                                                            </td>
                                                            <td>{{ number_format($subscription->plan->price ?? 0, 2) }} {{ $subscription->plan->currency ?? 'MAD' }}</td>
                                                            <td>{{ $subscription->starts_at ? $subscription->starts_at->translatedFormat('d M Y') : '-' }}</td>
                                                            <td>{{ $subscription->ends_at ? $subscription->ends_at->translatedFormat('d M Y') : '-' }}</td>
                                                            <td>
                                                                @switch($subscription->status)
                                                                    @case('active')
                                                                        <span
                                                                            class="badge badge-soft-success d-inline-flex align-items-center">Actif
                                                                            <i class="isax isax-tick-circle5 ms-1"></i>
                                                                        </span>
                                                                        @break
                                                                    @case('trialing')
                                                                        <span
                                                                            class="badge badge-soft-info d-inline-flex align-items-center">En essai
                                                                            <i class="isax isax-clock ms-1"></i>
                                                                        </span>
                                                                        @break
                                                                    @case('cancelled')
                                                                        <span
                                                                            class="badge badge-soft-danger d-inline-flex align-items-center">Annulé
                                                                            <i class="isax isax-close-circle ms-1"></i>
                                                                        </span>
                                                                        @break
                                                                    @case('past_due')
                                                                        <span
                                                                            class="badge badge-soft-warning d-inline-flex align-items-center">En retard
                                                                            <i class="isax isax-warning-2 ms-1"></i>
                                                                        </span>
                                                                        @break
                                                                    @default
                                                                        <span
                                                                            class="badge badge-soft-secondary d-inline-flex align-items-center">{{ ucfirst($subscription->status) }}
                                                                        </span>
                                                                @endswitch
                                                            </td>
                                                            <td class="action-item">
                                                                <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                                    <i class="isax isax-more"></i>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a href="javascript:void(0);"
                                                                            class="dropdown-item d-flex align-items-center"><i
                                                                                class="isax isax-eye me-2"></i>Voir</a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="text-center">Aucun historique d'abonnement trouvé.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /Table List -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
           End Page Content
          ========================= -->
@endsection
