<?php $page = 'loans'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Prêts')
@section('description', 'Liste de tous les prêts')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Prêts') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'loans'])
                    <div>
                        <a href="{{ route('bo.finance.loans.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau prêt') }}
                        </a>
                    </div>
                </div>
            </div>

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

            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.finance.loans.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un prêt...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Type :') }} <span class="fw-normal ms-1">
                                    @switch(request('loan_type'))
                                        @case('received')
                                            {{ __('Reçu') }}
                                        @break
                                        @case('given')
                                            {{ __('Donné') }}
                                        @break
                                        @default
                                            {{ __('Tous') }}
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.finance.loans.index', request()->except('loan_type', 'page')) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a></li>
                                <li><a href="{{ route('bo.finance.loans.index', array_merge(request()->except('page'), ['loan_type' => 'received'])) }}"
                                        class="dropdown-item">{{ __('Reçu') }}</a></li>
                                <li><a href="{{ route('bo.finance.loans.index', array_merge(request()->except('page'), ['loan_type' => 'given'])) }}"
                                        class="dropdown-item">{{ __('Donné') }}</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Statut :') }} <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('active')
                                            {{ __('Actif') }}
                                        @break

                                        @case('closed')
                                            {{ __('Terminé') }}
                                        @break

                                        @case('defaulted')
                                            {{ __('Défaut') }}
                                        @break

                                        @default
                                            {{ __('Tous') }}
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.finance.loans.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a></li>
                                <li><a href="{{ route('bo.finance.loans.index', array_merge(request()->except('page'), ['status' => 'active'])) }}"
                                        class="dropdown-item">{{ __('Actif') }}</a></li>
                                <li><a href="{{ route('bo.finance.loans.index', array_merge(request()->except('page'), ['status' => 'closed'])) }}"
                                        class="dropdown-item">{{ __('Terminé') }}</a></li>
                                <li><a href="{{ route('bo.finance.loans.index', array_merge(request()->except('page'), ['status' => 'defaulted'])) }}"
                                        class="dropdown-item">{{ __('Défaut') }}</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                __('Référence'),
                                __('Type'),
                                __('Prêteur / Emprunteur'),
                                __('Montant principal'),
                                __('Date début'),
                                __('Date fin'),
                                __('Solde restant'),
                                __('Statut'),
                            ],
                        ])
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>{{ __('Référence') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Prêteur / Emprunteur') }}</th>
                            <th>{{ __('Montant principal') }}</th>
                            <th>{{ __('Date début') }}</th>
                            <th>{{ __('Date fin') }}</th>
                            <th>{{ __('Solde restant') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td><span class="fw-medium">{{ $loan->reference_number }}</span></td>
                                <td>
                                    @if ($loan->loan_type === 'given')
                                        <span class="badge badge-soft-primary">{{ __('Donné') }}</span>
                                    @else
                                        <span class="badge badge-soft-warning">{{ __('Reçu') }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $loan->lender_name }}
                                    <br><small
                                        class="text-muted">{{ $loan->lender_type === 'bank' ? __('Banque') : ($loan->lender_type === 'personal' ? __('Particulier') : __('Autre')) }}</small>
                                </td>
                                <td class="fw-semibold">{{ number_format($loan->principal_amount, 2, ',', ' ') }}</td>
                                <td>{{ \Carbon\Carbon::parse($loan->start_date)->format('d/m/Y') }}</td>
                                <td>{{ $loan->end_date ? \Carbon\Carbon::parse($loan->end_date)->format('d/m/Y') : '—' }}
                                </td>
                                <td class="fw-semibold">{{ number_format($loan->remaining_balance, 2, ',', ' ') }}</td>
                                <td>
                                    @switch($loan->status)
                                        @case('active')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Actif') }}</span>
                                        @break

                                        @case('closed')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('Terminé') }}</span>
                                        @break

                                        @case('defaulted')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Défaut') }}</span>
                                        @break

                                        @default
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">{{ ucfirst($loan->status) }}</span>
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.finance.loans.show', $loan) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.finance.loans.edit', $loan) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('bo.finance.loans.destroy', $loan) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce prêt ?') }}')">
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

            @include('backoffice.components.table-footer', ['paginator' => $loans])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
