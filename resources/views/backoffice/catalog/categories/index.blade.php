<?php $page = 'category'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Cat&eacute;gories</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'categories'])
                    <div>
                        <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#add_category_modal"><i class="isax isax-add-circle5 me-1"></i>Nouvelle cat&eacute;gorie</a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Table Search -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn-searchset"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table Search -->

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

            <!-- Table List -->
            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>Cat&eacute;gorie</th>
                            <th class="no-sort">Nombre de produits</th>
                            <th class="no-sort">Statut</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="javascript:void(0);">{{ $category->name }}</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $category->products_count }}</td>
                                <td>
                                    @if($category->is_active)
                                        <span class="badge bg-success-transparent">Actif</span>
                                    @else
                                        <span class="badge bg-danger-transparent">Inactif</span>
                                    @endif
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="dropdown-item d-flex align-items-center btn-edit-category"
                                                data-bs-toggle="modal" data-bs-target="#edit_category_modal"
                                                data-id="{{ $category->id }}"
                                                data-name="{{ $category->name }}"
                                                data-is-active="{{ $category->is_active ? '1' : '0' }}"
                                                data-update-url="{{ route('bo.catalog.categories.update', $category) }}"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center btn-delete-category"
                                                data-bs-toggle="modal" data-bs-target="#delete_category_modal"
                                                data-id="{{ $category->id }}"
                                                data-name="{{ $category->name }}"
                                                data-destroy-url="{{ route('bo.catalog.categories.destroy', $category) }}"><i
                                                    class="isax isax-trash me-2"></i>Supprimer</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /Table List -->

            <!-- Pagination -->
            @include('backoffice.components.table-footer', ['paginator' => $categories])

        </div>
        <!-- End Content -->


        @component('backoffice.components.footer')
        @endcomponent

    </div>


    <!-- ========================
                End Page Content
            ========================= -->

    {{-- ============================================
        Add Category Modal
    ============================================= --}}
    <div id="add_category_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une cat&eacute;gorie</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('bo.catalog.categories.store') }}">
                    @csrf
                    <input type="hidden" name="_modal" value="add_category_modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Nom de la cat&eacute;gorie<span class="text-danger ms-1">*</span></label>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Ex : &Eacute;lectronique">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="add_is_active" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="add_is_active">Cat&eacute;gorie active</label>
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
    {{-- /Add Category Modal --}}

    {{-- ============================================
        Edit Category Modal
    ============================================= --}}
    <div id="edit_category_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier la cat&eacute;gorie</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="" id="edit_category_form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_modal" value="edit_category_modal">
                    <input type="hidden" name="_category_id" id="edit_category_id" value="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Nom de la cat&eacute;gorie<span class="text-danger ms-1">*</span></label>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        id="edit_category_name"
                                        value="{{ old('name') }}"
                                        placeholder="Ex : &Eacute;lectronique">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="edit_is_active">
                                    <label class="form-check-label" for="edit_is_active">Cat&eacute;gorie active</label>
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
    {{-- /Edit Category Modal --}}

    {{-- ============================================
        Delete Category Modal
    ============================================= --}}
    <div class="modal fade" id="delete_category_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">Supprimer la cat&eacute;gorie</h6>
                    <p class="mb-3">&Ecirc;tes-vous s&ucirc;r de vouloir supprimer <strong id="delete_category_name"></strong> ?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3" data-bs-dismiss="modal">Annuler</a>
                        <form method="POST" action="" id="delete_category_form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Oui, Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /Delete Category Modal --}}

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // -----------------------------------------------
        // Client-side search filtering
        // -----------------------------------------------
        var searchInput = document.querySelector('.search-input input[type="text"], .table-search input[type="search"]');
        if (!searchInput) {
            // Create the search input inside the existing search-input div
            var searchDiv = document.querySelector('.search-input');
            if (searchDiv) {
                var input = document.createElement('input');
                input.type = 'text';
                input.className = 'form-control form-control-sm';
                input.placeholder = 'Rechercher...';
                input.id = 'category-search';
                searchDiv.appendChild(input);
                searchInput = input;
            }
        }
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                var filter = this.value.toLowerCase();
                var rows = document.querySelectorAll('table.datatable tbody tr');
                rows.forEach(function(row) {
                    var text = row.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });
        }

        // -----------------------------------------------
        // Edit modal: populate fields from data attributes
        // -----------------------------------------------
        var editButtons = document.querySelectorAll('.btn-edit-category');
        editButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var form = document.getElementById('edit_category_form');
                var nameInput = document.getElementById('edit_category_name');
                var idInput = document.getElementById('edit_category_id');
                var isActiveInput = document.getElementById('edit_is_active');

                form.action = this.getAttribute('data-update-url');
                idInput.value = this.getAttribute('data-id');
                nameInput.value = this.getAttribute('data-name');
                isActiveInput.checked = this.getAttribute('data-is-active') === '1';
            });
        });

        // -----------------------------------------------
        // Delete modal: populate name and action URL
        // -----------------------------------------------
        var deleteButtons = document.querySelectorAll('.btn-delete-category');
        deleteButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var form = document.getElementById('delete_category_form');
                var nameSpan = document.getElementById('delete_category_name');

                form.action = this.getAttribute('data-destroy-url');
                nameSpan.textContent = this.getAttribute('data-name');
            });
        });

        // -----------------------------------------------
        // Re-open modal on validation error
        // -----------------------------------------------
        @if($errors->any())
            @if(old('_modal') === 'add_category_modal')
                var addModal = new bootstrap.Modal(document.getElementById('add_category_modal'));
                addModal.show();
            @elseif(old('_modal') === 'edit_category_modal' && old('_category_id'))
                var editModal = new bootstrap.Modal(document.getElementById('edit_category_modal'));
                // Re-populate the edit form with old values
                document.getElementById('edit_category_id').value = '{{ old("_category_id") }}';
                document.getElementById('edit_category_name').value = '{{ old("name") }}';
                document.getElementById('edit_is_active').checked = {{ old('is_active') ? 'true' : 'false' }};
                // Rebuild the action URL
                var baseUrl = '{{ url("catalog/categories") }}' + '/' + '{{ old("_category_id") }}';
                document.getElementById('edit_category_form').action = baseUrl;
                editModal.show();
            @endif
        @endif
    });
</script>
@endpush
