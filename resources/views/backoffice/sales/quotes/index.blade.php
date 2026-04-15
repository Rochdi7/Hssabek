<?php $page = 'quotations'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Devis')
@section('description', 'Liste de tous les devis')
@section('content')
    <!-- ========================
          Start Page Content
         ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Devis') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'quotes'])
                    <div>
                        <a href="{{ route('bo.sales.quotes.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau devis') }}</a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Summary Cards -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Total devis') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ number_format($quotes->total(), 0, ',', ' ') }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-primary rounded-circle">
                                        <i class="isax isax-document-text"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Tous les devis') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-01.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Acceptés') }}</p>
                                    <h6 class="fs-16 fw-semibold text-success">
                                        {{ \App\Models\Sales\Quote::where('status', 'accepted')->count() }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-success rounded-circle">
                                        <i class="isax isax-tick-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Devis acceptés') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-02.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Envoyés') }}</p>
                                    <h6 class="fs-16 fw-semibold text-warning">
                                        {{ \App\Models\Sales\Quote::where('status', 'sent')->count() }}
                                    </h6>
                                </div>
                                <div>
                                    <span class="avatar bg-warning rounded-circle">
                                        <i class="isax isax-timer"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Devis envoyés') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-03.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Expirés') }}</p>
                                    <h6 class="fs-16 fw-semibold text-danger">
                                        {{ \App\Models\Sales\Quote::where('status', 'expired')->count() }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-danger rounded-circle">
                                        <i class="isax isax-information"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Devis expirés') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-04.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Summary Cards -->

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.sales.quotes.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un devis...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if (request('status'))
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Statut') }} : <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('draft')
                                            {{ __('Brouillon') }}
                                        @break

                                        @case('sent')
                                            {{ __('Envoyé') }}
                                        @break

                                        @case('accepted')
                                            {{ __('Accepté') }}
                                        @break

                                        @case('rejected')
                                            {{ __('Rejeté') }}
                                        @break

                                        @case('expired')
                                            {{ __('Expiré') }}
                                        @break

                                        @case('cancelled')
                                            {{ __('Annulé') }}
                                        @break

                                        @default
                                            {{ __('Tous') }}
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.sales.quotes.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}"
                                        class="dropdown-item">{{ __('Brouillon') }}</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'sent'])) }}"
                                        class="dropdown-item">{{ __('Envoyé') }}</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'accepted'])) }}"
                                        class="dropdown-item">{{ __('Accepté') }}</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'rejected'])) }}"
                                        class="dropdown-item">{{ __('Rejeté') }}</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'expired'])) }}"
                                        class="dropdown-item">{{ __('Expiré') }}</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}"
                                        class="dropdown-item">{{ __('Annulé') }}</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('N°'), __('Client'), __('Date'), __('Expiration'), __('Total'), __('Statut')],
                        ])
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List -->
            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="no-sort">{{ __('N°') }}</th>
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Expiration') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotes as $quote)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('bo.sales.quotes.show', $quote) }}"
                                        class="link-default">{{ $quote->number }}</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2 flex-shrink-0">
                                            {{ strtoupper(substr($quote->customer->name ?? '?', 0, 1)) }}
                                        </span>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $quote->customer->name ?? '—' }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $quote->issue_date?->format('d/m/Y') }}</td>
                                <td>{{ $quote->expiry_date?->format('d/m/Y') ?? '—' }}</td>
                                <td class="text-dark">{{ number_format($quote->total, 2, ',', ' ') }}
                                    {{ $quote->currency }}</td>
                                <td>
                                    @switch($quote->status)
                                        @case('draft')
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">{{ __('Brouillon') }}</span>
                                        @break

                                        @case('sent')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('Envoyé') }} <i
                                                    class="isax isax-send-2 ms-1"></i></span>
                                        @break

                                        @case('accepted')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Accepté') }} <i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('rejected')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Rejeté') }} <i
                                                    class="isax isax-close-circle ms-1"></i></span>
                                        @break

                                        @case('expired')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('Expiré') }} <i
                                                    class="isax isax-timer ms-1"></i></span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Annulé') }} <i
                                                    class="isax isax-close-circle ms-1"></i></span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.sales.quotes.show', $quote) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        @if ($quote->status === 'draft')
                                            <li>
                                                <a href="{{ route('bo.sales.quotes.edit', $quote) }}"
                                                    class="dropdown-item d-flex align-items-center"><i
                                                        class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center"
                                                    data-bs-toggle="modal" data-bs-target="#modalEnvoyer"
                                                    data-send-url="{{ route('bo.sales.quotes.send', $quote) }}"
                                                    data-phone="{{ $quote->customer->phone ?? '' }}"
                                                    data-doc-number="{{ $quote->number }}"
                                                    data-doc-type="le devis"
                                                    data-download-url="{{ route('bo.sales.quotes.download', $quote) }}">
                                                    <i class="isax isax-send-2 me-2"></i>{{ __('Envoyer') }}
                                                </button>
                                            </li>
                                        @endif
                                        <li>
                                            <form method="POST" action="{{ route('bo.sales.quotes.destroy', $quote) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __("Êtes-vous sûr de vouloir supprimer ce devis ?") }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</button>
                                            </form>
                                        </li>
                                        @if (in_array($quote->status, ['sent', 'accepted']))
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('bo.sales.quotes.convert', $quote) }}">
                                                    @csrf
                                                    <button class="dropdown-item d-flex align-items-center"
                                                        type="submit">
                                                        <i class="isax isax-convert me-2"></i>{{ __('Convertir en facture') }}</button>
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $quotes])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
          End Page Content
         ========================= -->

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
