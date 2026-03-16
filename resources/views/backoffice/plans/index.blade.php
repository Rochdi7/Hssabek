<?php $page = 'plans'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
               Start Page Content
              ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two pb-0">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Gestion des Plans</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'plans'])
                    <div>
                        <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#add_plan"><i
                                class="isax isax-add-circle5 me-1"></i>Nouveau Plan</a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- start row -->
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <p class="fs-14 mb-1 text-truncate">Total Plans</p>
                                    <h4 class="fs-16 fw-semibold">{{ $totalPlans }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="avatar avatar-lg bg-warning flex-shrink-0">
                                    <i class="isax isax-box5 fs-32"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <p class="fs-14 mb-1 text-truncate">Plans Actifs</p>
                                    <h4 class="fs-16 fw-semibold">{{ $activePlans }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="avatar avatar-lg bg-success flex-shrink-0">
                                    <i class="isax isax-box-tick5 fs-32"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <p class="fs-14 mb-1 text-truncate">Plans Inactifs</p>
                                    <h4 class="fs-16 fw-semibold">{{ $inactivePlans }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="avatar avatar-lg bg-danger flex-shrink-0">
                                    <i class="isax isax-box-remove5 fs-32"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center overflow-hidden">
                                <div>
                                    <p class="fs-14 mb-1 text-truncate">Total Abonnés Actifs</p>
                                    <h4 class="fs-16 fw-semibold">{{ $totalSubscribers }}</h4>
                                </div>
                            </div>
                            <div>
                                <span class="avatar avatar-lg bg-info flex-shrink-0">
                                    <i class="isax isax-box-25 fs-32"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Start Pricing Cards (membership-plans style) -->
            @if ($plans->where('is_active', true)->count())
                <div class="mb-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h6 class="mb-1">Aperçu des plans actifs</h6>
                            <p>Visualisation rapide des plans disponibles</p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($plans->where('is_active', true) as $activePlan)
                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex">
                                <div class="card pricing-starter flex-fill">
                                    <div class="card-body">
                                        <div class="border-bottom">
                                            <div class="mb-3">
                                                <div
                                                    class="d-flex align-items-center justify-content-between position-relative">
                                                    <h5 class="mb-1">{{ $activePlan->name }}</h5>
                                                    @if ($activePlan->is_popular)
                                                        <span
                                                            class="badge bg-success position-absolute top-0 end-0">Populaire</span>
                                                    @endif
                                                </div>
                                                <p>{{ $activePlan->description ?: 'Aucune description' }}</p>
                                            </div>
                                            <div class="mb-3">
                                                <h3 class="d-flex align-items-center mb-1">
                                                    {{ number_format($activePlan->price, 2, ',', ' ') }}
                                                    {{ $activePlan->currency }}<span
                                                        class="fs-14 fw-normal text-gray-9 ms-1">/{{ $activePlan->interval === 'month' ? 'mois' : ($activePlan->interval === 'year' ? 'an' : 'à vie') }}</span>
                                                </h3>
                                                <p>{{ $activePlan->max_users === null ? 'Utilisateurs illimités' : $activePlan->max_users . ' Utilisateur(s)' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <div class="mb-1">
                                                <h6 class="fs-16 mb-2">Limites incluses :</h6>
                                            </div>
                                            <div>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i
                                                        class="isax isax-tick-circle me-2"></i>{{ $activePlan->max_users === null ? 'Utilisateurs illimités' : $activePlan->max_users . ' Utilisateur(s)' }}
                                                </p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i
                                                        class="isax isax-tick-circle me-2"></i>{{ $activePlan->max_customers === null ? 'Clients illimités' : $activePlan->max_customers . ' Client(s)' }}
                                                </p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i
                                                        class="isax isax-tick-circle me-2"></i>{{ $activePlan->max_products === null ? 'Produits illimités' : $activePlan->max_products . ' Produit(s)' }}
                                                </p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i
                                                        class="isax isax-tick-circle me-2"></i>{{ $activePlan->max_invoices_per_month === null ? 'Factures illimitées' : $activePlan->max_invoices_per_month . ' Facture(s)/mois' }}
                                                </p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i
                                                        class="isax isax-tick-circle me-2"></i>{{ $activePlan->max_exports_per_month === null ? 'Exports illimités' : $activePlan->max_exports_per_month . ' Export(s)/mois' }}
                                                </p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i
                                                        class="isax isax-tick-circle me-2"></i>{{ $activePlan->max_warehouses === null ? 'Entrepôts illimités' : $activePlan->max_warehouses . ' Entrepôt(s)' }}
                                                </p>
                                                <p class="text-dark d-flex align-items-center mb-2 text-truncate"><i
                                                        class="isax isax-tick-circle me-2"></i>{{ $activePlan->max_storage_mb === null ? 'Stockage illimité' : $activePlan->max_storage_mb . ' Mo de stockage' }}
                                                </p>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);"
                                            class="d-flex align-items-center justify-content-center btn border"
                                            data-bs-toggle="modal" data-bs-target="#view_plan_{{ $activePlan->id }}">
                                            <i class="isax isax-eye me-1"></i> Voir les détails
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <!-- End Pricing Cards -->

            <!-- Start Table Search -->
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
                            'columns' => ['Nom', 'Prix', 'Intervalle', 'Abonnés', 'Créé le', 'Statut'],
                        ])
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center fw-medium"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>Trier par : <span class="fw-normal ms-1">Plus
                                    récent</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Plus récent</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">Plus ancien</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Table Search -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            @endif

            <!-- Start Table List -->
            @include('backoffice.plans.partials._table')
            <!-- End Table List -->

        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    <!-- Modals -->
    @include('backoffice.plans.partials._modals')

    @if ($errors->any() && old('_modal') === 'add_plan')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('add_plan'));
                modal.show();
            });
        </script>
    @endif

    <!-- ========================
               End Page Content
              ========================= -->

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Unlimited toggle: disable/enable the number input
                document.querySelectorAll('.unlimited-toggle').forEach(function(toggle) {
                    toggle.addEventListener('change', function() {
                        var targetId = this.getAttribute('data-target');
                        var input = document.getElementById(targetId);
                        if (input) {
                            if (this.checked) {
                                input.disabled = true;
                                input.value = '';
                            } else {
                                input.disabled = false;
                                input.focus();
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
