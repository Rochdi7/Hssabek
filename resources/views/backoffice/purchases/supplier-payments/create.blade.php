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
                                <h5 class="mb-3">{{ __('Nouveau paiement fournisseur') }}</h5>

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

                                <form action="{{ route('bo.purchases.supplier-payments.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Détails du paiement') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Fournisseur') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('supplier_id') is-invalid @enderror"
                                                    name="supplier_id" id="supplier_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                            {{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('supplier_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                @if ($suppliers->isEmpty())
                                                    <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Aucun fournisseur trouvé.') }}<a href="{{ route('bo.purchases.suppliers.create') }}">{{ __('Créer un fournisseur') }}</a> avant de continuer.</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Montant') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    name="amount" value="{{ old('amount') }}">
                                                @error('amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date de paiement') }}<span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control datetimepicker @error('paid_at') is-invalid @enderror"
                                                    name="paid_at" value="{{ old('paid_at', date('d-m-Y')) }}">
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
                                                            {{ old('payment_method_id') == $method->id ? 'selected' : '' }}>
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
                                                            {{ old('bank_account_id') == $bankAccount->id ? 'selected' : '' }}>
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
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').value=''; document.getElementById('reference_number').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">{{ __('Saisie manuelle') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_auto" value="auto"
                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">{{ __('Générer automatiquement') }}</label>
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number" id="reference_number" value="{{ old('reference_number') }}">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Notes') }}</label>
                                                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes') }}</textarea>
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Allocations aux factures fournisseurs --}}
                                    <div class="border-top pt-3 mb-3">
                                        <h6 class="mb-3">{{ __('Allocation aux factures fournisseurs') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border mb-3">
                                            <table class="table table-nowrap m-0" id="allocations-table">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('Facture') }}</th>
                                                        <th>{{ __('Fournisseur') }}</th>
                                                        <th>{{ __('Total') }}</th>
                                                        <th>{{ __('Restant dû') }}</th>
                                                        <th>{{ __('Montant à allouer') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($vendorBills as $i => $bill)
                                                        <tr class="allocation-row" data-supplier-id="{{ $bill->supplier_id }}">
                                                            <td>
                                                                {{ $bill->number ?? $bill->id }}
                                                                <input type="hidden" name="allocations[{{ $i }}][vendor_bill_id]" value="{{ $bill->id }}" disabled>
                                                            </td>
                                                            <td>{{ $bill->supplier->name ?? '—' }}</td>
                                                            <td>{{ number_format($bill->total, 2, ',', ' ') }}</td>
                                                            <td>{{ number_format($bill->amount_due, 2, ',', ' ') }}</td>
                                                            <td>
                                                                <input type="number"
                                                                    name="allocations[{{ $i }}][amount_applied]"
                                                                    class="form-control allocation-amount"
                                                                    data-supplier-id="{{ $bill->supplier_id }}"
                                                                    min="0" max="{{ $bill->amount_due }}"
                                                                    step="0.01" value="0"
                                                                    style="min-width: 120px;" disabled>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @if($vendorBills->isEmpty())
                                                        <tr>
                                                            <td colspan="5" class="text-center text-muted py-3">{{ __('Aucune facture fournisseur en attente de paiement.') }} <a href="{{ route('bo.purchases.vendor-bills.create') }}">{{ __('Créer une facture fournisseur') }}</a></td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.purchases.supplier-payments.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer le paiement') }}</button>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const supplierSelect = document.getElementById('supplier_id');
        const rows = document.querySelectorAll('.allocation-row');

        function filterBills() {
            const supplierId = supplierSelect.value;
            rows.forEach(row => {
                const rowSupplierId = row.dataset.supplierId;
                const hiddenInput = row.querySelector('input[type="hidden"]');
                const amountInput = row.querySelector('.allocation-amount');

                if (!supplierId || rowSupplierId === supplierId) {
                    row.style.display = '';
                    hiddenInput.disabled = false;
                    amountInput.disabled = false;
                } else {
                    row.style.display = 'none';
                    hiddenInput.disabled = true;
                    amountInput.disabled = true;
                    amountInput.value = 0;
                }
            });
        }

        supplierSelect.addEventListener('change', filterBills);

        // On form submit, disable rows with amount = 0 to avoid empty allocations
        document.querySelector('form').addEventListener('submit', function() {
            rows.forEach(row => {
                const amountInput = row.querySelector('.allocation-amount');
                const hiddenInput = row.querySelector('input[type="hidden"]');
                if (parseFloat(amountInput.value) <= 0 || amountInput.disabled) {
                    hiddenInput.disabled = true;
                    amountInput.disabled = true;
                }
            });
        });

        filterBills();
    });
</script>
@endpush
