<?php $page = 'sales-report'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- Based on sales-report.blade.php layout -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Start Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6 class="mb-0">Rapport des ventes</h6>
                </div>
                <div class="my-xl-auto">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="isax isax-export-1 me-1"></i>Exporter
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form method="POST" action="{{ route('bo.reports.sales.export') }}">
                                    @csrf
                                    <input type="hidden" name="from" value="{{ $from }}">
                                    <input type="hidden" name="to" value="{{ $to }}">
                                    <button class="dropdown-item" type="submit">Télécharger en CSV</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            @if (session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="border-bottom mb-3">
                <!-- start row -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1">Chiffre d'affaires</p>
                                        <h6 class="fs-16 fw-semibold mb-2">
                                            {{ number_format($summary->total_revenue ?? 0, 2, ',', ' ') }}
                                            {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</h6>
                                        <p class="text-truncate">
                                            <span class="text-muted">{{ $from }} - {{ $to }}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span
                                            class="badge badge-soft-primary report-icon avatar-md border border-primary rounded p-2 d-inline-flex align-items-center justify-content-center">
                                            <i class="isax isax-dollar-circle fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="position-absolute start-0 top-0">
                                    <img src="{{ URL::asset('build/img/icons/sales-card-bg-1.svg') }}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1">Factures</p>
                                        <h6 class="fs-16 fw-semibold mb-2">{{ $summary->invoice_count ?? 0 }}</h6>
                                        <p class="text-truncate">
                                            <span class="text-muted">Période sélectionnée</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span
                                            class="badge badge-soft-success report-icon avatar-md border border-success rounded p-2 d-inline-flex align-items-center justify-content-center">
                                            <i class="isax isax-tick-circle fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="position-absolute start-0 top-0">
                                    <img src="{{ URL::asset('build/img/icons/sales-card-bg-2.svg') }}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1">Encaissé</p>
                                        <h6 class="fs-16 fw-semibold mb-2">
                                            {{ number_format($summary->collected ?? 0, 2, ',', ' ') }}
                                            {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}
                                        </h6>
                                        <p class="text-truncate">
                                            <span class="text-muted">Paiements reçus</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span
                                            class="badge badge-soft-warning report-icon avatar-md border border-warning rounded p-2 d-inline-flex align-items-center justify-content-center">
                                            <i class="isax isax-user fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="position-absolute start-0 top-0">
                                    <img src="{{ URL::asset('build/img/icons/sales-card-bg-3.svg') }}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <p class="mb-1 text-truncate">Impayé</p>
                                        <h6 class="fs-16 fw-semibold mb-2 text-truncate">
                                            {{ number_format($summary->outstanding ?? 0, 2, ',', ' ') }}
                                            {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}
                                        </h6>
                                        <p class="text-truncate">
                                            <span class="text-danger">Montant restant dû</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span
                                            class="badge badge-soft-danger report-icon avatar-md border border-danger rounded p-2 d-inline-flex align-items-center justify-content-center">
                                            <i class="isax isax-chart fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="position-absolute start-0 top-0">
                                    <img src="{{ URL::asset('build/img/icons/sales-card-bg-4.svg') }}" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <!-- Date Range Filter -->
            <div class="mb-3">
                <form method="GET" action="{{ route('bo.reports.sales') }}"
                    class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="input-group position-relative" style="width: auto;">
                            <input type="text" name="from" class="form-control datetimepicker rounded-end"
                                placeholder="dd-mm-yyyy" value="{{ $from }}">
                            <span class="input-icon-addon fs-16 text-gray-9">
                                <i class="isax isax-calendar-2"></i>
                            </span>
                        </div>
                        <div class="input-group position-relative" style="width: auto;">
                            <input type="text" name="to" class="form-control datetimepicker rounded-end"
                                placeholder="dd-mm-yyyy" value="{{ $to }}">
                            <span class="input-icon-addon fs-16 text-gray-9">
                                <i class="isax isax-calendar-2"></i>
                            </span>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="isax isax-filter me-1"></i>Filtrer
                        </button>
                        <a href="{{ route('bo.reports.sales') }}" class="btn btn-outline-white">Réinitialiser</a>
                    </div>
                </form>
            </div>

            <!-- Charts -->
            <div class="row mb-3">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Évolution du chiffre d'affaires</h6>
                        </div>
                        <div class="card-body">
                            <div id="sales_revenue_chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Répartition par statut</h6>
                        </div>
                        <div class="card-body">
                            <div id="sales_status_chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Customers -->
            @if ($topCustomers->count() > 0)
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">Top 10 clients</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topCustomers as $index => $tc)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $tc->customer?->name ?? '-' }}</td>
                                            <td class="text-dark">{{ number_format($tc->total, 2, ',', ' ') }}
                                                {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Table List -->
            <div class="table-responsive">
                <table class="table table-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>N° Facture</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Payé</th>
                            <th>Restant</th>
                            <th class="no-sort">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $invoice)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="text-default">{{ $invoice->number }}</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $invoice->customer?->name ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $invoice->issue_date?->format('d/m/Y') }}</td>
                                <td class="text-dark">{{ number_format($invoice->total, 2, ',', ' ') }}
                                    {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td class="text-dark">{{ number_format($invoice->amount_paid, 2, ',', ' ') }}
                                    {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td class="text-dark">{{ number_format($invoice->amount_due, 2, ',', ' ') }}
                                    {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td>
                                    @switch($invoice->status)
                                        @case('paid')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Payée <i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('sent')
                                        @case('partial')
                                            <span
                                                class="badge badge-soft-warning d-inline-flex align-items-center">{{ ucfirst($invoice->status) }}
                                                <i class="isax isax-timer ms-1"></i></span>
                                        @break

                                        @case('overdue')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">En retard <i
                                                    class="isax isax-close-circle ms-1"></i></span>
                                        @break

                                        @default
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">{{ ucfirst($invoice->status) }}</span>
                                    @endswitch
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Aucune facture trouvée pour cette période.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @include('backoffice.components.table-footer', ['paginator' => $invoices])

                @component('backoffice.components.footer')
                @endcomponent
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var currency = '{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}';
                var monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

                // Revenue by month bar chart
                var revenueEl = document.querySelector('#sales_revenue_chart');
                if (revenueEl) {
                    var labels = {!! json_encode($byMonth->pluck('month')) !!};
                    var data = {!! json_encode($byMonth->pluck('revenue')->map(fn($v) => (float) $v)) !!};
                    var formattedLabels = labels.map(function(m) {
                        var parts = m.split('-');
                        return monthNames[parseInt(parts[1]) - 1] + ' ' + parts[0];
                    });
                    new ApexCharts(revenueEl, {
                        chart: {
                            type: 'bar',
                            height: 300,
                            toolbar: {
                                show: false
                            },
                            fontFamily: 'inherit'
                        },
                        series: [{
                            name: "Chiffre d'affaires",
                            data: data
                        }],
                        xaxis: {
                            categories: formattedLabels
                        },
                        yaxis: {
                            labels: {
                                formatter: function(val) {
                                    return val >= 1000 ? (val / 1000).toFixed(0) + 'k' : val.toFixed(0);
                                }
                            }
                        },
                        colors: ['#2563eb'],
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                columnWidth: '50%'
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val.toLocaleString('fr-FR', {
                                        minimumFractionDigits: 2
                                    }) + ' ' + currency;
                                }
                            }
                        },
                        grid: {
                            borderColor: '#f1f1f1'
                        }
                    }).render();
                }

                // Invoice status donut
                var statusEl = document.querySelector('#sales_status_chart');
                if (statusEl) {
                    var breakdown = @json($statusBreakdown->map(fn($s) => (int) $s->count));
                    var statusLabels = {
                        draft: 'Brouillon',
                        sent: 'Envoyée',
                        partial: 'Partielle',
                        paid: 'Payée',
                        overdue: 'En retard',
                        cancelled: 'Annulée',
                        void: 'Annulée'
                    };
                    var statusColors = {
                        draft: '#6c757d',
                        sent: '#0dcaf0',
                        partial: '#ffc107',
                        paid: '#198754',
                        overdue: '#dc3545',
                        cancelled: '#adb5bd',
                        void: '#adb5bd'
                    };
                    var chartLabels = [],
                        chartData = [],
                        chartColors = [];
                    for (var key in breakdown) {
                        chartLabels.push(statusLabels[key] || key);
                        chartData.push(breakdown[key]);
                        chartColors.push(statusColors[key] || '#6c757d');
                    }
                    new ApexCharts(statusEl, {
                        chart: {
                            type: 'donut',
                            height: 300,
                            fontFamily: 'inherit'
                        },
                        series: chartData,
                        labels: chartLabels,
                        colors: chartColors,
                        legend: {
                            position: 'bottom'
                        },
                        dataLabels: {
                            enabled: true
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '65%'
                                }
                            }
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                }
                            }
                        }]
                    }).render();
                }
            });
        </script>
    @endpush
