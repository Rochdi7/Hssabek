<?php $page = 'notifications'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">

        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h6>Toutes les notifications</h6>
                <div class="d-flex gap-2">
                    @if ($notifications->where('read_at', null)->count() > 0)
                        <form method="POST" action="{{ route('bo.notifications.markAllRead') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="ti ti-bell-check me-1"></i>Tout marquer comme lu
                            </button>
                        </form>
                    @endif
                    @if ($notifications->count() > 0)
                        <form method="POST" action="{{ route('bo.notifications.destroyAll') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="ti ti-trash me-1"></i>Tout supprimer
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <!-- End Breadcrumb -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
            @endif

            @forelse($notifications as $notification)
                <div class="card mb-3 {{ is_null($notification->read_at) ? 'border-start border-primary border-3' : '' }}">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="d-flex me-2">
                                <span class="avatar avatar-lg avatar-rounded">
                                    <span
                                        class="avatar-title bg-soft-{{ $notification->data['color'] ?? 'info' }} text-{{ $notification->data['color'] ?? 'info' }} rounded-circle">
                                        <i class="isax isax-{{ $notification->data['icon'] ?? 'notification' }} fs-18"></i>
                                    </span>
                                </span>
                            </div>
                            <div class="flex-fill ml-3">
                                <p class="mb-0">
                                    @if (!empty($notification->data['title']))
                                        <span class="fs-14 fw-semibold">{{ $notification->data['title'] }}</span>
                                    @endif
                                    <span>{{ $notification->data['message'] ?? '' }}</span>
                                    @if (!empty($notification->data['link_text']))
                                        <a href="{{ $notification->data['link_url'] ?? '#' }}"
                                            class="fs-14 fw-semibold">{{ $notification->data['link_text'] }}</a>
                                    @endif
                                </p>
                                <span class="fs-12 d-flex align-items-center"><i
                                        class="ti ti-clock me-1"></i>{{ $notification->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="d-flex gap-2 ms-3">
                                @if (is_null($notification->read_at))
                                    <form method="POST"
                                        action="{{ route('bo.notifications.markAsRead', $notification->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip"
                                            title="Marquer comme lu">
                                            <i class="ti ti-bell-check"></i>
                                        </button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('bo.notifications.destroy', $notification->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                        title="Supprimer">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card mb-0">
                    <div class="card-body text-center py-5">
                        <i class="isax isax-notification fs-48 text-muted d-block mb-3"></i>
                        <p class="text-muted mb-0">Aucune notification pour le moment.</p>
                    </div>
                </div>
            @endforelse

            @include('backoffice.components.table-footer', ['paginator' => $notifications])

        </div>

    </div>
@endsection
