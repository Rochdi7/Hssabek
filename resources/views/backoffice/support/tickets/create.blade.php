<?php $page = 'support-tickets'; ?>
@extends('backoffice.layout.mainlayout')
@section('title', 'Nouveau Ticket')
@section('description', 'Créer un nouveau ticket de support')
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
                            <h6><a href="{{ route('bo.support.tickets.index') }}"><i
                                        class="isax isax-arrow-left me-2"></i>{{ __('Tickets de support') }}</a></h6>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">{{ __('Nouveau ticket de support') }}</h5>

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

                                <form action="{{ route('bo.support.tickets.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gx-3">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Sujet') }} <span class="text-danger ms-1">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('subject') is-invalid @enderror" name="subject"
                                                    value="{{ old('subject') }}"
                                                    placeholder="{{ __('Décrivez brièvement votre problème') }}">
                                                @error('subject')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Catégorie') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('category') is-invalid @enderror"
                                                    name="category">
                                                    <option value="">{{ __('-- Sélectionner --') }}</option>
                                                    <option value="bug"
                                                        {{ old('category') === 'bug' ? 'selected' : '' }}>{{ __('Bug / Erreur') }}</option>
                                                    <option value="feature"
                                                        {{ old('category') === 'feature' ? 'selected' : '' }}>{{ __('Demande de fonctionnalité') }}</option>
                                                    <option value="billing"
                                                        {{ old('category') === 'billing' ? 'selected' : '' }}>{{ __('Facturation & Abonnement') }}</option>
                                                    <option value="account"
                                                        {{ old('category') === 'account' ? 'selected' : '' }}>{{ __('Compte & Accès') }}</option>
                                                    <option value="other"
                                                        {{ old('category') === 'other' ? 'selected' : '' }}>{{ __('Autre') }}</option>
                                                </select>
                                                @error('category')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Priorité') }} <span class="text-danger ms-1">*</span></label>
                                                <select class="form-select @error('priority') is-invalid @enderror"
                                                    name="priority">
                                                    <option value="low"
                                                        {{ old('priority', 'medium') === 'low' ? 'selected' : '' }}>{{ __('Basse') }}</option>
                                                    <option value="medium"
                                                        {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}>{{ __('Moyenne') }}</option>
                                                    <option value="high"
                                                        {{ old('priority') === 'high' ? 'selected' : '' }}>{{ __('Haute') }}</option>
                                                    <option value="urgent"
                                                        {{ old('priority') === 'urgent' ? 'selected' : '' }}>{{ __('Urgente') }}</option>
                                                </select>
                                                @error('priority')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Description') }} <span class="text-danger ms-1">*</span></label>
                                                <textarea class="form-control @error('description') is-invalid @enderror"
                                                    name="description" rows="6"
                                                    placeholder="{{ __('Décrivez votre problème en détail. Incluez les étapes pour reproduire le problème si applicable.') }}">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('Pièces jointes') }}</label>
                                                <div class="file-upload drag-file w-100 d-flex align-items-center justify-content-center flex-column mb-3" id="drop-zone">
                                                    <span class="upload-img d-block mb-2"><i class="isax isax-image text-primary"></i></span>
                                                    <p class="mb-0 text-gray-9 fw-normal">{{ __('Déposez vos fichiers ici ou') }} <a href="javascript:void(0);" class="text-primary text-decoration-underline" onclick="document.getElementById('file-input').click()">{{ __('parcourir') }}</a></p>
                                                    <input type="file" id="file-input" name="attachments[]" multiple accept="image/*,.pdf,.doc,.docx,.zip" class="d-none">
                                                    <p class="fs-12 text-muted mt-1">{{ __('Max 5 fichiers, 10 Mo chacun. JPG, PNG, GIF, WebP, PDF, DOC, ZIP') }}</p>
                                                </div>
                                                @error('attachments')
                                                    <div class="text-danger fs-13">{{ $message }}</div>
                                                @enderror
                                                @error('attachments.*')
                                                    <div class="text-danger fs-13">{{ $message }}</div>
                                                @enderror
                                                <div id="file-preview" class="d-flex flex-column gap-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-4 border-top">
                                        <a href="{{ route('bo.support.tickets.index') }}"
                                            class="btn btn-outline-white">{{ __('Annuler') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Envoyer le ticket') }}</button>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    const preview = document.getElementById('file-preview');

    // Drag and drop
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.classList.add('border-primary');
    });
    dropZone.addEventListener('dragleave', function() {
        dropZone.classList.remove('border-primary');
    });
    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        dropZone.classList.remove('border-primary');
        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            showPreview();
        }
    });
    dropZone.addEventListener('click', function() {
        fileInput.click();
    });

    fileInput.addEventListener('change', showPreview);

    function showPreview() {
        preview.innerHTML = '';
        Array.from(fileInput.files).forEach(function(file) {
            const isImage = file.type.startsWith('image/');
            const icon = isImage ? '{{ URL::asset("build/img/icons/img-icon.svg") }}' : '{{ URL::asset("build/img/icons/pdf.svg") }}';
            const size = (file.size / 1024).toFixed(0) + ' KB';
            const div = document.createElement('div');
            div.className = 'd-flex align-items-center justify-content-between border rounded p-2';
            div.innerHTML = '<div class="d-flex align-items-center">' +
                '<img src="' + icon + '" alt="img" class="avatar avatar-lg me-2">' +
                '<div><span class="fs-13">' + file.name + '</span><span class="d-block fs-12 text-muted">' + size + '</span></div>' +
                '</div>';
            preview.appendChild(div);
        });
    }
});
</script>
@endpush
