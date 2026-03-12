<?php $page = 'supplier-payments'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Paiements fournisseurs</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', [
                        'exportType' => 'supplier-payments',
                    ])
                    <div>
                        <a href="{{ route('bo.purchases.supplier-payments.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouveau paiement
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
                        <form action="{{ route('bo.purchases.supplier-payments.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Rechercher un paiement..." value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                'Référence',
                                'Fournisseur',
                                'Facture',
                                'Montant',
                                'Date de paiement',
                                'Statut',
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
                            <th>Référence</th>
                            <th>Fournisseur</th>
                            <th>Facture</th>
                            <th>Montant</th>
                            <th>Date de paiement</th>
                            <th class="no-sort">Statut</th>
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
                                <td><span class="fw-medium">{{ $payment->reference_number ?? '—' }}</span></td>
                                <td>{{ $payment->supplier->name ?? '—' }}</td>
                                <td>{{ $payment->allocations->pluck('vendorBill.number')->filter()->implode(', ') ?: '—' }}</td>
                                <td class="fw-semibold">{{ number_format($payment->amount, 2, ',', ' ') }}</td>
                                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}</td>
                                <td>
                                    @switch($payment->status)
                                        @case('succeeded')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Réussi</span>
                                        @break

                                        @case('pending')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">En attente</span>
                                        @break

                                        @case('failed')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Échoué</span>
                                        @break

                                        @case('refunded')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">Remboursé</span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-secondary d-inline-flex align-items-center">Annulé</span>
                                        @break

                                        @default
                                            <span class="badge badge-soft-secondary d-inline-flex align-items-center">{{ ucfirst($payment->status) }}</span>
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.purchases.supplier-payments.show', $payment) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.purchases.supplier-payments.edit', $payment) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.purchases.supplier-payments.destroy', $payment) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce paiement ?')">
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

            @include('backoffice.components.table-footer', ['paginator' => $payments])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
