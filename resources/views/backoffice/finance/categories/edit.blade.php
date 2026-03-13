<?php $page = 'finance-categories'; ?>
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
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.finance.categories.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Catégories financières') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Modifier la catégorie') }}</h5>

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form action="{{ route('bo.finance.categories.update', $financeCategory) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Nom') }} <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $financeCategory->name) }}">
                                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Type') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('type') is-invalid @enderror" name="type">
                                                    <option value="">{{ __('— Sélectionner —') }}</option>
                                                    <option value="expense" {{ old('type', $financeCategory->type) === 'expense' ? 'selected' : '' }}>{{ __('Dépense') }}</option>
                                                    <option value="income" {{ old('type', $financeCategory->type) === 'income' ? 'selected' : '' }}>{{ __('Revenu') }}</option>
                                                </select>
                                                @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Statut') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('is_active') is-invalid @enderror" name="is_active">
                                                    <option value="1" {{ old('is_active', $financeCategory->is_active ? '1' : '0') === '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                                    <option value="0" {{ old('is_active', $financeCategory->is_active ? '1' : '0') === '0' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                                </select>
                                                @error('is_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.finance.categories.index') }}" class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
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
