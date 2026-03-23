<?php $page = 'tenants'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Utilisation')
@section('description', "Consulter l'utilisation des locataires")
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <h6><a href="{{ route('sa.tenants.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Tenants') }}</a></h6>
                    <p class="text-muted mb-0">{{ __('Utilisation et limites') }} — {{ $tenant->name }}</p>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('sa.tenants.index') }}" class="btn btn-outline-white d-inline-flex align-items-center">
                        <i class="isax isax-arrow-left me-1"></i>{{ __('Retour') }}
                    </a>
                </div>
            </div>
            <!-- End Breadcrumb -->

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

            <!-- Tenant Info Card -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-lg bg-soft-primary me-3">
                                        <i class="isax isax-buildings-25 text-primary fs-28"></i>
                                    </span>
                                    <div>
                                        <h6 class="mb-1">{{ $tenant->name }}</h6>
                                        <span class="badge {{ $tenant->status === 'active' ? 'badge-soft-success' : 'badge-soft-danger' }}">
                                            {{ ucfirst($tenant->status) }}
                                        </span>
                                        @if($subscription && $subscription->plan)
                                            <span class="badge badge-soft-info ms-1">{{ $subscription->plan->name }}</span>
                                            <span class="badge badge-soft-secondary ms-1">{{ ucfirst($subscription->status) }}</span>
                                        @else
                                            <span class="badge badge-soft-warning ms-1">{{ __('Aucun abonnement') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Usage Overview -->
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-chart fs-14"></i></span>
                                <h6 class="fs-16 fw-semibold mb-0">{{ __('Utilisation actuelle') }}</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                @foreach($usageData as $key => $item)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="card shadow-none border mb-0">
                                            <div class="card-body p-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="fs-13 fw-semibold">{{ $item['label'] }}</span>
                                                    @if($item['monthly'])
                                                        <span class="badge badge-soft-secondary ms-auto fs-10">{{ __('Mensuel') }}</span>
                                                    @endif
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <span class="fs-20 fw-bold">{{ $item['usage'] }}</span>
                                                    <span class="fs-13 text-muted">
                                                        / {{ $item['limit'] !== null ? $item['limit'] : __('Illimité') }}
                                                    </span>
                                                </div>
                                                @if($item['limit'] !== null)
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar {{ $item['percent'] >= 90 ? 'bg-danger' : ($item['percent'] >= 70 ? 'bg-warning' : 'bg-success') }}"
                                                            role="progressbar"
                                                            style="width: {{ $item['percent'] }}%"></div>
                                                    </div>
                                                    <span class="fs-11 text-muted mt-1">{{ $item['percent'] }}% {{ __('utilisé') }}</span>
                                                @else
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 100%"></div>
                                                    </div>
                                                    <span class="fs-11 text-muted mt-1">{{ __('Illimité') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Limits Form -->
            @if($subscription && $subscription->plan)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <span class="bg-dark avatar avatar-sm me-2 flex-shrink-0"><i class="isax isax-setting-2 fs-14"></i></span>
                                <h6 class="fs-16 fw-semibold mb-0">{{ __('Modifier les limites du plan') }} « {{ $subscription->plan->name }} »</h6>
                            </div>
                            <p class="text-muted fs-13 mt-1 mb-0">
                                {{ __('Laisser vide pour une limite illimitée. Les modifications affectent le plan globalement.') }}
                            </p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('sa.tenants.usage.update', $tenant) }}">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    @php
                                        $fields = [
                                            'max_users'              => __('Utilisateurs max'),
                                            'max_customers'          => __('Clients max'),
                                            'max_products'           => __('Produits max'),
                                            'max_invoices_per_month' => __('Factures / mois max'),
                                            'max_quotes_per_month'   => __('Devis / mois max'),
                                            'max_exports_per_month'  => __('Exports / mois max'),
                                            'max_warehouses'         => __('Entrepôts max'),
                                            'max_bank_accounts'      => __('Comptes bancaires max'),
                                            'max_storage_mb'         => __('Stockage max (Mo)'),
                                        ];
                                    @endphp
                                    @foreach($fields as $field => $label)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="{{ $field }}">{{ $label }}</label>
                                                <input type="number"
                                                    class="form-control @error($field) is-invalid @enderror"
                                                    id="{{ $field }}"
                                                    name="{{ $field }}"
                                                    value="{{ old($field, $subscription->plan->{$field}) }}"
                                                    min="0"
                                                    placeholder="{{ __('Vide = Illimité') }}">
                                                @error($field)
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('sa.tenants.index') }}" class="btn btn-outline-secondary me-2">{{ __('Annuler') }}</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="isax isax-tick-circle me-1"></i>{{ __('Enregistrer les limites') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="isax isax-warning-2 fs-40 text-warning mb-3"></i>
                        <h6>{{ __('Aucun abonnement actif') }}</h6>
                        <p class="text-muted">{{ __("Ce tenant n'a pas d'abonnement actif. Créez un abonnement d'abord pour pouvoir modifier les limites.") }}</p>
                        <a href="{{ route('sa.subscriptions.index') }}" class="btn btn-primary">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Gérer les abonnements') }}
                        </a>
                    </div>
                </div>
            @endif

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>
@endsection
