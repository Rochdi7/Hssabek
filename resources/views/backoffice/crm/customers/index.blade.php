<?php $page = 'customers'; ?>
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
                    <h6>{{ __('Clients') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'customers'])
                    <div>
                        <a href="{{ route('bo.crm.customers.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Nouveau client') }}</a>
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

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.crm.customers.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control"
                                    placeholder="{{ __('Rechercher un client...') }}" value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if (request('status'))
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                @endif
                                @if (request('type'))
                                    <input type="hidden" name="type" value="{{ request('type') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>{{ __('Statut') }} : <span
                                    class="fw-normal ms-1">{{ request('status') === 'active' ? __('Actif') : (request('status') === 'inactive' ? __('Inactif') : __('Tous')) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.crm.customers.index', array_merge(request()->except('status', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.crm.customers.index', array_merge(request()->except('page'), ['status' => 'active'])) }}"
                                        class="dropdown-item">{{ __('Actif') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.crm.customers.index', array_merge(request()->except('page'), ['status' => 'inactive'])) }}"
                                        class="dropdown-item">{{ __('Inactif') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>{{ __('Type') }} : <span
                                    class="fw-normal ms-1">{{ request('type') === 'individual' ? __('Particulier') : (request('type') === 'company' ? __('Entreprise') : __('Tous')) }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.crm.customers.index', array_merge(request()->except('type', 'page'))) }}"
                                        class="dropdown-item">{{ __('Tous') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.crm.customers.index', array_merge(request()->except('page'), ['type' => 'individual'])) }}"
                                        class="dropdown-item">{{ __('Particulier') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.crm.customers.index', array_merge(request()->except('page'), ['type' => 'company'])) }}"
                                        class="dropdown-item">{{ __('Entreprise') }}</a>
                                </li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Client'), __('Téléphone'), __('Type'), __('Factures'), __('Créé le'), __('Statut')],
                        ])
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
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Téléphone') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th class="no-sort">{{ __('Factures') }}</th>
                            <th>{{ __('Créé le') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('bo.crm.customers.show', $customer) }}"
                                            class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <span
                                                class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                {{ strtoupper(substr($customer->name, 0, 1)) }}
                                            </span>
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a
                                                    href="{{ route('bo.crm.customers.show', $customer) }}">{{ $customer->name }}</a>
                                            </h6>
                                            <span class="fs-12 text-muted">{{ $customer->email ?? '—' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $customer->phone ?? '—' }}</td>
                                <td>
                                    <span class="badge badge-soft-info d-inline-flex align-items-center">
                                        {{ $customer->type === 'company' ? __('Entreprise') : __('Particulier') }}
                                    </span>
                                </td>
                                <td>{{ $customer->invoices_count }}</td>
                                <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if ($customer->status === 'active')
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Actif') }} <i
                                                class="isax isax-tick-circle ms-1"></i></span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Inactif') }} <i
                                                class="isax isax-close-circle ms-1"></i></span>
                                    @endif
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.crm.customers.show', $customer) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>{{ __('Voir') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.crm.customers.edit', $customer) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>{{ __('Modifier') }}</a>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.crm.customers.destroy', $customer) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit"
                                                    onclick="return confirm('{{ __("Êtes-vous sûr de vouloir supprimer ce client ?") }}')">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}</button>
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

            @include('backoffice.components.table-footer', ['paginator' => $customers])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
          End Page Content
         ========================= -->
@endsection
