<?php $page = 'purchase-orders'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Bons de Commande')
@section('description', 'Liste de tous les bons de commande')
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
                    <h6>{{ __('Bons de commande') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'purchase-orders'])
                    <div>
                        <a href="{{ route('bo.purchases.purchase-orders.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau bon de commande') }}</a>
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
                                    <p class="mb-1">{{ __('Total commandes') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ number_format($purchaseOrders->total(), 0, ',', ' ') }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-primary rounded-circle">
                                        <i class="isax isax-clipboard-text"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Tous les bons de commande') }}</p>
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
                                    <p class="mb-1">{{ __('Confirmés') }}</p>
                                    <h6 class="fs-16 fw-semibold text-success">
                                        {{ \App\Models\Purchases\PurchaseOrder::where('status', 'confirmed')->count() }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-success rounded-circle">
                                        <i class="isax isax-tick-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Commandes confirmées') }}</p>
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
                                        {{ \App\Models\Purchases\PurchaseOrder::where('status', 'sent')->count() }}
                                    </h6>
                                </div>
                                <div>
                                    <span class="avatar bg-warning rounded-circle">
                                        <i class="isax isax-timer"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Commandes envoyées') }}</p>
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
                                    <p class="mb-1">{{ __('Annulés') }}</p>
                                    <h6 class="fs-16 fw-semibold text-danger">
                                        {{ \App\Models\Purchases\PurchaseOrder::where('status', 'cancelled')->count() }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-danger rounded-circle">
                                        <i class="isax isax-information"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">{{ __('Commandes annulées') }}</p>
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
                        <form action="{{ route('bo.purchases.purchase-orders.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un bon de commande...') }}" value="{{ request('search') }}">
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
                                <i class="isax isax-filter me-1"></i>{{ __('Statut :') }} <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('draft')
                                            {{ __('Brouillon') }}
                                        @break

                                        @case('sent')
                                            {{ __('Envoyé') }}
                                        @break

                                        @case('confirmed')
                                            {{ __('Confirmé') }}
                                        @break

                                        @case('partially_received')
                                            {{ __('Part. reçu') }}
                                        @break

                                        @case('received')
                                            {{ __('Reçu') }}
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
                                <li><a href="{{ route('bo.purchases.purchase-orders.index', array_merge(request()->except('status', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a></li>
                                <li><a href="{{ route('bo.purchases.purchase-orders.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}"
                                        class="dropdown-item">{{ __('Brouillon') }}</a></li>
                                <li><a href="{{ route('bo.purchases.purchase-orders.index', array_merge(request()->except('page'), ['status' => 'sent'])) }}"
                                        class="dropdown-item">{{ __('Envoyé') }}</a></li>
                                <li><a href="{{ route('bo.purchases.purchase-orders.index', array_merge(request()->except('page'), ['status' => 'confirmed'])) }}"
                                        class="dropdown-item">{{ __('Confirmé') }}</a></li>
                                <li><a href="{{ route('bo.purchases.purchase-orders.index', array_merge(request()->except('page'), ['status' => 'received'])) }}"
                                        class="dropdown-item">{{ __('Reçu') }}</a></li>
                                <li><a href="{{ route('bo.purchases.purchase-orders.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}"
                                        class="dropdown-item">{{ __('Annulé') }}</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('N°'), __('Fournisseur'), __('Date'), __('Total'), __('Statut')],
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
                            <th>{{ __('N°') }}</th>
                            <th>{{ __('Fournisseur') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseOrders as $po)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('bo.purchases.purchase-orders.show', $po) }}"
                                        class="fw-medium">{{ $po->number }}</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2">
                                            {{ strtoupper(substr($po->supplier->name ?? '', 0, 1)) }}
                                        </span>
                                        {{ $po->supplier->name ?? '—' }}
                                    </div>
                                </td>
                                <td>{{ $po->order_date->format('d/m/Y') }}</td>
                                <td class="text-dark fw-medium">{{ number_format($po->total, 2, ',', ' ') }}
                                    {{ $currency }}</td>
                                <td>
                                    @switch($po->status)
                                        @case('draft')
                                            <span
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">{{ __('Brouillon') }}</span>
                                        @break

                                        @case('sent')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('Envoyé') }}</span>
                                        @break

                                        @case('confirmed')
                                            <span class="badge badge-soft-primary d-inline-flex align-items-center">{{ __('Confirmé') }}</span>
                                        @break

                                        @case('partially_received')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('Partiellement reçu') }}</span>
                                        @break

                                        @case('received')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Reçu') }}<i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Annulé') }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.purchases.purchase-orders.show', $po) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        @if ($po->status === 'draft')
                                            <li>
                                                <a href="{{ route('bo.purchases.purchase-orders.edit', $po) }}"
                                                    class="dropdown-item d-flex align-items-center"><i
                                                        class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item d-flex align-items-center"
                                                    data-bs-toggle="modal" data-bs-target="#modalEnvoyer"
                                                    data-send-url="{{ route('bo.purchases.purchase-orders.send', $po) }}"
                                                    data-phone="{{ $po->supplier->phone ?? '' }}"
                                                    data-doc-number="{{ $po->number }}"
                                                    data-doc-type="le bon de commande"
                                                    data-download-url="{{ route('bo.purchases.purchase-orders.download', $po) }}">
                                                    <i class="isax isax-send-2 me-2"></i>{{ __('Envoyer') }}
                                                </button>
                                            </li>
                                        @endif
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.purchases.purchase-orders.destroy', $po) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce bon de commande ?') }}')">
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
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $purchaseOrders])

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
