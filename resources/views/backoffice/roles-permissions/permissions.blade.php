<?php $page = 'roles-permissions'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', __('permissions.ui.permissions_page_title'))
@section('description', __('permissions.ui.permissions_page_description'))
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>
                        <a href="{{ route('bo.access.roles.index') }}">
                            <i class="isax isax-arrow-left me-1"></i>
                            {{ __('permissions.ui.roles') }}
                        </a>
                    </h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div class="dropdown me-2">
                        <a href="javascript:void(0);"
                            class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            {{ __('permissions.ui.role') }} :
                            <span class="fw-normal ms-1">{{ ucfirst($role->name) }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
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

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

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
                                        <span class="fs-18 fw-bold">{{ $groupLabels[$groupName] ?? $groupName }}</span>
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}"
                                    class="accordion-collapse collapse {{ $index === 1 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive table-nowrap">
                                            <table class="table border mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="w-50">{{ __('permissions.ui.module') }}</th>
                                                        @foreach ($actionColumns as $action)
                                                            <th>{{ $actionLabels[$action] ?? $action }}</th>
                                                        @endforeach
                                                        <th>{{ __('permissions.ui.allow_all') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($modules as $moduleName => $actions)
                                                        <tr>
                                                            <td>{{ $moduleLabels[$moduleName] ?? ucfirst(str_replace('_', ' ', $moduleName)) }}</td>
                                                            @foreach ($actionColumns as $action)
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
                                                                        {{ count(array_filter($actionColumns, fn($a) => isset($actions[$a]) && in_array($actions[$a]->id, $rolePermissionIds))) === count(array_filter($actionColumns, fn($a) => isset($actions[$a]))) ? 'checked' : '' }}>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="isax isax-tick-circle me-1"></i>{{ __('permissions.ui.save_permissions') }}
                    </button>
                </div>
            </form>
        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.allow-all-cb').forEach(function(cb) {
            cb.addEventListener('change', function() {
                const module = this.dataset.module;
                document.querySelectorAll('.permission-cb[data-module="' + module + '"]').forEach(function(
                    permissionCheckbox) {
                    permissionCheckbox.checked = cb.checked;
                });
            });
        });

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
