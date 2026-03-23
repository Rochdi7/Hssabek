<?php $page = 'money-transfers'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Virement')
@section('description', 'Consulter les détails du virement')
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
                    <h6><a href="{{ route('bo.finance.money-transfers.index') }}"><i class="isax isax-arrow-left fs-16 me-2"></i>{{ __('Transferts entre comptes') }}</a></h6>
                </div>
            </div>
            <!-- End Page Header -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
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
                                            <i class="isax isax-convert-card"></i>
                                        </span>
                                    </div>
                                    <div class="">
                                        <p class="text-primary fs-14 fw-medium mb-1">
                                            {{ $moneyTransfer->reference_number ?? __('Sans référence') }}
                                        </p>
                                        <h6 class="mb-2">{{ __('Transfert du') }} {{ \Carbon\Carbon::parse($moneyTransfer->transfer_date)->format('d/m/Y') }}
                                            @switch($moneyTransfer->status)
                                                @case('completed')
                                                    <span class="badge badge-soft-success ms-1">{{ __('Complété') }}</span>
                                                    @break
                                                @case('pending')
                                                    <span class="badge badge-soft-warning ms-1">{{ __('En attente') }}</span>
                                                    @break
                                                @case('cancelled')
                                                    <span class="badge badge-soft-danger ms-1">{{ __('Annulé') }}</span>
                                                    @break
                                            @endswitch
                                        </h6>
                                        <p class="fs-14 fw-regular">
                                            <i class="isax isax-money-send fs-14 me-1 text-gray-9"></i>
                                            {{ __('Montant') }} : <strong>{{ number_format($moneyTransfer->amount, 2, ',', ' ') }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow shadow-none mb-0 bg-white">
                                <div class="card-body border-0 shadow shadow-none">
                                    <div class="row">
                                        <div class="col-md-5 text-center">
                                            <h6 class="mb-1 fs-14 fw-semibold"><i class="isax isax-bank fs-14 me-1"></i> {{ __('Compte source') }}</h6>
                                            <p class="fw-medium mb-0">{{ $moneyTransfer->fromBankAccount->bank_name ?? '—' }}</p>
                                            <p class="text-muted fs-13 mb-0">{{ $moneyTransfer->fromBankAccount->account_number ?? '' }}</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex align-items-center justify-content-center">
                                            <i class="isax isax-arrow-right fs-24 text-primary"></i>
                                        </div>
                                        <div class="col-md-5 text-center">
                                            <h6 class="mb-1 fs-14 fw-semibold"><i class="isax isax-bank fs-14 me-1"></i> {{ __('Compte destination') }}</h6>
                                            <p class="fw-medium mb-0">{{ $moneyTransfer->toBankAccount->bank_name ?? '—' }}</p>
                                            <p class="text-muted fs-13 mb-0">{{ $moneyTransfer->toBankAccount->account_number ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                        <img src="{{ URL::asset('build/img/icons/elements-01.svg') }}" alt="elements-01"
                            class="img-fluid customer-details-bg">
                    </div><!-- end card -->
                    <!-- End Transfer Info -->

                </div><!-- end col -->
                <div class="col-xl-4">
                    <!-- Start Info -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Détails') }}</h6>
                            <ul class="list-unstyled m-0 p-0">
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Montant') }}</span>
                                    <span class="fw-semibold">{{ number_format($moneyTransfer->amount, 2, ',', ' ') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Date') }}</span>
                                    <span class="fw-semibold">{{ \Carbon\Carbon::parse($moneyTransfer->transfer_date)->format('d/m/Y') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Référence') }}</span>
                                    <span class="fw-semibold">{{ $moneyTransfer->reference_number ?? '—' }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Statut') }}</span>
                                    <span class="fw-semibold">
                                        @switch($moneyTransfer->status)
                                            @case('completed') {{ __('Complété') }} @break
                                            @case('pending') {{ __('En attente') }} @break
                                            @case('cancelled') {{ __('Annulé') }} @break
                                        @endswitch
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="text-muted">{{ __('Créé le') }}</span>
                                    <span class="fw-semibold">{{ $moneyTransfer->created_at->format('d/m/Y H:i') }}</span>
                                </li>
                            </ul>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Info -->

                    @if($moneyTransfer->notes)
                    <!-- Start Notes -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="pb-3 mb-3 border-1 border-bottom border-gray">{{ __('Notes') }}</h6>
                            <p class="mb-0">{{ $moneyTransfer->notes }}</p>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- End Notes -->
                    @endif
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
