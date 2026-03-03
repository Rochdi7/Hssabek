<?php $page = 'users'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
            Start Page Content
        ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Start Breadcrumb -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Modifier l'utilisateur</h6>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap gap-2">
                    <a href="{{ route('bo.users.index') }}" class="btn btn-outline-white d-flex align-items-center">
                        <i class="isax isax-arrow-left me-1"></i>Retour
                    </a>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <div class="row">
                <div class="col-xl-8 col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="fs-14 fw-semibold mb-0">Informations de l'utilisateur</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('bo.users.update', $user) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name', $user->name) }}">
                                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">E-mail</label>
                                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Téléphone</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone', $user->phone) }}">
                                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Statut</label>
                                            @if($user->status === 'active')
                                                <span class="badge badge-soft-success d-flex align-items-center" style="width:fit-content; padding: 6px 12px;">Actif
                                                    <i class="isax isax-tick-circle ms-1"></i>
                                                </span>
                                            @else
                                                <span class="badge badge-soft-danger d-flex align-items-center" style="width:fit-content; padding: 6px 12px;">Bloqué
                                                    <i class="isax isax-close-circle ms-1"></i>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Rôles</label>
                                            @foreach($roles as $role)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="roles[]"
                                                        value="{{ $role->id }}"
                                                        id="role_{{ $role->id }}"
                                                        {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="role_{{ $role->id }}">
                                                        {{ ucfirst($role->name) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @error('roles')<small class="text-danger">{{ $message }}</small>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Dernière connexion</label>
                                            <p class="mb-0">{{ $user->last_login_at?->format('d/m/Y à H:i') ?? '—' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <a href="{{ route('bo.users.index') }}" class="btn btn-outline-white">Annuler</a>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                End Page Content
            ========================= -->
@endsection
