<?php $page = 'refunds'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Remboursement')
@section('description', 'Consulter les détails du remboursement')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.sales.refunds.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Remboursements') }}</a></h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('bo.sales.refunds.edit', $refund) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}</a>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-3">{{ __('Détails du remboursement') }}</h6>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-muted fw-medium" style="width: 40%;">{{ __('Réf. fournisseur') }}</td>
                                                <td>{{ $refund->provider_refund_id ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Paiement lié') }}</td>
                                                <td>
                                                    @if ($refund->payment)
                                                        <a href="{{ route('bo.sales.payments.show', $refund->payment) }}">{{ $refund->payment->reference_number ?? $refund->payment->id }}</a>
                                                    @else
                                                        —
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Client') }}</td>
                                                <td>{{ $refund->payment->customer->name ?? '—' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-muted fw-medium" style="width: 40%;">{{ __('Montant') }}</td>
                                                <td class="fw-bold">{{ number_format($refund->amount, 2, ',', ' ') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Date') }}</td>
                                                <td>{{ $refund->refunded_at?->format('d/m/Y') ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Statut') }}</td>
                                                <td>
                                                    @switch($refund->status)
                                                        @case('pending')
                                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('En attente') }}</span>
                                                        @break
                                                        @case('succeeded')
                                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Réussi') }}</span>
                                                        @break
                                                        @case('failed')
                                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Échoué') }}</span>
                                                        @break
                                                    @endswitch
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                @if ($refund->payment && $refund->payment->paymentMethod)
                                    <div class="mb-3">
                                        <label class="form-label text-muted fw-medium">{{ __('Méthode de paiement') }}</label>
                                        <p>{{ $refund->payment->paymentMethod->name }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
