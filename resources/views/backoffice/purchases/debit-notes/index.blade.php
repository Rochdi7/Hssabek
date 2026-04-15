<?php $page = 'debit-notes'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Notes de Débit')
@section('description', 'Liste de toutes les notes de débit')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Notes de débit') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'debit-notes'])
                    <div>
                        <a href="{{ route('bo.purchases.debit-notes.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouvelle note de débit') }}</a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
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
                                    <p class="mb-1">{{ __('Total notes') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ number_format($debitNotes->total(), 0, ',', ' ') }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-primary rounded-circle">
                                        <i class="isax isax-receipt-minus"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Toutes les notes de débit') }}</p>
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
                                    <p class="mb-1">{{ __('Émises') }}</p>
                                    <h6 class="fs-16 fw-semibold text-success">
                                        {{ \App\Models\Purchases\DebitNote::where('status', 'issued')->count() }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-success rounded-circle">
                                        <i class="isax isax-tick-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Notes émises') }}</p>
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
                                    <p class="mb-1">{{ __('Appliquées') }}</p>
                                    <h6 class="fs-16 fw-semibold text-warning">
                                        {{ \App\Models\Purchases\DebitNote::where('status', 'applied')->count() }}
                                    </h6>
                                </div>
                                <div>
                                    <span class="avatar bg-warning rounded-circle">
                                        <i class="isax isax-timer"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Notes appliquées') }}</p>
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
                                    <p class="mb-1">{{ __('Annulées') }}</p>
                                    <h6 class="fs-16 fw-semibold text-danger">
                                        {{ \App\Models\Purchases\DebitNote::where('status', 'void')->count() }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-danger rounded-circle">
                                        <i class="isax isax-information"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Notes annulées') }}</p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-04.svg') }}" alt="img">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Summary Cards -->

            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.purchases.debit-notes.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher une note de débit...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Statut :') }} <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('draft')
                                            {{ __('Brouillon') }}
                                        @break

                                        @case('sent')
                                            {{ __('Envoyée') }}
                                        @break

                                        @case('applied')
                                            {{ __('Appliquée') }}
                                        @break

                                        @default
                                            {{ __('Tous') }}
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="{{ route('bo.purchases.debit-notes.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a></li>
                                <li><a href="{{ route('bo.purchases.debit-notes.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}"
                                        class="dropdown-item">{{ __('Brouillon') }}</a></li>
                                <li><a href="{{ route('bo.purchases.debit-notes.index', array_merge(request()->except('page'), ['status' => 'sent'])) }}"
                                        class="dropdown-item">{{ __('Envoyée') }}</a></li>
                                <li><a href="{{ route('bo.purchases.debit-notes.index', array_merge(request()->except('page'), ['status' => 'applied'])) }}"
                                        class="dropdown-item">{{ __('Appliquée') }}</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('N° Note'), __('Date'), __('Fournisseur'), __('Montant'), __('Statut')],
                        ])
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>{{ __('N° Note') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Fournisseur') }}</th>
                            <th>{{ __('Montant') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($debitNotes as $note)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td><span class="fw-medium">{{ $note->number }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($note->debit_note_date)->format('d/m/Y') }}</td>
                                <td>{{ $note->supplier->name ?? '—' }}</td>
                                <td class="fw-semibold">{{ number_format($note->total_amount ?? 0, 2, ',', ' ') }}</td>
                                <td>
                                    @switch($note->status)
                                        @case('draft')
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">{{ __('Brouillon') }}</span>
                                        @break

                                        @case('sent')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('Envoyée') }}</span>
                                        @break

                                        @case('applied')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Appliquée') }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.purchases.debit-notes.show', $note) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.purchases.debit-notes.edit', $note) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        @if($note->status === 'draft')
                                        <li>
                                            <button type="button" class="dropdown-item d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#modalEnvoyer"
                                                data-send-url="{{ route('bo.purchases.debit-notes.send', $note) }}"
                                                data-phone="{{ $note->supplier->phone ?? '' }}"
                                                data-doc-number="{{ $note->number }}"
                                                data-doc-type="la note de débit"
                                                data-download-url="{{ route('bo.purchases.debit-notes.download', $note) }}">
                                                <i class="isax isax-send-2 me-2"></i>{{ __('Envoyer') }}
                                            </button>
                                        </li>
                                        @endif
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.purchases.debit-notes.destroy', $note) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette note de débit ?') }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $debitNotes])

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
