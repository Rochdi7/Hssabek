<?php $page = 'security-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">
            <!-- start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <!-- start row -->
                    <div class=" row settings-wrapper d-flex">
                        <!-- Start settings sidebar -->
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <!-- End settings sidebar -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Sécurité</h6>
                                </div>

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                {{-- 1. Mot de passe --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-lock-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Mot de passe</h5>
                                            <p class="fs-14">Définissez un mot de passe unique pour sécuriser le compte</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('bo.account.settings.edit') }}"><span
                                                class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                    class="isax isax-edit"></i></span></a>
                                    </div>
                                </div>

                                {{-- 2. Authentification à deux facteurs --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-security-safe text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Authentification à deux facteurs</h5>
                                            <p class="fs-14">Utilisez votre téléphone pour recevoir un code de sécurité.</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="badge badge-md badge-soft-danger">Désactivée</span>
                                        <label class="d-flex align-items-center form-switch ps-3">
                                            <input class="form-check-input m-0 me-2" type="checkbox" disabled>
                                        </label>
                                        <a href="javascript:void(0);"><span
                                                class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                    class="isax isax-setting-2"></i></span></a>
                                    </div>
                                </div>

                                {{-- 3. Authentification Google --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <img src="{{ URL::asset('build/img/icons/google-icon.svg') }}" class="w-75"
                                                alt="icon">
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Authentification Google</h5>
                                            <p class="fs-14">Se connecter à Google.</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="badge badge-outline-light text-dark border d-flex align-items-center"><i
                                                class="fa fa-circle text-danger fs-8 me-1"></i>Déconnecté</span>
                                        <label class="d-flex align-items-center form-switch ps-3">
                                            <input class="form-check-input m-0 me-2" type="checkbox" disabled>
                                        </label>
                                    </div>
                                </div>

                                {{-- 4. Vérification du numéro de téléphone --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-call text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Vérification du numéro de téléphone</h5>
                                            <p class="fs-14">Numéro de téléphone associé au compte</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        @if($user->phone)
                                            <span class="badge badge-md badge-soft-success me-3">Vérifié<i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @else
                                            <span class="badge badge-md badge-soft-warning me-3">Non vérifié</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- 5. Vérification de l'email --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-sms-tracking text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Vérification de l'email</h5>
                                            <p class="fs-14">Adresse e-mail associée au compte</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        @if($user->email_verified_at)
                                            <span class="badge badge-md badge-soft-success me-3">Vérifié<i
                                                    class="isax isax-tick-circle ms-1"></i></span>
                                        @else
                                            <span class="badge badge-md badge-soft-warning me-3">Non vérifié</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- 6. Navigateurs et appareils --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-device-message text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Navigateurs et appareils</h5>
                                            <p class="fs-14">Les navigateurs et appareils associés au compte</p>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);"><span
                                            class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                class="isax isax-eye"></i></span></a>
                                </div>

                                {{-- 7. Désactiver le compte --}}
                                <div
                                    class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 border-bottom mb-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-close-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Désactiver le compte</h5>
                                            <p class="fs-14">Votre compte sera réactivé lorsque vous vous reconnecterez.</p>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);"><span
                                            class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                class="isax isax-slash"></i></span></a>
                                </div>

                                {{-- 8. Supprimer le compte --}}
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg border bg-light me-2">
                                            <i class="isax isax-info-circle text-dark fs-24"></i>
                                        </span>
                                        <div>
                                            <h5 class="fs-16 fw-semibold mb-1">Supprimer le compte</h5>
                                            <p class="fs-14">Votre compte sera définitivement supprimé.</p>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);"><span
                                            class="badge badge-soft-light text-dark d-inline-flex align-items-center"><i
                                                class="isax isax-trash"></i></span></a>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
                End Page Content
            ========================= -->
@endsection
