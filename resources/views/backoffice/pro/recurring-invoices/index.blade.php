<?php $page = 'recurring-invoices'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Factures récurrentes</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'recurring-invoices'])
                    <div>
                        <a href="{{ route('bo.pro.recurring-invoices.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouvelle récurrence
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
                        <form action="{{ route('bo.pro.recurring-invoices.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Rechercher par client..." value="{{ request('search') }}">
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

                                        @case('paused')
                                            En pause
                                        @break

                                        @case('cancelled')
                                            Annulé
                                        @break

                                        @default
                                            Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.pro.recurring-invoices.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">Tous</a></li>
                                <li><a href="{{ route('bo.pro.recurring-invoices.index', array_merge(request()->except('page'), ['status' => 'active'])) }}"
                                        class="dropdown-item">Actif</a></li>
                                <li><a href="{{ route('bo.pro.recurring-invoices.index', array_merge(request()->except('page'), ['status' => 'paused'])) }}"
                                        class="dropdown-item">En pause</a></li>
                                <li><a href="{{ route('bo.pro.recurring-invoices.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}"
                                        class="dropdown-item">Annulé</a></li>
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
                            <th>Client</th>
                            <th>Facture modèle</th>
                            <th>Intervalle</th>
                            <th>Prochaine exécution</th>
                            <th class="no-sort">Statut</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recurringInvoices as $ri)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>{{ $ri->customer->name ?? '—' }}</td>
                                <td>{{ $ri->templateInvoice->number ?? '—' }}</td>
                                <td>Tous les {{ $ri->every }}
                                    {{ $ri->interval === 'month' ? 'mois' : ($ri->interval === 'week' ? 'semaines' : ($ri->interval === 'year' ? 'ans' : $ri->interval)) }}
                                </td>
                                <td>{{ $ri->next_run_at ? \Carbon\Carbon::parse($ri->next_run_at)->format('d/m/Y') : '—' }}
                                </td>
                                <td>
                                    @switch($ri->status)
                                        @case('active')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Actif</span>
                                        @break

                                        @case('paused')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">En pause</span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Annulé</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown"><i
                                            class="isax isax-more"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('bo.pro.recurring-invoices.show', $ri) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>Voir</a></li>
                                        <li><a href="{{ route('bo.pro.recurring-invoices.edit', $ri) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a></li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.pro.recurring-invoices.destroy', $ri) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette récurrence ?')">
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

            @include('backoffice.components.table-footer', ['paginator' => $recurringInvoices])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
