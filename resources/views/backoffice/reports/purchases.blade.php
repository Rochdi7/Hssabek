<?php $page = 'purchases-report'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- Based on purchases-report.blade.php layout -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Start Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6 class="mb-0">Rapport des achats</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-1">
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
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-truncate">Total achats</p>
                                        <h6 class="fs-16 fw-semibold mb-0">{{ number_format($totalPurchases, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-primary report-icon avatar-md border border-primary rounded p-2 d-inline-flex align-items-center justify-content-center">
                                            <i class="isax isax-dollar-circle fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-truncate">Achats payés</p>
                                        <h6 class="fs-16 fw-semibold mb-0">{{ number_format($paidPurchases, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-success report-icon avatar-md border border-success rounded p-2 d-inline-flex align-items-center justify-content-center">
                                            <i class="isax isax-tick-circle fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-truncate">Achats en attente</p>
                                        <h6 class="fs-16 fw-semibold mb-0">{{ number_format($pendingPurchases, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-warning report-icon avatar-md border border-warning rounded p-2 d-inline-flex align-items-center justify-content-center">
                                            <i class="isax isax-timer fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card position-relative">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="mb-1 text-truncate">Achats annulés</p>
                                        <h6 class="fs-16 fw-semibold mb-0">{{ number_format($cancelledPurchases, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</h6>
                                    </div>
                                    <div>
                                        <span class="badge badge-soft-danger report-icon avatar-md border border-danger rounded p-2 d-inline-flex align-items-center justify-content-center">
                                            <i class="isax isax-close-circle fs-16"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <!-- Date Range Filter -->
            <div class="mb-3">
                <form method="GET" action="{{ route('bo.reports.purchases') }}" class="d-flex align-items-center gap-2 flex-wrap">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div>
                            <input type="date" name="from" class="form-control" value="{{ $from }}">
                        </div>
                        <div>
                            <input type="date" name="to" class="form-control" value="{{ $to }}">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="isax isax-filter me-1"></i>Filtrer
                        </button>
                        <a href="{{ route('bo.reports.purchases') }}" class="btn btn-outline-white">Réinitialiser</a>
                    </div>
                </form>
            </div>

            <!-- Charts -->
            <div class="row mb-3">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Évolution des achats par mois</h6>
                        </div>
                        <div class="card-body">
                            <div id="purchases_monthly_chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">Répartition par statut</h6>
                        </div>
                        <div class="card-body">
                            <div id="purchases_status_chart" style="min-height: 300px;"></div>
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
                            <th class="no-sort">N°</th>
                            <th>Date</th>
                            <th>Fournisseur</th>
                            <th>Total</th>
                            <th>Payé</th>
                            <th>Restant</th>
                            <th class="no-sort">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vendorBills as $bill)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="link-default">{{ $bill->number }}</a>
                                </td>
                                <td>{{ $bill->issue_date?->format('d/m/Y') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $bill->supplier?->name ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">{{ number_format($bill->total, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td class="text-dark">{{ number_format($bill->amount_paid, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td class="text-dark">{{ number_format($bill->amount_due, 2, ',', ' ') }} {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
                                <td>
                                    @switch($bill->status)
                                        @case('paid')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Payée <i class="isax isax-tick-circle ms-1"></i></span>
                                            @break
                                        @case('sent')
                                        @case('partial')
                                        @case('draft')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ ucfirst($bill->status) }} <i class="isax isax-timer ms-1"></i></span>
                                            @break
                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Annulée <i class="isax isax-close-circle ms-1"></i></span>
                                            @break
                                        @default
                                            <span class="badge badge-soft-secondary d-inline-flex align-items-center">{{ ucfirst($bill->status) }}</span>
                                    @endswitch
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Aucune facture fournisseur trouvée pour cette période.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($vendorBills->hasPages())
                <div class="mt-3">
                    {{ $vendorBills->links() }}
                </div>
            @endif

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var currency = '{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? "MAD" }}';
    var monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

    // Monthly purchases bar chart
    var monthlyEl = document.querySelector('#purchases_monthly_chart');
    if (monthlyEl) {
        var labels = {!! json_encode($purchasesByMonth->pluck('month')) !!};
        var data = {!! json_encode($purchasesByMonth->pluck('total')->map(fn($v) => (float)$v)) !!};
        var formattedLabels = labels.map(function(m) {
            var parts = m.split('-');
            return monthNames[parseInt(parts[1]) - 1] + ' ' + parts[0];
        });
        new ApexCharts(monthlyEl, {
            chart: { type: 'bar', height: 300, toolbar: { show: false }, fontFamily: 'inherit' },
            series: [{ name: 'Achats', data: data }],
            xaxis: { categories: formattedLabels },
            yaxis: { labels: { formatter: function(val) { return val >= 1000 ? (val / 1000).toFixed(0) + 'k' : val.toFixed(0); } } },
            colors: ['#dc3545'],
            plotOptions: { bar: { borderRadius: 4, columnWidth: '50%' } },
            dataLabels: { enabled: false },
            tooltip: { y: { formatter: function(val) { return val.toLocaleString('fr-FR', { minimumFractionDigits: 2 }) + ' ' + currency; } } },
            grid: { borderColor: '#f1f1f1' }
        }).render();
    }

    // Purchase status donut
    var statusEl = document.querySelector('#purchases_status_chart');
    if (statusEl) {
        var breakdown = @json($purchaseStatusBreakdown->map(fn($s) => (int)$s->count));
        var statusLabels = { draft: 'Brouillon', sent: 'Envoyée', partial: 'Partielle', paid: 'Payée', cancelled: 'Annulée', overdue: 'En retard' };
        var statusColors = { draft: '#6c757d', sent: '#0dcaf0', partial: '#ffc107', paid: '#198754', cancelled: '#adb5bd', overdue: '#dc3545' };
        var chartLabels = [], chartData = [], chartColors = [];
        for (var key in breakdown) {
            chartLabels.push(statusLabels[key] || key);
            chartData.push(breakdown[key]);
            chartColors.push(statusColors[key] || '#6c757d');
        }
        new ApexCharts(statusEl, {
            chart: { type: 'donut', height: 300, fontFamily: 'inherit' },
            series: chartData,
            labels: chartLabels,
            colors: chartColors,
            legend: { position: 'bottom' },
            dataLabels: { enabled: true },
            plotOptions: { pie: { donut: { size: '65%' } } },
            responsive: [{ breakpoint: 480, options: { chart: { width: 200 } } }]
        }).render();
    }
});
</script>
@endpush
