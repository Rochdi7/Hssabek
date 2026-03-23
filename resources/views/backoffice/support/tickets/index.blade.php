<?php $page = 'support-tickets'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Tickets de Support')
@section('description', 'Liste de vos tickets de support')
@section('content')
    <!-- ========================
          Start Page Content
         ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Breadcrumb Start -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Tickets de support') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div>
                        <a href="{{ route('bo.support.tickets.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau ticket') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb End -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- row start -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Total tickets') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $totalCount }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-primary rounded-circle">
                                        <i class="isax isax-receipt-item"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">
                                <span class="badge badge-soft-primary">{{ $openCount }} {{ __('ouverts') }}</span>
                            </p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-01.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Résolus') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $resolvedCount }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-success rounded-circle">
                                        <i class="isax isax-tick-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">
                                <span class="badge badge-soft-success">{{ __('Terminés') }}</span>
                            </p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-02.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('En cours') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $inProgressCount }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-warning rounded-circle">
                                        <i class="isax isax-timer"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">
                                <span class="badge badge-soft-warning">{{ __('En traitement') }}</span>
                            </p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-03.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2 pb-2 border-bottom">
                                <div>
                                    <p class="mb-1">{{ __('Fermés') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $closedCount }}</h6>
                                </div>
                                <div>
                                    <span class="avatar bg-danger rounded-circle">
                                        <i class="isax isax-information"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="fs-13 mb-0">
                                <span class="badge badge-soft-secondary">{{ __('Clôturés') }}</span>
                            </p>
                            <span class="position-absolute end-0 bottom-0">
                                <img src="{{ URL::asset('build/img/bg/card-overlay-04.svg') }}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->

            <ul class="nav nav-tabs nav-bordered mb-3 ticket-list-tab">
                <li class="nav-item"><a class="nav-link {{ !request('status') ? 'active' : '' }}" href="{{ route('bo.support.tickets.index', request()->except('status', 'page')) }}">{{ __('Tous') }}</a></li>
                <li class="nav-item"><a class="nav-link {{ request('status') === 'open' ? 'active' : '' }}" href="{{ route('bo.support.tickets.index', array_merge(request()->except('page'), ['status' => 'open'])) }}">{{ __('Ouverts') }}</a></li>
                <li class="nav-item"><a class="nav-link {{ request('status') === 'in_progress' ? 'active' : '' }}" href="{{ route('bo.support.tickets.index', array_merge(request()->except('page'), ['status' => 'in_progress'])) }}">{{ __('En cours') }}</a></li>
                <li class="nav-item"><a class="nav-link {{ request('status') === 'resolved' ? 'active' : '' }}" href="{{ route('bo.support.tickets.index', array_merge(request()->except('page'), ['status' => 'resolved'])) }}">{{ __('Résolus') }}</a></li>
                <li class="nav-item"><a class="nav-link {{ request('status') === 'on_hold' ? 'active' : '' }}" href="{{ route('bo.support.tickets.index', array_merge(request()->except('page'), ['status' => 'on_hold'])) }}">{{ __('En attente') }}</a></li>
                <li class="nav-item"><a class="nav-link {{ request('status') === 'closed' ? 'active' : '' }}" href="{{ route('bo.support.tickets.index', array_merge(request()->except('page'), ['status' => 'closed'])) }}">{{ __('Fermés') }}</a></li>
            </ul>

            <div class="d-flex align-items-start overflow-auto project-status">
                <div class="rounded w-100">
                    <div class="kanban-drag-wrap">
                        @forelse ($tickets as $ticket)
                            <a href="{{ route('bo.support.tickets.show', $ticket) }}" class="text-decoration-none">
                                <div class="card kanban-card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-14 me-2 fw-semibold">{{ Str::limit($ticket->subject, 60) }}</h6>
                                                @php
                                                    $dotColor = match($ticket->status) {
                                                        'open' => 'bg-primary',
                                                        'in_progress' => 'bg-info',
                                                        'on_hold' => 'bg-warning',
                                                        'resolved' => 'bg-success',
                                                        'closed' => 'bg-secondary',
                                                        default => 'bg-secondary',
                                                    };
                                                @endphp
                                                <span class="badge {{ $ticket->status_badge }} badge-sm d-inline-flex align-items-center"><span class="badge-dot {{ $dotColor }} me-2"></span>{{ $ticket->status_label }}</span>
                                            </div>
                                            <span class="d-flex align-items-center text-gray-9 fs-12"><i class="isax isax-clock me-1"></i>{{ $ticket->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-muted">{{ Str::limit($ticket->description, 180) }}</p>
                                        <div class="d-flex align-items-center">
                                            <span class="badge {{ $ticket->priority_badge }} badge-sm d-flex align-items-center justify-content-center me-3">{{ $ticket->priority_label }}</span>
                                            <span class="badge badge-soft-light text-dark badge-sm d-flex align-items-center justify-content-center me-3">{{ $ticket->ticket_number }}</span>
                                            <span class="badge {{ $ticket->category_badge }} badge-sm d-flex align-items-center justify-content-center me-3">{{ $ticket->category_label }}</span>
                                            <span class="fs-12 text-gray-9"><i class="isax isax-message-text me-1 text-gray-9"></i>{{ $ticket->replies_count }}</span>
                                        </div>
                                    </div>
                                    <!-- card body end -->
                                </div>
                            </a>
                            <!-- card end -->
                        @empty
                            <div class="card mb-3">
                                <div class="card-body text-center text-muted py-4">
                                    {{ __('Aucun ticket de support.') }}
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            @if ($tickets->hasPages())
                @include('backoffice.components.table-footer', ['paginator' => $tickets])
            @endif

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
          End Page Content
         ========================= -->
@endsection
