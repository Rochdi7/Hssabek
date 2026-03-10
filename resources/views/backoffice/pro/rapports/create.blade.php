<?php $page = 'pro'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                    Start Page Content
                ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">

            <!-- start row -->
            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.pro.rapports.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Rapports</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Nouveau rapport</h5>

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form id="report-form" action="{{ route('bo.pro.rapports.store') }}" method="POST">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Titre <span class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    name="title"
                                                    value="{{ old('title') }}">
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Catégorie</label>
                                                <select class="form-select @error('category') is-invalid @enderror" name="category">
                                                    <option value="">-- Sélectionner --</option>
                                                    <option value="Général" {{ old('category') === 'Général' ? 'selected' : '' }}>Général</option>
                                                    <option value="Financier" {{ old('category') === 'Financier' ? 'selected' : '' }}>Financier</option>
                                                    <option value="Ventes" {{ old('category') === 'Ventes' ? 'selected' : '' }}>Ventes</option>
                                                    <option value="Achats" {{ old('category') === 'Achats' ? 'selected' : '' }}>Achats</option>
                                                    <option value="Inventaire" {{ old('category') === 'Inventaire' ? 'selected' : '' }}>Inventaire</option>
                                                    <option value="Autre" {{ old('category') === 'Autre' ? 'selected' : '' }}>Autre</option>
                                                </select>
                                                @error('category')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Statut <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('status') is-invalid @enderror" name="status">
                                                    <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Brouillon</option>
                                                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publié</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Contenu <span class="text-danger ms-1">*</span></label>
                                                <textarea id="summernote" name="content" class="form-control @error('content') is-invalid @enderror">{!! old('content') !!}</textarea>
                                                @error('content')
                                                    <div class="text-danger mt-1 fs-12">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.pro.rapports.index') }}" class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Créer le rapport</button>
                                    </div>
                                </form>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            @component('backoffice.components.footer')
            @endcomponent
        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
                    End Page Content
                ========================= -->
@endsection

@include('backoffice.pro.rapports._summernote-assets')
