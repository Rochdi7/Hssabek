<?php $page = 'quotations'; ?>
@extends('backoffice.layout.mainlayout')
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
                    <h6>Devis</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'quotes'])
                    <div>
                        <a href="{{ route('bo.sales.quotes.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouveau devis
                        </a>
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

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.sales.quotes.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Rechercher un devis..." value="{{ request('search') }}">
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
                                <i class="isax isax-filter me-1"></i>Statut : <span class="fw-normal ms-1">
                                    @switch(request('status'))
                                        @case('draft')
                                            Brouillon
                                        @break

                                        @case('sent')
                                            Envoyé
                                        @break

                                        @case('accepted')
                                            Accepté
                                        @break

                                        @case('rejected')
                                            Rejeté
                                        @break

                                        @case('expired')
                                            Expiré
                                        @break

                                        @case('cancelled')
                                            Annulé
                                        @break

                                        @default
                                            Tous
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.sales.quotes.index', request()->except('status', 'page')) }}"
                                        class="dropdown-item">Tous</a>
                                </li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}"
                                        class="dropdown-item">Brouillon</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'sent'])) }}"
                                        class="dropdown-item">Envoyé</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'accepted'])) }}"
                                        class="dropdown-item">Accepté</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'rejected'])) }}"
                                        class="dropdown-item">Rejeté</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'expired'])) }}"
                                        class="dropdown-item">Expiré</a></li>
                                <li><a href="{{ route('bo.sales.quotes.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}"
                                        class="dropdown-item">Annulé</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => ['N°', 'Client', 'Date', 'Expiration', 'Total', 'Statut'],
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
                            <th class="no-sort">N°</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Expiration</th>
                            <th>Total</th>
                            <th class="no-sort">Statut</th>
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
                                                class="badge badge-soft-secondary d-inline-flex align-items-center">Brouillon</span>
                                        @break

                                        @case('sent')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">Envoyé <i
                                                    class="isax isax-send-2 ms-1"></i></span>
                                        @break

                                        @case('accepted')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Accepté <i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('rejected')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Rejeté <i
                                                    class="isax isax-close-circle ms-1"></i></span>
                                        @break

                                        @case('expired')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">Expiré <i
                                                    class="isax isax-timer ms-1"></i></span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Annulé <i
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
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                        @if ($quote->status === 'draft')
                                            <li>
                                                <a href="{{ route('bo.sales.quotes.edit', $quote) }}"
                                                    class="dropdown-item d-flex align-items-center"><i
                                                        class="isax isax-edit me-2"></i>Modifier</a>
                                            </li>
                                        @endif
                                        <li>
                                            <form method="POST" action="{{ route('bo.sales.quotes.destroy', $quote) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce devis ?')">
                                                    <i class="isax isax-trash me-2"></i>Supprimer
                                                </button>
                                            </form>
                                        </li>
                                        @if (in_array($quote->status, ['sent', 'accepted']))
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('bo.sales.quotes.convert', $quote) }}">
                                                    @csrf
                                                    <button class="dropdown-item d-flex align-items-center"
                                                        type="submit">
                                                        <i class="isax isax-convert me-2"></i>Convertir en facture
                                                    </button>
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
@endsection
