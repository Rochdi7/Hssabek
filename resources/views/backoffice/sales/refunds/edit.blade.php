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
                                <h5 class="mb-3">Modifier le remboursement</h5>
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

                                <form action="{{ route('bo.sales.refunds.update', $refund) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Paiement</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $refund->payment->reference_number ?? $refund->payment_id }}"
                                                    readonly disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Montant <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.01" min="0"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    name="amount" value="{{ old('amount', $refund->amount) }}">
                                                @error('amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Statut <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="pending"
                                                        {{ old('status', $refund->status) === 'pending' ? 'selected' : '' }}>
                                                        En attente</option>
                                                    <option value="completed"
                                                        {{ old('status', $refund->status) === 'completed' ? 'selected' : '' }}>
                                                        Complété</option>
                                                    <option value="failed"
                                                        {{ old('status', $refund->status) === 'failed' ? 'selected' : '' }}>
                                                        Échoué</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Réf. fournisseur de paiement</label>
                                                <div class="mb-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_manual" value="manual" checked
                                                            onchange="document.getElementById('provider_refund_id').readOnly=false; document.getElementById('provider_refund_id').focus();">
                                                        <label class="form-check-label" for="ref_mode_manual">Saisie manuelle</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ref_mode" id="ref_mode_auto" value="auto"
                                                            onchange="var d=new Date(); document.getElementById('provider_refund_id').value='REF-'+d.getFullYear()+(''+(d.getMonth()+1)).padStart(2,'0')+d.getDate()+'-'+Math.floor(1000+Math.random()*9000); document.getElementById('provider_refund_id').readOnly=true;">
                                                        <label class="form-check-label" for="ref_mode_auto">Générer automatiquement</label>
                                                    </div>
                                                </div>
                                                <input type="text" id="provider_refund_id"
                                                    class="form-control @error('provider_refund_id') is-invalid @enderror"
                                                    name="provider_refund_id"
                                                    value="{{ old('provider_refund_id', $refund->provider_refund_id) }}">
                                                @error('provider_refund_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date de remboursement</label>
                                                <input type="date"
                                                    class="form-control @error('refunded_at') is-invalid @enderror"
                                                    name="refunded_at"
                                                    value="{{ old('refunded_at', $refund->refunded_at instanceof \Carbon\Carbon ? $refund->refunded_at->format('Y-m-d') : $refund->refunded_at) }}">
                                                @error('refunded_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.sales.refunds.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
