<?php $page = 'stock-transfers'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Transferts de Stock')
@section('description', 'Liste de tous les transferts entre entrepôts')
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
                    <h6>{{ __('Transferts de stock') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'stock-transfers'])
                    <div>
                        <a href="{{ route('bo.inventory.transfers.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau transfert') }}
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

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.inventory.transfers.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher par numéro...') }}" value="{{ request('search') }}">
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

                                        @case('in_transit')
                                            {{ __('En transit') }}
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
                                <li>
                                    <a href="{{ route('bo.inventory.transfers.index', array_merge(request()->except('status', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li><a href="{{ route('bo.inventory.transfers.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}"
                                        class="dropdown-item">{{ __('Brouillon') }}</a></li>
                                <li><a href="{{ route('bo.inventory.transfers.index', array_merge(request()->except('page'), ['status' => 'in_transit'])) }}"
                                        class="dropdown-item">{{ __('En transit') }}</a></li>
                                <li><a href="{{ route('bo.inventory.transfers.index', array_merge(request()->except('page'), ['status' => 'received'])) }}"
                                        class="dropdown-item">{{ __('Reçu') }}</a></li>
                                <li><a href="{{ route('bo.inventory.transfers.index', array_merge(request()->except('page'), ['status' => 'cancelled'])) }}"
                                        class="dropdown-item">{{ __('Annulé') }}</a></li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                __('Numéro'),
                                __('Entrepôt source'),
                                __('Entrepôt destination'),
                                __('Statut'),
                                __('Créé par'),
                                __('Date'),
                            ],
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
                            <th>{{ __('Numéro') }}</th>
                            <th>{{ __('Entrepôt source') }}</th>
                            <th>{{ __('Entrepôt destination') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th>{{ __('Créé par') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transfers as $transfer)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <h6 class="fs-14 fw-medium mb-0">
                                        <a
                                            href="{{ route('bo.inventory.transfers.show', $transfer) }}">{{ $transfer->number ?? '—' }}</a>
                                    </h6>
                                </td>
                                <td>{{ $transfer->fromWarehouse->name ?? '—' }}</td>
                                <td>{{ $transfer->toWarehouse->name ?? '—' }}</td>
                                <td>
                                    @switch($transfer->status)
                                        @case('draft')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('Brouillon') }}</span>
                                        @break

                                        @case('in_transit')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('En transit') }}</span>
                                        @break

                                        @case('received')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Reçu') }} <i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Annulé') }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>{{ $transfer->createdBy->name ?? '—' }}</td>
                                <td>{{ $transfer->created_at->format('d/m/Y') }}</td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.inventory.transfers.show', $transfer) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        @if ($transfer->status === 'draft')
                                            <li>
                                                <a href="{{ route('bo.inventory.transfers.edit', $transfer) }}"
                                                    class="dropdown-item d-flex align-items-center"><i
                                                        class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                            </li>
                                        @endif
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.inventory.transfers.destroy', $transfer) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce transfert ?') }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}
                                                </button>
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

            @include('backoffice.components.table-footer', ['paginator' => $transfers])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
          End Page Content
         ========================= -->
@endsection
