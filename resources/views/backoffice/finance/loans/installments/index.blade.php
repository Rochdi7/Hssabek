<?php $page = 'loans'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.finance.loans.show', $loan) }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Retour au prêt') }}</a></h6>
                        </div>

                        <div class="card">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">{{ __('Échéancier') }} — {{ $loan->reference_number ?? $loan->lender_name }}</h5>
                                <div class="d-flex gap-2">
                                    @if($loan->installments->isEmpty() || $loan->installments->where('status', 'paid')->isEmpty())
                                        <form method="POST" action="{{ route('bo.finance.loans.installments.generate', $loan) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-primary"
                                                onclick="return confirm('{{ __("Régénérer l\'échéancier ? Les échéances non payées seront recalculées.") }}')">
                                                <i class="isax isax-refresh me-1"></i>{{ __("Générer l'échéancier") }}
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- Loan summary --}}
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <div class="border rounded p-3 text-center">
                                            <p class="text-muted mb-1 fs-13">{{ __('Montant total') }}</p>
                                            <h5 class="mb-0">{{ number_format($loan->total_amount, 2, ',', ' ') }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="border rounded p-3 text-center">
                                            <p class="text-muted mb-1 fs-13">{{ __('Solde restant') }}</p>
                                            <h5 class="mb-0 text-danger">{{ number_format($loan->remaining_balance, 2, ',', ' ') }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="border rounded p-3 text-center">
                                            <p class="text-muted mb-1 fs-13">{{ __('Échéances payées') }}</p>
                                            <h5 class="mb-0 text-success">{{ $loan->installments->where('status', 'paid')->count() }} / {{ $loan->installments->count() }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="border rounded p-3 text-center">
                                            <p class="text-muted mb-1 fs-13">{{ __('En retard') }}</p>
                                            <h5 class="mb-0 {{ $loan->installments->where('status', 'overdue')->count() > 0 ? 'text-danger' : '' }}">
                                                {{ $loan->installments->where('status', 'overdue')->count() }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                {{-- Installments table --}}
                                <div class="table-responsive">
                                    <table class="table table-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N°</th>
                                                <th>{{ __('Date d\'échéance') }}</th>
                                                <th>{{ __('Principal') }}</th>
                                                <th>{{ __('Intérêts') }}</th>
                                                <th>{{ __('Total') }}</th>
                                                <th>{{ __('Payé') }}</th>
                                                <th>{{ __('Restant') }}</th>
                                                <th>{{ __('Statut') }}</th>
                                                <th class="text-end">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($loan->installments as $installment)
                                                <tr>
                                                    <td>{{ $installment->installment_number }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($installment->due_date)->format('d/m/Y') }}</td>
                                                    <td>{{ number_format($installment->principal_amount, 2, ',', ' ') }}</td>
                                                    <td>{{ number_format($installment->interest_amount, 2, ',', ' ') }}</td>
                                                    <td class="fw-semibold">{{ number_format($installment->total_amount, 2, ',', ' ') }}</td>
                                                    <td>{{ number_format($installment->paid_amount, 2, ',', ' ') }}</td>
                                                    <td>{{ number_format($installment->remaining_amount, 2, ',', ' ') }}</td>
                                                    <td>
                                                        @switch($installment->status)
                                                            @case('paid')
                                                                <span class="badge badge-soft-success">{{ __('Payée') }}</span>
                                                                @break
                                                            @case('partial')
                                                                <span class="badge badge-soft-info">{{ __('Partiel') }}</span>
                                                                @break
                                                            @case('pending')
                                                                <span class="badge badge-soft-warning">{{ __('En attente') }}</span>
                                                                @break
                                                            @case('overdue')
                                                                <span class="badge badge-soft-danger">{{ __('En retard') }}</span>
                                                                @break
                                                        @endswitch
                                                    </td>
                                                    <td class="text-end">
                                                        @if(in_array($installment->status, ['pending', 'partial', 'overdue']))
                                                            <button type="button"
                                                                class="btn btn-sm btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#payModal-{{ $installment->id }}">
                                                                <i class="isax isax-money-send me-1"></i>{{ __('Payer') }}
                                                            </button>
                                                        @else
                                                            <span class="text-muted fs-13">
                                                                @if($installment->paid_at)
                                                                    {{ __('Payée le') }} {{ \Carbon\Carbon::parse($installment->paid_at)->format('d/m/Y') }}
                                                                @endif
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center text-muted py-4">
                                                        {{ __("Aucune échéance n'a été générée pour ce prêt.") }}
                                                        <br>
                                                        <small>{{ __('Cliquez sur "Générer l\'échéancier" pour créer les échéances.') }}</small>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>

    {{-- Payment modals --}}
    @foreach($loan->installments->whereIn('status', ['pending', 'partial', 'overdue']) as $installment)
        <div class="modal fade" id="payModal-{{ $installment->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('bo.finance.loans.installments.pay', [$loan, $installment]) }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __("Payer l'échéance n°") }}{{ $installment->installment_number }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label text-muted">{{ __('Montant dû') }}</label>
                                <p class="fw-semibold">{{ number_format($installment->remaining_amount, 2, ',', ' ') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Montant à payer') }} <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" min="0.01"
                                    max="{{ $installment->remaining_amount }}"
                                    class="form-control" name="amount"
                                    value="{{ $installment->remaining_amount }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Date de paiement') }} <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="payment_date"
                                    value="{{ now()->format('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Notes') }}</label>
                                <textarea class="form-control" name="notes" rows="2" placeholder="{{ __('Notes optionnelles...') }}"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="isax isax-tick-circle me-1"></i>{{ __('Enregistrer le paiement') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
