<?php $page = 'plans'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                <div>
                    <h6>Détails du plan : {{ $plan->name }}</h6>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('sa.plans.edit', $plan) }}" class="btn btn-primary">
                        <i class="ti ti-pencil me-1"></i> {{ __('Modifier') }}
                    </a>
                    <a href="{{ route('sa.plans.index') }}" class="btn btn-outline-white">
                        <i class="ti ti-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Informations') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Nom :</strong> {{ $plan->name }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Code :</strong> {{ $plan->code }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Intervalle :</strong>
                            @switch($plan->interval)
                                @case('month') Mensuel @break
                                @case('year') Annuel @break
                                @case('lifetime') Vie @break
                                @default {{ $plan->interval }}
                            @endswitch
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Prix :</strong> {{ number_format($plan->price, 2) }} {{ $plan->currency ?? 'MAD' }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Jours d'essai :</strong> {{ $plan->trial_days ?? 0 }}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Statut :</strong>
                            @if($plan->is_active)
                                <span class="badge bg-success">Actif</span>
                            @else
                                <span class="badge bg-danger">Inactif</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Abonnés :</strong> {{ $plan->subscriptions_count ?? 0 }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
