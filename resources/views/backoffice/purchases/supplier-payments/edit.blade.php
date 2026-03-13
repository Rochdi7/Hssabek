<?php $page = 'supplier-payments'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.purchases.supplier-payments.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Paiements fournisseurs') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Modifier le paiement fournisseur') }}</h5>

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

                                <form action="{{ route('bo.purchases.supplier-payments.update', $supplierPayment) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Détails du paiement') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Fournisseur') }}</label>
                                                <input type="text" class="form-control" value="{{ $supplierPayment->supplier->name ?? '—' }}" readonly disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Montant') }}<span class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    name="amount" value="{{ old('amount', $supplierPayment->amount) }}">
                                                @error('amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date de paiement') }}<span class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control datetimepicker @error('paid_at') is-invalid @enderror"
                                                    name="paid_at" value="{{ old('paid_at', $supplierPayment->payment_date?->format('d-m-Y')) }}">
                                                @error('paid_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mode de paiement') }}</label>
                                                <select class="form-select @error('payment_method_id') is-invalid @enderror"
                                                    name="payment_method_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($paymentMethods as $method)
                                                        <option value="{{ $method->id }}"
                                                            {{ old('payment_method_id', $supplierPayment->payment_method_id) == $method->id ? 'selected' : '' }}>
                                                            {{ $method->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('payment_method_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Compte bancaire') }}</label>
                                                <select class="form-select @error('bank_account_id') is-invalid @enderror"
                                                    name="bank_account_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($bankAccounts as $bankAccount)
                                                        <option value="{{ $bankAccount->id }}"
                                                            data-balance="{{ number_format($bankAccount->current_balance, 2, ',', ' ') }}"
                                                            data-currency="{{ $bankAccount->currency }}"
                                                            {{ old('bank_account_id', $supplierPayment->bank_account_id) == $bankAccount->id ? 'selected' : '' }}>
                                                            {{ $bankAccount->bank_name }} —
                                                            {{ $bankAccount->account_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <small class="text-muted bank-balance-info mt-1 d-block" style="display:none;"></small>
                                                @error('bank_account_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Référence') }}</label>
                                                <input type="text"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number" value="{{ old('reference_number', $supplierPayment->reference_number) }}">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Notes') }}</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes', $supplierPayment->notes) }}</textarea>
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    @if ($supplierPayment->allocations && $supplierPayment->allocations->count())
                                        <div class="border-top pt-3 mb-3">
                                            <h6 class="mb-3">{{ __('Allocations existantes') }}</h6>
                                            <div class="table-responsive rounded border-bottom-0 border mb-3">
                                                <table class="table table-nowrap m-0">
                                                    <thead style="background-color: #1B2850; color: #fff;">
                                                        <tr>
                                                            <th>{{ __('Facture') }}</th>
                                                            <th>{{ __('Montant alloué') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($supplierPayment->allocations as $allocation)
                                                            <tr>
                                                                <td>{{ $allocation->vendorBill->number ?? $allocation->vendorBill->id ?? '—' }}</td>
                                                                <td>{{ number_format($allocation->amount_applied, 2, ',', ' ') }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.purchases.supplier-payments.show', $supplierPayment) }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer les modifications') }}</button>
                                    </div>
                                </form>
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
