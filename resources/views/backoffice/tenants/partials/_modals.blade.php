{{-- ============================================
    Add Tenant Modal
    Based on #add_companies modal pattern.
============================================= --}}
<div id="add_tenant" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Nouveau Tenant') }}</h4>
                <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
            </div>
            <form method="POST" action="{{ route('sa.tenants.store') }}">
                @csrf
                <input type="hidden" name="_modal" value="add_tenant">
                <div class="modal-body">
                    {{-- Tenant Info --}}
                    <div class="mb-3">
                        <h6 class="fs-14 fw-bold">{{ __('Informations du Tenant') }}</h6>
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
                                'label'       => __("Logo de l'entreprise"),
                                'required'    => false,
                            ])
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">{{ __("Nom de l'entreprise") }}<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('Nom du tenant') }}">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Statut') }}<span class="text-danger ms-1">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>{{ __('Actif') }}</option>
                                    <option value="suspended" {{ old('status') === 'suspended' ? 'selected' : '' }}>{{ __('Suspendu') }}</option>
                                    <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>{{ __('Annulé') }}</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Fuseau horaire') }}</label>
                                <input type="text" class="form-control @error('timezone') is-invalid @enderror" name="timezone" value="{{ old('timezone', 'Africa/Casablanca') }}" placeholder="Africa/Casablanca">
                                @error('timezone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Devise par défaut') }}</label>
                                <input type="text" class="form-control @error('default_currency') is-invalid @enderror" name="default_currency" value="{{ old('default_currency', 'MAD') }}" placeholder="MAD" maxlength="3">
                                @error('default_currency')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Plan / Abonnement') }}<span class="text-danger ms-1">*</span></label>
                                <select class="form-select @error('plan_id') is-invalid @enderror" name="plan_id">
                                    <option value="">{{ __('-- Sélectionner un plan --') }}</option>
                                    @foreach($plans as $plan)
                                        <option value="{{ $plan->id }}" {{ old('plan_id') == $plan->id ? 'selected' : '' }}>
                                            {{ $plan->name }} ({{ number_format($plan->price, 2) }} {{ $plan->currency }}/{{ $plan->interval }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('plan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <label class="form-label mb-0">{{ __('Essai gratuit') }}</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input trial-toggle" type="checkbox" role="switch" name="has_free_trial" value="1" {{ old('has_free_trial') ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 trial-date-wrapper" style="{{ old('has_free_trial') ? '' : 'display:none;' }}">
                            <div class="mb-3">
                                <label class="form-label">{{ __("Date de fin d'essai") }}<span class="text-danger ms-1">*</span></label>
                                <div class="input-group position-relative">
                                    <input type="text" class="form-control datetimepicker @error('trial_ends_at') is-invalid @enderror" name="trial_ends_at" value="{{ old('trial_ends_at') }}">
                                    @error('trial_ends_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Owner Account --}}
                    <div class="border-top pt-3 mt-2 mb-3">
                        <h6 class="fs-14 fw-bold">{{ __('Compte Propriétaire') }}</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Nom complet') }}<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" placeholder="{{ __('Nom du propriétaire') }}">
                                @error('owner_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Adresse e-mail') }}<span class="text-danger ms-1">*</span></label>
                                <input type="email" class="form-control @error('owner_email') is-invalid @enderror" name="owner_email" value="{{ old('owner_email') }}" placeholder="proprietaire@exemple.com">
                                @error('owner_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Mot de passe') }}<span class="text-danger ms-1">*</span></label>
                                <div class="pass-group input-group">
                                    <span class="isax toggle-password isax-eye-slash"></span>
                                    <input type="password" class="pass-inputs form-control @error('owner_password') is-invalid @enderror" name="owner_password" autocomplete="new-password">
                                    @error('owner_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Confirmer le mot de passe') }}<span class="text-danger ms-1">*</span></label>
                                <div class="pass-group input-group">
                                    <span class="isax toggle-password isax-eye-slash"></span>
                                    <input type="password" class="pass-inputs form-control" name="owner_password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                    <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
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
                    <h4 class="modal-title">{{ __('Modifier le Tenant') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
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
                                    'label'       => __("Logo de l'entreprise"),
                                    'required'    => false,
                                ])
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Nom') }}<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $tenant->name) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Statut') }}<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="status">
                                        <option value="active" {{ $tenant->status === 'active' ? 'selected' : '' }}>{{ __('Actif') }}</option>
                                        <option value="suspended" {{ $tenant->status === 'suspended' ? 'selected' : '' }}>{{ __('Suspendu') }}</option>
                                        <option value="cancelled" {{ $tenant->status === 'cancelled' ? 'selected' : '' }}>{{ __('Annulé') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Fuseau horaire') }}</label>
                                    <input type="text" class="form-control" name="timezone" value="{{ old('timezone', $tenant->timezone ?? 'Africa/Casablanca') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Devise par défaut') }}</label>
                                    <input type="text" class="form-control" name="default_currency" value="{{ old('default_currency', $tenant->default_currency ?? 'MAD') }}" maxlength="3">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="form-label mb-0">{{ __('Essai gratuit') }}</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input trial-toggle" type="checkbox" role="switch" name="has_free_trial" value="1" {{ $tenant->has_free_trial ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 trial-date-wrapper" style="{{ $tenant->has_free_trial ? '' : 'display:none;' }}">
                                <div class="mb-3">
                                    <label class="form-label">{{ __("Date de fin d'essai") }}<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group position-relative">
                                        <input type="text" class="form-control datetimepicker" name="trial_ends_at" value="{{ old('trial_ends_at', $tenant->trial_ends_at?->format('d-m-Y')) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Owner Password Change --}}
                        @php $owner = $tenant->users()->oldest()->first(); @endphp
                        @if($owner)
                            <div class="border-top pt-3 mt-2 mb-3">
                                <h6 class="fs-14 fw-bold">{{ __('Changer le mot de passe du propriétaire') }}</h6>
                                <p class="text-muted fs-12 mb-0">{{ $owner->name }} ({{ $owner->email }}) — {{ __('Laisser vide pour ne pas changer') }}</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Nouveau mot de passe') }}</label>
                                        <div class="pass-group input-group">
                                            <span class="isax toggle-password isax-eye-slash"></span>
                                            <input type="password" class="pass-inputs form-control @error('owner_password') is-invalid @enderror" name="owner_password" autocomplete="new-password">
                                            @error('owner_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                                        <div class="pass-group input-group">
                                            <span class="isax toggle-password isax-eye-slash"></span>
                                            <input type="password" class="pass-inputs form-control" name="owner_password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer les modifications') }}</button>
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
                        {{ __('Détails du Tenant') }}
                    </h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
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
                                                            <span class="text-muted fs-12"><code>{{ $tenant->slug }}</code></span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);" class="btn btn-outline-white d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_tenant_{{ $tenant->id }}">
                                                            <i class="isax isax-edit me-1"></i>{{ __('Modifier') }}
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
                                    <h6 class="fs-14 fw-bold">{{ __('Informations générales') }}</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <span class="fs-14">{{ __('Utilisateurs') }}</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->users_count ?? 0 }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">{{ __('Fuseau horaire') }}</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->timezone ?? 'Africa/Casablanca' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">{{ __('Devise') }}</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->default_currency ?? 'MAD' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <p class="fs-14 mb-0">{{ __('Statut') }}</p>
                                    @if($tenant->status === 'active')
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Actif') }}
                                            <i class="isax isax-tick-circle ms-1"></i>
                                        </span>
                                    @elseif($tenant->status === 'suspended')
                                        <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('Suspendu') }}
                                            <i class="isax isax-slash ms-1"></i>
                                        </span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Inactif') }}
                                            <i class="isax isax-close-circle ms-1"></i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">{{ __('Essai gratuit') }}</span>
                                    @if($tenant->has_free_trial)
                                        <h6 class="fs-14 fw-medium mb-0">
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">{{ __('Oui') }} <i class="isax isax-tick-circle ms-1"></i></span>
                                            @if($tenant->trial_ends_at)
                                                <span class="text-muted ms-1">{{ __("jusqu'au") }} {{ $tenant->trial_ends_at->format('d/m/Y') }}</span>
                                            @endif
                                        </h6>
                                    @else
                                        <h6 class="fs-14 fw-medium mb-0">{{ __('Non') }}</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">{{ __('Créé le') }}</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->created_at->format('d/m/Y à H:i') }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">{{ __('Mis à jour le') }}</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $tenant->updated_at->format('d/m/Y à H:i') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Historique des transactions --}}
                    <div class="mb-3">
                        <h6 class="fs-14 fw-bold mb-2"><i class="isax isax-receipt-text me-1"></i>{{ __('Historique des transactions') }}</h6>
                        @php
                            $allInvoices = $tenant->subscriptions->flatMap(fn($s) => $s->invoices->map(function($inv) use ($s) {
                                $inv->_subscription = $s;
                                return $inv;
                            }))->sortByDesc('created_at');
                        @endphp
                        @if($allInvoices->count())
                            <div class="table-responsive">
                                <table class="table table-sm table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th class="fs-12">{{ __('Date') }}</th>
                                            <th class="fs-12">{{ __('Plan') }}</th>
                                            <th class="fs-12">{{ __('Montant') }}</th>
                                            <th class="fs-12">{{ __('Statut') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allInvoices->take(10) as $inv)
                                            <tr>
                                                <td class="fs-13">{{ $inv->created_at->format('d/m/Y') }}</td>
                                                <td class="fs-13">{{ $inv->_subscription->plan?->name ?? '—' }}</td>
                                                <td class="fs-13">{{ number_format($inv->amount, 2) }} {{ $inv->currency ?? 'MAD' }}</td>
                                                <td>
                                                    @switch($inv->status)
                                                        @case('paid')
                                                            <span class="badge badge-soft-success">{{ __('Payé') }}</span>
                                                            @break
                                                        @case('pending')
                                                            <span class="badge badge-soft-warning">{{ __('En attente') }}</span>
                                                            @break
                                                        @case('failed')
                                                            <span class="badge badge-soft-danger">{{ __('Échoué') }}</span>
                                                            @break
                                                        @default
                                                            <span class="badge badge-soft-secondary">{{ $inv->status }}</span>
                                                    @endswitch
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if($allInvoices->count() > 10)
                                <small class="text-muted mt-1 d-block">{{ __('Affichage des 10 dernières transactions sur :count au total.', ['count' => $allInvoices->count()]) }}</small>
                            @endif
                        @else
                            <p class="text-muted fs-13 mb-0">{{ __('Aucune transaction enregistrée.') }}</p>
                        @endif
                    </div>
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
                    <h6 class="mb-1">{{ __('Supprimer le Tenant') }}</h6>
                    <p class="mb-3">{{ __('Êtes-vous sûr de vouloir supprimer') }} « {{ $tenant->name }} » ?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                        <form method="POST" action="{{ route('sa.tenants.destroy', $tenant) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">{{ __('Oui, Supprimer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /Delete Tenant Modal --}}

@endforeach

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fix toggle-password: scope to sibling input within the same .pass-group
    $(document).off('click', '.pass-group .toggle-password').on('click', '.pass-group .toggle-password', function (e) {
        e.stopImmediatePropagation();
        var $icon = $(this);
        var $input = $icon.siblings('.pass-inputs, .pass-input');
        if ($input.length) {
            var isPassword = $input.attr('type') === 'password';
            $input.attr('type', isPassword ? 'text' : 'password');
            $icon.toggleClass('isax-eye isax-eye-slash');
        }
    });
});
</script>
@endpush
