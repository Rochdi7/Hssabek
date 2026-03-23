<?php $page = 'invoice-details'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails de la Facture')
@section('description', 'Consulter les détails de la facture')
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
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                            <h6><a href="{{ route('bo.sales.invoices.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Factures') }}</a></h6>
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <a href="{{ route('bo.sales.invoices.download', $invoice) }}" target="_blank" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                                @if($invoice->status === 'draft')
                                    <a href="{{ route('bo.sales.invoices.edit', $invoice) }}" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i
                                            class="isax isax-edit me-1"></i>{{ __('Modifier') }}</a>
                                    <form method="POST" action="{{ route('bo.sales.invoices.send', $invoice) }}" class="me-3">
                                        @csrf
                                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                                            <i class="isax isax-send-2 me-1"></i>{{ __('Envoyer') }}</button>
                                    </form>
                                @endif
                                @if(in_array($invoice->status, ['draft', 'sent', 'partial', 'overdue']))
                                    <form method="POST" action="{{ route('bo.sales.invoices.void', $invoice) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger d-inline-flex align-items-center"
                                            onclick="return confirm('{{ __("Êtes-vous sûr de vouloir annuler cette facture ?") }}')">
                                            <i class="isax isax-close-circle me-1"></i>{{ __('Annuler') }}</button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('bo.sales.invoices.destroy', $invoice) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger d-inline-flex align-items-center"
                                        onclick="return confirm('{{ __("Êtes-vous sûr de vouloir supprimer cette facture ?") }}')">
                                        <i class="isax isax-trash me-1"></i>{{ __('Supprimer') }}</button>
                                </form>
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="bg-light p-4 rounded position-relative mb-3">
                                    <div class="position-absolute top-0 end-0 z-0">
                                        <img src="{{ URL::asset('build/img/bg/card-bg.png') }}" alt="img">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap mb-3 pb-2 position-relative z-1">
                                        <div class="mb-3">
                                            <h4 class="mb-1">{{ __('Facture') }}</h4>
                                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                <div class="me-4">
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ $invoice->number }}</h6>
                                                    <p>
                                                        @switch($invoice->status)
                                                            @case('draft') <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span> @break
                                                            @case('sent') <span class="badge badge-soft-info">{{ __('Envoyée') }}</span> @break
                                                            @case('partial') <span class="badge badge-soft-warning">{{ __('Partiellement payée') }}</span> @break
                                                            @case('paid') <span class="badge badge-soft-success">{{ __('Payée') }}</span> @break
                                                            @case('overdue') <span class="badge badge-soft-danger">{{ __('En retard') }}</span> @break
                                                            @case('void') <span class="badge badge-soft-danger">{{ __('Annulée') }}</span> @break
                                                        @endswitch
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- start row -->
                                    <div class="row gy-3 position-relative z-1">
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Détails de la facture') }}</h6>
                                                <div>
                                                    <p class="mb-1">{{ __('N° Facture') }} : <span class="text-dark">{{ $invoice->number }}</span></p>
                                                    <p class="mb-1">{{ __('Date d\'émission') }} : <span class="text-dark">{{ $invoice->issue_date?->format('d/m/Y') }}</span></p>
                                                    @if($invoice->due_date)
                                                        <p class="mb-1">{{ __('Date d\'échéance') }} : <span class="text-dark">{{ $invoice->due_date->format('d/m/Y') }}</span></p>
                                                    @endif
                                                    @if($invoice->reference_number)
                                                        <p class="mb-1">{{ __('Référence') }} : <span class="text-dark">{{ $invoice->reference_number }}</span></p>
                                                    @endif
                                                    <p class="mb-1">{{ __('Devise') }} : <span class="text-dark">{{ $invoice->currency }}</span></p>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Client') }}</h6>
                                                <div>
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ $invoice->customer->name ?? '—' }}</h6>
                                                    @if($invoice->customer?->email)
                                                        <p class="mb-1">{{ __('Email') }} : {{ $invoice->customer->email }}</p>
                                                    @endif
                                                    @if($invoice->customer?->phone)
                                                        <p class="mb-1">{{ __('Tél') }} : {{ $invoice->customer->phone }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Paiement') }}</h6>
                                                <div>
                                                    <p class="mb-1">{{ __('Total') }} : <span class="text-dark fw-semibold">{{ number_format($invoice->total, 2, ',', ' ') }} {{ $invoice->currency }}</span></p>
                                                    <p class="mb-1">{{ __('Payé') }} : <span class="text-success fw-semibold">{{ number_format($invoice->amount_paid, 2, ',', ' ') }} {{ $invoice->currency }}</span></p>
                                                    <p class="mb-1">{{ __('Restant') }} : <span class="text-danger fw-semibold">{{ number_format($invoice->amount_due, 2, ',', ' ') }} {{ $invoice->currency }}</span></p>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-3">{{ __('Articles') }}</h6>
                                    <div class="table-responsive rounded border-bottom-0 border table-nowrap">
                                        <table class="table m-0">
                                            <thead style="background-color: #1B2850; color: #fff;">
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('Libellé') }}</th>
                                                    <th>{{ __('Quantité') }}</th>
                                                    <th>{{ __('Unité') }}</th>
                                                    <th>{{ __('Prix unitaire') }}</th>
                                                    <th>{{ __('Remise') }}</th>
                                                    <th>{{ __('Taxe') }}</th>
                                                    <th>{{ __('Montant') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($invoice->items as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td class="text-dark">
                                                            {{ $item->label }}
                                                            @if($item->description)
                                                                <br><small class="text-muted">{{ $item->description }}</small>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->unit?->short_name ?? '—' }}</td>
                                                        <td>{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                                                        <td>
                                                            @if($item->discount_type === 'percentage')
                                                                {{ $item->discount_value }}%
                                                            @elseif($item->discount_type === 'fixed')
                                                                {{ number_format($item->discount_value, 2, ',', ' ') }}
                                                            @else
                                                                —
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->tax_rate > 0 ? number_format($item->tax_rate, 2) . '%' : '—' }}</td>
                                                        <td>{{ number_format($item->line_total, 2, ',', ' ') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                @if($invoice->charges->count() > 0)
                                    <div class="mb-3">
                                        <h6 class="mb-3">{{ __('Frais supplémentaires') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border table-nowrap">
                                            <table class="table m-0">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('Libellé') }}</th>
                                                        <th>{{ __('Montant') }}</th>
                                                        <th>{{ __('Taxe') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($invoice->charges as $charge)
                                                        <tr>
                                                            <td>{{ $charge->label }}</td>
                                                            <td>{{ number_format($charge->amount, 2, ',', ' ') }}</td>
                                                            <td>{{ $charge->tax_rate > 0 ? number_format($charge->tax_rate, 2) . '%' : '—' }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                <div class="border-bottom mb-3">
                                    <!-- start row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @if($invoice->notes || $invoice->terms)
                                                <div class="mb-3 p-4">
                                                    @if($invoice->terms)
                                                        <div class="mb-3">
                                                            <h6 class="fs-14 fw-semibold mb-1">{{ __('Conditions générales') }}</h6>
                                                            <p>{{ $invoice->terms }}</p>
                                                        </div>
                                                    @endif
                                                    @if($invoice->notes)
                                                        <div>
                                                            <h6 class="fs-14 fw-semibold mb-1">{{ __('Notes') }}</h6>
                                                            <p>{{ $invoice->notes }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </div><!-- end col -->
                                        <div class="col-lg-6">
                                            <div class="mb-3 p-4">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <h6 class="fs-14 fw-semibold">{{ __("Sous-total") }}</h6>
                                                    <h6 class="fs-14 fw-semibold">{{ number_format($invoice->subtotal, 2, ',', ' ') }}</h6>
                                                </div>
                                                @if($invoice->discount_total > 0)
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">{{ __('Remise') }}</h6>
                                                        <h6 class="fs-14 fw-semibold text-danger">-{{ number_format($invoice->discount_total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                @endif
                                                @if($invoice->tax_total > 0)
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">{{ __('Taxe') }}</h6>
                                                        <h6 class="fs-14 fw-semibold">{{ number_format($invoice->tax_total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                @endif
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                                    <h6>Total ({{ $invoice->currency }})</h6>
                                                    <h6>{{ number_format($invoice->total, 2, ',', ' ') }}</h6>
                                                </div>
                                                @if($invoice->total_in_words)
                                                    <div>
                                                        <h6 class="fs-14 fw-semibold mb-1">{{ __('Total en lettres') }}</h6>
                                                        <p>{{ $invoice->total_in_words }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>

                                @if($invoice->paymentAllocations->count() > 0)
                                    <div class="mb-3">
                                        <h6 class="mb-3">{{ __('Historique des paiements') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border table-nowrap">
                                            <table class="table m-0">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('Date') }}</th>
                                                        <th>{{ __('Méthode') }}</th>
                                                        <th>{{ __('Référence') }}</th>
                                                        <th>{{ __('Montant appliqué') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($invoice->paymentAllocations as $allocation)
                                                        <tr>
                                                            <td>{{ $allocation->payment?->payment_date?->format('d/m/Y') ?? '—' }}</td>
                                                            <td>{{ $allocation->payment?->paymentMethod?->name ?? '—' }}</td>
                                                            <td>{{ $allocation->payment?->reference_number ?? '—' }}</td>
                                                            <td class="text-success">{{ number_format($allocation->amount_applied, 2, ',', ' ') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if($invoice->creditNoteApplications->count() > 0)
                                    <div class="mb-3">
                                        <h6 class="mb-3">{{ __('Avoirs appliqués') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border table-nowrap">
                                            <table class="table m-0">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('N° Avoir') }}</th>
                                                        <th>{{ __('Date') }}</th>
                                                        <th>{{ __('Montant appliqué') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($invoice->creditNoteApplications as $app)
                                                        <tr>
                                                            <td>
                                                                <a href="{{ route('bo.sales.credit-notes.show', $app->creditNote) }}">{{ $app->creditNote->number }}</a>
                                                            </td>
                                                            <td>{{ $app->applied_at?->format('d/m/Y') ?? '—' }}</td>
                                                            <td class="text-success">{{ number_format($app->amount_applied, 2, ',', ' ') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

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
