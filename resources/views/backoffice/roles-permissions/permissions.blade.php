<?php $page = 'roles-permissions'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Permissions')
@section('description', 'Configurer les permissions')
@section('content')
    <!-- ========================
               Start Page Content
              ========================= -->

    <div class="page-wrapper">
        <!-- Start Conatiner -->
        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>
                        <a href="{{ route('bo.access.roles.index') }}">
                            <i class="isax isax-arrow-left me-1"></i>
                            {{ __('Rôles') }}
                        </a>
                    </h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-2">
                        <a href="javascript:void(0);"
                            class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            {{ __('Rôle') }} : <span class="fw-normal ms-1">{{ ucfirst($role->name) }}</span>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end">
                            @foreach ($roles as $r)
                                <li>
                                    <a href="{{ route('bo.access.roles.permissions', $r) }}"
                                        class="dropdown-item {{ $r->id === $role->id ? 'active' : '' }}">
                                        {{ ucfirst($r->name) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Start Table List -->
            <form method="POST" action="{{ route('bo.access.roles.sync-permissions', $role) }}">
                @csrf
                <div class="">
                    <div class="accordion" id="accordionExample">
                        @php $index = 0; @endphp
                        @foreach ($grouped as $groupName => $modules)
                            @php $index++; @endphp
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button
                                        class="accordion-button {{ $index === 1 ? 'text-dark' : 'collapsed text-dark bg-light' }}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="{{ $index === 1 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $index }}">
                                        <span class="fs-18 fw-bold">{{ ucfirst($groupName) }}</span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}"
                                    class="accordion-collapse collapse {{ $index === 1 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!-- Table List -->
                                        <div class="table-responsive table-nowrap">
                                            <table class="table border mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="w-50">{{ __('Module') }}</th>
                                                        <th>{{ __('Créer') }}</th>
                                                        <th>{{ __('Modifier') }}</th>
                                                        <th>{{ __('Supprimer') }}</th>
                                                        <th>{{ __('Voir') }}</th>
                                                        <th>{{ __('Tout autoriser') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($modules as $moduleName => $actions)
                                                        <tr>
                                                            <td>{{ ucfirst(str_replace('_', ' ', $moduleName)) }}</td>
                                                            @foreach (['create', 'edit', 'delete', 'view'] as $action)
                                                                <td>
                                                                    @if (isset($actions[$action]))
                                                                        <div class="form-check">
                                                                            <input class="form-check-input permission-cb"
                                                                                type="checkbox" name="permissions[]"
                                                                                value="{{ $actions[$action]->id }}"
                                                                                data-module="{{ $groupName }}_{{ $moduleName }}"
                                                                                {{ in_array($actions[$action]->id, $rolePermissionIds) ? 'checked' : '' }}>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            @endforeach
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input allow-all-cb"
                                                                        type="checkbox"
                                                                        data-module="{{ $groupName }}_{{ $moduleName }}"
                                                                        {{ count(array_filter(['create', 'edit', 'delete', 'view'], fn($a) => isset($actions[$a]) && in_array($actions[$a]->id, $rolePermissionIds))) === count(array_filter(['create', 'edit', 'delete', 'view'], fn($a) => isset($actions[$a]))) ? 'checked' : '' }}>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /Table List -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Table List -->

                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="isax isax-tick-circle me-1"></i>{{ __('Enregistrer les permissions') }}
                    </button>
                </div>
            </form>

        </div>
        <!-- End Conatiner -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    <!-- ========================
               End Page Content
              ========================= -->
@endsection

@push('scripts')
    <script>
        // Allow All checkbox logic
        document.querySelectorAll('.allow-all-cb').forEach(function(cb) {
            cb.addEventListener('change', function() {
                const module = this.dataset.module;
                document.querySelectorAll('.permission-cb[data-module="' + module + '"]').forEach(function(
                    pCb) {
                    pCb.checked = cb.checked;
                });
            });
        });

        // Update Allow All when individual checkboxes change
        document.querySelectorAll('.permission-cb').forEach(function(cb) {
            cb.addEventListener('change', function() {
                const module = this.dataset.module;
                const all = document.querySelectorAll('.permission-cb[data-module="' + module + '"]');
                const checked = document.querySelectorAll('.permission-cb[data-module="' + module +
                    '"]:checked');
                const allowAll = document.querySelector('.allow-all-cb[data-module="' + module + '"]');
                if (allowAll) {
                    allowAll.checked = all.length === checked.length;
                }
            });
        });
    </script>
@endpush
