<?php $page = 'units'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- start container -->
        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Unités') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'units'])
                    <div>
                        <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#add_unit_modal"><i class="isax isax-add-circle5 me-1"></i>{{ __('Nouvelle unité') }}</a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <div class="row">
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="isax isax-search-normal fs-12"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0 bg-white" placeholder="{{ __('Rechercher') }}"
                            id="unit-search">
                    </div>
                </div> <!-- end col -->
                <div class="col-md-9 d-flex justify-content-end">
                    @include('backoffice.components.column-toggle', [
                        'columns' => [__('Nom'), __('Abréviation'), __('Nombre de produits')],
                    ])
                </div>
            </div> <!-- end row -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
                </div>
            @endif

            <div class="table-responsive border border-bottom-0 rounded">
                <table class="table table-nowrap m-0">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('Nom') }}</th>
                            <th class="no-sort">{{ __('Abréviation') }}</th>
                            <th class="no-sort">{{ __('Nombre de produits') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($units as $unit)
                            <tr>
                                <td>
                                    <h6 class="fs-14 fw-medium mb-0">{{ $unit->name }}</h6>
                                </td>
                                <td>{{ $unit->short_name }}</td>
                                <td>{{ $unit->products_count }}</td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="dropdown-item d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#edit_unit_modal"
                                                data-id="{{ $unit->id }}" data-name="{{ $unit->name }}"
                                                data-short-name="{{ $unit->short_name }}"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#delete_unit_modal"
                                                data-id="{{ $unit->id }}" data-name="{{ $unit->name }}"><i
                                                    class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">{{ __('Aucune unité trouvée.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table> <!-- end table -->
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $units])

        </div>
        <!-- end container -->

        <!-- Start Footer-->
        @component('backoffice.components.footer')
        @endcomponent
        <!-- End Footer-->

    </div>

    <!-- ========================
                End Page Content
            ========================= -->

    {{-- ============================================
        Add Unit Modal
    ============================================= --}}
    <div id="add_unit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Ajouter une unité') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('bo.catalog.units.store') }}">
                    @csrf
                    <input type="hidden" name="_modal" value="add_unit_modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Nom') }}<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" placeholder="{{ __('Ex : Kilogramme') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Abréviation') }}<span
                                            class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control @error('short_name') is-invalid @enderror"
                                        name="short_name" value="{{ old('short_name') }}" placeholder="{{ __('Ex : kg') }}">
                                    @error('short_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
    {{-- /Add Unit Modal --}}

    {{-- ============================================
        Edit Unit Modal
    ============================================= --}}
    <div id="edit_unit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Modifier l\'unité') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="" id="edit_unit_form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_modal" value="edit_unit_modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Nom') }}<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="edit_unit_name" value="{{ old('name') }}"
                                        placeholder="{{ __('Ex : Kilogramme') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Abréviation') }}<span
                                            class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control @error('short_name') is-invalid @enderror"
                                        name="short_name" id="edit_unit_short_name" value="{{ old('short_name') }}"
                                        placeholder="{{ __('Ex : kg') }}">
                                    @error('short_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
    {{-- /Edit Unit Modal --}}

    {{-- ============================================
        Delete Unit Modal
    ============================================= --}}
    <div class="modal fade" id="delete_unit_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">{{ __('Supprimer l\'unité') }}</h6>
                    <p class="mb-3" id="delete_unit_message">{{ __('Êtes-vous sûr de vouloir supprimer cette unité ?') }}</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3"
                            data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                        <form method="POST" action="" id="delete_unit_form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">{{ __('Oui, Supprimer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- /Delete Unit Modal --}}
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ===========================
            // Client-side search filtering
            // ===========================
            var searchInput = document.getElementById('unit-search');
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    var filter = this.value.toLowerCase();
                    var rows = document.querySelectorAll('table tbody tr');
                    rows.forEach(function(row) {
                        var text = row.textContent.toLowerCase();
                        row.style.display = text.includes(filter) ? '' : 'none';
                    });
                });
            }

            // ===========================
            // Edit modal — populate from data- attributes
            // ===========================
            var editModal = document.getElementById('edit_unit_modal');
            if (editModal) {
                editModal.addEventListener('show.bs.modal', function(event) {
                    var trigger = event.relatedTarget;
                    if (trigger) {
                        var id = trigger.getAttribute('data-id');
                        var name = trigger.getAttribute('data-name');
                        var shortName = trigger.getAttribute('data-short-name');

                        var baseUrl = "{{ route('bo.catalog.units.update', ':id') }}";
                        document.getElementById('edit_unit_form').action = baseUrl.replace(':id', id);
                        document.getElementById('edit_unit_name').value = name;
                        document.getElementById('edit_unit_short_name').value = shortName;
                    }
                });
            }

            // ===========================
            // Delete modal — populate from data- attributes
            // ===========================
            var deleteModal = document.getElementById('delete_unit_modal');
            if (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', function(event) {
                    var trigger = event.relatedTarget;
                    if (trigger) {
                        var id = trigger.getAttribute('data-id');
                        var name = trigger.getAttribute('data-name');

                        var baseUrl = "{{ route('bo.catalog.units.destroy', ':id') }}";
                        document.getElementById('delete_unit_form').action = baseUrl.replace(':id', id);
                        document.getElementById('delete_unit_message').textContent =
                            'Etes-vous s\u00fbr de vouloir supprimer l\'unit\u00e9 \u00ab ' + name +
                            ' \u00bb ?';
                    }
                });
            }

            // ===========================
            // Re-open modal on validation error
            // ===========================
            @if ($errors->any())
                @if (old('_modal') === 'add_unit_modal')
                    var addModalInstance = new bootstrap.Modal(document.getElementById('add_unit_modal'));
                    addModalInstance.show();
                @elseif (old('_modal') === 'edit_unit_modal')
                    var editModalInstance = new bootstrap.Modal(document.getElementById('edit_unit_modal'));
                    editModalInstance.show();
                @endif
            @endif
        });
    </script>
@endpush
