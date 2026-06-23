?<?php $page = 'quotation-details'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', $documentConfig['details_title'])
@section('description', $documentConfig['details_title'])
@section('content')
    @php
        $documentRouteBase = $documentConfig['route_base'];
        $documentDownloadRoute = route('public.quote-document.download', ['type' => $documentConfig['public_slug'], 'token' => $quote->public_token]);
        $whatsAppText = rawurlencode('Bonjour,' . "\n\n" . 'Veuillez trouver ci-joint ' . $documentConfig['definite_label'] . ' n� ' . $quote->number . '.' . "\n" . 'T�l�charger le PDF : ' . $documentDownloadRoute . "\n\n" . 'Cordialement.');
    @endphp
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                            <h6><a href="{{ route($documentRouteBase . '.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ $documentConfig['label'] }}</a></h6>
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <a href="{{ $documentDownloadRoute }}" target="_blank" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-document-download me-1"></i>{{ __('Télécharger PDF') }}</a>
                                {{-- WhatsApp share — always visible --}}
                                <a href="https://api.whatsapp.com/send?phone={{ rawurlencode($quote->customer->phone ?? '') }}&text={{ $whatsAppText }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="btn btn-success d-inline-flex align-items-center me-3">
                                    <i class="isax isax-message me-1"></i>{{ __('WhatsApp') }}
                                </a>
                                <button type="button" class="btn btn-outline-white d-inline-flex align-items-center me-3"
                                    data-bs-toggle="modal" data-bs-target="#modalChangerStatut">
                                    <i class="isax isax-edit-2 me-1"></i>{{ __('Changer statut') }}
                                </button>
                                @if($quote->normalizedStatus() === 'active')
                                    <a href="{{ route($documentRouteBase . '.edit', $quote) }}" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-edit me-1"></i>{{ __('Modifier') }}</a>
                                    <button type="button" class="btn btn-primary d-inline-flex align-items-center me-3"
                                        data-bs-toggle="modal" data-bs-target="#modalEnvoyer"
                                        data-send-url="{{ route($documentRouteBase . '.send', $quote) }}"
                                        data-phone="{{ $quote->customer->phone ?? '' }}"
                                        data-doc-number="{{ $quote->number }}"
                                        data-doc-type="{{ $documentConfig['definite_label'] }}"
                                        data-download-url="{{ $documentDownloadRoute }}">
                                        <i class="isax isax-send-2 me-1"></i>{{ __('Envoyer') }}
                                    </button>
                                @endif
                                @if(in_array($quote->normalizedStatus(), ['active', 'accepted']))
                                    <form method="POST" action="{{ route($documentRouteBase . '.convert', $quote) }}" class="me-3">
                                        @csrf
                                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                                            <i class="isax isax-convert me-1"></i>{{ __('Convertir en facture') }}</button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route($documentRouteBase . '.destroy', $quote) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger d-inline-flex align-items-center"
                                        onclick="return confirm('{{ $documentConfig['delete_confirmation'] }}')">
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
                                            <h4 class="mb-1">{{ $documentConfig['label'] }}</h4>
                                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                <div class="me-4">
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ $quote->number }}</h6>
                                                    <p>
                                                        <span class="badge {{ $quote->statusBadgeClass() }}">{{ __($quote->statusLabel()) }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row gy-3 position-relative z-1">
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ $documentConfig['details_title'] }}</h6>
                                                <div>
                                                    <p class="mb-1">{{ $documentConfig['number_label'] }} : <span class="text-dark">{{ $quote->number }}</span></p>
                                                    <p class="mb-1">{{ __('Date d\'émission') }} : <span class="text-dark">{{ $quote->issue_date?->format('d/m/Y') }}</span></p>
                                                    @if($quote->expiry_date)
                                                        <p class="mb-1">{{ __('Date d\'expiration') }} : <span class="text-dark">{{ $quote->expiry_date->format('d/m/Y') }}</span></p>
                                                    @endif
                                                    @if($quote->reference_number)
                                                        <p class="mb-1">{{ __('Référence') }} : <span class="text-dark">{{ $quote->reference_number }}</span></p>
                                                    @endif
                                                    <p class="mb-1">{{ __('Devise') }} : <span class="text-dark">{{ $quote->currency }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Client') }}</h6>
                                                <div>
                                                    <h6 class="fs-14 fw-semibold mb-1">{{ $quote->customer->name ?? '—' }}</h6>
                                                    @if($quote->customer?->email)
                                                        <p class="mb-1">{{ __('Email') }} : {{ $quote->customer->email }}</p>
                                                    @endif
                                                    @if($quote->customer?->phone)
                                                        <p class="mb-1">{{ __('Tél') }} : {{ $quote->customer->phone }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Total') }}</h6>
                                                <div>
                                                    <p class="mb-1">{{ __('Total') }} : <span class="text-dark fw-semibold">{{ number_format($quote->total, 2, ',', ' ') }} {{ $quote->currency }}</span></p>
                                                </div>
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
                                                    <th>{{ __('Unité') }}</th>
                                                    <th>{{ __('Prix unitaire') }}</th>
                                                    <th>{{ __('Remise') }}</th>
                                                    <th>{{ __('Taxe') }}</th>
                                                    <th>{{ __('Montant') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($quote->items as $item)
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

                                <div class="border-bottom mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @if($quote->notes || $quote->terms)
                                                <div class="mb-3 p-4">
                                                    @if($quote->terms)
                                                        <div class="mb-3">
                                                            <h6 class="fs-14 fw-semibold mb-1">{{ __('Conditions générales') }}</h6>
                                                            <p>{{ $quote->terms }}</p>
                                                        </div>
                                                    @endif
                                                    @if($quote->notes)
                                                        <div>
                                                            <h6 class="fs-14 fw-semibold mb-1">{{ __('Notes') }}</h6>
                                                            <p>{{ $quote->notes }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3 p-4">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <h6 class="fs-14 fw-semibold">{{ __("Sous-total") }}</h6>
                                                    <h6 class="fs-14 fw-semibold">{{ number_format($quote->subtotal, 2, ',', ' ') }}</h6>
                                                </div>
                                                @if($quote->discount_total > 0)
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">{{ __('Remise') }}</h6>
                                                        <h6 class="fs-14 fw-semibold text-danger">-{{ number_format($quote->discount_total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                @endif
                                                @if($quote->tax_total > 0)
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <h6 class="fs-14 fw-semibold">{{ __('Taxe') }}</h6>
                                                        <h6 class="fs-14 fw-semibold">{{ number_format($quote->tax_total, 2, ',', ' ') }}</h6>
                                                    </div>
                                                @endif
                                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                                    <h6>Total ({{ $quote->currency }})</h6>
                                                    <h6>{{ number_format($quote->total, 2, ',', ' ') }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($quote->invoices->count() > 0)
                                    <div class="mb-3">
                                        <h6 class="mb-3">{{ __('Factures liées') }}</h6>
                                        <div class="table-responsive rounded border-bottom-0 border table-nowrap">
                                            <table class="table m-0">
                                                <thead style="background-color: #1B2850; color: #fff;">
                                                    <tr>
                                                        <th>{{ __('N° Facture') }}</th>
                                                        <th>{{ __('Date') }}</th>
                                                        <th>{{ __('Total') }}</th>
                                                        <th>{{ __('Statut') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($quote->invoices as $inv)
                                                        <tr>
                                                            <td><a href="{{ route('bo.sales.invoices.show', $inv) }}">{{ $inv->number }}</a></td>
                                                            <td>{{ $inv->issue_date?->format('d/m/Y') }}</td>
                                                            <td>{{ number_format($inv->total, 2, ',', ' ') }} {{ $inv->currency }}</td>
                                                            <td>
                                                                <span class="badge {{ $inv->statusBadgeClass() }}">{{ __($inv->statusLabel()) }}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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

{{-- Modal Envoyer --}}
<div class="modal fade" id="modalEnvoyer" tabindex="-1" aria-labelledby="modalEnvoyerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEnvoyerLabel">{{ __('Envoyer le document') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-4">{{ __('Choisissez le moyen d\'envoi :') }}</p>
                <div class="d-grid gap-3">
                    <form id="formEnvoyerEmail" method="POST" action="">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="isax isax-sms me-2"></i>{{ __('Envoyer par Email') }}
                        </button>
                    </form>
                    <a id="btnWhatsApp" href="#" target="_blank" rel="noopener noreferrer"
                        class="btn btn-success w-100">
                        <i class="isax isax-message me-2"></i>{{ __('Envoyer par WhatsApp') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Changer Statut --}}
<div class="modal fade" id="modalChangerStatut" tabindex="-1" aria-labelledby="modalChangerStatutLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangerStatutLabel">{{ $documentConfig['status_modal_title'] }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"></button>
            </div>
            <form method="POST" action="{{ route($documentRouteBase . '.change-status', $quote) }}">
                @csrf
                <div class="modal-body">
                    <p class="text-muted mb-3">{{ __('Statut actuel :') }}
                        <strong>{{ __($quote->statusLabel()) }}</strong>
                    </p>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Nouveau statut') }}</label>
                        <select name="status" class="form-select" required>
                            <option value="active" @selected($quote->normalizedStatus() === 'active')>{{ __('Actif') }}</option>
                            <option value="accepted" @selected($quote->status === 'accepted')>{{ __('Accepté') }}</option>
                            <option value="rejected" @selected($quote->status === 'rejected')>{{ __('Rejeté') }}</option>
                            <option value="expired" @selected($quote->status === 'expired')>{{ __('Expiré') }}</option>
                            <option value="cancelled" @selected($quote->status === 'cancelled')>{{ __('Annulé') }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('modalEnvoyer').addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        const sendUrl = btn.dataset.sendUrl;
        const phone = (btn.dataset.phone || '').replace(/[^0-9+]/g, '');
        const docNumber = btn.dataset.docNumber || '';
        const docType = btn.dataset.docType || 'le document';
        const downloadUrl = btn.dataset.downloadUrl || '';

        document.getElementById('formEnvoyerEmail').action = sendUrl;

        const pdfLink = downloadUrl ? ('\n📎 Télécharger le PDF : ' + downloadUrl) : '';
        const message = encodeURIComponent('Bonjour,\n\nVeuillez trouver ci-joint ' + docType + ' n° ' + docNumber + '.' + pdfLink + '\n\nCordialement.');
        const waBtn = document.getElementById('btnWhatsApp');
        if (phone) {
            waBtn.href = 'https://api.whatsapp.com/send?phone=' + phone + '&text=' + message;
            waBtn.classList.remove('disabled');
            waBtn.removeAttribute('title');
        } else {
            waBtn.href = '#';
            waBtn.classList.add('disabled');
            waBtn.title = 'Numéro de téléphone non disponible';
        }
    });
</script>
@endpush
@endsection

