<?php $page = 'branches'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Succursales')
@section('description', 'Gérer les succursales de votre entreprise')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Succursales') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'branches'])
                    <div>
                        <a href="{{ route('bo.pro.branches.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouvelle succursale') }}
                        </a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button
                        type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ session('error') }}<button
                        type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
            @endif

            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.pro.branches.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher une succursale...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Nom'), __('Code'), __('E-mail'), __('Téléphone'), __('Par défaut'), __('Statut')],
                        ])
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md"><input class="form-check-input" type="checkbox"
                                        id="select-all"></div>
                            </th>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('E-mail') }}</th>
                            <th>{{ __('Téléphone') }}</th>
                            <th>{{ __('Par défaut') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md"><input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td><span class="fw-medium">{{ $branch->name }}</span></td>
                                <td>{{ $branch->code ?? '—' }}</td>
                                <td>{{ $branch->email ?? '—' }}</td>
                                <td>{{ $branch->phone ?? '—' }}</td>
                                <td>
                                    @if ($branch->is_default)
                                        <span class="badge badge-soft-primary d-inline-flex align-items-center">{{ __('Par défaut') }}</span>
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>
                                    @if ($branch->is_active)
                                        <span
                                            class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Active') }}</span>
                                    @else
                                        <span
                                            class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Inactive') }}</span>
                                    @endif
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown"><i
                                            class="isax isax-more"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('bo.pro.branches.edit', $branch) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('bo.pro.branches.destroy', $branch) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit" onclick="return confirm('{{ __('Supprimer cette succursale ?') }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $branches])
            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
