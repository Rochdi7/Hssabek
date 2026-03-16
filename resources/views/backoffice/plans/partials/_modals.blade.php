{{-- ============================================
    Add Plan Modal
============================================= --}}
<div id="add_plan" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Nouveau Plan') }}</h4>
                <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
            </div>
            <form method="POST" action="{{ route('sa.plans.store') }}">
                @csrf
                <input type="hidden" name="_modal" value="add_plan">
                <div class="modal-body">
                    {{-- Basic Info --}}
                    <h6 class="fs-14 fw-bold mb-3">{{ __("Informations générales") }}</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nom du plan<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ex: Basic, Premium...">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Code<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" placeholder="basic-monthly">
                                @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="2" placeholder="Description courte du plan...">{{ old('description') }}</textarea>
                                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Intervalle<span class="text-danger ms-1">*</span></label>
                                <select class="form-select @error('interval') is-invalid @enderror" name="interval">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="month" {{ old('interval') === 'month' ? 'selected' : '' }}>Mensuel</option>
                                    <option value="year" {{ old('interval') === 'year' ? 'selected' : '' }}>Annuel</option>
                                    <option value="lifetime" {{ old('interval') === 'lifetime' ? 'selected' : '' }}>À vie</option>
                                </select>
                                @error('interval')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Prix<span class="text-danger ms-1">*</span></label>
                                <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="0.00">
                                @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Devise</label>
                                <input type="text" class="form-control @error('currency') is-invalid @enderror" name="currency" value="{{ old('currency', 'MAD') }}" maxlength="3">
                                @error('currency')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Jours d'essai</label>
                                <input type="number" min="0" class="form-control @error('trial_days') is-invalid @enderror" name="trial_days" value="{{ old('trial_days', 0) }}" placeholder="0">
                                @error('trial_days')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-between h-100 pt-4">
                                    <label class="form-label mb-0">Actif</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-between h-100 pt-4">
                                    <label class="form-label mb-0">Populaire</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Limits Section --}}
                    <hr class="my-3">
                    <h6 class="fs-14 fw-bold mb-3">Limites et quotas</h6>
                    <p class="text-muted fs-13 mb-3">Cochez « Illimité » pour ne pas imposer de limite sur cette ressource.</p>
                    <div class="row">
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_users', 'label' => 'Utilisateurs max', 'icon' => 'isax-people', 'value' => old('max_users'), 'unlimited' => old('max_users_unlimited')])
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_customers', 'label' => 'Clients max', 'icon' => 'isax-profile-2user', 'value' => old('max_customers'), 'unlimited' => old('max_customers_unlimited')])
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_products', 'label' => 'Produits max', 'icon' => 'isax-box', 'value' => old('max_products'), 'unlimited' => old('max_products_unlimited')])
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_invoices_per_month', 'label' => 'Factures / mois', 'icon' => 'isax-receipt-item', 'value' => old('max_invoices_per_month'), 'unlimited' => old('max_invoices_per_month_unlimited')])
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_quotes_per_month', 'label' => 'Devis / mois', 'icon' => 'isax-document-text', 'value' => old('max_quotes_per_month'), 'unlimited' => old('max_quotes_per_month_unlimited')])
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_exports_per_month', 'label' => 'Exports / mois', 'icon' => 'isax-export-1', 'value' => old('max_exports_per_month'), 'unlimited' => old('max_exports_per_month_unlimited')])
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_warehouses', 'label' => 'Entrepôts max', 'icon' => 'isax-buildings', 'value' => old('max_warehouses'), 'unlimited' => old('max_warehouses_unlimited')])
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_bank_accounts', 'label' => 'Comptes bancaires max', 'icon' => 'isax-bank', 'value' => old('max_bank_accounts'), 'unlimited' => old('max_bank_accounts_unlimited')])
                        @include('backoffice.plans.partials._limit_field', ['field' => 'max_storage_mb', 'label' => 'Stockage (Mo)', 'icon' => 'isax-cloud', 'value' => old('max_storage_mb'), 'unlimited' => old('max_storage_mb_unlimited')])
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
{{-- /Add Plan Modal --}}

{{-- ============================================
    Per-Plan Modals: Edit, View, Delete
============================================= --}}
@foreach($plans as $plan)

    {{-- Edit Plan Modal --}}
    <div id="edit_plan_{{ $plan->id }}" class="modal fade">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Modifier le Plan') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('sa.plans.update', $plan) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        {{-- Basic Info --}}
                        <h6 class="fs-14 fw-bold mb-3">{{ __("Informations générales") }}</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nom du plan<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $plan->name) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Code<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control" name="code" value="{{ old('code', $plan->code) }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="2">{{ old('description', $plan->description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Intervalle<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select" name="interval">
                                        <option value="month" {{ $plan->interval === 'month' ? 'selected' : '' }}>Mensuel</option>
                                        <option value="year" {{ $plan->interval === 'year' ? 'selected' : '' }}>Annuel</option>
                                        <option value="lifetime" {{ $plan->interval === 'lifetime' ? 'selected' : '' }}>À vie</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Prix<span class="text-danger ms-1">*</span></label>
                                    <input type="number" step="0.01" min="0" class="form-control" name="price" value="{{ old('price', $plan->price) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Devise</label>
                                    <input type="text" class="form-control" name="currency" value="{{ old('currency', $plan->currency) }}" maxlength="3">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Jours d'essai</label>
                                    <input type="number" min="0" class="form-control" name="trial_days" value="{{ old('trial_days', $plan->trial_days) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between h-100 pt-4">
                                        <label class="form-label mb-0">Actif</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_active" value="1" {{ $plan->is_active ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between h-100 pt-4">
                                        <label class="form-label mb-0">Populaire</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="is_popular" value="1" {{ $plan->is_popular ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Limits Section --}}
                        <hr class="my-3">
                        <h6 class="fs-14 fw-bold mb-3">Limites et quotas</h6>
                        <p class="text-muted fs-13 mb-3">Cochez « Illimité » pour ne pas imposer de limite sur cette ressource.</p>
                        <div class="row">
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_users', 'label' => 'Utilisateurs max', 'icon' => 'isax-people', 'value' => old('max_users', $plan->max_users), 'unlimited' => $plan->max_users === null])
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_customers', 'label' => 'Clients max', 'icon' => 'isax-profile-2user', 'value' => old('max_customers', $plan->max_customers), 'unlimited' => $plan->max_customers === null])
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_products', 'label' => 'Produits max', 'icon' => 'isax-box', 'value' => old('max_products', $plan->max_products), 'unlimited' => $plan->max_products === null])
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_invoices_per_month', 'label' => 'Factures / mois', 'icon' => 'isax-receipt-item', 'value' => old('max_invoices_per_month', $plan->max_invoices_per_month), 'unlimited' => $plan->max_invoices_per_month === null])
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_quotes_per_month', 'label' => 'Devis / mois', 'icon' => 'isax-document-text', 'value' => old('max_quotes_per_month', $plan->max_quotes_per_month), 'unlimited' => $plan->max_quotes_per_month === null])
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_exports_per_month', 'label' => 'Exports / mois', 'icon' => 'isax-export-1', 'value' => old('max_exports_per_month', $plan->max_exports_per_month), 'unlimited' => $plan->max_exports_per_month === null])
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_warehouses', 'label' => 'Entrepôts max', 'icon' => 'isax-buildings', 'value' => old('max_warehouses', $plan->max_warehouses), 'unlimited' => $plan->max_warehouses === null])
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_bank_accounts', 'label' => 'Comptes bancaires max', 'icon' => 'isax-bank', 'value' => old('max_bank_accounts', $plan->max_bank_accounts), 'unlimited' => $plan->max_bank_accounts === null])
                            @include('backoffice.plans.partials._limit_field', ['field' => 'max_storage_mb', 'label' => 'Stockage (Mo)', 'icon' => 'isax-cloud', 'value' => old('max_storage_mb', $plan->max_storage_mb), 'unlimited' => $plan->max_storage_mb === null])
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer les modifications') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /Edit Plan Modal --}}

    {{-- View Plan Modal --}}
    <div class="modal fade" id="view_plan_{{ $plan->id }}">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title d-flex align-items-center">Détails du Plan</h4>
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
                                                <span class="avatar avatar-xxl bg-warning rounded-2 d-flex align-items-center justify-content-center">
                                                    <i class="isax isax-box5 fs-24"></i>
                                                </span>
                                                <div class="ms-2">
                                                    <h6 class="fw-bold fs-14 mb-1">
                                                        {{ $plan->name }}
                                                        @if($plan->is_popular)
                                                            <span class="badge bg-success ms-2">Populaire</span>
                                                        @endif
                                                    </h6>
                                                    <span class="text-muted"><code>{{ $plan->code }}</code></span>
                                                    @if($plan->description)
                                                        <p class="text-muted fs-13 mb-0 mt-1">{{ $plan->description }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-outline-white d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#edit_plan_{{ $plan->id }}">
                                                    <i class="isax isax-edit me-1"></i>{{ __('Modifier') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Prix</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ number_format($plan->price, 2, ',', ' ') }} {{ $plan->currency }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Intervalle</span>
                                    <h6 class="fs-14 fw-medium mb-0">
                                        @switch($plan->interval)
                                            @case('month') Mensuel @break
                                            @case('year') Annuel @break
                                            @case('lifetime') À vie @break
                                        @endswitch
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Jours d'essai</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $plan->trial_days ?: '—' }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <span class="fs-14">Abonnés</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $plan->subscriptions_count ?? 0 }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <p class="fs-14 mb-0">Statut</p>
                                    @if($plan->is_active)
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Actif
                                            <i class="isax isax-tick-circle ms-1"></i>
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
                                    <span class="fs-14">Créé le</span>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $plan->created_at->format('d/m/Y à H:i') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Limits Display --}}
                    <div class="mb-3">
                        <h6 class="fs-14 fw-bold mb-3">Limites et quotas</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-people me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Utilisateurs</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->formatLimit($plan->max_users) }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-profile-2user me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Clients</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->formatLimit($plan->max_customers) }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-box me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Produits</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->formatLimit($plan->max_products) }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-receipt-item me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Factures / mois</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->formatLimit($plan->max_invoices_per_month) }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-document-text me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Devis / mois</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->formatLimit($plan->max_quotes_per_month) }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-export-1 me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Exports / mois</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->formatLimit($plan->max_exports_per_month) }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-buildings me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Entrepôts</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->formatLimit($plan->max_warehouses) }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-bank me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Comptes bancaires</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->formatLimit($plan->max_bank_accounts) }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 d-flex align-items-center">
                                    <i class="isax isax-cloud me-2 fs-16"></i>
                                    <div>
                                        <span class="fs-13 text-muted">Stockage</span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $plan->max_storage_mb === null ? 'Illimité' : $plan->max_storage_mb . ' Mo' }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($plan->features)
                        <div class="mb-3">
                            <h6 class="fs-14 fw-bold mb-2">Fonctionnalités supplémentaires</h6>
                            <div class="bg-transparent-light rounded p-3">
                                <pre class="mb-0 fs-13">{{ json_encode($plan->features, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- /View Plan Modal --}}

    {{-- Delete Plan Modal --}}
    <div class="modal fade" id="delete_plan_{{ $plan->id }}">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">{{ __('Supprimer le Plan') }}</h6>
                    <p class="mb-3">Êtes-vous sûr de vouloir supprimer « {{ $plan->name }} » ?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                        <form method="POST" action="{{ route('sa.plans.destroy', $plan) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">{{ __('Oui, Supprimer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /Delete Plan Modal --}}

@endforeach
