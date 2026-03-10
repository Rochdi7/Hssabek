<?php $page = 'pro'; ?>
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
                    <h6>Rapports</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <div>
                        <a href="{{ route('bo.pro.rapports.create') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>Nouveau rapport
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

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.pro.rapports.index') }}" method="GET" class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control" placeholder="Rechercher un rapport..." value="{{ request('search') }}">
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
                                <i class="isax isax-filter me-1"></i>Statut : <span class="fw-normal ms-1">{{ request('status') === 'draft' ? 'Brouillon' : (request('status') === 'published' ? 'Publié' : 'Tous') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('bo.pro.rapports.index', array_merge(request()->except('status', 'page'))) }}" class="dropdown-item">Tous</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.pro.rapports.index', array_merge(request()->except('page'), ['status' => 'draft'])) }}" class="dropdown-item">Brouillon</a>
                                </li>
                                <li>
                                    <a href="{{ route('bo.pro.rapports.index', array_merge(request()->except('page'), ['status' => 'published'])) }}" class="dropdown-item">Publié</a>
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
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Statut</th>
                            <th>Créé par</th>
                            <th>Créé le</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <h6 class="fs-14 fw-medium mb-0">
                                        <a href="{{ route('bo.pro.rapports.show', $report) }}">{{ $report->title }}</a>
                                    </h6>
                                </td>
                                <td>{{ $report->category ?? '—' }}</td>
                                <td>
                                    @if($report->status === 'published')
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">Publié <i class="isax isax-tick-circle ms-1"></i></span>
                                    @else
                                        <span class="badge badge-soft-secondary d-inline-flex align-items-center">Brouillon</span>
                                    @endif
                                </td>
                                <td>{{ $report->creator->name ?? '—' }}</td>
                                <td>{{ $report->created_at->format('d/m/Y') }}</td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.pro.rapports.show', $report) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-eye me-2"></i>Voir</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.pro.rapports.edit', $report) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-edit me-2"></i>Modifier</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.pro.rapports.export-pdf', $report) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-document-download me-2"></i>Exporter PDF</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('bo.pro.rapports.export-word', $report) }}"
                                                class="dropdown-item d-flex align-items-center"><i
                                                    class="isax isax-document-text me-2"></i>Exporter Word</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('bo.pro.rapports.destroy', $report) }}">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger" type="submit"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?')">
                                                    <i class="isax isax-trash me-2"></i>Supprimer
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Aucun rapport trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $reports])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
      End Page Content
     ========================= -->
@endsection
