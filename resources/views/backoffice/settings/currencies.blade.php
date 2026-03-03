<?php $page = 'currencies'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="row">

                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <div class="col-xl-9 col-lg-8">
                            <div>
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Devises & Taux de change</h6>
                                </div>
                                <div class="mb-3">
                                    <!-- Start Table Search -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-icon-start position-relative mb-3">
                                                <span class="input-icon-addon">
                                                    <i class="isax isax-search-normal"></i>
                                                </span>
                                                <input type="text" class="form-control form-control-sm bg-white"
                                                    placeholder="Rechercher" id="currency-search">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="d-flex justify-content-end align-items-center flex-wrap gap-2 mb-3">
                                                <div>
                                                    <a href="#" class="btn btn-primary d-flex align-items-center"
                                                        data-bs-toggle="modal" data-bs-target="#add_currency_modal"><i
                                                            class="isax isax-add-circle5 me-1"></i>Nouvelle devise</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Table Search -->

                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                                        </div>
                                    @endif

                                    <!-- Start Table List -->
                                    <div class="table-responsive border border-bottom-0 rounded">
                                        <table class="table mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Devise</th>
                                                    <th>Code</th>
                                                    <th class="no-sort">Symbole</th>
                                                    <th>Taux de change</th>
                                                    <th class="no-sort">Par défaut</th>
                                                    <th class="no-sort">Statut</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($exchangeRates as $exchangeRate)
                                                    <tr>
                                                        <td>
                                                            <h6 class="fs-14 fw-medium mb-0">{{ $exchangeRate->quoteCurrencyRelation->name }}</h6>
                                                        </td>
                                                        <td>{{ $exchangeRate->quoteCurrencyRelation->code }}</td>
                                                        <td>{{ $exchangeRate->quoteCurrencyRelation->symbol }}</td>
                                                        <td>
                                                            <span class="fw-medium">1 {{ $baseCurrency }} = {{ number_format($exchangeRate->rate, $exchangeRate->quoteCurrencyRelation->precision ?? 2) }} {{ $exchangeRate->quoteCurrencyRelation->code }}</span>
                                                        </td>
                                                        <td class="default-star">
                                                            @if($exchangeRate->quoteCurrencyRelation->code === $defaultCurrency)
                                                                <a class="active" href="javascript:void(0);">
                                                                    <i class="isax isax-star" style="color: #ffc107;"></i>
                                                                </a>
                                                            @else
                                                                <form method="POST" action="{{ route('bo.settings.currencies.set-default', $exchangeRate->quoteCurrencyRelation->code) }}" class="d-inline">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-link p-0 border-0" title="Définir par défaut">
                                                                        <i class="isax isax-star"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" checked disabled>
                                                            </div>
                                                        </td>
                                                        <td class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                                <i class="isax isax-more"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#"
                                                                        class="dropdown-item d-flex align-items-center"
                                                                        data-bs-toggle="modal" data-bs-target="#edit_modal_{{ $exchangeRate->id }}"><i
                                                                            class="isax isax-edit me-2"></i>Modifier</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);"
                                                                        class="dropdown-item d-flex align-items-center"
                                                                        data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $exchangeRate->id }}"><i
                                                                            class="isax isax-trash me-2"></i>Supprimer</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">Aucune devise trouvée.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Table List -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                End Page Content
            ========================= -->

    {{-- ============================================
        Add Currency Modal
    ============================================= --}}
    <div id="add_currency_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une devise</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('bo.settings.currencies.store') }}">
                    @csrf
                    <input type="hidden" name="_modal" value="add_currency_modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Nom de la devise<span class="text-danger ms-1">*</span></label>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Ex : Dollar américain">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Code<span class="text-danger ms-1">*</span></label>
                                    <input type="text"
                                        class="form-control @error('code') is-invalid @enderror"
                                        name="code"
                                        value="{{ old('code') }}"
                                        placeholder="Ex : USD"
                                        maxlength="3"
                                        style="text-transform: uppercase;">
                                    @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Symbole<span class="text-danger ms-1">*</span></label>
                                    <input type="text"
                                        class="form-control @error('symbol') is-invalid @enderror"
                                        name="symbol"
                                        value="{{ old('symbol') }}"
                                        placeholder="Ex : $">
                                    @error('symbol')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Taux de change<span class="text-danger ms-1">*</span></label>
                                    <input type="number" step="any" min="0"
                                        class="form-control @error('rate') is-invalid @enderror"
                                        name="rate"
                                        value="{{ old('rate') }}"
                                        placeholder="Ex : 10.5000">
                                    @error('rate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    <small class="form-text text-muted">Combien d'unités de cette devise pour 1 {{ $baseCurrency }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_default" value="1" id="add_is_default" {{ old('is_default') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="add_is_default">Définir comme devise par défaut</label>
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
    {{-- /Add Currency Modal --}}

    {{-- ============================================
        Per-ExchangeRate Modals: Edit & Delete
    ============================================= --}}
    @foreach($exchangeRates as $exchangeRate)

        {{-- Edit Exchange Rate Modal --}}
        <div id="edit_modal_{{ $exchangeRate->id }}" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier le taux de change</h4>
                        <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <form method="POST" action="{{ route('bo.settings.currencies.update', $exchangeRate) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="_modal" value="edit_modal">
                        <input type="hidden" name="_exchange_rate_id" value="{{ $exchangeRate->id }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Devise</label>
                                        <input type="text" class="form-control" value="{{ $exchangeRate->quoteCurrencyRelation->code }} - {{ $exchangeRate->quoteCurrencyRelation->name }} ({{ $exchangeRate->quoteCurrencyRelation->symbol }})" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Taux de change<span class="text-danger ms-1">*</span></label>
                                        <input type="number" step="any" min="0"
                                            class="form-control @error('rate') is-invalid @enderror"
                                            name="rate"
                                            value="{{ old('rate', $exchangeRate->rate) }}"
                                            placeholder="Ex : 10.5000">
                                        @error('rate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        <small class="form-text text-muted">Combien d'unités de {{ $exchangeRate->quoteCurrencyRelation->code }} pour 1 {{ $baseCurrency }}</small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Date du taux</label>
                                        <input type="date"
                                            class="form-control @error('date') is-invalid @enderror"
                                            name="date"
                                            value="{{ old('date', $exchangeRate->date instanceof \Carbon\Carbon ? $exchangeRate->date->format('Y-m-d') : $exchangeRate->date) }}">
                                        @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
        {{-- /Edit Exchange Rate Modal --}}

        {{-- Delete Exchange Rate Modal --}}
        <div class="modal fade" id="delete_modal_{{ $exchangeRate->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                        </div>
                        <h6 class="mb-1">Supprimer la devise</h6>
                        <p class="mb-3">Êtes-vous sûr de vouloir supprimer {{ $exchangeRate->quoteCurrencyRelation->code }} ({{ $exchangeRate->quoteCurrencyRelation->name }}) ?</p>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">Annuler</a>
                            <form method="POST" action="{{ route('bo.settings.currencies.destroy', $exchangeRate) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Oui, Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Delete Exchange Rate Modal --}}

    @endforeach

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Client-side search filtering
        const searchInput = document.getElementById('currency-search');
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const filter = this.value.toLowerCase();
                const rows = document.querySelectorAll('table tbody tr');
                rows.forEach(function(row) {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });
        }

        // Re-open modal on validation error
        @if($errors->any())
            @if(old('_modal') === 'add_currency_modal')
                var addModal = new bootstrap.Modal(document.getElementById('add_currency_modal'));
                addModal.show();
            @elseif(old('_modal') === 'edit_modal' && old('_exchange_rate_id'))
                var editModal = new bootstrap.Modal(document.getElementById('edit_modal_' + '{{ old("_exchange_rate_id") }}'));
                editModal.show();
            @endif
        @endif
    });
</script>
@endpush
