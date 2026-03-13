<?php $page = 'trash'; ?>
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
                    <h6>{{ __('Corbeille') }}</h6>
                    <p class="text-muted mb-0">{{ $totalTrashed }} {{ __('élément(s) supprimé(s)') }}</p>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @if ($items->total() > 0)
                        <div>
                            <form method="POST" action="{{ route('bo.trash.empty', $selectedType) }}"
                                onsubmit="return confirm('{{ __('Êtes-vous sûr de vouloir vider définitivement la corbeille pour cette catégorie ? Cette action est irréversible.') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger d-flex align-items-center">
                                    <i class="isax isax-trash me-1"></i>{{ __('Vider la corbeille') }}
                                </button>
                            </form>
                        </div>
                    @endif
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

            <!-- Type Filter Tabs -->
            <div class="mb-3">
                <div class="d-flex align-items-center flex-wrap gap-2">
                    @foreach ($types as $typeKey => $typeConfig)
                        <a href="{{ route('bo.trash.index', ['type' => $typeKey]) }}"
                            class="btn {{ $selectedType === $typeKey ? 'btn-primary' : 'btn-outline-white' }} d-inline-flex align-items-center">
                            <i class="{{ $typeConfig['icon'] }} me-1"></i>{{ $typeConfig['label'] }}
                            @if (($counts[$typeKey] ?? 0) > 0)
                                <span class="badge bg-white text-dark ms-1">{{ $counts[$typeKey] }}</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
            <!-- End Type Filter Tabs -->

            <!-- Table Search Start -->
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.trash.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
                            <input type="hidden" name="type" value="{{ $selectedType }}">
                            <div class="search-input">
                                <input type="text" name="search" class="form-control" placeholder="{{ __('Rechercher...') }}"
                                    value="{{ request('search') }}">
                                <a href="javascript:void(0);" class="btn-searchset"
                                    onclick="this.closest('form').submit()"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Référence'), __('Détail'), __('Supprimé le')],
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
                            <th>{{ __('Référence') }}</th>
                            <th>{{ __('Détail') }}</th>
                            <th>{{ __('Supprimé le') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2 flex-shrink-0">
                                            <i class="{{ $config['icon'] }}"></i>
                                        </span>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $item->{$config['name_column']} }}</h6>
                                            <span class="fs-12 text-muted">{{ $config['label'] }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $config['detail']($item) }}</td>
                                <td>{{ $item->deleted_at?->format('d/m/Y H:i') }}</td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="isax isax-more"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.trash.restore', [$selectedType, $item->id]) }}">
                                                @csrf
                                                <button class="dropdown-item d-flex align-items-center" type="submit">
                                                    <i class="isax isax-refresh me-2"></i>{{ __('Restaurer') }}
                                                </button>
                                            </form>
                                        </li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('bo.trash.force-delete', [$selectedType, $item->id]) }}"
                                                onsubmit="return confirm('{{ __('Êtes-vous sûr ? Cette action est irréversible.') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item d-flex align-items-center text-danger"
                                                    type="submit">
                                                    <i class="isax isax-trash me-2"></i>{{ __('Supprimer définitivement') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%">
                                    <div class="text-center py-4">
                                        <i class="isax isax-trash fs-1 text-muted d-block mb-2"></i>
                                        <p class="text-muted mb-0">{{ __('La corbeille est vide pour cette catégorie.') }}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- End Table List -->

            @include('backoffice.components.table-footer', ['paginator' => $items])

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
          End Page Content
         ========================= -->
@endsection
