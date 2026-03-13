<?php $page = 'credit-note-details'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                            <h6><a href="{{ route('bo.sales.credit-notes.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Avoirs') }}</a></h6>
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <a href="{{ route('bo.sales.credit-notes.download', $creditNote) }}" target="_blank" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                                @if($creditNote->status === 'draft')
                                    <a href="{{ route('bo.sales.credit-notes.edit', $creditNote) }}" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-edit me-1"></i>{{ __('Modifier') }}</a>
                                @endif
                                <form method="POST" action="{{ route('bo.sales.credit-notes.destroy', $creditNote) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger d-inline-flex align-items-center"
                                        onclick="return confirm('{{ __("Êtes-vous sûr de vouloir supprimer cet avoir ?") }}')">
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
                                            <h4 class="mb-1">{{ __('Avoir') }}</h4>
                                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                <div class="me-4">
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ $creditNote->number }}</h6>
                                                    <p>
                                                        @switch($creditNote->status)
                                                            @case('draft') <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span> @break
                                                            @case('issued') <span class="badge badge-soft-info">{{ __('Émis') }}</span> @break
                                                            @case('applied') <span class="badge badge-soft-success">{{ __('Appliqué') }}</span> @break
                                                            @case('void') <span class="badge badge-soft-danger">{{ __('Annulé') }}</span> @break
                                                        @endswitch
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-3 position-relative z-1">
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Détails de l\'avoir') }}</h6>
                                                <p class="mb-1">{{ __('N° Avoir') }} : <span class="text-dark">{{ $creditNote->number }}</span></p>
                                                <p class="mb-1">{{ __('Date d\'émission') }} : <span class="text-dark">{{ $creditNote->issue_date?->format('d/m/Y') }}</span></p>
                                                <p class="mb-1">{{ __('Devise') }} : <span class="text-dark">{{ $creditNote->currency }}</span></p>
                                                @if($creditNote->invoice)
                                                    <p class="mb-1">Facture liée : <a href="{{ route('bo.sales.invoices.show', $creditNote->invoice) }}">{{ $creditNote->invoice->number }}</a></p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Client') }}</h6>
                                                <h6 class="fs-14 fw-semibold mb-1">{{ $creditNote->customer->name ?? '—' }}</h6>
                                                @if($creditNote->customer?->email)
                                                    <p class="mb-1">{{ __('Email') }} : {{ $creditNote->customer->email }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Total') }}</h6>
                                                <p class="mb-1">{{ __('Total') }} : <span class="text-dark fw-semibold">{{ number_format($creditNote->total, 2, ',', ' ') }} {{ $creditNote->currency }}</span></p>
                                            </div>
                                        </div>
                                    </div>
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
                                                    <th>{{ __('Prix unitaire') }}</th>
                                                    <th>{{ __('Taxe') }}</th>
                                                    <th>{{ __('Montant') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($creditNote->items as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td class="text-dark">
                                                            {{ $item->label }}
                                                            @if($item->description)
                                                                <br><small class="text-muted">{{ $item->description }}</small>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ number_format($item->unit_price, 2, ',', ' ') }}</td>
                                                        <td>{{ $item->tax_rate > 0 ? number_format($item->tax_rate, 2) . '%' : '—' }}</td>
                                                        <td>{{ number_format($item->line_total, 2, ',', ' ') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="border-bottom mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @if($creditNote->notes)
                                                <div class="mb-3 p-4">
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ __('Notes') }}</h6>
                                                    <p>{{ $creditNote->notes }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3 p-4">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <h6 class="fs-14 fw-semibold">{{ __("Sous-total") }}</h6>
                                                    <h6 class="fs-14 fw-semibold">{{ number_format($creditNote->subtotal, 2, ',', ' ') }}</h6>
                                                </div>
                                                @if($creditNote->tax_total > 0)
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">{{ __('Taxe') }}</h6>
                                                        <h6 class="fs-14 fw-semibold">{{ number_format($creditNote->tax_total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                @endif
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                                    <h6>Total ({{ $creditNote->currency }})</h6>
                                                    <h6>{{ number_format($creditNote->total, 2, ',', ' ') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($creditNote->applications->count() > 0)
                                    <div class="mb-3">
                                        <h6 class="mb-3">{{ __('Applications') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border table-nowrap">
                                            <table class="table m-0">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('Facture') }}</th>
                                                        <th>{{ __('Date') }}</th>
                                                        <th>{{ __('Montant appliqué') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($creditNote->applications as $app)
                                                        <tr>
                                                            <td><a href="{{ route('bo.sales.invoices.show', $app->invoice) }}">{{ $app->invoice->number }}</a></td>
                                                            <td>{{ $app->applied_at?->format('d/m/Y') ?? '—' }}</td>
                                                            <td class="text-success">{{ number_format($app->amount_applied, 2, ',', ' ') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if($creditNote->status === 'issued')
                                    <div class="border-top pt-3">
                                        <h6 class="mb-3">{{ __('Appliquer l\'avoir à une facture') }}</h6>
                                        <form action="{{ route('bo.sales.credit-notes.apply', $creditNote) }}" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">{{ __('Facture') }}</label>
                                                    <select name="allocations[0][invoice_id]" class="select" required>
                                                        <option value="">{{ __('Sélectionner une facture') }}</option>
                                                        @foreach(\App\Models\Sales\Invoice::where('customer_id', $creditNote->customer_id)->where('amount_due', '>', 0)->get() as $inv)
                                                            <option value="{{ $inv->id }}">{{ $inv->number }} — {{ __('Restant') }} : {{ number_format($inv->amount_due, 2, ',', ' ') }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">{{ __('Montant à appliquer') }}</label>
                                                    <input type="number" name="allocations[0][amount_applied]" class="form-control" min="0.01" step="0.01" max="{{ $creditNote->total - $creditNote->applications->sum('amount_applied') }}" required>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-end">
                                                    <button type="submit" class="btn btn-primary w-100">{{ __('Appliquer') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif

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
