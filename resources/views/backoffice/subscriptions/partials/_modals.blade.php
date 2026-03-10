{{-- ============================================
    Add Subscription Modal
    Based on subscriptions.blade.php layout
============================================= --}}
<div id="add_subscription" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nouvel Abonnement</h4>
                <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
            </div>
            <form method="POST" action="{{ route('sa.subscriptions.store') }}">
                @csrf
                <input type="hidden" name="_modal" value="add_subscription">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Entreprise<span class="text-danger ms-1">*</span></label>
                                <select class="form-select @error('tenant_id') is-invalid @enderror" name="tenant_id">
                                    <option value="">-- Sélectionner --</option>
                                    @foreach($tenants as $tenant)
                                        <option value="{{ $tenant->id }}" {{ old('tenant_id') == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                                    @endforeach
                                </select>
                                @error('tenant_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Plan<span class="text-danger ms-1">*</span></label>
                                <select class="form-select @error('plan_id') is-invalid @enderror" name="plan_id">
                                    <option value="">-- Sélectionner --</option>
                                    @foreach($plans as $plan)
                                        <option value="{{ $plan->id }}" {{ old('plan_id') == $plan->id ? 'selected' : '' }}>{{ $plan->name }} ({{ number_format($plan->price, 2) }} {{ $plan->currency }})</option>
                                    @endforeach
                                </select>
                                @error('plan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Statut<span class="text-danger ms-1">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Actif</option>
                                    <option value="trialing" {{ old('status') === 'trialing' ? 'selected' : '' }}>Essai</option>
                                    <option value="past_due" {{ old('status') === 'past_due' ? 'selected' : '' }}>Impayé</option>
                                    <option value="cancelled" {{ old('status') === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Quantité</label>
                                <input type="number" min="1" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', 1) }}">
                                @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Remise (MAD)</label>
                                <input type="number" min="0" step="0.01" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount', 0) }}" id="add-sub-discount">
                                @error('discount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <small class="text-muted" id="add-sub-final-price"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date de début<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control datetimepicker @error('starts_at') is-invalid @enderror" name="starts_at" value="{{ old('starts_at') }}">
                                @error('starts_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date de fin</label>
                                <input type="text" class="form-control datetimepicker @error('ends_at') is-invalid @enderror" name="ends_at" value="{{ old('ends_at') }}">
                                @error('ends_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Fin de la période d'essai</label>
                                <input type="text" class="form-control datetimepicker @error('trial_ends_at') is-invalid @enderror" name="trial_ends_at" value="{{ old('trial_ends_at') }}">
                                @error('trial_ends_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date d'annulation</label>
                                <input type="text" class="form-control datetimepicker @error('cancels_at') is-invalid @enderror" name="cancels_at" value="{{ old('cancels_at') }}">
                                @error('cancels_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Fournisseur<span class="text-danger ms-1">*</span></label>
                                <select class="form-select @error('provider') is-invalid @enderror" name="provider">
                                    <option value="manual" {{ old('provider', 'manual') === 'manual' ? 'selected' : '' }}>Manuel</option>
                                    <option value="stripe" {{ old('provider') === 'stripe' ? 'selected' : '' }}>Stripe</option>
                                </select>
                                @error('provider')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">ID Abonnement Fournisseur</label>
                                <input type="text" class="form-control @error('provider_subscription_id') is-invalid @enderror" name="provider_subscription_id" value="{{ old('provider_subscription_id') }}" placeholder="sub_xxx...">
                                @error('provider_subscription_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
{{-- /Add Subscription Modal --}}

{{-- ============================================
    Per-Subscription Modals: Edit, View, Delete
============================================= --}}
@foreach($subscriptions as $subscription)

    {{-- Edit Subscription Modal --}}
    <div id="edit_subscription_{{ $subscription->id }}" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier l'Abonnement</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('sa.subscriptions.update', $subscription) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="p-3 br-5 bg-transparent-light">
                                        <span class="fs-14">Entreprise :</span>
                                        <strong>{{ $subscription->tenant?->name ?? '—' }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Plan<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="plan_id">
                                        @foreach($plans as $plan)
                                            <option value="{{ $plan->id }}" {{ $subscription->plan_id == $plan->id ? 'selected' : '' }}>{{ $plan->name }} ({{ number_format($plan->price, 2) }} {{ $plan->currency }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Statut<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="status">
                                        <option value="active" {{ $subscription->status === 'active' ? 'selected' : '' }}>Actif</option>
                                        <option value="trialing" {{ $subscription->status === 'trialing' ? 'selected' : '' }}>Essai</option>
                                        <option value="past_due" {{ $subscription->status === 'past_due' ? 'selected' : '' }}>Impayé</option>
                                        <option value="cancelled" {{ $subscription->status === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Quantité</label>
                                    <input type="number" min="1" class="form-control" name="quantity" value="{{ old('quantity', $subscription->quantity) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Remise (MAD)</label>
                                    <input type="number" min="0" step="0.01" class="form-control" name="discount" value="{{ old('discount', $subscription->discount ?? 0) }}">
                                    @if($subscription->plan)
                                        <small class="text-muted">Prix plan : {{ number_format($subscription->plan->price, 2) }} {{ $subscription->plan->currency }} &rarr; Prix final : {{ number_format($subscription->plan->price - ($subscription->discount ?? 0), 2) }} {{ $subscription->plan->currency }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Date de début<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control datetimepicker" name="starts_at" value="{{ old('starts_at', $subscription->starts_at?->format('d-m-Y')) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Date de fin</label>
                                    <input type="text" class="form-control datetimepicker" name="ends_at" value="{{ old('ends_at', $subscription->ends_at?->format('d-m-Y')) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Fin de la période d'essai</label>
                                    <input type="text" class="form-control datetimepicker" name="trial_ends_at" value="{{ old('trial_ends_at', $subscription->trial_ends_at?->format('d-m-Y')) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Date d'annulation</label>
                                    <input type="text" class="form-control datetimepicker" name="cancels_at" value="{{ old('cancels_at', $subscription->cancels_at?->format('d-m-Y')) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Fournisseur<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="provider">
                                        <option value="manual" {{ $subscription->provider === 'manual' ? 'selected' : '' }}>Manuel</option>
                                        <option value="stripe" {{ $subscription->provider === 'stripe' ? 'selected' : '' }}>Stripe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">ID Abonnement Fournisseur</label>
                                    <input type="text" class="form-control" name="provider_subscription_id" value="{{ old('provider_subscription_id', $subscription->provider_subscription_id) }}">
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
    {{-- /Edit Subscription Modal --}}

    {{-- View Subscription Modal --}}
    <div class="modal fade" id="view_subscription_{{ $subscription->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title d-flex align-items-center">Détails de l'Abonnement</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <div class="modal-body pb-0">
                    <div class="border-bottom mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="p-3 mb-3 br-5 bg-transparent-light">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar avatar-xxl bg-soft-info rounded-2 d-flex align-items-center justify-content-center">
                                                    <i class="isax isax-buildings-25 text-info fs-24"></i>
                                                </span>
                                                <div class="ms-2">
                                                    <h6 class="fw-bold fs-14 mb-1">{{ $subscription->tenant?->name ?? '—' }}</h6>
                                                    <span class="text-muted">Plan : <strong>{{ $subscription->plan?->name ?? '—' }}</strong></span>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-outline-white d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_subscription_{{ $subscription->id }}">
                                                    <i class="isax isax-edit me-1"></i>Modifier
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <h6 class="fs-14 fw-bold">Informations de l'abonnement</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <p class="fs-14 mb-0">Statut</p>
                                    @switch($subscription->status)
                                        @case('active')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">Actif <i class="isax isax-tick-circle ms-1"></i></span>
                                            @break
                                        @case('trialing')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center">Essai <i class="isax isax-timer-1 ms-1"></i></span>
                                            @break
                                        @case('past_due')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">Impayé <i class="isax isax-warning-2 ms-1"></i></span>
                                            @break
                                        @case('cancelled')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">Annulé <i class="isax isax-close-circle ms-1"></i></span>
                                            @break
                                    @endswitch
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Quantité</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $subscription->quantity }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Remise</span>
                                    <h6 class="fs-14 fw-medium mb-0">
                                        @if(($subscription->discount ?? 0) > 0)
                                            <span class="text-danger">-{{ number_format($subscription->discount, 2) }} {{ $subscription->plan?->currency ?? 'MAD' }}</span>
                                        @else
                                            —
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            @if(($subscription->discount ?? 0) > 0 && $subscription->plan)
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <span class="fs-14">Prix final</span>
                                        <h6 class="fs-14 fw-bold mb-0 text-success">{{ number_format($subscription->plan->price - $subscription->discount, 2) }} {{ $subscription->plan->currency }}</h6>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Fournisseur</span>
                                    <h6 class="fs-14 fw-medium mb-0">
                                        @if($subscription->provider === 'stripe')
                                            <span class="badge badge-soft-info">Stripe</span>
                                        @else
                                            <span class="badge badge-soft-warning">Manuel</span>
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Date de début</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $subscription->starts_at?->format('d/m/Y') ?? '—' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Date de fin</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $subscription->ends_at?->format('d/m/Y') ?? '—' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Fin de la période d'essai</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $subscription->trial_ends_at?->format('d/m/Y') ?? '—' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Date d'annulation</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $subscription->cancels_at?->format('d/m/Y') ?? '—' }}</h6>
                                </div>
                            </div>
                            @if($subscription->provider_subscription_id)
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <span class="fs-14">ID Fournisseur</span>
                                        <h6 class="fs-14 fw-medium mb-0"><code>{{ $subscription->provider_subscription_id }}</code></h6>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Créé le</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $subscription->created_at->format('d/m/Y à H:i') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /View Subscription Modal --}}

    {{-- Delete Subscription Modal --}}
    <div class="modal fade" id="delete_subscription_{{ $subscription->id }}">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">Supprimer l'Abonnement</h6>
                    <p class="mb-3">Êtes-vous sûr de vouloir supprimer l'abonnement de « {{ $subscription->tenant?->name ?? '—' }} » ?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">Annuler</a>
                        <form method="POST" action="{{ route('sa.subscriptions.destroy', $subscription) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Oui, Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /Delete Subscription Modal --}}

@endforeach
