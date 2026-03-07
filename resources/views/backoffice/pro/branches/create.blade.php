<?php $page = 'branches'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6><a href="{{ route('bo.pro.branches.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>Succursales</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Nouvelle succursale</h5>
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
                                <form action="{{ route('bo.pro.branches.store') }}" method="POST">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nom <span
                                                        class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Code</label>
                                                <input type="text"
                                                    class="form-control @error('code') is-invalid @enderror" name="code"
                                                    value="{{ old('code') }}" placeholder="Ex: SUC-01">
                                                @error('code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">E-mail</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}">
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
                                                    value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">N° identification fiscale</label>
                                                <div class="input-group">
                                                    <input type="text" id="tax_id"
                                                        class="form-control @error('tax_id') is-invalid @enderror"
                                                        name="tax_id" value="{{ old('tax_id') }}">
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
                                                <label class="form-label">Par défaut</label>
                                                <select class="form-select @error('is_default') is-invalid @enderror"
                                                    name="is_default">
                                                    <option value="0"
                                                        {{ old('is_default', '0') === '0' ? 'selected' : '' }}>Non</option>
                                                    <option value="1"
                                                        {{ old('is_default') === '1' ? 'selected' : '' }}>Oui</option>
                                                </select>
                                                @error('is_default')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Active</label>
                                                <select class="form-select @error('is_active') is-invalid @enderror"
                                                    name="is_active">
                                                    <option value="1"
                                                        {{ old('is_active', '1') === '1' ? 'selected' : '' }}>Oui</option>
                                                    <option value="0"
                                                        {{ old('is_active') === '0' ? 'selected' : '' }}>Non</option>
                                                </select>
                                                @error('is_active')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.pro.branches.index') }}"
                                            class="btn btn-outline-white">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>
@endsection
