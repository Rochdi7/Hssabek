<?php $page = 'bank-accounts'; ?>
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
                    <h6>{{ __('Comptes bancaires') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'bank-accounts'])
                    <div>
                        <a href="{{ route('bo.finance.bank-accounts.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau compte') }}
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
                        <form action="{{ route('bo.finance.bank-accounts.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un compte...') }}" value="{{ request('search') }}">
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
                                <i class="isax isax-filter me-1"></i>{{ __('Statut') }} : <span
                                    class="fw-normal ms-1">{{ request('status') === 'active' ? __('Actif') : (request('status') === 'inactive' ? __('Inactif') : __('Tous')) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.finance.bank-accounts.index', array_merge(request()->except('status', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.bank-accounts.index', array_merge(request()->except('page'), ['status' => 'active'])) }}"
                                        class="dropdown-item">{{ __('Actif') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.bank-accounts.index', array_merge(request()->except('page'), ['status' => 'inactive'])) }}"
                                        class="dropdown-item">{{ __('Inactif') }}</a>
                                </li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                __('Titulaire'),
                                __('N° de compte'),
                                __('Banque'),
                                __('Type'),
                                __('Devise'),
                                __('Solde actuel'),
                                __('Statut'),
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
                            <th>{{ __('Titulaire') }}</th>
                            <th>{{ __('N° de compte') }}</th>
                            <th>{{ __('Banque') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Devise') }}</th>
                            <th>{{ __('Solde actuel') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('bo.finance.bank-accounts.show', $account) }}"
                                            class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <span
                                                class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="isax isax-bank fs-12"></i>
                                            </span>
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a
                                                    href="{{ route('bo.finance.bank-accounts.show', $account) }}">{{ $account->account_holder_name }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $account->account_number }}</td>
                                <td>{{ $account->bank_name }}</td>
                                <td>
                                    @switch($account->account_type)
                                        @case('current')
                                            {{ __('Courant') }}
                                        @break

                                        @case('savings')
                                            {{ __('Épargne') }}
                                        @break

                                        @case('business')
                                            {{ __('Professionnel') }}
                                        @break

                                        @default
                                            {{ __('Autre') }}
                                    @endswitch
                                </td>
                                <td>{{ $account->currency }}</td>
                                <td class="fw-semibold">{{ number_format($account->current_balance, 2, ',', ' ') }}</td>
                                <td>
                                    @if ($account->is_active)
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Actif') }} <i
                                                class="isax isax-tick-circle ms-1"></i></span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Inactif') }}<i
                                                class="isax isax-close-circle ms-1"></i></span>
                                    @endif
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.finance.bank-accounts.show', $account) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.finance.bank-accounts.edit', $account) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.finance.bank-accounts.destroy', $account) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce compte bancaire ?') }}')">
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

            @include('backoffice.components.table-footer', ['paginator' => $accounts])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
              End Page Content
             ========================= -->
@endsection
