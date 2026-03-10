<?php $page = 'recurring-invoices'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.pro.recurring-invoices.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Factures récurrentes</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Nouvelle facture récurrente</h5>
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
                                <form action="{{ route('bo.pro.recurring-invoices.store') }}" method="POST">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Client <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('customer_id') is-invalid @enderror"
                                                    name="customer_id">
                                                    <option value="">— Sélectionner —</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}"
                                                            {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                            {{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('customer_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Facture modèle <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select
                                                    class="form-select @error('template_invoice_id') is-invalid @enderror"
                                                    name="template_invoice_id">
                                                    <option value="">— Sélectionner —</option>
                                                    @foreach ($invoices as $invoice)
                                                        <option value="{{ $invoice->id }}"
                                                            {{ old('template_invoice_id') == $invoice->id ? 'selected' : '' }}>
                                                            {{ $invoice->number }}</option>
                                                    @endforeach
                                                </select>
                                                @error('template_invoice_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Intervalle <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('interval') is-invalid @enderror"
                                                    name="interval">
                                                    <option value="week"
                                                        {{ old('interval') === 'week' ? 'selected' : '' }}>Semaine</option>
                                                    <option value="month"
                                                        {{ old('interval', 'month') === 'month' ? 'selected' : '' }}>Mois
                                                    </option>
                                                    <option value="year"
                                                        {{ old('interval') === 'year' ? 'selected' : '' }}>Année</option>
                                                </select>
                                                @error('interval')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tous les (nombre) <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="number" min="1"
                                                    class="form-control @error('every') is-invalid @enderror" name="every"
                                                    value="{{ old('every', 1) }}">
                                                @error('every')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Prochaine exécution <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control datetimepicker @error('next_run_at') is-invalid @enderror"
                                                    name="next_run_at" value="{{ old('next_run_at') }}">
                                                @error('next_run_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Statut</label>
                                                <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="active"
                                                        {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Actif
                                                    </option>
                                                    <option value="paused"
                                                        {{ old('status') === 'paused' ? 'selected' : '' }}>En pause
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.pro.recurring-invoices.index') }}"
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
