<?php $page = 'sa-templates'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Modèles')
@section('description', 'Gérer les modèles de documents')
@section('content')
    <!-- ========================
           Start Page Content
          ========================= -->

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Breadcrumb Start -->
            <div class="d-flex d-block align-items-center justify-content-between flex-wrap gap-3 mb-4">
                <div>
                    <h6>{{ __('Gestion des modèles') }}</h6>
                    <p class="text-muted mb-0">{{ __('Assignez les modèles PDF aux agences') }}</p>
                </div>
            </div>
            <!-- Breadcrumb End -->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Stats Row Start -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-soft-info">
                                        <i class="isax isax-document-text text-info fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Total Modèles') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $totalTemplates }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-success-subtle">
                                        <i class="isax isax-tick-circle text-success fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Modèles Gratuits') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $freeTemplates }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-warning-subtle">
                                        <i class="isax isax-crown text-warning fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Modèles Payants') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $paidTemplates }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="d-flex align-items-center pb-0">
                                <div class="me-2">
                                    <span class="avatar avatar-lg bg-primary-subtle">
                                        <i class="isax isax-link-21 text-primary fs-28"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">{{ __('Assignations Actives') }}</p>
                                    <h6 class="fs-16 fw-semibold">{{ $totalAssignments }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stats Row End -->

            <!-- Templates by Document Type -->
            <ul class="nav nav-tabs nav-tabs-bottom border-bottom mb-3">
                @php $firstTab = true; @endphp
                @foreach($groupedTemplates as $docType => $templates)
                    <li class="nav-item">
                        <a id="{{ $docType }}-tab" data-bs-toggle="tab"
                            data-bs-target="#{{ $docType }}_tab" type="button" role="tab"
                            aria-controls="{{ $docType }}_tab"
                            aria-selected="{{ $firstTab ? 'true' : 'false' }}"
                            href="javascript:void(0);"
                            class="nav-link {{ $firstTab ? 'active' : '' }}">{{ $documentTypeLabels[$docType] ?? ucfirst($docType) }}
                            <span class="badge bg-primary-transparent ms-1">{{ $templates->count() }}</span>
                        </a>
                    </li>
                    @php $firstTab = false; @endphp
                @endforeach
            </ul>

            <div class="tab-content">
                @php $firstPane = true; @endphp
                @foreach($groupedTemplates as $docType => $templates)
                    <div class="tab-pane {{ $firstPane ? 'active' : '' }}" id="{{ $docType }}_tab"
                        role="tabpanel" aria-labelledby="{{ $docType }}-tab" tabindex="0">
                        <div class="row gx-3">
                            @foreach($templates as $template)
                            <div class="col-xl-3 col-md-6">
                                <div class="card invoice-template">
                                    <div class="card-body p-2">
                                        <div class="invoice-img">
                                            <a href="{{ route('sa.templates.show', $template->id) }}">
                                                <img src="{{ asset($template->preview_image ?? 'build/img/invoice/general-invoice-01.svg') }}"
                                                    alt="{{ $template->name }}" class="w-100">
                                            </a>
                                            <a href="{{ route('sa.templates.show', $template->id) }}" class="invoice-view-icon">
                                                <i class="isax isax-eye"></i>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <div>
                                                <a href="{{ route('sa.templates.show', $template->id) }}" class="fw-medium">{{ $template->name }}</a>
                                                @if($template->is_free)
                                                    <span class="badge bg-success-transparent text-success fs-10 ms-1">{{ __('Gratuit') }}</span>
                                                @else
                                                    <span class="badge bg-warning-transparent text-warning fs-10 ms-1">{{ number_format($template->price, 0) }} {{ $template->currency }}</span>
                                                @endif
                                            </div>
                                            <div class="d-flex align-items-center gap-1">
                                                @php $assignCount = $assignmentCounts[$template->id] ?? 0; @endphp
                                                <span class="badge bg-primary-transparent text-primary fs-10" title="{{ __('Agences assignées') }}">
                                                    <i class="isax isax-buildings-2 fs-10 me-1"></i>{{ $assignCount }}
                                                </span>
                                                @if(!$template->is_active)
                                                    <span class="badge bg-danger-transparent text-danger fs-10">{{ __('Inactif') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex gap-1">
                                            <a href="{{ route('sa.templates.show', $template->id) }}"
                                                class="btn btn-sm btn-primary flex-fill">
                                                <i class="isax isax-link-21 me-1"></i>{{ __('Gérer') }}
                                            </a>
                                            <form method="POST" action="{{ route('sa.templates.toggle', $template->id) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm {{ $template->is_active ? 'btn-outline-danger' : 'btn-outline-success' }}"
                                                    title="{{ $template->is_active ? __('Désactiver') : __('Activer') }}">
                                                    <i class="isax {{ $template->is_active ? 'isax-close-circle' : 'isax-tick-circle' }}"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @php $firstPane = false; @endphp
                @endforeach
            </div>

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
           End Page Content
          ========================= -->
@endsection
