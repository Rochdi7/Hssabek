<?php $page = 'warehouses'; ?>
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
                    <h6>Entrepôts</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'warehouses'])
                    <div>
                        <a href="{{ route('bo.inventory.warehouses.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouvel entrepôt
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.inventory.warehouses.index') }}" method="GET" class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control" placeholder="Rechercher un entrepôt..." value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset" onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                                @if(request('status'))
                                    <input type="hidden" name="status" value="{{ request('status') }}">
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-filter me-1"></i>Statut : <span class="fw-normal ms-1">{{ request('status') === 'active' ? 'Actif' : (request('status') === 'inactive' ? 'Inactif' : 'Tous') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.inventory.warehouses.index', array_merge(request()->except('status', 'page'))) }}" class="dropdown-item">Tous</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.inventory.warehouses.index', array_merge(request()->except('page'), ['status' => 'active'])) }}" class="dropdown-item">Actif</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.inventory.warehouses.index', array_merge(request()->except('page'), ['status' => 'inactive'])) }}" class="dropdown-item">Inactif</a>
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
                            <th>Nom</th>
                            <th>Code</th>
                            <th>Adresse</th>
                            <th class="no-sort">Par défaut</th>
                            <th>Créé le</th>
                            <th class="no-sort">Statut</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('bo.inventory.warehouses.show', $warehouse) }}"
                                            class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <span class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                                <i class="isax isax-building-4 fs-12"></i>
                                            </span>
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a href="{{ route('bo.inventory.warehouses.show', $warehouse) }}">{{ $warehouse->name }}</a></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $warehouse->code ?? '—' }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($warehouse->address, 40) ?? '—' }}</td>
                                <td>
                                    @if($warehouse->is_default)
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Oui</span>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>{{ $warehouse->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($warehouse->is_active)
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Actif <i
                                                class="isax isax-tick-circle ms-1"></i></span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">Inactif<i
                                                class="isax isax-close-circle ms-1"></i></span>
                                    @endif
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.inventory.warehouses.show', $warehouse) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.inventory.warehouses.edit', $warehouse) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('bo.inventory.warehouses.destroy', $warehouse) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger" type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet entrepôt ?')">
                                                    <i class="isax isax-trash me-2"></i>Supprimer
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

            @include('backoffice.components.table-footer', ['paginator' => $warehouses])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
      End Page Content
     ========================= -->
@endsection
