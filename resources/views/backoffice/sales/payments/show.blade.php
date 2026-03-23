<?php $page = 'payments'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Paiement')
@section('description', 'Consulter les détails du paiement')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.sales.payments.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Paiements') }}</a></h6>
                            <div class="d-flex gap-2">
                                <a href="{{ route('bo.sales.payments.download', $payment) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                                <a href="{{ route('bo.sales.payments.edit', $payment) }}"
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
                                <h6 class="mb-3">{{ __('Détails du paiement') }}</h6>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-muted fw-medium" style="width: 40%;">{{ __('Référence') }}</td>
                                                <td>{{ $payment->reference_number ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Client') }}</td>
                                                <td>{{ $payment->customer->name ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Méthode') }}</td>
                                                <td>{{ $payment->paymentMethod->name ?? '—' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-muted fw-medium" style="width: 40%;">{{ __('Montant') }}</td>
                                                <td class="fw-bold">{{ number_format($payment->amount, 2, ',', ' ') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Date') }}</td>
                                                <td>{{ $payment->payment_date?->format('d/m/Y') ?? '—' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted fw-medium">{{ __('Statut') }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $payment->status === 'completed' ? 'success' : ($payment->status === 'pending' ? 'warning' : 'secondary') }}">
                                                        {{ ucfirst($payment->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                @if ($payment->notes)
                                    <div class="mb-3">
                                        <label class="form-label text-muted fw-medium">{{ __('Notes') }}</label>
                                        <p>{{ $payment->notes }}</p>
                                    </div>
                                @endif

                                @if ($payment->allocations && $payment->allocations->count())
                                    <h6 class="mb-3 mt-4">{{ __('Allocations aux factures') }}</h6>
                                    <div class="table-responsive rounded border mb-3">
                                        <table class="table table-nowrap m-0">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th>{{ __('Facture') }}</th>
                                                    <th>{{ __('Montant alloué') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payment->allocations as $allocation)
                                                    <tr>
                                                        <td>
                                                            @if ($allocation->invoice)
                                                                <a
                                                                    href="{{ route('bo.sales.invoices.show', $allocation->invoice) }}">{{ $allocation->invoice->number }}</a>
                                                            @else
                                                                —
                                                            @endif
                                                        </td>
                                                        <td>{{ number_format($allocation->amount_applied, 2, ',', ' ') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
