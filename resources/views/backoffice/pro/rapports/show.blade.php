<?php $page = 'pro'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Détails du Rapport')
@section('description', 'Consulter les détails du rapport')
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
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                            <h6><a href="{{ route('bo.pro.rapports.index') }}"><i class="isax isax-arrow-left me-2"></i>{{ __('Rapports') }}</a></h6>
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <a href="{{ route('bo.pro.rapports.export-pdf', $report) }}" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-document-download me-1"></i>{{ __('Exporter PDF') }}</a>
                                <a href="{{ route('bo.pro.rapports.export-word', $report) }}" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-document-text me-1"></i>{{ __('Exporter Word') }}</a>
                                <a href="{{ route('bo.pro.rapports.edit', $report) }}" class="btn btn-outline-white d-inline-flex align-items-center me-3"><i class="isax isax-edit me-1"></i>{{ __('Modifier') }}</a>
                                <form method="POST" action="{{ route('bo.pro.rapports.destroy', $report) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger d-inline-flex align-items-center"
                                        onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce rapport ?') }}')">
                                        <i class="isax isax-trash me-1"></i>{{ __('Supprimer') }}
                                    </button>
                                </form>
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <div class="bg-light p-4 rounded position-relative mb-3">
                                    <div class="position-absolute top-0 end-0 z-0">
                                        <img src="{{ URL::asset('build/img/bg/card-bg.png') }}" alt="img">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap mb-3 pb-2 position-relative z-1">
                                        <div class="mb-3">
                                            <h4 class="mb-1">{{ $report->title }}</h4>
                                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                <div class="me-4">
                                                    @if($report->status === 'published')
                                                        <span class="badge badge-soft-success">{{ __('Publié') }}</span>
                                                    @else
                                                        <span class="badge badge-soft-secondary">{{ __('Brouillon') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- start row -->
                                    <div class="row gy-3 position-relative z-1">
                                        <div class="col-lg-4">
                                            <div>
                                                <h6 class="mb-2 fs-16 fw-semibold">{{ __('Détails du rapport') }}</h6>
                                                <div>
                                                    @if($report->category)
                                                        <p class="mb-1">{{ __('Catégorie') }} : <span class="text-dark">{{ $report->category }}</span></p>
                                                    @endif
                                                    <p class="mb-1">{{ __('Créé par') }} : <span class="text-dark">{{ $report->creator->name ?? '—' }}</span></p>
                                                    <p class="mb-1">{{ __('Date de création') }} : <span class="text-dark">{{ $report->created_at->format('d/m/Y H:i') }}</span></p>
                                                    @if($report->updated_at->ne($report->created_at))
                                                        <p class="mb-1">{{ __('Dernière modification') }} : <span class="text-dark">{{ $report->updated_at->format('d/m/Y H:i') }}</span></p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>

                                <!-- Report Content -->
                                <div class="report-content p-3">
                                    {!! $report->content !!}
                                </div>

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
