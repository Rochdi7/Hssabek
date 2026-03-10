<?php $page = 'customers-report'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- Based on customers-report.blade.php layout -->

    <div class="page-wrapper">

        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6 class="mb-0">Rapport des clients</h6>
                </div>
                <div class="my-xl-auto">
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="isax isax-export-1 me-1"></i>Exporter
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);">Télécharger en PDF</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);">Télécharger en Excel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="border-bottom mb-3">
                <!-- start row -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div
                            class="card shadow-lg position-relative border-0 border-end border-bottom border-3 border-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <p class="mb-1">Total clients</p>
                                        <h6 class="fs-16 fw-semibold mb-0">{{ number_format($totalCustomers) }}</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-primary p-2 rounded-circle border border-primary">
                                            <i class="isax isax-profile-2user fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <p class="fs-13 mb-0">
                                    <span class="text-muted">Tous les clients actifs</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div
                            class="card shadow-lg position-relative border-0 border-end border-bottom border-3 border-success">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <p class="mb-1">Nouveaux clients</p>
                                        <h6 class="fs-16 fw-semibold mb-0">{{ number_format($newCustomers) }}</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-success p-2 rounded-circle border border-success">
                                            <i class="isax isax-profile-2user fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <p class="fs-13 mb-0">
                                    <span class="text-muted">{{ $from }} - {{ $to }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div
                            class="card shadow-lg position-relative border-0 border-end border-bottom border-3 border-warning">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <p class="mb-1">Revenu total</p>
                                        <h6 class="fs-16 fw-semibold mb-0">{{ number_format($totalRevenue, 2, ',', ' ') }}
                                            {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-warning p-2 rounded-circle border border-warning">
                                            <i class="isax isax-dollar-circle fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <p class="fs-13 mb-0">
                                    <span class="text-muted">Période sélectionnée</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div
                            class="card shadow-lg position-relative border-0 border-end border-bottom border-3 border-info">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <p class="mb-1">Revenu moyen</p>
                                        <h6 class="fs-16 fw-semibold mb-0">{{ number_format($avgRevenue, 2, ',', ' ') }}
                                            {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-info p-2 rounded-circle border border-info">
                                            <i class="isax isax-dollar-circle fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                                <p class="fs-13 mb-0">
                                    <span class="text-muted">Par client</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <!-- Date Range Filter -->
            <div class="mb-3">
                <form method="GET" action="{{ route('bo.reports.customers') }}"
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
                        <a href="{{ route('bo.reports.customers') }}" class="btn btn-outline-white">Réinitialiser</a>
                    </div>
                </form>
            </div>

            <!-- Charts -->
            <div class="row mb-3">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Top 10 clients par revenu</h6>
                        </div>
                        <div class="card-body">
                            <div id="customers_top_chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Nouveaux clients par mois</h6>
                        </div>
                        <div class="card-body">
                            <div id="customers_new_chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table List -->
            <div class="table-responsive">
                <table class="table table-nowrap datatable">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>Client</th>
                            <th>Téléphone</th>
                            <th>Solde dû</th>
                            <th>Nb factures</th>
                            <th>Revenu total</th>
                            <th>Créé le</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">
                                                <a
                                                    href="{{ route('bo.crm.customers.show', $customer) }}">{{ $customer->name }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $customer->phone ?? '-' }}</td>
                                <td class="text-dark">{{ number_format($customer->total_due ?? 0, 2, ',', ' ') }}
                                    {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td>{{ $customer->invoices_count ?? 0 }}</td>
                                <td class="text-dark">{{ number_format($customer->total_revenue ?? 0, 2, ',', ' ') }}
                                    {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td>{{ $customer->created_at?->format('d/m/Y') }}</td>
                                <td>
                                    @if ($customer->status === 'active')
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Actif <i
                                                class="isax isax-tick-circle ms-1"></i></span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Inactif <i
                                                class="isax isax-close-circle ms-1"></i></span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Aucun client trouvé pour cette période.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $customers])

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

            // Top customers horizontal bar
            var topEl = document.querySelector('#customers_top_chart');
            if (topEl) {
                var names = {!! json_encode($topCustomersByRevenue->map(fn($c) => $c->customer?->name ?? '-')) !!};
                var values = {!! json_encode($topCustomersByRevenue->pluck('total')->map(fn($v) => (float) $v)) !!};
                new ApexCharts(topEl, {
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {
                            show: false
                        },
                        fontFamily: 'inherit'
                    },
                    series: [{
                        name: 'Revenu',
                        data: values
                    }],
                    xaxis: {
                        categories: names
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                            borderRadius: 4,
                            barHeight: '60%'
                        }
                    },
                    colors: ['#0dcaf0'],
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

            // New customers by month
            var newEl = document.querySelector('#customers_new_chart');
            if (newEl) {
                var labels = {!! json_encode($newCustomersByMonth->pluck('month')) !!};
                var data = {!! json_encode($newCustomersByMonth->pluck('count')->map(fn($v) => (int) $v)) !!};
                var formattedLabels = labels.map(function(m) {
                    var parts = m.split('-');
                    return monthNames[parseInt(parts[1]) - 1] + ' ' + parts[0];
                });
                new ApexCharts(newEl, {
                    chart: {
                        type: 'area',
                        height: 300,
                        toolbar: {
                            show: false
                        },
                        fontFamily: 'inherit'
                    },
                    series: [{
                        name: 'Nouveaux clients',
                        data: data
                    }],
                    xaxis: {
                        categories: formattedLabels
                    },
                    colors: ['#198754'],
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.4,
                            opacityTo: 0.1
                        }
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    dataLabels: {
                        enabled: false
                    },
                    grid: {
                        borderColor: '#f1f1f1'
                    }
                }).render();
            }
        });
    </script>
@endpush
