<?php $page = 'support-tickets'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Ticket')
@section('description', 'Consulter les détails du ticket')
@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-10 mx-auto">

                {{-- Header nav + actions --}}
                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                    <h6>
                        <a href="{{ route('bo.support.tickets.index') }}">
                            <i class="isax isax-arrow-left me-2"></i>{{ __('Tickets support') }}
                        </a>
                    </h6>
                    <div class="d-flex align-items-center flex-wrap row-gap-2 gap-2">
                        <a href="{{ route('bo.support.tickets.create') }}"
                           class="btn btn-primary d-inline-flex align-items-center">
                            <i class="isax isax-add me-1"></i>{{ __('Nouveau ticket') }}
                        </a>
                    </div>
                </div>

                {{-- Flash --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($ticket->resolved_at)
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="isax isax-tick-circle me-2"></i>
                        {{ __('Résolu le') }} {{ $ticket->resolved_at->translatedFormat('d M Y à H:i') }}
                    </div>
                @endif

                {{-- Main ticket card --}}
                <div class="card mb-3">
                    <div class="card-body">

                        {{-- Hero header --}}
                        <div class="bg-light p-4 rounded position-relative mb-3">
                            <div class="position-absolute top-0 end-0 z-0">
                                <img src="{{ URL::asset('build/img/bg/card-bg.png') }}" alt="img">
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-2 mb-3 pb-2 position-relative z-1">
                                <div class="mb-2">
                                    <h4 class="mb-1">{{ __('Ticket') }}</h4>
                                    <div class="d-flex align-items-center flex-wrap row-gap-2">
                                        <div class="me-4">
                                            <h6 class="fs-14 fw-semibold mb-1">{{ $ticket->ticket_number }}</h6>
                                            <span class="badge {{ $ticket->status_badge }}">{{ $ticket->status_label }}</span>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-semibold mb-1">{{ __('Priorité') }}</h6>
                                            <span class="badge {{ $ticket->priority_badge }}">{{ $ticket->priority_label }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <h6 class="fs-14 fw-semibold mb-1">{{ __('Catégorie') }}</h6>
                                    <span class="badge {{ $ticket->category_badge }}">{{ $ticket->category_label }}</span>
                                </div>
                            </div>

                            {{-- Meta row --}}
                            <div class="row row-gap-3 position-relative z-1">
                                <div class="col-6 col-md-4">
                                    <span class="fs-12 text-muted">{{ __('Créé par') }}</span>
                                    <p class="fs-14 fw-semibold mb-0">{{ $ticket->user->name }}</p>
                                </div>
                                <div class="col-6 col-md-4">
                                    <span class="fs-12 text-muted">{{ __('Date de création') }}</span>
                                    <p class="fs-14 fw-semibold mb-0">{{ $ticket->created_at->translatedFormat('d M Y') }}</p>
                                </div>
                                <div class="col-12 col-md-4">
                                    <span class="fs-12 text-muted">{{ __('Sujet') }}</span>
                                    <p class="fs-14 fw-semibold mb-0">{{ $ticket->subject }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="border rounded p-3 mb-3">
                            <h6 class="fs-14 fw-semibold mb-2">{{ __('Description') }}</h6>
                            <p class="mb-0" style="white-space: pre-wrap;">{{ $ticket->description }}</p>
                        </div>

                        {{-- Pièces jointes + Historique --}}
                        @php $attachments = $ticket->getMedia('attachments'); @endphp
                        <div class="row row-gap-3">

                            {{-- Pièces jointes --}}
                            <div class="col-12 col-md-6">
                                <div class="card mb-0 h-100">
                                    <div class="card-body">
                                        <h6 class="fs-14 fw-semibold border-bottom pb-2 mb-3">
                                            <i class="isax isax-paperclip me-1"></i>{{ __('Pièces jointes') }}
                                            <span class="badge badge-soft-secondary ms-1">{{ $attachments->count() }}</span>
                                        </h6>
                                        @if ($attachments->count())
                                            <div class="d-flex flex-column gap-2">
                                                @foreach ($attachments as $media)
                                                    @php
                                                        $previewUrl  = route('bo.support.tickets.attachments.show', ['ticket' => $ticket, 'media' => $media]);
                                                        $downloadUrl = route('bo.support.tickets.attachments.show', ['ticket' => $ticket, 'media' => $media, 'download' => 1]);
                                                        $displayName = $media->getCustomProperty('original_name', $media->file_name);
                                                    @endphp
                                                    <div class="d-flex align-items-center justify-content-between border rounded p-2">
                                                        <div class="d-flex align-items-center overflow-hidden me-2">
                                                            @if (Str::startsWith($media->mime_type, 'image/'))
                                                                <img src="{{ $previewUrl }}" alt="img"
                                                                     class="avatar avatar-md rounded me-2 flex-shrink-0"
                                                                     style="object-fit:cover; width:40px; height:40px;">
                                                            @else
                                                                <img src="{{ URL::asset('build/img/icons/pdf.svg') }}" alt="pdf"
                                                                     class="avatar avatar-md me-2 flex-shrink-0"
                                                                     style="width:40px; height:40px;">
                                                            @endif
                                                            <div class="overflow-hidden">
                                                                <a href="{{ $previewUrl }}" target="_blank"
                                                                   class="fs-13 d-block text-truncate">{{ $displayName }}</a>
                                                                <span class="fs-12 text-muted">{{ number_format($media->size / 1024, 0) }} KB</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-1 flex-shrink-0">
                                                            <a href="{{ $downloadUrl }}"
                                                               class="btn btn-primary btn-sm rounded-circle p-1" style="width:32px;height:32px;display:flex;align-items:center;justify-content:center;">
                                                                <i class="isax isax-document-download fs-16"></i>
                                                            </a>
                                                            <a href="{{ $previewUrl }}" target="_blank"
                                                               class="btn btn-light btn-sm rounded-circle p-1" style="width:32px;height:32px;display:flex;align-items:center;justify-content:center;">
                                                                <i class="isax isax-eye fs-16"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="text-center text-muted py-4">
                                                <i class="isax isax-paperclip fs-24 d-block mb-2"></i>
                                                {{ __('Aucune pièce jointe.') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Historique --}}
                            <div class="col-12 col-md-6">
                                <div class="card mb-0 h-100">
                                    <div class="card-body">
                                        <h6 class="fs-14 fw-semibold border-bottom pb-2 mb-3">
                                            <i class="isax isax-clock me-1"></i>{{ __('Historique') }}
                                        </h6>
                                        <ul class="activity-feed mb-0">
                                            @forelse ($ticket->replies->reverse()->take(5) as $reply)
                                                <li class="feed-item timeline-item">
                                                    <p class="mb-1">
                                                        <span class="text-dark fw-semibold">{{ $reply->user->name ?? __('Admin') }}</span>
                                                        @if ($reply->is_admin_reply)
                                                            <span class="badge badge-soft-success badge-sm ms-1">{{ __('Support') }}</span>
                                                        @endif
                                                        <span class="text-muted ms-1">{{ Str::limit($reply->message, 60) }}</span>
                                                    </p>
                                                    <div class="invoice-date">
                                                        <span><i class="isax isax-calendar5 me-1"></i>{{ $reply->created_at->translatedFormat('d M Y') }}</span>
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="feed-item timeline-item">
                                                    <p class="mb-1 text-muted">{{ __('Aucune activité pour le moment.') }}</p>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- /row --}}

                    </div>
                </div>

                {{-- Commentaires --}}
                <h6 class="fw-semibold mb-3">
                    <i class="isax isax-message-text me-1"></i>{{ __('Commentaires') }}
                    <span class="badge badge-soft-secondary ms-1">{{ $ticket->replies->count() }}</span>
                </h6>

                @forelse ($ticket->replies as $reply)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2 mb-3">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-md rounded-circle {{ $reply->is_admin_reply ? 'bg-success' : 'bg-primary' }} text-white d-flex align-items-center justify-content-center me-2"
                                          style="width:38px;height:38px;font-size:15px;flex-shrink:0;">
                                        {{ strtoupper(substr($reply->user->name ?? 'A', 0, 1)) }}
                                    </span>
                                    <div>
                                        <h6 class="fs-14 mb-0">
                                            {{ $reply->user->name ?? __('Admin') }}
                                            @if ($reply->is_admin_reply)
                                                <span class="badge badge-soft-success ms-1">{{ __('Support') }}</span>
                                            @endif
                                        </h6>
                                        <span class="fs-12 text-muted">{{ $reply->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-0" style="white-space: pre-wrap;">{{ $reply->message }}</p>
                        </div>
                    </div>
                @empty
                    <div class="card mb-3">
                        <div class="card-body text-center text-muted py-4">
                            <i class="isax isax-message-text fs-28 d-block mb-2"></i>
                            {{ __('Aucun commentaire pour le moment.') }}
                        </div>
                    </div>
                @endforelse

                {{-- Reply form --}}
                @if (!in_array($ticket->status, ['closed']))
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('bo.support.tickets.reply', $ticket) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">{{ __('Laisser un commentaire') }}</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror"
                                              name="message" rows="4"
                                              placeholder="{{ __('Écrivez votre message...') }}">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="isax isax-send-2 me-1"></i>{{ __('Publier un commentaire') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-secondary text-center">
                        <i class="isax isax-lock me-1"></i>
                        {{ __('Ce ticket est fermé. Vous ne pouvez plus y répondre.') }}
                    </div>
                @endif

                @component('backoffice.components.footer')
                @endcomponent

            </div>
        </div>
    </div>
</div>

@endsection
