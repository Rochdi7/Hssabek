<?php $page = 'add-payment'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouveau Paiement')
@section('description', 'Enregistrer un nouveau paiement')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.sales.payments.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Paiements') }}</a></h6>
                        </div>

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

                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-3">{{ __('Enregistrer un paiement') }}</h6>
                                <form action="{{ route('bo.sales.payments.store') }}" method="POST">
                                    @csrf

                                    <div class="border-bottom mb-3 pb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Client') }} <span class="text-danger">*</span></label>
                                                    <select name="customer_id"
                                                        class="select @error('customer_id') is-invalid @enderror"
                                                        id="customer-select">
                                                        <option value="">{{ __('Sélectionner un client') }}</option>
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}"
                                                                {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                                {{ $customer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('customer_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    @if ($customers->isEmpty())
                                                        <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Aucun client trouvé.') }} <a href="{{ route('bo.crm.customers.create') }}">{{ __('Créer un client') }}</a> {{ __('avant de continuer.') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Méthode de paiement') }}</label>
                                                    <select name="payment_method_id"
                                                        class="select @error('payment_method_id') is-invalid @enderror">
                                                        <option value="">{{ __('Sélectionner') }}</option>
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
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Compte bancaire') }} <span class="text-danger">*</span></label>
                                                    <select name="bank_account_id"
                                                        class="select @error('bank_account_id') is-invalid @enderror" required>
                                                        <option value="">{{ __('Sélectionner un compte') }}</option>
                                                        @foreach ($bankAccounts as $account)
                                                            <option value="{{ $account->id }}"
                                                                {{ old('bank_account_id') == $account->id ? 'selected' : '' }}>
                                                                {{ $account->bank_name }} — {{ $account->account_number }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('bank_account_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Montant') }} <span class="text-danger">*</span></label>
                                                    <input type="number" name="amount"
                                                        class="form-control @error('amount') is-invalid @enderror"
                                                        value="{{ old('amount') }}" min="0.01" step="0.01" required>
                                                    @error('amount')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Devise') }}</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                        readonly disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Date de paiement') }} <span class="text-danger">*</span></label>
                                                    <div class="input-group position-relative">
                                                        <input type="text" name="payment_date"
                                                            class="form-control datetimepicker @error('payment_date') is-invalid @enderror"
                                                            value="{{ old('payment_date', date('d-m-Y')) }}"
                                                            placeholder="{{ now()->format('d M Y') }}" required>
                                                        <span class="input-icon-addon fs-16 text-gray-9">
                                                            <i class="isax isax-calendar-2"></i>
                                                        </span>
                                                    </div>
                                                    @error('payment_date')
                                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Référence') }}</label>
                                                    <div class="mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ref_mode"
                                                                id="ref_mode_manual" value="manual" checked
                                                                onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').value=''; document.getElementById('reference_number').focus();">
                                                            <label class="form-check-label" for="ref_mode_manual">{{ __('Saisie
                                                                manuelle') }}</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ref_mode"
                                                                id="ref_mode_auto" value="auto"
                                                                onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                            <label class="form-check-label" for="ref_mode_auto">{{ __('Générer
                                                                automatiquement') }}</label>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="reference_number" id="reference_number"
                                                        class="form-control @error('reference_number') is-invalid @enderror"
                                                        value="{{ old('reference_number') }}"
                                                        placeholder="{{ __('N° chèque, virement, etc.') }}">
                                                    @error('reference_number')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">{{ __('Notes') }}</label>
                                                    <input type="text" name="notes" class="form-control"
                                                        value="{{ old('notes') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-3 pb-3">
                                        <h6 class="mb-3">{{ __('Allocation aux factures') }} <span class="text-danger">*</span></h6>
                                        @error('allocations')
                                            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            </div>
                                        @enderror
                                        <div id="allocation-client-error" class="alert alert-warning mb-3 d-none">
                                            <i class="isax isax-warning-2 me-1"></i>{{ __('Veuillez saisir un montant à allouer pour au moins une facture.') }}
                                        </div>
                                        <div class="table-responsive rounded border-bottom-0 border mb-3">
                                            <table class="table table-nowrap m-0" id="allocation-table">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('Facture') }}</th>
                                                        <th>{{ __('Total') }}</th>
                                                        <th>{{ __('Restant dû') }}</th>
                                                        <th>{{ __('Montant à allouer') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="allocation-tbody">
                                                    <tr id="allocation-placeholder">
                                                        <td colspan="4" class="text-center text-muted py-3">
                                                            <i class="isax isax-info-circle me-1"></i>{{ __('Sélectionnez un client pour afficher ses factures en attente de paiement.') }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="text-muted fs-12">{{ __('Saisissez le montant à allouer pour chaque facture.') }}</p>
                                        <div id="no-invoices-msg" class="d-none">
                                            <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Aucune facture en attente de paiement pour ce client.') }} <a href="{{ route('bo.sales.invoices.create') }}">{{ __('Créer une facture') }}</a> {{ __("avant d'enregistrer un paiement.") }}</small>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ route('bo.sales.payments.index') }}"
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
            const customerSelect = document.getElementById('customer-select');
            const tbody = document.getElementById('allocation-tbody');
            const noInvoicesMsg = document.getElementById('no-invoices-msg');
            const allocationError = document.getElementById('allocation-client-error');
            const form = document.querySelector('form');
            const amountInput = document.querySelector('input[name="amount"]');

            function formatNumber(num) {
                return new Intl.NumberFormat('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(num);
            }

            function updateTotalAllocated() {
                let total = 0;
                document.querySelectorAll('.allocation-amount').forEach(function(inp) {
                    total += parseFloat(inp.value) || 0;
                });
                if (amountInput && total > 0) {
                    amountInput.value = total.toFixed(2);
                }
            }

            function loadInvoices(customerId) {
                allocationError.classList.add('d-none');

                if (!customerId) {
                    tbody.innerHTML = '<tr id="allocation-placeholder"><td colspan="4" class="text-center text-muted py-3"><i class="isax isax-info-circle me-1"></i>{{ __("Sélectionnez un client pour afficher ses factures en attente de paiement.") }}</td></tr>';
                    noInvoicesMsg.classList.add('d-none');
                    return;
                }

                tbody.innerHTML = '<tr><td colspan="4" class="text-center py-3"><span class="spinner-border spinner-border-sm me-2"></span>{{ __("Chargement des factures...") }}</td></tr>';
                noInvoicesMsg.classList.add('d-none');

                fetch("{{ url('/backoffice/sales/payments/customer-invoices') }}/" + customerId, {
                    headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(function(response) {
                    if (!response.ok) throw new Error('Network error');
                    return response.json();
                })
                .then(function(invoices) {
                    tbody.innerHTML = '';

                    if (invoices.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="4" class="text-center text-muted py-3"><i class="isax isax-info-circle me-1"></i>{{ __("Aucune facture en attente de paiement pour ce client.") }}</td></tr>';
                        noInvoicesMsg.classList.remove('d-none');
                        return;
                    }

                    noInvoicesMsg.classList.add('d-none');

                    invoices.forEach(function(inv, i) {
                        const tr = document.createElement('tr');
                        tr.innerHTML =
                            '<td>' + inv.number +
                                '<input type="hidden" name="allocations[' + i + '][invoice_id]" value="' + inv.id + '">' +
                            '</td>' +
                            '<td>' + formatNumber(inv.total) + '</td>' +
                            '<td>' + formatNumber(inv.amount_due) + '</td>' +
                            '<td>' +
                                '<input type="number" name="allocations[' + i + '][amount_applied]" ' +
                                    'class="form-control allocation-amount" value="" ' +
                                    'min="0" max="' + inv.amount_due + '" step="0.01" style="min-width: 120px;" ' +
                                    'placeholder="0,00">' +
                            '</td>';
                        tbody.appendChild(tr);
                    });

                    // Attach change listeners for auto-sum
                    document.querySelectorAll('.allocation-amount').forEach(function(inp) {
                        inp.addEventListener('input', updateTotalAllocated);
                    });
                })
                .catch(function() {
                    tbody.innerHTML = '<tr><td colspan="4" class="text-center text-danger py-3"><i class="isax isax-danger me-1"></i>{{ __("Erreur lors du chargement des factures. Veuillez réessayer.") }}</td></tr>';
                });
            }

            // Use jQuery .on('change') because Select2 triggers jQuery events, not native DOM events
            $('#customer-select').on('change', function() {
                loadInvoices($(this).val());
                // Reset amount when customer changes
                if (amountInput) amountInput.value = '';
            });

            // Load invoices if customer was pre-selected (e.g. validation error redirect)
            if (customerSelect.value) {
                loadInvoices(customerSelect.value);
            }

            // Client-side validation on form submit
            form.addEventListener('submit', function(e) {
                const inputs = document.querySelectorAll('.allocation-amount');
                let hasAllocation = false;
                let totalAllocated = 0;
                const paymentAmount = parseFloat(amountInput.value) || 0;

                inputs.forEach(function(inp) {
                    const val = parseFloat(inp.value) || 0;
                    if (val > 0) {
                        hasAllocation = true;
                        totalAllocated += val;
                    }
                });

                // No allocation filled
                if (!hasAllocation) {
                    e.preventDefault();
                    allocationError.classList.remove('d-none');
                    allocationError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }

                // Total allocated exceeds payment amount
                if (totalAllocated > paymentAmount + 0.01) {
                    e.preventDefault();
                    allocationError.innerHTML = '<i class="isax isax-warning-2 me-1"></i>{{ __("Le total alloué dépasse le montant du paiement.") }}';
                    allocationError.classList.remove('d-none');
                    allocationError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }

                allocationError.classList.add('d-none');

                // Remove rows with 0 allocation before submit
                inputs.forEach(function(inp) {
                    const val = parseFloat(inp.value) || 0;
                    if (val <= 0) {
                        inp.closest('tr').remove();
                    }
                });
            });
        });
    </script>
@endpush
