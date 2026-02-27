<?php $page = 'error-404'; ?>
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
                                        <h1 class="display-1 fw-bold text-danger">404</h1>
                                    </div>

                                    <div class="text-center mb-4">
                                        <h3 class="mb-2">Page Non Trouvée</h3>
                                        <p class="mb-0 text-muted">La page que vous recherchez n'existe pas ou a été
                                            supprimée.</p>
                                    </div>

                                    <div class="text-center">
                                        <a href="{{ route('login') }}"
                                            class="btn bg-primary-gradient text-white me-2">Retour à la Connexion</a>
                                        <a href="javascript:history.back()" class="btn btn-outline-primary">Retour</a>
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
