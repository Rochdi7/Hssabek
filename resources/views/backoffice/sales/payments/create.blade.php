<?php $page = 'add-payment'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.sales.payments.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Paiements</a></h6>
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
                                <h6 class="mb-3">Enregistrer un paiement</h6>
                                <form action="{{ route('bo.sales.payments.store') }}" method="POST">
                                    @csrf

                                    <div class="border-bottom mb-3 pb-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Client <span
                                                            class="text-danger">*</span></label>
                                                    <select name="customer_id"
                                                        class="select @error('customer_id') is-invalid @enderror"
                                                        id="customer-select">
                                                        <option value="">Sélectionner un client</option>
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
                                                        <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>Aucun client trouvé. <a href="{{ route('bo.crm.customers.create') }}">Créer un client</a> avant de continuer.</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Méthode de paiement</label>
                                                    <select name="payment_method_id"
                                                        class="select @error('payment_method_id') is-invalid @enderror">
                                                        <option value="">Sélectionner</option>
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
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Montant <span
                                                            class="text-danger">*</span></label>
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
                                                    <label class="form-label">Devise</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                        readonly disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Date de paiement <span
                                                            class="text-danger">*</span></label>
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
                                                    <label class="form-label">Référence</label>
                                                    <div class="mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ref_mode"
                                                                id="ref_mode_manual" value="manual" checked
                                                                onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').value=''; document.getElementById('reference_number').focus();">
                                                            <label class="form-check-label" for="ref_mode_manual">Saisie
                                                                manuelle</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ref_mode"
                                                                id="ref_mode_auto" value="auto"
                                                                onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                            <label class="form-check-label" for="ref_mode_auto">Générer
                                                                automatiquement</label>
                                                        </div>
                                                    </div>
                                                    <input type="text" name="reference_number" id="reference_number"
                                                        class="form-control @error('reference_number') is-invalid @enderror"
                                                        value="{{ old('reference_number') }}"
                                                        placeholder="N° chèque, virement, etc.">
                                                    @error('reference_number')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Notes</label>
                                                    <input type="text" name="notes" class="form-control"
                                                        value="{{ old('notes') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-bottom mb-3 pb-3">
                                        <h6 class="mb-3">Allocation aux factures <span class="text-danger">*</span></h6>
                                        <div class="table-responsive rounded border-bottom-0 border mb-3">
                                            <table class="table table-nowrap m-0" id="allocation-table">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>Facture</th>
                                                        <th>Client</th>
                                                        <th>Total</th>
                                                        <th>Restant dû</th>
                                                        <th>Montant à allouer</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($invoices as $i => $inv)
                                                        <tr>
                                                            <td>
                                                                <a
                                                                    href="{{ route('bo.sales.invoices.show', $inv) }}">{{ $inv->number }}</a>
                                                                <input type="hidden"
                                                                    name="allocations[{{ $i }}][invoice_id]"
                                                                    value="{{ $inv->id }}" disabled>
                                                            </td>
                                                            <td>{{ $inv->customer->name ?? '—' }}</td>
                                                            <td>{{ number_format($inv->total, 2, ',', ' ') }}</td>
                                                            <td>{{ number_format($inv->amount_due, 2, ',', ' ') }}</td>
                                                            <td>
                                                                <input type="number"
                                                                    name="allocations[{{ $i }}][amount_applied]"
                                                                    class="form-control allocation-amount" value="0"
                                                                    min="0" max="{{ $inv->amount_due }}"
                                                                    step="0.01" style="min-width: 120px;" disabled
                                                                    data-invoice-id="{{ $inv->id }}"
                                                                    data-customer-id="{{ $inv->customer_id }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <p class="text-muted fs-12">Saisissez le montant à allouer pour chaque facture. Les
                                            champs s'activent automatiquement quand un montant est saisi.</p>
                                        @if ($invoices->isEmpty())
                                            <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>Aucune facture en attente de paiement. <a href="{{ route('bo.sales.invoices.create') }}">Créer une facture</a> avant d'enregistrer un paiement.</small>
                                        @endif
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ route('bo.sales.payments.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer le paiement</button>
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
            const allocationInputs = document.querySelectorAll('.allocation-amount');

            allocationInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const val = parseFloat(this.value) || 0;
                    const hiddenInput = this.closest('tr').querySelector('input[type="hidden"]');
                    if (val > 0) {
                        this.name = this.name || this.dataset.originalName;
                        hiddenInput.disabled = false;
                        this.disabled = false;
                    }
                });

                // Enable all inputs on form submit
                input.closest('form')?.addEventListener('submit', function() {
                    allocationInputs.forEach(inp => {
                        const val = parseFloat(inp.value) || 0;
                        if (val > 0) {
                            inp.disabled = false;
                            inp.closest('tr').querySelector('input[type="hidden"]')
                                .disabled = false;
                        }
                    });
                });
            });

            // Enable all inputs initially and rely on server-side validation
            allocationInputs.forEach(input => {
                input.disabled = false;
                input.closest('tr').querySelector('input[type="hidden"]').disabled = false;
            });
        });
    </script>
@endpush
