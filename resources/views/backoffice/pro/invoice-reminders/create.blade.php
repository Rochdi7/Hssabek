<?php $page = 'invoice-reminders'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouveau Rappel')
@section('description', 'Créer un nouveau rappel de facture')
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
                                <h5 class="mb-3">{{ __('Nouveau rappel') }}</h5>
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
                                <form action="{{ route('bo.pro.invoice-reminders.store') }}" method="POST">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Facture') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('invoice_id') is-invalid @enderror"
                                                    name="invoice_id">
                                                    <option value="">— {{ __('Sélectionner') }} —</option>
                                                    @foreach ($invoices as $invoice)
                                                        <option value="{{ $invoice->id }}"
                                                            {{ old('invoice_id') == $invoice->id ? 'selected' : '' }}>
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
                                                <label class="form-label">{{ __('Type') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('type') is-invalid @enderror"
                                                    name="type">
                                                    <option value="before_due"
                                                        {{ old('type') === 'before_due' ? 'selected' : '' }}>{{ __('Avant échéance') }}
                                                    </option>
                                                    <option value="on_due" {{ old('type') === 'on_due' ? 'selected' : '' }}>
                                                        {{ __("Jour d'échéance") }}</option>
                                                    <option value="after_due"
                                                        {{ old('type', 'after_due') === 'after_due' ? 'selected' : '' }}>
                                                        {{ __('Après échéance') }}</option>
                                                </select>
                                                @error('type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Canal') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('channel') is-invalid @enderror"
                                                    name="channel">
                                                    <option value="email"
                                                        {{ old('channel', 'email') === 'email' ? 'selected' : '' }}>{{ __('E-mail') }}
                                                    </option>
                                                    <option value="sms"
                                                        {{ old('channel') === 'sms' ? 'selected' : '' }}>{{ __('SMS') }}</option>
                                                </select>
                                                @error('channel')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Date planifiée') }} <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="datetime-local"
                                                    class="form-control @error('scheduled_at') is-invalid @enderror"
                                                    name="scheduled_at" value="{{ old('scheduled_at') }}">
                                                @error('scheduled_at')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.pro.invoice-reminders.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
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
