<?php $page = 'users'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start container -->
        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>{{ __('Utilisateurs') }}</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    @include('backoffice.components.export-dropdown', ['exportType' => 'users'])
                    <div>
                        <a href="{{ route('bo.users.invite') }}" class="btn btn-primary d-flex align-items-center">
                            <i class="isax isax-add-circle5 me-1"></i>{{ __('Inviter un utilisateur') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <form action="{{ route('bo.users.index') }}" method="GET"
                            class="table-search d-flex align-items-center mb-0">
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
                        <div class="dropdown me-2">
                            <a href="javascript:void(0);"
                                class="dropdown-toggle btn btn-outline-white d-inline-flex align-items-center fw-medium"
                                data-bs-toggle="dropdown">
                                <i class="isax isax-sort me-1"></i>{{ __('Trier par :') }} <span class="fw-normal ms-1">{{ __('Plus récent') }}</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">{{ __('Plus récent') }}</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">{{ __('Plus ancien') }}</a>
                                </li>
                            </ul>
                        </div>
                        @include('backoffice.components.column-toggle', [
                            'columns' => [
                                __('Utilisateur'),
                                __('Téléphone'),
                                __('Rôle'),
                                __('Dernière connexion'),
                                __('Créé le'),
                                __('Statut'),
                            ],
                        ])
                    </div>
                </div>
            </div>

            {{-- Pending Invitations --}}
            @if ($pendingInvitations->count() > 0)
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h6 class="fs-14 fw-semibold mb-0">{{ __('Invitations en attente') }} ({{ $pendingInvitations->count() }})</h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>{{ __('E-mail') }}</th>
                                        <th>{{ __('Rôle') }}</th>
                                        <th>{{ __('Expire le') }}</th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingInvitations as $invitation)
                                        <tr>
                                            <td>{{ $invitation->email }}</td>
                                            <td>{{ $invitation->role?->name ?? '—' }}</td>
                                            <td>{{ $invitation->expires_at->format('d/m/Y à H:i') }}</td>
                                            <td class="action-item">
                                                <form method="POST"
                                                    action="{{ route('bo.users.invite.destroy', $invitation) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('{{ __('Annuler cette invitation ?') }}')">
                                                        <i class="isax isax-trash me-1"></i>{{ __('Annuler') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Users Table --}}
            <div class="table-responsive">
                <table class="table table-nowrap table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="no-sort">
                                <div class="form-check form-check-md">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th>{{ __('Utilisateur') }}</th>
                            <th>{{ __('Téléphone') }}</th>
                            <th>{{ __('Rôle') }}</th>
                            <th>{{ __('Dernière connexion') }}</th>
                            <th>{{ __('Créé le') }}</th>
                            <th class="no-sort">{{ __('Statut') }}</th>
                            <th class="no-sort"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);"
                                            class="avatar avatar-sm rounded-circle me-2 flex-shrink-0">
                                            <img src="{{ $user->avatar_url }}" class="rounded-circle"
                                                alt="{{ $user->name }}">
                                        </a>
                                        <div>
                                            <h6 class="fs-14 fw-medium mb-0"><a
                                                    href="{{ route('bo.users.edit', $user) }}">{{ $user->name }}</a>
                                            </h6>
                                            <span class="fs-12 text-muted">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->phone ?? '—' }}</td>
                                <td class="text-dark">{{ $user->roles->pluck('name')->implode(', ') ?: '—' }}</td>
                                <td class="text-dark">{{ $user->last_login_at?->diffForHumans() ?? '—' }}</td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if ($user->status === 'active')
                                        <span class="badge badge-soft-success d-inline-flex align-items-center">{{ __('Actif') }}
                                            <i class="isax isax-tick-circle ms-1"></i>
                                        </span>
                                    @else
                                        <span class="badge badge-soft-danger d-inline-flex align-items-center">{{ __('Bloqué') }}
                                            <i class="isax isax-close-circle ms-1"></i>
                                        </span>
                                    @endif
                                </td>
                                <td class="action-item">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('bo.users.edit', $user) }}"
                                                class="dropdown-item d-flex align-items-center">
                                                <i class="isax isax-edit me-2"></i>{{ __('Modifier') }}
                                            </a>
                                        </li>
                                        @if ($user->status === 'active' && $user->id !== auth()->id())
                                            <li>
                                                <form method="POST" action="{{ route('bo.users.deactivate', $user) }}">
                                                    @csrf
                                                    <button class="dropdown-item d-flex align-items-center text-warning"
                                                        type="submit">
                                                        <i class="isax isax-slash me-2"></i>{{ __('Désactiver') }}
                                                    </button>
                                                </form>
                                            </li>
                                        @elseif($user->status === 'blocked')
                                            <li>
                                                <form method="POST" action="{{ route('bo.users.activate', $user) }}">
                                                    @csrf
                                                    <button class="dropdown-item d-flex align-items-center text-success"
                                                        type="submit">
                                                        <i class="isax isax-tick-circle me-2"></i>{{ __('Activer') }}
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('backoffice.components.table-footer', ['paginator' => $users])

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                    End Page Content
                ========================= -->
@endsection
