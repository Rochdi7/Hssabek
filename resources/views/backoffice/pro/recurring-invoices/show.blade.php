<?php $page = 'recurring-invoices'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails de la Facture Récurrente')
@section('description', 'Consulter les détails de la facture récurrente')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.pro.recurring-invoices.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Factures récurrentes') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5>{{ __('Facture récurrente') }}</h5>
                                    <a href="{{ route('bo.pro.recurring-invoices.edit', $recurringInvoice) }}"
                                        class="btn btn-sm btn-outline-primary"><i
                                            class="isax isax-edit me-1"></i>{{ __('Modifier') }}</a>
                                </div>
                                <div class="row gx-3 mb-4">
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Client') }}</label>
                                        <p class="fw-medium mb-0">{{ $recurringInvoice->customer->name ?? '—' }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Facture modèle') }}</label>
                                        <p class="fw-medium mb-0">{{ $recurringInvoice->templateInvoice->number ?? '—' }}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Fréquence') }}</label>
                                        <p class="fw-medium mb-0">{{ __('Tous les') }} {{ $recurringInvoice->every }}
                                            {{ $recurringInvoice->interval === 'month' ? __('mois') : ($recurringInvoice->interval === 'week' ? __('semaines') : __('ans')) }}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Prochaine exécution') }}</label>
                                        <p class="fw-medium mb-0">
                                            {{ $recurringInvoice->next_run_at ? \Carbon\Carbon::parse($recurringInvoice->next_run_at)->format('d/m/Y') : '—' }}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <label class="form-label text-muted">{{ __('Statut') }}</label>
                                        <p class="mb-0">
                                            @switch($recurringInvoice->status)
                                                @case('active')
                                                    <span class="badge badge-soft-success">{{ __('Actif') }}</span>
                                                @break

                                                @case('paused')
                                                    <span class="badge badge-soft-warning">{{ __('En pause') }}</span>
                                                @break

                                                @case('cancelled')
                                                    <span class="badge badge-soft-danger">{{ __('Annulé') }}</span>
                                                @break
                                            @endswitch
                                        </p>
                                    </div>
                                </div>
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
