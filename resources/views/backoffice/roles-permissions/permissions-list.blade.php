<?php $page = 'roles-permissions'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Liste des Permissions')
@section('description', 'Consulter la liste des permissions')
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
                            {{ __('Rôles & Permissions') }}
                        </a>
                    </h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <span class="badge bg-info">{{ __('Lecture seule — Les permissions sont gérées par le Super Admin') }}</span>
                </div>
            </div>
            <!-- End Breadcrumb -->

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
                                                    <th>{{ __('Groupe') }}</th>
                                                    <th>{{ __('Module') }}</th>
                                                    <th>{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($modules as $moduleName => $actions)
                                                    @foreach ($actions as $actionName => $permission)
                                                        <tr>
                                                            <td><code>{{ $permission->name }}</code></td>
                                                            <td>{{ ucfirst($groupName) }}</td>
                                                            <td>{{ ucfirst(str_replace('_', ' ', $moduleName)) }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-secondary">{{ ucfirst($actionName) }}</span>
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
        <!-- End Conatiner -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>

    <!-- ========================
               End Page Content
              ========================= -->
@endsection
