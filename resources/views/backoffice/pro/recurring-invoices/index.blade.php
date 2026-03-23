<?php $page = 'recurring-invoices'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Factures Récurrentes')
@section('description', 'Gérer les factures récurrentes')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Factures récurrentes') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', [
                        'exportType' => 'recurring-invoices',
                    ])
                    <div>
                        <a href="{{ route('bo.pro.recurring-invoices.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouvelle récurrence') }}
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
                                    placeholder="{{ __('Rechercher par client...') }}" value="{{ request('search') }}">
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
                                <i class="isax isax-filter me-1"></i>{{ __('Statut') }} : <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('active')
                                            {{ __('Actif') }}
                                        @break

                                        @case('paused')
                                            {{ __('En pause') }}
                                        @break

                                        @case('cancelled')
                                            {{ __('Annulé') }}
                                        @break

                                        @default
                                            {{ __('Tous') }}
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.pro.recurring-invoices.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a></li>
                                <li><a href="{{ route('bo.pro.recurring-invoices.index', array_merge(request()->except('page'), ['status' => 'active'])) }}"
                                        class="dropdown-item">{{ __('Actif') }}</a></li>
                                <li><a href="{{ route('bo.pro.recurring-invoices.index', array_merge(request()->except('page'), ['status' => 'paused'])) }}"
                                        class="dropdown-item">{{ __('En pause') }}</a></li>
                                <li><a href="{{ route('bo.pro.recurring-invoices.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}"
                                        class="dropdown-item">{{ __('Annulé') }}</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                __('Client'),
                                __('Facture modèle'),
                                __('Intervalle'),
                                __('Prochaine exécution'),
                                __('Date de fin'),
                                __('Générées'),
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
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Facture modèle') }}</th>
                            <th>{{ __('Intervalle') }}</th>
                            <th>{{ __('Prochaine exécution') }}</th>
                            <th>{{ __('Date de fin') }}</th>
                            <th>{{ __('Générées') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recurringInvoices as $ri)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>{{ $ri->customer->name ?? '—' }}</td>
                                <td>{{ $ri->templateInvoice->number ?? '—' }}</td>
                                <td>{{ __('Tous les') }} {{ $ri->every }}
                                    {{ $ri->interval === 'month' ? __('mois') : ($ri->interval === 'week' ? __('semaines') : ($ri->interval === 'year' ? __('ans') : $ri->interval)) }}
                                </td>
                                <td>{{ $ri->next_run_at ? \Carbon\Carbon::parse($ri->next_run_at)->format('d/m/Y') : '—' }}
                                </td>
                                <td>{{ $ri->end_at ? \Carbon\Carbon::parse($ri->end_at)->format('d/m/Y') : __('Sans fin') }}
                                </td>
                                <td>{{ $ri->total_generated }}</td>
                                <td>
                                    @switch($ri->status)
                                        @case('active')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Actif') }}</span>
                                        @break

                                        @case('paused')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('En pause') }}</span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Annulé') }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown"><i
                                            class="isax isax-more"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('bo.pro.recurring-invoices.show', $ri) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a></li>
                                        <li><a href="{{ route('bo.pro.recurring-invoices.edit', $ri) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a></li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.pro.recurring-invoices.destroy', $ri) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette récurrence ?') }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">{{ __('Aucune facture récurrente trouvée.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $recurringInvoices])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
