<?php $page = 'expenses'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails de la Dépense')
@section('description', 'Consulter les détails de la dépense')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.finance.expenses.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Dépenses') }}</a></h6>
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

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5>{{ __('Dépense') }} — {{ $expense->expense_number }}</h5>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('bo.finance.expenses.edit', $expense) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="isax isax-edit me-1"></i>{{ __('Modifier') }}
                                        </a>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-4">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Date de la dépense') }}</label>
                                        <p class="fw-medium mb-0">
                                            {{ \Carbon\Carbon::parse($expense->expense_date)->format('d/m/Y') }}</p>
                                    </div>
                                    @if ($expense->reference_number)
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <label class="form-label text-muted">{{ __('Numéro de référence') }}</label>
                                            <p class="fw-medium mb-0">{{ $expense->reference_number }}</p>
                                        </div>
                                    @endif
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Catégorie') }}</label>
                                        <p class="fw-medium mb-0">{{ $expense->category->name ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Fournisseur') }}</label>
                                        <p class="fw-medium mb-0">{{ $expense->supplier->name ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Mode de paiement') }}</label>
                                        <p class="fw-medium mb-0">
                                            @switch($expense->payment_mode)
                                                @case('cash') {{ __('Espèces') }} @break
                                                @case('bank_transfer') {{ __('Virement bancaire') }} @break
                                                @case('card') {{ __('Carte') }} @break
                                                @case('cheque') {{ __('Chèque') }} @break
                                                @default {{ __('Autre') }}
                                            @endswitch
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Statut') }}</label>
                                        <p class="mb-0">
                                            @switch($expense->payment_status)
                                                @case('paid')
                                                    <span class="badge badge-soft-success">{{ __('Payée') }}</span>
                                                @break
                                                @case('partial')
                                                    <span class="badge badge-soft-warning">{{ __('Partielle') }}</span>
                                                @break
                                                @default
                                                    <span class="badge badge-soft-danger">{{ __('Impayée') }}</span>
                                            @endswitch
                                        </p>
                                    </div>
                                </div>

                                <!-- Payment Summary -->
                                <div class="row gx-3 mb-4">
                                    <div class="col-12">
                                        <div class="card bg-light border-0">
                                            <div class="card-body py-3">
                                                <div class="row text-center">
                                                    <div class="col-md-4">
                                                        <label class="form-label text-muted mb-1">{{ __('Montant total') }}</label>
                                                        <p class="fw-bold fs-5 mb-0">
                                                            {{ number_format($expense->amount, 2, ',', ' ') }}
                                                            {{ $expense->currency }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label text-muted mb-1">{{ __('Montant payé') }}</label>
                                                        <p class="fw-bold fs-5 mb-0 text-success">
                                                            {{ number_format($expense->paid_amount, 2, ',', ' ') }}
                                                            {{ $expense->currency }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label text-muted mb-1">{{ __('Reste à payer') }}</label>
                                                        <p class="fw-bold fs-5 mb-0 {{ $expense->remaining_amount > 0 ? 'text-danger' : 'text-success' }}">
                                                            {{ number_format($expense->remaining_amount, 2, ',', ' ') }}
                                                            {{ $expense->currency }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($expense->description)
                                    <div class="mb-4">
                                        <label class="form-label text-muted">{{ __('Description') }}</label>
                                        <p>{{ $expense->description }}</p>
                                    </div>
                                @endif

                                <!-- Payment History -->
                                @if ($expense->payments->count())
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="mb-0">{{ __('Historique des paiements') }}</h6>
                                    </div>
                                    <div class="table-responsive mb-4">
                                        <table class="table table-nowrap">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>{{ __('N°') }}</th>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Montant') }}</th>
                                                    <th>{{ __('Mode') }}</th>
                                                    <th>{{ __('Compte bancaire') }}</th>
                                                    <th>{{ __('Note') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($expense->payments->sortBy('payment_date') as $index => $payment)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}</td>
                                                        <td class="fw-semibold">
                                                            {{ number_format($payment->amount, 2, ',', ' ') }}
                                                            {{ $expense->currency }}
                                                        </td>
                                                        <td>
                                                            @switch($payment->payment_mode)
                                                                @case('cash') {{ __('Espèces') }} @break
                                                                @case('bank_transfer') {{ __('Virement') }} @break
                                                                @case('card') {{ __('Carte') }} @break
                                                                @case('cheque') {{ __('Chèque') }} @break
                                                                @default {{ __('Autre') }}
                                                            @endswitch
                                                        </td>
                                                        <td>{{ $payment->bankAccount?->bank_name ?? '—' }}</td>
                                                        <td>{{ $payment->note ?? '—' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                                <!-- Add Payment Form (only if remaining > 0) -->
                                @if ($expense->remaining_amount > 0)
                                    <div class="border-top pt-4">
                                        <h6 class="mb-3">{{ __('Ajouter un paiement') }}</h6>

                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            </div>
                                        @endif

                                        <form action="{{ route('bo.finance.expenses.payments.store', $expense) }}" method="POST">
                                            @csrf
                                            <div class="row gx-3">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Montant') }} <span class="text-danger ms-1">*</span></label>
                                                        <input type="number" step="0.01" min="0.01"
                                                            max="{{ $expense->remaining_amount }}"
                                                            class="form-control @error('amount') is-invalid @enderror"
                                                            name="amount"
                                                            value="{{ old('amount', $expense->remaining_amount) }}"
                                                            id="payment_amount_input"
                                                            oninput="calculateNewReste()">
                                                        @error('amount')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        <small class="text-muted">
                                                            {{ __('Max :') }} <strong>{{ number_format($expense->remaining_amount, 2, ',', ' ') }}</strong>
                                                            {{ $expense->currency }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Date du paiement') }} <span class="text-danger ms-1">*</span></label>
                                                        <div class="input-group position-relative">
                                                            <input type="text"
                                                                class="form-control datetimepicker @error('payment_date') is-invalid @enderror"
                                                                name="payment_date"
                                                                value="{{ old('payment_date', date('d-m-Y')) }}">
                                                            <span class="input-icon-addon fs-16 text-gray-9">
                                                                <i class="isax isax-calendar-2"></i>
                                                            </span>
                                                        </div>
                                                        @error('payment_date')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Mode de paiement') }} <span class="text-danger ms-1">*</span></label>
                                                        <select class="form-select @error('payment_mode') is-invalid @enderror"
                                                            name="payment_mode">
                                                            <option value="cash" {{ old('payment_mode') === 'cash' ? 'selected' : '' }}>{{ __('Espèces') }}</option>
                                                            <option value="bank_transfer" {{ old('payment_mode') === 'bank_transfer' ? 'selected' : '' }}>{{ __('Virement bancaire') }}</option>
                                                            <option value="card" {{ old('payment_mode') === 'card' ? 'selected' : '' }}>{{ __('Carte') }}</option>
                                                            <option value="cheque" {{ old('payment_mode') === 'cheque' ? 'selected' : '' }}>{{ __('Chèque') }}</option>
                                                            <option value="other" {{ old('payment_mode') === 'other' ? 'selected' : '' }}>{{ __('Autre') }}</option>
                                                        </select>
                                                        @error('payment_mode')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Compte bancaire') }}</label>
                                                        <select class="form-select @error('bank_account_id') is-invalid @enderror"
                                                            name="bank_account_id">
                                                            <option value="">{{ __('— Sélectionner —') }}</option>
                                                            @foreach ($bankAccounts as $bankAccount)
                                                                <option value="{{ $bankAccount->id }}"
                                                                    data-balance="{{ number_format($bankAccount->current_balance, 2, ',', ' ') }}"
                                                                    data-currency="{{ $bankAccount->currency }}"
                                                                    {{ old('bank_account_id') == $bankAccount->id ? 'selected' : '' }}>
                                                                    {{ $bankAccount->bank_name }} — {{ $bankAccount->account_number }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <small class="text-muted bank-balance-info mt-1 d-block" style="display:none;"></small>
                                                        @error('bank_account_id')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('Note') }}</label>
                                                        <input type="text"
                                                            class="form-control @error('note') is-invalid @enderror"
                                                            name="note" value="{{ old('note') }}"
                                                            placeholder="{{ __('Note optionnelle...') }}">
                                                        @error('note')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('&nbsp;') }}</label>
                                                        <div>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="isax isax-money-send me-1"></i>{{ __('Enregistrer le paiement') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="border-top pt-4">
                                        <div class="alert alert-success mb-0">
                                            <i class="isax isax-tick-circle me-2"></i>{{ __('Cette dépense est entièrement payée.') }}
                                        </div>
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

@push('scripts')
    <script>
        function calculateNewReste() {
            var remaining = {{ $expense->remaining_amount }};
            var paymentAmount = parseFloat(document.getElementById('payment_amount_input').value) || 0;
            var newReste = Math.max(0, remaining - paymentAmount);
            // Visual feedback could be added here if needed
        }
    </script>
@endpush
