<?php $page = 'vendor-bills'; ?>
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
                    <h6>Factures fournisseur</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'vendor-bills'])
                    <div>
                        <a href="{{ route('bo.purchases.vendor-bills.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouvelle facture fournisseur
                        </a>
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

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.purchases.vendor-bills.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Rechercher une facture fournisseur..." value="{{ request('search') }}">
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
                                <i class="isax isax-filter me-1"></i>Statut : <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('draft')
                                            Brouillon
                                        @break

                                        @case('posted')
                                            Validée
                                        @break

                                        @case('paid')
                                            Payée
                                        @break

                                        @case('void')
                                            Annulée
                                        @break

                                        @default
                                            Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.purchases.vendor-bills.index', array_merge(request()->except('status', 'page'))) }}"
                                        class="dropdown-item">Tous</a></li>
                                <li><a href="{{ route('bo.purchases.vendor-bills.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}"
                                        class="dropdown-item">Brouillon</a></li>
                                <li><a href="{{ route('bo.purchases.vendor-bills.index', array_merge(request()->except('page'), ['status' => 'posted'])) }}"
                                        class="dropdown-item">Validée</a></li>
                                <li><a href="{{ route('bo.purchases.vendor-bills.index', array_merge(request()->except('page'), ['status' => 'paid'])) }}"
                                        class="dropdown-item">Payée</a></li>
                                <li><a href="{{ route('bo.purchases.vendor-bills.index', array_merge(request()->except('page'), ['status' => 'void'])) }}"
                                        class="dropdown-item">Annulée</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                'N°',
                                'Fournisseur',
                                "Date d'émission",
                                'Échéance',
                                'Total',
                                'Restant dû',
                                'Statut',
                            ],
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
                            <th>N°</th>
                            <th>Fournisseur</th>
                            <th>Date d'émission</th>
                            <th>Échéance</th>
                            <th>Total</th>
                            <th>Restant dû</th>
                            <th class="no-sort">Statut</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendorBills as $bill)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('bo.purchases.vendor-bills.show', $bill) }}"
                                        class="fw-medium">{{ $bill->number }}</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2">
                                            {{ strtoupper(substr($bill->supplier->name ?? '', 0, 1)) }}
                                        </span>
                                        {{ $bill->supplier->name ?? '—' }}
                                    </div>
                                </td>
                                <td>{{ $bill->issue_date->format('d/m/Y') }}</td>
                                <td>{{ $bill->due_date?->format('d/m/Y') ?? '—' }}</td>
                                <td class="text-dark fw-medium">{{ number_format($bill->total, 2, ',', ' ') }}
                                    {{ $bill->currency }}</td>
                                <td class="text-dark fw-medium">{{ number_format($bill->amount_due, 2, ',', ' ') }}
                                    {{ $bill->currency }}</td>
                                <td>
                                    @switch($bill->status)
                                        @case('draft')
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">Brouillon</span>
                                        @break

                                        @case('posted')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">Validée</span>
                                        @break

                                        @case('paid')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Payée <i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('void')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Annulée</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.purchases.vendor-bills.show', $bill) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                        @if ($bill->status === 'draft')
                                            <li>
                                                <a href="{{ route('bo.purchases.vendor-bills.edit', $bill) }}"
                                                    class="dropdown-item d-flex align-items-center"><i
                                                        class="isax isax-edit me-2"></i>Modifier</a>
                                            </li>
                                        @endif
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.purchases.vendor-bills.destroy', $bill) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette facture fournisseur ?')">
                                                    <i class="isax isax-trash me-2"></i>Supprimer
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $vendorBills])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
              End Page Content
             ========================= -->
@endsection
