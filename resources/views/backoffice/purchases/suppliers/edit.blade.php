<?php $page = 'suppliers'; ?>
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
                            <h6><a href="{{ route('bo.purchases.suppliers.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Fournisseurs</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Modifier le fournisseur</h5>

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

                                <form action="{{ route('bo.purchases.suppliers.update', $supplier) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <h6 class="text-gray-9 fw-bold mb-2 d-flex">Informations générales</h6>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nom <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name', $supplier->name) }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">E-mail</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email', $supplier->email) }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Téléphone</label>
                                                <input type="text"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    value="{{ old('phone', $supplier->phone) }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Identifiant fiscal</label>
                                                <div class="input-group">
                                                    <input type="text" id="tax_id"
                                                        class="form-control @error('tax_id') is-invalid @enderror"
                                                        name="tax_id" value="{{ old('tax_id', $supplier->tax_id) }}">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        onclick="document.getElementById('tax_id').value = 'IF' + Math.floor(100000 + Math.random() * 900000)"
                                                        title="Générer automatiquement">
                                                        <i class="isax isax-refresh"></i>
                                                    </button>
                                                    @error('tax_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Devise</label>
                                                <input type="text" class="form-control"
                                                    value="{{ App\Services\Tenancy\TenantContext::get()?->default_currency ?? 'MAD' }}"
                                                    readonly disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Délai de paiement (jours)</label>
                                                <input type="number"
                                                    class="form-control @error('payment_terms_days') is-invalid @enderror"
                                                    name="payment_terms_days"
                                                    value="{{ old('payment_terms_days', $supplier->payment_terms_days) }}"
                                                    min="0" max="365">
                                                @error('payment_terms_days')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Statut <span
                                                        class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('status') is-invalid @enderror"
                                                    name="status">
                                                    <option value="active"
                                                        {{ old('status', $supplier->status) === 'active' ? 'selected' : '' }}>
                                                        Actif</option>
                                                    <option value="inactive"
                                                        {{ old('status', $supplier->status) === 'inactive' ? 'selected' : '' }}>
                                                        Inactif</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Notes</label>
                                                <input type="text"
                                                    class="form-control @error('notes') is-invalid @enderror" name="notes"
                                                    value="{{ old('notes', $supplier->notes) }}">
                                                @error('notes')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.purchases.suppliers.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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
