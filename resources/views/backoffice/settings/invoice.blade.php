<?php $page = 'invoice-settings'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', __('Paramètres de facturation'))
@section('description', __('Configurer les paramètres de facturation'))
@section('content')
    <!-- ========================
           Start Page Content
          ========================= -->

    <div class="page-wrapper">
        <div class="content">

            <!-- start row -->
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class=" row settings-wrapper d-flex">

                        @component('backoffice.components.settings-sidebar')
                        @endcomponent
                        <div class="col-xl-9 col-lg-8">
                            <div class="mb-3">
                                <div class="pb-3 border-bottom mb-3">
                                    <h6 class="mb-0">{{ __('Paramètres de facturation') }}</h6>
                                </div>
                                <form action="{{ route('bo.settings.invoice.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    {{-- Invoice image --}}
                                    <div class="border-bottom mb-4 pb-3">
                                        <div class="card-title-head">
                                            <h6 class="fs-16 fw-semibold mb-3 d-flex align-items-center">
                                                <span class="fs-16 me-2 p-1 rounded bg-dark text-white d-inline-flex align-items-center justify-content-center"><i class="isax isax-image"></i></span>
                                                {{ __("Images de l'entreprise") }}
                                            </h6>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-xl-9">
                                                <div class="row gy-3 align-items-center">
                                                    <div class="col-lg-6">
                                                        <div class="logo-info">
                                                            <h6 class="fs-14 fw-medium mb-1">{{ __('Image de facture') }}</h6>
                                                            <p class="fs-12">{{ __("Téléchargez l'image affichée sur vos factures") }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="profile-pic-upload mb-0 justify-content-lg-end">
                                                            <div class="new-employee-field">
                                                                <div class="mb-0">
                                                                    <div class="image-upload mb-1">
                                                                        <input type="file" id="invoice-image-file" accept="image/jpeg,image/png,image/webp" onchange="onInvoiceImageSelected(this)">
                                                                        <div class="image-uploads">
                                                                            <h4><i class="ti ti-upload me-1"></i>{{ __('Changer la photo') }}</h4>
                                                                        </div>
                                                                    </div>
                                                                    <span class="fs-12">{{ __('Format JPG ou PNG, 5 Mo maximum.') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3">
                                                <div class="new-logo ms-xl-auto bg-light border">
                                                    <img src="{{ $tenant->invoice_image_url ?? asset('build/img/icons/company-logo-01.svg') }}" alt="{{ __('Image de facture') }}" id="invoice-image-preview">
                                                    <a href="javascript:void(0);" id="invoice-image-trash" class="logo-trash bg-white text-danger me-1 mt-1"
                                                        onclick="removeInvoiceImage()"
                                                        style="{{ $tenant->hasMedia('invoice_image') ? '' : 'display:none;' }}"><i class="isax isax-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="cropped_invoice_image" id="cropped_invoice_image" value="">
                                        <input type="hidden" name="cropped_invoice_image_deleted" id="cropped_invoice_image_deleted" value="0">
                                        @error('cropped_invoice_image')<div class="text-danger fs-12 mt-1">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-8 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Modèle PDF') }}</label>
                                            <p class="text-muted fs-12 mb-0">{{ __('Le modèle utilisé pour générer les PDF de vos documents.') }}</p>
                                        </div>
                                        <div class="col-md-4 col-sm-12 text-end">
                                            @php
                                                $currentTemplate = $settings->invoice_settings['pdf_template'] ?? 'default';
                                                $templates = \App\Services\Sales\PdfService::TEMPLATES;
                                                $currentName = $templates[$currentTemplate]['name'] ?? 'Standard';
                                            @endphp
                                            <span class="badge bg-primary-transparent text-primary fs-12 me-2">{{ $currentName }}</span>
                                            <a href="{{ route('bo.settings.invoice-templates.index') }}" class="btn btn-sm btn-outline-primary">
                                                <i class="isax isax-document-text me-1"></i>{{ __('Gérer les modèles') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-8 col-sm-12">
                                            <label class="form-label fw-medium">{{ __("Afficher les détails de l'entreprise") }}</label>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-check form-check-sm form-switch text-end">
                                                <label class="form-check-label form-label m-0">
                                                    <input class="form-check-input form-label" type="checkbox"
                                                        role="switch" name="show_company_details" value="1"
                                                        {{ old('show_company_details', $settings->invoice_settings['show_company_details'] ?? true) ? 'checked' : '' }}>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Conditions de facturation') }}</label>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="mb-3">
                                                <textarea class="form-control @error('invoice_terms') is-invalid @enderror"
                                                    name="invoice_terms" rows="4">{{ old('invoice_terms', $settings->invoice_settings['invoice_terms'] ?? '') }}</textarea>
                                                @error('invoice_terms')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-4 col-sm-12">
                                            <label class="form-label fw-medium">{{ __('Pied de page de facture') }}</label>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="mb-3">
                                                <textarea class="form-control @error('invoice_footer') is-invalid @enderror"
                                                    name="invoice_footer" rows="3">{{ old('invoice_footer', $settings->invoice_settings['invoice_footer'] ?? '') }}</textarea>
                                                @error('invoice_footer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between settings-bottom-btn mt-3">
                                        <button type="button" class="btn btn-outline-white me-2" onclick="window.location.reload()">{{ __('Annuler') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                                    </div>
                                </form>
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

@push('scripts')
    <script>
        var invoiceImageDefaultUrl = @json(asset('build/img/icons/company-logo-01.svg'));

        function onInvoiceImageSelected(input) {
            var file = input.files[0];
            if (!file) return;
            var validTypes = ['image/jpeg', 'image/png', 'image/webp'];
            if (validTypes.indexOf(file.type) === -1) {
                alert({!! json_encode(__('Seuls les formats JPG, PNG et WEBP sont acceptés.')) !!});
                input.value = '';
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                alert({!! json_encode(__("L'image ne doit pas dépasser 5 Mo.")) !!});
                input.value = '';
                return;
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('cropped_invoice_image').value = e.target.result;
                document.getElementById('cropped_invoice_image_deleted').value = '0';
                document.getElementById('invoice-image-preview').src = e.target.result;
                document.getElementById('invoice-image-trash').style.display = '';
            };
            reader.readAsDataURL(file);
            input.value = '';
        }

        function removeInvoiceImage() {
            document.getElementById('invoice-image-preview').src = invoiceImageDefaultUrl;
            document.getElementById('cropped_invoice_image').value = '';
            document.getElementById('cropped_invoice_image_deleted').value = '1';
            document.getElementById('invoice-image-trash').style.display = 'none';
        }
    </script>
@endpush
