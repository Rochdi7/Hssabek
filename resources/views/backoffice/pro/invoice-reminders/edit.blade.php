<?php $page = 'invoice-reminders'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Modifier le Rappel')
@section('description', 'Modifier les détails du rappel')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.pro.invoice-reminders.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Rappels de factures') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Modifier le rappel') }}</h5>
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
                                <form action="{{ route('bo.pro.invoice-reminders.update', $invoiceReminder) }}"
                                    method="POST">
                                    @csrf @method('PUT')
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Facture') }}</label>
                                                <select class="form-select @error('invoice_id') is-invalid @enderror"
                                                    name="invoice_id">
                                                    @foreach ($invoices as $invoice)
                                                        <option value="{{ $invoice->id }}"
                                                            {{ old('invoice_id', $invoiceReminder->invoice_id) == $invoice->id ? 'selected' : '' }}>
                                                            {{ $invoice->number }} — {{ $invoice->customer->name ?? '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('invoice_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Type') }}</label>
                                                <select class="form-select @error('type') is-invalid @enderror"
                                                    name="type">
                                                    <option value="before_due"
                                                        {{ old('type', $invoiceReminder->type) === 'before_due' ? 'selected' : '' }}>
                                                        {{ __('Avant échéance') }}</option>
                                                    <option value="on_due"
                                                        {{ old('type', $invoiceReminder->type) === 'on_due' ? 'selected' : '' }}>
                                                        {{ __("Jour d'échéance") }}</option>
                                                    <option value="after_due"
                                                        {{ old('type', $invoiceReminder->type) === 'after_due' ? 'selected' : '' }}>
                                                        {{ __('Après échéance') }}</option>
                                                </select>
                                                @error('type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Canal') }}</label>
                                                <select class="form-select @error('channel') is-invalid @enderror"
                                                    name="channel">
                                                    <option value="email"
                                                        {{ old('channel', $invoiceReminder->channel) === 'email' ? 'selected' : '' }}>
                                                        {{ __('E-mail') }}</option>
                                                    <option value="sms"
                                                        {{ old('channel', $invoiceReminder->channel) === 'sms' ? 'selected' : '' }}>
                                                        {{ __('SMS') }}</option>
                                                </select>
                                                @error('channel')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Statut') }}</label>
                                                <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="pending"
                                                        {{ old('status', $invoiceReminder->status) === 'pending' ? 'selected' : '' }}>
                                                        {{ __('En attente') }}</option>
                                                    <option value="sent"
                                                        {{ old('status', $invoiceReminder->status) === 'sent' ? 'selected' : '' }}>
                                                        {{ __('Envoyé') }}</option>
                                                    <option value="failed"
                                                        {{ old('status', $invoiceReminder->status) === 'failed' ? 'selected' : '' }}>
                                                        {{ __('Échoué') }}</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date planifiée') }}</label>
                                                <input type="datetime-local"
                                                    class="form-control @error('scheduled_at') is-invalid @enderror"
                                                    name="scheduled_at"
                                                    value="{{ old('scheduled_at', $invoiceReminder->scheduled_at instanceof \Carbon\Carbon ? $invoiceReminder->scheduled_at->format('Y-m-d\TH:i') : $invoiceReminder->scheduled_at) }}">
                                                @error('scheduled_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.pro.invoice-reminders.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Mettre à jour') }}</button>
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
