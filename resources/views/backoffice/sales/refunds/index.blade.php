<?php $page = 'refunds'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Remboursements') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'refunds'])
                    <div>
                        <a href="{{ route('bo.sales.refunds.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau remboursement') }}</a>
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
                        <form action="{{ route('bo.sales.refunds.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un remboursement...') }}" value="{{ request('search') }}">
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
                                        @case('pending')
                                            {{ __('En attente') }}
                                        @break

                                        @case('completed')
                                            {{ __('Complété') }}
                                        @break

                                        @case('failed')
                                            {{ __('Échoué') }}
                                        @break

                                        @default
                                            Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.sales.refunds.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a></li>
                                <li><a href="{{ route('bo.sales.refunds.index', array_merge(request()->except('page'), ['status' => 'pending'])) }}"
                                        class="dropdown-item">{{ __('En attente') }}</a></li>
                                <li><a href="{{ route('bo.sales.refunds.index', array_merge(request()->except('page'), ['status' => 'completed'])) }}"
                                        class="dropdown-item">{{ __('Complété') }}</a></li>
                                <li><a href="{{ route('bo.sales.refunds.index', array_merge(request()->except('page'), ['status' => 'failed'])) }}"
                                        class="dropdown-item">{{ __('Échoué') }}</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Paiement'), __('Client'), __('Montant'), __('Date'), __('Réf. fournisseur'), __('Statut')],
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
                            <th>{{ __('Paiement') }}</th>
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Montant') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Réf. fournisseur') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($refunds as $refund)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td><span class="fw-medium">{{ $refund->payment->reference_number ?? '—' }}</span></td>
                                <td>{{ $refund->payment->customer->name ?? '—' }}</td>
                                <td class="fw-semibold">{{ number_format($refund->amount, 2, ',', ' ') }}</td>
                                <td>{{ $refund->refunded_at ? \Carbon\Carbon::parse($refund->refunded_at)->format('d/m/Y') : '—' }}
                                </td>
                                <td>{{ $refund->provider_refund_id ?? '—' }}</td>
                                <td>
                                    @switch($refund->status)
                                        @case('pending')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('En
                                                attente') }}</span>
                                        @break

                                        @case('completed')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Complété') }}</span>
                                        @break

                                        @case('failed')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Échoué') }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.sales.refunds.show', $refund) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.sales.refunds.edit', $refund) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('bo.sales.refunds.destroy', $refund) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __("Êtes-vous sûr de vouloir supprimer ce remboursement ?") }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $refunds])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
