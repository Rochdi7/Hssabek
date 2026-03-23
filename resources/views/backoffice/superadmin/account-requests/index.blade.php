<?php $page = 'sa-account-requests'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Demandes de Compte')
@section('description', 'Gérer les demandes de création de compte')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Demandes de compte') }}</h6>
                    @if ($pendingCount > 0)
                        <span class="badge badge-soft-warning">{{ $pendingCount }} {{ __('en attente') }}</span>
                    @endif
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

            <!-- Filter Card -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form method="GET" action="{{ route('sa.account-requests.index') }}" class="d-flex align-items-center gap-2">
                            <div class="table-search d-flex align-items-center mb-0">
                                <div class="search-input">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Rechercher...') }}" class="form-control form-control-sm">
                                    <a href="javascript:void(0);" class="btn-searchset" onclick="this.closest('form').submit();">
                                        <i class="isax isax-search-normal fs-12"></i>
                                    </a>
                                </div>
                            </div>
                            <select name="status" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                                <option value="">{{ __('Tous les statuts') }}</option>
                                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>{{ __('En attente') }}</option>
                                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>{{ __('Approuvée') }}</option>
                                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>{{ __('Rejetée') }}</option>
                            </select>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Entreprise'), __('Contact'), __('Secteur'), __('Ville'), __('Date'), __('Statut')],
                        ])
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>{{ __('Trier par :') }} <span class="fw-normal ms-1">{{ __('Plus récent') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="javascript:void(0);" class="dropdown-item">{{ __('Plus récent') }}</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">{{ __('Plus ancien') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Filter Card -->

            <!-- Table List Start -->
            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('Entreprise') }}</th>
                            <th>{{ __('Contact') }}</th>
                            <th>{{ __('Secteur') }}</th>
                            <th>{{ __('Ville') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Statut') }}</th>
                            <th class="no-sort">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $req)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-sm bg-primary-transparent rounded-circle me-2 flex-shrink-0">
                                            {{ strtoupper(substr($req->company_name, 0, 2)) }}
                                        </span>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $req->company_name }}</h6>
                                            <p class="fs-12 text-muted mb-0">{{ $req->company_email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span class="fw-medium">{{ $req->contact_name }}</span>
                                        <p class="fs-12 text-muted mb-0">{{ $req->contact_email }}</p>
                                    </div>
                                </td>
                                <td>
                                    @if($req->sector)
                                        <span class="badge badge-soft-secondary">{{ $req->sector_label }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $req->company_city ?? '-' }}</td>
                                <td>{{ $req->created_at->translatedFormat('d M Y') }}</td>
                                <td>
                                    <span class="badge {{ $req->status_badge }} d-inline-flex align-items-center">
                                        {{ $req->status_label }}
                                        @switch($req->status)
                                            @case('pending')
                                                <i class="isax isax-clock ms-1"></i>
                                                @break
                                            @case('approved')
                                                <i class="isax isax-tick-circle ms-1"></i>
                                                @break
                                            @case('rejected')
                                                <i class="isax isax-close-circle ms-1"></i>
                                                @break
                                        @endswitch
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="{{ route('sa.account-requests.show', $req) }}"
                                            class="btn btn-outline-white d-inline-flex align-items-center">
                                            <i class="isax isax-eye me-1"></i> {{ __('Voir') }}
                                        </a>
                                        @if ($req->status === 'pending')
                                            <a href="#" class="btn btn-outline-white d-inline-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#approve_modal_{{ $req->id }}">
                                                <i class="isax isax-tick-circle me-1"></i> {{ __('Approuver') }}
                                            </a>
                                            <form method="POST" action="{{ route('sa.account-requests.reject', $req) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-white d-inline-flex align-items-center"
                                                    onclick="return confirm('{{ __('Rejeter cette demande ?') }}')">
                                                    <i class="isax isax-close-circle me-1"></i> {{ __('Rejeter') }}
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted fs-13">
                                                @if ($req->handler)
                                                    {{ __('Traité par') }} {{ $req->handler->name }}
                                                @endif
                                                @if ($req->handled_at)
                                                    {{ __('le') }} {{ $req->handled_at->translatedFormat('d M Y') }}
                                                @endif
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    {{ __('Aucune demande de compte trouvée.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Table List End -->

            @include('backoffice.components.table-footer', ['paginator' => $requests])

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Approve Modals -->
    @foreach ($requests->where('status', 'pending') as $req)
        <div class="modal fade" id="approve_modal_{{ $req->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('sa.account-requests.approve', $req) }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('Approuver la demande') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 p-3 bg-light rounded">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="avatar avatar-sm bg-primary-transparent rounded-circle me-2 flex-shrink-0">
                                        {{ strtoupper(substr($req->company_name, 0, 2)) }}
                                    </span>
                                    <div>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $req->company_name }}</h6>
                                        <p class="fs-12 text-muted mb-0">{{ $req->contact_name }} — {{ $req->contact_email }}</p>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-medium">{{ __('Mot de passe') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="password"
                                        value="{{ \Illuminate\Support\Str::random(12) }}" required minlength="8">
                                    <button type="button" class="btn btn-outline-secondary" onclick="this.previousElementSibling.value = '{{ \Illuminate\Support\Str::random(12) }}'">
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
    @endforeach

    <!-- ========================
                   End Page Content
                  ========================= -->
@endsection
