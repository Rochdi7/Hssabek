<?php $page = 'stock-movements'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouveau Mouvement')
@section('description', 'Enregistrer un nouveau mouvement de stock')
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
                            <h6><a href="{{ route('bo.inventory.movements.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Mouvements de stock') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Nouveau mouvement de stock') }}</h5>

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

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form action="{{ route('bo.inventory.movements.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">{{ __('Détails du mouvement') }}</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Produit') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('product_id') is-invalid @enderror" name="product_id">
                                                    <option value="">{{ __('Sélectionner un produit') }}</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                            {{ $product->name }} {{ $product->code ? '(' . $product->code . ')' : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                @if($products->isEmpty())
                                                    <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Aucun produit trouvé.') }} <a href="{{ route('bo.catalog.products.create') }}">{{ __('Créer un produit') }}</a> {{ __('avant de continuer.') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Entrepôt') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('warehouse_id') is-invalid @enderror" name="warehouse_id">
                                                    <option value="">{{ __('Sélectionner un entrepôt') }}</option>
                                                    @foreach($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}" {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }} {{ $warehouse->code ? '(' . $warehouse->code . ')' : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('warehouse_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                @if($warehouses->isEmpty())
                                                    <small class="text-muted d-block mt-1"><i class="isax isax-info-circle me-1"></i>{{ __('Aucun entrepôt trouvé.') }} <a href="{{ route('bo.inventory.warehouses.create') }}">{{ __('Créer un entrepôt') }}</a> {{ __('avant de continuer.') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Type de mouvement') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('movement_type') is-invalid @enderror" name="movement_type">
                                                    <option value="">{{ __('Sélectionner un type') }}</option>
                                                    <option value="stock_in" {{ old('movement_type') === 'stock_in' ? 'selected' : '' }}>{{ __('Entrée de stock') }}</option>
                                                    <option value="stock_out" {{ old('movement_type') === 'stock_out' ? 'selected' : '' }}>{{ __('Sortie de stock') }}</option>
                                                    <option value="adjustment_in" {{ old('movement_type') === 'adjustment_in' ? 'selected' : '' }}>{{ __('Ajustement positif (+)') }}</option>
                                                    <option value="adjustment_out" {{ old('movement_type') === 'adjustment_out' ? 'selected' : '' }}>{{ __('Ajustement négatif (-)') }}</option>
                                                </select>
                                                @error('movement_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Quantité') }} <span class="text-danger ms-1">*</span></label>
                                                <input type="number" step="0.001" min="0.001" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="0.000">
                                                @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Note') }}</label>
                                                <textarea class="form-control @error('note') is-invalid @enderror" name="note" rows="3" placeholder="{{ __('Raison du mouvement...') }}">{{ old('note') }}</textarea>
                                                @error('note')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.inventory.movements.index') }}" class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer le mouvement') }}</button>
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
