<?php $page = 'lock-screen'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                        Start Page Content
                    ========================= -->

    <!-- Start container -->
    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-4 mx-auto">
                    <form method="POST" action="{{ route('login') }}"
                        class="d-flex justify-content-center align-items-center">
                        @csrf
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill">
                            <div class=" mx-auto mb-5 text-center">
                                <img src="{{ URL::asset('assets/images/logo/logo-wide-cropped.svg') }}" class="img-fluid"
                                    alt="Logo">
                            </div>
                            <div class="card border-0 p-lg-3 shadow-lg rounded-2">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <h5 class="mb-2">Bienvenue!</h5>
                                    </div>
                                    <div class="text-center mb-3">
                                        <span class="avatar avatar-xl rounded-circle flex-shrink-0">
                                            <img src="{{ Auth::user()->avatar_url ?? URL::asset('build/img/users/user-01.jpg') }}"
                                                class="rounded-circle" alt="img">
                                        </span>
                                    </div>
                                    <div class="text-center mb-3">
                                        <p class="mb-0">{{ Auth::user()->email ?? 'user@example.com' }}</p>
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
                                        <label class="form-label">Mot de passe</label>
                                        <div class="pass-group input-group">
                                            <span class="input-group-text border-end-0">
                                                <i class="isax isax-lock"></i>
                                            </span>
                                            <span class="isax toggle-passwords isax-eye-slash"></span>
                                            <input type="password" name="password"
                                                class="pass-inputs form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                                                placeholder="****************" required>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-0">
                                        <button type="submit"
                                            class="btn bg-primary-gradient text-white w-100">Connexion</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End container -->

    <!-- ========================
                        End Page Content
                    ========================= -->
@endsection
