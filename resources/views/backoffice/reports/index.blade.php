<?php $page = 'reports'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Rapports</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="{{ route('bo.reports.sales') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body text-center py-4">
                                <i class="isax isax-chart-2 fs-1 text-primary mb-2 d-block"></i>
                                <h6>Rapport des ventes</h6>
                                <p class="text-muted mb-0">Revenus, factures et meilleurs clients</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="{{ route('bo.reports.customers') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body text-center py-4">
                                <i class="isax isax-profile-2user fs-1 text-info mb-2 d-block"></i>
                                <h6>Rapport des clients</h6>
                                <p class="text-muted mb-0">Activité clients et créances</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="{{ route('bo.reports.purchases') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body text-center py-4">
                                <i class="isax isax-bag fs-1 text-danger mb-2 d-block"></i>
                                <h6>Rapport des achats</h6>
                                <p class="text-muted mb-0">Dépenses fournisseurs et factures</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="{{ route('bo.reports.finance') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body text-center py-4">
                                <i class="isax isax-wallet-3 fs-1 text-success mb-2 d-block"></i>
                                <h6>Rapport financier</h6>
                                <p class="text-muted mb-0">Revenus vs dépenses et bénéfice</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="{{ route('bo.reports.inventory') }}" class="text-decoration-none">
                        <div class="card">
                            <div class="card-body text-center py-4">
                                <i class="isax isax-box-1 fs-1 text-warning mb-2 d-block"></i>
                                <h6>Rapport d'inventaire</h6>
                                <p class="text-muted mb-0">Niveaux de stock et alertes</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
