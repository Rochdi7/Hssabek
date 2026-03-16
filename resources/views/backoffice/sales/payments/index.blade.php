<?php $page = 'payments'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Paiements') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'payments'])
                    <div>
                        <a href="{{ route('bo.sales.payments.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau paiement') }}</a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Table Search -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.sales.payments.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un paiement...') }}" value="{{ request('search') }}">
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

                                        @case('succeeded')
                                            {{ __('Réussi') }}
                                        @break

                                        @case('failed')
                                            {{ __('Échoué') }}
                                        @break

                                        @case('refunded')
                                            {{ __('Remboursé') }}
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
                                <li><a href="{{ route('bo.sales.payments.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a></li>
                                <li><a href="{{ route('bo.sales.payments.index', array_merge(request()->except('page'), ['status' => 'succeeded'])) }}"
                                        class="dropdown-item">{{ __('Réussi') }}</a></li>
                                <li><a href="{{ route('bo.sales.payments.index', array_merge(request()->except('page'), ['status' => 'pending'])) }}"
                                        class="dropdown-item">{{ __('En attente') }}</a></li>
                                <li><a href="{{ route('bo.sales.payments.index', array_merge(request()->except('page'), ['status' => 'failed'])) }}"
                                        class="dropdown-item">{{ __('Échoué') }}</a></li>
                                <li><a href="{{ route('bo.sales.payments.index', array_merge(request()->except('page'), ['status' => 'refunded'])) }}"
                                        class="dropdown-item">{{ __('Remboursé') }}</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Client'), __('Date'), __('Méthode'), __('Référence'), __('Montant'), __('Statut')],
                        ])
                    </div>
                </div>
            </div>

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
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Méthode') }}</th>
                            <th>{{ __('Référence') }}</th>
                            <th>{{ __('Montant') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2 flex-shrink-0">
                                            {{ strtoupper(substr($payment->customer->name ?? '?', 0, 1)) }}
                                        </span>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $payment->customer->name ?? '—' }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $payment->payment_date?->format('d/m/Y') }}</td>
                                <td>{{ $payment->paymentMethod?->name ?? '—' }}</td>
                                <td>{{ $payment->reference_number ?? '—' }}</td>
                                <td class="text-dark">{{ number_format($payment->amount, 2, ',', ' ') }}
                                    {{ $payment->currency }}</td>
                                <td>
                                    @switch($payment->status)
                                        @case('succeeded')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Réussi') }} <i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('pending')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('En attente') }} <i
                                                    class="isax isax-timer ms-1"></i></span>
                                        @break

                                        @case('failed')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Échoué') }} <i
                                                    class="isax isax-close-circle ms-1"></i></span>
                                        @break

                                        @case('refunded')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('Remboursé') }} <i
                                                    class="isax isax-money-3 ms-1"></i></span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Annulé') }} <i
                                                    class="isax isax-close-circle ms-1"></i></span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.sales.payments.destroy', $payment) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __("Êtes-vous sûr de vouloir supprimer ce paiement ? Les allocations seront annulées.") }}')">
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

            @include('backoffice.components.table-footer', ['paginator' => $payments])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
