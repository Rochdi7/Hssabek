<?php $page = 'tenant-suspended'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                    Start Page Content
                ========================= -->

    <div class="container-fuild">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <!-- row start -->
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex flex-column justify-content-lg-center p-4 p-lg-0 pb-0 flex-fill text-center">
                            <div class=" mx-auto mb-4 text-center">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                            </div>

                            <div class="card border-0 p-lg-3 shadow-lg rounded-2">
                                <div class="card-body">
                                    <div class="mb-4 text-center">
                                        <i class="isax isax-lock-1 text-warning" style="font-size: 3rem;"></i>
                                    </div>

                                    <div class="text-center mb-4">
                                        <h3 class="mb-2">Compte
                                            {{ ucfirst($status) === 'Suspended' ? 'suspendu' : (ucfirst($status) === 'Cancelled' ? 'annulé' : 'restreint') }}
                                        </h3>
                                        <p class="mb-0 text-muted">
                                            @if ($status === 'suspended')
                                                Votre compte a été temporairement suspendu. Veuillez contacter notre équipe
                                                d'assistance
                                                pour plus d'informations.
                                            @elseif ($status === 'cancelled')
                                                Votre compte a été annulé. Si vous pensez qu'il s'agit d'une erreur,
                                                veuillez
                                                contacter notre équipe d'assistance.
                                            @else
                                                L'accès à votre compte est restreint. Veuillez contacter le support.
                                            @endif
                                        </p>
                                    </div>

                                    <div class="alert alert-warning" role="alert">
                                        <i class="isax isax-info-circle me-2"></i>
                                        <strong>Besoin d'aide?</strong> Contactez notre équipe d'assistance à
                                        support@facturation.local
                                    </div>

                                    <div class="text-center">
                                        <a href="{{ route('login') }}" class="btn bg-primary-gradient text-white">Retour à
                                            la connexion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end -->
        </div>
    </div>

    <!-- ========================
                    End Page Content
                ========================= -->
@endsection
