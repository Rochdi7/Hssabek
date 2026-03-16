<?php $page = 'roles-permissions'; ?>
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
                    <h6>
                        <a href="{{ route('sa.access.roles.index') }}">
                            <i class="isax isax-arrow-left me-1"></i>
                            {{ __('Rôles & Permissions') }}
                        </a>
                    </h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div>
                        <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
                            data-bs-target="#add_permission_modal">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouvelle permission') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

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

            <!-- Start Table List -->
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
                                                    <th class="w-50">{{ __('Permission') }}</th>
                                                    <th>{{ __('Module') }}</th>
                                                    <th>{{ __('Action') }}</th>
                                                    <th class="no-sort"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($modules as $moduleName => $actions)
                                                    @foreach ($actions as $actionName => $permission)
                                                        <tr>
                                                            <td><code>{{ $permission->name }}</code></td>
                                                            <td>{{ ucfirst(str_replace('_', ' ', $moduleName)) }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-secondary">{{ ucfirst($actionName) }}</span>
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
                                                                            data-bs-target="#edit_perm_modal_{{ $permission->id }}"><i
                                                                                class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:void(0);"
                                                                            class="dropdown-item d-flex align-items-center"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_perm_modal_{{ $permission->id }}"><i
                                                                                class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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

        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    <!-- ========================
               End Page Content
              ========================= -->

    <!-- Add Permission Modal -->
    <div class="modal fade" id="add_permission_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Nouvelle permission') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('sa.access.permissions.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nom de la permission') }}</label>
                            <input type="text" class="form-control" name="name" required
                                placeholder="{{ __('ex: sales.invoices.create') }}">
                            <small class="text-muted">{{ __('Format : groupe.module.action') }}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Créer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit & Delete Modals for each permission -->
    @foreach ($grouped as $groupName => $modules)
        @foreach ($modules as $moduleName => $actions)
            @foreach ($actions as $actionName => $permission)
                <!-- Edit Permission Modal -->
                <div class="modal fade" id="edit_perm_modal_{{ $permission->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Modifier la permission') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form method="POST" action="{{ route('sa.access.permissions.update', $permission) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Nom de la permission') }}</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $permission->name }}" required>
                                        <small class="text-muted">{{ __('Format : groupe.module.action') }}</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-white"
                                        data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Mettre à jour') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Permission Modal -->
                <div class="modal fade" id="delete_perm_modal_{{ $permission->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Supprimer la permission') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ __('Êtes-vous sûr de vouloir supprimer') }} <strong>{{ $permission->name }}</strong>?</p>
                                <p class="text-danger small">{{ __('Cela la supprimera de tous les rôles.') }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-white"
                                    data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                                <form method="POST" action="{{ route('sa.access.permissions.destroy', $permission) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @endforeach

@endsection
