<?php $page = 'bo-dashboard'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Tableau de Bord')
@section('description', 'Aperçu général de votre activité commerciale')
@section('content')

    <div class="page-wrapper">

        <div class="content">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Tableau de bord') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-1">
                        <a class="btn btn-primary d-flex align-items-center justify-content-center dropdown-toggle"
                            data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                            {{ __('Créer') }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li>
                                <a href="{{ route('bo.sales.invoices.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document-text-1 me-2"></i>{{ __('Facture') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bo.sales.quotes.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document-download me-2"></i>{{ __('Devis') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bo.sales.credit-notes.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-money-add me-2"></i>{{ __('Avoir') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bo.purchases.purchase-orders.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document me-2"></i>{{ __('Bon de commande') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bo.sales.delivery-challans.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document-forward me-2"></i>{{ __('Bon de livraison') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bo.crm.customers.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-user-add me-2"></i>{{ __('Client') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- Announcements -->
            @if(isset($announcements) && $announcements->count())
                @foreach($announcements as $announcement)
                    @php
                        $alertClass = match($announcement->type) {
                            'warning' => 'alert-warning',
                            'success' => 'alert-success',
                            'danger' => 'alert-danger',
                            default => 'alert-info',
                        };
                        $iconClass = match($announcement->type) {
                            'warning' => 'isax-warning-2',
                            'success' => 'isax-tick-circle',
                            'danger' => 'isax-danger',
                            default => 'isax-info-circle',
                        };
                    @endphp
                    <div class="alert {{ $alertClass }} alert-dismissible fade show d-flex align-items-start" role="alert">
                        <i class="isax {{ $iconClass }} fs-20 me-2 mt-1 flex-shrink-0"></i>
                        <div>
                            <strong>{{ $announcement->title }}</strong>
                            <p class="mb-0 mt-1">{{ $announcement->content }}</p>
                            <small class="text-muted">{{ $announcement->published_at?->translatedFormat('d M Y') }}</small>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endforeach
            @endif
            <!-- End Announcements -->

            <!-- Welcome Banner -->
            <div class="bg-primary rounded welcome-wrap position-relative mb-3">
                <div class="row">
                    <div class="col-lg-8 col-md-9 col-sm-7">
                        <div>
                            <h5 class="text-white mb-1">{{ __('Bonjour') }}, {{ auth()->user()->name ?? '' }}</h5>
                            @if($draftInvoiceCount > 0)
                                <p class="text-white mb-3">{{ __('Vous avez') }} {{ $draftInvoiceCount }} {{ __('facture(s) en brouillon à envoyer aux clients') }}</p>
                            @else
                                <p class="text-white mb-3">{{ __('Bienvenue sur votre tableau de bord') }}</p>
                            @endif
                            <div class="d-flex align-items-center flex-wrap gap-3">
                                <p class="d-flex align-items-center fs-13 text-white mb-0"><i
                                        class="isax isax-calendar5 me-1"></i>{{ now()->translatedFormat('l, d M Y') }}</p>
                                <p class="d-flex align-items-center fs-13 text-white mb-0"><i
                                        class="isax isax-clock5 me-1"></i>{{ now()->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-absolute end-0 top-50 translate-middle-y p-2 d-none d-sm-block">
                    <img src="{{ URL::asset('build/img/icons/dashboard.svg') }}" alt="img">
                </div>
            </div>
            <!-- End Welcome Banner -->

            <!-- start row - Overview / Sales Analytics / Invoice Statistics -->
            <div class="row">
                <!-- Overview -->
                <div class="col-md-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="d-flex align-items-center mb-1"><i
                                        class="isax isax-category5 text-default me-2"></i>{{ __('Vue d\'ensemble') }}</h6>
                            </div>
                            <div class="row g-4">
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-primary-subtle text-primary flex-shrink-0 me-2">
                                            <i class="isax isax-document-text-1 fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Factures') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0 text-truncate">{{ number_format($invoiceCount) }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center me-2">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-success-subtle text-success-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-profile-2user fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Clients') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0 text-truncate">{{ number_format($customerCount) }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-warning-subtle text-warning-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-dcube fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Impayés') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0 text-truncate">{{ number_format($outstanding, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center me-2">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-info-subtle text-info-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-document-text fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Devis') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0 text-truncate">{{ number_format($quoteCount) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales Analytics -->
                <div class="col-md-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="d-flex align-items-center mb-1"><i
                                        class="isax isax-chart-215 text-default me-2"></i>{{ __('Analyse des ventes') }}</h6>
                            </div>
                            <div class="row g-4">
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-primary-subtle text-primary flex-shrink-0 me-2">
                                            <i class="isax isax-document-forward fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Ventes totales') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0">{{ number_format($totalSalesYtd, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center me-2">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-success-subtle text-success-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-programming-arrow fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Achats') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0 text-truncate">{{ number_format($totalPurchasesYtd, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-warning-subtle text-warning-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-dollar-circle fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 mb-0">{{ __('Dépenses') }}</p>
                                            <h6 class="fs-16 fw-semibold text-truncate">{{ number_format($expensesMtd, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center me-2">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-info-subtle text-info-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-flag fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Avoirs') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0 text-truncate">{{ number_format($creditNotesTotal, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Invoice Statistics -->
                <div class="col-md-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="d-flex align-items-center mb-1"><i
                                        class="isax isax-chart-success5 text-default me-2"></i>{{ __('Statistiques factures') }}</h6>
                            </div>
                            <div class="row g-4">
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-primary-subtle text-primary flex-shrink-0 me-2">
                                            <i class="isax isax-document fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Facturé') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0">{{ number_format($invoicedTotal, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center me-2">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-success-subtle text-success-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-document-forward fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Encaissé') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0 text-truncate">{{ number_format($receivedTotal, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-warning-subtle text-warning-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-document-previous fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('Impayé') }}</p>
                                            <h6 class="fs-16 fw-semibold mb-0 text-truncate">{{ number_format($outstandingTotal, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="d-flex align-items-center me-2">
                                        <span
                                            class="avatar avatar-44 avatar-rounded bg-info-subtle text-info-emphasis flex-shrink-0 me-2">
                                            <i class="isax isax-dislike fs-20"></i>
                                        </span>
                                        <div>
                                            <p class="mb-1 text-truncate">{{ __('En retard') }}</p>
                                            <h6 class="fs-16 fw-semibold text-truncate mb-0">{{ number_format($overdueTotal, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- start row - KPI Cards with bg images -->
            <div class="row">
                <div class="col-md-4 d-flex flex-column">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">{{ __('Total produits') }}</p>
                                    <div class="d-flex align-items-center">
                                        <h6 class="fs-16 fw-semibold me-2">{{ number_format($productCount) }}</h6>
                                        @if($lowStockCount > 0)
                                            <span class="badge badge-sm badge-soft-danger">{{ $lowStockCount }} {{ __('stock bas') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <span class="avatar avatar-lg bg-light text-dark avatar-rounded">
                                    <i class="isax isax-document-text fs-16"></i>
                                </span>
                            </div>
                            <a href="{{ route('bo.inventory.stock.index') }}" class="fw-medium text-decoration-underline">{{ __('Voir l\'inventaire') }}</a>
                        </div>
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{ URL::asset('build/img/bg/card-bg-01.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">{{ __('Total ventes') }}</p>
                                    <div class="d-flex align-items-center">
                                        <h6 class="fs-16 fw-semibold me-2">{{ number_format($invoiceCount) }}</h6>
                                    </div>
                                </div>
                                <span class="avatar avatar-lg bg-light text-dark avatar-rounded">
                                    <i class="isax isax-document-text fs-16"></i>
                                </span>
                            </div>
                            <a href="{{ route('bo.sales.invoices.index') }}" class="fw-medium text-decoration-underline">{{ __('Voir les factures') }}</a>
                        </div>
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{ URL::asset('build/img/bg/card-bg-02.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex flex-column">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">{{ __('Total devis') }}</p>
                                    <div class="d-flex align-items-center">
                                        <h6 class="fs-16 fw-semibold me-2">{{ number_format($quoteCount) }}</h6>
                                    </div>
                                </div>
                                <span class="avatar avatar-lg bg-light text-dark avatar-rounded">
                                    <i class="isax isax-document-text fs-16"></i>
                                </span>
                            </div>
                            <a href="{{ route('bo.sales.quotes.index') }}" class="fw-medium text-decoration-underline">{{ __('Voir tout') }}</a>
                        </div>
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{ URL::asset('build/img/bg/card-bg-03.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- start row - Sales Analytics + Invoice Analytics -->
            <div class="row">

                <!-- Sales Analytics (Revenus vs Dépenses) -->
                <div class="col-xl-8 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body pb-0">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h6 class="mb-1">{{ __('Analyse des ventes') }}</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div>
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div>
                                            <p class="fs-13 mb-1">{{ __('Ventes totales') }}</p>
                                            <h6 class="fs-16 fw-semibold text-primary">{{ number_format($totalSalesYtd, 2, ',', ' ') }} {{ $currency }}</h6>
                                        </div>
                                        <div>
                                            <p class="fs-13 mb-1">{{ __('Encaissé') }}</p>
                                            <h6 class="fs-16 fw-semibold text-success">{{ number_format($receivedTotal, 2, ',', ' ') }} {{ $currency }}</h6>
                                        </div>
                                        <div>
                                            <p class="fs-13 mb-1">{{ __('Dépenses') }}</p>
                                            <h6 class="fs-16 fw-semibold text-danger">{{ number_format($totalDepensesYtd, 2, ',', ' ') }} {{ $currency }}</h6>
                                        </div>
                                        <div>
                                            <p class="fs-13 mb-1">{{ __('Bénéfice') }}</p>
                                            <h6 class="fs-16 fw-semibold">{{ number_format($totalSalesYtd - $totalDepensesYtd, 2, ',', ' ') }} {{ $currency }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <p class="fs-13 text-dark d-flex align-items-center mb-0"><i
                                            class="fa-solid fa-circle text-primary fs-12 me-1"></i>{{ __('Revenus') }}</p>
                                    <p class="fs-13 text-dark d-flex align-items-center mb-0"><i
                                            class="fa-solid fa-circle text-danger fs-12 me-1"></i>{{ __('Dépenses') }}</p>
                                </div>
                            </div>
                            <div id="sales_analytics_chart"></div>
                        </div>
                    </div>
                </div>

                <!-- Invoice Analytics (Radial Bar) -->
                <div class="col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h6 class="mb-1">{{ __('Analyse des factures') }}</h6>
                            </div>
                            <div id="invoice_analytics_chart"></div>
                            <div class="d-flex align-items-center justify-content-around gap-3 mb-3">
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i
                                        class="fa-solid fa-square text-primary fs-12 me-1"></i>{{ __('Facturé') }}</p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i
                                        class="fa-solid fa-square text-success fs-12 me-1"></i>{{ __('Encaissé') }}</p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i
                                        class="fa-solid fa-square text-warning fs-12 me-1"></i>{{ __('En attente') }}</p>
                            </div>
                            <div class="border rounded p-2">
                                <div class="row g-2">
                                    <div class="col d-flex border-end">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">{{ __('Facturé') }}</p>
                                            <h6 class="fs-16 fw-semibold">{{ number_format($invoicedTotal, 0, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex border-end">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">{{ __('Encaissé') }}</p>
                                            <h6 class="fs-16 fw-semibold">{{ number_format($receivedTotal, 0, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">{{ __('Impayé') }}</p>
                                            <h6 class="fs-16 fw-semibold">{{ number_format($outstandingTotal, 0, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <!-- start row - Revenue Chart + Customers Table -->
            <div class="row">
                <!-- Revenue Chart -->
                <div class="col-xl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body pb-0">
                            <div class="mb-3">
                                <h6 class="mb-1">{{ __('Chiffre d\'affaires') }}</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div>
                                    <p class="mb-1">{{ __('CA du mois') }}</p>
                                    <div class="d-flex align-items-center">
                                        <h6 class="fs-16 fw-semibold me-2">{{ number_format($revenueMtd, 2, ',', ' ') }} {{ $currency }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <p class="fs-13 text-dark d-flex align-items-center mb-0"><i
                                            class="fa-solid fa-circle text-primary-transparent fs-12 me-1"></i>{{ __('Encaissé') }}
                                    </p>
                                    <p class="fs-13 text-dark d-flex align-items-center mb-0"><i
                                            class="fa-solid fa-circle text-primary fs-12 me-1"></i>{{ __('Impayé') }}</p>
                                </div>
                            </div>
                            <div id="revenue_trend_chart"></div>
                        </div>
                    </div>
                </div>

                <!-- Customers Table -->
                <div class="col-xl-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="mb-1">{{ __('Meilleurs clients') }}</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-nowrap table-borderless custom-table">
                                    <tbody>
                                        @forelse($topCustomers as $row)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-lg rounded-circle me-2 flex-shrink-0 bg-primary-light text-primary d-flex align-items-center justify-content-center">
                                                        {{ strtoupper(substr($row->customer?->name ?? '?', 0, 1)) }}
                                                    </span>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-1">{{ $row->customer?->name ?? '—' }}</h6>
                                                        <p class="fs-13">{{ __('CA') }} : {{ number_format($row->revenue, 2, ',', ' ') }} {{ $currency }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-end gap-2">
                                                    <a href="{{ route('bo.sales.invoices.create') }}"
                                                        class="btn btn-icon btn-sm btn-light" data-bs-toggle="tooltip"
                                                        data-bs-title="{{ __('Nouvelle facture') }}"><i
                                                            class="isax isax-add-circle"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-muted">{{ __('Aucune donnée disponible.') }}</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('bo.crm.customers.index') }}"
                                class="btn btn-light btn-lg w-100 text-decoration-underline mt-3">{{ __('Tous les clients') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- start row - Invoices Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                                <h6 class="mb-1">{{ __('Factures récentes') }}</h6>
                                <a href="{{ route('bo.sales.invoices.index') }}" class="btn btn-primary mb-1">{{ __('Voir toutes les factures') }}</a>
                            </div>
                            <div class="table-responsive no-filter no-pagination">
                                <table class="table table-nowrap border mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('N°') }}</th>
                                            <th>{{ __('Client') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Montant') }}</th>
                                            <th>{{ __('Échéance') }}</th>
                                            <th>{{ __('Statut') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $invoiceStatusLabels = [
                                                'draft' => __('Brouillon'), 'sent' => __('Envoyée'), 'partial' => __('Partielle'),
                                                'paid' => __('Payée'), 'overdue' => __('En retard'), 'void' => __('Annulée'),
                                            ];
                                            $invoiceStatusColors = [
                                                'draft' => 'secondary', 'sent' => 'info', 'partial' => 'warning',
                                                'paid' => 'success', 'overdue' => 'danger', 'void' => 'dark',
                                            ];
                                            $invoiceStatusIcons = [
                                                'draft' => 'isax-edit-2', 'sent' => 'isax-timer', 'partial' => 'isax-slash',
                                                'paid' => 'isax-tick-circle', 'overdue' => 'isax-close-circle', 'void' => 'isax-close-circle',
                                            ];
                                        @endphp
                                        @forelse($recentInvoices as $invoice)
                                        <tr>
                                            <td>
                                                <a href="{{ route('bo.sales.invoices.show', $invoice) }}" class="link-default">{{ $invoice->number }}</a>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-sm rounded-circle me-2 flex-shrink-0 bg-primary-light text-primary d-flex align-items-center justify-content-center">
                                                        {{ strtoupper(substr($invoice->customer?->name ?? '?', 0, 1)) }}
                                                    </span>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0">{{ $invoice->customer?->name ?? '—' }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $invoice->issue_date?->format('d/m/Y') ?? '—' }}</td>
                                            <td class="text-dark">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $currency }}</td>
                                            <td>{{ $invoice->due_date?->format('d/m/Y') ?? '—' }}</td>
                                            <td>
                                                <span class="badge badge-soft-{{ $invoiceStatusColors[$invoice->status] ?? 'secondary' }} badge-sm d-inline-flex align-items-center">
                                                    {{ $invoiceStatusLabels[$invoice->status] ?? $invoice->status }}<i class="isax {{ $invoiceStatusIcons[$invoice->status] ?? 'isax-information' }} ms-1"></i>
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">{{ __('Aucune facture récente.') }}</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- start row - Recent Transactions / Quotations / Invoice Status -->
            <div class="row">
                <!-- Recent Transactions -->
                <div class="col-lg-12 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body pb-1">
                            <div class="mb-3">
                                <h6 class="mb-1">{{ __('Transactions récentes') }}</h6>
                            </div>
                            @forelse($recentPayments as $payment)
                            @php
                                $firstAllocation = $payment->allocations->first();
                                $linkedInvoice = $firstAllocation?->invoice;
                            @endphp
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-md flex-shrink-0 me-2 bg-success-light text-success rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="isax isax-arrow-down"></i>
                                    </span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1">{{ $payment->customer?->name ?? '—' }}</h6>
                                        @if($linkedInvoice)
                                            <p class="fs-13"><a href="{{ route('bo.sales.invoices.show', $linkedInvoice) }}" class="link-default">{{ $linkedInvoice->number }}</a></p>
                                        @else
                                            <p class="fs-13 text-muted">{{ $payment->reference_number ?? '—' }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="badge badge-lg badge-soft-success">+ {{ number_format($payment->amount, 2, ',', ' ') }} {{ $currency }}</span>
                                    <p class="fs-13 mb-0">{{ $payment->payment_date?->format('d/m/Y') ?? '' }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="text-muted text-center">{{ __('Aucune transaction récente.') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Quotations -->
                <div class="col-md-6 col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="mb-1">{{ __('Devis récents') }}</h6>
                            </div>
                            @php
                                $quoteStatusLabels = [
                                    'draft' => __('Brouillon'), 'sent' => __('Envoyé'), 'accepted' => __('Accepté'),
                                    'rejected' => __('Refusé'), 'expired' => __('Expiré'), 'cancelled' => __('Annulé'),
                                ];
                                $quoteStatusColors = [
                                    'draft' => 'secondary', 'sent' => 'info', 'accepted' => 'success',
                                    'rejected' => 'danger', 'expired' => 'light', 'cancelled' => 'dark',
                                ];
                                $quoteStatusIcons = [
                                    'draft' => 'isax-edit-2', 'sent' => 'isax-arrow-right-24', 'accepted' => 'isax-tick-circle',
                                    'rejected' => 'isax-close-circle', 'expired' => 'isax-timer-pause', 'cancelled' => 'isax-close-circle',
                                ];
                            @endphp
                            @forelse($recentQuotes as $quote)
                            <div class="d-flex align-items-center justify-content-between {{ !$loop->last ? 'border-bottom pb-3 mb-3' : '' }}">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-lg flex-shrink-0 me-2 bg-success-light text-success rounded-circle d-flex align-items-center justify-content-center">
                                        {{ strtoupper(substr($quote->customer?->name ?? '?', 0, 1)) }}
                                    </span>
                                    <div>
                                        <h6 class="fs-14 fw-semibold mb-1"><a href="{{ route('bo.sales.quotes.show', $quote) }}">{{ $quote->customer?->name ?? '—' }}</a></h6>
                                        <p class="fs-13">{{ $quote->number }}</p>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <span class="badge badge-sm badge-soft-{{ $quoteStatusColors[$quote->status] ?? 'secondary' }} d-inline-flex align-items-center {{ ($quoteStatusColors[$quote->status] ?? '') === 'light' ? 'text-dark' : '' }} mb-1">{{ $quoteStatusLabels[$quote->status] ?? $quote->status }}<i class="isax {{ $quoteStatusIcons[$quote->status] ?? 'isax-information' }} ms-1"></i></span>
                                    <p class="fs-13">{{ $quote->issue_date?->format('d/m/Y') ?? '—' }}</p>
                                </div>
                            </div>
                            @empty
                            <p class="text-muted text-center">{{ __('Aucun devis récent.') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Invoice Income + Status Donut -->
                <div class="col-md-6 col-xl-4 d-flex flex-column">
                    <div class="card d-flex">
                        <div class="card-body flex-fill">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-1">{{ __('Revenu total factures') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ number_format($invoicedTotal, 2, ',', ' ') }} {{ $currency }}</h6>
                                </div>
                                <div>
                                    <p class="fs-13">{{ __('Année') }} {{ now()->year }}</p>
                                </div>
                            </div>
                        </div>
                        <div id="invoice_income"></div>
                    </div>
                    <div class="card d-flex">
                        <div class="card-body flex-fill">
                            <h6 class="mb-3">{{ __('Répartition des factures') }}</h6>
                            <div id="invoice_status_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>

    </div>

{{-- Setup Wizard Modal --}}
@if(!empty($showSetupWizard))
    @include('backoffice.partials.setup-wizard')
@endif

@endsection

@push('scripts')
<script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ─── Évolution du chiffre d'affaires (Bar Chart) ───
    var revenueTrendEl = document.querySelector('#revenue_trend_chart');
    if (revenueTrendEl) {
        var labels = {!! json_encode($revenueTrend->pluck('month')) !!};
        var revenueData = {!! json_encode($revenueTrend->pluck('revenue')->map(fn($v) => (float)$v)) !!};
        var collectedByMonth = {!! json_encode($collectedTrend) !!};

        var monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];
        var formattedLabels = labels.map(function(m) {
            var parts = m.split('-');
            return monthNames[parseInt(parts[1]) - 1] + ' ' + parts[0];
        });

        // Real collected per month from payments, outstanding = revenue - collected
        var collectedData = labels.map(function(m) {
            return Math.round(parseFloat(collectedByMonth[m] || 0));
        });
        var outstandingData = revenueData.map(function(v, i) {
            var diff = Math.round(v) - collectedData[i];
            return diff > 0 ? diff : 0;
        });

        new ApexCharts(revenueTrendEl, {
            chart: {
                type: 'bar',
                height: 300,
                stacked: true,
                toolbar: { show: false },
                fontFamily: 'inherit'
            },
            series: [
                { name: {!! json_encode(__('Encaissé')) !!}, data: collectedData },
                { name: {!! json_encode(__('Impayé')) !!}, data: outstandingData }
            ],
            xaxis: {
                categories: formattedLabels,
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val >= 1000 ? (val / 1000).toFixed(0) + 'k' : val.toFixed(0);
                    }
                }
            },
            colors: ['rgba(var(--bs-primary-rgb), 0.3)', 'var(--bs-primary)'],
            plotOptions: {
                bar: { columnWidth: '50%', borderRadius: 4, borderRadiusApplication: 'end' }
            },
            dataLabels: { enabled: false },
            legend: { show: false },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val.toLocaleString('fr-FR', { minimumFractionDigits: 2 }) + ' {{ $currency }}';
                    }
                }
            },
            grid: { borderColor: '#f1f1f1', strokeDashArray: 4 }
        }).render();
    }

    // ─── Invoice Income (Area Sparkline) ───
    var invoiceIncomeEl = document.querySelector('#invoice_income');
    if (invoiceIncomeEl) {
        var revenueData2 = {!! json_encode($revenueTrend->pluck('revenue')->map(fn($v) => (float)$v)) !!};
        new ApexCharts(invoiceIncomeEl, {
            chart: { type: 'area', height: 100, sparkline: { enabled: true }, fontFamily: 'inherit' },
            series: [{ name: {!! json_encode(__('Revenu')) !!}, data: revenueData2 }],
            colors: ['var(--bs-primary)'],
            stroke: { curve: 'smooth', width: 2 },
            fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.1 } },
            tooltip: {
                y: { formatter: function(val) { return val.toLocaleString('fr-FR', { minimumFractionDigits: 2 }) + ' {{ $currency }}'; } }
            }
        }).render();
    }

    // ─── Répartition des factures (Donut Chart) ───
    var invoiceStatusEl = document.querySelector('#invoice_status_chart');
    if (invoiceStatusEl) {
        var breakdown = @json($statusBreakdown->map(fn($s) => (int)$s->count));
        var statusLabels = {
            draft: {!! json_encode(__('Brouillon')) !!},
            sent: {!! json_encode(__('Envoyée')) !!},
            partial: {!! json_encode(__('Partielle')) !!},
            paid: {!! json_encode(__('Payée')) !!},
            overdue: {!! json_encode(__('En retard')) !!},
            void: {!! json_encode(__('Annulée')) !!}
        };
        var statusColors = {
            draft: '#6c757d',
            sent: '#0d6efd',
            partial: '#ffc107',
            paid: '#198754',
            overdue: '#dc3545',
            void: '#adb5bd'
        };

        var chartLabels = [];
        var chartData = [];
        var chartColors = [];

        for (var key in breakdown) {
            if (breakdown[key] > 0) {
                chartLabels.push(statusLabels[key] || key);
                chartData.push(breakdown[key]);
                chartColors.push(statusColors[key] || '#6c757d');
            }
        }

        if (chartData.length > 0) {
            new ApexCharts(invoiceStatusEl, {
                chart: { type: 'donut', height: 200, fontFamily: 'inherit' },
                series: chartData,
                labels: chartLabels,
                colors: chartColors,
                legend: { position: 'bottom', fontSize: '12px' },
                dataLabels: { enabled: false },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                            labels: {
                                show: true,
                                name: { show: true, fontSize: '13px' },
                                value: { show: true, fontSize: '14px', fontWeight: 600 },
                                total: {
                                    show: true,
                                    label: {!! json_encode(__('Total')) !!},
                                    fontSize: '12px',
                                    formatter: function(w) {
                                        return w.globals.seriesTotals.reduce(function(a, b) { return a + b; }, 0);
                                    }
                                }
                            }
                        }
                    }
                },
                tooltip: {
                    y: { formatter: function(val) { return val + ' ' + {!! json_encode(__('facture(s)')) !!}; } }
                },
                responsive: [{ breakpoint: 480, options: { chart: { width: 200 } } }]
            }).render();
        }
    }

    // ─── Analyse des ventes — Revenus vs Dépenses (Area Chart) ───
    var salesAnalyticsEl = document.querySelector('#sales_analytics_chart');
    if (salesAnalyticsEl) {
        // Use consistent 12-month labels from controller
        var allMonths = {!! json_encode($chartMonths->values()) !!};
        var revenueByMonth = {};
        @foreach($revenueTrend as $row)
            revenueByMonth[{!! json_encode($row->month) !!}] = {{ (float) $row->revenue }};
        @endforeach
        var purchasesByMonth = {!! json_encode($purchasesTrend) !!};
        var expensesByMonth = {!! json_encode($expensesTrend) !!};

        var monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];
        var salesLabels = allMonths.map(function(m) {
            var parts = m.split('-');
            return monthNames[parseInt(parts[1]) - 1] + ' ' + parts[0].substring(2);
        });

        // Revenue per month (aligned to 12-month grid)
        var trendRevenue = allMonths.map(function(m) {
            return Math.round(parseFloat(revenueByMonth[m] || 0));
        });

        // Dépenses = Achats + Charges per month
        var depensesData = allMonths.map(function(m) {
            return Math.round(parseFloat(purchasesByMonth[m] || 0) + parseFloat(expensesByMonth[m] || 0));
        });

        new ApexCharts(salesAnalyticsEl, {
            chart: {
                type: 'area',
                height: 300,
                toolbar: { show: false },
                fontFamily: 'inherit'
            },
            series: [
                { name: {!! json_encode(__('Revenus')) !!}, data: trendRevenue },
                { name: {!! json_encode(__('Dépenses')) !!}, data: depensesData }
            ],
            xaxis: {
                categories: salesLabels,
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val >= 1000 ? (val / 1000).toFixed(0) + 'k' : val.toFixed(0);
                    }
                }
            },
            colors: ['var(--bs-primary)', '#dc3545'],
            stroke: { curve: 'smooth', width: 2 },
            fill: {
                type: 'gradient',
                gradient: { shadeIntensity: 1, opacityFrom: 0.3, opacityTo: 0.05 }
            },
            dataLabels: { enabled: false },
            legend: { show: false },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val.toLocaleString('fr-FR', { minimumFractionDigits: 2 }) + ' {{ $currency }}';
                    }
                }
            },
            grid: { borderColor: '#f1f1f1', strokeDashArray: 4 }
        }).render();
    }

    // ─── Analyse des factures — Radial Bar ───
    var invoiceAnalyticsEl = document.querySelector('#invoice_analytics_chart');
    if (invoiceAnalyticsEl) {
        var totalInv = {{ $totalInvoiceCount }};
        var paidPct = Math.round(({{ $paidCount }} / totalInv) * 100);
        var partialPct = Math.round(({{ $partialCount }} / totalInv) * 100);
        var sentPct = Math.round(({{ $sentCount }} / totalInv) * 100);
        var overduePct = Math.round(({{ $overdueCount }} / totalInv) * 100);

        new ApexCharts(invoiceAnalyticsEl, {
            chart: {
                type: 'radialBar',
                height: 280,
                fontFamily: 'inherit'
            },
            series: [paidPct, sentPct, partialPct, overduePct],
            labels: [
                {!! json_encode(__('Payées')) !!},
                {!! json_encode(__('Envoyées')) !!},
                {!! json_encode(__('Partielles')) !!},
                {!! json_encode(__('En retard')) !!}
            ],
            colors: ['#198754', '#0d6efd', '#ffc107', '#dc3545'],
            plotOptions: {
                radialBar: {
                    hollow: { size: '35%' },
                    dataLabels: {
                        name: { fontSize: '13px' },
                        value: { fontSize: '14px', fontWeight: 600, formatter: function(val) { return val + '%'; } },
                        total: {
                            show: true,
                            label: {!! json_encode(__('Total')) !!},
                            fontSize: '12px',
                            formatter: function() { return totalInv + ' ' + {!! json_encode(__('factures')) !!}; }
                        }
                    },
                    track: { background: '#f1f1f1' }
                }
            },
            stroke: { lineCap: 'round' },
            legend: { show: false }
        }).render();
    }
});
</script>
@endpush
