<?php $page = 'supplier-payment-methods'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Méthodes de paiement fournisseur') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div>
                        <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#add_method_modal"><i class="isax isax-add-circle5 me-1"></i>{{ __('Nouvelle méthode') }}</a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" class="form-control" id="method-search" placeholder="{{ __('Rechercher...') }}">
                                <a href="javascript:void(0);" class="btn-searchset"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Nom'), __('Type'), __('Statut')],
                        ])
                    </div>
                </div>
            </div>

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

            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($methods as $method)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a
                                                    href="javascript:void(0);">{{ $method->name }}</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @switch($method->provider)
                                        @case('manual')
                                            {{ __('Manuel') }}
                                        @break
                                        @case('stripe')
                                            Stripe
                                        @break
                                        @case('paypal')
                                            PayPal
                                        @break
                                        @default
                                            {{ __('Autre') }}
                                    @endswitch
                                </td>
                                <td>
                                    @if ($method->is_active)
                                        <span class="badge bg-success-transparent">{{ __('Actif') }}</span>
                                    @else
                                        <span class="badge bg-danger-transparent">{{ __('Inactif') }}</span>
                                    @endif
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#"
                                                class="dropdown-item d-flex align-items-center btn-edit-method"
                                                data-bs-toggle="modal" data-bs-target="#edit_method_modal"
                                                data-id="{{ $method->id }}" data-name="{{ $method->name }}"
                                                data-provider="{{ $method->provider }}"
                                                data-is-active="{{ $method->is_active ? '1' : '0' }}"
                                                data-update-url="{{ route('bo.purchases.supplier-payment-methods.update', $method) }}"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);"
                                                class="dropdown-item d-flex align-items-center btn-delete-method"
                                                data-bs-toggle="modal" data-bs-target="#delete_method_modal"
                                                data-id="{{ $method->id }}" data-name="{{ $method->name }}"
                                                data-destroy-url="{{ route('bo.purchases.supplier-payment-methods.destroy', $method) }}"><i
                                                    class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">{{ __('Aucune méthode de paiement trouvée.') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $methods])

        </div>

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    {{-- ============================================
        Add Method Modal
    ============================================= --}}
    <div id="add_method_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Ajouter une méthode de paiement') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="{{ route('bo.purchases.supplier-payment-methods.store') }}">
                    @csrf
                    <input type="hidden" name="_modal" value="add_method_modal">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Nom') }}<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" placeholder="{{ __('Ex : Virement bancaire') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Type') }}<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select @error('provider') is-invalid @enderror" name="provider">
                                        <option value="manual" {{ old('provider') == 'manual' ? 'selected' : '' }}>{{ __('Manuel') }}</option>
                                        <option value="stripe" {{ old('provider') == 'stripe' ? 'selected' : '' }}>{{ __('Stripe') }}/option>
                                        <option value="paypal" {{ old('provider') == 'paypal' ? 'selected' : '' }}>{{ __('PayPal') }}/option>
                                        <option value="other" {{ old('provider') == 'other' ? 'selected' : '' }}>{{ __('Autre') }}</option>
                                    </select>
                                    @error('provider')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="add_is_active" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="add_is_active">{{ __('Méthode active') }}</label>
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

    {{-- ============================================
        Edit Method Modal
    ============================================= --}}
    <div id="edit_method_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Modifier la méthode de paiement') }}</h4>
                    <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                        aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                </div>
                <form method="POST" action="" id="edit_method_form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_modal" value="edit_method_modal">
                    <input type="hidden" name="_method_id" id="edit_method_id" value="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Nom') }}<span class="text-danger ms-1">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="edit_method_name" value="{{ old('name') }}"
                                        placeholder="{{ __('Ex : Virement bancaire') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Type') }}<span class="text-danger ms-1">*</span></label>
                                    <select class="form-select @error('provider') is-invalid @enderror" name="provider" id="edit_method_provider">
                                        <option value="manual">{{ __('Manuel') }}</option>
                                        <option value="stripe">{{ __('Stripe') }}/option>
                                        <option value="paypal">{{ __('PayPal') }}/option>
                                        <option value="other">{{ __('Autre') }}</option>
                                    </select>
                                    @error('provider')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                        id="edit_is_active">
                                    <label class="form-check-label" for="edit_is_active">{{ __('Méthode active') }}</label>
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

    {{-- ============================================
        Delete Method Modal
    ============================================= --}}
    <div class="modal fade" id="delete_method_modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                    </div>
                    <h6 class="mb-1">{{ __('Supprimer la méthode de paiement') }}</h6>
                    <p class="mb-3">{{ __('Êtes-vous sûr de vouloir supprimer') }} <strong id="delete_method_name"></strong> ?</p>
                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0);" class="btn btn-outline-white me-3"
                            data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                        <form method="POST" action="" id="delete_method_form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">{{ __('Oui, Supprimer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Client-side search filtering
            var searchInput = document.getElementById('method-search');
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

            // Edit modal: populate fields from data attributes
            var editButtons = document.querySelectorAll('.btn-edit-method');
            editButtons.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var form = document.getElementById('edit_method_form');
                    var nameInput = document.getElementById('edit_method_name');
                    var idInput = document.getElementById('edit_method_id');
                    var providerSelect = document.getElementById('edit_method_provider');
                    var isActiveInput = document.getElementById('edit_is_active');

                    form.action = this.getAttribute('data-update-url');
                    idInput.value = this.getAttribute('data-id');
                    nameInput.value = this.getAttribute('data-name');
                    providerSelect.value = this.getAttribute('data-provider');
                    isActiveInput.checked = this.getAttribute('data-is-active') === '1';
                });
            });

            // Delete modal: populate name and action URL
            var deleteButtons = document.querySelectorAll('.btn-delete-method');
            deleteButtons.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var form = document.getElementById('delete_method_form');
                    var nameSpan = document.getElementById('delete_method_name');

                    form.action = this.getAttribute('data-destroy-url');
                    nameSpan.textContent = this.getAttribute('data-name');
                });
            });

            // Re-open modal on validation error
            @if ($errors->any())
                @if (old('_modal') === 'add_method_modal')
                    var addModal = new bootstrap.Modal(document.getElementById('add_method_modal'));
                    addModal.show();
                @elseif (old('_modal') === 'edit_method_modal' && old('_method_id'))
                    var editModal = new bootstrap.Modal(document.getElementById('edit_method_modal'));
                    document.getElementById('edit_method_id').value = '{{ old('_method_id') }}';
                    document.getElementById('edit_method_name').value = '{{ old('name') }}';
                    document.getElementById('edit_method_provider').value = '{{ old('provider') }}';
                    document.getElementById('edit_is_active').checked = {{ old('is_active') ? 'true' : 'false' }};
                    var baseUrl = '{{ url('purchases/supplier-payment-methods') }}' + '/' + '{{ old('_method_id') }}';
                    document.getElementById('edit_method_form').action = baseUrl;
                    editModal.show();
                @endif
            @endif
        });
    </script>
@endpush
