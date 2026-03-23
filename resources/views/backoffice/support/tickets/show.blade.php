<?php $page = 'support-tickets'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Ticket')
@section('description', 'Consulter les détails du ticket')
@section('content')
    <!-- ========================
            Start Page Content
        ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <div class="mb-3">
                <h6><a href="{{ route('bo.support.tickets.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Aperçu du ticket') }}</a></h6>
            </div>

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

            <div class="card mb-3">
                <div class="card-header border-0 bg-light">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <span
                                class="p-2 bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2"><i
                                    class="isax isax-ticket"></i></span>
                            <h6 class="fs-16">{{ $ticket->ticket_number }} - <span class="text-gray-5">{{ $ticket->subject }}</span></h6>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge {{ $ticket->priority_badge }} me-3">{{ $ticket->priority_label }}</span>
                            <span class="badge {{ $ticket->status_badge }}">{{ $ticket->status_label }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="mb-2">{{ __('Description') }}</h6>
                        <p style="white-space: pre-wrap;">{{ $ticket->description }}</p>
                    </div>
                    <!-- row start -->
                    <div class="row mb-3 mx-1">
                        <div class="col-lg-4 p-0 d-flex">
                            <div class="p-3 border flex-fill rounded-left border-end-0">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-lg rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2">
                                        {{ strtoupper(substr($ticket->user->name, 0, 1)) }}
                                    </span>
                                    <div>
                                        <h6 class="fs-14 mb-1">{{ __('Créé par') }}</h6>
                                        <p class="fs-13">{{ $ticket->user->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0 d-flex">
                            <div class="p-3 border flex-fill rounded-0 border-end-0">
                                <div class="">
                                    <h6 class="fs-14 mb-1">{{ __('Catégorie') }}</h6>
                                    <p class="fs-13"><span class="badge {{ $ticket->category_badge }}">{{ $ticket->category_label }}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-0 d-flex">
                            <div class="p-3 border flex-fill rounded-right">
                                <div class="">
                                    <h6 class="fs-14 mb-1">{{ __('Date de création') }}</h6>
                                    <p class="fs-13">{{ $ticket->created_at->translatedFormat('d M Y à H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    @php $attachments = $ticket->getMedia('attachments'); @endphp
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="border-bottom mb-3">
                                        <h6 class="mb-2">{{ __('Pièces jointes') }} ({{ $attachments->count() }})</h6>
                                    </div>
                                    @if ($attachments->count())
                                        @foreach ($attachments as $media)
                                            <div class="d-flex align-items-center justify-content-between border rounded p-2 {{ !$loop->last ? 'mb-3' : '' }}">
                                                <div class="d-flex align-items-center">
                                                    @if (Str::startsWith($media->mime_type, 'image/'))
                                                        <img src="{{ $media->getUrl() }}" alt="img"
                                                            class="avatar avatar-lg me-2" style="object-fit: cover;">
                                                    @else
                                                        <img src="{{ URL::asset('build/img/icons/pdf.svg') }}" alt="img"
                                                            class="avatar avatar-lg me-2">
                                                    @endif
                                                    <div>
                                                        <a href="{{ $media->getUrl() }}" target="_blank" class="fs-13">{{ $media->file_name }}</a>
                                                        <span class="d-block fs-12">{{ number_format($media->size / 1024, 0) }} KB</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ $media->getUrl() }}" target="_blank" download
                                                        class="btn btn-primary btn-md rounded-circle me-2 p-2"><i
                                                            class="isax isax-document-download"></i></a>
                                                    <a href="{{ $media->getUrl() }}" target="_blank" class="btn btn-light btn-md rounded-circle p-2"><i
                                                            class="isax isax-more"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted text-center py-3 mb-0">{{ __('Aucune pièce jointe.') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <h5 class="fw-bold border-bottom pb-2 mb-3">{{ __('Historique') }}</h5>

                                    <ul class="activity-feed">
                                        @foreach ($ticket->replies->reverse()->take(5) as $reply)
                                            <li class="feed-item timeline-item">
                                                <p class="mb-1"><span class="text-dark fw-semibold">{{ $reply->user->name ?? __('Admin') }}
                                                    @if ($reply->is_admin_reply)
                                                        <span class="badge badge-soft-success badge-sm ms-1">{{ __('Support') }}</span>
                                                    @endif
                                                    </span> {{ Str::limit($reply->message, 80) }}</p>
                                                <div class="invoice-date"><span><i class="isax isax-calendar5 me-1"></i>{{ $reply->created_at->translatedFormat('d M Y') }}</span></div>
                                            </li>
                                        @endforeach
                                        @if ($ticket->replies->isEmpty())
                                            <li class="feed-item timeline-item">
                                                <p class="mb-1 text-muted">{{ __('Aucune activité pour le moment.') }}</p>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
                <!-- card body end -->
            </div>
            <!-- card end -->

            <div class="mb-3">
                <h6>{{ __('Commentaires') }} ({{ $ticket->replies->count() }})</h6>
            </div>

            @forelse ($ticket->replies as $reply)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-lg rounded-circle {{ $reply->is_admin_reply ? 'bg-success' : 'bg-primary' }} text-white d-flex align-items-center justify-content-center me-2">
                                    {{ strtoupper(substr($reply->user->name ?? 'A', 0, 1)) }}
                                </span>
                                <div>
                                    <h6 class="fs-14 mb-1">{{ $reply->user->name ?? __('Admin') }}
                                        @if ($reply->is_admin_reply)
                                            <span class="badge badge-soft-success ms-1">{{ __('Support') }}</span>
                                        @endif
                                    </h6>
                                    <p class="fs-13">{{ $reply->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        <p style="white-space: pre-wrap;">{{ $reply->message }}</p>
                    </div>
                    <!-- card body end -->
                </div>
                <!-- card end -->
            @empty
                <div class="card mb-3">
                    <div class="card-body text-center text-muted py-4">
                        {{ __('Aucun commentaire pour le moment.') }}
                    </div>
                </div>
            @endforelse

            @if (!in_array($ticket->status, ['closed']))
                <form action="{{ route('bo.support.tickets.reply', $ticket) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('Laisser un commentaire') }}</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="4"
                            placeholder="{{ __('Écrivez votre message...') }}">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-end mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Publier un commentaire') }}</button>
                    </div>
                </form>
            @else
                <div class="alert alert-secondary text-center">
                    {{ __('Ce ticket est fermé. Vous ne pouvez plus y répondre.') }}
                </div>
            @endif

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>

    <!-- ========================
            End Page Content
        ========================= -->
@endsection
