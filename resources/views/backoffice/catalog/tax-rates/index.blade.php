<?php $page = 'tax-rates'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                            Start Page Content
                        ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <!-- row start -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <!-- row start -->
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <!-- End settings sidebar -->
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">{{ __('Taux de taxes') }}</h6>
                                </div>

                                {{-- ========================================= --}}
                                {{-- SECTION 1 : Taux de taxes (Tax Categories) --}}
                                {{-- ========================================= --}}
                                <div class="d-flex align-items-center mb-3">
                                    <h6 class="fs-16 fw-semibold mb-0">{{ __('Taux de taxes') }}</h6>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <div class="input-icon-start position-relative">
                                                <span class="input-icon-addon">
                                                    <i class="isax isax-search-normal"></i>
                                                </span>
                                                <input type="text" class="form-control form-control-sm bg-white"
                                                    placeholder="{{ __('Rechercher') }}" id="searchTaxRate">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            @include('backoffice.components.column-toggle', [
                                                'columns' => [__('Nom'), __('Taux'), __('Type'), __('Créé le'), __('Statut')],
                                            ])
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#add_tax_category_modal"
                                                class="btn btn-primary d-flex align-items-center"><i
                                                    class="isax isax-add-circle5 me-2"></i>{{ __('Nouveau taux') }}</a>
                                        </div>
                                    </div>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="{{ __('Fermer') }}"></button>
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="{{ __('Fermer') }}"></button>
                                    </div>
                                @endif

                                <div class="table-responsive table-nowrap pb-3 border-bottom">
                                    <table class="table border mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="no-sort">{{ __('Nom') }}</th>
                                                <th>{{ __('Taux') }}</th>
                                                <th>{{ __('Type') }}</th>
                                                <th>{{ __('Créé le') }}</th>
                                                <th>{{ __('Statut') }}</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($taxCategories as $category)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            class="text-dark">{{ $category->name }}</a>
                                                    </td>
                                                    <td>
                                                        @if ($category->type === 'percentage')
                                                            {{ number_format($category->rate, 2) }}%
                                                        @else
                                                            {{ number_format($category->rate, 2) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($category->type === 'percentage')
                                                            <span class="badge bg-soft-primary">Pourcentage</span>
                                                        @else
                                                            <span class="badge bg-soft-info">{{ __('Fixe') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $category->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                {{ $category->is_active ? 'checked' : '' }} disabled>
                                                        </div>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center btn-edit-category"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_tax_category_modal"
                                                                    data-id="{{ $category->id }}"
                                                                    data-name="{{ $category->name }}"
                                                                    data-rate="{{ $category->rate }}"
                                                                    data-type="{{ $category->type }}"
                                                                    data-is-default="{{ $category->is_default ? '1' : '0' }}"
                                                                    data-is-active="{{ $category->is_active ? '1' : '0' }}"
                                                                    data-url="{{ route('bo.catalog.tax-categories.update', $category) }}"><i
                                                                        class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center btn-delete-category"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_tax_category_modal"
                                                                    data-id="{{ $category->id }}"
                                                                    data-name="{{ $category->name }}"
                                                                    data-url="{{ route('bo.catalog.tax-categories.destroy', $category) }}"><i
                                                                        class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">{{ __('Aucun taux de taxe trouvé.') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Pagination Tax Categories --}}
                                @include('backoffice.components.table-footer', [
                                    'paginator' => $taxCategories,
                                ])

                                {{-- ========================================= --}}
                                {{-- SECTION 2 : Groupes de taxes (Tax Groups) --}}
                                {{-- ========================================= --}}
                                <div class="d-flex align-items-center mb-3 mt-4">
                                    <h6 class="fs-16 fw-semibold mb-0">{{ __('Groupes de taxes') }}</h6>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <div class="input-icon-start position-relative">
                                                <span class="input-icon-addon">
                                                    <i class="isax isax-search-normal"></i>
                                                </span>
                                                <input type="text" class="form-control form-control-sm bg-white"
                                                    placeholder="{{ __('Rechercher') }}" id="searchTaxGroup">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#add_tax_group_modal"
                                                class="btn btn-primary d-flex align-items-center"><i
                                                    class="isax isax-add-circle5 me-2"></i>{{ __('Nouveau groupe') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-nowrap">
                                    <table class="table border mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="no-sort">{{ __('Nom') }}</th>
                                                <th>{{ __('Taux composants') }}</th>
                                                <th>{{ __('Statut') }}</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($taxGroups as $group)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            class="text-dark">{{ $group->name }}</a>
                                                    </td>
                                                    <td>
                                                        @forelse($group->rates->sortBy('position') as $rate)
                                                            <span class="badge bg-soft-secondary me-1">{{ $rate->name }}
                                                                ({{ number_format($rate->rate, 2) }}%)
                                                            </span>
                                                        @empty
                                                            <span class="text-muted">{{ __('Aucun') }}</span>
                                                        @endforelse
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" {{ $group->is_active ? 'checked' : '' }}
                                                                disabled>
                                                        </div>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center btn-edit-group"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_tax_group_modal"
                                                                    data-id="{{ $group->id }}"
                                                                    data-name="{{ $group->name }}"
                                                                    data-is-active="{{ $group->is_active ? '1' : '0' }}"
                                                                    data-rates="{{ $group->rates->sortBy('position')->map(function ($r) {return ['name' => $r->name, 'rate' => $r->rate, 'position' => $r->position];})->values()->toJson() }}"
                                                                    data-url="{{ route('bo.catalog.tax-groups.update', $group) }}"><i
                                                                        class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center btn-delete-group"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_tax_group_modal"
                                                                    data-id="{{ $group->id }}"
                                                                    data-name="{{ $group->name }}"
                                                                    data-url="{{ route('bo.catalog.tax-groups.destroy', $group) }}"><i
                                                                        class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">{{ __('Aucun groupe de taxes trouvé.') }}
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Pagination Tax Groups --}}
                                @include('backoffice.components.table-footer', ['paginator' => $taxGroups])

                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                </div>
            </div>
            <!-- row end -->
        </div>

        <!-- Start Footer-->
        @component('backoffice.components.footer')
        @endcomponent
        <!-- End Footer-->

    </div>

    <!-- ========================
                            End Page Content
                        ========================= -->

    {{-- ============================================================= --}}
    {{-- MODALS : Tax Categories (Taux de taxes)                       --}}
    {{-- ============================================================= --}}

    <!-- Add Tax Category Modal Start -->
    <div id="add_tax_category_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Ajouter un taux de taxe') }}</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form action="{{ route('bo.catalog.tax-categories.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_modal" value="add_tax_category_modal">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nom de la taxe <span class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control @error('name', 'categoryStore') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Ex : TVA">
                            @error('name', 'categoryStore')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Taux <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0"
                                class="form-control @error('rate', 'categoryStore') is-invalid @enderror" name="rate"
                                value="{{ old('rate') }}" placeholder="Ex : 20.00">
                            @error('rate', 'categoryStore')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Type') }}<span class="text-danger">*</span></label>
                            <select class="form-select @error('type', 'categoryStore') is-invalid @enderror"
                                name="type">
                                <option value="percentage" {{ old('type') === 'percentage' ? 'selected' : '' }}>
                                    Pourcentage</option>
                                <option value="fixed" {{ old('type') === 'fixed' ? 'selected' : '' }}>{{ __('Fixe') }}</option>
                            </select>
                            @error('type', 'categoryStore')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_default" value="1"
                                    id="add_cat_is_default" {{ old('is_default') ? 'checked' : '' }}>
                                <label class="form-check-label" for="add_cat_is_default">{{ __('Définir par défaut') }}</label>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="add_cat_is_active" {{ old('is_active', '1') ? 'checked' : '' }}>
                                <label class="form-check-label" for="add_cat_is_active">{{ __('Actif') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Tax Category Modal End -->

    <!-- Edit Tax Category Modal Start -->
    <div id="edit_tax_category_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Modifier le taux de taxe') }}</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form id="edit_tax_category_form" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nom de la taxe <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="edit_cat_name"
                                value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Taux <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0" class="form-control" name="rate"
                                id="edit_cat_rate" value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Type') }}<span class="text-danger">*</span></label>
                            <select class="form-select" name="type" id="edit_cat_type">
                                <option value="percentage">Pourcentage</option>
                                <option value="fixed">{{ __('Fixe') }}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_default" value="1"
                                    id="edit_cat_is_default">
                                <label class="form-check-label" for="edit_cat_is_default">{{ __('Définir par défaut') }}</label>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="edit_cat_is_active">
                                <label class="form-check-label" for="edit_cat_is_active">{{ __('Actif') }}</label>
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
    <!-- Edit Tax Category Modal End -->

    <!-- Delete Tax Category Modal Start -->
    <div class="modal fade" id="delete_tax_category_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">{{ __('Supprimer le taux de taxe') }}</h6>
                    <p class="mb-3">{{ __('Êtes-vous sûr de vouloir supprimer le taux') }} <strong id="delete_cat_name"></strong> ?
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3"
                            data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                        <form id="delete_tax_category_form" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">{{ __('Oui, supprimer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Tax Category Modal End -->

    {{-- ============================================================= --}}
    {{-- MODALS : Tax Groups (Groupes de taxes)                        --}}
    {{-- ============================================================= --}}

    <!-- Add Tax Group Modal Start -->
    <div id="add_tax_group_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Ajouter un groupe de taxes') }}</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form action="{{ route('bo.catalog.tax-groups.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_modal" value="add_tax_group_modal">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nom du groupe') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name', 'groupStore') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="{{ __('Ex : TVA composée') }}">
                            @error('name', 'groupStore')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="add_group_is_active" {{ old('is_active', '1') ? 'checked' : '' }}>
                                <label class="form-check-label" for="add_group_is_active">{{ __('Actif') }}</label>
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">{{ __('Sous-taxes') }} <span class="text-danger">*</span></label>
                            <div id="add-group-rates-container">
                                <div class="row mb-2 rate-row">
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="rates[0][name]"
                                            placeholder="{{ __('Nom') }}">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" step="0.01" min="0" class="form-control"
                                            name="rates[0][rate]" placeholder="{{ __('Taux (%)') }}">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" min="0" class="form-control"
                                            name="rates[0][position]" placeholder="{{ __('Position') }}" value="0">
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-danger remove-rate-row d-none"><i
                                                class="isax isax-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            @error('rates', 'groupStore')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary mt-2"
                                id="add-group-add-rate">
                                <i class="isax isax-add-circle5 me-1"></i>{{ __('Ajouter une sous-taxe') }}
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Tax Group Modal End -->

    <!-- Edit Tax Group Modal Start -->
    <div id="edit_tax_group_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Modifier le groupe de taxes') }}</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form id="edit_tax_group_form" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nom du groupe') }}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="edit_group_name"
                                value="">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="edit_group_is_active">
                                <label class="form-check-label" for="edit_group_is_active">{{ __('Actif') }}</label>
                            </div>
                        </div>
                        <div class="mb-0">
                            <label class="form-label">{{ __('Sous-taxes') }} <span class="text-danger">*</span></label>
                            <div id="edit-group-rates-container">
                                {{-- Populated dynamically via JavaScript --}}
                            </div>
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary mt-2"
                                id="edit-group-add-rate">
                                <i class="isax isax-add-circle5 me-1"></i>{{ __('Ajouter une sous-taxe') }}
                            </a>
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
    <!-- Edit Tax Group Modal End -->

    <!-- Delete Tax Group Modal Start -->
    <div class="modal fade" id="delete_tax_group_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">{{ __('Supprimer le groupe de taxes') }}</h6>
                    <p class="mb-3">{{ __('Êtes-vous sûr de vouloir supprimer le groupe') }} <strong
                            id="delete_group_name"></strong> ?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3"
                            data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                        <form id="delete_tax_group_form" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">{{ __('Oui, supprimer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Tax Group Modal End -->

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ===========================
            // Search filtering — Tax Rates
            // ===========================
            var searchTaxRate = document.getElementById('searchTaxRate');
            if (searchTaxRate) {
                searchTaxRate.addEventListener('keyup', function() {
                    var filter = this.value.toLowerCase();
                    var table = this.closest('.col-xl-9').querySelector('.table-responsive.pb-3 tbody');
                    if (table) {
                        var rows = table.querySelectorAll('tr');
                        rows.forEach(function(row) {
                            var text = row.textContent.toLowerCase();
                            row.style.display = text.includes(filter) ? '' : 'none';
                        });
                    }
                });
            }

            // ===========================
            // Search filtering — Tax Groups
            // ===========================
            var searchTaxGroup = document.getElementById('searchTaxGroup');
            if (searchTaxGroup) {
                searchTaxGroup.addEventListener('keyup', function() {
                    var filter = this.value.toLowerCase();
                    var tables = this.closest('.col-xl-9').querySelectorAll(
                        '.table-responsive.table-nowrap:not(.pb-3) tbody');
                    var table = tables[tables.length - 1];
                    if (table) {
                        var rows = table.querySelectorAll('tr');
                        rows.forEach(function(row) {
                            var text = row.textContent.toLowerCase();
                            row.style.display = text.includes(filter) ? '' : 'none';
                        });
                    }
                });
            }

            // ===========================
            // Edit Tax Category — populate modal via data- attributes
            // ===========================
            document.querySelectorAll('.btn-edit-category').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var form = document.getElementById('edit_tax_category_form');
                    form.action = this.getAttribute('data-url');
                    document.getElementById('edit_cat_name').value = this.getAttribute('data-name');
                    document.getElementById('edit_cat_rate').value = this.getAttribute('data-rate');
                    document.getElementById('edit_cat_type').value = this.getAttribute('data-type');
                    document.getElementById('edit_cat_is_default').checked = this.getAttribute(
                        'data-is-default') === '1';
                    document.getElementById('edit_cat_is_active').checked = this.getAttribute(
                        'data-is-active') === '1';
                });
            });

            // ===========================
            // Delete Tax Category — populate modal via data- attributes
            // ===========================
            document.querySelectorAll('.btn-delete-category').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var form = document.getElementById('delete_tax_category_form');
                    form.action = this.getAttribute('data-url');
                    document.getElementById('delete_cat_name').textContent = this.getAttribute(
                        'data-name');
                });
            });

            // ===========================
            // Edit Tax Group — populate modal via data- attributes
            // ===========================
            document.querySelectorAll('.btn-edit-group').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var form = document.getElementById('edit_tax_group_form');
                    form.action = this.getAttribute('data-url');
                    document.getElementById('edit_group_name').value = this.getAttribute(
                        'data-name');
                    document.getElementById('edit_group_is_active').checked = this.getAttribute(
                        'data-is-active') === '1';

                    // Populate rate rows
                    var container = document.getElementById('edit-group-rates-container');
                    container.innerHTML = '';
                    var rates = JSON.parse(this.getAttribute('data-rates') || '[]');

                    if (rates.length === 0) {
                        rates = [{
                            name: '',
                            rate: '',
                            position: 0
                        }];
                    }

                    rates.forEach(function(rate, index) {
                        var row = createRateRow(index, rate.name, rate.rate, rate.position,
                            rates.length <= 1);
                        container.appendChild(row);
                    });
                });
            });

            // ===========================
            // Delete Tax Group — populate modal via data- attributes
            // ===========================
            document.querySelectorAll('.btn-delete-group').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var form = document.getElementById('delete_tax_group_form');
                    form.action = this.getAttribute('data-url');
                    document.getElementById('delete_group_name').textContent = this.getAttribute(
                        'data-name');
                });
            });

            // ===========================
            // Add Tax Group — dynamic rate rows
            // ===========================
            var addGroupContainer = document.getElementById('add-group-rates-container');
            var addGroupBtn = document.getElementById('add-group-add-rate');
            if (addGroupBtn) {
                addGroupBtn.addEventListener('click', function() {
                    var rows = addGroupContainer.querySelectorAll('.rate-row');
                    var index = rows.length;
                    var newRow = createRateRow(index, '', '', index, false);
                    addGroupContainer.appendChild(newRow);
                    updateRemoveButtons(addGroupContainer);
                });
            }

            // ===========================
            // Edit Tax Group — dynamic rate rows
            // ===========================
            var editGroupBtn = document.getElementById('edit-group-add-rate');
            if (editGroupBtn) {
                editGroupBtn.addEventListener('click', function() {
                    var container = document.getElementById('edit-group-rates-container');
                    var rows = container.querySelectorAll('.rate-row');
                    var index = rows.length;
                    var newRow = createRateRow(index, '', '', index, false);
                    container.appendChild(newRow);
                    updateRemoveButtons(container);
                });
            }

            // ===========================
            // Remove rate row (delegated)
            // ===========================
            document.addEventListener('click', function(e) {
                var removeBtn = e.target.closest('.remove-rate-row');
                if (removeBtn) {
                    var row = removeBtn.closest('.rate-row');
                    var container = row.parentElement;
                    row.remove();
                    updateRemoveButtons(container);
                }
            });

            // ===========================
            // Helper: create a rate row element
            // ===========================
            function createRateRow(index, name, rate, position, hideRemove) {
                var row = document.createElement('div');
                row.className = 'row mb-2 rate-row';
                row.innerHTML =
                    '<div class="col-4">' +
                    '<input type="text" class="form-control" name="rates[' + index +
                    '][name]" placeholder="{{ __('Nom') }}" value="' + escapeHtml(name || '') + '">' +
                    '</div>' +
                    '<div class="col-3">' +
                    '<input type="number" step="0.01" min="0" class="form-control" name="rates[' + index +
                    '][rate]" placeholder="{{ __('Taux (%)') }}" value="' + escapeHtml(String(rate || '')) + '">' +
                    '</div>' +
                    '<div class="col-3">' +
                    '<input type="number" min="0" class="form-control" name="rates[' + index +
                    '][position]" placeholder="{{ __('Position') }}" value="' + escapeHtml(String(position || '0')) + '">' +
                    '</div>' +
                    '<div class="col-2 d-flex align-items-center">' +
                    '<a href="javascript:void(0);" class="text-danger remove-rate-row' + (hideRemove ? ' d-none' :
                        '') + '"><i class="isax isax-trash"></i></a>' +
                    '</div>';
                return row;
            }

            // ===========================
            // Helper: update remove buttons visibility
            // ===========================
            function updateRemoveButtons(container) {
                var rows = container.querySelectorAll('.rate-row');
                rows.forEach(function(row) {
                    var btn = row.querySelector('.remove-rate-row');
                    if (btn) {
                        if (rows.length <= 1) {
                            btn.classList.add('d-none');
                        } else {
                            btn.classList.remove('d-none');
                        }
                    }
                });
            }

            // ===========================
            // Helper: escape HTML for safe attribute injection
            // ===========================
            function escapeHtml(str) {
                var div = document.createElement('div');
                div.appendChild(document.createTextNode(str));
                return div.innerHTML;
            }

            // ===========================
            // Re-open modal on validation error
            // ===========================
            @if ($errors->categoryStore->any())
                var addCatModal = new bootstrap.Modal(document.getElementById('add_tax_category_modal'));
                addCatModal.show();
            @endif

            @if ($errors->groupStore->any())
                var addGroupModal = new bootstrap.Modal(document.getElementById('add_tax_group_modal'));
                addGroupModal.show();
            @endif
        });
    </script>
@endpush
