<?php $page = 'invoices'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
          Start Page Content
         ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Factures') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'invoices'])
                    <div>
                        <a href="{{ route('bo.sales.invoices.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouvelle facture') }}</a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Summary Cards -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Total factures') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ number_format($invoices->total(), 0, ',', ' ') }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-primary rounded-circle">
                                        <i class="isax isax-receipt-item"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Toutes les factures') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-01.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Payées') }}</p>
                                    <h6 class="fs-16 fw-semibold text-success">
                                        {{ \App\Models\Sales\Invoice::where('status', 'paid')->count() }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-success rounded-circle">
                                        <i class="isax isax-tick-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Factures payées') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-02.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('En attente') }}</p>
                                    <h6 class="fs-16 fw-semibold text-warning">
                                        {{ \App\Models\Sales\Invoice::whereIn('status', ['sent', 'partial'])->count() }}
                                    </h6>
                                </div>
                                <div>
                                    <span class="avatar bg-warning rounded-circle">
                                        <i class="isax isax-timer"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Factures en attente') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-03.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('En retard') }}</p>
                                    <h6 class="fs-16 fw-semibold text-danger">
                                        {{ \App\Models\Sales\Invoice::where('status', 'overdue')->count() }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-danger rounded-circle">
                                        <i class="isax isax-information"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Factures en retard') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-04.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Summary Cards -->

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.sales.invoices.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher une facture...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if (request('status'))
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Statut') }} : <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('draft')
                                            {{ __('Brouillon') }}
                                        @break

                                        @case('sent')
                                            {{ __('Envoyée') }}
                                        @break

                                        @case('partial')
                                            {{ __('Partielle') }}
                                        @break

                                        @case('paid')
                                            {{ __('Payée') }}
                                        @break

                                        @case('overdue')
                                            {{ __('En retard') }}
                                        @break

                                        @case('void')
                                            {{ __('Annulée') }}
                                        @break

                                        @default
                                            {{ __('Tous') }}
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.sales.invoices.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.sales.invoices.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}"
                                        class="dropdown-item">{{ __('Brouillon') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.sales.invoices.index', array_merge(request()->except('page'), ['status' => 'sent'])) }}"
                                        class="dropdown-item">{{ __('Envoyée') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.sales.invoices.index', array_merge(request()->except('page'), ['status' => 'partial'])) }}"
                                        class="dropdown-item">{{ __('Partiellement payée') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.sales.invoices.index', array_merge(request()->except('page'), ['status' => 'paid'])) }}"
                                        class="dropdown-item">{{ __('Payée') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.sales.invoices.index', array_merge(request()->except('page'), ['status' => 'overdue'])) }}"
                                        class="dropdown-item">{{ __('En retard') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.sales.invoices.index', array_merge(request()->except('page'), ['status' => 'void'])) }}"
                                        class="dropdown-item">{{ __('Annulée') }}</a>
                                </li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('N°'), __('Client'), __('Date'), __('Échéance'), __('Total'), __('Payé'), __('Statut')],
                        ])
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List -->
            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="no-sort">{{ __('N°') }}</th>
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Échéance') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th>{{ __('Payé') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('bo.sales.invoices.show', $invoice) }}"
                                        class="link-default">{{ $invoice->number }}</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2 flex-shrink-0">
                                            {{ strtoupper(substr($invoice->customer->name ?? '?', 0, 1)) }}
                                        </span>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $invoice->customer->name ?? '—' }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $invoice->issue_date?->format('d/m/Y') }}</td>
                                <td>{{ $invoice->due_date?->format('d/m/Y') ?? '—' }}</td>
                                <td class="text-dark">{{ number_format($invoice->total, 2, ',', ' ') }}
                                    {{ $invoice->currency }}</td>
                                <td>{{ number_format($invoice->amount_paid, 2, ',', ' ') }} {{ $invoice->currency }}</td>
                                <td>
                                    @switch($invoice->status)
                                        @case('draft')
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">{{ __('Brouillon') }}</span>
                                        @break

                                        @case('sent')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('Envoyée') }} <i
                                                    class="isax isax-send-2 ms-1"></i></span>
                                        @break

                                        @case('partial')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('Partielle') }} <i
                                                    class="isax isax-money-3 ms-1"></i></span>
                                        @break

                                        @case('paid')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Payée') }} <i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('overdue')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('En retard') }} <i
                                                    class="isax isax-information ms-1"></i></span>
                                        @break

                                        @case('void')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Annulée') }} <i
                                                    class="isax isax-close-circle ms-1"></i></span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.sales.invoices.show', $invoice) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        @if ($invoice->status === 'draft')
                                            <li>
                                                <a href="{{ route('bo.sales.invoices.edit', $invoice) }}"
                                                    class="dropdown-item d-flex align-items-center"><i
                                                        class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                            </li>
                                        @endif
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.sales.invoices.destroy', $invoice) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __("Êtes-vous sûr de vouloir supprimer cette facture ?") }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</button>
                                            </form>
                                        </li>
                                        @if ($invoice->status === 'draft')
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('bo.sales.invoices.send', $invoice) }}">
                                                    @csrf
                                                    <button class="dropdown-item d-flex align-items-center"
                                                        type="submit">
                                                        <i class="isax isax-send-2 me-2"></i>{{ __('Envoyer') }}</button>
                                                </form>
                                            </li>
                                        @endif
                                        @if (in_array($invoice->status, ['draft', 'sent', 'partial', 'overdue']))
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('bo.sales.invoices.void', $invoice) }}">
                                                    @csrf
                                                    <button class="dropdown-item d-flex align-items-center text-danger"
                                                        type="submit"
                                                        onclick="return confirm('{{ __("Êtes-vous sûr de vouloir annuler cette facture ?") }}')">
                                                        <i class="isax isax-close-circle me-2"></i>{{ __('Annuler') }}</button>
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $invoices])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
          End Page Content
         ========================= -->
@endsection
