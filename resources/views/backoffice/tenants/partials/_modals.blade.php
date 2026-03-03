{{-- ============================================
    Add Tenant Modal
    Based on #add_companies modal pattern.
============================================= --}}
<div id="add_tenant" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nouveau Tenant</h4>
                <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
            </div>
            <form method="POST" action="{{ route('sa.tenants.store') }}">
                @csrf
                <input type="hidden" name="_modal" value="add_tenant">
                <div class="modal-body">
                    {{-- Tenant Info --}}
                    <div class="mb-3">
                        <h6 class="fs-14 fw-bold">Informations du Tenant</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @include('backoffice.components.avatar-cropper', [
                                'currentUrl'  => asset('build/img/icons/company-logo-01.svg'),
                                'defaultUrl'  => asset('build/img/icons/company-logo-01.svg'),
                                'inputName'   => 'cropped_logo',
                                'previewId'   => 'add-tenant-logo-preview',
                                'hasImage'    => false,
                                'alt'         => 'Logo',
                                'label'       => "Logo de l'entreprise",
                                'required'    => false,
                            ])
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nom de l'entreprise<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nom du tenant">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Slug<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="slug-du-tenant">
                                @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Domaine<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control @error('domain') is-invalid @enderror" name="domain" value="{{ old('domain') }}" placeholder="exemple.com">
                                @error('domain')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Statut<span class="text-danger ms-1">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Actif</option>
                                    <option value="suspended" {{ old('status') === 'suspended' ? 'selected' : '' }}>Suspendu</option>
                                    <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Fuseau horaire</label>
                                <input type="text" class="form-control @error('timezone') is-invalid @enderror" name="timezone" value="{{ old('timezone', 'Africa/Casablanca') }}" placeholder="Africa/Casablanca">
                                @error('timezone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Devise par défaut</label>
                                <input type="text" class="form-control @error('default_currency') is-invalid @enderror" name="default_currency" value="{{ old('default_currency', 'MAD') }}" placeholder="MAD" maxlength="3">
                                @error('default_currency')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="form-label mb-0">Essai gratuit</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input trial-toggle" type="checkbox" role="switch" name="has_free_trial" value="1" {{ old('has_free_trial') ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 trial-date-wrapper" style="{{ old('has_free_trial') ? '' : 'display:none;' }}">
                            <div class="mb-3">
                                <label class="form-label">Date de fin d'essai<span class="text-danger ms-1">*</span></label>
                                <div class="input-group position-relative">
                                    <input type="date" class="form-control @error('trial_ends_at') is-invalid @enderror" name="trial_ends_at" value="{{ old('trial_ends_at') }}">
                                    @error('trial_ends_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Owner Account --}}
                    <div class="border-top pt-3 mt-2 mb-3">
                        <h6 class="fs-14 fw-bold">Compte Propriétaire</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nom complet<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" placeholder="Nom du propriétaire">
                                @error('owner_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Adresse e-mail<span class="text-danger ms-1">*</span></label>
                                <input type="email" class="form-control @error('owner_email') is-invalid @enderror" name="owner_email" value="{{ old('owner_email') }}" placeholder="proprietaire@exemple.com">
                                @error('owner_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mot de passe<span class="text-danger ms-1">*</span></label>
                                <div class="pass-group input-group">
                                    <span class="isax toggle-password isax-eye-slash"></span>
                                    <input type="password" class="pass-inputs form-control @error('owner_password') is-invalid @enderror" name="owner_password">
                                    @error('owner_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Confirmer le mot de passe<span class="text-danger ms-1">*</span></label>
                                <div class="pass-group input-group">
                                    <span class="isax toggle-password isax-eye-slash"></span>
                                    <input type="password" class="pass-inputs form-control" name="owner_password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                    <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- /Add Tenant Modal --}}

{{-- ============================================
    Per-Tenant Modals: Edit, View Details, Delete
============================================= --}}
@foreach($tenants as $tenant)

    {{-- Edit Tenant Modal --}}
    <div id="edit_tenant_{{ $tenant->id }}" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier le Tenant</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('sa.tenants.update', $tenant) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_modal" value="edit_tenant">
                    <input type="hidden" name="_tenant_id" value="{{ $tenant->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('backoffice.components.avatar-cropper', [
                                    'currentUrl'  => $tenant->logo_url,
                                    'defaultUrl'  => asset('build/img/icons/company-logo-01.svg'),
                                    'inputName'   => 'cropped_logo',
                                    'previewId'   => 'edit-tenant-logo-' . $tenant->id,
                                    'hasImage'    => $tenant->hasMedia('logo'),
                                    'alt'         => $tenant->name,
                                    'label'       => "Logo de l'entreprise",
                                    'required'    => false,
                                ])
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $tenant->name) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Slug<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug', $tenant->slug) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Statut<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="status">
                                        <option value="active" {{ $tenant->status === 'active' ? 'selected' : '' }}>Actif</option>
                                        <option value="suspended" {{ $tenant->status === 'suspended' ? 'selected' : '' }}>Suspendu</option>
                                        <option value="cancelled" {{ $tenant->status === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Fuseau horaire</label>
                                    <input type="text" class="form-control" name="timezone" value="{{ old('timezone', $tenant->timezone ?? 'Africa/Casablanca') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Devise par défaut</label>
                                    <input type="text" class="form-control" name="default_currency" value="{{ old('default_currency', $tenant->default_currency ?? 'MAD') }}" maxlength="3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="form-label mb-0">Essai gratuit</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input trial-toggle" type="checkbox" role="switch" name="has_free_trial" value="1" {{ $tenant->has_free_trial ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 trial-date-wrapper" style="{{ $tenant->has_free_trial ? '' : 'display:none;' }}">
                                <div class="mb-3">
                                    <label class="form-label">Date de fin d'essai<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group position-relative">
                                        <input type="date" class="form-control" name="trial_ends_at" value="{{ old('trial_ends_at', $tenant->trial_ends_at?->format('Y-m-d')) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /Edit Tenant Modal --}}

    {{-- View Tenant Details Modal --}}
    <div class="modal fade" id="view_tenant_{{ $tenant->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title d-flex align-items-center">
                        Détails du Tenant
                    </h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <div class="modal-body pb-0">
                    <div class="border-bottom mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="p-3 mb-3 br-5 bg-transparent-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex align-items-center file-name-icon justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <span class="avatar avatar-xxl rounded-2 d-flex align-items-center justify-content-center overflow-hidden {{ $tenant->getFirstMediaUrl('logo') ? '' : 'bg-soft-info' }}">
                                                            @if($tenant->getFirstMediaUrl('logo'))
                                                                <img src="{{ $tenant->logo_url }}" alt="{{ $tenant->name }}" class="w-100 h-100 object-fit-cover">
                                                            @else
                                                                <i class="isax isax-buildings-25 text-info fs-24"></i>
                                                            @endif
                                                        </span>
                                                        <div class="ms-2">
                                                            <h6 class="fw-bold fs-14 mb-2">{{ $tenant->name }}</h6>
                                                            <span><i class="isax isax-global me-1"></i>{{ $tenant->domains->first()?->domain ?? '—' }}</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);" class="btn btn-outline-white d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_tenant_{{ $tenant->id }}">
                                                            <i class="isax isax-edit me-1"></i>Modifier
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <h6 class="fs-14 fw-bold">Informations générales</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Slug</span>
                                    <h6 class="fs-14 fw-medium mb-0"><code>{{ $tenant->slug }}</code></h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Domaine</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->domains->first()?->domain ?? '—' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Utilisateurs</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->users_count ?? 0 }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Fuseau horaire</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->timezone ?? 'Africa/Casablanca' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Devise</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->default_currency ?? 'MAD' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <p class="fs-14 mb-0">Statut</p>
                                    @if($tenant->status === 'active')
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Actif
                                            <i class="isax isax-tick-circle ms-1"></i>
                                        </span>
                                    @elseif($tenant->status === 'suspended')
                                        <span class="badge badge-soft-warning d-inline-flex align-items-center">Suspendu
                                            <i class="isax isax-slash ms-1"></i>
                                        </span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Inactif
                                            <i class="isax isax-close-circle ms-1"></i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Essai gratuit</span>
                                    @if($tenant->has_free_trial)
                                        <h6 class="fs-14 fw-medium mb-0">
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">Oui <i class="isax isax-tick-circle ms-1"></i></span>
                                            @if($tenant->trial_ends_at)
                                                <span class="text-muted ms-1">jusqu'au {{ $tenant->trial_ends_at->format('d/m/Y') }}</span>
                                            @endif
                                        </h6>
                                    @else
                                        <h6 class="fs-14 fw-medium mb-0">Non</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Créé le</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->created_at->format('d/m/Y à H:i') }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Mis à jour le</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->updated_at->format('d/m/Y à H:i') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($tenant->domains->count() > 1)
                        <div class="mb-3">
                            <h6 class="fs-14 fw-bold mb-2">Domaines associés</h6>
                            <ul class="list-unstyled mb-0">
                                @foreach($tenant->domains as $domain)
                                    <li class="mb-1">
                                        <i class="isax isax-global me-1"></i>{{ $domain->domain }}
                                        @if($domain->is_primary)
                                            <span class="badge badge-soft-info ms-1">Principal</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- /View Tenant Details Modal --}}

    {{-- Delete Tenant Modal --}}
    <div class="modal fade" id="delete_tenant_{{ $tenant->id }}">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">Supprimer le Tenant</h6>
                    <p class="mb-3">Êtes-vous sûr de vouloir supprimer « {{ $tenant->name }} » ?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">Annuler</a>
                        <form method="POST" action="{{ route('sa.tenants.destroy', $tenant) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Oui, Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /Delete Tenant Modal --}}

@endforeach
