<?php $page = 'money-transfers'; ?>
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
                    <h6>Transferts entre comptes</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'money-transfers'])
                    <div>
                        <a href="{{ route('bo.finance.money-transfers.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouveau transfert
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

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

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.finance.money-transfers.index') }}" method="GET" class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control" placeholder="Rechercher par référence..." value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset" onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if(request('status'))
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
                                <i class="isax isax-filter me-1"></i>Statut : <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('completed') Complété @break
                                        @case('pending') En attente @break
                                        @case('cancelled') Annulé @break
                                        @default Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.finance.money-transfers.index', array_merge(request()->except('status', 'page'))) }}" class="dropdown-item">Tous</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.money-transfers.index', array_merge(request()->except('page'), ['status' => 'completed'])) }}" class="dropdown-item">Complété</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.money-transfers.index', array_merge(request()->except('page'), ['status' => 'pending'])) }}" class="dropdown-item">En attente</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.money-transfers.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}" class="dropdown-item">Annulé</a>
                                </li>
                            </ul>
                        </div>
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
                            <th>Date</th>
                            <th>Compte source</th>
                            <th>Compte destination</th>
                            <th>Montant</th>
                            <th>Référence</th>
                            <th class="no-sort">Statut</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfers as $transfer)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($transfer->transfer_date)->format('d/m/Y') }}</td>
                                <td>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $transfer->fromBankAccount->bank_name ?? '—' }}</h6>
                                        <small class="text-muted">{{ $transfer->fromBankAccount->account_number ?? '' }}</small>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $transfer->toBankAccount->bank_name ?? '—' }}</h6>
                                        <small class="text-muted">{{ $transfer->toBankAccount->account_number ?? '' }}</small>
                                    </div>
                                </td>
                                <td class="fw-semibold">{{ number_format($transfer->amount, 2, ',', ' ') }}</td>
                                <td>{{ $transfer->reference_number ?? '—' }}</td>
                                <td>
                                    @switch($transfer->status)
                                        @case('completed')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Complété</span>
                                            @break
                                        @case('pending')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">En attente</span>
                                            @break
                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Annulé</span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.finance.money-transfers.show', $transfer) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $transfers])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
      End Page Content
     ========================= -->
@endsection
