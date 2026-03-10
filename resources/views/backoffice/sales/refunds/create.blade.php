<?php $page = 'refunds'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.sales.refunds.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Remboursements</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Nouveau remboursement</h5>
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

                                <form action="{{ route('bo.sales.refunds.store') }}" method="POST">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Paiement <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('payment_id') is-invalid @enderror"
                                                    name="payment_id">
                                                    <option value="">— Sélectionner —</option>
                                                    @foreach ($payments as $payment)
                                                        <option value="{{ $payment->id }}"
                                                            {{ old('payment_id') == $payment->id ? 'selected' : '' }}>
                                                            {{ $payment->reference_number ?? $payment->id }} —
                                                            {{ $payment->customer->name ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('payment_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Montant <span
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
                                                <label class="form-label">Réf. fournisseur de paiement</label>
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode"
                                                            id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('provider_refund_id').value=''; document.getElementById('provider_refund_id').readOnly=false; document.getElementById('provider_refund_id').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">Saisie
                                                            manuelle</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode"
                                                            id="ref_mode_auto" value="auto"
                                                            onchange="document.getElementById('provider_refund_id').value='{{ $nextReference }}'; document.getElementById('provider_refund_id').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">Générer
                                                            automatiquement</label>
                                                    </div>
                                                </div>
                                                <input type="text" id="provider_refund_id"
                                                    class="form-control @error('provider_refund_id') is-invalid @enderror"
                                                    name="provider_refund_id" value="{{ old('provider_refund_id') }}">
                                                @error('provider_refund_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date de remboursement</label>
                                                <div class="input-group position-relative">
                                                    <input type="text"
                                                        class="form-control datetimepicker @error('refunded_at') is-invalid @enderror"
                                                        name="refunded_at" value="{{ old('refunded_at', date('d-m-Y')) }}"
                                                        placeholder="{{ now()->format('d M Y') }}">
                                                    <span class="input-icon-addon fs-16 text-gray-9">
                                                        <i class="isax isax-calendar-2"></i>
                                                    </span>
                                                </div>
                                                @error('refunded_at')
                                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.sales.refunds.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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
