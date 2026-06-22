<?php $page = 'data-export'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', __('Exportation des données'))
@section('description', __('Téléchargez toutes les données de votre entreprise'))
@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-12">
                    <div class="row settings-wrapper d-flex">
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-4 pb-4 border-bottom">
                                <h6 class="fw-bold mb-0">{{ __('Exportation des données') }}</h6>
                                <p class="text-muted fs-13 mt-1 mb-0">
                                    {{ __('Téléchargez toutes les données de votre entreprise dans le format de votre choix.') }}
                                </p>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="isax isax-tick-circle me-2"></i>{{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="isax isax-info-circle me-2"></i>{{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('bo.settings.data-export.download') }}" method="POST" id="exportForm">
                                @csrf

                                {{-- Format --}}
                                <div class="border-bottom mb-4 pb-4">
                                    <div class="card-title-head">
                                        <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center">
                                                <i class="isax isax-document-download"></i>
                                            </span>
                                            {{ __('Format d\'export') }}
                                        </h6>
                                    </div>
                                    @error('format')
                                        <div class="alert alert-danger py-2 fs-13">{{ $message }}</div>
                                    @enderror
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="export-format-card border rounded-3 p-3 cursor-pointer @error('format') border-danger @enderror"
                                                 onclick="selectFormat('xlsx')" id="card-xlsx">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="badge bg-soft-success text-success fs-22 p-2 rounded">
                                                            <i class="isax isax-document-text"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h6 class="fs-14 fw-semibold mb-0">Excel (.xlsx)</h6>
                                                        <p class="fs-12 text-muted mb-0">{{ __('Feuilles formatées, en-têtes en couleur') }}</p>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <input type="radio" name="format" value="xlsx" id="format-xlsx" class="form-check-input" checked>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="export-format-card border rounded-3 p-3 cursor-pointer"
                                                 onclick="selectFormat('json')" id="card-json">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="badge bg-soft-primary text-primary fs-22 p-2 rounded">
                                                            <i class="isax isax-code"></i>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <h6 class="fs-14 fw-semibold mb-0">JSON</h6>
                                                        <p class="fs-12 text-muted mb-0">{{ __('Pour intégrations & API') }}</p>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <input type="radio" name="format" value="json" id="format-json" class="form-check-input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modules --}}
                                <div class="border-bottom mb-4 pb-4">
                                    <div class="card-title-head d-flex align-items-center justify-content-between mb-3">
                                        <h6 class="fs-16 fw-semibold mb-0 d-flex align-items-center">
                                            <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center">
                                                <i class="isax isax-category"></i>
                                            </span>
                                            {{ __('Modules à exporter') }}
                                        </h6>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="selectAllModules(true)">
                                                {{ __('Tout sélectionner') }}
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="selectAllModules(false)">
                                                {{ __('Tout désélectionner') }}
                                            </button>
                                        </div>
                                    </div>
                                    @error('modules')
                                        <div class="alert alert-danger py-2 fs-13 mb-3">{{ $message }}</div>
                                    @enderror

                                    <div class="row g-3">
                                        {{-- CRM --}}
                                        <div class="col-12">
                                            <p class="fs-12 fw-semibold text-uppercase text-muted mb-2 ms-1">
                                                <i class="isax isax-people me-1"></i>{{ __('CRM') }}
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="customers" class="form-check-input mt-0 flex-shrink-0" checked>
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Clients') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['customers']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>

                                        {{-- Ventes --}}
                                        <div class="col-12 mt-2">
                                            <p class="fs-12 fw-semibold text-uppercase text-muted mb-2 ms-1">
                                                <i class="isax isax-receipt me-1"></i>{{ __('Ventes') }}
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="invoices" class="form-check-input mt-0 flex-shrink-0" checked>
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Factures') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['invoices']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="quotes" class="form-check-input mt-0 flex-shrink-0" checked>
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Devis') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['quotes']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="payments" class="form-check-input mt-0 flex-shrink-0" checked>
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Paiements reçus') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['payments']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="credit_notes" class="form-check-input mt-0 flex-shrink-0">
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Avoirs') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['credit_notes']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>

                                        {{-- Achats --}}
                                        <div class="col-12 mt-2">
                                            <p class="fs-12 fw-semibold text-uppercase text-muted mb-2 ms-1">
                                                <i class="isax isax-bag me-1"></i>{{ __('Achats') }}
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="suppliers" class="form-check-input mt-0 flex-shrink-0">
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Fournisseurs') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['suppliers']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="purchase_orders" class="form-check-input mt-0 flex-shrink-0">
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Bons de commande') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['purchase_orders']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="vendor_bills" class="form-check-input mt-0 flex-shrink-0">
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Factures fournisseurs') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['vendor_bills']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>

                                        {{-- Catalogue --}}
                                        <div class="col-12 mt-2">
                                            <p class="fs-12 fw-semibold text-uppercase text-muted mb-2 ms-1">
                                                <i class="isax isax-box me-1"></i>{{ __('Catalogue & Finance') }}
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="products" class="form-check-input mt-0 flex-shrink-0">
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Produits & services') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['products']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="expenses" class="form-check-input mt-0 flex-shrink-0">
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Dépenses') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['expenses']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="income" class="form-check-input mt-0 flex-shrink-0">
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Revenus') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['income']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="export-module-card border rounded-3 p-3 d-flex align-items-center gap-3 w-100 cursor-pointer">
                                                <input type="checkbox" name="modules[]" value="bank_accounts" class="form-check-input mt-0 flex-shrink-0">
                                                <div>
                                                    <span class="fs-14 fw-medium d-block">{{ __('Comptes bancaires') }}</span>
                                                    <span class="fs-12 text-muted">{{ number_format($stats['bank_accounts']) }} {{ __('enregistrements') }}</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Info notice --}}
                                <div class="alert alert-info fs-13 mb-4">
                                    <i class="isax isax-shield-tick me-2"></i>
                                    {{ __('Vos données exportées appartiennent uniquement à votre entreprise. Aucune donnée d\'un autre compte ne sera incluse dans cet export.') }}
                                </div>

                                <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-0">
                                    <a href="{{ route('bo.settings.company.edit') }}" class="btn btn-outline-white me-2">
                                        {{ __('Annuler') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary" id="exportBtn">
                                        <i class="isax isax-document-download me-2"></i>
                                        {{ __('Télécharger l\'export') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>

@endsection

@push('styles')
<style>
    .export-format-card,
    .export-module-card {
        transition: border-color .15s, background-color .15s;
        cursor: pointer;
        user-select: none;
    }
    .export-format-card:has(input:checked),
    .export-module-card:has(input:checked) {
        border-color: var(--bs-primary) !important;
        background-color: rgba(var(--bs-primary-rgb), .04);
    }
    .export-format-card:hover,
    .export-module-card:hover {
        border-color: var(--bs-primary) !important;
    }
</style>
@endpush

@push('scripts')
<script>
    function selectFormat(val) {
        document.querySelectorAll('input[name="format"]').forEach(function(r) {
            r.checked = (r.value === val);
        });
    }

    function selectAllModules(checked) {
        document.querySelectorAll('input[name="modules[]"]').forEach(function(cb) {
            cb.checked = checked;
        });
    }

    document.getElementById('exportForm').addEventListener('submit', function() {
        var btn = document.getElementById('exportBtn');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>{{ __("Préparation en cours...") }}';
        setTimeout(function() {
            btn.disabled = false;
            btn.innerHTML = '<i class="isax isax-document-download me-2"></i>{{ __("Télécharger l\'export") }}';
        }, 5000);
    });
</script>
@endpush
