<?php $page = 'finance-categories'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Catégories Financières')
@section('description', 'Gérer les catégories de dépenses et revenus')
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
                    <h6>{{ __('Catégories financières') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', [
                        'exportType' => 'finance-categories',
                    ])
                    <div>
                        <a href="{{ route('bo.finance.categories.create') }}"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouvelle catégorie') }}
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

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.finance.categories.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher une catégorie...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if (request('type'))
                                    <input type="hidden" name="type" value="{{ request('type') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Nom'), __('Type'), __('Statut')],
                        ])
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Type :') }} <span class="fw-normal ms-1">
                                    @switch(request('type'))
                                        @case('expense')
                                            {{ __('Dépense') }}
                                        @break

                                        @case('income')
                                            {{ __('Revenu') }}
                                        @break

                                        @default
                                            {{ __('Tous') }}
                                    @endswitch
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.finance.categories.index', array_merge(request()->except('type', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.categories.index', array_merge(request()->except('page'), ['type' => 'expense'])) }}"
                                        class="dropdown-item">{{ __('Dépense') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.finance.categories.index', array_merge(request()->except('page'), ['type' => 'income'])) }}"
                                        class="dropdown-item">{{ __('Revenu') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List -->
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
                            <th>{{ __('Créée le') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <span
                                                class="avatar avatar-sm rounded-circle {{ $category->type === 'expense' ? 'bg-danger' : 'bg-success' }} text-white d-flex align-items-center justify-content-center">
                                                <i
                                                    class="isax {{ $category->type === 'expense' ? 'isax-arrow-up-3' : 'isax-arrow-down-2' }} fs-12"></i>
                                            </span>
                                        </span>
                                        <h6 class="fs-14 fw-medium mb-0">{{ $category->name }}</h6>
                                    </div>
                                </td>
                                <td>
                                    @if ($category->type === 'expense')
                                        <span
                                            class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Dépense') }}</span>
                                    @else
                                        <span
                                            class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Revenu') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->is_active)
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Active') }} <i
                                                class="isax isax-tick-circle ms-1"></i></span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Inactive') }}<i
                                                class="isax isax-close-circle ms-1"></i></span>
                                    @endif
                                </td>
                                <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.finance.categories.edit', $category) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.finance.categories.destroy', $category) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette catégorie ?') }}')">
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
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $categories])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
          End Page Content
         ========================= -->
@endsection
