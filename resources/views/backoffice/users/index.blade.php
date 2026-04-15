<?php $page = 'users'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Utilisateurs')
@section('description', 'Gérer les utilisateurs de votre espace')
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
                        <a href="javascript:void(0);" class="btn btn-primary d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#inviteUserModal">
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

    {{-- Invite User Modal --}}
    <div class="modal fade" id="inviteUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('Inviter un utilisateur') }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('bo.users.invite.store') }}" id="inviteUserForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Adresse e-mail') }} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="{{ __('utilisateur@exemple.com') }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Rôle') }} <span class="text-danger">*</span></label>
                            <select class="form-select @error('role_id') is-invalid @enderror" name="role_id">
                                <option value="">-- {{ __('Sélectionner un rôle') }} --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        {{-- Password Mode --}}
                        <div class="mb-3">
                            <label class="form-label">{{ __('Mode de mot de passe') }} <span class="text-danger">*</span></label>
                            @error('password_mode')<div class="text-danger fs-12 mb-2">{{ $message }}</div>@enderror
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="password_mode" id="pw_mode_auto"
                                        value="auto" {{ old('password_mode', 'auto') === 'auto' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pw_mode_auto">
                                        <i class="isax isax-sms me-1"></i>{{ __('Générer et envoyer par e-mail') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="password_mode" id="pw_mode_manual"
                                        value="manual" {{ old('password_mode') === 'manual' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pw_mode_manual">
                                        <i class="isax isax-lock me-1"></i>{{ __('Définir manuellement') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Manual Password Fields --}}
                        <div id="modal-manual-pw-fields" style="display: {{ old('password_mode') === 'manual' ? 'block' : 'none' }};">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Mot de passe') }} <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="{{ __('Minimum 8 caractères') }}">
                                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Confirmer') }} <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control"
                                            name="password_confirmation" placeholder="{{ __('Confirmez le mot de passe') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Info texts --}}
                        <div id="modal-auto-pw-info" style="display: {{ old('password_mode') === 'manual' ? 'none' : 'block' }};">
                            <p class="text-muted fs-12 mb-0">
                                <i class="isax isax-info-circle me-1"></i>{{ __("Un mot de passe sera généré automatiquement et envoyé par e-mail à l'utilisateur.") }}
                            </p>
                        </div>
                        <div id="modal-manual-pw-info" style="display: {{ old('password_mode') === 'manual' ? 'block' : 'none' }};">
                            <p class="text-muted fs-12 mb-0">
                                <i class="isax isax-info-circle me-1"></i>{{ __("Le compte sera créé directement. Vous devrez communiquer le mot de passe vous-même.") }}
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="isax isax-user-add me-1"></i>{{ __("Inviter") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var radioAuto = document.getElementById('pw_mode_auto');
        var radioManual = document.getElementById('pw_mode_manual');
        var manualFields = document.getElementById('modal-manual-pw-fields');
        var autoInfo = document.getElementById('modal-auto-pw-info');
        var manualInfo = document.getElementById('modal-manual-pw-info');

        function togglePwMode() {
            var isManual = radioManual.checked;
            manualFields.style.display = isManual ? 'block' : 'none';
            autoInfo.style.display = isManual ? 'none' : 'block';
            manualInfo.style.display = isManual ? 'block' : 'none';
        }

        radioAuto.addEventListener('change', togglePwMode);
        radioManual.addEventListener('change', togglePwMode);

        @if($errors->any())
            var modal = new bootstrap.Modal(document.getElementById('inviteUserModal'));
            modal.show();
        @endif
    });
</script>
@endpush
