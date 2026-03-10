<?php $page = 'loans'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Prêts</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'loans'])
                    <div>
                        <a href="{{ route('bo.finance.loans.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouveau prêt
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
                                    placeholder="Rechercher un prêt..." value="{{ request('search') }}">
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
                                <i class="isax isax-filter me-1"></i>Statut : <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('active')
                                            Actif
                                        @break

                                        @case('completed')
                                            Terminé
                                        @break

                                        @case('defaulted')
                                            Défaut
                                        @break

                                        @default
                                            Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.finance.loans.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">Tous</a></li>
                                <li><a href="{{ route('bo.finance.loans.index', array_merge(request()->except('page'), ['status' => 'active'])) }}"
                                        class="dropdown-item">Actif</a></li>
                                <li><a href="{{ route('bo.finance.loans.index', array_merge(request()->except('page'), ['status' => 'completed'])) }}"
                                        class="dropdown-item">Terminé</a></li>
                                <li><a href="{{ route('bo.finance.loans.index', array_merge(request()->except('page'), ['status' => 'defaulted'])) }}"
                                        class="dropdown-item">Défaut</a></li>
                            </ul>
                        </div>
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
                            <th>Référence</th>
                            <th>Prêteur</th>
                            <th>Montant principal</th>
                            <th>Taux d'intérêt</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Solde restant</th>
                            <th class="no-sort">Statut</th>
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
                                    {{ $loan->lender_name }}
                                    <br><small
                                        class="text-muted">{{ $loan->lender_type === 'bank' ? 'Banque' : ($loan->lender_type === 'institution' ? 'Institution' : 'Particulier') }}</small>
                                </td>
                                <td class="fw-semibold">{{ number_format($loan->principal_amount, 2, ',', ' ') }}</td>
                                <td>{{ $loan->interest_rate }}% <small
                                        class="text-muted">{{ $loan->interest_type === 'fixed' ? 'Fixe' : 'Variable' }}</small>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($loan->start_date)->format('d/m/Y') }}</td>
                                <td>{{ $loan->end_date ? \Carbon\Carbon::parse($loan->end_date)->format('d/m/Y') : '—' }}
                                </td>
                                <td class="fw-semibold">{{ number_format($loan->remaining_balance, 2, ',', ' ') }}</td>
                                <td>
                                    @switch($loan->status)
                                        @case('active')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Actif</span>
                                        @break

                                        @case('completed')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">Terminé</span>
                                        @break

                                        @case('defaulted')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Défaut</span>
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
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.finance.loans.edit', $loan) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('bo.finance.loans.destroy', $loan) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce prêt ?')">
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

            @include('backoffice.components.table-footer', ['paginator' => $loans])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
