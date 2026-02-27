<?php $page = 'register'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- Start Content -->
    <div class="container-fuild">

        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">

            <!-- start row -->
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-4 mx-auto">
                    <form method="POST" action="{{ route('register') }}"
                        class="d-flex justify-content-center align-items-center">
                        @csrf
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pt-lg-4 pb-0 flex-fill">
                            <div class="mx-auto mb-5 text-center">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                            </div>
                            <div class="card border-0 p-lg-3 shadow-lg rounded-2">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">S'inscrire</h5>
                                        <p class="mb-0">Veuillez entrer vos détails pour créer un compte</p>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="d-flex align-items-center">
                                                <i class="isax isax-close-circle me-2"></i>
                                                <div>
                                                    @foreach ($errors->all() as $error)
                                                        <div>{{ $error }}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label">Nom complet</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0">
                                                <i class="isax isax-profile"></i>
                                            </span>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror"
                                                placeholder="Nom" required>
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Adresse Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text border-end-0">
                                                <i class="isax isax-sms-notification"></i>
                                            </span>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                                                placeholder="Entrez l'adresse email" required>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mot de passe</label>
                                        <div class="pass-group input-group">
                                            <span class="input-group-text border-end-0">
                                                <i class="isax isax-lock"></i>
                                            </span>
                                            <span class="isax toggle-password isax-eye-slash"></span>
                                            <input type="password" name="password"
                                                class="pass-input form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                                                placeholder="****************" required>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirmer le mot de passe</label>
                                        <div class="pass-group input-group">
                                            <span class="input-group-text border-end-0">
                                                <i class="isax isax-lock"></i>
                                            </span>
                                            <span class="isax toggle-passwords isax-eye-slash"></span>
                                            <input type="password" name="password_confirmation"
                                                class="pass-input form-control border-start-0 ps-0 @error('password_confirmation') is-invalid @enderror"
                                                placeholder="****************" required>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="form-check form-check-md mb-0">
                                                <input class="form-check-input" id="remember_me" name="terms"
                                                    type="checkbox" required>
                                                <label for="remember_me" class="form-check-label mt-0">J'accepte
                                                    les</label>
                                                <div class="d-inline-flex"><a href="#"
                                                        class="text-decoration-underline me-1">Conditions d'utilisation</a>
                                                    et <a href="#" class="text-decoration-underline ms-1"> la
                                                        Politique de
                                                        confidentialité</a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <button type="submit"
                                            class="btn bg-primary-gradient text-white w-100">S'inscrire</button>
                                    </div>

                                    <div class="login-or">
                                        <span class="span-or">Ou</span>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex align-items-center justify-content-center flex-wrap">
                                            <div class="text-center me-2 flex-fill">
                                                <a href="javascript:void(0);"
                                                    class="br-10 p-1 btn btn-light d-flex align-items-center justify-content-center">
                                                    <img class="img-fluid m-1"
                                                        src="{{ URL::asset('build/img/icons/facebook-logo.svg') }}"
                                                        alt="Facebook">
                                                </a>
                                            </div>
                                            <div class="text-center me-2 flex-fill">
                                                <a href="javascript:void(0);"
                                                    class="br-10 p-1 btn btn-light d-flex align-items-center justify-content-center">
                                                    <img class="img-fluid m-1"
                                                        src="{{ URL::asset('build/img/icons/google-logo.svg') }}"
                                                        alt="Google">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <h6 class="fw-normal fs-14 text-dark mb-0">Vous avez déjà un compte?
                                            <a href="{{ route('login') }}" class="hover-a"> Se connecter</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection
