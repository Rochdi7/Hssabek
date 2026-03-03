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
                    <h6>Inviter un utilisateur</h6>
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
                            <h6 class="fs-14 fw-semibold mb-0">Envoyer une invitation</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('bo.users.invite.store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Adresse e-mail <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" placeholder="utilisateur@exemple.com">
                                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Rôle <span class="text-danger">*</span></label>
                                            <select class="form-select @error('role_id') is-invalid @enderror" name="role_id">
                                                <option value="">-- Sélectionner un rôle --</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                                        {{ ucfirst($role->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>

                                <p class="text-muted fs-12 mb-3">
                                    Un e-mail sera envoyé à l'adresse indiquée avec un lien d'invitation valable 7 jours.
                                </p>

                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <a href="{{ route('bo.users.index') }}" class="btn btn-outline-white">Annuler</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="isax isax-sms me-1"></i>Envoyer l'invitation
                                    </button>
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
