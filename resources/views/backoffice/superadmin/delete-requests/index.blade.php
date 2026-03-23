<?php $page = 'sa-delete-requests'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Demandes de Suppression')
@section('description', 'Gérer les demandes de suppression de compte')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Demandes de suppression de compte') }}</h6>
                    @if ($pendingCount > 0)
                        <span class="badge badge-soft-warning">{{ $pendingCount }} {{ __('en attente') }}</span>
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
                            'columns' => [__('Utilisateur'), __('Agence'), __('Raison'), __('Date de demande'), __('Statut')],
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
                            <th>{{ __('Utilisateur') }}</th>
                            <th>{{ __('Agence') }}</th>
                            <th>{{ __('Raison') }}</th>
                            <th>{{ __('Date de demande') }}</th>
                            <th>{{ __('Statut') }}</th>
                            <th class="no-sort">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $request)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="avatar avatar-sm bg-primary-transparent rounded-circle me-2 flex-shrink-0">
                                            {{ strtoupper(substr($request->requester->name ?? '?', 0, 2)) }}
                                        </span>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0">{{ $request->requester->name ?? '-' }}</h6>
                                            <p class="fs-12 text-muted mb-0">{{ $request->requester->email ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $request->tenant->name ?? '-' }}</span>
                                </td>
                                <td>
                                    @php
                                        $reasonLabels = [
                                            'no_longer_using' => __('N\'utilise plus le service'),
                                            'privacy' => __('Confidentialité'),
                                            'notifications' => __('Trop de notifications'),
                                            'poor_experience' => __('Mauvaise expérience'),
                                            'other' => __('Autre'),
                                        ];
                                    @endphp
                                    <span
                                        class="badge badge-soft-secondary">{{ $reasonLabels[$request->reason_type] ?? $request->reason_type }}</span>
                                    @if ($request->reason_details)
                                        <i class="isax isax-info-circle ms-1 text-muted" data-bs-toggle="tooltip"
                                            title="{{ $request->reason_details }}"></i>
                                    @endif
                                </td>
                                <td>{{ $request->created_at->translatedFormat('d M Y') }}</td>
                                <td>
                                    @switch($request->status)
                                        @case('pending')
                                            <span class="badge badge-soft-warning d-inline-flex align-items-center">{{ __('En attente') }}<i
                                                    class="isax isax-clock ms-1"></i></span>
                                        @break

                                        @case('confirmed')
                                            <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Confirmé') }}<i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @break

                                        @case('cancelled')
                                            <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Annulé') }}<i
                                                    class="isax isax-close-circle ms-1"></i></span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @if ($request->status === 'pending')
                                        <form method="POST" action="{{ route('sa.delete-requests.cancel', $request) }}"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-white d-inline-flex align-items-center me-1"
                                                onclick="return confirm('{{ __('Annuler cette demande de suppression ?') }}')">
                                                <i class="isax isax-close-circle me-1"></i> {{ __('Annuler') }}
                                            </button>
                                        </form>
                                        <a href="#" class="btn btn-outline-white d-inline-flex align-items-center"
                                            data-bs-toggle="modal" data-bs-target="#confirm_delete_{{ $request->id }}">
                                            <i class="isax isax-tick-circle me-1"></i> {{ __('Confirmer') }}
                                        </a>
                                    @else
                                        <span class="text-muted fs-13">
                                            @if ($request->handler)
                                                {{ __('Traité par') }} {{ $request->handler->name }}
                                            @endif
                                            @if ($request->handled_at)
                                                {{ __('le') }} {{ $request->handled_at->translatedFormat('d M Y') }}
                                            @endif
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        {{ __('Aucune demande de suppression trouvée.') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Table List End -->

                @include('backoffice.components.table-footer', ['paginator' => $requests])

            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>

        <!-- Confirm Delete Modals -->
        @foreach ($requests->where('status', 'pending') as $req)
            <div class="modal fade" id="confirm_delete_{{ $req->id }}">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <div class="mb-3">
                                <img src="{{ URL::asset('build/img/icons/delete.svg') }}" alt="img">
                            </div>
                            <h6 class="mb-1">{{ __('Confirmer la suppression') }}</h6>
                            <p class="mb-2">{{ __('Êtes-vous sûr de vouloir confirmer la suppression du compte de') }}
                                <strong>{{ $req->tenant->name ?? '-' }}</strong> ?
                            </p>
                            <p class="fs-12 text-danger mb-3">{{ __('Cette action désactivera le tenant.') }}</p>
                            <form method="POST" action="{{ route('sa.delete-requests.confirm', $req) }}">
                                @csrf
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
