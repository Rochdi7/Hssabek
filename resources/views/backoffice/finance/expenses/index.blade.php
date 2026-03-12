<?php $page = 'expenses'; ?>
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
                    <h6>Dépenses</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'expenses'])
                    <div>
                        <a href="{{ route('bo.finance.expenses.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouvelle dépense
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

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.finance.expenses.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Rechercher une dépense..." value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if (request('category_id'))
                                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                                @endif
                                @if (request('payment_status'))
                                    <input type="hidden" name="payment_status" value="{{ request('payment_status') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>Catégorie : <span
                                    class="fw-normal ms-1">{{ request('category_id') ? $categories->firstWhere('id', request('category_id'))?->name ?? 'Toutes' : 'Toutes' }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.finance.expenses.index', array_merge(request()->except('category_id', 'page'))) }}"
                                        class="dropdown-item">Toutes</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('bo.finance.expenses.index', array_merge(request()->except('page'), ['category_id' => $category->id])) }}"
                                            class="dropdown-item">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>Statut : <span class="fw-normal ms-1">
                                    @switch(request('payment_status'))
                                        @case('paid')
                                            Payée
                                        @break

                                        @case('unpaid')
                                            Impayée
                                        @break

                                        @case('partial')
                                            Partielle
                                        @break

                                        @default
                                            Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.finance.expenses.index', array_merge(request()->except('payment_status', 'page'))) }}"
                                        class="dropdown-item">Tous</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.expenses.index', array_merge(request()->except('page'), ['payment_status' => 'paid'])) }}"
                                        class="dropdown-item">Payée</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.expenses.index', array_merge(request()->except('page'), ['payment_status' => 'unpaid'])) }}"
                                        class="dropdown-item">Impayée</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.expenses.index', array_merge(request()->except('page'), ['payment_status' => 'partial'])) }}"
                                        class="dropdown-item">Partielle</a>
                                </li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                'N° Dépense',
                                'Date',
                                'Catégorie',
                                'Fournisseur',
                                'Montant',
                                'Payé',
                                'Reste',
                                'Mode de paiement',
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
                            <th>N° Dépense</th>
                            <th>Date</th>
                            <th>Catégorie</th>
                            <th>Fournisseur</th>
                            <th>Montant</th>
                            <th>Payé</th>
                            <th>Reste</th>
                            <th>Mode de paiement</th>
                            <th class="no-sort">Statut</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $expense->expense_number }}</span>
                                    @if ($expense->reference_number)
                                        <br><small class="text-muted">Réf: {{ $expense->reference_number }}</small>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($expense->expense_date)->format('d/m/Y') }}</td>
                                <td>{{ $expense->category->name ?? '—' }}</td>
                                <td>{{ $expense->supplier->name ?? '—' }}</td>
                                <td class="fw-semibold">{{ number_format($expense->amount, 2, ',', ' ') }}
                                    {{ $expense->currency }}</td>
                                <td class="text-success">{{ number_format($expense->paid_amount, 2, ',', ' ') }}
                                    {{ $expense->currency }}</td>
                                <td class="{{ $expense->remaining_amount > 0 ? 'text-danger' : 'text-success' }}">
                                    {{ number_format($expense->remaining_amount, 2, ',', ' ') }}
                                    {{ $expense->currency }}</td>
                                <td>
                                    @switch($expense->payment_mode)
                                        @case('cash')
                                            Espèces
                                        @break

                                        @case('bank_transfer')
                                            Virement
                                        @break

                                        @case('card')
                                            Carte
                                        @break

                                        @case('cheque')
                                            Chèque
                                        @break

                                        @default
                                            Autre
                                    @endswitch
                                </td>
                                <td>
                                    @switch($expense->payment_status)
                                        @case('paid')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Payée</span>
                                        @break

                                        @case('partial')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">Partielle</span>
                                        @break

                                        @default
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Impayée</span>
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.finance.expenses.show', $expense) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.finance.expenses.edit', $expense) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.finance.expenses.destroy', $expense) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette dépense ?')">
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

            @include('backoffice.components.table-footer', ['paginator' => $expenses])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
              End Page Content
             ========================= -->
@endsection
