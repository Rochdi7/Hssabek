<?php $page = 'sa-templates'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Modèle')
@section('description', 'Consulter les détails du modèle')
@section('content')
    <!-- ========================
           Start Page Content
          ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Breadcrumb Start -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1">
                            <li class="breadcrumb-item"><a href="{{ route('sa.templates.index') }}">{{ __('Modèles') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $template->name }}</li>
                        </ol>
                    </nav>
                    <h6 class="mb-0">{{ $template->name }} — {{ $documentTypeLabels[$template->document_type] ?? $template->document_type }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <form method="POST" action="{{ route('sa.templates.bulk-assign', $template->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary d-flex align-items-center"
                            onclick="return confirm('{{ __('Assigner ce modèle à toutes les agences actives ?') }}')">
                            <i class="isax isax-people me-1"></i>{{ __('Assigner à toutes') }}
                        </button>
                    </form>
                    <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                        data-bs-target="#assign_template">
                        <i class="isax isax-add-circle5 me-1"></i>{{ __('Assigner') }}
                    </a>
                </div>
            </div>
            <!-- Breadcrumb End -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Template Info -->
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-img mb-3">
                                <img src="{{ asset($template->preview_image ?? 'build/img/invoice/general-invoice-01.svg') }}"
                                    alt="{{ $template->name }}" class="w-100 rounded">
                            </div>
                            <h6 class="mb-2">{{ $template->name }}</h6>
                            <p class="text-muted fs-13 mb-2">{{ $template->description ?? __('Aucune description.') }}</p>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-info-transparent text-info">{{ $documentTypeLabels[$template->document_type] ?? $template->document_type }}</span>
                                @if($template->is_free)
                                    <span class="badge bg-success-transparent text-success">{{ __('Gratuit') }}</span>
                                @else
                                    <span class="badge bg-warning-transparent text-warning">{{ number_format($template->price, 2) }} {{ $template->currency }}</span>
                                @endif
                                @if($template->is_active)
                                    <span class="badge bg-success-transparent text-success">{{ __('Actif') }}</span>
                                @else
                                    <span class="badge bg-danger-transparent text-danger">{{ __('Inactif') }}</span>
                                @endif
                                @if($template->is_featured)
                                    <span class="badge bg-warning-transparent text-warning"><i class="isax isax-star-1 me-1"></i>{{ __('En vedette') }}</span>
                                @endif
                            </div>
                            <ul class="list-unstyled fs-13 text-muted">
                                <li class="mb-1"><strong>{{ __('Code :') }}</strong> {{ $template->code }}</li>
                                <li class="mb-1"><strong>{{ __('Vue :') }}</strong> {{ $template->view_path }}</li>
                                <li class="mb-1"><strong>{{ __('Version :') }}</strong> {{ $template->version }}</li>
                                <li class="mb-1"><strong>{{ __('Agences assignées :') }}</strong> {{ count($assignedTenantIds) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Assigned Tenants Table -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
                            <h6 class="mb-0">{{ __('Agences assignées') }} <span class="badge bg-primary ms-1">{{ count($assignedTenantIds) }}</span></h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Agence') }}</th>
                                            <th>{{ __('Statut') }}</th>
                                            <th>{{ __('Devise') }}</th>
                                            <th class="text-end">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($tenants as $tenant)
                                            @if(in_array($tenant->id, $assignedTenantIds))
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar avatar-sm bg-primary-transparent me-2">
                                                            {{ strtoupper(substr($tenant->name, 0, 2)) }}
                                                        </span>
                                                        <div>
                                                            <span class="fw-medium">{{ $tenant->name }}</span>
                                                            <p class="fs-12 text-muted mb-0">{{ $tenant->slug }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($tenant->status === 'active')
                                                        <span class="badge bg-success-transparent text-success">{{ __('Actif') }}</span>
                                                    @elseif($tenant->status === 'suspended')
                                                        <span class="badge bg-warning-transparent text-warning">{{ __('Suspendu') }}</span>
                                                    @else
                                                        <span class="badge bg-danger-transparent text-danger">{{ ucfirst($tenant->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $tenant->default_currency ?? 'MAD' }}</td>
                                                <td class="text-end">
                                                    <form method="POST" action="{{ route('sa.templates.revoke', $template->id) }}" class="d-inline"
                                                        onsubmit="return confirm('{{ __('Retirer ce modèle de l\'agence') }} « {{ $tenant->name }} » ?')">
                                                        @csrf
                                                        <input type="hidden" name="tenant_id" value="{{ $tenant->id }}">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            <i class="isax isax-close-circle me-1"></i>{{ __('Retirer') }}
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                        @empty
                                        @endforelse

                                        @if(count($assignedTenantIds) === 0)
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">
                                                <i class="isax isax-buildings-2 fs-24 d-block mb-2"></i>
                                                {{ __('Aucune agence assignée à ce modèle.') }}
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Unassigned Tenants -->
                    @php
                        $unassignedTenants = $tenants->filter(fn($t) => !in_array($t->id, $assignedTenantIds));
                    @endphp
                    @if($unassignedTenants->isNotEmpty())
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mb-0">{{ __('Agences non assignées') }} <span class="badge bg-secondary ms-1">{{ $unassignedTenants->count() }}</span></h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Agence') }}</th>
                                            <th>{{ __('Statut') }}</th>
                                            <th class="text-end">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($unassignedTenants as $tenant)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="avatar avatar-sm bg-light me-2">
                                                        {{ strtoupper(substr($tenant->name, 0, 2)) }}
                                                    </span>
                                                    <div>
                                                        <span class="fw-medium">{{ $tenant->name }}</span>
                                                        <p class="fs-12 text-muted mb-0">{{ $tenant->slug }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if($tenant->status === 'active')
                                                    <span class="badge bg-success-transparent text-success">{{ __('Actif') }}</span>
                                                @else
                                                    <span class="badge bg-warning-transparent text-warning">{{ ucfirst($tenant->status) }}</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <form method="POST" action="{{ route('sa.templates.assign', $template->id) }}" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="tenant_ids[]" value="{{ $tenant->id }}">
                                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                                        <i class="isax isax-add-circle me-1"></i>{{ __('Assigner') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Assign Modal -->
    <div class="modal fade" id="assign_template" tabindex="-1" aria-labelledby="assignTemplateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignTemplateLabel">{{ __('Assigner') }} « {{ $template->name }} »</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"></button>
                </div>
                <form method="POST" action="{{ route('sa.templates.assign', $template->id) }}">
                    @csrf
                    <div class="modal-body">
                        <p class="text-muted fs-13 mb-3">{{ __('Sélectionnez les agences auxquelles assigner ce modèle :') }}</p>

                        @if($unassignedTenants->isEmpty())
                            <div class="text-center py-3 text-muted">
                                <i class="isax isax-tick-circle fs-24 d-block mb-2 text-success"></i>
                                {{ __('Toutes les agences sont déjà assignées.') }}
                            </div>
                        @else
                            <div class="mb-2">
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" id="select_all_tenants">
                                    <span class="form-check-label fw-medium">{{ __('Tout sélectionner') }}</span>
                                </label>
                            </div>
                            <div style="max-height: 300px; overflow-y: auto;" class="border rounded p-2">
                                @foreach($unassignedTenants as $tenant)
                                <label class="form-check mb-1">
                                    <input type="checkbox" class="form-check-input tenant-checkbox"
                                        name="tenant_ids[]" value="{{ $tenant->id }}">
                                    <span class="form-check-label">
                                        {{ $tenant->name }}
                                        <span class="text-muted fs-12 ms-1">({{ $tenant->slug }})</span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        @if($unassignedTenants->isNotEmpty())
                            <button type="submit" class="btn btn-primary">
                                <i class="isax isax-tick-circle me-1"></i>{{ __('Assigner') }}
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ========================
           End Page Content
          ========================= -->
@endsection

@push('scripts')
<script>
    // Select all checkbox toggle
    var selectAll = document.getElementById('select_all_tenants');
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            document.querySelectorAll('.tenant-checkbox').forEach(function(cb) {
                cb.checked = selectAll.checked;
            });
        });
    }
</script>
@endpush
