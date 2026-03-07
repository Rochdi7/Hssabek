<?php $page = 'invoice-templates-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('content')
    <!-- ========================
                   Start Page Content
                  ========================= -->

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
                                    <h6 class="mb-0">Modèles de documents</h6>
                                    <p class="text-muted fs-13 mt-1">Choisissez un modèle par défaut pour chaque type de document. Le système utilisera automatiquement le modèle sélectionné lors de la génération des PDF.</p>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <!-- Main tabs: Mes modèles / Boutique -->
                                <ul class="nav nav-tabs nav-tabs-bottom border-bottom mb-3">
                                    <li class="nav-item">
                                        <a id="my-templates-tab" data-bs-toggle="tab" data-bs-target="#my_templates_tab"
                                            type="button" role="tab" aria-controls="my_templates_tab"
                                            aria-selected="true" href="javascript:void(0);" class="nav-link active">
                                            <i class="isax isax-document-text me-1"></i>Mes modèles
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="store-tab" data-bs-toggle="tab" data-bs-target="#store_tab" type="button"
                                            role="tab" aria-controls="store_tab" aria-selected="false" class="nav-link"
                                            href="javascript:void(0);">
                                            <i class="isax isax-shop me-1"></i>Boutique
                                            @if ($storeTemplatesGrouped->flatten()->count() > 0)
                                                <span
                                                    class="badge bg-primary-transparent text-primary fs-10 ms-1">{{ $storeTemplatesGrouped->flatten()->count() }}</span>
                                            @endif
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <!-- ═══════════════════════════════════════
                                                 Tab 1: Mes modèles (free + purchased)
                                                 ═══════════════════════════════════════ -->
                                    <div class="tab-pane active" id="my_templates_tab" role="tabpanel"
                                        aria-labelledby="my-templates-tab" tabindex="0">

                                        @php $hasMyTemplates = false; @endphp
                                        @foreach ($documentTypes as $docType => $docLabel)
                                            @if (isset($myTemplatesGrouped[$docType]) && $myTemplatesGrouped[$docType]->count() > 0)
                                                @php
                                                    $hasMyTemplates = true;
                                                    $activeStyle = $pdfTemplates[$docType] ?? 'default';
                                                @endphp
                                                <div class="mb-4">
                                                    <h6 class="text-muted fw-semibold mb-2">{{ $docLabel }}</h6>
                                                    <p class="text-muted fs-12 mb-3">
                                                        Modèle par défaut :
                                                        <span class="fw-semibold text-dark">
                                                            @php
                                                                $activeTemplateName = 'Standard';
                                                                foreach ($myTemplatesGrouped[$docType] as $t) {
                                                                    if (($templateStyleMap[$t->code] ?? '') === $activeStyle) {
                                                                        $activeTemplateName = $t->name;
                                                                        break;
                                                                    }
                                                                }
                                                            @endphp
                                                            {{ $activeTemplateName }}
                                                        </span>
                                                    </p>
                                                    <div class="row gx-3">
                                                        @foreach ($myTemplatesGrouped[$docType] as $tpl)
                                                            @php
                                                                $tplStyle = $templateStyleMap[$tpl->code] ?? 'default';
                                                                $isActive = ($tplStyle === $activeStyle);
                                                            @endphp
                                                            <div class="col-xl-3 col-md-6">
                                                                <div class="card invoice-template {{ $isActive ? 'border-primary' : '' }}">
                                                                    <div class="card-body p-2">
                                                                        <div class="invoice-img">
                                                                            <a href="javascript:void(0);">
                                                                                <img src="{{ asset($tpl->preview_image ?? 'build/img/invoice/general-invoice-01.svg') }}"
                                                                                    alt="{{ $tpl->name }}"
                                                                                    class="w-100">
                                                                            </a>
                                                                            <a href="#" class="invoice-view-icon"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#template_preview_{{ $tpl->id }}"><i
                                                                                    class="isax isax-eye"></i></a>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center">
                                                                            <div>
                                                                                <a href="javascript:void(0);"
                                                                                    class="fw-medium">{{ $tpl->name }}</a>
                                                                                @if ($tpl->is_free)
                                                                                    <span
                                                                                        class="badge bg-success-transparent text-success fs-10 ms-1">Gratuit</span>
                                                                                @else
                                                                                    <span
                                                                                        class="badge bg-info-transparent text-info fs-10 ms-1">Acheté</span>
                                                                                @endif
                                                                            </div>
                                                                            @if ($isActive)
                                                                                <a href="javascript:void(0);"
                                                                                    class="invoice-star d-flex align-items-center justify-content-center active"
                                                                                    title="Modèle par défaut pour les {{ $docLabel }}">
                                                                                    <i
                                                                                        class="isax isax-star-1 text-warning"></i>
                                                                                </a>
                                                                            @else
                                                                                <form method="POST"
                                                                                    action="{{ route('bo.settings.invoice-templates.activate', $tpl->code) }}"
                                                                                    class="d-inline">
                                                                                    @csrf
                                                                                    <button type="submit"
                                                                                        class="btn btn-sm p-0 border-0 bg-transparent invoice-star d-flex align-items-center justify-content-center"
                                                                                        title="Définir par défaut pour les {{ $docLabel }}">
                                                                                        <i class="isax isax-star"></i>
                                                                                    </button>
                                                                                </form>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        @if (!$hasMyTemplates)
                                            <div class="text-center py-5">
                                                <i class="isax isax-document-text fs-1 text-muted"></i>
                                                <p class="text-muted mt-2">Aucun modèle dans votre compte. Visitez la <a
                                                        href="javascript:void(0);"
                                                        onclick="document.getElementById('store-tab').click();">Boutique</a>
                                                    pour en acquérir.</p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- ═══════════════════════════════════════
                                                 Tab 2: Boutique (paid templates to buy)
                                                 ═══════════════════════════════════════ -->
                                    <div class="tab-pane" id="store_tab" role="tabpanel" aria-labelledby="store-tab"
                                        tabindex="0">

                                        @php $hasStoreTemplates = false; @endphp
                                        @foreach ($documentTypes as $docType => $docLabel)
                                            @if (isset($storeTemplatesGrouped[$docType]) && $storeTemplatesGrouped[$docType]->count() > 0)
                                                @php $hasStoreTemplates = true; @endphp
                                                <div class="mb-4">
                                                    <h6 class="text-muted fw-semibold mb-3">{{ $docLabel }}</h6>
                                                    <div class="row gx-3">
                                                        @foreach ($storeTemplatesGrouped[$docType] as $tpl)
                                                            <div class="col-xl-3 col-md-6">
                                                                <div class="card invoice-template">
                                                                    <div class="card-body p-2">
                                                                        <div class="invoice-img">
                                                                            <a href="javascript:void(0);">
                                                                                <img src="{{ asset($tpl->preview_image ?? 'build/img/invoice/general-invoice-01.svg') }}"
                                                                                    alt="{{ $tpl->name }}"
                                                                                    class="w-100">
                                                                            </a>
                                                                            <a href="#" class="invoice-view-icon"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#template_preview_store_{{ $tpl->id }}"><i
                                                                                    class="isax isax-eye"></i></a>
                                                                        </div>
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center">
                                                                            <div>
                                                                                <a href="javascript:void(0);"
                                                                                    class="fw-medium">{{ $tpl->name }}</a>
                                                                                <span
                                                                                    class="badge bg-warning-transparent text-warning fs-10 ms-1">{{ number_format($tpl->price, 2) }}
                                                                                    {{ $tpl->currency ?? 'MAD' }}</span>
                                                                            </div>
                                                                            <a href="javascript:void(0);"
                                                                                class="invoice-star d-flex align-items-center justify-content-center"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#purchase_confirm_{{ $tpl->id }}"
                                                                                title="Acheter ce modèle">
                                                                                <i
                                                                                    class="isax isax-shopping-cart text-primary"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                        @if (!$hasStoreTemplates)
                                            <div class="text-center py-5">
                                                <i class="isax isax-tick-circle fs-1 text-success"></i>
                                                <p class="text-muted mt-2">Vous possédez tous les modèles disponibles !</p>
                                            </div>
                                        @endif
                                    </div>
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
                   Preview Modals — My Templates
                  ========================= -->
    @foreach ($myTemplatesGrouped->flatten() as $tpl)
        @php
            $tplDocType = $tpl->document_type;
            $tplStyle = $templateStyleMap[$tpl->code] ?? 'default';
            $isActiveModal = ($tplStyle === ($pdfTemplates[$tplDocType] ?? 'default'));
            $docLabelModal = $documentTypes[$tplDocType] ?? $tplDocType;
        @endphp
        <div class="modal fade" id="template_preview_{{ $tpl->id }}" tabindex="-1"
            aria-labelledby="templatePreviewLabel_{{ $tpl->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="templatePreviewLabel_{{ $tpl->id }}">
                            Aperçu — {{ $tpl->name }} ({{ $docLabelModal }})
                            @if ($tpl->is_free)
                                <span class="badge bg-success-transparent text-success fs-10 ms-2">Gratuit</span>
                            @else
                                <span class="badge bg-info-transparent text-info fs-10 ms-2">Acheté</span>
                            @endif
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body p-0">
                        <iframe data-src="{{ route('bo.settings.invoice-templates.preview', $tpl->code) }}"
                            class="template-preview-iframe" style="width: 100%; height: 80vh; border: none;"
                            title="Aperçu {{ $tpl->name }}"></iframe>
                    </div>
                    <div class="modal-footer">
                        @if ($isActiveModal)
                            <span class="text-success fw-medium"><i class="isax isax-tick-circle me-1"></i>Modèle par défaut pour les {{ $docLabelModal }}</span>
                        @else
                            <form method="POST"
                                action="{{ route('bo.settings.invoice-templates.activate', $tpl->code) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-star me-1"></i>Définir par défaut pour les {{ $docLabelModal }}
                                </button>
                            </form>
                        @endif
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- ========================
                   Preview + Purchase Modals — Store Templates
                  ========================= -->
    @foreach ($storeTemplatesGrouped->flatten() as $tpl)
        {{-- Preview modal --}}
        <div class="modal fade" id="template_preview_store_{{ $tpl->id }}" tabindex="-1"
            aria-labelledby="templateStorePreviewLabel_{{ $tpl->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="templateStorePreviewLabel_{{ $tpl->id }}">
                            Aperçu — {{ $tpl->name }}
                            <span
                                class="badge bg-warning-transparent text-warning fs-10 ms-2">{{ number_format($tpl->price, 2) }}
                                {{ $tpl->currency ?? 'MAD' }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body p-0">
                        <iframe data-src="{{ route('bo.settings.invoice-templates.preview', $tpl->code) }}"
                            class="template-preview-iframe" style="width: 100%; height: 80vh; border: none;"
                            title="Aperçu {{ $tpl->name }}"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal"
                            data-bs-target="#purchase_confirm_{{ $tpl->id }}">
                            <i class="fa-brands fa-whatsapp me-1"></i>Acheter — {{ number_format($tpl->price, 2) }}
                            {{ $tpl->currency ?? 'MAD' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Purchase confirmation modal --}}
        <div class="modal fade" id="purchase_confirm_{{ $tpl->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmer l'achat</h5>
                        <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                            aria-label="Fermer"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <img src="{{ asset($tpl->preview_image ?? 'build/img/invoice/general-invoice-01.svg') }}"
                                alt="{{ $tpl->name }}" class="img-fluid" style="max-height: 200px;">
                        </div>
                        <h6 class="text-center">{{ $tpl->name }}</h6>
                        @if ($tpl->description)
                            <p class="text-muted text-center fs-13">{{ $tpl->description }}</p>
                        @endif
                        <div class="text-center">
                            <span class="fs-4 fw-bold text-primary">{{ number_format($tpl->price, 2) }}
                                {{ $tpl->currency ?? 'MAD' }}</span>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between gap-1">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Annuler</button>
                        <form method="POST" action="{{ route('bo.settings.invoice-templates.purchase', $tpl->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fa-brands fa-whatsapp me-1"></i>Commander via WhatsApp
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- ========================
                   End Page Content
                  ========================= -->
@endsection

@push('scripts')
    <script>
        // Lazy-load iframe src when modal opens
        document.querySelectorAll('.modal').forEach(function(modal) {
            modal.addEventListener('shown.bs.modal', function() {
                var iframe = modal.querySelector('.template-preview-iframe');
                if (iframe && !iframe.src && iframe.dataset.src) {
                    iframe.src = iframe.dataset.src;
                }
            });
            // Reset iframe when modal closes to free memory
            modal.addEventListener('hidden.bs.modal', function() {
                var iframe = modal.querySelector('.template-preview-iframe');
                if (iframe) {
                    iframe.removeAttribute('src');
                }
            });
        });
    </script>
@endpush
