@extends('backoffice.layout.mainlayout')
@section('title', 'Accepter l'Invitation')
@section('description', 'Accepter l'invitation et créer votre compte')
@section('content')
    <!-- ========================
            Start Page Content
        ========================= -->

    <div class="page-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5 class="mb-1">{{ __('Bienvenue !') }}</h5>
                            <p class="text-muted mb-0">
                                {{ __('Vous avez été invité(e) à rejoindre') }} <strong>{{ $invitation->tenant->name ?? __('notre organisation') }}</strong>.
                                {{ __('Créez votre compte pour commencer.') }}
                            </p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('bo.invitation.accept.store', $invitation->token) }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Adresse e-mail') }}</label>
                                    <input type="email" class="form-control" value="{{ $invitation->email }}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Votre nom') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" placeholder="{{ __('Votre nom complet') }}" autofocus>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Mot de passe') }} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="{{ __('Minimum 8 caractères') }}">
                                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Confirmer le mot de passe') }} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control"
                                        name="password_confirmation" placeholder="{{ __('Confirmez votre mot de passe') }}">
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="isax isax-tick-circle me-1"></i>{{ __('Créer mon compte') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
                End Page Content
            ========================= -->
@endsection
