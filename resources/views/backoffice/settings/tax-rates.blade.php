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
                                    <h6 class="mb-0">Taux de taxes</h6>
                                </div>

                                {{-- ========================================= --}}
                                {{-- SECTION 1 : Taux de taxes (Tax Categories) --}}
                                {{-- ========================================= --}}
                                <div class="d-flex align-items-center mb-3">
                                    <h6 class="fs-16 fw-semibold mb-0">Taux de taxes</h6>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <div class="input-icon-start position-relative">
                                                <span class="input-icon-addon">
                                                    <i class="isax isax-search-normal"></i>
                                                </span>
                                                <input type="text" class="form-control form-control-sm bg-white"
                                                    placeholder="Rechercher" id="searchTaxRate">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#add_tax_rates"
                                                class="btn btn-primary d-flex align-items-center"><i
                                                    class="isax isax-add-circle5 me-2"></i>Nouveau taux de taxe</a>
                                        </div>
                                    </div>
                                </div>

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                                    </div>
                                @endif

                                <div class="table-responsive table-nowrap pb-3 border-bottom">
                                    <table class="table border mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="no-sort">Nom</th>
                                                <th>Taux de taxe</th>
                                                <th>Date de creation</th>
                                                <th>Statut</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($taxCategories as $category)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">{{ $category->name }}</a>
                                                    </td>
                                                    <td>
                                                        @if($category->type === 'percentage')
                                                            {{ number_format($category->rate, 2) }}%
                                                        @else
                                                            {{ number_format($category->rate, 2) }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $category->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <form action="{{ route('bo.settings.tax-rates.category.toggle', $category) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <input class="form-check-input" type="checkbox" role="switch"
                                                                    {{ $category->is_active ? 'checked' : '' }}
                                                                    onchange="this.closest('form').submit()">
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_tax_rate_{{ $category->id }}"><i
                                                                        class="isax isax-edit me-2"></i>Modifier</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_tax_rate_{{ $category->id }}"><i
                                                                        class="isax isax-trash me-2"></i>Supprimer</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">Aucun taux de taxe trouve.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                {{-- ========================================= --}}
                                {{-- SECTION 2 : Groupes de taxes (Tax Groups) --}}
                                {{-- ========================================= --}}
                                <div class="d-flex align-items-center mb-3 mt-4">
                                    <h6 class="fs-16 fw-semibold mb-0">Groupes de taxes</h6>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <div class="input-icon-start position-relative">
                                                <span class="input-icon-addon">
                                                    <i class="isax isax-search-normal"></i>
                                                </span>
                                                <input type="text" class="form-control form-control-sm bg-white"
                                                    placeholder="Rechercher" id="searchTaxGroup">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#add_tax_group"
                                                class="btn btn-primary d-flex align-items-center"><i
                                                    class="isax isax-add-circle5 me-2"></i>Nouveau groupe de taxes</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-nowrap">
                                    <table class="table border mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="no-sort">Nom</th>
                                                <th>Taux de taxe</th>
                                                <th>Date de creation</th>
                                                <th>Statut</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($taxGroups as $group)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">{{ $group->name }}</a>
                                                    </td>
                                                    <td>{{ number_format($group->rates->sum('rate'), 2) }}%</td>
                                                    <td>{{ $group->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <form action="{{ route('bo.settings.tax-rates.group.toggle', $group) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <input class="form-check-input" type="checkbox" role="switch"
                                                                    {{ $group->is_active ? 'checked' : '' }}
                                                                    onchange="this.closest('form').submit()">
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                                            <i class="isax isax-more"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit_tax_group_{{ $group->id }}"><i
                                                                        class="isax isax-edit me-2"></i>Modifier</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);"
                                                                    class="dropdown-item d-flex align-items-center"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete_tax_group_{{ $group->id }}"><i
                                                                        class="isax isax-trash me-2"></i>Supprimer</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">Aucun groupe de taxes trouve.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

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
    {{-- MODALS : Tax Rates (Taux de taxes)                            --}}
    {{-- ============================================================= --}}

    <!-- Add Tax Rate Modal Start -->
    <div id="add_tax_rates" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un taux de taxe</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <form action="{{ route('bo.settings.tax-rates.category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nom de la taxe <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name', 'categoryStore') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name', 'categoryStore')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Taux de taxe <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('rate', 'categoryStore') is-invalid @enderror" name="rate" value="{{ old('rate') }}">
                            @error('rate', 'categoryStore')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Type <span class="text-danger">*</span></label>
                            <select class="form-select @error('type', 'categoryStore') is-invalid @enderror" name="type">
                                <option value="percentage" {{ old('type') === 'percentage' ? 'selected' : '' }}>Pourcentage</option>
                                <option value="fixed" {{ old('type') === 'fixed' ? 'selected' : '' }}>Fixe</option>
                            </select>
                            @error('type', 'categoryStore')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Tax Rate Modal End -->

    <!-- Edit Tax Rate Modals (one per category) -->
    @foreach($taxCategories as $category)
        <div id="edit_tax_rate_{{ $category->id }}" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier le taux de taxe</h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <form action="{{ route('bo.settings.tax-rates.category.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nom de la taxe <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Taux de taxe <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="rate" value="{{ old('rate', $category->rate) }}">
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Type <span class="text-danger">*</span></label>
                                <select class="form-select" name="type">
                                    <option value="percentage" {{ $category->type === 'percentage' ? 'selected' : '' }}>Pourcentage</option>
                                    <option value="fixed" {{ $category->type === 'fixed' ? 'selected' : '' }}>Fixe</option>
                                </select>
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
    @endforeach
    <!-- Edit Tax Rate Modals End -->

    <!-- Delete Tax Rate Modals (one per category) -->
    @foreach($taxCategories as $category)
        <div class="modal fade" id="delete_tax_rate_{{ $category->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                        </div>
                        <h6 class="mb-1">Supprimer le taux de taxe</h6>
                        <p class="mb-3">Etes-vous sur de vouloir supprimer ce taux de taxe ?</p>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">Annuler</a>
                            <form action="{{ route('bo.settings.tax-rates.category.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Oui, supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Delete Tax Rate Modals End -->

    {{-- ============================================================= --}}
    {{-- MODALS : Tax Groups (Groupes de taxes)                        --}}
    {{-- ============================================================= --}}

    <!-- Add Tax Group Modal Start -->
    <div id="add_tax_group" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter un groupe de taxes</h4>
                    <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <form action="{{ route('bo.settings.tax-rates.group.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nom du groupe <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name', 'groupStore') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name', 'groupStore')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Sous-taxes <span class="text-danger">*</span></label>
                            <div id="add-group-rates-container">
                                <div class="row mb-2 rate-row">
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="rates[0][name]" placeholder="Nom">
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="rates[0][rate]" placeholder="Taux (%)">
                                    </div>
                                    <div class="col-2 d-flex align-items-center">
                                        <a href="javascript:void(0);" class="text-danger remove-rate-row d-none"><i class="isax isax-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            @error('rates', 'groupStore')<div class="text-danger small">{{ $message }}</div>@enderror
                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary mt-2" id="add-group-add-rate">
                                <i class="isax isax-add-circle5 me-1"></i>Ajouter une sous-taxe
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Tax Group Modal End -->

    <!-- Edit Tax Group Modals (one per group) -->
    @foreach($taxGroups as $group)
        <div id="edit_tax_group_{{ $group->id }}" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier le groupe de taxes</h4>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <form action="{{ route('bo.settings.tax-rates.group.update', $group) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nom du groupe <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $group->name) }}">
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Sous-taxes <span class="text-danger">*</span></label>
                                <div id="edit-group-rates-container-{{ $group->id }}">
                                    @foreach($group->rates as $rateIndex => $rate)
                                        <div class="row mb-2 rate-row">
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="rates[{{ $rateIndex }}][name]" placeholder="Nom" value="{{ $rate->name }}">
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="rates[{{ $rateIndex }}][rate]" placeholder="Taux (%)" value="{{ $rate->rate }}">
                                            </div>
                                            <div class="col-2 d-flex align-items-center">
                                                <a href="javascript:void(0);" class="text-danger remove-rate-row {{ $loop->count <= 1 ? 'd-none' : '' }}"><i class="isax isax-trash"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if($group->rates->isEmpty())
                                        <div class="row mb-2 rate-row">
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="rates[0][name]" placeholder="Nom">
                                            </div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" name="rates[0][rate]" placeholder="Taux (%)">
                                            </div>
                                            <div class="col-2 d-flex align-items-center">
                                                <a href="javascript:void(0);" class="text-danger remove-rate-row d-none"><i class="isax isax-trash"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary mt-2 edit-group-add-rate" data-group-id="{{ $group->id }}">
                                    <i class="isax isax-add-circle5 me-1"></i>Ajouter une sous-taxe
                                </a>
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
    @endforeach
    <!-- Edit Tax Group Modals End -->

    <!-- Delete Tax Group Modals (one per group) -->
    @foreach($taxGroups as $group)
        <div class="modal fade" id="delete_tax_group_{{ $group->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="mb-3">
                            <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                        </div>
                        <h6 class="mb-1">Supprimer le groupe de taxes</h6>
                        <p class="mb-3">Etes-vous sur de vouloir supprimer ce groupe de taxes ?</p>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">Annuler</a>
                            <form action="{{ route('bo.settings.tax-rates.group.destroy', $group) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Oui, supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Delete Tax Group Modals End -->

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // ===========================
        // Add Tax Group — dynamic rate rows
        // ===========================
        var addGroupContainer = document.getElementById('add-group-rates-container');
        var addGroupBtn = document.getElementById('add-group-add-rate');
        if (addGroupBtn) {
            addGroupBtn.addEventListener('click', function () {
                var rows = addGroupContainer.querySelectorAll('.rate-row');
                var index = rows.length;
                var newRow = document.createElement('div');
                newRow.className = 'row mb-2 rate-row';
                newRow.innerHTML =
                    '<div class="col-5">' +
                        '<input type="text" class="form-control" name="rates[' + index + '][name]" placeholder="Nom">' +
                    '</div>' +
                    '<div class="col-5">' +
                        '<input type="text" class="form-control" name="rates[' + index + '][rate]" placeholder="Taux (%)">' +
                    '</div>' +
                    '<div class="col-2 d-flex align-items-center">' +
                        '<a href="javascript:void(0);" class="text-danger remove-rate-row"><i class="isax isax-trash"></i></a>' +
                    '</div>';
                addGroupContainer.appendChild(newRow);
                updateRemoveButtons(addGroupContainer);
            });
        }

        // ===========================
        // Edit Tax Group — dynamic rate rows
        // ===========================
        document.querySelectorAll('.edit-group-add-rate').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var groupId = this.getAttribute('data-group-id');
                var container = document.getElementById('edit-group-rates-container-' + groupId);
                var rows = container.querySelectorAll('.rate-row');
                var index = rows.length;
                var newRow = document.createElement('div');
                newRow.className = 'row mb-2 rate-row';
                newRow.innerHTML =
                    '<div class="col-5">' +
                        '<input type="text" class="form-control" name="rates[' + index + '][name]" placeholder="Nom">' +
                    '</div>' +
                    '<div class="col-5">' +
                        '<input type="text" class="form-control" name="rates[' + index + '][rate]" placeholder="Taux (%)">' +
                    '</div>' +
                    '<div class="col-2 d-flex align-items-center">' +
                        '<a href="javascript:void(0);" class="text-danger remove-rate-row"><i class="isax isax-trash"></i></a>' +
                    '</div>';
                container.appendChild(newRow);
                updateRemoveButtons(container);
            });
        });

        // ===========================
        // Remove rate row (delegated)
        // ===========================
        document.addEventListener('click', function (e) {
            var removeBtn = e.target.closest('.remove-rate-row');
            if (removeBtn) {
                var row = removeBtn.closest('.rate-row');
                var container = row.parentElement;
                row.remove();
                updateRemoveButtons(container);
            }
        });

        function updateRemoveButtons(container) {
            var rows = container.querySelectorAll('.rate-row');
            rows.forEach(function (row) {
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
    });
</script>
@endpush
