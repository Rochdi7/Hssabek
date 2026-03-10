<?php $page = 'bo-dashboard'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')

    <div class="page-wrapper">
        <div class="content">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Tableau de bord</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-1">
                        <a class="btn btn-primary d-flex align-items-center justify-content-center dropdown-toggle"
                            data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                            Créer
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li>
                                <a href="{{ route('bo.sales.invoices.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document-text-1 me-2"></i>Facture
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bo.sales.quotes.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document-download me-2"></i>Devis
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bo.purchases.purchase-orders.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-document me-2"></i>Bon de commande
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('bo.crm.customers.create') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="isax isax-user-add me-2"></i>Client
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

            <!-- start row - KPI Cards -->
            <div class="row">

                <!-- Start Revenue MTD -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">Chiffre d'affaires (mois)</p>
                                    <h6 class="fs-16 fw-semibold">{{ number_format($revenueMtd, 2, ',', ' ') }} {{ $currency }}</h6>
                                </div>
                                <span class="avatar avatar-lg bg-primary text-white avatar-rounded">
                                    <i class="isax isax-receipt-item fs-16"></i>
                                </span>
                            </div>
                            <p class="fs-13 text-muted mb-0">Année : {{ number_format($revenueYtd, 2, ',', ' ') }} {{ $currency }}</p>
                        </div>
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{ URL::asset('build/img/bg/card-bg-04.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <!-- End Revenue MTD -->

                <!-- Start Outstanding -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">Impayés en cours</p>
                                    <h6 class="fs-16 fw-semibold">{{ number_format($outstanding, 2, ',', ' ') }} {{ $currency }}</h6>
                                </div>
                                <span class="avatar avatar-lg bg-warning text-white avatar-rounded">
                                    <i class="isax isax-timer fs-16"></i>
                                </span>
                            </div>
                            @if($overdueCount > 0)
                                <p class="fs-13 mb-0"><span class="text-danger d-inline-flex align-items-center"><i class="isax isax-close-circle me-1"></i>{{ $overdueCount }} facture(s) en retard</span></p>
                            @else
                                <p class="fs-13 text-muted mb-0">Aucune facture en retard</p>
                            @endif
                        </div>
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{ URL::asset('build/img/bg/card-bg-06.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <!-- End Outstanding -->

                <!-- Start Customers -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">Clients</p>
                                    <h6 class="fs-16 fw-semibold">{{ number_format($customerCount) }}</h6>
                                </div>
                                <span class="avatar avatar-lg bg-success text-white avatar-rounded">
                                    <i class="isax isax-tick-circle fs-16"></i>
                                </span>
                            </div>
                            <p class="fs-13 mb-0">
                                <a href="{{ route('bo.crm.customers.index') }}" class="text-primary">Voir tous les clients</a>
                            </p>
                        </div>
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{ URL::asset('build/img/bg/card-bg-05.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <!-- End Customers -->

                <!-- Start Low Stock -->
                <div class="col-sm-6 col-xl-3 d-flex">
                    <div class="card overflow-hidden z-1 flex-fill {{ $lowStockCount > 0 ? 'border-danger' : '' }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-bottom mb-2 pb-2">
                                <div>
                                    <p class="mb-1">Alertes stock bas</p>
                                    <h6 class="fs-16 fw-semibold {{ $lowStockCount > 0 ? 'text-danger' : '' }}">{{ $lowStockCount }}</h6>
                                </div>
                                <span class="avatar avatar-lg {{ $lowStockCount > 0 ? 'bg-danger' : 'bg-info' }} text-white avatar-rounded">
                                    <i class="isax isax-information fs-16"></i>
                                </span>
                            </div>
                            @if($lowStockCount > 0)
                                <p class="fs-13 mb-0">
                                    <a href="{{ route('bo.reports.inventory') }}" class="text-danger">Voir les produits</a>
                                </p>
                            @else
                                <p class="fs-13 text-muted mb-0">Stock suffisant</p>
                            @endif
                        </div>
                        <div class="position-absolute end-0 bottom-0 z-n1">
                            <img src="{{ URL::asset('build/img/bg/card-bg-07.svg') }}" alt="img">
                        </div>
                    </div>
                </div>
                <!-- End Low Stock -->

            </div>
            <!-- end row -->

            <!-- start row - Charts -->
            <div class="row">

                <!-- Start Sales Analytics (Revenue Trend) -->
                <div class="col-xl-8 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body pb-0">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h6 class="mb-1">Évolution du chiffre d'affaires</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <div>
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div>
                                            <p class="fs-13 mb-1">CA du mois</p>
                                            <h6 class="fs-16 fw-semibold text-primary">{{ number_format($revenueMtd, 2, ',', ' ') }} {{ $currency }}</h6>
                                        </div>
                                        <div>
                                            <p class="fs-13 mb-1">Encaissé</p>
                                            <h6 class="fs-16 fw-semibold text-success">{{ number_format($collected, 2, ',', ' ') }} {{ $currency }}</h6>
                                        </div>
                                        <div>
                                            <p class="fs-13 mb-1">Dépenses</p>
                                            <h6 class="fs-16 fw-semibold text-danger">{{ number_format($expensesMtd, 2, ',', ' ') }} {{ $currency }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="revenue_trend_chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <!-- End Sales Analytics -->

                <!-- Start Invoice Analytics -->
                <div class="col-xl-4 d-flex">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <h6 class="mb-1">Répartition des factures</h6>
                            </div>
                            <div id="invoice_status_chart" style="min-height: 220px;"></div>
                            <div class="d-flex align-items-center justify-content-around gap-3 mb-3">
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-primary fs-12 me-1"></i>Envoyées</p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-success fs-12 me-1"></i>Payées</p>
                                <p class="fs-13 text-dark d-flex align-items-center mb-0"><i class="fa-solid fa-square text-warning fs-12 me-1"></i>Partielles</p>
                            </div>
                            <div class="border rounded p-2">
                                <div class="row g-2">
                                    <div class="col d-flex border-end">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Facturées</p>
                                            <h6 class="fs-16 fw-semibold">{{ number_format(($statusBreakdown->get('sent')?->total ?? 0) + ($statusBreakdown->get('partial')?->total ?? 0) + ($statusBreakdown->get('paid')?->total ?? 0), 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex border-end">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">Encaissées</p>
                                            <h6 class="fs-16 fw-semibold">{{ number_format($statusBreakdown->get('paid')?->total ?? 0, 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                    <div class="col d-flex">
                                        <div class="text-center flex-fill">
                                            <p class="fs-13 mb-1">En attente</p>
                                            <h6 class="fs-16 fw-semibold">{{ number_format(($statusBreakdown->get('sent')?->total ?? 0) + ($statusBreakdown->get('partial')?->total ?? 0), 2, ',', ' ') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Invoice Analytics -->

            </div>
            <!-- end row -->

            <!-- start row - Tables -->
            <div class="row">

                <!-- Start Recent Invoices -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                                <h6 class="mb-1">Factures récentes</h6>
                                <a href="{{ route('bo.sales.invoices.index') }}" class="btn btn-sm btn-dark mb-1">Voir tout</a>
                            </div>
                            <div class="table-responsive border table-nowrap">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Montant</th>
                                            <th>Échéance</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $invoiceStatusLabels = [
                                                'draft' => 'Brouillon', 'sent' => 'Envoyée', 'partial' => 'Partielle',
                                                'paid' => 'Payée', 'overdue' => 'En retard', 'void' => 'Annulée',
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
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-sm rounded-circle me-2 flex-shrink-0 bg-primary-light text-primary d-flex align-items-center justify-content-center">
                                                        {{ strtoupper(substr($invoice->customer?->name ?? '?', 0, 1)) }}
                                                    </span>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0">
                                                            <a href="{{ route('bo.sales.invoices.show', $invoice) }}">{{ $invoice->customer?->name ?? '—' }}</a>
                                                        </h6>
                                                        <small class="text-muted">{{ $invoice->number }}</small>
                                                    </div>
                                                </div>
                                            </td>
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
                                            <td colspan="4" class="text-center text-muted">Aucune facture récente.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Recent Invoices -->

                <!-- Start Recent Quotes -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                                <h6 class="mb-1">Devis récents</h6>
                                <a href="{{ route('bo.sales.quotes.index') }}" class="btn btn-sm btn-dark mb-1">Voir tout</a>
                            </div>
                            <div class="table-responsive border table-nowrap">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Date d'expiration</th>
                                            <th>Montant</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $quoteStatusLabels = [
                                                'draft' => 'Brouillon', 'sent' => 'Envoyé', 'accepted' => 'Accepté',
                                                'rejected' => 'Refusé', 'expired' => 'Expiré', 'cancelled' => 'Annulé',
                                            ];
                                            $quoteStatusColors = [
                                                'draft' => 'secondary', 'sent' => 'info', 'accepted' => 'success',
                                                'rejected' => 'danger', 'expired' => 'warning', 'cancelled' => 'dark',
                                            ];
                                            $quoteStatusIcons = [
                                                'draft' => 'isax-edit-2', 'sent' => 'isax-timer', 'accepted' => 'isax-tick-circle',
                                                'rejected' => 'isax-close-circle', 'expired' => 'isax-slash', 'cancelled' => 'isax-close-circle',
                                            ];
                                        @endphp
                                        @forelse($recentQuotes as $quote)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-sm rounded-circle me-2 flex-shrink-0 bg-success-light text-success d-flex align-items-center justify-content-center">
                                                        {{ strtoupper(substr($quote->customer?->name ?? '?', 0, 1)) }}
                                                    </span>
                                                    <div>
                                                        <h6 class="fs-14 fw-medium mb-0">
                                                            <a href="{{ route('bo.sales.quotes.show', $quote) }}">{{ $quote->customer?->name ?? '—' }}</a>
                                                        </h6>
                                                        <small class="text-muted">{{ $quote->number }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $quote->expiry_date?->format('d/m/Y') ?? '—' }}</td>
                                            <td class="text-dark">{{ number_format($quote->total, 2, ',', ' ') }} {{ $currency }}</td>
                                            <td>
                                                <span class="badge badge-soft-{{ $quoteStatusColors[$quote->status] ?? 'secondary' }} badge-sm d-inline-flex align-items-center">
                                                    {{ $quoteStatusLabels[$quote->status] ?? $quote->status }}<i class="isax {{ $quoteStatusIcons[$quote->status] ?? 'isax-information' }} ms-1"></i>
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Aucun devis récent.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Recent Quotes -->

            </div>
            <!-- end row -->

            <!-- start row - Top Customers -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-3">
                                <h6 class="mb-1">Meilleurs clients (année en cours)</h6>
                                <a href="{{ route('bo.reports.customers') }}" class="btn btn-sm btn-dark mb-1">Voir le rapport</a>
                            </div>
                            <div class="table-responsive border table-nowrap">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Client</th>
                                            <th class="text-end">Chiffre d'affaires</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($topCustomers as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-sm rounded-circle me-2 flex-shrink-0 bg-primary-light text-primary d-flex align-items-center justify-content-center">
                                                        {{ strtoupper(substr($row->customer?->name ?? '?', 0, 1)) }}
                                                    </span>
                                                    <h6 class="fs-14 fw-medium mb-0">{{ $row->customer?->name ?? '—' }}</h6>
                                                </div>
                                            </td>
                                            <td class="text-end text-dark fw-semibold">{{ number_format($row->revenue, 2, ',', ' ') }} {{ $currency }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Aucune donnée disponible.</td>
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

        </div>

    </div>

@endsection

@push('scripts')
<script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ─── Revenue Trend Chart ───
    var revenueTrendEl = document.querySelector('#revenue_trend_chart');
    if (revenueTrendEl) {
        var labels = {!! json_encode($revenueTrend->pluck('month')) !!};
        var data   = {!! json_encode($revenueTrend->pluck('revenue')->map(fn($v) => (float)$v)) !!};

        // Format month labels (2026-01 → Jan 2026)
        var monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];
        var formattedLabels = labels.map(function(m) {
            var parts = m.split('-');
            return monthNames[parseInt(parts[1]) - 1] + ' ' + parts[0];
        });

        new ApexCharts(revenueTrendEl, {
            chart: { type: 'area', height: 300, toolbar: { show: false }, fontFamily: 'inherit' },
            series: [{ name: "Chiffre d'affaires", data: data }],
            xaxis: { categories: formattedLabels },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val >= 1000 ? (val / 1000).toFixed(0) + 'k' : val.toFixed(0);
                    }
                }
            },
            colors: ['#2563eb'],
            fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.1 } },
            stroke: { curve: 'smooth', width: 2 },
            dataLabels: { enabled: false },
            tooltip: {
                y: { formatter: function(val) { return val.toLocaleString('fr-FR', { minimumFractionDigits: 2 }) + ' {{ $currency }}'; } }
            },
            grid: { borderColor: '#f1f1f1' }
        }).render();
    }

    // ─── Invoice Status Donut Chart ───
    var invoiceStatusEl = document.querySelector('#invoice_status_chart');
    if (invoiceStatusEl) {
        var breakdown = @json($statusBreakdown->map(fn($s) => (int)$s->count));
        var statusLabels = { draft: 'Brouillon', sent: 'Envoyée', partial: 'Partielle', paid: 'Payée', overdue: 'En retard', void: 'Annulée' };
        var statusColors = { draft: '#6c757d', sent: '#0dcaf0', partial: '#ffc107', paid: '#198754', overdue: '#dc3545', void: '#adb5bd' };

        var chartLabels = [];
        var chartData = [];
        var chartColors = [];

        for (var key in breakdown) {
            chartLabels.push(statusLabels[key] || key);
            chartData.push(breakdown[key]);
            chartColors.push(statusColors[key] || '#6c757d');
        }

        new ApexCharts(invoiceStatusEl, {
            chart: { type: 'donut', height: 220, fontFamily: 'inherit' },
            series: chartData,
            labels: chartLabels,
            colors: chartColors,
            legend: { show: false },
            dataLabels: { enabled: false },
            plotOptions: { pie: { donut: { size: '70%' } } },
            responsive: [{ breakpoint: 480, options: { chart: { width: 200 } } }]
        }).render();
    }
});
</script>
@endpush
