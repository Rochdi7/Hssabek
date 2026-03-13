<?php $page = 'expenses'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                        Start Page Content
                    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row -->
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.finance.expenses.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Dépenses') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Nouvelle dépense') }}</h5>

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

                                <form action="{{ route('bo.finance.expenses.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Détails de la dépense') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date de la dépense') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <div class="input-group position-relative">
                                                    <input type="text"
                                                        class="form-control datetimepicker @error('expense_date') is-invalid @enderror"
                                                        name="expense_date" value="{{ old('expense_date', date('d-m-Y')) }}"
                                                        placeholder="{{ now()->format('d M Y') }}">
                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                        <i class="isax isax-calendar-2"></i>
                                                    </span>
                                                </div>
                                                @error('expense_date')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Numéro de référence') }}</label>
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode"
                                                            id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').value=''; document.getElementById('reference_number').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">{{ __('Saisie manuelle') }}</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode"
                                                            id="ref_mode_auto" value="auto"
                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">{{ __('Générer automatiquement') }}</label>
                                                    </div>
                                                </div>
                                                <input type="text" id="reference_number"
                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                    name="reference_number" value="{{ old('reference_number') }}"
                                                    placeholder="{{ __('Ex: DEP-00001') }}">
                                                @error('reference_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Catégorie') }}</label>
                                                <select class="form-select @error('category_id') is-invalid @enderror"
                                                    name="category_id">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Fournisseur') }}</label>
                                                <select class="form-select @error('supplier_id') is-invalid @enderror"
                                                    name="supplier_id">
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
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Montant') }} <span
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
                                                <label class="form-label">{{ __('Devise') }}</label>
                                                <input type="text" class="form-control"
                                                    value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                    readonly disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-2">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Paiement') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Mode de paiement') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('payment_mode') is-invalid @enderror"
                                                    name="payment_mode">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    <option value="cash"
                                                        {{ old('payment_mode') === 'cash' ? 'selected' : '' }}>{{ __('Espèces') }}
                                                    </option>
                                                    <option value="bank_transfer"
                                                        {{ old('payment_mode') === 'bank_transfer' ? 'selected' : '' }}>
                                                        {{ __('Virement bancaire') }}</option>
                                                    <option value="card"
                                                        {{ old('payment_mode') === 'card' ? 'selected' : '' }}>{{ __('Carte') }}
                                                    </option>
                                                    <option value="cheque"
                                                        {{ old('payment_mode') === 'cheque' ? 'selected' : '' }}>{{ __('Chèque') }}
                                                    </option>
                                                    <option value="other"
                                                        {{ old('payment_mode') === 'other' ? 'selected' : '' }}>{{ __('Autre') }}
                                                    </option>
                                                </select>
                                                @error('payment_mode')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Statut de paiement') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('payment_status') is-invalid @enderror"
                                                    name="payment_status" id="payment_status"
                                                    onchange="togglePaidAmount()">
                                                    <option value="unpaid"
                                                        {{ old('payment_status', 'unpaid') === 'unpaid' ? 'selected' : '' }}>
                                                        {{ __('Impayée') }}</option>
                                                    <option value="paid"
                                                        {{ old('payment_status') === 'paid' ? 'selected' : '' }}>{{ __('Payée') }}
                                                    </option>
                                                    <option value="partial"
                                                        {{ old('payment_status') === 'partial' ? 'selected' : '' }}>
                                                        {{ __('Partielle') }}</option>
                                                </select>
                                                @error('payment_status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6" id="paid_amount_wrapper"
                                            style="{{ old('payment_status') === 'partial' ? '' : 'display:none;' }}">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Montant payé') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('paid_amount') is-invalid @enderror"
                                                    name="paid_amount" id="paid_amount_input"
                                                    value="{{ old('paid_amount') }}"
                                                    oninput="calculateReste()">
                                                @error('paid_amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="text-muted" id="reste_info" style="display:none;">
                                                    {{ __('Reste à payer :') }} <strong id="reste_value">0,00</strong>
                                                </small>
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
                                                            {{ $bankAccount->account_number }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-muted bank-balance-info mt-1 d-block" style="display:none;"></small>
                                                @error('bank_account_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Description') }}</label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.finance.expenses.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer la dépense') }}</button>
                                    </div>
                                </form>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
                        End Page Content
                    ========================= -->
@endsection

@push('scripts')
    <script>
        function togglePaidAmount() {
            var status = document.getElementById('payment_status').value;
            var wrapper = document.getElementById('paid_amount_wrapper');
            if (status === 'partial') {
                wrapper.style.display = '';
                calculateReste();
            } else {
                wrapper.style.display = 'none';
            }
        }

        function calculateReste() {
            var amount = parseFloat(document.querySelector('input[name="amount"]').value) || 0;
            var paid = parseFloat(document.getElementById('paid_amount_input').value) || 0;
            var reste = Math.max(0, amount - paid);
            document.getElementById('reste_value').textContent = reste.toFixed(2).replace('.', ',');
            document.getElementById('reste_info').style.display = '';
        }

        // Init on page load
        document.addEventListener('DOMContentLoaded', function() {
            togglePaidAmount();
            // Also recalculate when amount changes
            document.querySelector('input[name="amount"]').addEventListener('input', function() {
                if (document.getElementById('payment_status').value === 'partial') {
                    calculateReste();
                }
            });
        });
    </script>
@endpush
