<?php $page = 'tenants'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Locataires')
@section('description', 'Gérer les locataires de la plateforme')
@section('content')
    <!-- ========================
                    Start Page Content
                ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <h6>{{ __('Tenants') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'tenants'])
                    <div>
                        <a href="#" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#add_tenant">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau Tenant') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-soft-info">
                                        <i class="isax isax-buildings-25 text-info fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Total Tenants') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $totalTenants }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-success-subtle">
                                        <i class="isax isax-menu-board5 text-success fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Tenants Actifs') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $activeTenants }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-danger-subtle">
                                        <i class="isax isax-flash-slash5 text-danger fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Tenants Inactifs') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $inactiveTenants }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-primary-subtle">
                                        <i class="isax isax-people5 text-primary fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Total Utilisateurs') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $tenants->sum('users_count') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

            <!-- Table Search Start -->
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
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center fw-medium"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>{{ __('Trier par :') }} <span class="fw-normal ms-1">{{ __('Plus récent') }}</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">{{ __('Plus récent') }}</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">{{ __('Plus ancien') }}</a>
                                </li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Nom'), __('Slug'), __('Domaine'), __('Utilisateurs'), __('Créé le'), __('Statut')],
                        ])
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List Start -->
            @include('backoffice.tenants.partials._table')
            <!-- Table List End -->

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- Modals -->
    @include('backoffice.tenants.partials._modals')

    @if ($errors->any() && old('_modal') === 'add_tenant')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('add_tenant'));
                modal.show();
            });
        </script>
    @endif

    @if ($errors->any() && old('_modal') === 'edit_tenant')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modalId = 'edit_tenant_' + '{{ old('_tenant_id') }}';
                var el = document.getElementById(modalId);
                if (el) {
                    var modal = new bootstrap.Modal(el);
                    modal.show();
                }
            });
        </script>
    @endif

    <!-- ========================
                    End Page Content
                ========================= -->

    @push('scripts')
        <script>
            // Toggle trial_ends_at visibility based on has_free_trial checkbox
            document.querySelectorAll('.trial-toggle').forEach(function(toggle) {
                var wrapper = toggle.closest('.row').querySelector('.trial-date-wrapper');
                if (!wrapper) return;

                toggle.addEventListener('change', function() {
                    wrapper.style.display = this.checked ? '' : 'none';
                    if (!this.checked) {
                        var dateInput = wrapper.querySelector('input[name="trial_ends_at"]');
                        if (dateInput) dateInput.value = '';
                    }
                });
            });
        </script>
    @endpush
@endsection
