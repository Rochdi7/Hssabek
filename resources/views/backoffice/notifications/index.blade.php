<?php $page = 'notifications'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Notifications')
@section('description', 'Consulter vos notifications')
@section('content')
    <div class="page-wrapper">

        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <h6>{{ __('Centre de notifications') }}</h6>
                <div class="d-flex gap-2">
                    @if ($notifications->where('read_at', null)->count() > 0)
                        <form method="POST" action="{{ route('bo.notifications.markAllRead') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                <i class="ti ti-bell-check me-1"></i>{{ __('Tout marquer comme lu') }}
                            </button>
                        </form>
                    @endif
                    @if ($notifications->count() > 0)
                        <form method="POST" action="{{ route('bo.notifications.destroyAll') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="ti ti-trash me-1"></i>{{ __('Tout supprimer') }}
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

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs nav-tabs-solid nav-justified mb-4" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active d-flex align-items-center justify-content-center" id="system-tab"
                        data-bs-toggle="tab" data-bs-target="#system-notifications" type="button" role="tab">
                        <i class="isax isax-notification me-2"></i>
                        {{ __('Notifications système') }}
                        @if ($systemNotifications->where('read_at', null)->count() > 0)
                            <span
                                class="badge bg-primary ms-2">{{ $systemNotifications->where('read_at', null)->count() }}</span>
                        @endif
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link d-flex align-items-center justify-content-center" id="announcements-tab"
                        data-bs-toggle="tab" data-bs-target="#admin-announcements" type="button" role="tab">
                        <i class="isax isax-message-text me-2"></i>
                        {{ __('Annonces de l\'administrateur') }}
                        @if ($announcements->count() > 0)
                            <span class="badge bg-info ms-2">{{ $announcements->count() }}</span>
                        @endif
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                <!-- System Notifications Tab -->
                <div class="tab-pane fade show active" id="system-notifications" role="tabpanel">
                    @forelse($systemNotifications as $notification)
                        <div
                            class="card mb-3 {{ is_null($notification->read_at) ? 'border-start border-primary border-3' : '' }}">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex me-2">
                                        <span class="avatar avatar-lg avatar-rounded">
                                            <span
                                                class="avatar-title bg-soft-{{ $notification->data['color'] ?? 'info' }} text-{{ $notification->data['color'] ?? 'info' }} rounded-circle">
                                                <i
                                                    class="isax isax-{{ $notification->data['icon'] ?? 'notification' }} fs-18"></i>
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
                                        <span class="fs-12 d-flex align-items-center text-muted">
                                            <i
                                                class="ti ti-clock me-1"></i>{{ $notification->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="d-flex gap-2 ms-3">
                                        @if (is_null($notification->read_at))
                                            <form method="POST"
                                                action="{{ route('bo.notifications.markAsRead', $notification->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-info"
                                                    data-bs-toggle="tooltip" title="{{ __('Marquer comme lu') }}">
                                                    <i class="ti ti-bell-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <form method="POST"
                                            action="{{ route('bo.notifications.destroy', $notification->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="tooltip" title="{{ __('Supprimer') }}">
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
                                <p class="text-muted mb-0">{{ __('Aucune notification système pour le moment.') }}</p>
                            </div>
                        </div>
                    @endforelse

                    @if ($systemNotifications->hasPages())
                        <div class="mt-3">
                            {{ $systemNotifications->appends(['tab' => 'system'])->links() }}
                        </div>
                    @endif
                </div>

                <!-- Admin Announcements Tab -->
                <div class="tab-pane fade" id="admin-announcements" role="tabpanel">
                    @forelse($announcements as $announcement)
                        <div class="card mb-3 border-start border-{{ $announcement->type ?? 'info' }} border-3">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="d-flex me-3">
                                        <span class="avatar avatar-lg avatar-rounded">
                                            <span
                                                class="avatar-title bg-soft-{{ $announcement->type ?? 'info' }} text-{{ $announcement->type ?? 'info' }} rounded-circle">
                                                @switch($announcement->type)
                                                    @case('warning')
                                                        <i class="isax isax-warning-2 fs-18"></i>
                                                    @break

                                                    @case('danger')
                                                        <i class="isax isax-danger fs-18"></i>
                                                    @break

                                                    @case('success')
                                                        <i class="isax isax-tick-circle fs-18"></i>
                                                    @break

                                                    @default
                                                        <i class="isax isax-info-circle fs-18"></i>
                                                @endswitch
                                            </span>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-1">{{ $announcement->title }}</h6>
                                                <span
                                                    class="badge bg-soft-{{ $announcement->type ?? 'info' }} text-{{ $announcement->type ?? 'info' }} fs-10">
                                                    @switch($announcement->type)
                                                        @case('warning')
                                                            {{ __('Attention') }}
                                                        @break

                                                        @case('danger')
                                                            {{ __('Urgent') }}
                                                        @break

                                                        @case('success')
                                                            {{ __('Succès') }}
                                                        @break

                                                        @default
                                                            {{ __('Information') }}
                                                    @endswitch
                                                </span>
                                            </div>
                                            <span class="fs-12 text-muted">
                                                <i
                                                    class="ti ti-clock me-1"></i>{{ $announcement->published_at?->diffForHumans() ?? $announcement->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <div class="announcement-content text-muted">
                                            {!! $announcement->content !!}
                                        </div>
                                        @if ($announcement->expires_at)
                                            <div class="mt-2">
                                                <small class="text-muted">
                                                    <i class="ti ti-calendar-off me-1"></i>{{ __('Expire le') }}
                                                    {{ $announcement->expires_at->format('d/m/Y à H:i') }}
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="card mb-0">
                                <div class="card-body text-center py-5">
                                    <i class="isax isax-message-text fs-48 text-muted d-block mb-3"></i>
                                    <p class="text-muted mb-0">{{ __('Aucune annonce de l\'administrateur pour le moment.') }}</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>

        <style>
            .announcement-content {
                font-size: 14px;
                line-height: 1.6;
            }

            .announcement-content p {
                margin-bottom: 0.5rem;
            }

            .announcement-content p:last-child {
                margin-bottom: 0;
            }

            .announcement-content img {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
            }

            .announcement-content ul,
            .announcement-content ol {
                padding-left: 1.5rem;
                margin-bottom: 0.5rem;
            }
        </style>
    @endsection
