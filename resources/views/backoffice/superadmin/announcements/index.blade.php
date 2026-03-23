<?php $page = 'sa-announcements'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Annonces')
@section('description', 'Gérer les annonces de la plateforme')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Annonces') }}</h6>
                    <div class="d-flex gap-2 mt-1">
                        <span class="badge badge-soft-primary">{{ $totalAnnouncements }} {{ __('au total') }}</span>
                        <span class="badge badge-soft-success">{{ $activeAnnouncements }} {{ __('actives') }}</span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('sa.announcements.create') }}" class="btn btn-primary d-flex align-items-center">
                        <i class="isax isax-add me-1"></i> {{ __('Nouvelle annonce') }}
                    </a>
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
                        <div class="table-search d-flex align-items-center mb-0">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn-searchset"><i
                                        class="isax isax-search-normal fs-12"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        @include('backoffice.components.column-toggle', [
                            'columns' => [__('Titre'), __('Type'), __('Statut'), __('Publié le'), __('Expire le'), __('Auteur')],
                        ])
                        <div class="dropdown">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>{{ __('Trier par :') }} <span class="fw-normal ms-1">{{ __('Plus récent') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="javascript:void(0);" class="dropdown-item">{{ __('Plus récent') }}</a></li>
                                <li><a href="javascript:void(0);" class="dropdown-item">{{ __('Plus ancien') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Search End -->

            <!-- Table List Start -->
            <div class="table-responsive">
                <table class="table table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('Titre') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Statut') }}</th>
                            <th>{{ __('Publié le') }}</th>
                            <th>{{ __('Expire le') }}</th>
                            <th>{{ __('Auteur') }}</th>
                            <th class="no-sort">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $announcement)
                            <tr>
                                <td>
                                    <h6 class="fs-14 fw-medium mb-0">{{ Str::limit($announcement->title, 50) }}</h6>
                                </td>
                                <td>
                                    @switch($announcement->type)
                                        @case('info')
                                            <span class="badge badge-soft-info d-inline-flex align-items-center"><i
                                                    class="isax isax-info-circle me-1"></i> {{ __('Information') }}</span>
                                        @break

                                        @case('warning')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center"><i
                                                    class="isax isax-warning-2 me-1"></i> {{ __('Avertissement') }}</span>
                                        @break

                                        @case('success')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center"><i
                                                    class="isax isax-tick-circle me-1"></i> {{ __('Succès') }}</span>
                                        @break

                                        @case('danger')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center"><i
                                                    class="isax isax-danger me-1"></i> {{ __('Urgent') }}</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @if ($announcement->is_active)
                                        <span class="badge badge-soft-success">{{ __('Active') }}</span>
                                    @else
                                        <span class="badge badge-soft-secondary">{{ __('Inactive') }}</span>
                                    @endif
                                </td>
                                <td>{{ $announcement->published_at?->translatedFormat('d M Y H:i') ?? '-' }}</td>
                                <td>{{ $announcement->expires_at?->translatedFormat('d M Y H:i') ?? __('Jamais') }}</td>
                                <td>{{ $announcement->author->name ?? '-' }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="{{ route('sa.announcements.edit', $announcement) }}"
                                            class="btn btn-outline-white d-inline-flex align-items-center">
                                            <i class="isax isax-edit-2 me-1"></i> {{ __('Modifier') }}
                                        </a>
                                        <a href="#"
                                            class="btn btn-outline-white d-inline-flex align-items-center text-danger"
                                            data-bs-toggle="modal" data-bs-target="#delete_{{ $announcement->id }}">
                                            <i class="isax isax-trash me-1"></i> {{ __('Supprimer') }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        {{ __('Aucune annonce trouvée.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Table List End -->

                @include('backoffice.components.table-footer', ['paginator' => $announcements])

            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>

        <!-- Delete Modals -->
        @foreach ($announcements as $ann)
            <div class="modal fade" id="delete_{{ $ann->id }}">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <div class="mb-3">
                                <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                            </div>
                            <h6 class="mb-1">{{ __("Supprimer l'annonce") }}</h6>
                            <p class="mb-3">{{ __("Êtes-vous sûr de vouloir supprimer l'annonce") }} «
                                <strong>{{ $ann->title }}</strong> » ?
                            </p>
                            <form method="POST" action="{{ route('sa.announcements.destroy', $ann) }}">
                                @csrf
                                @method('DELETE')
                                <div class="d-flex justify-content-center">
                                    <a href="javascript:void(0);" class="btn btn-outline-white me-3"
                                        data-bs-dismiss="modal">{{ __('Annuler') }}</a>
                                    <button type="submit" class="btn btn-danger">{{ __('Oui, supprimer') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- ========================
                           End Page Content
                          ========================= -->
    @endsection
