<?php $page = 'invoice-templates-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
           Start Page Content
          ========================= -->

    @php
        $documentTypeLabels = [
            'invoice' => 'Facture',
            'quote' => 'Devis',
            'delivery_challan' => 'Bon de livraison',
            'credit_note' => 'Avoir',
            'debit_note' => 'Note de débit',
            'purchase_order' => 'Bon de commande',
            'vendor_bill' => 'Facture fournisseur',
            'receipt' => 'Reçu',
        ];
    @endphp

    <div class="page-wrapper">
        <div class="content">

            <!-- start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="row settings-wrapper d-flex">

                        @component('backoffice.components.settings-sidebar')
                        @endcomponent

                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-0">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">Modèles de factures</h6>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                                    </div>
                                @endif

                                <ul class="nav nav-tabs nav-tabs-bottom border-bottom mb-3">
                                    @php $firstTab = true; @endphp
                                    @foreach ($templates as $docType => $groupTemplates)
                                        <li class="nav-item">
                                            <a id="{{ $docType }}-tab" data-bs-toggle="tab"
                                                data-bs-target="#{{ $docType }}_tab" type="button" role="tab"
                                                aria-controls="{{ $docType }}_tab"
                                                aria-selected="{{ $firstTab ? 'true' : 'false' }}"
                                                href="javascript:void(0);"
                                                class="nav-link {{ $firstTab ? 'active' : '' }}">{{ $documentTypeLabels[$docType] ?? ucfirst($docType) }}
                                            </a>
                                        </li>
                                        @php $firstTab = false; @endphp
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @php $firstPane = true; @endphp
                                    @foreach ($templates as $docType => $groupTemplates)
                                        <div class="tab-pane {{ $firstPane ? 'active' : '' }}" id="{{ $docType }}_tab"
                                            role="tabpanel" aria-labelledby="{{ $docType }}-tab" tabindex="0">
                                            <div class="row gx-3">
                                                @forelse ($groupTemplates as $template)
                                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                                        <div class="card invoice-template">
                                                            <div class="card-body p-2">
                                                                <div class="invoice-img">
                                                                    <a href="javascript:void(0);">
                                                                        @if ($template->preview_image)
                                                                            <img src="{{ URL::asset($template->preview_image) }}"
                                                                                alt="{{ $template->name }}" class="w-100">
                                                                        @else
                                                                            <img src="{{ URL::asset('build/img/invoice/general-invoice-01.svg') }}"
                                                                                alt="{{ $template->name }}" class="w-100">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-between align-items-center mt-2">
                                                                    <div>
                                                                        <a href="javascript:void(0);" class="fw-medium">{{ $template->name }}</a>
                                                                        @if ($template->description)
                                                                            <p class="fs-12 text-muted mb-0">{{ Str::limit($template->description, 50) }}</p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="d-flex align-items-center gap-1">
                                                                        @if ($template->is_featured)
                                                                            <span class="badge bg-warning-transparent" title="En vedette">
                                                                                <i class="isax isax-star fs-12"></i>
                                                                            </span>
                                                                        @endif
                                                                        @if ($template->is_free)
                                                                            <span class="badge bg-success-transparent">Gratuit</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    @if (in_array($template->id, $tenantTemplates))
                                                                        <form action="{{ route('bo.settings.invoice-templates.deactivate', $template) }}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                                                                <i class="isax isax-close-circle me-1"></i>Désactiver
                                                                            </button>
                                                                        </form>
                                                                    @else
                                                                        <form action="{{ route('bo.settings.invoice-templates.activate', $template) }}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-sm btn-primary w-100">
                                                                                <i class="isax isax-tick-circle me-1"></i>Activer
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="col-12">
                                                        <div class="text-center py-4">
                                                            <p class="text-muted mb-0">Aucun modèle disponible pour ce type de document.</p>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                        @php $firstPane = false; @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>

        @component('backoffice.components.footer')
        @endcomponent
    </div>

    <!-- ========================
           End Page Content
          ========================= -->
@endsection
