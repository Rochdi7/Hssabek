<?php $page = 'vendor-bills'; ?>
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
                <div class="col-md-11 mx-auto">

                    <!-- Start Breadcrumb -->
                    <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                        <div>
                            <h6><a href="{{ route('bo.purchases.vendor-bills.index') }}" class="d-flex align-items-center"><i
                                        class="isax isax-arrow-left me-2"></i>Factures fournisseur</a></h6>
                        </div>
                    </div>
                    <!-- End Breadcrumb -->

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

                    <form action="{{ route('bo.purchases.vendor-bills.update', $vendorBill) }}" method="POST"
                        id="vendorBillForm">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-body">
                                <div class="top-content">
                                    <div class="purchase-header mb-3">
                                        <h6>Modifier la facture fournisseur — {{ $vendorBill->number }}</h6>
                                    </div>
                                    <div>
                                        <div class="row justify-content-between">
                                            <div class="col-xl-5">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Fournisseur <span
                                                                        class="text-danger">*</span></label>
                                                                <select
                                                                    class="form-select @error('supplier_id') is-invalid @enderror"
                                                                    name="supplier_id" required>
                                                                    <option value="">-- Sélectionner --</option>
                                                                    @foreach ($suppliers as $supplier)
                                                                        <option value="{{ $supplier->id }}"
                                                                            {{ old('supplier_id', $vendorBill->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                                                            {{ $supplier->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('supplier_id')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date d'émission <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text"
                                                                    class="form-control datetimepicker @error('issue_date') is-invalid @enderror"
                                                                    name="issue_date"
                                                                    value="{{ old('issue_date', $vendorBill->issue_date->format('d-m-Y')) }}"
                                                                    required>
                                                                @error('issue_date')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Date d'échéance</label>
                                                                <input type="text"
                                                                    class="form-control datetimepicker @error('due_date') is-invalid @enderror"
                                                                    name="due_date"
                                                                    value="{{ old('due_date', $vendorBill->due_date?->format('d-m-Y')) }}">
                                                                @error('due_date')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="purchase-top-content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Devise</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                                    readonly disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Référence externe</label>
                                                                <div class="mb-2">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="ref_ext_mode" id="ref_ext_manual" value="manual" checked
                                                                            onchange="document.getElementById('reference_number').readOnly=false; document.getElementById('reference_number').focus();">
                                                                        <label class="form-check-label" for="ref_ext_manual">Saisie manuelle</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="ref_ext_mode" id="ref_ext_auto" value="auto"
                                                                            onchange="document.getElementById('reference_number').value='{{ $nextReference }}'; document.getElementById('reference_number').readOnly=true;">
                                                                        <label class="form-check-label" for="ref_ext_auto">Générer automatiquement</label>
                                                                    </div>
                                                                </div>
                                                                <input type="text" id="reference_number"
                                                                    class="form-control @error('reference_number') is-invalid @enderror"
                                                                    name="reference_number"
                                                                    value="{{ old('reference_number', $vendorBill->reference_number) }}"
                                                                    maxlength="100">
                                                                @error('reference_number')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Informations supplémentaires --}}
                                <div class="border-top pt-3 mb-3">
                                    <h6 class="mb-3">Informations supplémentaires</h6>
                                    <div>
                                        <ul class="nav nav-tabs nav-solid-primary mb-3" role="tablist">
                                            <li class="nav-item me-2" role="presentation">
                                                <a class="nav-link active border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#notes" aria-current="page" href="javascript:void(0);"><i class="isax isax-document-text me-1"></i>Notes</a>
                                            </li>
                                            <li class="nav-item me-2" role="presentation">
                                                <a class="nav-link border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#terms" href="javascript:void(0);"><i class="isax isax-document me-1"></i>Conditions</a>
                                            </li>
                                            <li class="nav-item me-2" role="presentation">
                                                <a class="nav-link border fs-12 fw-semibold rounded" data-bs-toggle="tab" data-bs-target="#bank" href="javascript:void(0);"><i class="isax isax-bank me-1"></i>Coordonnées bancaires</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="notes" role="tabpanel">
                                                <label class="form-label">Notes additionnelles</label>
                                                <textarea name="notes" class="form-control bg-light" rows="3" readonly>{{ $defaultFooter }}</textarea>
                                                <small class="text-muted mt-1 d-block"><i class="isax isax-setting-2 me-1"></i>Modifiable depuis <a href="{{ route('bo.settings.invoice.edit') }}">Paramètres de facturation</a></small>
                                            </div>
                                            <div class="tab-pane fade" id="terms" role="tabpanel">
                                                <label class="form-label">Conditions générales</label>
                                                <textarea name="terms" class="form-control bg-light" rows="3" readonly>{{ $defaultTerms }}</textarea>
                                                <small class="text-muted mt-1 d-block"><i class="isax isax-setting-2 me-1"></i>Modifiable depuis <a href="{{ route('bo.settings.invoice.edit') }}">Paramètres de facturation</a></small>
                                            </div>
                                            <div class="tab-pane fade" id="bank" role="tabpanel">
                                                <label class="form-label">Compte bancaire</label>
                                                <select class="select" name="bank_account_id">
                                                    <option value="">Sélectionner</option>
                                                    @foreach ($bankAccounts as $ba)
                                                        <option value="{{ $ba->id }}" {{ old('bank_account_id', $vendorBill->bank_account_id ?? '') == $ba->id ? 'selected' : '' }}>
                                                            {{ $ba->account_holder_name }} - {{ $ba->account_number }} ({{ $ba->bank_name }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="extra-info">
                                    <div class="row">
                                        <div class="col-md-7">
                                        </div>
                                        <div class="col-md-5">
                                            <ul class="mb-0 ps-0 list-unstyled">
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">Sous-total <span
                                                                class="text-danger">*</span></p>
                                                        <div style="width:160px;">
                                                            <input type="number"
                                                                class="form-control form-control-sm text-end @error('subtotal') is-invalid @enderror"
                                                                name="subtotal" id="input-subtotal"
                                                                value="{{ old('subtotal', $vendorBill->subtotal) }}"
                                                                min="0" step="0.01" required>
                                                            @error('subtotal')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-3">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <p class="fw-semibold fs-14 text-gray-9 mb-0">Taxes</p>
                                                        <div style="width:160px;">
                                                            <input type="number"
                                                                class="form-control form-control-sm text-end @error('tax_total') is-invalid @enderror"
                                                                name="tax_total" id="input-tax"
                                                                value="{{ old('tax_total', $vendorBill->tax_total) }}"
                                                                min="0" step="0.01">
                                                            @error('tax_total')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mt-3 pb-3 border-bottom border-gray">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6>Total <span class="text-danger">*</span></h6>
                                                        <div style="width:160px;">
                                                            <input type="number"
                                                                class="form-control form-control-sm text-end fw-bold @error('total') is-invalid @enderror"
                                                                name="total" id="input-total"
                                                                value="{{ old('total', $vendorBill->total) }}"
                                                                min="0" step="0.01" required>
                                                            @error('total')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="{{ route('bo.purchases.vendor-bills.show', $vendorBill) }}"
                                        class="btn btn-outline-white">Annuler</a>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
            const subtotalInput = document.getElementById('input-subtotal');
            const taxInput = document.getElementById('input-tax');
            const totalInput = document.getElementById('input-total');

            function recalcTotal() {
                const subtotal = parseFloat(subtotalInput.value) || 0;
                const tax = parseFloat(taxInput.value) || 0;
                totalInput.value = (subtotal + tax).toFixed(2);
            }

            subtotalInput.addEventListener('input', recalcTotal);
            taxInput.addEventListener('input', recalcTotal);
        });
    </script>
@endpush
