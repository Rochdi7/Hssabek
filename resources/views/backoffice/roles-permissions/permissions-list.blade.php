<?php $page = 'roles-permissions'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', __('permissions.ui.permissions_catalog_title'))
@section('description', __('permissions.ui.permissions_catalog_description'))
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>
                        <a href="{{ route('bo.access.roles.index') }}">
                            <i class="isax isax-arrow-left me-1"></i>
                            {{ __('permissions.ui.roles_permissions_title') }}
                        </a>
                    </h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <span class="badge bg-info">{{ __('permissions.ui.read_only_super_admin') }}</span>
                </div>
            </div>

            <div class="">
                <div class="accordion" id="accordionExample">
                    @php $index = 0; @endphp
                    @foreach ($grouped as $groupName => $modules)
                        @php $index++; @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button
                                    class="accordion-button {{ $index === 1 ? 'text-dark' : 'collapsed text-dark bg-light' }}"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
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
                                                    <th class="w-50">{{ __('permissions.ui.permission') }}</th>
                                                    <th>{{ __('permissions.ui.group') }}</th>
                                                    <th>{{ __('permissions.ui.module') }}</th>
                                                    <th>{{ __('permissions.ui.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($modules as $moduleName => $actions)
                                                    @foreach ($actions as $actionName => $permission)
                                                        <tr>
                                                            <td><code>{{ $permission->name }}</code></td>
                                                            <td>{{ $groupLabels[$groupName] ?? $groupName }}</td>
                                                            <td>{{ $moduleLabels[$moduleName] ?? ucfirst(str_replace('_', ' ', $moduleName)) }}</td>
                                                            <td>
                                                                <span class="badge bg-secondary">
                                                                    {{ $actionLabels[$actionName] ?? $actionName }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>
@endsection
