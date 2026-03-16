<?php $page = 'purchase-orders'; ?>
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
                                    {{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}</td>
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
@endsection
