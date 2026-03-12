<?php $page = 'sa-contact-messages'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Message de {{ $contactMessage->name }}</h6>
                    <div class="d-flex gap-2 mt-1">
                        <span class="badge {{ $contactMessage->status_badge }}">{{ $contactMessage->status_label }}</span>
                        <span class="badge badge-soft-info">{{ $contactMessage->subject_label }}</span>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('sa.contact-messages.index') }}" class="btn btn-outline-white d-flex align-items-center">
                        <i class="isax isax-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
            <!-- End Page Header -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                <!-- Message Details -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Message</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-4" style="white-space: pre-wrap;">{{ $contactMessage->message }}</div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Informations</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label text-muted fs-12">Nom</label>
                                <p class="fw-medium mb-0">{{ $contactMessage->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted fs-12">Email</label>
                                <p class="mb-0">
                                    <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted fs-12">Sujet</label>
                                <p class="mb-0"><span class="badge badge-soft-info">{{ $contactMessage->subject_label }}</span></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted fs-12">Date</label>
                                <p class="mb-0">{{ $contactMessage->created_at?->translatedFormat('d M Y à H:i') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-muted fs-12">Adresse IP</label>
                                <p class="mb-0 text-muted">{{ $contactMessage->ip_address ?? '-' }}</p>
                            </div>
                            @if($contactMessage->read_at)
                            <div class="mb-3">
                                <label class="form-label text-muted fs-12">Lu le</label>
                                <p class="mb-0">{{ $contactMessage->read_at->translatedFormat('d M Y à H:i') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Change Status -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Changer le statut</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('sa.contact-messages.update-status', $contactMessage) }}">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <select name="status" class="form-select">
                                        <option value="new" {{ $contactMessage->status === 'new' ? 'selected' : '' }}>Nouveau</option>
                                        <option value="read" {{ $contactMessage->status === 'read' ? 'selected' : '' }}>Lu</option>
                                        <option value="replied" {{ $contactMessage->status === 'replied' ? 'selected' : '' }}>Répondu</option>
                                        <option value="archived" {{ $contactMessage->status === 'archived' ? 'selected' : '' }}>Archivé</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="isax isax-tick-circle me-1"></i> Mettre à jour
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Reply Button -->
                    <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject_label }}" class="btn btn-outline-white w-100 d-flex align-items-center justify-content-center">
                        <i class="isax isax-sms me-1"></i> Répondre par email
                    </a>
                </div>
            </div>

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                       End Page Content
                      ========================= -->
@endsection
