<?php $page = 'stock-transfers'; ?>
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
                    <h6><a href="{{ route('bo.inventory.transfers.index') }}"><i class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Transferts de stock') }}</a></h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @if($transfer->status === 'draft')
                        <a href="{{ route('bo.inventory.transfers.edit', $transfer) }}" class="btn btn-outline-white d-flex align-items-center fs-14 fw-semibold">
                            <i class="isax isax-edit-2 me-1"></i>{{ __('Modifier') }}
                        </a>
                        <form method="POST" action="{{ route('bo.inventory.transfers.execute', $transfer) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary d-flex align-items-center fs-14 fw-semibold"
                                onclick="return confirm('{{ __('Êtes-vous sûr de vouloir exécuter ce transfert ? Cette action est irréversible.') }}')">
                                <i class="isax isax-tick-circle me-1"></i>{{ __('Exécuter le transfert') }}
                            </button>
                        </form>
                    @endif
                    <form method="POST" action="{{ route('bo.inventory.transfers.destroy', $transfer) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger d-flex align-items-center fs-14 fw-semibold"
                            onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce transfert ?') }}')">
                            <i class="isax isax-trash me-1"></i>{{ __('Supprimer') }}
                        </button>
                    </form>
                </div>
            </div>
            <!-- End Page Header -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- start row -->
            <div class="row">
                <div class="col-xl-8">

                    <!-- Start Transfer Info -->
                    <div class="card bg-light customer-details-info position-relative overflow-hidden">
                        <div class="card-body position-relative z-1">
                            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-3">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                    <div class="avatar avatar-xxl rounded-circle flex-shrink-0">
                                        <span class="avatar avatar-xxl rounded-circle bg-primary text-white d-flex align-items-center justify-content-center border border-white border-2 fs-24 fw-bold">
                                            <i class="isax isax-convert-3d-cube"></i>
                                        </span>
                                    </div>
                                    <div class="">
                                        <p class="text-primary fs-14 fw-medium mb-1">
                                            {{ $transfer->number ?? __('Sans numéro') }}
                                        </p>
                                        <h6 class="mb-2">{{ __('Transfert de stock') }}
                                            @switch($transfer->status)
                                                @case('draft')
                                                    <span class="badge badge-soft-warning ms-1">{{ __('Brouillon') }}</span>
                                                    @break
                                                @case('in_transit')
                                                    <span class="badge badge-soft-info ms-1">{{ __('En transit') }}</span>
                                                    @break
                                                @case('received')
                                                    <span class="badge badge-soft-success ms-1">{{ __('Reçu') }}</span>
                                                    @break
                                                @case('cancelled')
                                                    <span class="badge badge-soft-danger ms-1">{{ __('Annulé') }}</span>
                                                    @break
                                            @endswitch
                                        </h6>
                                    </div>
                                </div>
                                @if($transfer->status === 'draft')
                                    <a href="{{ route('bo.inventory.transfers.edit', $transfer) }}"
                                        class="btn btn-outline-white border border-1 border-grey border-sm bg-white"><i
                                            class="isax isax-edit-2 fs-13 fw-semibold text-dark me-1"></i> {{ __('Modifier') }} </a>
                                @endif
                            </div>

                            <div class="card border-0 shadow shadow-none mb-0 bg-white">
                                <div class="card-body border-0 shadow shadow-none">
                                    <ul
                                        class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-0 m-0 list-unstyled">
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-building-4 fs-14 me-2"></i>{{ __('Source') }}</h6>
                                            <p> {{ $transfer->fromWarehouse->name ?? '—' }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-arrow-right-1 fs-14 me-2"></i>{{ __('Destination') }}</h6>
                                            <p> {{ $transfer->toWarehouse->name ?? '—' }} </p>
                                        </li>
                                        <li>
                                            <h6 class="mb-1 fs-14 fw-semibold"> <i
                                                    class="isax isax-box-1 fs-14 me-2"></i>{{ __('Produits') }}</h6>
                                            <p> {{ $transfer->items->count() }} </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <img src="{{ URL::asset('build/img/icons/elements-01.svg') }}" alt="elements-01"
                            class="img-fluid customer-details-bg">
                    </div><!-- end card -->
                    <!-- End Transfer Info -->

                    <!-- Start Items Table -->
                    <div class="card table-info">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Produits du transfert') }}</h6>
                            <div class="table-responsive table-nowrap">
                                <table class="table border m-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>{{ __('Produit') }}</th>
                                            <th>{{ __('Quantité') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transfer->items as $item)
                                            <tr>
                                                <td>
                                                    <h6 class="fs-14 fw-medium mb-0">{{ $item->product->name ?? '—' }}</h6>
                                                    <span class="fs-12 text-muted">{{ $item->product->code ?? '' }}</span>
                                                </td>
                                                <td>{{ number_format($item->quantity, 3, ',', ' ') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center py-3">
                                                    <p class="text-muted mb-0">{{ __('Aucun produit dans ce transfert.') }}</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Items Table -->

                </div><!-- end col -->
                <div class="col-xl-4">

                    <!-- Start Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Informations') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Numéro') }}</span>
                                    <span class="fw-semibold">{{ $transfer->number ?? '—' }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Statut') }}</span>
                                    <span class="fw-semibold">
                                        @switch($transfer->status)
                                            @case('draft') {{ __('Brouillon') }} @break
                                            @case('in_transit') {{ __('En transit') }} @break
                                            @case('received') {{ __('Reçu') }} @break
                                            @case('cancelled') {{ __('Annulé') }} @break
                                        @endswitch
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Entrepôt source') }}</span>
                                    <span class="fw-semibold">{{ $transfer->fromWarehouse->name ?? '—' }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Entrepôt destination') }}</span>
                                    <span class="fw-semibold">{{ $transfer->toWarehouse->name ?? '—' }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé par') }}</span>
                                    <span class="fw-semibold">{{ $transfer->createdBy->name ?? '—' }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $transfer->created_at->format('d/m/Y H:i') }}</span>
                                </li>
                                @if($transfer->shipped_at)
                                    <li class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-muted">{{ __('Expédié le') }}</span>
                                        <span class="fw-semibold">{{ $transfer->shipped_at->format('d/m/Y H:i') }}</span>
                                    </li>
                                @endif
                                @if($transfer->received_at)
                                    <li class="d-flex align-items-center justify-content-between mb-3">
                                        <span class="text-muted">{{ __('Reçu le') }}</span>
                                        <span class="fw-semibold">{{ $transfer->received_at->format('d/m/Y H:i') }}</span>
                                    </li>
                                @endif
                            </ul>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Info -->

                    <!-- Start Notes -->
                    @if($transfer->notes)
                        <div class="card">
                            <div class="card-body">
                                <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Notes') }}</h6>
                                <p class="mb-0">{{ $transfer->notes }}</p>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    @endif
                    <!-- End Notes -->

                    <!-- Start Actions -->
                    @if($transfer->status === 'draft')
                        <div class="card">
                            <div class="card-body">
                                <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Actions') }}</h6>
                                <div class="d-grid gap-2">
                                    <form method="POST" action="{{ route('bo.inventory.transfers.execute', $transfer) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100"
                                            onclick="return confirm('{{ __('Êtes-vous sûr de vouloir exécuter ce transfert ? Cette action est irréversible.') }}')">
                                            <i class="isax isax-tick-circle me-1"></i>{{ __('Exécuter le transfert') }}
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('bo.inventory.transfers.destroy', $transfer) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger w-100"
                                            onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce transfert ?') }}')">
                                            <i class="isax isax-trash me-1"></i>{{ __('Supprimer le transfert') }}
                                        </button>
                                    </form>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    @endif
                    <!-- End Actions -->

                </div>
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
