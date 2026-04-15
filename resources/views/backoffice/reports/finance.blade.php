<?php $page = 'expense-report'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Rapport Financier')
@section('description', 'Analyser la situation financière')
@section('content')
    <!-- Based on expense-report.blade.php layout -->

    <div class="page-wrapper">
        <!-- Start Content -->
        <div class="content content-two">

            <!-- Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6 class="mb-0">{{ __('Rapport financier') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-1">
                        <a href="javascript:void(0);" class="btn btn-outline-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="isax isax-export-1 me-1"></i>{{ __('Exporter') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item" type="button" id="exportBtn"
                                    data-url="{{ route('bo.reports.finance.export') }}"
                                    data-from="{{ $from }}" data-to="{{ $to }}">
                                    {{ __('Télécharger en CSV') }}
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->

            @if (session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">{{ __('Total revenus') }}</p>
                                    <h6 class="fs-16 fw-semibold mb-0">{{ number_format($totalIncome, 2, ',', ' ') }}
                                        {{ $currency }}</h6>
                                </div>
                                <div>
                                    <span
                                        class="badge badge-soft-success report-icon avatar-md border border-success rounded p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="isax isax-dollar-circle fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="bg-light py-2 px-3 rounded">
                                <p class="fs-13 mb-0">
                                    <span class="text-muted">{{ $from }} - {{ $to }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">{{ __('Total dépenses') }}</p>
                                    <h6 class="fs-16 fw-semibold mb-0">{{ number_format($totalExpenses, 2, ',', ' ') }}
                                        {{ $currency }}</h6>
                                </div>
                                <div>
                                    <span
                                        class="badge badge-soft-danger report-icon avatar-md border border-danger rounded p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="isax isax-dollar-circle fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="bg-light py-2 px-3 rounded">
                                <p class="fs-13 mb-0">
                                    <span class="text-muted">{{ __('Période sélectionnée') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">{{ __('Bénéfice net') }}</p>
                                    <h6
                                        class="fs-16 fw-semibold mb-0 {{ $netProfit >= 0 ? 'text-success' : 'text-danger' }}">
                                        {{ number_format($netProfit, 2, ',', ' ') }}
                                        {{ $currency }}</h6>
                                </div>
                                <div>
                                    <span
                                        class="badge badge-soft-{{ $netProfit >= 0 ? 'primary' : 'warning' }} report-icon avatar-md border border-{{ $netProfit >= 0 ? 'primary' : 'warning' }} rounded p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="isax isax-chart fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="bg-light py-2 px-3 rounded">
                                <p class="fs-13 mb-0">
                                    <span class="text-muted">{{ __('Revenus - Dépenses') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div>
                                    <p class="mb-1">{{ __('Catégories dépenses') }}</p>
                                    <h6 class="fs-16 fw-semibold mb-0">{{ $expensesByCategory->count() }}</h6>
                                </div>
                                <div>
                                    <span
                                        class="badge badge-soft-info report-icon avatar-md border border-info rounded p-2 d-inline-flex align-items-center justify-content-center">
                                        <i class="isax isax-grid-3 fs-16"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="bg-light py-2 px-3 rounded">
                                <p class="fs-13 mb-0">
                                    <span class="text-muted">{{ __('Catégories actives') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Date Range Filter -->
            <div class="mb-3">
                <form method="GET" action="{{ route('bo.reports.finance') }}"
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
                            <i class="isax isax-filter me-1"></i>{{ __('Filtrer') }}
                        </button>
                        <a href="{{ route('bo.reports.finance') }}" class="btn btn-outline-white">{{ __('Réinitialiser') }}</a>
                    </div>
                </form>
            </div>

            <!-- Charts -->
            <div class="row mb-3">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">{{ __('Revenus vs Dépenses par mois') }}</h6>
                        </div>
                        <div class="card-body">
                            <div id="finance_monthly_chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">{{ __('Dépenses par catégorie') }}</h6>
                        </div>
                        <div class="card-body">
                            <div id="finance_category_chart" style="min-height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Expenses by Category -->
            @if ($expensesByCategory->count() > 0)
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('Dépenses par catégorie') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Catégorie') }}</th>
                                        <th>{{ __('Total') }}</th>
                                        <th>{{ __('% du total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expensesByCategory as $cat)
                                        <tr>
                                            <td>{{ $cat->category?->name ?? __('Non catégorisé') }}</td>
                                            <td class="text-dark">{{ number_format($cat->total, 2, ',', ' ') }}
                                                {{ $currency }}
                                            </td>
                                            <td>{{ $totalExpenses > 0 ? number_format(($cat->total / $totalExpenses) * 100, 1) : 0 }}%
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Incomes by Category -->
            @if ($incomesByCategory->count() > 0)
                <div class="card mb-3">
                    <div class="card-header">
                        <h6 class="mb-0">{{ __('Revenus par catégorie') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>{{ __('Catégorie') }}</th>
                                        <th>{{ __('Total') }}</th>
                                        <th>{{ __('% du total') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incomesByCategory as $cat)
                                        <tr>
                                            <td>{{ $cat->category?->name ?? __('Non catégorisé') }}</td>
                                            <td class="text-dark">{{ number_format($cat->total, 2, ',', ' ') }}
                                                {{ $currency }}
                                            </td>
                                            <td>{{ $totalIncome > 0 ? number_format(($cat->total / $totalIncome) * 100, 1) : 0 }}%
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Expense Detail Table -->
            <div class="table-responsive">
                <table class="table table-nowrap datatable">
                    <thead>
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>{{ __('N° Dépense') }}</th>
                            <th>{{ __('Catégorie') }}</th>
                            <th>{{ __('Fournisseur') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Montant') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($expenses as $expense)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="text-default">{{ $expense->expense_number }}</a>
                                </td>
                                <td>{{ $expense->category?->name ?? '-' }}</td>
                                <td>{{ $expense->supplier?->name ?? '-' }}</td>
                                <td>{{ $expense->expense_date?->format('d/m/Y') }}</td>
                                <td class="text-dark">{{ number_format($expense->amount, 2, ',', ' ') }}
                                    {{ $currency }}</td>
                                <td>
                                    @switch($expense->payment_status)
                                        @case('paid')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Payée') }} <i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('pending')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('En attente') }} <i
                                                    class="isax isax-timer ms-1"></i></span>
                                        @break

                                        @default
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">{{ ucfirst($expense->payment_status) }}</span>
                                    @endswitch
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">{{ __('Aucune dépense trouvée pour cette période.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @include('backoffice.components.table-footer', ['paginator' => $expenses])

                @component('backoffice.components.footer')
                @endcomponent
            </div>
        </div>
    {{-- Export Progress Overlay --}}
    <div id="exportOverlay" class="d-none position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="z-index: 9999; background: rgba(0,0,0,0.4);">
        <div class="bg-white rounded-3 p-4 shadow-lg text-center" style="min-width: 350px;">
            <div class="mb-3">
                <i class="isax isax-document-download fs-1 text-primary"></i>
            </div>
            <h6 class="fw-semibold mb-2">{{ __('Export en cours...') }}</h6>
            <p class="text-muted small mb-3">{{ __('Votre fichier CSV est en cours de préparation.') }}</p>
            <div class="progress" style="height: 6px;">
                <div id="exportProgressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width: 0%"></div>
            </div>
        </div>
    </div>

    @endsection

    @push('scripts')
        <script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var currency = '{{ $currency }}';
                var monthNames = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'];

                // Income vs Expenses grouped bar chart
                var monthlyEl = document.querySelector('#finance_monthly_chart');
                if (monthlyEl) {
                    var incomeLabels = {!! json_encode($incomesByMonth->pluck('month')) !!};
                    var incomeData = {!! json_encode($incomesByMonth->pluck('total')->map(fn($v) => (float) $v)) !!};
                    var expenseLabels = {!! json_encode($expensesByMonth->pluck('month')) !!};
                    var expenseData = {!! json_encode($expensesByMonth->pluck('total')->map(fn($v) => (float) $v)) !!};

                    // Merge all months
                    var allMonths = [...new Set([...incomeLabels, ...expenseLabels])].sort();
                    var incomeMap = {};
                    incomeLabels.forEach(function(m, i) {
                        incomeMap[m] = incomeData[i];
                    });
                    var expenseMap = {};
                    expenseLabels.forEach(function(m, i) {
                        expenseMap[m] = expenseData[i];
                    });

                    var formattedLabels = allMonths.map(function(m) {
                        var parts = m.split('-');
                        return monthNames[parseInt(parts[1]) - 1] + ' ' + parts[0];
                    });
                    var incomeSeries = allMonths.map(function(m) {
                        return incomeMap[m] || 0;
                    });
                    var expenseSeries = allMonths.map(function(m) {
                        return expenseMap[m] || 0;
                    });

                    new ApexCharts(monthlyEl, {
                        chart: {
                            type: 'bar',
                            height: 300,
                            toolbar: {
                                show: false
                            },
                            fontFamily: 'inherit'
                        },
                        series: [{
                                name: {!! json_encode(__('Revenus')) !!},
                                data: incomeSeries
                            },
                            {
                                name: {!! json_encode(__('Dépenses')) !!},
                                data: expenseSeries
                            }
                        ],
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
                        colors: ['#198754', '#dc3545'],
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                columnWidth: '60%'
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
                        },
                        legend: {
                            position: 'top'
                        }
                    }).render();
                }

                // Expense category donut
                var catEl = document.querySelector('#finance_category_chart');
                if (catEl) {
                    var catNames = {!! json_encode($expensesByCategory->map(fn($c) => $c->category?->name ?? __('Non catégorisé'))) !!};
                    var catValues = {!! json_encode($expensesByCategory->pluck('total')->map(fn($v) => (float) $v)) !!};
                    if (catValues.length > 0) {
                        new ApexCharts(catEl, {
                            chart: {
                                type: 'donut',
                                height: 300,
                                fontFamily: 'inherit'
                            },
                            series: catValues,
                            labels: catNames,
                            colors: ['#2563eb', '#dc3545', '#ffc107', '#198754', '#0dcaf0', '#6f42c1',
                                '#fd7e14', '#6c757d', '#d63384', '#20c997'
                            ],
                            legend: {
                                position: 'bottom',
                                fontSize: '12px'
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
                }
            });
        </script>
        <script>
            (function() {
                const btn = document.getElementById('exportBtn');
                const overlay = document.getElementById('exportOverlay');
                const bar = document.getElementById('exportProgressBar');

                if (!btn) return;

                btn.addEventListener('click', function() {
                    overlay.classList.remove('d-none');
                    overlay.classList.add('d-flex');

                    let width = 5;
                    bar.style.width = width + '%';
                    const interval = setInterval(function() {
                        if (width < 85) {
                            width += Math.random() * 12;
                            if (width > 85) width = 85;
                            bar.style.width = width + '%';
                        }
                    }, 200);

                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    if (btn.dataset.from) formData.append('from', btn.dataset.from);
                    if (btn.dataset.to) formData.append('to', btn.dataset.to);

                    fetch(btn.dataset.url, { method: 'POST', body: formData })
                        .then(function(resp) {
                            if (!resp.ok) throw new Error('Erreur serveur');
                            const cd = resp.headers.get('Content-Disposition') || '';
                            const match = cd.match(/filename="?([^"]+)"?/);
                            const filename = match ? match[1] : 'export.csv';
                            return resp.blob().then(function(blob) { return { blob: blob, filename: filename }; });
                        })
                        .then(function(result) {
                            clearInterval(interval);
                            bar.style.width = '100%';

                            const url = URL.createObjectURL(result.blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = result.filename;
                            document.body.appendChild(a);
                            a.click();
                            a.remove();
                            URL.revokeObjectURL(url);

                            setTimeout(function() {
                                overlay.classList.add('d-none');
                                overlay.classList.remove('d-flex');
                                bar.style.width = '0%';
                            }, 500);
                        })
                        .catch(function() {
                            clearInterval(interval);
                            overlay.classList.add('d-none');
                            overlay.classList.remove('d-flex');
                            bar.style.width = '0%';
                            alert('Erreur lors de l\'export. Veuillez réessayer.');
                        });
                });
            })();
        </script>
    @endpush
