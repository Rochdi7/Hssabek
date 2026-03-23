<?php $page = 'payment-methods'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Méthodes de Paiement')
@section('description', 'Gérer les méthodes de paiement')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class=" row settings-wrapper d-flex">
                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">{{ __('Modes de paiement') }}</h6>
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

                                <div class="mb-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#add_payment_method"
                                                class="btn btn-primary d-flex align-items-center"><i
                                                    class="isax isax-add-circle5 me-2"></i>{{ __('Nouveau mode de paiement') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-nowrap">
                                    <table class="table border">
                                        <thead class="table-light">
                                            <tr>
                                                <th>{{ __('Nom') }}</th>
                                                <th>{{ __('Statut') }}</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($paymentMethods as $method)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="text-dark">{{ $method->name }}</a>
                                                    </td>
                                                    <td>
                                                        @if($method->is_active)
                                                            <span class="badge badge-soft-success">{{ __('Actif') }}</span>
                                                        @else
                                                            <span class="badge badge-soft-secondary">{{ __('Inactif') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown">{{ __('Actions') }}</button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#edit_payment_method_{{ $method->id }}">
                                                                        <i class="isax isax-edit me-2"></i>{{ __('Modifier') }}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form method="POST" action="{{ route('bo.settings.payment-methods.destroy', $method) }}">
                                                                        @csrf @method('DELETE')
                                                                        <button class="dropdown-item text-danger" type="submit">
                                                                            <i class="isax isax-trash me-2"></i>{{ __('Supprimer') }}
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted py-4">{{ __('Aucun mode de paiement configuré.') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @component('backoffice.components.footer')
            @endcomponent
        </div>
    </div>

    {{-- Modal : Ajouter un mode de paiement --}}
    <div class="modal fade" id="add_payment_method" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Nouveau mode de paiement') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('bo.settings.payment-methods.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">{{ __('Nom') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('Ex : Espèces, Virement bancaire...') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active_new" value="1" checked>
                            <label class="form-check-label" for="is_active_new">{{ __('Actif') }}</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modals : Modifier chaque mode de paiement --}}
    @foreach($paymentMethods as $method)
        <div class="modal fade" id="edit_payment_method_{{ $method->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Modifier le mode de paiement') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('bo.settings.payment-methods.update', $method) }}">
                        @csrf @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">{{ __('Nom') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $method->name }}" required>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active_{{ $method->id }}" value="1" {{ $method->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active_{{ $method->id }}">{{ __('Actif') }}</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Mettre à jour') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
