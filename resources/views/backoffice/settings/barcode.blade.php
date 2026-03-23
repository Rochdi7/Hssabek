<?php $page = 'barcode-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Code-barres')
@section('description', 'Configurer les paramètres de code-barres')
@section('content')
    <!-- ========================
                Start Page Content
            ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row-->
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
                                    <h6 class="mb-0">{{ __('Code-barres') }}</h6>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Fermer') }}"></button>
                                    </div>
                                @endif

                                <form action="{{ route('bo.settings.barcode.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="vh-100 border-bottom mb-3">

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <label class="form-label fw-medium mb-3">{{ __("Afficher la date d'emballage") }}</label>
                                            </div><!-- end col -->
                                            <div class="col-4 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        name="show_package_date" value="1"
                                                        {{ old('show_package_date', $settings->modules_settings['barcode']['show_package_date'] ?? true) ? 'checked' : '' }}>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium mb-3">{{ __('Libellé MRP') }}</label>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control @error('mrp_label') is-invalid @enderror"
                                                            name="mrp_label"
                                                            value="{{ old('mrp_label', $settings->modules_settings['barcode']['mrp_label'] ?? 'MRP') }}">
                                                        @error('mrp_label')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <label class="form-label fw-medium mb-3">{{ __('Afficher le nom du produit') }}</label>
                                            </div><!-- end col -->
                                            <div class="col-4 mb-3">
                                                <div class="form-check form-switch d-flex justify-content-end">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        name="show_product_name" value="1"
                                                        {{ old('show_product_name', $settings->modules_settings['barcode']['show_product_name'] ?? true) ? 'checked' : '' }}>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium mb-3">{{ __('Taille de police du nom du produit') }}</label>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control @error('product_name_font_size') is-invalid @enderror"
                                                            name="product_name_font_size"
                                                            value="{{ old('product_name_font_size', $settings->modules_settings['barcode']['product_name_font_size'] ?? '16') }}">
                                                        @error('product_name_font_size')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium mb-3">{{ __('Taille de police MRP') }}</label>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control @error('mrp_font_size') is-invalid @enderror"
                                                            name="mrp_font_size"
                                                            value="{{ old('mrp_font_size', $settings->modules_settings['barcode']['mrp_font_size'] ?? '16') }}">
                                                        @error('mrp_font_size')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <!-- start row -->
                                        <div class="row align-items-center">
                                            <div class="col-md-8 col-sm-12">
                                                <label class="form-label fw-medium mb-3">{{ __('Taille du code-barres') }}</label>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control @error('barcode_size') is-invalid @enderror"
                                                            name="barcode_size"
                                                            value="{{ old('barcode_size', $settings->modules_settings['barcode']['barcode_size'] ?? '10') }}">
                                                        @error('barcode_size')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <!-- end row -->

                                    </div>

                                    <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-0">
                                        <button type="button" class="btn btn-outline-white me-2" onclick="window.location.reload()">{{ __('Annuler') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                                    </div>

                                </form>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                </div><!-- end col -->
            </div>
            <!-- end row-->

        </div>
        <!-- End Content -->

        @component('backoffice.components.footer')
        @endcomponent

    </div>
    <!-- ========================
                End Page Content
            ========================= -->
@endsection
