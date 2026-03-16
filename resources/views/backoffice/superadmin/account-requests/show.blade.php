<?php $page = 'sa-account-requests'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Détails de la demande') }}</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('sa.account-requests.index') }}">{{ __('Demandes de compte') }}</a></li>
                            <li class="breadcrumb-item active">{{ $accountRequest->company_name }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex align-items-center gap-2">
                    @if ($accountRequest->status === 'pending')
                        <a href="#" class="btn btn-success d-inline-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#approve_modal_show">
                            <i class="isax isax-tick-circle me-1"></i> {{ __('Approuver') }}
                        </a>
                        <form method="POST" action="{{ route('sa.account-requests.reject', $accountRequest) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger d-inline-flex align-items-center"
                                onclick="return confirm('{{ __('Rejeter cette demande ?') }}')">
                                <i class="isax isax-close-circle me-1"></i> {{ __('Rejeter') }}
                            </button>
                        </form>
                    @endif
                    <a href="{{ route('sa.account-requests.index') }}" class="btn btn-outline-white d-inline-flex align-items-center">
                        <i class="isax isax-arrow-left me-1"></i> {{ __('Retour') }}
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

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">{{ __("Informations de l'entreprise") }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Nom') }}</div>
                                <div class="col-sm-8 fw-medium">{{ $accountRequest->company_name }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Email') }}</div>
                                <div class="col-sm-8">
                                    <a href="mailto:{{ $accountRequest->company_email }}">{{ $accountRequest->company_email }}</a>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Téléphone') }}</div>
                                <div class="col-sm-8">{{ $accountRequest->company_phone ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Secteur') }}</div>
                                <div class="col-sm-8">
                                    @if($accountRequest->sector)
                                        <span class="badge badge-soft-secondary">{{ $accountRequest->sector_label }}</span>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Employés') }}</div>
                                <div class="col-sm-8">{{ $accountRequest->employees_count ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Adresse') }}</div>
                                <div class="col-sm-8">{{ $accountRequest->company_address ?? '-' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Ville') }}</div>
                                <div class="col-sm-8">{{ $accountRequest->company_city ?? '-' }}</div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-sm-4 text-muted">{{ __('Pays') }}</div>
                                <div class="col-sm-8">{{ $accountRequest->company_country ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Person + Status -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">{{ __('Personne de contact') }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Nom') }}</div>
                                <div class="col-sm-8 fw-medium">{{ $accountRequest->contact_name }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Email') }}</div>
                                <div class="col-sm-8">
                                    <a href="mailto:{{ $accountRequest->contact_email }}">{{ $accountRequest->contact_email }}</a>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-sm-4 text-muted">{{ __('Téléphone') }}</div>
                                <div class="col-sm-8">{{ $accountRequest->contact_phone ?? '-' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title mb-0">{{ __('Statut de la demande') }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Statut') }}</div>
                                <div class="col-sm-8">
                                    <span class="badge {{ $accountRequest->status_badge }} d-inline-flex align-items-center">
                                        {{ $accountRequest->status_label }}
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 text-muted">{{ __('Date de demande') }}</div>
                                <div class="col-sm-8">{{ $accountRequest->created_at->translatedFormat('d M Y à H:i') }}</div>
                            </div>
                            @if($accountRequest->handled_at)
                                <div class="row mb-2">
                                    <div class="col-sm-4 text-muted">{{ __('Traité le') }}</div>
                                    <div class="col-sm-8">{{ $accountRequest->handled_at->translatedFormat('d M Y à H:i') }}</div>
                                </div>
                            @endif
                            @if($accountRequest->handler)
                                <div class="row mb-2">
                                    <div class="col-sm-4 text-muted">{{ __('Traité par') }}</div>
                                    <div class="col-sm-8">{{ $accountRequest->handler->name }}</div>
                                </div>
                            @endif
                            <div class="row mb-0">
                                <div class="col-sm-4 text-muted">{{ __('Adresse IP') }}</div>
                                <div class="col-sm-8">{{ $accountRequest->ip_address ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message -->
            @if($accountRequest->message)
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">{{ __('Message') }}</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $accountRequest->message }}</p>
                    </div>
                </div>
            @endif

            <!-- Admin Notes -->
            @if($accountRequest->admin_notes)
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">{{ __('Notes admin') }}</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $accountRequest->admin_notes }}</p>
                    </div>
                </div>
            @endif

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Approve Modal (Show Page) -->
    @if($accountRequest->status === 'pending')
        <div class="modal fade" id="approve_modal_show" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('sa.account-requests.approve', $accountRequest) }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('Approuver la demande') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 p-3 bg-light rounded">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="avatar avatar-sm bg-primary-transparent rounded-circle me-2 flex-shrink-0">
                                        {{ strtoupper(substr($accountRequest->company_name, 0, 2)) }}
                                    </span>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $accountRequest->company_name }}</h6>
                                        <p class="fs-12 text-muted mb-0">{{ $accountRequest->contact_name }} — {{ $accountRequest->contact_email }}</p>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-medium">{{ __('Mot de passe') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="password" id="password_field_show"
                                        value="{{ \Illuminate\Support\Str::random(12) }}" required minlength="8">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="document.getElementById('password_field_show').value = generatePassword()">
                                        <i class="isax isax-refresh"></i>
                                    </button>
                                </div>
                                <small class="text-muted">{{ __('Ce mot de passe sera envoyé par email au contact.') }}</small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-medium">{{ __('Plan') }} <span class="text-danger">*</span></label>
                                <select class="form-select" name="plan_id" required>
                                    <option value="">— {{ __('Sélectionnez un plan') }} —</option>
                                    @foreach($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->name }} ({{ number_format($plan->price, 2) }} {{ $plan->currency ?? 'MAD' }} / {{ $plan->interval }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-0">
                                <label class="form-label fw-medium">{{ __('Notes admin') }}</label>
                                <textarea class="form-control" name="admin_notes" rows="2" placeholder="{{ __('Notes internes (optionnel)...') }}"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:void(0);" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                            <button type="submit" class="btn btn-success d-inline-flex align-items-center">
                                <i class="isax isax-tick-circle me-1"></i> {{ __('Approuver et créer le compte') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <script>
        function generatePassword() {
            const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789!@#$%';
            let password = '';
            for (let i = 0; i < 12; i++) {
                password += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return password;
        }
    </script>
@endsection
