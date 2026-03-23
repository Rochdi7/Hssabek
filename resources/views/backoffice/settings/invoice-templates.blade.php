<?php $page = 'invoice-templates-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Modèles de Facture')
@section('description', 'Gérer les modèles de documents')
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
                                    <h6 class="mb-0">{{ __('Modèles de documents') }}</h6>
                                    <p class="text-muted fs-13 mt-1">{{ __('Choisissez un modèle par défaut pour chaque type de document. Le système utilisera automatiquement le modèle sélectionné lors de la génération des PDF.') }}</p>
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
                                            <i class="isax isax-document-text me-1"></i>{{ __('Mes modèles') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="store-tab" data-bs-toggle="tab" data-bs-target="#store_tab" type="button"
                                            role="tab" aria-controls="store_tab" aria-selected="false" class="nav-link"
                                            href="javascript:void(0);">
                                            <i class="isax isax-shop me-1"></i>{{ __('Boutique') }}
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
                                                        {{ __('Modèle par défaut') }} :
                                                        <span class="fw-semibold text-dark">
                                                            @php
                                                                $activeTemplateName = 'Standard';
                                                                foreach ($myTemplatesGrouped[$docType] as $t) {
                                                                    if (
                                                                        ($templateStyleMap[$t->code] ?? '') ===
                                                                        $activeStyle
                                                                    ) {
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
                                                                $isActive = $tplStyle === $activeStyle;
                                                            @endphp
                                                            <div class="col-xl-3 col-md-6">
                                                                <div
                                                                    class="card invoice-template {{ $isActive ? 'border-primary' : '' }}">
                                                                    <div class="card-body p-2">
                                                                        <div class="invoice-img">
                                                                            <a href="javascript:void(0);">
                                                                                <img src="{{ asset($tpl->preview_image ?? 'assets/images/templates/invoice/model-1.png') }}"
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
                                                                                        class="badge bg-success-transparent text-success fs-10 ms-1">{{ __('Gratuit') }}</span>
                                                                                @else
                                                                                    <span
                                                                                        class="badge bg-info-transparent text-info fs-10 ms-1">{{ __('Acheté') }}</span>
                                                                                @endif
                                                                            </div>
                                                                            @if ($isActive)
                                                                                <a href="javascript:void(0);"
                                                                                    class="invoice-star d-flex align-items-center justify-content-center active"
                                                                                    title="{{ __('Modèle par défaut pour les') }} {{ $docLabel }}">
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
                                                                                        title="{{ __('Définir par défaut pour les') }} {{ $docLabel }}">
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
                                                <p class="text-muted mt-2">{{ __('Aucun modèle dans votre compte.') }} {{ __('Visitez la') }} <a
                                                        href="javascript:void(0);"
                                                        onclick="document.getElementById('store-tab').click();">{{ __('Boutique') }}</a>
                                                    {{ __('pour en acquérir.') }}</p>
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
                                                                                <img src="{{ asset($tpl->preview_image ?? 'assets/images/templates/invoice/model-1.png') }}"
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
                                                                                title="{{ __('Acheter ce modèle') }}">
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
                                                <p class="text-muted mt-2">{{ __('Vous possédez tous les modèles disponibles !') }}</p>
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
            $isActiveModal = $tplStyle === ($pdfTemplates[$tplDocType] ?? 'default');
            $docLabelModal = $documentTypes[$tplDocType] ?? $tplDocType;
        @endphp
        <div class="modal fade" id="template_preview_{{ $tpl->id }}" tabindex="-1"
            aria-labelledby="templatePreviewLabel_{{ $tpl->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="templatePreviewLabel_{{ $tpl->id }}">
                            {{ __('Aperçu') }} — {{ $tpl->name }} ({{ $docLabelModal }})
                            @if ($tpl->is_free)
                                <span class="badge bg-success-transparent text-success fs-10 ms-2">{{ __('Gratuit') }}</span>
                            @else
                                <span class="badge bg-info-transparent text-info fs-10 ms-2">{{ __('Acheté') }}</span>
                            @endif
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="pdf-preview-container"
                            data-pdf-url="{{ route('bo.settings.invoice-templates.preview', $tpl->code) }}"
                            style="width: 100%; height: 80vh; display: flex; align-items: center; justify-content: center;">
                            <div class="pdf-loading text-center">
                                <div class="spinner-border text-primary" role="status"></div>
                                <p class="text-muted mt-2">{{ __("Chargement de l'aperçu...") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between">
                        <div>
                            @if ($isActiveModal)
                                <span class="text-success fw-medium"><i class="isax isax-tick-circle me-1"></i>{{ __('Modèle par défaut pour les') }} {{ $docLabelModal }}</span>
                            @else
                                <form method="POST"
                                    action="{{ route('bo.settings.invoice-templates.activate', $tpl->code) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        <i class="isax isax-star me-1"></i>{{ __('Définir par défaut pour les') }} {{ $docLabelModal }}
                                    </button>
                                </form>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-2 pdf-zoom-controls">
                            <button type="button" class="btn btn-sm btn-outline-secondary pdf-zoom-out"><i class="fa fa-minus"></i></button>
                            <span class="fw-medium fs-13 pdf-zoom-label" style="min-width:50px;text-align:center;">100%</span>
                            <button type="button" class="btn btn-sm btn-outline-secondary pdf-zoom-in"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary pdf-zoom-reset"><i class="fa fa-expand me-1"></i>Auto</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary pdf-download" title="{{ __('Télécharger') }}"><i class="fa fa-download"></i></button>
                        </div>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Fermer') }}</button>
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
                            {{ __('Aperçu') }} — {{ $tpl->name }}
                            <span
                                class="badge bg-warning-transparent text-warning fs-10 ms-2">{{ number_format($tpl->price, 2) }}
                                {{ $tpl->currency ?? 'MAD' }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Fermer') }}"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="pdf-preview-container"
                            data-pdf-url="{{ route('bo.settings.invoice-templates.preview', $tpl->code) }}"
                            style="width: 100%; height: 80vh; display: flex; align-items: center; justify-content: center;">
                            <div class="pdf-loading text-center">
                                <div class="spinner-border text-primary" role="status"></div>
                                <p class="text-muted mt-2">{{ __("Chargement de l'aperçu...") }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between">
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Fermer') }}</button>
                        <div class="d-flex align-items-center gap-2 pdf-zoom-controls">
                            <button type="button" class="btn btn-sm btn-outline-secondary pdf-zoom-out"><i class="fa fa-minus"></i></button>
                            <span class="fw-medium fs-13 pdf-zoom-label" style="min-width:50px;text-align:center;">100%</span>
                            <button type="button" class="btn btn-sm btn-outline-secondary pdf-zoom-in"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-sm btn-outline-primary pdf-zoom-reset"><i class="fa fa-expand me-1"></i>Auto</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary pdf-download" title="{{ __('Télécharger') }}"><i class="fa fa-download"></i></button>
                        </div>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal"
                            data-bs-target="#purchase_confirm_{{ $tpl->id }}">
                            <i class="fa-brands fa-whatsapp me-1"></i>{{ __('Acheter') }} — {{ number_format($tpl->price, 2) }}
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
                        <h5 class="modal-title">{{ __("Confirmer l'achat") }}</h5>
                        <button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal"
                            aria-label="{{ __('Fermer') }}"><i class="fa-solid fa-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <img src="{{ asset($tpl->preview_image ?? 'assets/images/templates/invoice/model-1.png') }}"
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
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">{{ __('Annuler') }}</button>
                        <form method="POST" action="{{ route('bo.settings.invoice-templates.purchase', $tpl->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fa-brands fa-whatsapp me-1"></i>{{ __('Commander via WhatsApp') }}
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
        // Load PDF.js from CDN for reliable cross-browser PDF rendering
        var pdfjsScript = document.createElement('script');
        pdfjsScript.src = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js';
        pdfjsScript.onload = function() {
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
            initPdfPreviews();
        };
        document.head.appendChild(pdfjsScript);

        function renderPdfToContainer(pdfData, container, modal) {
            var loadingTask = pdfjsLib.getDocument({ data: pdfData });
            loadingTask.promise.then(function(pdf) {
                container.innerHTML = '';
                container._pdfDoc = pdf;
                container._zoomLevel = 1.0;

                // Full-height scrollable wrapper
                var wrapper = document.createElement('div');
                wrapper.style.cssText = 'width:100%;height:80vh;overflow:auto;background:#f5f5f5;';
                container.appendChild(wrapper);
                container._wrapper = wrapper;

                // Wire up footer zoom controls
                var zoomControls = modal.querySelector('.pdf-zoom-controls');
                var zoomLabel = modal.querySelector('.pdf-zoom-label');
                var btnMinus = modal.querySelector('.pdf-zoom-out');
                var btnPlus = modal.querySelector('.pdf-zoom-in');
                var btnReset = modal.querySelector('.pdf-zoom-reset');

                function getAutoScale(page) {
                    return (wrapper.clientWidth - 20) / page.getViewport({ scale: 1 }).width;
                }

                function renderAllPages(zoomFactor) {
                    var scrollTop = wrapper.scrollTop;
                    wrapper.innerHTML = '';
                    container._zoomLevel = zoomFactor;

                    var renderPage = function(pageNum) {
                        if (pageNum > pdf.numPages) {
                            wrapper.scrollTop = scrollTop;
                            return;
                        }
                        pdf.getPage(pageNum).then(function(page) {
                            var autoScale = getAutoScale(page);
                            var scale = autoScale * zoomFactor;
                            var viewport = page.getViewport({ scale: scale });
                            var canvas = document.createElement('canvas');
                            canvas.style.cssText = 'display:block;margin:10px auto;box-shadow:0 2px 8px rgba(0,0,0,.15);';
                            canvas.width = viewport.width;
                            canvas.height = viewport.height;
                            wrapper.appendChild(canvas);
                            page.render({ canvasContext: canvas.getContext('2d'), viewport: viewport }).promise.then(function() {
                                renderPage(pageNum + 1);
                            });
                        });
                    };
                    renderPage(1);
                }

                container._renderAllPages = renderAllPages;

                if (btnMinus) {
                    btnMinus.onclick = function() {
                        var z = Math.max(0.25, container._zoomLevel - 0.25);
                        zoomLabel.textContent = Math.round(z * 100) + '%';
                        renderAllPages(z);
                    };
                }
                if (btnPlus) {
                    btnPlus.onclick = function() {
                        var z = Math.min(3, container._zoomLevel + 0.25);
                        zoomLabel.textContent = Math.round(z * 100) + '%';
                        renderAllPages(z);
                    };
                }
                if (btnReset) {
                    btnReset.onclick = function() {
                        zoomLabel.textContent = '100%';
                        renderAllPages(1.0);
                    };
                }
                // Download button — decode from stored base64 (pdfData buffer is neutered by PDF.js)
                var btnDownload = modal.querySelector('.pdf-download');
                if (btnDownload) {
                    btnDownload.onclick = function() {
                        var b64 = container._pdfBase64;
                        if (!b64) return;
                        var binary = atob(b64);
                        var bytes = new Uint8Array(binary.length);
                        for (var i = 0; i < binary.length; i++) {
                            bytes[i] = binary.charCodeAt(i);
                        }
                        var blob = new Blob([bytes], { type: 'application/pdf' });
                        var url = URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'apercu-modele.pdf';
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                        URL.revokeObjectURL(url);
                    };
                }

                if (zoomControls) zoomControls.style.visibility = 'visible';

                renderAllPages(1.0);
            });
        }

        function initPdfPreviews() {
            document.querySelectorAll('.modal').forEach(function(modal) {
                // Hide zoom controls until PDF is loaded
                var zoomControls = modal.querySelector('.pdf-zoom-controls');
                if (zoomControls) zoomControls.style.visibility = 'hidden';

                modal.addEventListener('shown.bs.modal', function() {
                    var container = modal.querySelector('.pdf-preview-container');
                    if (!container || container.dataset.loaded) return;

                    var url = container.dataset.pdfUrl;
                    if (!url) return;

                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', url, true);
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.setRequestHeader('Accept', 'application/json');
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            try {
                                var data = JSON.parse(xhr.responseText);
                                if (data.pdf) {
                                    var binary = atob(data.pdf);
                                    var bytes = new Uint8Array(binary.length);
                                    for (var i = 0; i < binary.length; i++) {
                                        bytes[i] = binary.charCodeAt(i);
                                    }
                                    container._pdfBase64 = data.pdf;
                                    renderPdfToContainer(bytes, container, modal);
                                    container.dataset.loaded = '1';
                                } else {
                                    container.innerHTML = '<div class="text-center text-muted p-4">' +
                                        '<i class="isax isax-document-text fs-1"></i>' +
                                        '<p class="mt-2">' + (data.error || {!! json_encode(__('Aucun aperçu disponible.')) !!}) + '</p></div>';
                                }
                            } catch (e) {
                                container.innerHTML = '<div class="text-center text-danger p-4">' +
                                    '<i class="isax isax-warning-2 fs-1"></i>' +
                                    '<p class="mt-2">' + {!! json_encode(__("Erreur lors du chargement de l'aperçu.")) !!} + '</p></div>';
                            }
                        } else {
                            container.innerHTML = '<div class="text-center text-danger p-4">' +
                                '<i class="isax isax-warning-2 fs-1"></i>' +
                                '<p class="mt-2">' + {!! json_encode(__("Erreur lors du chargement de l'aperçu.")) !!} + '</p>' +
                                '<small class="text-muted">HTTP ' + xhr.status + '</small></div>';
                        }
                    };
                    xhr.onerror = function() {
                        container.innerHTML = '<div class="text-center text-danger p-4">' +
                            '<i class="isax isax-warning-2 fs-1"></i>' +
                            '<p class="mt-2">' + {!! json_encode(__("Erreur lors du chargement de l'aperçu.")) !!} + '</p></div>';
                    };
                    xhr.send();
                });

                // Reset on modal close
                modal.addEventListener('hidden.bs.modal', function() {
                    var container = modal.querySelector('.pdf-preview-container');
                    if (container && container.dataset.loaded) {
                        container.innerHTML = '<div class="pdf-loading text-center">' +
                            '<div class="spinner-border text-primary" role="status"></div>' +
                            '<p class="text-muted mt-2">' + {!! json_encode(__("Chargement de l'aperçu...")) !!} + '</p></div>';
                        delete container.dataset.loaded;
                    }
                    var zc = modal.querySelector('.pdf-zoom-controls');
                    var zl = modal.querySelector('.pdf-zoom-label');
                    if (zc) zc.style.visibility = 'hidden';
                    if (zl) zl.textContent = '100%';
                });
            });
        }
    </script>
@endpush
