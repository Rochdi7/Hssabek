<?php $page = 'sa-campaign'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Campagne Email')
@section('description', 'Envoyer un email à tous les tenants')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Campagne Email — Tenants') }}</h6>
                    <p class="text-muted mb-0">{{ $tenantEmails->count() }} destinataire(s) disponible(s)</p>
                </div>
                <div>
                    <a href="{{ route('sa.campaign.export') }}" class="btn btn-outline-white">
                        <i class="ti ti-download me-1"></i> {{ __('Exporter CSV') }}
                    </a>
                </div>
            </div>

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

            <form action="{{ route('sa.campaign.send') }}" method="POST">
                @csrf

                {{-- Recipients --}}
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">{{ __('Destinataires') }}</h5>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-select-all">
                                {{ __('Tout sélectionner') }}
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="btn-deselect-all">
                                {{ __('Tout désélectionner') }}
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @error('recipients')
                            <div class="alert alert-danger py-2">{{ $message }}</div>
                        @enderror

                        @if ($tenantEmails->isEmpty())
                            <p class="text-muted">{{ __('Aucun tenant actif trouvé.') }}</p>
                        @else
                            <div class="row g-2">
                                @foreach ($tenantEmails as $row)
                                    <div class="col-md-4">
                                        <div class="form-check border rounded p-2">
                                            <input class="form-check-input recipient-check" type="checkbox"
                                                name="recipients[]"
                                                value="{{ $row['email'] }}"
                                                id="r_{{ $loop->index }}"
                                                checked>
                                            <label class="form-check-label w-100" for="r_{{ $loop->index }}">
                                                <span class="fw-medium d-block">{{ $row['tenant'] }}</span>
                                                <span class="text-muted fs-12">{{ $row['email'] }}</span>
                                                <span class="badge bg-light text-dark ms-1">{{ $row['role'] }}</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Compose --}}
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ __('Contenu de la campagne') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Sujet') }} <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('subject') is-invalid @enderror"
                                name="subject"
                                value="{{ old('subject') }}"
                                placeholder="{{ __('Objet de l\'email') }}"
                                required>
                            @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label">{{ __('Message') }} <span class="text-danger">*</span></label>
                            <textarea id="campaign-body"
                                class="form-control @error('body') is-invalid @enderror"
                                name="body"
                                rows="8">{!! old('body') !!}</textarea>
                            @error('body')<div class="text-danger mt-1 fs-12">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary" id="btn-send">
                        <i class="isax isax-send me-1"></i> {{ __('Envoyer la campagne') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection

@include('backoffice.components._summernote-editor', ['editorId' => 'campaign-body', 'height' => 300])

@push('scripts')
<script>
    document.getElementById('btn-select-all').addEventListener('click', function () {
        document.querySelectorAll('.recipient-check').forEach(cb => cb.checked = true);
    });
    document.getElementById('btn-deselect-all').addEventListener('click', function () {
        document.querySelectorAll('.recipient-check').forEach(cb => cb.checked = false);
    });
</script>
@endpush
