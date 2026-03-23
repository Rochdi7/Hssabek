<?php $page = 'incomes'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Revenus')
@section('description', 'Liste de tous les revenus')
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
                    <h6>{{ __('Revenus') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'incomes'])
                    <div>
                        <a href="{{ route('bo.finance.incomes.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau revenu') }}
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
                        <form action="{{ route('bo.finance.incomes.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un revenu...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if (request('category_id'))
                                    <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Catégorie :') }} <span
                                    class="fw-normal ms-1">{{ request('category_id') ? $categories->firstWhere('id', request('category_id'))?->name ?? __('Toutes') : __('Toutes') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.finance.incomes.index', array_merge(request()->except('category_id', 'page'))) }}"
                                        class="dropdown-item">{{ __('Toutes') }}</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('bo.finance.incomes.index', array_merge(request()->except('page'), ['category_id' => $category->id])) }}"
                                            class="dropdown-item">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                __('N° Revenu'),
                                __('Date'),
                                __('Catégorie'),
                                __('Client'),
                                __('Montant'),
                                __('Mode de paiement'),
                                __('Compte bancaire'),
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
                            <th>{{ __('N° Revenu') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Catégorie') }}</th>
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Montant') }}</th>
                            <th>{{ __('Mode de paiement') }}</th>
                            <th>{{ __('Compte bancaire') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $income->income_number }}</span>
                                    @if ($income->reference_number)
                                        <br><small class="text-muted">{{ __('Réf:') }} {{ $income->reference_number }}</small>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($income->income_date)->format('d/m/Y') }}</td>
                                <td>{{ $income->category->name ?? '—' }}</td>
                                <td>{{ $income->customer->name ?? '—' }}</td>
                                <td class="fw-semibold text-success">{{ number_format($income->amount, 2, ',', ' ') }}
                                    {{ $income->currency }}</td>
                                <td>
                                    @switch($income->payment_mode)
                                        @case('cash')
                                            {{ __('Espèces') }}
                                        @break

                                        @case('bank_transfer')
                                            {{ __('Virement') }}
                                        @break

                                        @case('card')
                                            {{ __('Carte') }}
                                        @break

                                        @case('cheque')
                                            {{ __('Chèque') }}
                                        @break

                                        @default
                                            {{ __('Autre') }}
                                    @endswitch
                                </td>
                                <td>{{ $income->bankAccount->bank_name ?? '—' }}</td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.finance.incomes.edit', $income) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.finance.incomes.destroy', $income) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce revenu ?') }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}
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

            @include('backoffice.components.table-footer', ['paginator' => $incomes])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
              End Page Content
             ========================= -->
@endsection
