<?php $page = 'roles-permissions'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', __('permissions.ui.roles_permissions_title'))
@section('description', __('permissions.ui.roles_permissions_description'))
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('permissions.ui.roles_permissions_title') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'roles'])
                    <div>
                        <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#add_modal">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('permissions.ui.new_role') }}
                        </a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-3">
                    <form method="GET" action="{{ route('bo.access.roles.index') }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="isax isax-search-normal fs-12"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 bg-white"
                                placeholder="{{ __('permissions.ui.search_placeholder') }}" name="search"
                                value="{{ request('search') }}">
                        </div>
                    </form>
                </div>
                <div class="col-md-9 d-flex justify-content-end">
                    @include('backoffice.components.column-toggle', [
                        'columns' => [__('permissions.ui.role'), __('permissions.ui.created_at')],
                    ])
                </div>
            </div>

            <div class="table-responsive table-nowrap">
                <table class="table border mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>{{ __('permissions.ui.role') }}</th>
                            <th>{{ __('permissions.ui.created_at') }}</th>
                            <th class="no-sort"></th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ ucfirst($role->name) }}</td>
                                <td>{{ $role->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('bo.access.roles.permissions', $role) }}"
                                        class="btn btn-outline-white d-inline-flex align-items-center">
                                        <i class="isax isax-shield-tick me-1"></i> {{ __('permissions.ui.permissions') }}
                                    </a>
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#edit_modal_{{ $role->id }}">
                                                <i class="isax isax-edit me-2"></i>{{ __('permissions.ui.edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $role->id }}">
                                                <i class="isax isax-trash me-2"></i>{{ __('permissions.ui.delete') }}
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    {{ __('permissions.ui.no_roles_found') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $roles])
        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('permissions.ui.new_role') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('bo.access.roles.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('permissions.ui.role_name') }}</label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="{{ __('permissions.ui.role_name_placeholder') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white"
                            data-bs-dismiss="modal">{{ __('permissions.ui.cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('permissions.ui.create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($roles as $role)
        <div class="modal fade" id="edit_modal_{{ $role->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('permissions.ui.edit_role') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('bo.access.roles.update', $role) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('permissions.ui.role_name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name }}"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-white"
                                data-bs-dismiss="modal">{{ __('permissions.ui.cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('permissions.ui.update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete_modal_{{ $role->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('permissions.ui.delete_role') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('permissions.ui.confirm_delete_role', ['role' => ucfirst($role->name)]) }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white"
                            data-bs-dismiss="modal">{{ __('permissions.ui.cancel') }}</button>
                        <form method="POST" action="{{ route('bo.access.roles.destroy', $role) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('permissions.ui.delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
